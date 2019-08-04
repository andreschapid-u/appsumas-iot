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

                                <div class="container">
                                    <form>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label text-sm-right">{{__("Name")}}</label>
                                            <div class="col-sm-6">
                                            <label class="col-form-label font-weight-bold text-uppercase text-white" >{{ $device->name}}</label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label text-sm-right">{{__("Code")}}</label>
                                            <div class="col-sm-6">
                                            <label class="col-form-label font-weight-bold text-uppercase text-white" >{{ $device->mac}}</label>
                                            </div>
                                        </div>

                                        {{-- <div class="form-group row">
                                            <div class="col-sm-12">
                                            <a name="" id="" class="btn btn-block btn-primary" href="{{route("home")}}" role="button">{{__("Home")}}</a>
                                            </div>
                                        </div> --}}
                                    </form>
                                </div>
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
