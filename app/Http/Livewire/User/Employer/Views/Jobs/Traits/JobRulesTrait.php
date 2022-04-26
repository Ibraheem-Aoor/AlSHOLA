<?php
namespace App\Http\Livewire\User\Employer\Views\Jobs\Traits;

Trait JobRulesTrait
{
    public function rules()
    {
        return [
            'title' => 'required|string',
            'salary' => 'required|numeric',
            'vacancy' => 'required|numeric',
            'location' => 'required|string',
            'website' => 'required|string|url',
            'nature' => 'required|string',
            'endDate' => 'required|string|date',
            'responsebilites' => 'required|string',
            'descreption' => 'required|string',
            'requirements' => 'required|string',
            // 'attachments.*' => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf,docx',
        ];
    }
}
