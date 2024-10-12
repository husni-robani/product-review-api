<?php

namespace App\Http\Requests\Api;

use App\Http\ApiResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
            'name' => 'required|string|max:20',
            'price' => 'required|numeric'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = new ApiResponse(422, errorMessage: $validator->errors()->all());
        throw new HttpResponseException(($response->toResponse($this->input())));
    }
}
