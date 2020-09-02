<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'email'=>'required|email|unique:admins,email,'.$this->id,
            'password'=>'nullable|confirmed|min:6',
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'يرجى ادخال البريد الالكترونى',
            'email.email'=>'هذه الصيغه غير موجوده',
            'email.unique'=>'   هذا البريد موجود من قبل',
            'password.confirmed'=>'الرقم السرى غير متطابق',
            'password.min'=>'الرقم السرى قصير',
        ];
    }
}
