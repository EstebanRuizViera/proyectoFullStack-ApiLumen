<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get the authenticated User.
     *
     * @return Response
     */
    public function profile()
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    /**
     * Get all User.
     *
     * @return Response
     */
    public function allUsers()
    {
         return response()->json(['users' =>  User::all()], 200);
    }

    /**
     * Get one user.
     *
     * @return Response
     */
    public function singleUser($id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json(['user' => $user], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'user not found!'], 404);
        }

    }

    public function showAllUser()
    {
        return response()->json(User::all());
    }

    public function showOneUser($id)
    {
        return response()->json(User::find($id));
    }

    public function create(Request $request)
    {
        $user= User::create($request->all());

        return response()->json($user,201);
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }

    
}