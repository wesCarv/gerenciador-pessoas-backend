<?php

namespace App\Http\Controllers;



use App\Exceptions\CreateUserService;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $createUserService = new CreateUserService();
        return $createUserService->execute($request->all());
    }

    public function index()
    {
        $user_teste = User::with('taxes')->get();
        return response()->json($user_teste);
    }

    public function show ($id) {
        $user = User::with('taxes')->find($id);
        if(!empty($user)){
        return response()->json($user);
        }else{
            return response()->json(['message'=> 'User not found'],404);
        }
    }

    public function update(Request $request, $id)
    {
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->name = is_null($request->name) ? $user->name : $request->name;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->cellphone = is_null($request->cellphone) ? $user->cellphone : $request->cellphone;
            $user->age = is_null($request->age) ? $user->age : $request->age;
            $user->country = is_null($request->country) ? $user->country : $request->country;
            $user->state = is_null($request->state) ? $user->state : $request->state;
            $user->city = is_null($request->city) ? $user->city : $request->city;
            $user->save();
            return response()->json($request, 202);
        } else {
            return response()->json("User not found", 404);
        }
    }

    public function destroy($id)
    {
        if (User::where('id', $id)->exists()) {
            $user = User::find($id);
            $user->delete();
            return response()->json(null, 204);
        } else {
            return response()->json("user not found", 404);
        }
    }
}