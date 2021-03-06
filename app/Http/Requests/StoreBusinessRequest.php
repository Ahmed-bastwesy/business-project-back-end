<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBusinessRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:4',
            'description' => 'required|string|min:20',
            'facebook' => '',
            'instagram' => '',
            'category_id' => 'required|exists:\App\Models\Category,id',
            'user_id' => 'required|exists:\App\Models\User,id'
        ];
    }
}
