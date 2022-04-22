<?php

namespace App\Http\Requests\api\v1\Category;

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
            'parent_id' => 'nullable|integer|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'token.required' => 'JWT is required',
            'parent_id.integer' => 'Parent ID should be an integer value',
            'parent_id.exists' => 'Parent category not found',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'token' => $this->bearerToken(),
            'parent_id' => $this->query('parent_id'),
        ]);
    }
}
