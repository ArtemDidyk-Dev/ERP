<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\DTO\RegistrationDTO;
use App\Models\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AuthRegistrationRequest extends FormRequest
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
            'name' => 'required|max:25|string',
            'email' => 'required|email|string|unique:users',
            'password' => 'required|min:6|string|confirmed',
            'role' => ['required', Rule::in([Role::STATUS_TEAMLEADER_ID, Role::STATUS_BUYER_ID])],
        ];
    }

    /**
     * Get the DTO for the request.
     */
    public function getDTO(): RegistrationDTO
    {
        return new RegistrationDTO(
            $this->input('name'),
            $this->input('email'),
            $this->input('password'),
            (int) $this->input('role')
        );
    }
}
