<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function imageUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,jpg|max:2048',
        ]);

        $imageName = time().'.'.$request->file->getClientOriginalExtension();

        $request->file->move(public_path('images'), $imageName);
        
        return response()->json([
            'success' => 'You have successfully upload image.',
            'image' => $imageName,
        ], 200);
    }
}
