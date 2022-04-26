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
        try
        {

        return [
            'title' => 'required|string',
                'salary' => 'required|numeric',
                'location' => 'required|string',
                'employer_website' => 'required|string',
                'description' => 'required|string',
                'requirements' => 'required|string',
                'responsibilities' => 'required|string',
                'end_date' => 'required|date',
                'vacancy' => 'required|numeric',
                'nature' => 'required|string|'.ValidationRule::in(['full time', 'part time']),
                'attachments.*' => 'nullable|mimes:jpg,jpeg,png,svg,pdf|max:10024',
        ];
    }catch(Throwable $e)
    {
        return redirect()->back()->with('error' , 'Attachmennts are too large');

    }

    }
}
