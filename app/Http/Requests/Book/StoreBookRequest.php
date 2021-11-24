<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class StoreBookRequest extends FormRequest
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
            'isbn' => ['required', 'numeric', Rule::unique('books')->ignore($this->book)],
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'category_id' => 'required|gt:0',
            'condition_id' => 'required|gt:0',
            'year' => 'required|digits:4',
            'description' => 'required',
            'quantity' => 'required|gt:0',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'judul',
            'author' => 'penulis',
            'publisher' => 'penerbit',
            'category_id' => 'ketogori',
            'condition_id' => 'kondisi',
            'year' => 'tahun',
            'description' => 'deskripsi',
            'quantity' => 'jumlah',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi',
            'numeric' => ':attribute harus angka',
            'unique'=> ':attribute telah ada',
            'quantity.gt' => 'minimal 1 buah',
            'year.digits' => ':attribute harus 4 digit',
            'gt' => ':attribute harus dipilih',
        ];
    }
}
