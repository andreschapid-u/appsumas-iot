@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">
        <div id="mensaje" class="" role="alert">
        </div>

    <div class="offset-sm-3 col-sm-6">
        <img width="90%" class="img-fluid" src="{{asset("/img/ani.gif")}}">

        {{-- {{dd($player)}} --}}
    </div>
    <div class="col-sm-12">



        <div class="card-group">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Mi Código</label>
                        <input type="text" name="" id="micode" readonly class="form-control" value="{{$player->code}}">
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Código leído</label>
                        <input type="text" name="" id="code" readonly class="form-control" value="">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<form id="formvalidar" action="{{route("jugador.irhome")}}" method="post">
    @csrf
<input type="hidden" name="id_jugador" value="{{$player->id}}">
</form>
@endsection
@section('scripts')
    <script>
var device = "{{auth()->user()->devices()->first()->mac}}"
var tagActual = firebase.database().ref('gateway/'+device+'/recursos/dispositivo_IoT/tag_actual');
tagActual.set("");


        tagActual.on('value', function(snapshot) {
            // alert(snapshot.val());
            document.getElementById("code").value = snapshot.val();
            var code = snapshot.val()
            var micode = document.getElementById("micode").value
            var mensaje = document.getElementById("mensaje")
            if(snapshot.val() != ""){

                if(code == micode){
                    mensaje.innerHTML = "<h3><strong>Éxito.</strong> Ya puedes jugar!</h3>"
                    mensaje.classList.add("alert")
                    mensaje.classList.add("alert-success")
                    mensaje.classList.add("show")
                    mensaje.classList.remove("alert-danger")
                    setTimeout(function(){
                        document.getElementById("formvalidar").submit();
                    }, 3000)
                }else{
                    mensaje.innerHTML = "<h3><strong>Error.</strong> Los códigos no coinciden!</h3>"
                    mensaje.classList.add("alert")
                    mensaje.classList.add("alert-danger")
                    mensaje.classList.remove("alert-success")
                    mensaje.classList.add("show")
                }
            }
            console.log(snapshot.val());
            // updateStarCount(postElement, snapshot.val());
        });
    </script>
@endsection
