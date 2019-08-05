@extends('layouts.app')
        <!-- Fonts -->

@section('content')

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        @auth
                                <a class="d-block align-self-sm-center center" href="{{route("jugar")}}">
                                    <img src="{{asset("/img/play.svg")}}" alt="" srcset="">
                                </a>
                        @else
                            REgistrarse
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
