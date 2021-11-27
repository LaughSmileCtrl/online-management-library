<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'email' => 'required|email:rfc|unique:users,email',
            'nrp' => 'required|numeric|unique:user_details,nrp',
            'department_id' => 'required|numeric|gt:0',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nama',
            'department_id' => 'jurusan'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi',
            'unique' => ':attribute sudah ada',
            'numeric' => 'harus berupa angka',
            'gt' => ':attribute harus dipilih',
            'email.email' => 'Masukkan hanya email',
        ];
    }
}
