<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'photo_id'=> 'required',
            'title'=> 'required',
            'slug'=> 'required',
            'slug'=> 'unique:projects,slug,{$projectId}|required',
            'body'=> 'required',
            'meta_title'=> 'required',
            'meta_description'=> 'required',
        ];
    }
}
