<?php

namespace App\Http\Controllers\Album;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class saveIdController extends Controller
{
    //
    public function storeAlbumIdInSession(Request $request)
    {
        $albumId = $request->input('album_id');
        session(['selected_album_id' => $albumId]);

        return 'done';
    }
}
