@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__("Dashboard")}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-6 offset-md-1 col-md-5">
                                <a href="#" class="card-link text-white">
                                    <div class="card">
                                        <img src="{{asset('/img/tarjetaRetosTr.png')}}" class="card-img" alt="...">
                                        <div class="card-body">
                                            <h3 class="text-uppercase">RETOS</h3>
                                        </div>
                            </div>
                        </a>
                        </div>
                        <div class="col-sm-6 offset-md-1 col-md-5 offset-md-1">
                                <a href="#" class="card-link text-white">
                                    <div class="card">
                                        <img src="{{asset('/img/tarjetaNiñosTr.png')}}" class="card-img img-fluid" alt="...">

                                        <div class="card-body">
                                            <h3 class="text-uppercase">Niños</h3>
                                        </div>
                            </div>
                        </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
