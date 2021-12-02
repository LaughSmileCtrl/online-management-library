<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementRequest extends FormRequest
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
            'title' => 'required',
            'type_id' => 'required|gt:0',
            'message' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'judul pengumuman',
            'type_id' => 'tipe pengumuman',
            'message' => 'pesan',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi',
            'gt' => ':attribute harus dipilih',
        ];
    }
}
