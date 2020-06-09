@extends('layouts.app')

@section('title', $photo->photoId->title)

@section('content')
    <div class="container">
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
        <div class="row">
            <div class="col-12">
                <div class="bg-white text-center p-2 showImage">
                    <a
                        href="{{ asset('storage/users')  . '/' . $photo->albumId->user->nickName . "_" . $photo->albumId->user->id . '/' . str_replace(' ', '_', $photo->albumId->title) . '/' . str_replace(' ', '_', $photo->photoId->title ) }}.jpg"
                        target="_blank"
                    >
                        <img
                            src="{{ asset('storage/users')  . '/' . $photo->albumId->user->nickName . "_" . $photo->albumId->user->id . '/' . str_replace(' ', '_', $photo->albumId->title) . '/' . str_replace(' ', '_', $photo->photoId->title ) }}.jpg"
                            alt="Foto de {{ $photo->albumId->User->nickName }} con titulo {{ $photo->photoId->title }}"
                            class="imageU w-100"
                        >
                    </a>
                    <div class="row pt-1 pt-md-3 ">
                        <div class="col-12 col-sm-6 col-md-3">
                            <h5 class="card-title text-truncate m-1">Titulo: {{ $photo->photoId->title }}</h5>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <h5 class="card-title text-truncate m-1">Album: {{ $photo->albumId->title }}</h5>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <h5 class="card-title text-truncate m-1">Usuario: {{ $photo->albumId->User->nickName }}</h5>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <h5 class="m-0 text-truncate m-1">Fecha: {{ explode(' ', $photo->photoId->created_at)[0] }}</h5>
                        </div>
                        <div class="col-12 mt-1 mt-md-3">
                            <div class="row justify-content-center">
                                <div class="col-3">
                                    <div class="row">
                                        <span class="text-danger mx-1 elementNumber{!! $photo->id !!}" style="line-height: 15px">{{ $photo->likes }}</span>
                                        <i class="far fa-heart text-danger like" idSet="{{ $photo->id }}"></i>
                                    </div>
                                </div>
                                <div class="col-3" style="line-height: 15px; cursor: pointer" >
                                    <i class="far fa-comment text-info" idSet="{{ $photo->id }}"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <form action="{{ route('createComment') }}" class="col-12" method="post">
                        <div class="insertComment">
                            <div class="form-group row px-3 my-2">
                                <label for="comment">Escribe un comentario</label>
                                <input type="text" name="comment" id="comment" class="form-control col-12" placeholder="Escribe aqui..." required>
                                <input type="submit" value="Enviar" class="btn btn-success d-md-none col-12 my-3">
                                <input type="hidden" name="set_id" value="{{ $photo->id }}" required>
                                @csrf
                            </div>
                        </div>
                    </form>
                    <div class="col-12">
                        <div class="row" id="comments">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="{{ asset('js/admin/start/start.js') }}"></script>
    <script src="{{ asset('js/admin/photos/commentsPhoto.js') }}"></script>
@endpush
