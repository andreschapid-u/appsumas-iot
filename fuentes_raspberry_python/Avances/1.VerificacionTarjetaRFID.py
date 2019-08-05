import serial
import time
import RPi.GPIO as GPIO

# connect to serial port on which the RFID reader is attached
port = serial.Serial('/dev/ttyUSB0', 2400, timeout=1)

lastid = ""

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

led = 21

GPIO.setup(led,GPIO.OUT)

try:
  while True:
    # attempt to read in a tag
    tagid = port.read(12)

    # if tag read success full, save it to database and wait half a second;
    # else try again
    if(len(tagid) != 0) and (len(lastid) == 0):
      port.close()
      tagid = tagid.strip()
      timestamp = time.time()
      
      comparacion = b'28001D6E97';
      print("Time: %s, Tag: %s, Comparacion: %s" % (timestamp,tagid,comparacion))
      
      if(comparacion == tagid):
        GPIO.output(led,1)
        print("Led ON")
      else:
        GPIO.output(led,0)
        print("Led OFF")

      time.sleep(.5)
      port.open()

    lastid = tagid
    
  GPIO.cleanup()    

except KeyboardInterrupt:
  port.close()
  print ("Program interrupted")
