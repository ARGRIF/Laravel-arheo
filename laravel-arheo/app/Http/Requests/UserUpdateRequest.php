<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => [ 'required','regex:/^(\+380)[0-9]{9}$/'],
            'position_at_work' => ['required', 'string','min:5', 'max:255'],
            'specialization' => ['required', 'string', 'min:5', 'max:255'],
            'avatar' => ['image', 'mimes:jpg,jpeg,bmp,svg,png'],
        ];
    }
}
