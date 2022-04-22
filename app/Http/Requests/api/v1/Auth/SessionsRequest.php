<?php

namespace App\Http\Requests\api\v1\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SessionsRequest extends FormRequest
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
        ];
    }

    public function messages(): array
    {
        return [
            'token.required' => 'JWT is required',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'token' => $this->bearerToken(),
        ]);
    }
}
