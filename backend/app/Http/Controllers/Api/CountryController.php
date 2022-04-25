<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Http\Responses\JsonResponse;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * #### `GET` `/api/v1/countries`
     * Pobranie listy krajów
     */
    public function getCountries(Request $request) {

        $paginationAttributes = $this->getPaginationAttributes($request);

        /** @var Country[] $countries */
        $countries = Country::filter()->paginate($paginationAttributes['perPage']);

        $result = $this->preparePagination($countries, $paginationAttributes['currentPage']);

        JsonResponse::sendSuccess($result['data'], $result['metadata']);
    }

    /**
     * #### `GET` `/api/v1/countries/{country}`
     * Pobranie danych wybranego kraju
     */
    public function getCountryById(Country $country) {
        JsonResponse::sendSuccess($country);
    }

    /**
     * #### `POST` `/api/v1/countries`
     * Utworzenie nowego kraju
     */
    public function createCountry(CountryRequest $request) {
        Country::create($request->only('name', 'continent', 'capital_city', 'area', 'population', 'population_density'));
        JsonResponse::sendSuccess('Success.', null, 201);
    }

    /**
     * #### `PATCH` `/api/v1/countries/{country}`
     * Edycja danych kraju
     */
    public function updateCountry(Country $country, CountryRequest $request) {
        $country->update($request->only('name', 'continent', 'capital_city', 'area', 'population', 'population_density'));
        JsonResponse::sendSuccess('Success.');
    }

    /**
     * #### `DELETE` `/api/v1/countries/{country}`
     * Usunięcie kraju
     */
    public function deleteCountry(Country $country) {
        $country->delete();
        JsonResponse::sendSuccess('Success.');
    }
}
