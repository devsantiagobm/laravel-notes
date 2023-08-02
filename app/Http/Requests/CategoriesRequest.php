<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest {
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
            "nombre" => "required",
            "color" => "required|max:7"
        ];
    }

    public function messages() {
        return [
            "nombre.required" => "El campo nombre debe es obligatorio",
            "color.required" => "El campo color es obligatorio",
            "color.max" => "Este campo recibe un máximo de 7 caracteres",
        ];
    }
}
