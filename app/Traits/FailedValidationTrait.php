<?php
namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait FailedValidationTrait{
    protected function failedValidation(Validator $validator): void
    {
        $errors = $validator->errors();
        
        throw new HttpResponseException(response()->json([
            'message' => 'Validation failed',
            'errors' => $errors
        ], 422));
    }
}