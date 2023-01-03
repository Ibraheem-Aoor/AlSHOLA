<?php

namespace App\Http\Requests\User\Employer\Job;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule as ValidationRule;
use Throwable;

class CreateJobRequest extends FormRequest
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
        return  [
            'currency' => 'required',
            'working_days' => 'required',
            'accommodation' => 'required',
            'accommodation_amount' => 'sometimes',
            'food_amount' => 'sometimes',
            'food' => 'required',
            'joining_ticket' => 'required',
            'agree' => 'required',
            // 'return_ticket' => 'required',
            'off_day' => 'required',
            // 'other_terms' => 'required',
            // 'gender_prefrences' => 'required',
            // 'age_limit' => 'required',
            'attachments.*' => 'sometimes|mimes:jpg,jpeg,png,svg,pdf|max:10024',
            'subJob.*.title' => 'required',
            'subJob.*.quantity' => 'required',
            'subJob.*.salary' => 'required',
            'subJob.*.nationality' => 'required',
            'subJob.*.age' => 'required',
            'subJob.*.gender' => 'required',
        ];
    }


    public function messages()
    {
        return
        [
            'subJob.*.title.required' => 'Demand Title Field Required',
            'subJob.*.quantity.required' => 'Demand quantity Field Required',
            'subJob.*.salary.required' => 'Demand salary Field Required',
            'subJob.*.nationality.required' => 'Demand nationality Field Required',
            'subJob.*.age.required' => 'Demand age Field Required',
            'subJob.*.gender.required' => 'Demand gender Field Required',
            'subJob.*.sector.required' => 'Demand sector Field Required',
        ];
    }


}
