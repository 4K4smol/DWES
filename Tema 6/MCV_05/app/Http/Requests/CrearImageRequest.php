<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearImageRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'La imagen es obligatoria.',
            'image.image' => 'El archivo debe ser una imagen válida.',
            'image.mimes' => 'La imagen debe estar en uno de los formatos permitidos: jpg, jpeg, png, gif.',
            'image.max' => 'El tamaño máximo de la imagen es de 2 MB.',
        ];
    }
}
