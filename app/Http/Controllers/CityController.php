<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\CityRequest;
use Illuminate\Http\Request;

class CityController extends Controller
{

    public function index()
    {
        $cities = City::paginate(15);
        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function store(CityRequest $request)
    {
        City::create($request->all());
        return redirect()->route('city.index');
    }

    public function show(City $city)
    {
        return view('admin.cities.show', compact('city'));
    }

    public function edit(City $city)
    {
        return view('admin.cities.edit', compact('city'));
    }

    public function update(CityRequest $request, City $city)
    {
        $city->update($request->all());
        return redirect()->route('city.show', $city->id);
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('city.index');
    }
}
