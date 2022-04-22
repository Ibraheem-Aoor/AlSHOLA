<?php
namespace App\Http\Livewire\User\Employer\Views\Jobs\Traits;

Trait JobRulesTrait
{
    public function rules()
    {
        return [
            'title' => 'required|string',
            'salary' => 'required|numeric',
            'location' => 'required|string',
            'employerWebsite' => 'required|string',
            'description' => 'required|string',
            'requirements' => 'required|string',
            'responsibilities' => 'required|string',
            'attachments.*' => 'nullable|mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf,docx',
        ];
    }
}
