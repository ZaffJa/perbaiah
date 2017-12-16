<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewUser extends FormRequest
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
            'no_kp' => 'required|unique:users|max:255',
            'nama' => 'required|max:255',
            'gambar' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'no_ahli.required' => 'No ahli wajib diisi',
            'nama.required' => 'Nama ahli wajib diisi',
            'no_ahli.unique' => 'No ahli sudah wujud dalam pangkalan data',
            'no_kp.required' => 'No kad pengenalan wajib diisi',
            'no_kp.unique' => 'No kad pengenalan ini sudah wujud dalam pangkalan data',
            'gambar.image' => 'Fail yang dihantar mestilah fail dalam format jpeg, png, bmp, gif, atau svg sahaja'
        ];
    }
}
