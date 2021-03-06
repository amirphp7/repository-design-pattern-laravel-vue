<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThanaRequest extends FormRequest
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
        return [
            'mahanagar_id'  => 'bail|required',
            'name'          => 'bail|required|unique:thanas,name,'.$this->id,
        ];
    }
}
