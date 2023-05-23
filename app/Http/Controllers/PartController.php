<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function index()
    {
        $parts = Part::all();
        return view('parts.index', compact('parts'));
    }

    public function create()
    {
        $cars = Car::all();
        return view('parts.create', compact('cars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'serialnumber' => 'required|integer',
            'car_id' => 'required|exists:cars,id',
        ]);

        Part::create($request->all());

        return redirect()->route('parts.index')->with('success', 'Part created successfully.');
    }

    public function edit(Part $part)
    {
        $cars = Car::all();
        return view('parts.edit', compact('part', 'cars'));
    }

    public function update(Request $request, Part $part)
    {
        $request->validate([
            'name' => 'required',
            'serialnumber' => 'required',
            'car_id' => 'required|exists:cars,id',
        ]);

        $part->update($request->all());

        return redirect()->route('parts.index')->with('success', 'Part updated successfully.');
    }

    public function destroy(Part $part)
    {
        $part->delete();

        return redirect()->route('parts.index')->with('success', 'Part deleted successfully.');
    }
}
