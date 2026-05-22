<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

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
        $posts = Post::where('category', $valorBusqueda)->orderBy('id', 'desc')->get();
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

        $post = new Post($request->all());
        $post->user_id = Auth::id();
        $post->save();

        return redirect('/tips')->with('success', '¡Tip creado con éxito!');
    }

    public function edit(Post $post)
    {

        if (Auth::user()->role !== 'admin' && $post->user_id !== Auth::id()) {
            return redirect('/tips')->with('error', 'No tienes permiso para editar este tip.');
        }
        return view('editar', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if (Auth::user()->role !== 'admin' && $post->user_id !== Auth::id()) {
            return redirect('/tips')->with('error', 'No tienes permiso para modificar esto.');
        }

        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'content' => 'required',
        ]);

        $post->update($request->all());
        return redirect('/tips')->with('success', 'Tip actualizado correctamente.');
    }

    public function destroy(Post $post)
    {
        if (Auth::user()->role !== 'admin' && $post->user_id !== Auth::id()) {
            return redirect('/tips')->with('error', 'No tienes permiso para eliminar esto.');
        }

        $post->delete();
        return back()->with('success', 'Tip eliminado correctamente.');
    }
}
