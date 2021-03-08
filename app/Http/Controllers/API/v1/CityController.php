<?php

namespace App\Http\Controllers\API\v1;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCityRequest;

class CityController extends Controller
{
    #Route::get('/api/v1/cites')
    public function index()
    {
        return City::getWorking();
    }

    #Route::post('api/v1/cites')->middleware('check:admin');
    public function store(CreateCityRequest $request)
    {
        return City::createWorking($request->input());
    }

    #Route::put('/api/v1/cites/{city}')->middleware('check:admin');
    public function update(City $city, Request $request)
    {
        $city->update($request->input());

        return $city;
    }

    #Route::delete('/api/v1/cites/{city}')->middleware('check:admin');
    public function delete(City $city)
    {
        $city->delete();

        return $city;
    }
}
