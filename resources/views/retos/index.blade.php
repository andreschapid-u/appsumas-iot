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

                                <h2>RETOS</h2>
                            </div>
                            <div class="col-sm-6">

                                <a name="" id="" class="btn btn-primary float-right text-white" href="{{route("retos.create")}}" role="button">{{__("Register")}}</a>
                            </div>
                        </div>

                    </div>



                    <div class="card-body">
                            <table class="table table-dark">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{__("Difficulty")}}</th>
                                        <th scope="col">{{__("Num Sum")}}</th>
                                        <th scope="col">{{__("Num Subtraction")}}</th>
                                        <th scope="col">{{__("Show")}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                            @forelse ($challenges as $challenge)

                            <tr>
                                    <th scope="row">{{ $challenge->id}}</th>
                                    <th scope="row">{{ $challenge->difficulty}}</th>
                                    <th scope="row">{{ $challenge->num_sums}}</th>
                                    <th scope="row">{{ $challenge->num_subtraction}}</th>
                            <th scope="row"> <a name="" id="" class="btn btn-warning" href="{{route("retos.show",[$challenge->id])}}" role="button">{{__("Show")}}</a></th>
                                </tr>
                            @empty
                            <tr>
                                    <th  colspan="4" >
                                        {{ "No hay items disponibles"}}
                                    </th>

                            @endforelse

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
