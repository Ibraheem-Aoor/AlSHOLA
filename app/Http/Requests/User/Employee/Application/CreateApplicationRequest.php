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
        return [
            'cv' => 'nullable|mimes:jpg,jpeg,png,svg,pdf|max:10024',
            'cover_letter' => 'required|string',
            'prev_cv_checked' => 'nullable',
        ];
    }
}
