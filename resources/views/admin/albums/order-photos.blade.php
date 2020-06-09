@extends('layouts.app')

@section('title', 'Ordenar Photos')

@push('style')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush

@section('content')
    {{--        {{ dd($album) }}--}}
    <div class="container">
        <div class="card">
            <div class="row p-3 justify-content-center">
                <div class="col-12">
                    <h3>{{ $album->title }} con su lista de fotos</h3>
                </div>
                <div class="col-12">
                    <ul class="list-photos" id="list-photos" ondrop="drop(event)">
                        @forelse($album->Albums_photos as $photo)
                            <li class="photo list-group-item my-3" style="cursor: all-scroll; padding: 1rem; border: 0px !important;" id="{{ $photo->id }}" draggable="true" order="{{ $photo->order }}" ondrag="dragstart(event)" ondragover="allow(event)">
                                <div class="row align-items-center bg-white">
                                    <div class="col-1">
                                        <span class="handle mt-md-5" style="cursor: all-scroll">
                                            <i class="fas fa-arrows-alt"></i>
                                        </span>
                                    </div>
                                    <div class="col-11">
                                        <div class="row align-items-center mx-5 p-3 bg-white" style="cursor: auto; border: 3px solid #1b4b72; border-radius: 5px">
                                            <div class="col-12">
                                                <div class="row justify-content-md-between justify-content-end align-items-center">
                                                    <p class="m-0 d-none d-md-inline">{{ $photo->photoId->title }} <br> {{ $photo->photoId->description }} </p>
                                                    <img src="{{ asset('storage/users') . '/' . $photo->url }}" class="w-25" style="min-width: 150px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <h3>Este album no tiene fotos.</h3>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('js/helpers/helperDragAndDrop.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
@endpush

