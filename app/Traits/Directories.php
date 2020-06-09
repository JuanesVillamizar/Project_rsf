<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait Directories
{
    public function createDirectory($name){
        return Storage::makeDirectory('public/users/'.$name);
    }

    public function deleteDirectory($name){
        return Storage::deleteDirectory('public/users/'.$name);
    }

    public function allDirectories($name){
        return Storage::allDirectories('public/users/'.$name);
    }

    public function getDirectory($name){
        return Storage::directories('public/users/'.$name);
    }
}
