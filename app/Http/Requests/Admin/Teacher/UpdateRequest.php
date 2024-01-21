<?php

namespace App\Http\Requests\Admin\Teacher;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'password'=>['min:8','nullable','confirmed'],
            'mobile_phone'=>['max:15'],
            'gender'=>['required',Rule::in(['f', 'm'])],
            'status'=>[Rule::in([0,1]),],
            'experience'=>[Rule::in(['junior','mid-level','senior'])],
            'date_of_birth'=>['date','nullable'],
            'profile_picture' => ['file','size:512','dimensions:min_width=100,min_height=200'],
        ];
    }
}