<?php

namespace App\Http\Requests\Admin\Parent;

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
            'name'=>['required', 'max:50','unique:users'],
            'email'=>['email','required'],
            'password'=>['min:8','required','confirmed'],
            'mobile_phone'=>['max:15'],
            'gender'=>['required',Rule::in(['f', 'm']),],
            'status'=>['required',Rule::in([0,1]),],
            'date_of_birth'=>['date','nullable'],
            'profile_picture' => ['file','size:512','dimensions:min_width=100,min_height=200'],
        ];
    }
}