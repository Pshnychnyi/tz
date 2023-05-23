<?php

namespace App\Http\Controllers;


use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        return view('cars.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'registration_number' => 'sometimes|nullable|integer|required_if:is_registered,1',
            'is_registered' => 'boolean',
        ]);


        Car::create($request->all());

        return redirect()->route('cars.index')->with('success', 'Car created successfully.');
    }

    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'registration_number' => 'sometimes|nullable|integer|required_if:is_registered,1',
            'is_registered' => 'boolean',
        ]);

        $car->update($request->all());

        return redirect()->route('cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route('cars.index')->with('success', 'Car deleted successfully.');
    }
}
