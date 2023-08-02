<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest {
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
            "email" => "required|email|unique:users,email",
            "password" => "required"
        ];
    }

    public function messages() {
        return [
            "email.required" => "El email es obligatorio",
            "email.email" => "El correo no tiene el formato correcto",
            "password.required" => "La contraseña es obligatoria",
            "email.unique" => "Parece que alguien más está usando este correo"
        ];
    }
}
