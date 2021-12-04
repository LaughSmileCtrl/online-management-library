<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProfileDetailRequest extends FormRequest
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
            'nrp' => 'numeric',
            'department_id' => 'required|numeric|gt:0',
            'address' => '',
        ];
    }

    public function attributes()
    {
        return [
            'department_id' => 'jurusan',
        ];
    }

    public function messages()
    {
        return [
            'nrp.numeric' => 'nrp harus angka',
            'department_id.gt' => ':attribute harus dipilih',
        ];
    }
}
