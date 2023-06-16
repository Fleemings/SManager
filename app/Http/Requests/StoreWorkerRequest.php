<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => [
                'required',
                'string'
            ],
            'last_name' => [
                'string'
            ],
            'job_title' => [
                'string'
            ],
            'email' => [
                'required',
                'email',
                'unique:workers',
            ]
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute is required'
        ];
    }
}
