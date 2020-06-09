<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Albums_photos extends Model
{
    protected $connection = 'mysql';
    protected $guarded = [];
    protected $table = 'albums_photos';
    protected $fillable = [
        'album_id', 'photo_id', 'set_comments', 'order', 'url', 'likes'
    ];

    public static function saveSetALbumPhoto($data)
    {
        return self::create($data);
    }

    public static function countPhotosThisAlbum(int $idAlbum)
    {
        return self::where('album_id', $idAlbum)->get();
    }

    public static function getInfoPhotosForAlbum(int $idAlbum)
    {
        return self::where('album_id', $idAlbum)->with('photoId')->get();
    }

    public static function getSetForId(int $id)
    {
        return self::where('id', $id)->get();
    }

    public static function updateOrder(int $id, int $order)
    {
        return self::where('id', $id)->update(['order' => $order]);
    }

    public static function addLike(int $id)
    {
        $likes = self::getSetForId($id)[0]->likes;
        return self::where('id', $id)->update(['likes' => $likes + 1]);
    }

    public static function getAllInfo()
    {
        return self::with('photoId', 'albumId.User')->orderBy('created_at', 'desc')->get();
    }

    public static function getInfoPhotoForIdSet(int $id)
    {
        return self::where('id', $id)->with('photoId', 'albumId.User')->get()->first();
    }


    public function photoId(){
        return self::belongsTo(Photos::class, 'photo_id');
    }
    public function albumId(){
        return self::belongsTo(Album::class, 'album_id');
    }
}
