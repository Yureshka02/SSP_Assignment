<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'employee_id' => 'required|integer',
            'time' => 'required|string|max:10',
        ];
    }
}
