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
            'title' => 'required|min:3|max:255', // Increased max for title
            'title_japanese' => 'nullable|min:1|max:255', // Made nullable, min 1 if present
            'description' => 'required|min:10',
            'description_id' => 'nullable|min:10', // Made nullable
            'release_date' => 'required|date',
            'categories' => 'nullable|array', // For category relationships
            'categories.*' => 'exists:categories,id', // Each item in categories array must exist in categories table
            'genres' => 'nullable|array', // Changed from string to array for multi-select
            'genres.*' => 'exists:genres,id', // Each item in genres array must exist in genres table
            'cast_text' => 'nullable|string|max:1000', // Input as comma-separated string
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // For file upload
            'image_url' => 'nullable|url|max:2048', // Optional URL input
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
            'title.required' => 'Judul film harus diisi.',
            'title.min' => 'Judul film minimal 3 karakter.',
            'title.max' => 'Judul film maksimal 255 karakter.',
            'title_japanese.min' => 'Judul film Jepang minimal 1 karakter.',
            'title_japanese.max' => 'Judul film Jepang maksimal 255 karakter.',
            'description.required' => 'Deskripsi film harus diisi.',
            'description.min' => 'Deskripsi film minimal 10 karakter.',
            'description_id.min' => 'Deskripsi film (ID) minimal 10 karakter.',
            'release_date.required' => 'Tanggal rilis film harus diisi.',
            'release_date.date' => 'Format tanggal rilis film tidak valid.',
            'categories.*.exists' => 'Kategori yang dipilih tidak valid.',
            'genres.*.exists' => 'Genre yang dipilih tidak valid.',
            'cast_text.string' => 'Format pemeran tidak valid.',
            'cast_text.max' => 'Daftar pemeran terlalu panjang (maksimal 1000 karakter).',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau webp.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
            'image_url.url' => 'URL gambar tidak valid.',
        ];
    }
}
