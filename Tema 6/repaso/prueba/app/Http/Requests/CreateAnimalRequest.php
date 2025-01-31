<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAnimalRequest extends FormRequest
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
            'especie' => 'required|min:3',
            'peso' => 'required|numeric|min:0',
            'fecha_nacimiento' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'especie.min' => 'La especie debe tener al menos 3 caracteres.',
            'peso.required' => 'El peso es obligatorio.',
            'peso.numeric' => 'El peso debe ser un número.',
            'peso.min' => 'El peso no puede ser negativo.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
            'image.mimes' => 'La imagen debe estar en formato JPG, JPEG o PNG.',
            'image.max' => 'La imagen no debe ser mayor a 2MB.',
        ];
    }
}
