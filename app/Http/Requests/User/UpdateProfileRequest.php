<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'email' => ['required', Rule::unique('users')->ignore($this->email, 'email')],
            'image' => 'image|max:1024',

        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi',
            'email.unique' => 'email sudah ada',
            'image.image' => 'foto harus jpg, jpeg atau png',
            'image.max' => 'ukuran foto harus kurang dari 1 mb',

        ];
    }
}
