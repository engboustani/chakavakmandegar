<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{

    public function getList()
    {
        $galleries = \App\Gallery::latest()->get();
        $array = array();
        foreach ($galleries as $gallery) {
            array_push($array, array('value' => $gallery->id, 'label' => $gallery->name));
        }
        return response()->json($array, 200);
    }

    public function imageUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,jpg|max:2048',
        ]);

        #new media
        $media = new \App\Media;
        
        $media->uuid = Str::uuid()->toString();

        $imageName = time().'-'.$media->uuid.'.'.$request->file->getClientOriginalExtension();

        $media->address = $imageName;
        $media->type = $request->file->getClientOriginalExtension();

        $request->file->move(public_path('media'), $imageName);

        $media->save();
        
        return response()->json([
            'success' => 'You have successfully upload image.',
            'id' => $media->id,
            'address' => $media->address,
        ], 200);
    }
}
