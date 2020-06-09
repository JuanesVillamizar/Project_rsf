<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->middleware('guest')->name('start');
Route::get('/start', 'HomeController@showMyProfile')->middleware('auth')->name('home');
Auth::routes();

Route::post('sendPersonForContactUs', 'ContactUsController@store')->name('contact-us');

//Para los likes
Route::post('/user/like', 'HomeController@like');

//Para la busqueda de imagenes
Route::get('/getPhotoForTitle/{search}', 'HomeController@searchPhoto');

//Rutas de las sesiones
Route::group(['namespace' => 'admin', 'middleware' => ['auth']], function() {
    //Para los datos personales
    Route::resource('/my-data', 'PersonController')->except('create', 'edit', 'show', 'destroy');

    //Para los albumes
    Route::resource('/my-albums', 'AlbumsController')->except('create', 'edit', 'show');
    Route::post('/user/my-album/loadForm', 'AlbumsController@showModal')->name('loadFormAlbumsCreate');
    Route::post('/user/album/changeIsVisible', 'AlbumsController@changeIsVisible');
    Route::get('/all-photos-for-this-album/{album}', 'AlbumsController@listAllPhotoForThisAlbum')->name('list-photos');
    Route::get('/change-order-photos/{album}', 'AlbumsController@changeOrderPhotos')->name('change-order-photos');
    Route::post('/update-order-photos/', 'AlbumsController@updateOrderPhotos')->name('update-order-photos');

    //Para todas las fotos o individuales
    Route::resource('/my-photos', 'PhotosController')->except('edit', 'create');
    Route::post('/user/my-photo/loadForm', 'PhotosController@showModal')->name('loadFormPhotoCreate');
    Route::post('/user/photo/changeIsVisible', 'PhotosController@changeIsVisible');

    //Para los comentarios
    Route::post('/createComment/', 'CommentController@store')->name('createComment');
    Route::post('/getAllCommentsToPhoto/', 'CommentController@show');
});

