@extends('layouts.app')

@section('title', 'Albums')

@push('style')
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@3/dark.css"  rel="stylesheet">
@endpush

@section('content')
    <div class="container bg-white border-light">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 d-flex justify-content-center py-2 justify-content-md-start">
                <h3>Tus albumes</h3>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center py-2 justify-content-md-end">
                <button class="btn btn-success" id="btn-add-album">Agregar album</button>
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
                @if($albums->isNotEmpty())
                    <div class="row">
                        @foreach($albums as $album)
                            <div class="col-12 col-sm-6 col-md-3 my-3">
                                <div class="card w-100">
                                    <div class="card-body px-2">
                                        <div class="row justify-content-between mx-2">
                                            <a href="{{ route('list-photos', $album->id) }}">
                                                <h5 class="card-title text-truncate">{{ $album->title }}</h5>
                                            </a>
                                            <p class="text-muted" style="font-size: .7rem">{{ explode(' ', $album->created_at)[0] }}</p>
                                        </div>
                                        <p class="card-text text-truncate px-2">{{ $album->description }}</p>
                                        <div class="row d-flex justify-content-center bg-light mx-3 py-2">
                                            <form action="{{ route('my-albums.destroy', $album->id) }}" method="POST" class="mx-1 ">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn bg-transparent border-info btn-delete-album" type="submit" idAlbum="{{ rand(0,100) }}">
                                                    <i class="far fa-trash-alt px-0 text-danger"></i>
                                                </button>
                                            </form>
                                            <button class="btn bg-transparent border-info mx-1 btn-edit-album" idAlbum="{{$album->id}}">
                                                <i class="fas fa-pencil-alt px-0 text-warning"></i>
                                            </button>
                                            <button class="btn bg-transparent border-info mx-1 btn-is-visible" isVisible="{{ $album->isVisible }}" idAlbum="{{$album->id}}">
                                                <i class="far {{ $album->isVisible == 1 ? 'fa-eye' : 'fa-eye-slash' }} text-info"></i>
                                            </button>
                                            <a href="{{ route('change-order-photos', $album->id) }}" class="btn bg-transparent border-info mx-1">
                                                <i class="fas fa-list text-success"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <h3 class="text-center mt-3">No hay albumes</h3>
                @endif
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/admin/albums/albums.js') }}"></script>
@endpush
