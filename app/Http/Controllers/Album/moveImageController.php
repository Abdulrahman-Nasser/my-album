<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use App\Models\Album_Model\Album;
use App\Models\Images_model\Image;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class moveImageController extends Controller
{
    //
    public function moveImagesToAlbum(Request $request)
    {
        $request->validate([
            'album' => 'required'
        ]);

        $currentAlbumId = session('selected_album_id');

        // Check if the selected album is different from the current album
        if ($request->album == $currentAlbumId) {
            return redirect()->route('album.getAll')->with('error', 'Cannot move images to the same album.');
        } else {
            // Code to update the images with currentAlbumId to newAlbumId
            $images = Image::where('albumId', $currentAlbumId)->get();
            foreach ($images as $image) {
                $image->albumId = $request->album;
                $image->save();
            }

            // Optionally, you may want to delete the current album after moving the images
            $albums = Album::where('id', $currentAlbumId);
            $albums->delete();

            return redirect()->route('album.getAll')->with('done', 'Moving images successful');
        }
    }

    public function getAlbumsExceptCurrent($currentAlbumId)
    {
        // $albums = Album::where('id', '!=', $currentAlbumId)->get();
        $albums = Album::all();

        return response()->json(['albums' => $albums]);
    }

    public function allAlbumsFunction()
    {
        // $albums = Album::where('id', '!=', $currentAlbumId)->get();
        $albums = Album::all();

        return response()->json(['albums' => $albums]);
    }
}
