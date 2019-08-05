import random

valor1 = 0
valor2 = 0
resultado = 0
opc = 0
operacion = ""

def generarOperacion():
    global valor1, valor2, resultado, opc, operacion
    resultado = 0
    signo = ""
    
    while(resultado < 1 or resultado > 5):
        valor1 = random.randrange(1,5)
        valor2 = random.randrange(1,5)

        operacion = random.randrange(1,3)
        
        if(operacion == 1):
            resultado = valor1 + valor2
            signo = "+"
        else:
            resultado = valor1 - valor2
            signo = "-"
        
    strVal1 = valor1
    strVal2 = valor2
    strRes = resultado
    
    opc = random.randrange(1,4)
    
    if(opc == 1): strVal1 = "_"
    elif(opc == 2): strVal2 = "_"
    else: strRes = "_"
    
    operacion = "%s %s %s = %s" % (strVal1, signo, strVal2, strRes)
    return operacion

def verificarOperacion(valor):
    numero = int(valor)
    
    if(opc == 1 and numero == valor1): return True
    elif(opc == 2 and numero == valor2): return True
    elif(opc == 3 and numero == resultado): return True
    else: return False