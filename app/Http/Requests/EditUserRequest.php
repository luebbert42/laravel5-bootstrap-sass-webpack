<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditUserRequest extends Request
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
        $rules = [];

        $unique = '|unique:users,email,'.$this->route('users'); // ignore current user (to be able to update)
        $rules["email"] = "required|email".$unique;

        return $rules;
    }

    public function messages()
    {
        $messages = [];
        $messages = [];
        return $messages;
    }
}
