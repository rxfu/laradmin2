<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePermissionRequest extends FormRequest
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
        $rules = [];

        if ($this->isMethod('post') || $this->isMethod('put')) {
            $rules = [
                'slug' => 'required',
                'name' => 'required',
            ];
        }
        
        return $rules;
    }
}
