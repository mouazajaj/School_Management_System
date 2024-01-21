<?php

namespace App\Http\Requests\Admin\Student;

use App\Models\ClassModel;
use App\Models\User;
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
            'password'=>['min:8','confirmed','nullable'],
            'mobile_phone'=>['max:15'],
            'parent_id'=> [Rule::in(User::role('Parent')->pluck('id'))],
            'status'=>[Rule::in([0,1])],
            'gender'=>['required',Rule::in(['m','f'])],
            'class_id'=>['required',Rule::in(ClassModel::all()->pluck('id'))],
            'profile_picture' => ['file','size:512','dimensions:min_width=100,min_height=200'],
        ];
    }
}