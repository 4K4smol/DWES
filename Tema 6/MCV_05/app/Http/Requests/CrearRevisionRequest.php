<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearRevisionRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'animal_id' => 'required',
            'fechaRevision' => 'required|date',
            'descripcion' => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'animal_id.required' => 'Debes seleccionar un animal.',
            'fechaRevision.required' => 'Debes seleccionar un animal.',
            'fechaRevision.date' => 'Debe ser una fecha.',
            'descripcion.required' => 'La descripcion es obligatoria.',
            'descripcion.max:255' => 'La descripcion debe ser menor a 255 caracteres.',
        ];
    }
}
