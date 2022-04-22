<?php

namespace App\Http\Requests\api\v1\Product;

use Illuminate\Foundation\Http\FormRequest;

class ListRequest extends FormRequest
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
            'title' => 'nullable|string',
            'columns' => 'required|string',
            'page.integer' => 'Page number must be an integer value',
            'page.gt' => 'Page number must be a positive value',
            'size.integer' => 'Pagination size must be an integer value',
            'size.gt' => 'Pagination size number must be a positive value',
        ];
    }

    public function messages(): array
    {
        return [
            'token.required' => 'JWT is required',
            'columns.required' => 'Requested columns should be defined',
            'page.integer' => 'Page number must be an integer value',
            'page.gt' => 'Page number must be a positive value',
            'size.integer' => 'Pagination size must be an integer value',
            'size.gt' => 'Pagination size number must be a positive value',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'token' => $this->bearerToken(),
            'title' => $this->query('title'),
            'columns' => $this->query('columns'),
            'page' => $this->query('page'),
            'size' => $this->query('size'),
        ]);
    }
}
