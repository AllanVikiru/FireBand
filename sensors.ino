/*
  All Sensors Sketch
  This sketch defines functionalities of all sensors - MAX30102, DHT11 and NEO-6M GPS
  Reads temperature and humidity values (DHT11); infrared value - for calculating heartbeat (MAX 30102) and latitude, longitude and ground speed (NEO-6M GPS), and time elapsed in seconds

  NOTE: refrain from adding delays as it causes the MAX30102 readings to fail.
*/
//include libraries
#include <TinyGPS++.h>
#include <DHT.h>
#include <Wire.h>
#include "MAX30105.h"
#include "heartRate.h"

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

void setup() {
  Serial.begin(defaultBaud);  // start the Arduino hardware serial port at 9600 baud
  Serial1.begin(defaultBaud); // start the software serial port (Serial1 - Serial ports RX and TX) at 9600 baud.
  dht.begin(); //start DHT11 sensor.

  // Initialize sensor
  if (!particleSensor.begin(Wire, I2C_SPEED_FAST)) //Use default I2C port, 400kHz speed
  {
    Serial.println("MAX30105 was not found. Please check wiring/power. ");
    while (1);
  }
  Serial.println("Place your index finger on the sensor with steady pressure.");

  particleSensor.setup(); //Configure pulse sensor with default settings
  particleSensor.setPulseAmplitudeRed(0x0A); //Turn Red LED to low to indicate sensor is running

}

void loop() {
  float temp = dht.readTemperature(); // get temperature value
  float hum = dht.readHumidity(); // get humidity value
  float late = gps.location.lat(); // get latitude value
  float longe = gps.location.lng(); // get longitude value
  float alt = gps.altitude.meters(); //get altitude value in metres
  float spd = gps.speed.mps(); //get speed value in m/s
  long irValue = particleSensor.getIR(); //get infrared values (THIS MUST BE DECLARED WITHIN VOID LOOP)
  int isWorn = 1; //determine if device is worn properly through infrared values (pulse detection)

  long startMillis, elapsedTime = 0; //timers for calculating elapsed time (distance calculation)

  //check for temperature and humidity values being read
  if (isnan(temp) || isnan(hum)) {
    Serial.println("Temperature and Humidity: Not Available");
  }

  //check for infrared value to be more than 60000 (pulse detection), if more calculate based on the value.
  if (irValue < 60000) {
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
      if (!(gps.altitude.isValid())) {
        Serial.println("Altitude: Not Available");
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
}
