<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'title' => 'required|string',
             'lng' => 'required|string',
             'lat' => 'required|string',
             'description' => 'required|string',
             'type' => 'required|numeric',
             'washroom' => 'required|numeric',
             'balcony' => 'required|numeric',
             'position' => 'required|string',
             'bad' => 'required|numeric',
             'room_number' => 'required|numeric',

             'available_from' => 'required|date',
             'city' => 'required|exists:cities,id',
             'area' => 'required|exists:areas,id',
             'address' => 'required|string',

             'rent_price' => 'nullable',
             'electric_bill' => 'nullable',
             'water_bill' => 'nullable',
             'gas_bill' => 'nullable',
             'service_bill' => 'nullable',
             'negotiable' => 'nullable|boolean',
             'others_bill' => 'nullable',

             'male_student' => 'nullable|boolean',
             'female_student' => 'nullable|boolean',
             'man_job' => 'nullable|boolean',
             'women_job' => 'nullable|boolean',
             'family' => 'nullable|boolean',
             'any' => 'nullable|boolean',

             'lift' => 'nullable|boolean',
             'generator' => 'nullable|boolean',
             'guard' => 'nullable|boolean',
             'parking' => 'nullable|boolean',
             'gas' => 'nullable|boolean',
             'internet' => 'nullable|boolean',

             'islam' => 'nullable|boolean',
             'hindu' => 'nullable|boolean',
             'christian' => 'nullable|boolean',
             'bouddho' => 'nullable|boolean',
             'any_religion' => 'nullable|boolean',

             'feature_image1' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif',
             'feature_image2' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif',
             'feature_image3' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif',
             'feature_image4' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif',
             'feature_image5' => 'nullable|image|mimes:jpg,jpeg,png,svg,gif',
        ];
    }
}
