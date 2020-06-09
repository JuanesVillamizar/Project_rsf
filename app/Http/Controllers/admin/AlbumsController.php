<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormAlbumsRequests;
use App\Http\Requests\FormUpdateAlbumsRequest;
use App\Models\Album;
use App\Models\Albums_photos;
use App\Traits\Albums_photos as SetAlbumsPhotos;
use App\Traits\Directories;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    use Directories, SetAlbumsPhotos;

    public function index()
    {
        $albums = Album::getAlbumForUser(auth()->user()->id);
        return view('admin.albums.index', compact('albums'));
    }

    public function showModal(Request $request){
        $type = $request->action;
        if($type == 'create'){
            return view('admin.albums.includes.formAlbums', compact('type'));
        }
        $album = Album::getAlbumForUser($request->id);
        return view('admin.albums.includes.formAlbums', compact('type', 'album'));
    }

    public function changeIsVisible(Request $request){
        $album = Album::getAlbumForId($request->id)[0];
        $data['isVisible'] = $request->status;
        return $album->update($data);
    }

    public function listAllPhotoForThisAlbum(int $id){
        try {
            $album = Album::getAlbumWithAllPhotos($id)[0];
            if($album->isVisible === 1){
                return view('admin.albums.show-photos', compact('album'));
            }
            return back();
        }catch (\Exception $e){
            return back();
        }
    }

    public function changeOrderPhotos(int $id){
        $album = Album::getAlbumWithAllPhotos($id)[0];
        return view('admin.albums.order-photos', compact('album'));
    }

    public function updateOrderPhotos(Request $request){
        foreach($request->all() as $key => $value){
            if(!is_numeric($value)){
                return false;
            }
        }
        Albums_photos::updateOrder($request->idSelected, $request->orderChange);
        Albums_photos::updateOrder($request->idChange, $request->orderSelected);
        return true;
    }

    public function store(FormAlbumsRequests $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        Album::saveAlbum($data);
        $this->createDirectory(str_replace(' ', '_', auth()->user()->nickName) . '_' . auth()->user()->id . '/' . str_replace(' ', '_', $data['title']) );
        return back();
    }

    public function update(FormUpdateAlbumsRequest $request, $id)
    {
        $data['description'] = $request->validated()['description'];
        $album = Album::getAlbumForUser($id);
        $album->update($data);
        return back();
    }

    public function destroy($id)
    {
        $data = Album::getAlbumForId($id)[0];
        $this->deleteSetImageForThisAlbum($data->id);
        $data->delete();
        $this->deleteDirectory(str_replace(' ', '_', auth()->user()->nickName) . '_' . auth()->user()->id . '/' . $data['title']);
        return back();
    }
}
