<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
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

        $id= $this->input('id');

        switch ($this->method())
        {
            case 'POST':
                        return [
                            'name'      => 'required|min:4|max:120',
                            'email'     => 'min:4|max:250|required|email|unique:users',
                            'password'  => 'min:4|max:120|required',
                            'type'      => 'required'
                        ];
                        break;
            case 'PUT' :
                        return [
                            'name'      => 'required|min:4|max:120',
                            'email'     => 'min:4|max:250|required|email|unique:users,email,' . $id,
                            'type'      => 'required'
                        ];
                        break;
         }

    }

}
