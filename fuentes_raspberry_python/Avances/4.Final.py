import serial
import time

import Display
import Led
import ControladorJuego as controlador

from firebase import firebase
from uuid import getnode as get_mac

import json

# connect to serial port on which the RFID reader is attached
port = serial.Serial('/dev/ttyUSB0', 2400, timeout=1)

lastid = ""
firebase = firebase.FirebaseApplication('https://dynamictoyiot.firebaseio.com/', None)

mac = '%012X' % get_mac()
mac = ':'.join(mac[i:i+2] for i in range(0, len(mac), 2))

propDispositivo = {
  "propiedades": {
    "estado": "Activado",
    "mac": '%s' % (mac),
    "nombre": "Raspberry Pi 3"
  },
  "recursos": {
    "dispositivo_IoT": {
      "nombre": "Lector RFID",
      "propiedad": "Sensor",
      "tag_actual": ""
    }
  },
  "retro_alimentacion": 0
}


result = firebase.put( 'gateway', '%s' % (mac), propDispositivo )
if(result): print("Dispositivo activado")

try:
  while True:
    tagid = port.read(12)

    print(tagid)
    # if tag read success full, save it to database and wait half a second;
    # else try again
    if(len(tagid) != 0) and (len(lastid) == 0):

      verificacion = False
      port.close()
      tagid = tagid.strip()
      timestamp = time.ctime()
      
      print("Time: %s, Tag: %s" % (timestamp,tagid))

      
      result = firebase.put( 'gateway/%s/recursos/dispositivo_IoT'%(mac), 'tag_actual', '%s' % (tagid) )

      if(result):
        print( "Se ha publicado el tag [ %s ] correspondiente a la ultima tarjeta RFID leida" % (tagid) )


      result = firebase.get('tag/%s' % (tagid), None)
      if(result != None):
        print( "Valor de tarjeta [ %s ]" % (result) )
        Display.imprimir( int(result) )
      else:
          print("El valor de la tarjeta NO esta registrado")
          Led.encenderRojo() 
          
      time.sleep(0.5)
      Led.reinicio()
      print()
      port.open()

    result = firebase.get('gateway/%s/retro_alimentacion'%(mac), None)
    print(result)
    if(int(result) == 1):
        print("Correcto :)")
        Led.encenderVerde()
    elif(int(result) == 2):
        print("Incorrecto :(")
        Led.encenderRojo()
    else:
        Led.reinicio();
    lastid = tagid  

except KeyboardInterrupt:
  port.close()
  Led.reinicio()
  Display.reinicio()
  print ("Program interrupted")
