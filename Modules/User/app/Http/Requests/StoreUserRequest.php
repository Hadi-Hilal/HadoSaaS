<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest {
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array {
        return [
            'img' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:1048',
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|numeric|min_digits:11|unique:users,mobile',
            'password' => 'required|min:6',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }
}
