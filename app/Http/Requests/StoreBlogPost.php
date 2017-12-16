<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->user() && auth()->user()->is('admin')) return true;
        
        return false;    
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|alpha_spaces|unique:blogs',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tajuk blog wajib diisi',
            'content.required' => 'Kandungan blog wajib diisi',
            'name.alpha_spaces' => 'Tajuk hanya boleh terima nombor, abjad dan selang sahaja',
        ];
    }
}
