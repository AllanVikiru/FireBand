# FireBand Device Configuration
> Description

Device configuration for FireBand device wearers. Some charts are displayed on to the [web application](https://github.com/AllanVikiru/FireBand/tree/web).

Full description will be published soon. 

> Prerequisites

[ThingSpeak IoT](https://thingspeak.com/pages/learn_more)

[Arduino MKR GSM 1400](https://www.arduino.cc/en/Guide/MKRGSM1400)

[DHT11 Temperature and Relative Humidity Sensor](https://components101.com/dht11-temperature-sensor)

[Neo 6M- GPS Module](https://www.electroschematics.com/neo-6m-gps-module/)

[MAX30102 Heart Rate and Pulse Oximeter Module](https://www.maximintegrated.com/en/products/interface/sensor-interface/MAX30102.html)

> Code Setup

1. First, clone this branch locally.

2. Test for functionality of all sensors using the ``` sensors/sensors.ino``` file. 

3. Use ``` http-client/http-client.ino``` to test for GSM/GPRS connection to ThingSpeak over HTTP and ``` mqtt-publisher/mqtt-publisher.ino``` to test for GSM/GPRS connection over MQTT. 

4. In both configurations be sure to set the specified credentials in ```secrets.h``` which is located within the respective ```http-client``` and ```mqtt-publisher``` folders.

5. Import the visualisation files in the ```visualisations``` folder to ThingSpeak 
  
   This is done by first selecting the 'Custom' template on this [page](https://thingspeak.com/apps/matlab_visualizations/templates) (only accessible once logged into   ThingSpeak); then importing each file as separate visualisation charts i.e. ```visualisations/location.m``` would apply to the Geographical Map chart, ```visualisations/temp_hum.m``` would apply to the Temperature and Relative Humidity Correlation Plot and ```visualisations/hr_temp.m``` would apply to the Heartrate against Temperature Plot.
            
