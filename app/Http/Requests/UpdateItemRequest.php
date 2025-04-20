<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateItemRequest extends FormRequest
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
    public function rules()
{
    return [
        'category_id' => 'required|exists:categories,id',
        'name' => 'required|string|max:255',
        'type' => 'required|string',
        'brand' => 'required|string',
        'price' => 'required|numeric',
        'discount' => 'required|numeric|min:0|max:100',
        'final_price' => 'required|numeric',
        'stock' => 'required|integer|min:0',
        'short_description' => 'nullable|string|max:1000',
    ];
}

}
