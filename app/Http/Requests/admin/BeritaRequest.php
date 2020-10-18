<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class BeritaRequest extends FormRequest
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
            [
                'kategori' => ['required'],
                'tgl'      => ['required'],
                'judul'    => ['required', 'max:100', 'string'],
                'isi'      => ['required', 'string'],
                'foto'     => 'image|max:1024|mimes:png,jpg,jpeg,bmp',
            ]
        ];
    }
}
