<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateWord extends FormRequest
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
            'text' => ['required', 'min:1'],
            'choice1' => ['required', 'min:3'],
            'choice2' => ['required', 'min:3'],
            'choice3' => ['required', 'min:3'],
            'choice4' => ['required', 'min:3'],
            'answer' => ['required'],
        ];
    }
}
