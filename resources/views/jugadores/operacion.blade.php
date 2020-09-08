@extends('layouts.jugador')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                    <div class="row">
                            <p style="font-size: 5rem;" id="contador"></p>
                        </div>
                <div class="card">
                    <div class="card-header">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            @if ($operacion->challenge->difficulty == 3)
                        <input type="hidden" name="res" id="res" value="{{$operacion->value_one}}">
                        <div class="col-sm-2"><img class="caracter" src="{{asset("/img/numeros/int.png")}}" id="int" alt="" srcset=""></div>
                        @else
                        <div class="col-sm-2"><img class="caracter" src="{{asset("/img/numeros/".$operacion->value_one.".png")}}" alt="" srcset=""></div>

                        @endif
                        @if ($operacion->type == "Sum")
                        <div class="col-sm-3"><img class="caracter" src="{{asset("/img/numeros/mas.png")}}" alt="" srcset=""></div>
                        @else
                        <div class="col-sm-3"><img class="caracter" src="{{asset("/img/numeros/menos.png")}}" alt="" srcset=""></div>
                        @endif

                        @if ($operacion->challenge->difficulty == 2)
                        <input type="hidden" name="res" id="res" value="{{$operacion->value_two}}">
                        <div class="col-sm-2"><img class="caracter" src="{{asset("/img/numeros/int.png")}}" id="int" alt="" srcset=""></div>
                        @else
                        <div class="col-sm-2"><img class="caracter" src="{{asset("/img/numeros/".$operacion->value_two.".png")}}" alt="" srcset=""></div>

                        @endif

                        <div class="col-sm-3"><img class="caracter" src="{{asset("/img/numeros/igual.png")}}" alt="" srcset=""></div>
                        @if($operacion->challenge->difficulty == 1)
                        <input type="hidden" name="res" id="res" value="{{$operacion->value_three}}">
                            <div class="col-sm-2"><img class="caracter" src="{{asset("/img/numeros/int.png")}}" id="int" alt="" srcset=""></div>
                        @else
                            <div class="col-sm-2"><img class="caracter" src="{{asset("/img/numeros/".$operacion->value_three.".png")}}" alt="" srcset=""></div>

                        @endif

                    </div>
                </div>
                <form id="formres" action="{{route("jugador.retos.guardar")}}" method="post">
                @csrf
                <input type="hidden" name="res" value="-1" id="answer">
                <input type="hidden" name="operacion" value="{{$operacion->id}}">
                <input type="hidden" name="estado" id="estado">
                </form>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>

var device = "{{auth()->user()->devices()->first()->mac}}"
var tagActual = firebase.database().ref('gateway/'+device+'/recursos/dispositivo_IoT/tag_actual');
var retroalimentacion = firebase.database().ref('gateway/'+device+'/retro_alimentacion');
tagActual.set("");
retroalimentacion.set("0");
var timer;
var counter = 15;

function startCounting( )
{
    timer = window.setTimeout( "countDown()", 1000 );
    window.status = counter;    // show the initial value
}

function countDown( )
{
    document.getElementById("contador").innerHTML = counter
    counter = counter - 1;

    window.status = counter;
    if (counter == 0)
    {
         window.clearTimeout( timer );
         timer = null;
         responder(-1)
    }
    else
    {
        timer = window.setTimeout( "countDown()", 1000);
    }
}
window.onload = startCounting()
var imgRoute = "{{asset('/img/numeros/')}}"



tagActual.on('value', function(snapshot) {
    // alert(snapshot.val());
    var tag_leido = snapshot.val()
    if(snapshot.val() != ""){
        var tagNumero = firebase.database().ref('tag/'+tag_leido)
        tagNumero.on("value", function(numero){
            console.log(numero.val());
            responder(numero.val())
        })
    }
});

function responder(numero){
    if(numero != null && numero != ""){
        if(numero == document.getElementById("res").value){
            window.clearTimeout( timer );
            timer = null
            document.getElementById("estado").value = 1;
            document.getElementById("int").src = imgRoute+"/"+numero+".png"
            retroalimentacion.set("1");

        }else{
            document.getElementById("int").src = imgRoute+"/error.png"
            document.getElementById("estado").value = 0;
            retroalimentacion.set("2");

        }
        document.getElementById("answer").value = numero;
        setTimeout(function(){
            retroalimentacion.set("0");
                document.getElementById("formres").submit();
            }, 3000)
    }
}
</script>
@endsection
