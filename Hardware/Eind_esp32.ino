#include <ezButton.h>  // the library to use for SW pin

#include <Arduino.h>

#include <WiFi.h>
#include <WiFiMulti.h>

#include <WiFiClient.h>

#include <HTTPClient.h>

#define USE_SERIAL Serial

WiFiMulti wifiMulti;

const byte ledPin = 33;
int led_state = 0;

bool alarm_check = 0;
int remote_alarm_state = 0;
const int PIN_TO_SENSOR = 19; // GPIO19 pin connected to OUTPUT pin of sensor
int pinStateCurrent   = LOW;  // current state of pin
int pinStatePrevious  = LOW;  // previous state of pin

const String camera_url = "http://192.168.195.128";

const char* serverUrl = "192.168.195.62";

const char* ssid = "AndroidAP";
const char* wifi_password = "sjat1240"; 
const int port = 8000;

#define alarm_button 14

#define test_button 4

ezButton button1(alarm_button);
ezButton button2(test_button);

long start_time = 0;
long REQUEST_INTERVAL_TIME = 1000;

void setup() {

    USE_SERIAL.begin(115200);

    WiFi.begin(ssid, wifi_password);

    pinMode(ledPin, OUTPUT);

    pinMode(LED_BUILTIN, OUTPUT);
    digitalWrite(LED_BUILTIN, LOW);

    pinMode(PIN_TO_SENSOR, INPUT); 

    button1.setDebounceTime(75);  // set debounce time to 50 milliseconds
    button2.setDebounceTime(75);  // set debounce time to 50 milliseconds

    USE_SERIAL.println();
    USE_SERIAL.println();
    USE_SERIAL.println();

    for(uint8_t t = 4; t > 0; t--) {
        USE_SERIAL.printf("[SETUP] WAIT %d...\n", t);
        USE_SERIAL.flush();
        delay(1000);
    }

    // wifiMulti.addAP("AndroidAP", "sjat1240");

    start_time = millis();

    while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");
}

void movement_detected_check(){
  pinStatePrevious = pinStateCurrent; // store old state
  pinStateCurrent = digitalRead(PIN_TO_SENSOR);   // read new state

  if (pinStatePrevious == LOW && pinStateCurrent == HIGH) {   // pin state change: LOW -> HIGH
    Serial.println("Motion detected!");
    post_camera();
    set_alarm();
  }
  else
  if (pinStatePrevious == HIGH && pinStateCurrent == LOW) {   // pin state change: HIGH -> LOW
    Serial.println("Motion stopped!");
  }
}

void post_camera(){
  if(WiFi.status() == WL_CONNECTED) {
  WiFiClient client;
  Serial.println("WiFi connected yallah");
  String postData = "sensor_id=flappy_is_beste";
  String url = "/inbraakmelding/flappy_is_beste/camerabeeld?url=http://192.168.195.128";

  if (client.connect(serverUrl, port)){
      // Make a GET request
      client.println("GET " + url + " HTTP/1.1");
      client.println("Host: " + String(serverUrl));
      client.println("Connection: close");
      client.println();
    // Wait for server response
      if(client.connected()) {
        if (client.available()) {
          char c = client.read();
          Serial.print(c);
        }
      }
      Serial.println();
      client.stop();
    } else {
      Serial.println("Connection failed");
    }
  }
}

void get_remote_alarm_state(){
// is het al tijd?
  if(!enough_time_passed()){
    return;
  }
  if(WiFi.status() == WL_CONNECTED) {
    WiFiClient client;
    String url = "/alarm/show";
        HTTPClient http;
        http.begin("http://" + String(serverUrl) + ":" + String(port) + String(url)); //HTTP
        int httpCode = http.GET();

        if(httpCode > 0) {
            Serial.println(httpCode);
            if(httpCode == HTTP_CODE_OK) {
                String payload = http.getString();
                remote_alarm_state = payload.toInt();
                Serial.println(remote_alarm_state);
                if(remote_alarm_state == 0){
                  alarm_check = 0;
                  set_alarm();
                  Serial.println("HET ALARM STAAT UIT!!!!!!!!!!!!!!!!!");
                }
                else{
                  alarm_check = 1;
                }
            }
        }
        http.end();
  }
}

int enough_time_passed(){
  if (millis() > start_time + REQUEST_INTERVAL_TIME){
    start_time = millis();
    return true;
  }else{
    return false;
  }
}


void set_alarm(){
  if (!alarm_check) {
    set_led(0);
    Serial.println("HET ALARM STAAT UIT");
  }
  else {
  set_led(1);
  Serial.println("WEEEE WOOOO HET ALARM STAAT AAN!!!");
  }
}

void set_remote_alarm(){
  if(WiFi.status() == WL_CONNECTED) {
    WiFiClient client;
    String url = "/alarm";
        HTTPClient http;
        http.begin("http://" + String(serverUrl) + ":" + String(port) + String(url)); //HTTP
        int httpCode = http.GET();

        if(httpCode > 0) {
            Serial.println(httpCode);
            if(httpCode == HTTP_CODE_OK) {
            }
        }
        http.end();
  }
}

void set_led(int led_state){
  if(led_state == 1){
    digitalWrite(ledPin, HIGH);
  }
  else{
    digitalWrite(ledPin, LOW);
  }
}

void loop() {
  button1.loop();
  button2.loop();
  
  movement_detected_check();

  if(button1.isPressed()){
    set_remote_alarm();
    Serial.println("BUTTON IS PRESSED");
    Serial.println(alarm_check);
  }
  get_remote_alarm_state();
}
