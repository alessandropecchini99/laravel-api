<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::with('type', 'technologies')->paginate(4);

        return response()->json([
            'success' => true,
            'results' => $post,
        ]);
    }


    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return response()->json([
            'success' => $post ? true : false,
            'results' => $post,
        ]);
    }


    public function random()
    {
        $post = Post::inRandomOrder()->limit(9)->get();

        return response()->json([
            'success' => true,
            'results' => $post,
        ]);
    }
}
