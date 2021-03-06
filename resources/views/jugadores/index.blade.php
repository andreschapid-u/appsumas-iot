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
                                <h2>MIS NIÑOS</h2>
                            </div>
                            <div class="col-sm-6">
                                    <a name="" id="" class="btn btn-primary float-right text-white" href="{{route("jugadores.create")}}" role="button">{{__("Register")}}</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                            <table class="table table-dark">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{__("First Name")}}</th>
                                        <th scope="col">{{__("Last Name")}}</th>
                                        <th scope="col">{{__("Gender")}}</th>
                                        <th scope="col">{{__("Code")}}</th>
                                      </tr>
                                    </thead>
                                    <tbody>

                            @forelse ($children as $child)

                            <tr>
                                    <th scope="row">{{ $child->id}}</th>
                                    <th scope="row">{{ $child->first_name}}</th>
                                    <th scope="row">{{ $child->last_name}}</th>
                                    <th scope="row">{{ __($child->gender)}}</th>
                                    <th scope="row">{{ $child->code}}</th>
                                  </tr>
                            @empty
                            <tr>
                                    <th  colspan="4" >
                                        {{ "No hay items disponibles"}}
                                    </th>
                                    <th  colspan="2" >

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
