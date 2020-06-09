<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $connection = 'mysql';
    protected $guarded = [];
    protected $table = 'comments';
    protected $fillable = [
        'comment', 'set_id', 'user_id', 'likes'
    ];

    public static function getAllCommentsForPhoto(int $id)
    {
        return self::where('set_id', $id)->with('User')->orderBy('created_at', 'desc')->get();
    }

    public static function saveComment($data)
    {
        return self::create($data);
    }



    public function User(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
