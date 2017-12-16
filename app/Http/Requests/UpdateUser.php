<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UpdateUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = User::find($this->id);

        if (!$user) {
            $user = User::where('no_ahli', $this->no_ahli)->first();
        }
        if ($user && $user->id == auth()->user()->id) return true;
        if (auth()->user()->is('admin')) return true;

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
            'no_kp' => 'required|max:255',
            'nama' => 'required|max:255',
            'gambar' => 'image',
            'kata_laluan' => 'sometimes',
            'taip_kata_laluan' => 'sometimes|same:kata_laluan'
        ];
    }

    public function messages()
    {
        return [
            'no_ahli.required' => 'No ahli wajib diisi',
            'nama.required' => 'Nama ahli wajib diisi',
            'no_kp.required' => 'No kad pengenalan wajib diisi',
            'gambar.image' => 'Fail yang dihantar mestilah fail dalam format jpeg, png, bmp, gif, atau svg sahaja',
            'taip_kata_laluan.same' => 'Kata laluan yang ditaip semula tidak sama'
        ];
    }
}
