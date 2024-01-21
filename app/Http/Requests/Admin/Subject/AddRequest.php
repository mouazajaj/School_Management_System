<?php

namespace App\Http\Requests\Admin\subject;

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
            'name'=>['required','max:30','unique:subjects'],
            'type'=>['max:30',Rule::in(['theory','practical']),'nullable'],
            'status'=>['max:30',Rule::in([0,1]),'nullable']
        ];
    }
}