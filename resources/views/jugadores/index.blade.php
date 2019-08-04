@extends('layouts.app')
{{-- "name","mac","state","current_tag_id","feedback" --}}

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">MIS DISPOSITIVOS

                    <a name="" id="" class="btn btn-primary float-right text-white" href="{{route("jugadores.create")}}" role="button">{{__("Register")}}</a>
                    </div>

                    <div class="card-body">
                            <table class="table table-dark">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{__("First Name")}}</th>
                                        <th scope="col">{{__("Last Name")}}</th>
                                        <th scope="col">{{__("Gender")}}</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                            @forelse ($children as $child)

                            <tr>
                                    <th scope="row">{{ $child->id}}</th>
                                    <th scope="row">{{ $child->first_name}}</th>
                                    <th scope="row">{{ $child->last_name}}</th>
                                    <th scope="row">{{ __($child->gender)}}</th>
                                  </tr>
                            @empty
                            <tr>
                                    <th  colspan="2" >
                                        {{ "No hay items disponibles"}}
                                    </th>
                                    <th  colspan="2" >
                                    </th>
                                    <a name="" id="" class="btn btn-primary" href="{{route("jugadores.create")}}" role="button">Registrar niño</a>
                                  </tr>
                            @endforelse

                                </tbody>
                              </table>

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
