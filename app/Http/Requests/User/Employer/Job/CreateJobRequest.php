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
            'title' => 'required',
            'nationality' => 'required',
            'salary' => 'required|numeric',
            'quantity' => 'required|numeric',
            'description' => 'required|string',
            // 'subJob.*.title' => 'required',
            // 'subJob.*.quantity' => 'required',
            // 'subJob.*.salary' => 'required',
            // 'subJob.*.nationality' => 'required',
            // 'subJob.*.descreption' => 'required',
        ];
    }


}
