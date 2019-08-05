import RPi.GPIO as GPIO

GPIO.setmode(GPIO.BCM)
GPIO.setwarnings(False)

a = 13
b = 12
c = 16
d = 20
e = 21
f = 19
g = 26

GPIO.setup(a,GPIO.OUT)
GPIO.setup(b,GPIO.OUT)
GPIO.setup(c,GPIO.OUT)
GPIO.setup(d,GPIO.OUT)
GPIO.setup(e,GPIO.OUT)
GPIO.setup(f,GPIO.OUT)
GPIO.setup(g,GPIO.OUT)

def reinicio():
    GPIO.output(a,0)
    GPIO.output(b,0)
    GPIO.output(c,0)
    GPIO.output(d,0)
    GPIO.output(e,0)
    GPIO.output(f,0)
    GPIO.output(g,0)

def cero():
    GPIO.output(a,1)
    GPIO.output(b,1)
    GPIO.output(c,1)
    GPIO.output(d,1)
    GPIO.output(e,1)
    GPIO.output(f,1)
    GPIO.output(g,0)

def uno():
    GPIO.output(a,0)
    GPIO.output(b,1)
    GPIO.output(c,1)
    GPIO.output(d,0)
    GPIO.output(e,0)
    GPIO.output(f,0)
    GPIO.output(g,0)

def dos():
    GPIO.output(a,1)
    GPIO.output(b,1)
    GPIO.output(c,0)
    GPIO.output(d,1)
    GPIO.output(e,1)
    GPIO.output(f,0)
    GPIO.output(g,1)
    
def tres():
    GPIO.output(a,1)
    GPIO.output(b,1)
    GPIO.output(c,1)
    GPIO.output(d,1)
    GPIO.output(e,0)
    GPIO.output(f,0)
    GPIO.output(g,1)
    
def cuatro():
    GPIO.output(a,0)
    GPIO.output(b,1)
    GPIO.output(c,1)
    GPIO.output(d,0)
    GPIO.output(e,0)
    GPIO.output(f,1)
    GPIO.output(g,1)
    
def cinco():
    GPIO.output(a,1)
    GPIO.output(b,0)
    GPIO.output(c,1)
    GPIO.output(d,1)
    GPIO.output(e,0)
    GPIO.output(f,1)
    GPIO.output(g,1)

switcher = {0:cero, 1: uno, 2: dos, 3: tres, 4: cuatro, 5: cinco }

def imprimir(numero):
    reinicio()
    try:
        switcher[numero]()
    except:
        print("Opcion incorrecta")
