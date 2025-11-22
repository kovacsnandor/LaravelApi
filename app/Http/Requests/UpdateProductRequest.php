<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'category' => 'nullable|string|min:2',
             //'name' => 'nullable|string|min:2|unique:products,name',
             'name' => 'nullable|string|min:2',
             'description' => 'nullable|string|min:2',
             'picture' => 'nullable|string|min:2',
             'price' => 'nullable|integer',
             'stock' => 'nullable|integer',
        ];
    }


     public function messages(): array
    {
        return [
            // Általános hiba: A "category" mező kötelező

            // Több szabályhoz tartozó üzenet a "name" mezőnél
            'name.min'          => 'A termék nevének legalább :min karakter hosszúnak kell lennie.',

            // Példa a "price" mezőre
            'price.integer'     => 'Az árnak egész számnak kell lennie (pl. 1200, nem 1200.50).',
            
            // Példa a "stock" mezőre
            'stock.integer'     => 'A raktárkészletnek egész számnak kell lennie.',
        ];
    }
}
