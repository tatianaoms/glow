<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('tips', compact('posts'))->with('name', null);
    }

    public function category($name)
    {
        $valorBusqueda = strtoupper(str_replace('-', ' ', $name));

        if ($valorBusqueda == 'FACIAL') {
            $valorBusqueda = 'CUIDADO FACIAL';
        }

        $posts = Post::where('category', $valorBusqueda)
            ->orderBy('id', 'desc')
            ->get();

        return view('tips', compact('posts'))->with('name', $valorBusqueda);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
        ]);

        Post::create($request->all());

        return redirect('/tips')->with('success', '¡Tip creado con éxito!');
    }

    public function edit(Post $post)
    {
        return view('editar', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
        ]);

        $post->update($request->all());

        return redirect('/tips')->with('success', 'Tip actualizado');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Tip eliminado');
    }
}
