<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class updateCursoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|max:100',
            'descripcion' => 'required|max:500',
            'url_inscripciones' => 'required|url',
            'img' => 'mimes:png,jpg|max:2048',
            'tipo' => 'required|max:100',
            'costo' => 'required|numeric',
            'duracion' => 'required|max:45',
            'fecha_inicio' => 'date|required',
            'fecha_fin' => 'required|date',
        ];
    }
}
