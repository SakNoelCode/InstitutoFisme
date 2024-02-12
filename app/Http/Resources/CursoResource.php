<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CursoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'url_inscripciones' => urldecode($this->url_inscripciones),
            'tipo' => $this->tipo,
            'costo' => $this->costo . ' soles',
            'fecha_inicio' => date('d/m/Y', strtotime($this->fecha_inicio)),
            'fecha_fin' => date('d/m/Y', strtotime($this->fecha_fin)),
            'img_path' => $this->img_path
        ];
    }
}
