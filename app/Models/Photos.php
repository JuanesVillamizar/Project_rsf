<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    protected $connection = 'mysql';
    protected $guarded = [];
    protected $table = 'photos';
    protected $fillable = [
        'id', 'user_id', 'title', 'description', 'isVisible'
    ];

    public static function getAllForThisUser(int $id)
    {
        return self::where('user_id', $id)->get();
    }

    public static function savePhoto($data)
    {
        return self::create($data);
    }

    public static function getPhotoForId(int $id)
    {
        return self::where('id', $id)->get();
    }

    public static function getPhotoForTitle($text){
        return self::where('isVisible', 1)->where('title', 'like', $text . "%")->with('Albums_photos')->get();
    }

    public static function getAllInfoAlbum()
    {
        return self::with('Albums_photos.albumId.User')->get();
    }

    public static function getAllInfoPhotoToThisUser(int $id)
    {
        return self::where('id', $id)->with('Albums_photos.albumId')->get();
    }

    public function Albums_photos()
    {
        return $this->hasMany(Albums_photos::class, 'photo_id');
    }
}
