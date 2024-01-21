<?php

namespace App\Http\Requests\admin\admin;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email'=>['required','email','unique:users'],
            'password'=>['required','min:8','confirmed'],
            'name'=>['required','max:50','unique:users'],
            'gender'=>['required',Rule::in(['m','f'])],
        ];
    }
}