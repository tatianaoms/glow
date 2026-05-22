<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ContentController extends Controller
{

    public function index()
    {
        $posts = Post::latest()->get();
        return view('index', ['posts' => $posts]);
    }

    public function showByCategory($name)
    {
        $posts = Post::where('category', 'LIKE', '%' . $name . '%')->latest()->get();
        return view('index', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required'
        ]);

        Post::create($request->all());

        return redirect()->route('tips.index')->with('success', '¡Tip publicado con éxito!');
    }
}
