<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "email" => "unique:employees,email,NULL,id,deleted_at,NULL|max:255",
            "name" => "max:255|regex:/^[\p{L}\s'.-]+$/u",
            "phone_number" => "min:6|max:20|regex:/^[0-9]*$/",
            "address" => "max:255",
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            "email.unique" => "The email has already been used",
            "email.max" => "The email is too long",
            "name.max" => "Your name is too long",
            "name.regex" => "Your name is invalid",
            "phone_number.min" => "Your phone number is too short",
            "phone_number.max" => "Your phone number is too long",
            "address.max" => "Your address is too long",
        ];
    }

}
