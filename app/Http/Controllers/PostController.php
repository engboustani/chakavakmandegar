<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    use SoftDeletes;

    public function getList()
    {
        $posts = \App\Post::latest()->get();
        return $posts->makeHidden(['updated_at'])->toJson();
    }

    public function new(Request $request)
    {
        $post = new \App\Post;

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
        $post->thumbnail_id = $request->thumbnail_id;
        $post->auther_id = Auth::id();

        $post->save();

        foreach ($request->cats as $key => $cat) {
            $category = \App\PostCategory::find($cat);
            $post->categories()->save($category);
        }

        return response()->json([
            'id' => $post->id
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
        $post->thumbnail_id = $request->thumbnail_id;
        $post->categories()->detach();
        $post->save();

        foreach ($request->cats as $key => $cat) {
            $category = \App\PostCategory::find(cat);
            $post->categories()->find(cat);
        }

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
