<?php

namespace App\Http\Requests;

class TaskStoreRequest extends BaseFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'        => ['required', 'string', 'min:5', 'max:256'],
            'is_completed' => ['sometimes', 'required', 'boolean'],
        ];
    }
}
