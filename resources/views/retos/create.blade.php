@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

{{-- "name","mac","state","current_tag_id","feedback" --}}

                    <form method="POST" action="{{ route('retos.store') }}">
                        @csrf
                        @error('maximo')
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror

                        <div class="form-group row">
                            <label for="num_sums" class="col-md-4 col-form-label text-md-right">{{ __('Num Sumas') }}</label>

                            <div class="col-md-6">
                                <input id="num_sums" type="text" class="form-control @error('num_sums') is-invalid @enderror" name="num_sums" value="{{ old('num_sums') }}" required autocomplete="num_sums" autofocus>

                                @error('num_sums')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="num_subtraction" class="col-md-4 col-form-label text-md-right">{{ __('Num Subtraction') }}</label>

                            <div class="col-md-6">
                                <input id="num_subtraction" type="text" class="form-control @error('num_subtraction') is-invalid @enderror" name="num_subtraction" value="{{ old('num_subtraction') }}" required autocomplete="num_subtraction" autofocus>

                                @error('num_subtraction')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="subtraction" class="col-md-4 col-form-label text-md-right">{{ __('Difficulty') }}</label>

                                <div class="col-md-6">
                                                            <!-- Group of default radios - option 1 -->
                                    <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="difficulty" checked value="1">
                                            <label class="custom-control-label" for="defaultGroupExample1">Nivel 1 (Fácil)</label>

                                        </div>

                                        <!-- Group of default radios - option 2 -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="difficulty" value="2">
                                            <label class="custom-control-label" for="defaultGroupExample2">Nivel 2 (Medio)</label>
                                        </div>

                                        <!-- Group of default radios - option 3 -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="difficulty" value="3">
                                            <label class="custom-control-label" for="defaultGroupExample3">Nivel 3 (Difícil)</label>
                                        </div>
                                </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
