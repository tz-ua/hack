<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'max:255',
            'email' => 'email|max:255',
            'phone' => 'max:20',
            'photo' => 'max:255',
            'position' => 'max:255',
            'team' => 'max:255',
            'workplace_id' => 'integer', //|exists:workplaces.id
        ];
    }
}
