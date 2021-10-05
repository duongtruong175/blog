<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            //
            'title' => 'required|string|max:100|unique:articles,title,' . $this->id,
            'content' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'categories' => 'array|max:3',
            'categories.*' => 'integer|distinct',
            'tags' => 'nullable|string|regex:/^[0-9A-Za-z ,]*$/'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'tags.regex' => 'The tags contains only numbers, letters and commas'
        ];
    }
}
