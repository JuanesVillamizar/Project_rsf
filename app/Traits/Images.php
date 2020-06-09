<?php


namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait Images
{
    public function saveImage($request, $url){
        return $request->file('photo')->storeAs(
            "public/users/" . auth()->user()->nickName . '_' . auth()->user()->id . '/' , str_replace(' ', '_', $url) . '.jpg'
        );
    }

    public function deleteImage($url){
        return unlink(
            public_path() . '/storage/users/' . auth()->user()->nickName . '_' . auth()->user()->id . '/' . str_replace(' ', '_', $url) . '.jpg'
        );
    }
}
