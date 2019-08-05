@extends('layouts.jugador')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>RETOS PENDIENTES</h3></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            @foreach (auth()->user()->children()->findOrFail(session("player"))->challenges as $challenge)


                            <div class="col-sm-4 offset-md-1 col-md-5">
                            <a href="{{route("jugador.retos.resolver",[$challenge->id])}}" class="card-link text-white">
                                <div class="card btn">
                                    <div class="card-body">
                                        <h3 class="text-uppercase">RETO: {{$challenge->id}}</h3>
                                    </div>
                                </div>
                            </a>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
