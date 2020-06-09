<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $connection = 'mysql';
    protected $guarded = [];
    protected $table = 'contacts';

    public static function saveContact($data)
    {
        return self::create($data);
    }
}
