<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CountryRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules(Request $request) {

        $urlSegments = $request->segments();

        if (isset($urlSegments[3])) {
            $countryId = $urlSegments[3];
        } else {
            $countryId = null;
        }

        return [
            'name' => 'required|string|max:50|unique:countries,name,' . $countryId,
            'continent' => 'nullable|string|max:20',
            'capital_city' => 'nullable|string|max:30',
            'area' => 'nullable|numeric|between:0,4294967295',
            'population' => 'nullable|integer|between:0,4294967295',
            'population_density' => 'nullable|numeric|between:0,4294967295',
        ];
    }
}
