@extends('layouts.app')
{{-- "name","mac","state","current_tag_id","feedback" --}}

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">MIS DISPOSITIVOS</div>

                    <div class="card-body">
                            @forelse ($devices as $device)
                                {{ $device->name}}
                            @empty
                                {{ "No hay items disponibles"}}
                                <a name="" id="" class="btn btn-primary" href="{{route("dispositivo.create")}}" role="button">Registrar dispositivo</a>
                            @endforelse

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
