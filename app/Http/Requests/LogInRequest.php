<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogInRequest extends FormRequest {
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
            "email" => "required|email",
            "password" => "required",

        ];
    }

    public function messages() {
        return [
            "email.required" => "El email es obligatorio",
            "email.email" => "Parece que esto no es un email",
            "password.required" => "La contraseña es obligatoria",
        ];
    }

    public function getCredentials() {
        return $this->only("email", "password");
    }
}
