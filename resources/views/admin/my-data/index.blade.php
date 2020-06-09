@extends('layouts.app')

@section('title', 'Mi informacion personal')

@push('style')
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css"  rel="stylesheet">
@endpush

@section('content')
    <div class="container bg-white border-light">
        <h2>Mis datos personales</h2>
        <div class="alert alert-success" role="alert">
            El usuario {{ auth()->user()->nickName }} se unio al Club el {{ explode(' ', auth()->user()->created_at)[0] }}
        </div>
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
        <form action="{{ isset($person->cc) ? route('my-data.update', $person->id) : route('my-data.store') }}" method="POST" class="row">
            @csrf
            {{ isset($person->cc) ? method_field('PUT') : '' }}
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="cc">Cedula</label>
                    <input type="text" name="cc" id="cc" value="{{ isset($person->cc) ? $person->cc : ''}}" class="form-control" required {{ isset($person->cc) ? 'readOnly' : ''}}>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ isset($person->name) ? $person->name : ''}}" class="form-control" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="lastName">Apellido</label>
                    <input type="text" name="lastName" id="lastName" value="{{ isset($person->lastName) ? $person->lastName : ''}}" class="form-control" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="phone">Telefono</label>
                    <input type="number" name="phone" id="phone" value="{{ isset($person->phone) ? $person->phone : ''}}" class="form-control" required>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="email" name="email" id="email" value="{{ isset($person->email) ? $person->email : auth()->user()->email }}" class="form-control" required {{ isset($person->email) ? 'readOnly' : ''}}>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class=" btn btn-success w-100 my-4 px-5">{{ isset($person->name) ? 'Actualizar' : 'Guardar'}}</button>
            </div>
        </form>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/admin/albums/albums.js') }}"></script>
@endpush

