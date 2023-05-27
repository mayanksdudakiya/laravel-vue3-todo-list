<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

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
            'title'        => ['required', 'string', 'min:5', 'max:255'],
            'is_completed' => ['sometimes', 'required', 'boolean', Rule::in([false]),],
        ];
    }
}
