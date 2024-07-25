<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasword extends FormRequest
{
     
    public function authorize(): bool
    {
        return true;
    }

     
    public function rules(): array
    {
        return [
            'password' => 'required|min:6',
            'confirm_password' => 'required|min:6|same:password',
        ];
    }
}
