<?php

namespace App\Http\Requests\Announcement;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'url' => ['required', 'string', 'url', 'regex:/\/obyavlenie\/([^\/]+)\.html/'],
        ];
    }

    public function authorize(): bool
    {
        return $this->user() !== null;
    }
}
