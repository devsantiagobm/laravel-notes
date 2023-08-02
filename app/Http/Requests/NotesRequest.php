<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NotesRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array {
        return [
            "titulo" => "required",
            "descripcion" => "required",
            "id_category" => "required",
        ];
    }

    public function messages() {
        return [
            "titulo.required" => "El campo título es obligatorio",
            "descripcion.required" => "El campo descripción es obligatorio",
            "id_category.required" => "El campo categoría es obligatorio"
        ];
    }
}
