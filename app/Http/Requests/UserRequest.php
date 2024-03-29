<?php

namespace App\Http\Requests;

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
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>"required|max:40|min:3|string",
            'type'=>'required',
            'email'=>"required|email",
            'phone'=>"required|numeric|min:10",
            'address'=>"required|string",
            'ID'=>"required|string|max:20",
            'kra'=>"string",
            'avatar'=>"image|nullable"
        ];
    }
}
