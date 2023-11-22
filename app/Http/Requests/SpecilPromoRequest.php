<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecilPromoRequest extends FormRequest
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
            'value'=>'required',
            'number_of_items'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'no_end_date'=>'nullable',
            'customers'=>["required","array","min:1"],
        ];
    }

    public function messages()
    {
        return ['customers.required' => 'Minimum one customer is required'];
    }
}
