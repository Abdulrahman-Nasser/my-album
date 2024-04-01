<?php

namespace App\Http\Controllers\Temporary;

use App\Http\Controllers\Controller;
use App\Models\temporary_image\TemporaryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class temporaryController extends Controller
{
    //
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $imageName = $images->getClientOriginalName();
            $folder = uniqid('image-', true);
            // $images->storeAs('upload/tmp/' . $folder, $imageName);
            $images->move("./upload/tmp/$folder/", $imageName);


            $tempraryImage = new TemporaryImage();
            $tempraryImage->folder = $folder;
            $tempraryImage->file = $imageName;
            $tempraryImage->save();


            return $folder;
        }

        return '';
    }

    public function delete()
    {
        $temporaryImage = TemporaryImage::where('folder', request()->getContent())->first();

        if ($temporaryImage) {
            $folderPath = 'upload/tmp/' . $temporaryImage->folder;
            $filePath = $folderPath . '/' . $temporaryImage->file;

            // Delete the file first
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            // Delete the directory
            if (is_dir($folderPath)) {
                rmdir($folderPath);
            }
            // Delete the database entry
            $temporaryImage->delete();
        }
    }
}
