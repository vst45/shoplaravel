<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'post' => 'required|string',
            'basket' => 'required|array',
            'basket.*.id' => 'required|integer',
            'basket.*.quantity' => 'required|string'
        ];
    }
}
