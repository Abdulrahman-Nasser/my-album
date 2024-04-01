<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use App\Models\Album_Model\Album;
use App\Models\Images_model\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class albumController extends Controller
{
    //get add album page
    public function getAddAlbum()
    {
        return view('albums.addAlbum');
    }

    // store ne album
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required",
        ]);
        // add new album to database
        $albums = new Album();
        $albums->name = $request->name;
        $albums->userId = Auth::user()->id;
        $albums->save();
        return redirect()->back()->with('done', 'Add Album : ' . $request->name . " " . "succss");
    }

    // get all albums
    public function getAll()
    {
        $albums = Album::all();
        return view('albums.showAll')->with('album', $albums);
    }

    // delete album
    public function destroy($id)
    {
        $albums = Album::find($id);
        $albums->delete();
        return redirect()->route('album.getAll')->with('Delete', 'Delete Album : ' . $albums->name . " " . "succss");
    }

    // get edit page
    public function edit($id)
    {
        $albums = Album::find($id);
        return view('albums.edit', compact('albums'));
    }

    //  update album
    public function update(Request $request, $id)
    {
        $albums = Album::find($id);

        $albums->name = $request->name;
        $albums->userId = Auth::user()->id;
        $albums->save();

        return redirect()->back()->with('done', "update Album to : " . " " . $request->name);
    }

    // destroy albums and images inside it
    public function destroyAll($id)
    {
        $album = Album::find($id);

        if ($album) {
            $images = Image::where('albumId', $id)->get();

            // Delete associated images
            foreach ($images as $image) {
                $imagePath = public_path('img/' . $image->image);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }

            // Adjust auto-increment ID if needed
            $maxId = Image::max('id');
            DB::statement("ALTER TABLE images AUTO_INCREMENT = " . ($maxId + 1));

            $album->delete();

            return redirect()->back()->with('done', 'Deleted Album and associated images');
        } else {
            return redirect()->back()->with('error', 'Album not found');
        }
    }




}
