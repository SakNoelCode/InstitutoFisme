<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    protected $guarded = ['id'];

    public function categorias(): BelongsToMany
    {
        return $this->belongsToMany(Categoria::class)->withTimestamps();
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    use HasFactory;

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
