<?php

namespace App\Http\Requests\User\Employer\Job;

use Illuminate\Foundation\Http\FormRequest;

class SetUpJobReqeust extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return  [
            'sector' => 'required',
            'currency' => 'required',
            'working_days' => 'required',
            'accommodation' => 'required',
            'accommodation_amount' => 'sometimes',
            'food_amount' => 'sometimes',
            'food' => 'required',
            'joining_ticket' => 'required',
            'return_ticket' => 'required',
            'off_day' => 'required',
            'other_terms' => 'required',
            'gender_prefrences' => 'required',
            'age_limit' => 'required',
            'attachments.*' => 'sometimes|mimes:jpg,jpeg,png,svg,pdf|max:10024',
        ];
    }
}
