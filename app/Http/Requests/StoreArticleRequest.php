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
            'image_url' => 'image|mimes:jpeg,jpg,png,gif,svg|max:2048',
        ];
    }
}
