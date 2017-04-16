<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
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
            'name' => 'required|min:2',
            'closing_date' => 'required',
            'description' => 'required'
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'name.required' => 'Please provide a Name',
    //         'name.min' => 'Please provide a Name longer tha 2 Characters',
    //         'closing_date.required' => 'Please provide an Closing date',
    //         'description.required' => 'Please provide a Description'
    //     ];
    // }

}
