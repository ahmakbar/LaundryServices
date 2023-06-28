<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerOrderStoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'jenis' => 'required',
            'berat' => 'nullable|integer',
            'harga_total' => 'nullable|integer',
            'catatan' => 'nullable',
            'paket_laundry_id' => 'required|exists:paket_laundries,paket_laundry_id',
        ];
    }
}
