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
            'salary' => 'required|numeric',
            'file_type' => 'sometimes',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'responsibilities' => 'required_without:responsibilites_file|nullable|string',
            'end_date' => 'required|date',
            'vacancy' => 'required|numeric',
            'nationality' => 'required',
            'attachments.*' => 'sometimes|mimes:jpg,jpeg,png,svg,pdf|max:10024',
            'responsibilites_file' => 'required_without:responsibilities|nullable|mimes:jpg,jpeg,png,svg,pdf|max:10024',
        ];
    }
}
