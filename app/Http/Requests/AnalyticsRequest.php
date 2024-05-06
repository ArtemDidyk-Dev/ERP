<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\DTO\AnalyticsDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AnalyticsRequest extends FormRequest
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
            'offer' => 'required|max:200|string',
            'geo' => 'required|max:200|string',
            'vertical' => 'required|max:200|string',
            'income' => 'required|decimal:2',
            'expenses' => 'required|decimal:2',
            'source' => 'required|max:200|string',
        ];
    }

    /**
     * Get the DTO for the request.
     */
    public function getDTO(): AnalyticsDTO
    {
        return new AnalyticsDTO(
            $this->input('offer'),
            $this->input('geo'),
            $this->input('vertical'),
            (float) $this->input('expenses'),
            (float) $this->input('income'),
            $this->input('source'),
            (int) Auth::id()
        );
    }
}
