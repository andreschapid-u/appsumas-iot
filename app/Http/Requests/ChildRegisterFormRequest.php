<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChildRegisterFormRequest extends FormRequest
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
        // dd(date("Y-m-d"));
        return [
            "first_name" => "required|string",
            "last_name" => "required|string",
            "birthday" => "required|date|date_format:Y-m-d|before::".date("Y-m-d"),
            "gender" => "required|in:Male,Female",
            "avatar" => "required|exists:avatars,id",
            "code" => "required|unique:children,code"
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'gender' => __("Gender"),
            'birthday' => __("Birthday"),
        ];
    }
}
