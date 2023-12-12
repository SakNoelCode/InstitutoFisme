<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    //Relaciones
    public function categorias(): BelongsToMany
    {
        return $this->belongsToMany(Categoria::class)->withTimestamps();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
  
    //Funciones públicas
    public function manejoImagen($file, $id): String
    {
        $object = Post::find($id);
        if ($file) {
            $imagenExistente = $object->img_path;

            if ($imagenExistente) {
                Storage::delete($imagenExistente);
            }
            $nameFile = $this->guardarImagen($file);
        } else {
            $nameFile = $object->img_path;
        }

        return $nameFile;
    }

    public function guardarImagen($file)
    {
        $uploadedFile = $file;
        $uniqueFileName = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();
        $uploadedFile->storeAs('Posts', $uniqueFileName);
        return  'Posts/' . $uniqueFileName;
    }


    // Getter para la fecha
    public function getCreatedAtAttribute($value)
    {
        $carbon = Carbon::parse($value);
        // Formatear la fecha y hora
        $fechaFormateada = $carbon->format('d/m/Y H:i');
        return $fechaFormateada;
    }
}
