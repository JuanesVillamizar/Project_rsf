<form action="{{ $type == 'create' ? route('my-photos.store') : route('my-photos.update', $photo->id) }}" method="POST" id="{{ $type == 'create' ? 'newPhotoForm' : 'editPhotoForm' }}" enctype="multipart/form-data">
    @csrf
    {{ $type == 'update' ? method_field('PUT') : '' }}
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="title">Titulo de la imagen</label>
                <input type="text" name="title" id="title" value="{{ $type == 'update' ? $photo->title : '' }}" class="form-control" {{ $type == 'update' ? 'readonly disebled' : 'required' }}>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="description">Descriccion de la imagen</label>
                <input type="text" name="description" id="description" value="{{ $type == 'update' ? $photo->description : '' }}" class="form-control" required>
            </div>
        </div>
        @if($type == 'create')
            <div class="col-12">
                <div class="form-group">
                    <div class="row">
                        @if($albums->isNotEmpty())
                            <div class="col-12">
                                <h4>Selecciona los albums que quieras</h4>
                            </div>
                            @foreach($albums as $album)
                                <div class="col-12 col-md-6">
                                    <div class="alert alert-info" role="alert">
                                        <input type="checkbox" name="album_id[]" id="album_id" value="{{ $album->id }}"> <span class="text-truncate">{{ $album->title }}</span>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="col-12">
                                <h4>Actualmente no tienes albums, necesitas crear al menos uno</h4>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <input type="file" class="btn btn-success w-100" name="photo" id="photo" required>
                </div>
            </div>
            <div class="col-12">
                <div class="row d-flex justify-content-center justify-content-md-start mx-md-3">
                    <div class="form-group">
                        <div class="custom-control custom-switch pt-1">
                            <input type="checkbox" class="custom-control-input" id="isVisible" name="isVisible" value="1">
                            <label class="custom-control-label" for="isVisible">Visible</label>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</form>
<div class="alert alert-danger col-12 d-none" role="alert" id="message-error">
    Por favor diligenciar todo el formulario
</div>
