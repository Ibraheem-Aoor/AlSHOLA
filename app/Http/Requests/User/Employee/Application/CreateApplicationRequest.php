<?php

namespace App\Http\Requests\User\Employee\Application;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class CreateApplicationRequest extends FormRequest
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
            "ref" => "required|string",
            "date" => "required|date",
            "title" => "required|string",
            "full_name" => "required|string",
            "address" => "required|string",
            "contact_no" => "required|numeric",
            "passport_no" => "required|string",
            "nationality" => "required|string",
            "place_issued" => "required|string",
            "place_of_birth" => "required|string",
            "date_issued" => "required|date",
            "date_of_birth" => "required|date",
            "expiry_issued" => "required|date",
            "age" => "required|numeric",
            "relegion" => "required|string",
            "sex" => "required|string",
            "children" => "required|string",
            "height" => "required|string",
            "weihgt" => "required|string",
            "arabic_speak" => "required|string",
            "arabic_understand" => "required|string",
            "arabic_read" => "required|string",
            "arabic_write" => "required|string",
            "english_speak" => "required|string",
            "english_understand" => "required|string",
            "english_read" => "required|string",
            "english_write" => "required|string",
            "hindi_speak" => "required|string",
            "hindi_understand" => "required|string",
            "hindi_read" => "required|string",
            "hindi_write" => "required|string",
            "addMoreInputFields.*.name" => "required|string",
            "addMoreInputFields.*.duration" => "required|string",
            "addMoreInputFields.*.country" => "required|string",
            "addMoreInputFields.*.designation" => "required|string",
            'a.*.degree' => 'required|string',
            'addMoreEducationRecords.*.year' => 'required|numeric',
            'addMoreEducationRecords.*.from' => 'required|string',
            'addMoreEducationRecords.*.country' => 'required|string',
            "applicant_interviewd_by" => "required|string",
            "min_salary" => "required|numeric",
            "recommendations" => "required|string",
            'father_name' => 'required|string',
            'photo' => 'required|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'files.*' => 'required|mimes:jpg,png,jpeg,gif,svg,pdf|max:2048',

        ];
    }
}



