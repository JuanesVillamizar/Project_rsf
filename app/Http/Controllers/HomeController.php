<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Albums_photos;
use App\Models\Photos;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function showMyProfile()
    {
//        $photos = Photos::getAllInfoAlbum();
        $sets = Albums_photos::getAllInfo();
        $albums = Album::getAllVisible();
        return view('home', compact('sets', 'albums'));
    }

    public function like(Request $request){
        return Albums_photos::addLike($request->id);
    }

    public function searchPhoto(string $title){
        return json_encode(Photos::getPhotoForTitle($title));
    }
}
