<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'is_admin' => 'nullable|in:0,1',
            'dept' => 'nullable',
            'year' => 'nullable',
            'first_avg' => 'nullable',
            'second_avg' => 'nullable',
            'global_avg' => 'nullable',
            'group_id' => 'nullable',
        ];

        if ($this->getMethod() == "POST") {
            $rules += ['password' => 'required|confirmed|min:6'];
        }

        if ($this->getMethod() == "PUT") {
            $rules += ['password' => 'nullable'];
        }

        return $rules;
    }
}
