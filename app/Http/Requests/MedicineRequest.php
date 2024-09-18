<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicineRequest extends FormRequest
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
            'sName'=>'required|unique:medicines|string',
            'tName'=>'required|unique:medicines|string',
            'company'=>'required',
            'category'=>'required',
            'price'=>'required',
            'amount'=>'required',
            'exDate'=>'required',
        ];
    }
    public function messages():array{
        return [
            'sName.required'=>'Please Insert Scientific Name',
            'tName.required'=>'Please Insert Trade Name',
            'sName.unique'=>'This Name Was Inserted Before',
            'tName.unique'=>'This Name Was Inserted Before',
            'sName.string'=>'This Name Should Be String',
            'tName.string'=>'This Name Should Be String',
            'price.required'=>'Please Insert Price',
            'amount.required'=>'Please Insert Amount',
            'exDate.required'=>'Please Insert Expiration Date',
            'category.required'=>'Please Insert Category',
            'company.required'=>'Please Insert Company',
        ];
    }
}
