<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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


        $rules = [
            'brand' => 'required',
            'model'  => 'required',

            'fuel_type' => 'required',
            'price'=> 'required|numeric',
            'gearbox' => 'required',
            'available' => 'required',
        ];
        if($this->route()->getActionMethod() === 'store') {
            $rules['photo'] ='required|image' ;
        }
        return $rules;
    }
}
