<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Egresado extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function saveFileStorage($file): String
    {
        $nameFile = time() . '_' . hash('sha256', uniqid()) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('Egresados/', $nameFile);
        return 'Egresados/' . $nameFile;
    }

    public function manejoImagen($file, $id): String
    {
        $object = Egresado::find($id);
        if ($file) {
            $imagenExistente = $object->img_path;

            if ($imagenExistente) {
                Storage::delete($imagenExistente);
            }
            $nameFile = $this->saveFileStorage($file);
        } else {
            $nameFile = $object->img_path;
        }

        return $nameFile;
    }
}
