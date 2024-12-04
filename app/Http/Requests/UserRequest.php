<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            "name"=> "required",
            "email"=> ["required",  Rule::unique('users')->ignore($this->route('usuario'))],
            "password"=> $this->route('usuario')? "nullable|confirmed":"required|confirmed", // campo==campo_confirmation
            'role'=>['required', 'in:admin,user']
        ];
    }
}
