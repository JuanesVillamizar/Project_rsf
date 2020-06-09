<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormPhotoRequest;
use App\Http\Requests\FormUpdatePhotoRequest;
use App\Models\Album;
use App\Models\Albums_photos;
use App\Models\Photos;
use App\Traits\Albums_photos as Set;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    use Set;

    public function index()
    {
        $photos = Photos::getAllForThisUser(auth()->user()->id);
        return view('admin.photos.index', compact('photos'));
    }

    public function showModal(Request $request)
    {
        $type = $request->action;
        $albums = Album::getAlbumForUser(auth()->user()->id);
        if($type == 'create'){
            return view('admin.photos.includes.formPhotos', compact('type', 'albums'));
        }
        $photo = Photos::getPhotoForId($request->id)[0];
        return view('admin.photos.includes.formPhotos', compact('type', 'photo', 'albums'));
    }

    public function changeIsVisible(Request $request)
    {
        $photo = Photos::getPhotoForId($request->id)[0];
        $data['isVisible'] = $request->status;
        return $photo->update($data);
    }

    public function store(FormPhotoRequest $request)
    {
        $dataPhoto = $request->validated();
        $dataPhoto['user_id'] = auth()->user()->id;
        $idPhoto = Photos::savePhoto($dataPhoto)->id;
        $this->saveSet($request, $idPhoto, $dataPhoto);
        return back();
    }

    public function show(int $idPhoto){
        try {
            $photo = Albums_photos::getInfoPhotoForIdSet($idPhoto);
            if($photo->photoId->isVisible === 1){
                return view('admin.photos.show', compact('photo'));
            }
            return back();
        }catch (\Exception $e){
            return back();
        }


    }

    public function update(FormUpdatePhotoRequest $request, int $photos)
    {
        $data = $request->validated();
        $photo = Photos::getPhotoForId($photos)[0];
        $photo->update($data);
        return back();
    }

    public function destroy(int $id)
    {
        $photos = Photos::getAllInfoPhotoToThisUser($id)[0];
        foreach ($photos->Albums_photos as $set){
            $this->deleteImage($set->albumId->title . '/' . $photos->title);
        }
        $this->deleteImage($photos->title);
        $photos->delete();
        return back();
    }
}
