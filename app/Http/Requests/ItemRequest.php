<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'introduction' => 'required|string|max:300',
            'price' => 'required|integer|between:300, 99999',
            'image' => 'file|image|nullable',
            'category_id' => 'required|exists:sub_categories,id',
            'status_id' => 'required|exists:statuses,id'
        ];
    }
}
