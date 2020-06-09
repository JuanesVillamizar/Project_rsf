<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $connection = 'mysql';
    protected $guarded = [];
    protected $table = 'people';
    protected $fillable = [
        'user_id', 'cc', 'name', 'lastName', 'phone', 'email'
    ];

    public static function getPerson(int $id)
    {
        return self::where('id', $id)->get();
    }

    public static function getPersonForIdUser(int $id)
    {
        return self::where('id', $id)->get();
    }

    public static function savePerson($data)
    {
        return self::create($data);
    }

    public static function getUser(int $id)
    {
        return self::where('user_id', $id)->with('user')->get();
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
