<?php

namespace App\Http\Requests;

use App\Traits\FailedValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    // use FailedValidationTrait;
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
            'email' => ['required', 'email','exists:App\Models\User,email'],
            'password' => ['required', 'string']
        ];
    }

    public function messages(): array{
        return [
            'email.required' => 'L\'adresse email est obligatoire',
            'email.email' => 'Adresse email invalide',
            'email.exists' => 'L\'adresse email n\'existe pas',
            'password.required' => 'Le mot de passe est obligatoire'
        ];
    }
}
