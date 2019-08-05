<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceRegisterFormRequest extends FormRequest
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
        $dispositivos = auth()->user()->devices()->count();
        if ($dispositivos) {
        // if (1) {
            return ["maximo" => "required"];
        } else {
            return [
                "name" => "required",
                "mac" => "required|unique:devices,mac|size:17|regex:/^([A-F0-9]{2}[:]){5}[A-F0-9]{2}$/i",
                "user_id" => "unique:devices,user_id,"
            ];
        }
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'mac' => __("Code"),
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
            'maximo.required' => 'Ha superado el máximo numero de dispositivos!',
        ];
    }
}
