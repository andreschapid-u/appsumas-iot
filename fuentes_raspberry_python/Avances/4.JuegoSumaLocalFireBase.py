import serial
import time

import Display
import Led
import ControladorJuego as controlador

from firebase import firebase
from uuid import getnode as get_mac

# connect to serial port on which the RFID reader is attached
port = serial.Serial('/dev/ttyUSB0', 2400, timeout=1)

lastid = ""
firebase = firebase.FirebaseApplication('https://dynamictoyiot.firebaseio.com/', None)

mac = '%012X' % get_mac()
mac = ':'.join(mac[i:i+2] for i in range(0, len(mac), 2))

result = firebase.put( 'gateway/propiedades', 'estado', 'Activado' )
if(result): print("Dispositivo activado")

result = firebase.put( 'gateway/propiedades', 'mac', '%s' % (mac) )
if(result): print("Registro de dispositivo exitoso, con la direccion MAC: [ %s ]" % (mac) )

controlador.generarOperacion()
print("\n" + controlador.operacion)
print("\nListo para leer las tarjetas RFID...\n")

try:
  while True:
    tagid = port.read(12)

    # if tag read success full, save it to database and wait half a second;
    # else try again
    if(len(tagid) != 0) and (len(lastid) == 0):
      Display.reinicio()
      verificacion = False
      port.close()
      tagid = tagid.strip()
      timestamp = time.ctime()
      
      print("Time: %s, Tag: %s" % (timestamp,tagid))
      
      result = firebase.put( 'gateway/recursos/dispositivo_IoT', 'tag_actual', '%s' % (tagid) )
      if(result):
          print( "Se ha publicado el tag [ %s ] correspondiente a la ultima tarjeta RFID leida" % (tagid) )
          
      result = firebase.get('tag/%s' % (tagid), None)
      if(result != None):
          print( "Valor de tarjeta [ %s ]" % (result) )
          Display.imprimir( int(result) )
          verificacion = controlador.verificarOperacion(result)
          if(verificacion): firebase.put('gateway', 'retro_alimentacion', 'Valido')
      else:
          print("El valor de la tarjeta NO esta registrado")
      
      result = firebase.get('gateway/retro_alimentacion', None)
      if(result == 'Valido'):
          print("Correcto :)")
          Led.encenderVerde()
          controlador.generarOperacion()
          firebase.put('gateway', 'retro_alimentacion', 'Invalido')
      else:
          print("Incorrecto :(")
          Led.encenderRojo()
    
      print("\n" + controlador.operacion)
      
      time.sleep(1)
      Led.reinicio()
      print()
      port.open()

    lastid = tagid  

except KeyboardInterrupt:
  port.close()
  print ("Program interrupted")