<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validadorBuscarVuelo extends FormRequest
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
            'origen' => 'required|string|max:50',
            'destino' => 'required|string|max:50|different:origen',
            'fecha_salida' => 'required|date|after_or_equal:today',
            'fecha_regreso' => 'nullable|date|after:fecha_salida',

        ];
    }
    public function messages()
    {
        return [
            'origen.required' => 'El campo origen es obligatorio.',
            'destino.required' => 'El campo destino es obligatorio.',
            'destino.different' => 'El destino debe ser diferente del origen.',
            'fecha.required' => 'La fecha es obligatoria.',
            'fecha.date' => 'La fecha debe ser una fecha válida.',
            'fecha.after_or_equal' => 'La fecha debe ser hoy o en el futuro.',
        ];
    }
}
