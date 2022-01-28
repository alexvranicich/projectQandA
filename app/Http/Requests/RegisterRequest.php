<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class RegisterRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users,email|email:rfc,dns',
            'password' => 'required | min:4',
        ];
    }



    public function messages()
    {
        return [
            'name.required' => 'Inserire il proprio nome',
            'email.required' => 'Inserire una mail valida',
            'password.required' => 'Inserire una password valida',
        ];
    }


}
