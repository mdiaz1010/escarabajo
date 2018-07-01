<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
                'title'=>'min:8|max:250|required|unique:articles',
                'category_id'=>'required',
                'content'=>'min:60|required',
                'image'=>'max:1500|image|required'
            ]; break;

            case 'PUT' :
            return [
                'title'=>'min:8|max:250|required|unique:articles,title'. $id ,
                'category_id'=>'required',
                'content'=>'min:60|required',
                'tags'=>'required'
            ]; break;

        }

    }
}
