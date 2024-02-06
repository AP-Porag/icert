<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name'=>'required',
            'email'=>['required','email'],
            'contact_name'=>'nullable',
            'phone'=>'required',
            'billing_address_line_one'=>'required',
                'billing_address_line_two'=>'nullable',
                'billing_country'=>'required',
                'billing_province'=>'required',
                'billing_city'=>'required',
                'billing_postal'=>'required',
                'billing_phone'=>'nullable',
                'same_as_billing'=>'nullable',
                'shipping_name'=>'nullable',
                'shipping_company_name'=>'required',
                'shipping_address_line_one'=>'required',
                'shipping_address_line_two'=>'nullable',
                'shipping_country'=>'required',
                'shipping_province'=>'required',
                'shipping_city'=>'required',
                'shipping_postal'=>'required',
                'shipping_phone'=>'required',
        ];
    }
}
