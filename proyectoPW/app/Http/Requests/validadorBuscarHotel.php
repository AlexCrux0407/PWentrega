<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validadorBuscarHotel extends FormRequest
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
                'checkin' => 'required|date|after:today|before_or_equal:2026-01-01',
                'checkout' => 'required|date|after:checkin|before_or_equal:2026-01-01',
                'ciudad' => 'required|string',
        ];
    }
}
