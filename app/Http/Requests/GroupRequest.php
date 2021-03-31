<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;

class GroupRequest extends FormRequest
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

        if($this->getMethod() === 'POST'){
            return [
                'name' => 'required|string|max:100|unique:groups',
                'qty' => 'required',
                'highest_student' => 'nullable',
                'group_avg' => 'nullable',
            ];
        }

        if($this->getMethod() === 'PUT'){
            return [
                'name' => "required|string|max:100",
                'qty' => 'required',
                'highest_student' => 'nullable',
                'group_avg' => 'nullable'
            ];
        }

    }
}
