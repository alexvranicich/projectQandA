<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class QuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required | min:3 | max: 100',
            'content' => 'required | max: 200',
        ]
        +
        ( $this->isMethod('POST') ? $this->store() );
        
    }

    public function store()
    {
        return [
            'id_user' => Auth::user()->id,
        ];
    }
}
