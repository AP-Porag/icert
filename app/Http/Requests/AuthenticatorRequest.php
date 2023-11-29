<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthenticatorRequest extends FormRequest
{
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required', Rule::unique('authenticators')->ignore($this->authenticator)],
            'status'=>'required',
//            'products'=>["required","array","min:1"],
            'products'=>["nullable","array","min:1"],
        ];
    }

    public function messages()
    {
        return [
            'products.required' => 'Minimum one product is required',
            'name.unique' => 'The name is already exist'
        ];
    }
}
