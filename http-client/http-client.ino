/*
  FireBand Publisher Sketch using HTTP

  Uploaded onto the Arduino MKR GSM 1400 board
  Publishes a message payload of sensor values every 5 seconds to the ThingSpeak channel
  Sensor Values: temperature, humidity (DHT11); latitude, longitude, speed (Neo-6m GPS); heartrate (MAX 30102), time passed in seconds
*/

//include ThingSpeak and MKRGSM libraries
#include "ThingSpeak.h"
#include <MKRGSM.h>
#include "secrets.h"

//include sensor libraries
#include <TinyGPS++.h>
#include <DHT.h>
#include <Wire.h>
#include "MAX30105.h"
#include "heartRate.h"

// PIN Number and APN data
const char PINNUMBER[]     = SECRET_PIN;
const char GPRS_APN[]      = SECRET_GPRS_APN;
const char GPRS_LOGIN[]    = SECRET_GPRS_LOGIN;
const char GPRS_PASSWORD[] = SECRET_GPRS_PASS;

//ThingSpeak channel number and API Key credentials
unsigned long myChannelNumber = SECRET_CH_ID;
const char * myWriteAPIKey = SECRET_WRITE_APIKEY;

//initialise GSM and GPRS libraries
GSMClient client;
GPRS gprs;
GSM gsmAccess;

// initialize DHT values
#define DHTPIN 6 // pin number to which the sensor is connected
#define DHTTYPE DHT11 // sensor type - DHT11

TinyGPSPlus gps; // TinyGPS++ object
DHT dht(DHTPIN, DHTTYPE); // DHT object
MAX30105 particleSensor; // Pulse sensor MAX30105 object

int defaultBaud = 9600; // default baud for Arduino and GPS

//pulse calculation variables
const byte RATE_SIZE = 4; //average heartrate
byte rates[RATE_SIZE]; //array of heart rate values
byte rateSpot = 0;
long lastBeat = 0; //Time at which the last beat occurred
float beatsPerMinute;
float beatAvg;

unsigned long messageMillis = 0; //offset timer for publishing messages

void setup() {
  Serial.begin(defaultBaud);  //Initialize arduino serial
  Serial1.begin(defaultBaud); // start the software serial port (Serial1 - Serial ports RX and TX) at 9600 baud.
  dht.begin(); //start DHT11 sensor.

  // Initialize pulse sensor
  if (!particleSensor.begin(Wire, I2C_SPEED_FAST)) //Use default I2C port, 400kHz speed
  {
    Serial.println("MAX30105 was not found. Please check wiring/power. ");
    while (1);
  }
  Serial.println("Place your index finger on the sensor with steady pressure.");

  particleSensor.setup(); //Configure pulse sensor with default settings
  particleSensor.setPulseAmplitudeRed(0x0A); //Turn Red LED to low to indicate sensor is running

  //attempt connection to GSM/GPRS network.
  boolean connected = false;
  delay(10000);   // wait 10 seconds for connection:
  while (!connected) {
    if ((gsmAccess.begin(PINNUMBER) == GSM_READY) && (gprs.attachGPRS(GPRS_APN, GPRS_LOGIN, GPRS_PASSWORD) == GPRS_READY)) {
      connected = true;
      Serial.println("Attempting to connect to GSM/GPRS network");
    }
    else {
      Serial.println("Not connected to GSM/GPRS network. Check your connection");
      delay(1000);
    }
  }
  Serial.println("Connected to GSM/GPRS network");

  ThingSpeak.begin(client);  // Initialize ThingSpeak
}

void loop() {
  float temp = dht.readTemperature(); // get temperature value
  float hum = dht.readHumidity(); // get humidity value

  float late = gps.location.lat(); // get latitude value
  float longe = gps.location.lng(); // get longitude value
  float spd = gps.speed.mps(); //get speed value in m/s

  long irValue = particleSensor.getIR(); //get infrared values (THIS MUST BE DECLARED WITHIN VOID LOOP)
  int isWorn = 1; //determine if device is worn properly through infrared values (pulse detection)

  long startMillis, elapsedTime = 0; //timers for calculating elapsed time (distance calculation)

  //check for temperature and humidity values being read
  if (isnan(temp) || isnan(hum)) {
    Serial.println("Temperature and Humidity: Not Available");
  }

  //check for infrared value to be more than 50000 (pulse detection), if more calculate based on the value.
  if (irValue < 50000) {
    isWorn = 0;
    Serial.println();
    Serial.print("Cannot read IR value. (No pulse detected)");
    Serial.println();
  }
  else {
    if (checkForBeat(irValue) == true) {
      long delta = millis() - lastBeat;
      lastBeat = millis();

      beatsPerMinute = 60 / (delta / 1000.0);

      if (beatsPerMinute < 255 && beatsPerMinute > 20) {
        rates[rateSpot++] = (byte)beatsPerMinute; //Store this reading in the array
        rateSpot %= RATE_SIZE; //Wrap variable

        //Take average of readings
        beatAvg = 0;
        for (byte x = 0 ; x < RATE_SIZE ; x++)
          beatAvg += rates[x];
        beatAvg /= RATE_SIZE;
      }
    }
  }

  // if 5000 milliseconds pass and there are no characters coming in over the software serial port, show a "No GPS detected" error
  if (millis() > 5000 && gps.charsProcessed() < 10) {
    Serial.println("No GPS detected");
    //while (true);
  }

  //check if GPS information is being read
  while (Serial1.available() > 0) {
    if (gps.encode(Serial1.read())) {
      if (!(gps.location.isValid())) {
        Serial.println("Location: Not Available");
      }
      if (!(gps.speed.isValid())) {
        Serial.println("Speed: Not Available");
      }
      Serial.println();
    }
  }

  //calculate time elapsed in seconds
  elapsedTime = ((millis() - startMillis) / 1000);

  //output values to serial monitor.
  Serial.print("Is the Device Worn? ");
  Serial.println(isWorn);
  Serial.print("IR=");
  Serial.print(irValue);
  Serial.print(", BPM=");
  Serial.print(beatsPerMinute);
  Serial.print(" [Current Average BPM=");
  Serial.print(beatAvg);
  Serial.println("]");
  Serial.print("Temperature = ");
  Serial.print(temp);
  Serial.print("°C");
  Serial.println();
  Serial.print("Humidity = ");
  Serial.print(hum);
  Serial.println("%");
  Serial.print("Latitude: ");
  Serial.println(late, 6);
  Serial.print("Longitude: ");
  Serial.println(longe, 6);
  Serial.print("Current Speed: ");
  Serial.print(spd);
  Serial.println("m/s");
  Serial.print("Time Elapsed: ");
  Serial.print(elapsedTime);
  Serial.println(" seconds");
  Serial.println();

  if (millis() - messageMillis > 5000) {
    messageMillis = millis();
    Serial.println("********************************");
    Serial.println("Publishing message to channel");
    Serial.println("********************************");
    // set the fields with the values
    ThingSpeak.setField(1, isWorn);
    ThingSpeak.setField(2, beatAvg);
    ThingSpeak.setField(3, temp);
    ThingSpeak.setField(4, hum);
    ThingSpeak.setField(5, late);
    ThingSpeak.setField(6, longe);
    ThingSpeak.setField(7, spd);
    ThingSpeak.setField(8, elapsedTime);

    // write to the ThingSpeak channel
    int x = ThingSpeak.writeFields(myChannelNumber, myWriteAPIKey);
    if (x == 200) {
      Serial.println("Channel update successful.");
    }
    else {
      Serial.println("Problem updating channel. HTTP error code " + String(x));
    }
  }
}
