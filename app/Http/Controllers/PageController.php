<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class PageController extends Controller
{
    use SoftDeletes;

    public function getList()
    {
        $pages = \App\Page::latest()->get();
        return $pages->makeHidden(['updated_at'])->toJson();
    }

    public function new(Request $request)
    {
        $page = new \App\Page;

        if($request->name == '')
            $page->name = preg_replace('/\W+/', '-', strtolower($request->name_fa));
        else
            $page->name = preg_replace('/\W+/', '-', strtolower($request->name));
        $page->name_fa = preg_replace('/\W+/', '-', strtolower($request->name_fa));
        $page->content = $request->content->toJson();
        $page->visiable = $request->visiable;
        $page->auther_id = Auth::id();

        $page->save();

        return response()->json([
            'id' => $page->id
        ], 201);
    }

    public function get($id)
    {
        $post = \App\Post::find($id);

        return $post->toJson();
    }

    public function update(Request $request)
    {
        $post = \App\Post::find($request->id);

        if($request->name == '')
            $post->name = preg_replace('/\W+/', '-', strtolower($request->title));
        else
            $post->name = preg_replace('/\W+/', '-', strtolower($request->name));
        if($request->name_fa == '')
            $post->name_fa = preg_replace('/\W+/', '-', strtolower($request->title));
        else
            $post->name_fa = preg_replace('/\W+/', '-', strtolower($request->name_fa));
        $post->title = $request->title;
        $post->content = $request->content;
        $post->visiable = $request->visiable;

        $post->save();

        return response()->json([
            'id' => $request->id,
        ], 200);
    }

    public function delete(Request $request)
    {
        $post = \App\Post::find($request->id);

        $post->delete();

        return response()->json([
            'id' => $request->id,
        ], 200);
    }

}
