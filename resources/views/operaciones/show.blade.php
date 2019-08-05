@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                <div class="card-header">
                    <h1>
                        Reto {{$reto->id}}
                        </h1>
                </div>

                    <div class="card-body">
                            <div class="container">
                                    <form>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label text-sm-right">{{__("Difficulty")}}</label>
                                            <div class="col-sm-6">
                                            <label class="col-form-label font-weight-bold text-uppercase text-white" >{{__("Level ").$reto->difficulty}}</label>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label text-sm-right">{{__("Num Sum")}}</label>
                                            <div class="col-sm-6">
                                            <label class="col-form-label font-weight-bold text-uppercase text-white" >{{ $reto->num_sums}}</label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label text-sm-right">{{__("Num Subtraction")}}</label>
                                            <div class="col-sm-6">
                                            <label class="col-form-label font-weight-bold text-uppercase text-white" >{{ $reto->num_subtraction}}</label>
                                            </div>
                                        </div>
                                        {{-- {{dd($reto->operations)}} --}}

                                        <table class="table table-dark">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">{{__("Type")}}</th>
                                                    <th scope="col">{{__("Term")}} 1</th>
                                                    <th scope="col">{{__("Term")}} 2</th>
                                                    <th scope="col">{{__("Result")}}</th>
                                                    <th scope="col"></th>
                                                  </tr>
                                                </thead>
                                                <tbody>

                                        @forelse ($reto->operations as $operation)

                                        <tr>
                                                <th scope="row">{{ $operation->id}}</th>
                                                <th scope="row">{{ __($operation->type)}}</th>
                                                <th scope="row">{{ $operation->value_one}}</th>
                                                <th scope="row">{{ $operation->value_two}}</th>
                                                <th scope="row">{{ $operation->value_three}}</th>
                                        <th scope="row"> <a name="" id="" class="btn btn-warning" href="{{route("operaciones.show",[$operation->id])}}" role="button">{{__("Show")}}</a></th>
                                              </tr>
                                        @empty
                                        <tr>
                                                <th  colspan="4" >
                                                    {{ "No hay items disponibles"}}
                                                </th>

                                        @endforelse

                                            </tbody>
                                          </table>
                                    </form>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


