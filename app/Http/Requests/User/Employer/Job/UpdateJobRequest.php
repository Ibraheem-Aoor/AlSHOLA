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
            'title' => 'required|string',
                'salary' => 'required|numeric',
                'location' => 'required|string',
                'employer_website' => 'required|string',
                'description' => 'required|string',
                'requirements' => 'required|string',
                'responsibilities' => 'required|string',
                'attachments.*' => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf,docx',
        ];
    }
}
