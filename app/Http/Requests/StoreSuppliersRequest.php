<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSuppliersRequest extends FormRequest
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
            //name
            'name' => 'required|string|max:255',
            //product
            'product' => 'required|string|max:255',
            //email
            'email' => 'required|email',
            //phone
            'phone' => 'required|string|max:255',
            //address
            'address' => 'required|string|max:255',

        ];
    }
}
