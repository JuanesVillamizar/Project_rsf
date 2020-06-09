<?php


namespace App\Traits;


use App\Http\Requests\FormPhotoRequest;
use App\Models\Album;
use App\Models\Albums_photos as SetAlbumsPhoto;

trait Albums_photos
{
    use Images;
    public function saveSet(FormPhotoRequest $request, int $idPhoto, $dataPhoto){
        $album_photo = $request->validate([
            'album_id' => 'required'
        ]);
        foreach ($album_photo['album_id'] as $album){
            $getAlbum = Album::getAlbumForId($album)[0];
            $this->saveImage($request, $getAlbum->title . '/' . $dataPhoto['title']);
            $this->saveImage($request, $dataPhoto['title']);
            $set['album_id'] = $album;
            $set['photo_id'] = $idPhoto;
            $set['order'] = count(SetAlbumsPhoto::countPhotosThisAlbum($album)) + 1;
            $set['url'] = auth()->user()->nickName . '_' . auth()->user()->id . '/' . str_replace(' ', '_', $getAlbum->title) . '/' . str_replace(' ', '_', $dataPhoto['title']) . '.jpg';
            SetAlbumsPhoto::saveSetALbumPhoto($set);
        }
    }

    public function deleteSetImageForThisAlbum($idAlbum){
        $allSet = SetAlbumsPhoto::getInfoPhotosForAlbum($idAlbum);
        foreach($allSet as $set){
            $set->photoId->delete();
            $this->deleteImage($set->photoId->title);
        }
    }
}
