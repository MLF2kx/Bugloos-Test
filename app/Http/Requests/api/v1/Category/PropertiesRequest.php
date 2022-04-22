<?php

namespace App\Http\Requests\api\v1\Category;

use Illuminate\Foundation\Http\FormRequest;

class PropertiesRequest extends FormRequest
{
    /**
     * Determine if the auth is authorized to make this request.
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
    public function rules(): array
    {
        return [
            'token' => 'required',
            'id' => 'required|integer|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'token.required' => 'JWT is required',
            'id.required' => 'Category ID is required',
            'id.integer' => 'Category ID should be an integer value',
            'id.exists' => 'Category not found',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'token' => $this->bearerToken(),
            'id' => $this->route('id'),
        ]);
    }
}
