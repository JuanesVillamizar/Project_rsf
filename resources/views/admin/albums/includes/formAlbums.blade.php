<form action="{{ $type == 'update' ? route('my-albums.update', $album->id) : route('my-albums.store') }}" method="POST" id="{{ $type == 'update' ? 'editAlbumForm' : 'newAlbumForm' }}">
    @csrf
    {{ $type == 'update' ? method_field('PUT') : '' }}
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="title">Titulo del album</label>
                <input type="text" name="title" id="title" value="{{ $type == 'update' ? $album->title : '' }}" class="form-control" {{ $type == 'update' ? 'readonly disebled' : 'required' }}>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label for="description">Descriccion del album</label>
                <input type="text" name="description" id="description" value="{{ $type == 'update' ?  $album->description : '' }}" class="form-control" required>
            </div>
        </div>
    </div>
</form>
