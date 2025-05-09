<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskPlusRequest extends FormRequest
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
        'title' => 'required|max:255',
        'descr' => 'required',
        'long_descr' => 'required'
        ];
    }
}
