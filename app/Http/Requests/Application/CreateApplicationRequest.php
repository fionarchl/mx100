<?php

namespace App\Http\Requests\Application;

use Illuminate\Foundation\Http\FormRequest;

class CreateApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'job_id' => 'required|exists:jobs,id',
            'cv_path' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'nullable|string',
        ];
    }
}