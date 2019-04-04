<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUserRequest extends FormRequest
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
                'password' => 'required|min:6',
                'email' => 'nullable|email',
                'is_enable' => 'required',
                'is_super' => 'required',
            ];

            switch ($this->method()) {
                case 'post':
                    $rules['username'] = 'required|unique:users';
                    break;

                case 'put':
                    $rules['username'] = 'required|unique:users,username,' . $this->route('id');
                    break;

                default:
                    break;
            }
        }
        
        return $rules;
    }
}
