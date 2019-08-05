@extends('layouts.app')
@section('content')

<div class="container">
<div class="row">

    @forelse ($players as $player)
    <div class="col-sm-3">
            <a class="d-block" href="{{route("jugar.validar",[$player->id])}}">
            <div class="card">
                <div class="card-body">
                    <img src="{{$player->avatar->route}}" class="img-fluid" >
                </div>
                <div class="card-footer">
                    {{-- {{dd($player)}} --}}
                    <h3 class="text-center text-uppercase">
                        {{$player->first_name}}
                        </h3>
                </div>
            </div>
        </a>
        </div>
    @empty
    <h1>No hay jugadores</h1>
    @endforelse
</div>
</div>
@endsection
