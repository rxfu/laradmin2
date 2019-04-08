<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveSettingRequest extends FormRequest
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
                'slug' => 'requird',
                'name' => 'required',
                'is_enable' => 'required',
                'begin_at' => 'nullable|date',
                'end_at' => 'nullable|date',
            ];

            switch ($this->method()) {
                case 'POST':
                    $rules['slug'] = 'required|unique:settings';
                    break;

                case 'PUT':
                    $rules['slug'] = 'required|unique:settings,slug,' . $this->route('id');
                    break;

                default:
                    break;
            }
        }
        
        return $rules;
    }
}
