<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // return false; defaultnya false
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:3|max:200',
            'title_japanese' => 'required|min:3|max:200',
            'description' => 'required|min:10|max:500',
            'description_id' => 'required|min:10|max:500',
            'release_date' => 'required|date',
            'cast' => 'required|min:2|max:100',
            'genres' => 'required|min:1|max:100',
            'image' => 'required|url',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Judul film harus diisi',
            'title.min' => 'Judul film minimal 3 karakter',
            'title.max' => 'Judul film maksimal 200 karakter',
            'description.required' => 'Deskripsi film harus diisi',
            'description.min' => 'Deskripsi film minimal 10 karakter',
            'description.max' => 'Deskripsi film maksimal 500 karakter',
            'release_date.required' => 'Tanggal rilis film harus diisi',
            'release_date.date' => 'Tanggal rilis film tidak valid',
            'cast.required' => 'Pemeran film harus diisi',
            'cast.min' => 'Pemeran film minimal 2 karakter',
            'cast.max' => 'Pemeran film maksimal 100 karakter',
            'genres.required' => 'Genre film harus diisi',
            'genres.min' => 'Genre film minimal 1 karakter',
            'genres.max' => 'Genre film maksimal 100 karakter',
        ];
    }
}
