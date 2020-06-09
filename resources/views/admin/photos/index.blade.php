@extends('layouts.app')

@section('title', 'Photos')

@push('style')
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css"  rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
@endpush

@section('content')
    <div class="container bg-white border-light">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 d-flex justify-content-center py-2 justify-content-md-start">
                <h3>Tus Fotos</h3>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center py-2 justify-content-md-end">
                <button class="btn btn-success" id="btn-add-photo">Agregar foto</button>
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
            <div class="col-12">
                @if($photos->isNotEmpty())
                    <div class="row">
                        @foreach($photos as $photo)
                            <div class="col-12 col-sm-6 col-md-3 my-3">
                                <div class="card w-100 py-3">
                                    <img src="{{ asset('storage/users') . '/' . auth()->user()->nickName . '_' . auth()->user()->id . '/' . str_replace(' ','_', $photo->title) }}.jpg"
                                         class="card-img-top img-fluid"
                                         style="width: 150px; margin:  0 auto; height: 150px; border-radius: 5px"
                                         alt="Foto de {{ auth()->user()->nickName }} con titulo {{ $photo->title }}">
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate">{{ $photo->title }}</h5>
                                        <p class="card-text text-truncate">{{ $photo->description }}</p>
                                    </div>
                                    <div class="row d-flex justify-content-center bg-light mx-3">
                                        <form action="{{ route('my-photos.destroy', $photo->id) }}" method="POST" class="mx-1 ">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn bg-transparent btn-delete-album" type="submit" idPhoto="{{ rand(0,100) }}">
                                                <i class="far fa-trash-alt px-0 text-danger"></i>
                                            </button>
                                        </form>
                                        <button class="btn bg-transparent mx-1 btn-edit-photo" idPhoto="{{$photo->id}}">
                                            <i class="fas fa-pencil-alt px-0 text-warning"></i>
                                        </button>
                                        <button class="btn bg-transparent mx-1 btn-is-visible" isVisible="{{ $photo->isVisible }}" idPhoto="{{$photo->id}}">
                                            <i class="far {{ $photo->isVisible == 1 ? 'fa-eye' : 'fa-eye-slash' }} text-info"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <h3 class="text-center mt-3">No hay fotos</h3>
                @endif
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/admin/photos/photos.js') }}"></script>
@endpush

