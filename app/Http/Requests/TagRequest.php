<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'name'=>'required|max:50',
            // 'name'=>['required', Rule::unique('category_translations', 'name')->ignore($this->id)],
            'slug'=>'required|max:100|unique:tags,slug,'.$this->id,
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'يرجى ادخال  اسم الفئه',
            'slug.required'=>'يرجى ادخال الاسم بالرابط',
            'name.max'=>'هذا الاسم كبير',
            'slug.max'=>' الاسم بالرابط كبير',
            'slug.unique'=>'هذا الرابط موجود من قبل',
            'name.unique'=>'هذا الاسم موجود من قبل',
        ];
    }
}
