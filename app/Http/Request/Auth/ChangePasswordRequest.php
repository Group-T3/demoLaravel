<?php

namespace App\Http\Request\Auth;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'passwordOld' => ['required',  'min:6'],
            'password' => ['required',  'min:6'],
            'passwordConfirm' => ['required',  'min:6'],
        ];
    }
}
