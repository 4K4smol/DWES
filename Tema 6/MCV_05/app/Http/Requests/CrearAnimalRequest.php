<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearAnimalRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'especie' => 'required|min:3',
            'peso' => 'required|numeric',
            'altura' => 'required|numeric',
            'fechaNacimiento' => 'required|date',
            'alimentacion' => 'max:255',
            'imagen' => 'required|mimes:jpeg,png,jpg,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'especie.required' => 'La especie es obligatoria.',
            'especie.min' => 'La especie debe tener al menos 3 caracteres.',
            'peso.required' => 'El peso es obligatorio.',
            'altura.required' => 'La altura es obligatoria.',
            'fechaNacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'alimentacion.max' => 'No puede tener más de 255 caracteres',
            'imagen.required' => 'La imagen es obligatoria.',
            'imagen.mimes' => 'Solo se permiten imágenes de tipo jpeg, png, jpg y svg.',
        ];
    }
}
