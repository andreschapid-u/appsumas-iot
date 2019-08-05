import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

ledRojo = 17
ledVerde = 18

GPIO.setup(ledRojo,GPIO.OUT)
GPIO.setup(ledVerde,GPIO.OUT)

def reinicio():
    GPIO.output(ledRojo,0)
    GPIO.output(ledVerde,0)

def encenderRojo():
    GPIO.output(ledRojo,1)
    GPIO.output(ledVerde,0)
    
def encenderVerde():
    GPIO.output(ledVerde,1)
    GPIO.output(ledRojo,0)
