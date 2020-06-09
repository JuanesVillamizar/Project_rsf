@extends('layouts.app')

@section('title', 'Inicio')

@push('style')
    <link href="{{ asset('css/generalStyles.css') }}" rel="stylesheet">
@endpush

@section('content')
{{--    {{ dd($albums) }}--}}
<div class="container">
    <div class="m-2 row justify-content-center">
        <input type="text" name="search" id="search" placeholder="Buscar por titulo..." class="col-12" style="border-radius: 15px">
        <div class="col-12">
            <div class="row" id="findPhotos">

            </div>
        </div>
    </div>
    <div class="card">
            <nav>
                <div class="nav nav-tabs justify-content-md-end justify-content-center" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-photos-tab" data-toggle="tab" href="#nav-photos" role="tab" aria-controls="nav-photos" aria-selected="true">Fotos</a>
                    <a class="nav-item nav-link" id="nav-albums-tab" data-toggle="tab" href="#nav-albums" role="tab" aria-controls="nav-albums" aria-selected="false">Albums</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-photos" role="tabpanel" aria-labelledby="nav-photos-tab">
                    <div class="row p-3 justify-content-center">
                        @foreach($sets as $set)
                            @if($set->photoId->isVisible == 1)
                                <div class="col-12 col-md-6 col-lg-3 py-2">
                                    <div class="card w-100 py-2 text-center" style="height: 260px;">
                                        <a href="{{ route('my-photos.show', $set->id) }}">
                                            <img
                                                src="{{ asset('storage/users') . '/' . $set->albumId->user->nickName . "_" . $set->albumId->user->id . '/' . str_replace(' ', '_', $set->albumId->title) . '/' . str_replace(' ', '_', $set->photoId->title) }}.jpg"
                                                class="card-img-top img-fluid"
                                                style="width: 150px; margin:  0 auto; height: 150px; border-radius: 5px"
                                                alt="Foto de {{ $set->albumId->User->nickName }} con titulo {{ $set->photoId->title }}"
                                            >
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title text-truncate">{{ $set->photoId->title }}</h5>
                                            <div class="row justify-content-center my-1">
                                                <div class="col-6">
                                                    <div class="row justify-content-around">
                                                        <div class="col-6">
                                                            <div class="row">
                                                                <span class="text-danger mx-1 elementNumber{!! $set->id !!}" style="line-height: 15px">{{ $set->likes }}</span>
                                                                <i class="far fa-heart text-danger like" idSet="{{ $set->id }}"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-6" style="line-height: 15px" >
                                                            <i class="far fa-comment text-info" idSet="{{ $set->id }}"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-2 text-truncate text-muted" style="line-height: 15px">{{ $set->albumId->user->nickName }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade pt-0" id="nav-albums" role="tabpanel" aria-labelledby="nav-albums-tab">
                    <div class="row p-3 justify-content-center">
                        @foreach($albums as $album)
                            @if($album->isVisible == 1)
                                <div class="col-12 col-md-6 col-lg-3 py-2">
                                    <div class="card w-100 py-2 text-center" style="height: 200px">
                                        <div class="card-body">
                                            <a href="{{ route('list-photos', $album->id) }}">
                                                <h5 class="card-title text-truncate">{{ $album->title }}</h5>
                                            </a>
                                            <div class="row justify-content-center my-1">
                                                <div class="container">
                                                    <p> {{ $album->description }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-2 text-truncate text-muted" style="line-height: 15px">{{ $album->user->nickName }}</p>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('js/admin/start/start.js') }}"></script>
@endpush
