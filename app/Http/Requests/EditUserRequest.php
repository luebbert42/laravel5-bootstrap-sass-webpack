<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
        $userId = (int)$this->route('user');
        $unique = '|unique:users,email,'.$userId; // ignore current user (to be able to update)
        $rules["email"] = "required|email".$unique;
        return $rules;
    }

    public function messages()
    {
        $messages = [];
        return $messages;
    }
}
