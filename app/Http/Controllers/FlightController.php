<?php

namespace App\Http\Controllers;

use App\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{

    public function showAllFlight()
    {
        return response()->json(Flight::all());
    }

    public function showOneFlight($id)
    {
        return response()->json(Flight::find($id));
    }

    public function create(Request $request)
    {
        $flight = Flight::create($request->all());

        return response()->json($flight, 201);
    }

    public function update($id, Request $request)
    {
        $flight = Flight::findOrFail($id);
        $flight->update($request->all());

        return response()->json($flight, 200);
    }

    public function delete($id)
    {
        Flight::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}