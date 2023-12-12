<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCursoRequest;
use App\Http\Requests\updateCursoRequest;
use App\Http\Resources\CursoResource;
use App\Models\Curso;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = CursoResource::collection(Curso::latest()->paginate(5));
        return Inertia::render('Curso/Index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Curso/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(storeCursoRequest $request)
    {
        try {
            $file = $request->file('img');
            $nameFile = (new Curso())->guardarImagen($file);
            $request->merge(['img_path' => $nameFile]);
            Curso::create($request->all());
        } catch (Exception $e) {
            throw $e;
        }
        return Redirect::route('cursos.index')->with('message', 'Curso registrado');
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
    public function edit(Curso $curso)
    {
        return Inertia::render('Curso/Edit', [
            'curso' => $curso,
            'imgPathUrl' => asset('storage/' . $curso->img_path)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateCursoRequest $request, Curso $curso)
    {
        try {
            $img_path = (new Curso())->manejoImagen($request->file('img'), $curso->id);
            $request->merge(['img_path' => $img_path]);
            $curso->update($request->all());
        } catch (Exception $e) {
            throw $e;
        }

        return Redirect::route('cursos.index')->with('message', 'Curso editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        Storage::delete($curso->img_path);
        $curso->delete();
        return Redirect::route('cursos.index')->with('error', 'Curso eliminado');
    }
}
