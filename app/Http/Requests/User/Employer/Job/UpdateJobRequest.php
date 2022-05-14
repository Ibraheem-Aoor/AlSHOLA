<?php

namespace App\Http\Requests\User\Employer\Job;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobRequest extends FormRequest
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
            'title' => 'required',
            'nationality' => 'required',
            'salary' => 'required|numeric',
            'quantity' => 'required|numeric',
            'contract_period' => 'required',
            'working_hours' => 'required',
            'working_days' => 'required',
            'accommodation' => 'required',
            'transport' => 'required',
            'medical' => 'required',
            'insurance' => 'required',
            'food' => 'required',
            'annual_leave' => 'required',
            'air_ticket' => 'required',
            'off_day' => 'required',
            'indemnity_leave_and_overtime_salary' => 'required',
            'covid_test' => 'required',
            'other_terms' => 'required',
            'description' => 'required|string',
            // 'location' => 'required|string',
            // 'file_type' => 'sometimes',
            // 'responsibilities' => 'required_without:responsibilites_file|nullable|string',
            // 'end_date' => 'required|date',
            // 'vacancy' => 'required|numeric',
            // 'nationality' => 'required',
            // 'attachments.*' => 'sometimes|mimes:jpg,jpeg,png,svg,pdf|max:10024',
            // 'responsibilites_file' => 'required_without:responsibilities|nullable|mimes:jpg,jpeg,png,svg,pdf|max:10024',
    ];
    }
}
