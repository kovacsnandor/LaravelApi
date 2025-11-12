<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'category' => 'required|string|min:2',
             //'name' => 'required|string|min:2|unique:products,name',
             'name' => 'required|string|min:2',
             'description' => 'required|string|min:2',
             'picture' => 'required|string|min:2',
             'price' => 'required|integer',
             'stock' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            // Általános hiba: A "category" mező kötelező
            'category.required' => 'A kategória mező kitöltése kötelező.', 

            // Több szabályhoz tartozó üzenet a "name" mezőnél
            'name.required'     => 'A termék nevének megadása elengedhetetlen.',
            'name.min'          => 'A termék nevének legalább :min karakter hosszúnak kell lennie.',

            // Példa a "price" mezőre
            'price.required'    => 'Az ár mező nem lehet üres.',
            'price.integer'     => 'Az árnak egész számnak kell lennie (pl. 1200, nem 1200.50).',
            
            // Példa a "stock" mezőre
            'stock.required'    => 'A raktárkészletet meg kell adni.',
            'stock.integer'     => 'A raktárkészletnek egész számnak kell lennie.',
        ];
    }
}
