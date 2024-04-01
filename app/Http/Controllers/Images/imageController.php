<?php

namespace App\Http\Controllers\Images;

use App\Http\Controllers\Controller;
use App\Models\Album_Model\Album;
use App\Models\Images_model\Image;
use App\Models\temporary_image\TemporaryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class imageController extends Controller
{
    //
    public function getAdd()
    {
        $albums = Album::all();
        return view('images.addImage')->with('album', $albums);
    }

    // store images
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'album' => 'required',
            'imageUpload.*' => 'required|mimes:png,jpg,jpeg|size:1024',
            'image' => 'required'
        ]);

        $temporaryImages = TemporaryImage::all();

        if ($validator) {
            foreach ($temporaryImages as $temporaryImage) {
                $newFileName = time() . rand() . $temporaryImage->file;
                $folderPath = public_path('upload/tmp/' . $temporaryImage->folder);
                $filePath = $folderPath . '/' . $temporaryImage->file;

                // Move the file to the new directory
                if (file_exists($filePath)) {
                    $newFilePath = public_path('img/' . $newFileName);

                    if (!is_dir(public_path('img/'))) {
                        mkdir(public_path('img/'));
                    }
                    rename($filePath, $newFilePath);


                    // Save the image to the database
                    $finalImage = new Image();
                    $finalImage->name = $request->name;
                    $finalImage->albumId = $request->album;
                    $finalImage->image = $newFileName;
                    $finalImage->save();

                    // remove directory code
                    $folderPath = 'upload/tmp/' . $temporaryImage->folder;
                    $filePath = $folderPath . '/' . $temporaryImage->file;
                    if (is_dir($folderPath)) {
                        rmdir($folderPath);
                    }

                    // Delete the database entry for temporary image
                    $temporaryImage->delete();
                }
            }

            return redirect()->back()->with('done', "Images added successfully");
        } else {
            return redirect()->back()->with('error', "Could not add images");
        }
    }

    // get all images page
    public function index($albumId)
    {
        $images = Image::where('albumId', $albumId)->get();
        return view('images.allimg')->with('images', $images);
    }
}
