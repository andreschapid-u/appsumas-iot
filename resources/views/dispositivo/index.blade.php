@extends('layouts.app')
{{-- "name","mac","state","current_tag_id","feedback" --}}

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>MIS DISPOSITIVOS</h2>
                            </div>
                            <div class="col-sm-6">
                                <a name="" id="" class="btn btn-primary float-right text-white" href="{{route("dispositivo.create")}}" role="button">{{__("Register")}}</a>
                            </div>
                        </div>

                    </div>

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
                                    </form>
                                </div>
                            @empty
                                {{ "No hay items disponibles"}}
                            @endforelse

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
