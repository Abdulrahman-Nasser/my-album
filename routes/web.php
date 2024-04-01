<?php

use App\Http\Controllers\Album\albumController;
use App\Http\Controllers\Album\destroySessionController;
use App\Http\Controllers\Album\moveImageController;
use App\Http\Controllers\Album\saveIdController;
use App\Http\Controllers\Album\updateSessionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Images\imageController;
use App\Http\Controllers\Temporary\temporaryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('home');
    });

    // go to home page
    Route::get('/home', [HomeController::class, 'index'])->name('album.home');

    // =============== Albums ==================//
    Route::get('/album-add', [albumController::class, 'getAddAlbum'])->name('album.getAdd');
    Route::post('/album-add', [albumController::class, 'store'])->name('album.add');
    Route::get('/album-getAll', [albumController::class, 'getAll'])->name("album.getAll");
    Route::get('/allbum-getAll/{id}', [albumController::class, 'destroy'])->name('album.destroy');
    Route::get('/album-edit/{id}', [albumController::class, 'edit'])->name('album.edit');
    Route::post('/album-edit/{id}', [albumController::class, 'update'])->name('album.update');
    Route::get('/album-deleteAllImages/{id}', [albumController::class, 'destroyAll'])->name('album.destroyAll');
    Route::post('/storeAlbumIdInSession', [saveIdController::class, 'storeAlbumIdInSession'])->name('id.save');
    Route::post('/moveImagesToAlbum', [moveImageController::class, 'moveImagesToAlbum'])->name('images.move');
    // Route::get('/albums-except/{currentAlbumId}', [moveImageController::class, 'getAlbumsExceptCurrent']);

    Route::get('/albumsAll' , [moveImageController::class ,'allAlbumsFunction'])->name('images.getAll');

    // =============== images ==================//
    Route::get('images-add', [imageController::class, 'getAdd'])->name('images.add');
    Route::post('/image-upload', [temporaryController::class, 'store'])->name('images.store');
    Route::delete('/delete-image', [temporaryController::class, 'delete']);
    Route::post('/images-store', [imageController::class, 'store'])->name('images.store.upload');
    Route::get('/showAllImages/{albumId}', [imageController::class, 'index'])->name('images.showAll');
});
