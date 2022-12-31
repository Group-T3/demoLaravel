<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'avt' => 'required',
            'address' => 'required',
            'email' => ['required', 'email:rfc',
                function ($attribute, $value, $fail) {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                        $fail($attribute . ' is invalid.');
                    }
                }],
            'phonenumber' => 'required',
            'status' => 'required',
            'role_id' => 'required',
            'password' => ['required', 'string'],
            'passwordConfirm' => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Name is required.',
            'address.required' => 'Address is required.',
            'phonenumber.required' => 'PhoneNumber is required.',
            'email.min' => 'Email must have at least 2 characters.',
            'status.required' => 'Status is required.',
            'role_id.required' => 'Role is required.',
            'password.required' => 'Password is required.',
            'passwordConfirm.required' => 'PasswordConfirm is required.',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->input('password') != $this->input('passwordConfirm')) {
                $validator->errors()->add('password', 'Password or PasswordConfirm Incorrect');
            }
        });
    }
}
