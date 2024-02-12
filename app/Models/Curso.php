<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Curso extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function manejoImagen($file, $id): String
    {
        $curso = Curso::find($id);
        if ($file) {
            $imagenExistente = $curso->img_path;

            if ($imagenExistente) {
                Storage::delete($imagenExistente);
            }
            $nameFile = $this->guardarImagen($file);
        } else {
            $nameFile = $curso->img_path;
        }

        return $nameFile;
    }

    public function guardarImagen($file): String
    {
        $uploadedFile = $file;
        $uniqueFileName = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();
        try {
            $uploadedFile->storeAs('Cursos', $uniqueFileName);
        } catch (Exception $e) {
            return '';
        }
        return  'Cursos/' . $uniqueFileName;
    }

    public function setUrlInscripcionesAttribute($value): void
    {
        $this->attributes['url_inscripciones'] = urlencode($value);
    }

    
}
