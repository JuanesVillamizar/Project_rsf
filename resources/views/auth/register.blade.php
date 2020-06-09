@extends('layouts.app')

@push('style')
    <link href="{{ asset('css/style.css') }}"  rel="stylesheet">
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>
                                    {{$error}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="nickName" class="col-md-4 col-form-label text-md-right">{{ __('Apodo') }}</label>

                            <div class="col-md-6">
                                <input id="nickName" type="text" class="form-control @error('nickName') is-invalid @enderror" name="nickName" value="{{ old('nickName') }}" required autocomplete="nickName" autofocus>

                                @error('nickName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="avatar" class="col-md-4 col-form-label text-md-right">{{ __('Avatar') }}</label>

                            <div class="col-md-6">
                                <input id="avatar" type="hidden" class="form-control " name="avatar">
                                <div class="container row justify-content-center justify-content-md-start container-avatars">
                                    <div class="avatars col-12 col-md-6 col-lg-4 p-2">
                                        <div class="d-flex justify-content-center">
                                            <input type="radio" name="avatar" id="avatar1" style="display: none" value="Hombre1">
                                            <img src="{{ asset('storage/avatars/Hombre1.png') }}" alt="img avatars" for="avatar1" style="border-radius: 70px" class="w-md-50 img-fluid">
                                        </div>
                                    </div>
                                    <div class="avatars col-12 col-md-6 col-lg-4 p-2">
                                        <div class="d-flex justify-content-center">
                                            <input type="radio" name="avatar" id="avatar2" style="display: none" value="Mujer1">
                                            <img src="{{ asset('storage/avatars/Mujer1.png') }}" alt="img avatars" for="avatar2" style="border-radius: 70px" class="w-md-50 img-fluid">
                                        </div>
                                    </div>
                                    <div class="avatars col-12 col-md-6 col-lg-4 p-2">
                                        <div class="d-flex justify-content-center">
                                            <input type="radio" name="avatar" id="avatar3" style="display: none" value="Hombre2">
                                            <img src="{{ asset('storage/avatars/Hombre2.png') }}" alt="img avatars" for="avatar3" style="border-radius: 70px" class="w-md-50 img-fluid">
                                        </div>
                                    </div>
                                    <div class="avatars col-12 col-md-6 col-lg-4 p-2">
                                        <div class="d-flex justify-content-center">
                                            <input type="radio" name="avatar" id="avatar4" style="display: none" value="Mujer2">
                                            <img src="{{ asset('storage/avatars/Mujer2.png') }}" alt="img avatars" for="avatar4" style="border-radius: 70px" class="w-md-50 img-fluid">
                                        </div>
                                    </div>
                                    <div class="avatars col-12 col-md-6 col-lg-4 p-2">
                                        <div class="d-flex justify-content-center">
                                            <input type="radio" name="avatar" id="avatar5" style="display: none" value="Hombre3">
                                            <img src="{{ asset('storage/avatars/Hombre3.png') }}" alt="img avatars" for="avatar5" style="border-radius: 70px" class="w-md-50 img-fluid">
                                        </div>
                                    </div>
                                    <div class="avatars col-12 col-md-6 col-lg-4 p-2">
                                        <div class="d-flex justify-content-center">
                                            <input type="radio" name="avatar" id="avatar6" style="display: none" value="Mujer3">
                                            <img src="{{ asset('storage/avatars/Mujer3.png') }}" alt="img avatars" for="avatar6" style="border-radius: 70px" class="w-md-50 img-fluid">
                                        </div>
                                    </div>
                                    <div class="avatars col-12 col-md-6 col-lg-4 p-2">
                                        <div class="d-flex justify-content-center">
                                            <input type="radio" name="avatar" id="avatar7" style="display: none" value="Hombre4">
                                            <img src="{{ asset('storage/avatars/Hombre4.png') }}" alt="img avatars" for="avatar7" style="border-radius: 70px" class="w-md-50 img-fluid">
                                        </div>
                                    </div>
                                    <div class="avatars col-12 col-md-6 col-lg-4 p-2">
                                        <div class="d-flex justify-content-center">
                                            <input type="radio" name="avatar" id="avatar8" style="display: none" value="Mujer4">
                                            <img src="{{ asset('storage/avatars/Mujer4.png') }}" alt="img avatars" for="avatar8" style="border-radius: 70px" class="w-md-50 img-fluid">
                                        </div>
                                    </div>
                                </div>
                                @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electronico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
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
