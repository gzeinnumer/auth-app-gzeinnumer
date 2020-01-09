<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use  App\User;
use App\Http\Resources\UserColl;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return response()->json(['user' => Auth::user()], 200);
    }

    public function allUsers()
    {
         return response()->json(['users' =>  User::all()], 200);
    }

    public function singleUser($id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json(['user' => $user], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'user not found!'], 404);
        }

    }

    //use App\Http\Resources\UserColl;
    public function getAll()
    {
        try {
            $data = User::all();

            return response()->json(
                [
                    'users' => UserColl::collection($data)
                ], 200);

        } catch (\Exception $e) {

            return response()->json(['message' => 'user not found!'], 404);
        }
    }
}