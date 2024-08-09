<?php

namespace App\Http\Requests;

use App\Traits\FailedValidationTrait;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'description' => ['string', 'nullable'],
            'completed' => ['required', 'boolean'],
            'deadline' => ['date','nullable']
        ];
    }

    public function messages(): array 
    {
        return [
            'title.required' => 'Le titre est obligatoire'         
        ];
    }
}
