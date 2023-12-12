<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEgresadoRequest;
use App\Http\Requests\UpdateEgresadoRequest;
use App\Http\Resources\EgresadoResource;
use App\Models\Egresado;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class EgresadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $egresados = EgresadoResource::collection(Egresado::latest()->Paginate(5));
        return Inertia::render('Egresado/Index', compact('egresados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Egresado/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEgresadoRequest $request)
    {
        try {
            $img_path = (new Egresado())->saveFileStorage($request->file('img'));
            $request->merge(['img_path' => $img_path]);
            Egresado::create($request->all());
        } catch (Exception $e) {
            throw $e;
        }

        return Redirect::route('egresados.index')->with('message', 'Egresado registrado');
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
    public function edit(Egresado $egresado)
    {
        return Inertia::render('Egresado/Edit', [
            'egresado' => $egresado,
            'imgPathUrl' => asset('storage/' . $egresado->img_path)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEgresadoRequest $request, Egresado $egresado)
    {
        try {
            $img_path = (new Egresado())->manejoImagen($request->file('img'), $egresado->id);
            $request->merge(['img_path' => $img_path]);
            $egresado->update($request->all());
        } catch (Exception $e) {
            throw $e;
        }
        return Redirect::route('egresados.index')->with('message', 'Egresado editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Egresado $egresado)
    {
        Storage::delete($egresado->img_path);
        $egresado->delete();
        return Redirect::route('egresados.index')->with('error', 'Egresado eliminado');
    }
}
