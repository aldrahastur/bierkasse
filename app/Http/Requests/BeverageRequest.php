<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeverageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'selling_price' => ['required', 'numeric'],
            'purchase_price' => ['nullable', 'numeric'],
            'quantity' => ['required', 'integer'],
            'team_id' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
