<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class PostControlller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('categorias')->get();
        //dd($posts);
        return Inertia::render('Post/Index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return Inertia::render('Post/Create', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:200',
            'contenido' => 'required',
            'autor' => 'required|max:100',
            'img_path' => 'required|mimes:png,jpg|max:2048'
        ]);

        $file = $request->file('img_path');
        $nameDocumento = (new Post())->guardarImagen($file);
        $post = Post::create([
            "titulo" => $request->titulo,
            "contenido" => $request->contenido,
            "autor" => $request->autor,
            "img_path" => $nameDocumento
        ]);
        $post->categorias()->attach($request->categoria);

        return Redirect::route('posts.index')->with('message','Post registrado');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categorias = Categoria::all();
        $PostCategory = $post->categorias()->first();
        return Inertia::render(
            'Post/Edit',
            [
                'post' => $post,
                'categorias' => $categorias,
                'postCategory' => $PostCategory,
                'imgPathUrl' => asset('storage/' . $post->img_path)
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //dd($request);
        $request->validate([
            'titulo' => 'required|max:200',
            'contenido' => 'required',
            'autor' => 'required|max:100',
            'img_path' => 'mimes:png,jpg|max:2048'
        ]);

        $file = $request->file('img_path');

        if ($file) {
            $imagenExistente = $post->img_path;

            if ($imagenExistente) {
                Storage::delete($imagenExistente);
            }
            $nameFile = (new Post())->guardarImagen($file);
        }else{
            $nameFile = $post->img_path;
        }

        $post->update([
            "titulo" => $request->titulo,
            "contenido" => $request->contenido,
            "autor" => $request->autor,
            "img_path" => $nameFile
        ]);
        $post->categorias()->sync($request->categoria);

        return Redirect::route('posts.index')->with('message','Post editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->img_path);
        $post->delete();
        return Redirect::route('posts.index')->with('message','Post eliminado');
    }
}
