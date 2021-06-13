<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
            'code' => ['required', 'string', 'max:255'],
            'date_of_detection' => ['required'],

            'village_id' => ['required', 'integer'],
            'involved_person' => ['string','min:5', 'max:255'],
            'location_area' => ['required'],
            'photos' => ['image', 'mimes:jpg,jpeg,bmp,svg,png'],
            'description' => ['string'],

            'authors' => ['required'],
            'topographies' => ['required'],
            'cultures' => ['required'],
        ];
    }
}
