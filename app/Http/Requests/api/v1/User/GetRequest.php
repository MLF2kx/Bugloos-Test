<?php

namespace App\Http\Requests\api\v1\User;

use Illuminate\Foundation\Http\FormRequest;

class GetRequest extends FormRequest
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
            'name' => 'nullable|string',
            'username' => 'nullable|string',
            'is_active' => 'nullable|boolean',
            'page' => 'required|integer|gt:0',
            'size' => 'nullable|integer|gt:0'
        ];
    }

    public function messages(): array
    {
        return [
            'token.required' => 'JWT is required',
            'page.integer' => 'Page number must be an integer value',
            'page.gt' => 'Page number must be a positive value',
            'is_active.boolean' => 'Only 0|1 values are acceptable for is_active',
            'size.integer' => 'Pagination size must be an integer value',
            'size.gt' => 'Pagination size number must be a positive value',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'token' => $this->bearerToken(),
            'name' => $this->query('name'),
            'username' => $this->query('username'),
            'is_active' => $this->query('is_active'),
            'page' => $this->query('page'),
            'size' => $this->query('size'),
        ]);
    }
}
