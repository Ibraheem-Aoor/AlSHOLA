<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewCaseRequest extends FormRequest
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
        return [
            'application_id' => 'required' ,
            'reason' => 'required' ,
            'contact_number'=> 'nullable' ,
            'other_reason' => 'nullable',
            'attachments.*' => 'nullable|mimes:jpg,jpeg,png,svg,pdf|max:10024',
        ];
    }


    public function messages()
    {
        return [
            'application_id.required' => 'Application is required',
        ];
    }
}
