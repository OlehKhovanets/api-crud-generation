<?php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
         
class PostController  extends Controller
{
    public function index()
    {
        return response()->json(['data' => post::query()->get()]);
    }
    
    public function show(Post $post)
    {
        return response()->json(['data' => $post]);
    }
    
    public function store(Request $request)
    {
        Post::query()->create($request->all());
    }
    
    public function update(Post $post, Request $request)
    {
        $post->title = $request['title'];$post->description = $request['description'];$post->minidesc = $request['minidesc'];
        $post->save();
    }
    
    public function destroy(Post $post)
    {
         $post->delete();
    }    
}