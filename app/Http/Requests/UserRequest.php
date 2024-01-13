<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
    public function rules()
    {
        $rules =  [
            'userId' => ['required', Rule::unique('users')->ignore($this->user)],
            'first_name' => ['required'],
            'last_name'  => ['nullable'],
            'username'  => ['nullable'],
            'email'      => ['required', 'string', Rule::unique('users')->ignore($this->user)],
            'phone'      => ['nullable'],
            'date_of_hire' => ['nullable'],
            'status'     => ['nullable'],
            'user_type'  => ['nullable'],
            'department' => ['nullable'],
            'role' => ['required'],
//            'department' => ['required_if:user_type,employee'],
            'password'   => [
                'nullable', 'string','max:18', 'confirmed', Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
            ],
            'password_confirmation' => ['nullable', Password::min(8)],
        ];

        if ($this->user) {
            $rules['password'] =  [
                'nullable', 'string','max:18', 'confirmed', Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
            ];
            $rules['password_confirmation'] = ['nullable', Password::min(8)];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'role.required'=>'User Grading is required',
            'first_name.required'=>'First name and last name is required',
            'username.required'=>'First name is required',
            'userId.required'=>'User ID is required',
        ];
    }
}
