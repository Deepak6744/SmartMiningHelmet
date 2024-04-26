#include <Wire.h>
#include <MPU6050.h>

MPU6050 mpu;

const int buzzerPin = D4; // Change this to the pin where your buzzer is connected

void setup() {
  Serial.begin(9600);
  Wire.begin();
  
  pinMode(buzzerPin, OUTPUT);
  
  // Initialize the MPU6050
  mpu.initialize();
  
  // Check if the MPU6050 is connected
  if (!mpu.testConnection()) {
    Serial.println("MPU6050 connection failed");
    while (true);
  }
  
  // Set accelerometer range to +/- 2g
  mpu.setFullScaleAccelRange(MPU6050_ACCEL_FS_2);
}

void loop() {
  // Read accelerometer data for X-axis
  int16_t ax = mpu.getAccelerationX();
  
  // Convert raw accelerometer data to g units
  float accelX = ax / 16384.0;
  
  // Print accelerometer data for X-axis
  Serial.print("Accelerometer X: ");
  Serial.println(accelX);
  
  // Check if accelerometer value is positive
  if (accelX > 0) {
    // Turn on the buzzer
    digitalWrite(buzzerPin, HIGH);
  } else {
    // Turn off the buzzer
    digitalWrite(buzzerPin, LOW);
  }
  
  delay(500); // Delay for stability
}
