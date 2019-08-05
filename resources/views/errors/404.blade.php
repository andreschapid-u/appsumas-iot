{{-- @extends('errors::minimal') --}}
{{-- @extends('errors::layout') --}}
@extends('errors::illustrated-layout')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))

{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__("Oops!")}}</div>

                <div class="card-body">
                   <h1>404</h1>
                <h3>{{ __('Not Found')}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
