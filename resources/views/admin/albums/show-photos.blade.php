@extends('layouts.app')

@section('title', 'Albumes')

@section('content')
{{--    {{ dd($album) }}--}}
    <div class="container">
        <div class="card">
            <div class="row p-3 justify-content-center">
                <div class="col-12">
                    <h3>{{ $album->title }}</h3>
                </div>
                <div class="col-12">
                    <div class="row">
                        @foreach($album->Albums_photos as $photo)
                            @if($photo->photoId->isVisible == 1)
                                <div class="col-12 col-md-6 col-lg-3 py-2">
                                    <div class="card w-100 py-2 text-center" style="height: 260px;">
                                        <a href="{{ route('my-photos.show', $photo->id) }}">
                                            <img
                                                src="{{ asset('storage/users') . '/' . str_replace(' ', '_', $photo->url) }}"
                                                class="card-img-top img-fluid"
                                                style="width: 150px; margin:  0 auto; height: 150px; border-radius: 5px"
                                                alt="Foto de {{ $album->User->nickName }} con titulo {{ $photo->photoId->title }}"
                                            >
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title text-truncate">{{ $photo->photoId->title }}</h5>
                                            <div class="row justify-content-center my-1">
                                                <div class="col-6">
                                                    <div class="row justify-content-between">
                                                        <div class="col-6">
                                                            <div class="row">
                                                                <span class="text-danger mx-1 elementNumber{!! $photo->id !!}" style="line-height: 15px">{{ $photo->likes }}</span>
                                                                <i class="far fa-heart text-danger like" idSet="{{ $photo->id }}"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-6" style="line-height: 15px" >
                                                            <i class="far fa-comment text-info" idSet="{{ $photo->id }}"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mt-2 text-truncate text-muted" style="line-height: 15px">{{ $album->User->nickName }}</p>
                                        </div>

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
    <script src="{{ asset('js/helpers/helperDragAndDrop.js') }}"></script>
@endpush
