import serial
import time

from firebase import firebase

# connect to serial port on which the RFID reader is attached
port = serial.Serial('/dev/ttyUSB0', 2400, timeout=1)

lastid = ""
firebase = firebase.FirebaseApplication('https://dynamictoyiot.firebaseio.com/', None)

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
      
      print("Time: %s, Tag: %s" % (timestamp,tagid))
      
      valor = input("Digite el valor numerico para el tag: ")
      #isinstance: Por si necesitamos valir el valor de entero
      valor = int(valor)
      
      result = firebase.put( 'tag', '%s' % (tagid), '%d' % (valor) )
      
      if(result):
        print("Se registro el tag %s con el valor de %d" % (tagid, valor) )
     
      print()
    
      #time.sleep(.5)
      port.open()

    lastid = tagid  

except KeyboardInterrupt:
  port.close()
  print ("Program interrupted")

