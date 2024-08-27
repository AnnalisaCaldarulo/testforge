<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'title' => 'required|max:100',
            'plot' => 'required|min:5',
            'price' => 'required',
            'pages' => 'required',
            'cover' => 'required|image'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Il campo titolo è obbligatorio',
            'title.max' => 'Il titolo deve avere massimo 10 caratteri',
            'plot.required' => 'Il campo della trama è obbligatorio',
            'plot.min' => 'La trama deve avere almeno 5 caratteri',
            'price.required' => 'Il campo del prezzo è obbligatorio',
            'pages.required' => 'Il campo del numero di pagine è obbligatorio',
            'cover.required' => 'Il campo dell\'immagine di copertina è obbligatorio',
            'cover.image' => 'L\'immagine deve essere un\'immagine'

        ];
    }
}
