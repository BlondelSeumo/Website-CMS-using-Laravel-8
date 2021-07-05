<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'email' => 'required|email',
            'phone' => 'required',
            'budget' => 'required',
            'comment' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ];
    }

    public function messages()
    {
        return [
           'name.required' => 'sName is required',
           'g-recaptcha-response.recaptcha' => 'Captcha verification failed',
           'g-recaptcha-response.required' => 'Please complete the captcha'
        ];
    }
}
