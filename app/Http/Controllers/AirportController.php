<?php

namespace App\Http\Controllers;

use App\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{

    public function showAllAirport()
    {
        return response()->json(Airport::all());
    }

    public function showOneAirport($id)
    {
        return response()->json(Airport::find($id));
    }

    public function create(Request $request)
    {
        $airport = Airport::create($request->all());

        return response()->json($airport, 201);
    }

    public function update($id, Request $request)
    {
        $airport = Airport::findOrFail($id);
        $airport->update($request->all());

        return response()->json($airport, 200);
    }

    public function delete($id)
    {
        Airport::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}