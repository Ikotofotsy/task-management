<?php

namespace App\Http\Requests;

use App\Traits\FailedValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'email' => ['required', 'email','unique:App\Models\User,email'],
            'password' => ['required', 'string','min:8', 'confirmed']
        ];
    }

    public function messages(): array{
        return [
            'name.required' => 'Le nom est obligatoire',
            'email.required' => 'L\'adresse email est obligatoire',
            'email.email' => 'Adresse email invalide',
            'email.unique' => 'Adresse email deja utilise',
            'password.required' => 'Le mot de passe est obligatoire',
            'password.min' => 'Mot de passe trop court',
            'password.confirmed' => 'Mot de passe de confiramation incorrecte'
        ];
    }

}
