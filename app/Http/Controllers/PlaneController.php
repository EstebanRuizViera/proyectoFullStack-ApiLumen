<?php

namespace App\Http\Controllers;

use App\Plane;
use Illuminate\Http\Request;

class PlaneController extends Controller
{

    public function showAllPlane()
    {
        return response()->json(Plane::all());
    }

    public function showOnePlane($id)
    {
        return response()->json(Plane::find($id));
    }

    public function create(Request $request)
    {
        $plane = Plane::create($request->all());

        return response()->json($plane, 201);
    }

    public function update($id, Request $request)
    {
        $plane = Plane::findOrFail($id);
        $plane->update($request->all());

        return response()->json($plane, 200);
    }

    public function delete($id)
    {
        Plane::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }
}