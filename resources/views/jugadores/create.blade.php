@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('jugadores.store') }}">
                        @csrf

                        @error('rol')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                            <div class="col-md-6">
                                <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday">

                                @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6 options-radio">
                                <input id="nino" type="radio" name="gender" value="Male" />
                                <label class="option-radio img-nino" for="nino"></label>
                                <input  checked="checked" id="nina" type="radio" name="gender" value="Female" />
                                <label class="option-radio img-nina"for="nina"></label>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-3 col-form-label text-md-right">{{ __('Avatar') }}</label>

                            <div class="col-md-7 options-radio">
                                @foreach ($avatars as $avatar)

                                    <input id="{{$avatar->id}}" type="radio" name="avatar" value="{{$avatar->id}}" checked="checked" />
                            <label class="option-radio" style="background-image: url('{{$avatar->route}}')" for="{{$avatar->id}}"></label>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                                <div class="col-md-6">
                                    <input readonly id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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

@section('scripts')
    <script>
        var device = "{{auth()->user()->devices()->first()->mac}}"
var tagActual = firebase.database().ref('gateway/'+device+'/recursos/dispositivo_IoT/tag_actual');
tagActual.set("");
        tagActual.on('value', function(snapshot) {
            // alert(snapshot.val());
            document.getElementById("code").value = snapshot.val();
            console.log(snapshot.val());
            // updateStarCount(postElement, snapshot.val());
        });
    </script>
@endsection
