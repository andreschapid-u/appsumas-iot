import serial
import time
import RPi.GPIO as GPIO
import random

# connect to serial port on which the RFID reader is attached
port = serial.Serial('/dev/ttyUSB0', 2400, timeout=1)

lastid = ""

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

led = 21

GPIO.setup(led,GPIO.OUT)

tarjeta1 = b'28001D6E97';
tarjeta2 = b'2C00AC411D';
tarjeta3 = b'2C00AC4309';
tarjeta4 = b'2C00AC4351';
tarjeta5 = b'2C00AC3649';
bandera = 0;

try:
  while True:
    # attempt to read in a tag
    tagid = port.read(12)
    
    if (bandera == 0):
      valor1 = random.randrange(1,3)
      valor2 = random.randrange(1,3)
      resultado = valor1 + valor2
      
      opc = random.randrange(1,4)
      
      if(opc == 1):
        print("_ + %d = %d" % (valor2, resultado))
        comparacion = valor1
      elif (opc == 2):
        print("%d +_ = %d" % (valor1, resultado))
        comparacion = valor2
      else:
        print("%d + %d = _" % (valor1, valor2))
        comparacion = resultado
      bandera = 1
    # if tag read success full, save it to database and wait half a second;
    # else try again
    if(len(tagid) != 0) and (len(lastid) == 0):
      port.close()
      tagid = tagid.strip()
      timestamp = time.time()
      
      print("Time: %s, Tag: %s" % (timestamp,tagid))
      
      if(tarjeta1 == tagid and 1 == comparacion):
        bandera = 0
      elif (tarjeta2 == tagid and 2 == comparacion):
        bandera = 0
      elif (tarjeta3 == tagid and 3 == comparacion):
        bandera = 0
      elif (tarjeta4 == tagid and 4 == comparacion):
        bandera = 0
      elif (tarjeta5 == tagid and 5 == comparacion):
        bandera = 0
      else:
        print("Incorrecto :(")
      
      if(bandera == 0):
        print("Correcto :)")
        GPIO.output(led,1)
          
      time.sleep(1)
      GPIO.output(led,0)
      port.open()

    lastid = tagid
    
  GPIO.cleanup()    

except KeyboardInterrupt:
  port.close()
  print ("Program interrupted")
