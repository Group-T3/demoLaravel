<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullname' => 'required',
            'avt'  => '',
            'address'  => 'required',
            'email'  => ['required', 'email:rfc',
                function ($attribute, $value, $fail) {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $fail($attribute . ' is invalid.');
                    }
                }],
            'phonenumber'  => 'required',
            'password'  => ['required', 'string', 'min:6'],
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Name is required.',
            'address.required' => 'Address is required.',
            'phonenumber.required' => 'PhoneNumber is required.',
            'email.min' => 'Email must have at least 2 characters.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must have at least 4 characters.',
            'password.string' => 'Password must be of type string.',
        ];
    }
}
