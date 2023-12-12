<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipamientoRequest;
use App\Http\Requests\UpdateEquipamientoRequest;
use App\Http\Resources\EquipamientoResource;
use App\Models\Equipamiento;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class EquipamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $equipamientos = EquipamientoResource::collection(Equipamiento::latest()->paginate(5));
        return Inertia::render('Equipamiento/Index', compact('equipamientos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Equipamiento/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipamientoRequest $request)
    {
        try {
            $img_path = (new Equipamiento())->saveFileStorage($request->file('img'));
            $request->merge(['img_path' => $img_path]);
            Equipamiento::create($request->all());
        } catch (Exception $e) {
            throw $e;
        }
        return Redirect::route('equipamientos.index')->with('message', 'Equipo registrado');
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
    public function edit(Equipamiento $equipamiento)
    {
        return Inertia::render('Equipamiento/Edit', [
            'equipo' => $equipamiento,
            'imgPathUrl' => asset('storage/' . $equipamiento->img_path)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipamientoRequest $request, Equipamiento $equipamiento)
    {
        try {
            $img_path = (new Equipamiento())->manejoImagen($request->file('img'), $equipamiento->id);
            $request->merge(['img_path' => $img_path]);
            $equipamiento->update($request->all());
        } catch (Exception $e) {
            throw $e;
        }
        return Redirect::route('equipamientos.index')->with('message', 'Equipo editado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipamiento $equipamiento)
    {
        Storage::delete($equipamiento->img_path);
        $equipamiento->delete();
        return Redirect::route('equipamientos.index')->with('error', 'equipo eliminado');
    }
}
