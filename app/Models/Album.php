<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $connection = 'mysql';
    protected $guarded = [];
    protected $table = 'albums';
    protected $fillable = [
        'title', 'description', 'user_id', 'isVisible'
    ];

    public static function getAll(){
        return self::all();
    }
    public static function getAllVisible(){
        return self::with('User')->get();
    }
    public static function saveAlbum($data)
    {
        return self::create($data);
    }
    public static function getAlbumForUser(int $id)
    {
        return self::where('user_id', $id)->get();
    }
    public static function getAlbumForId(int $id)
    {
        return self::where('id', $id)->get();
    }
    public static function getAlbumWithAllPhotos(int $id){
        return self::where('id', $id)->with('User','Albums_photos.photoId')->get();
    }

    public static function getAllInfoPhotos(){
        return self::with('Albums_photos')->get();
    }
    public static function getInfoUser(){
        return self::with('User')->get();
    }

    public function Albums_photos(){
        return $this->hasMany(Albums_photos::class, 'album_id')->orderBy('order');
    }
    public function User(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
