<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //validation
        $validData = $request->validate([
            'firstname' => 'required|max:55',
            'lastname' => 'required|max:55',
            'phone' => 'required|max:11|unique:users',
            'dateReg' => 'required',
            'gender' => 'required',
            //'password' => 'required',
            'img' => 'required',
            'totalCoinsAccrued' => 'required',
            'totalCurrentCoin' => 'required',
            'email' => 'required|max:55|unique:users',
            'state_id' => 'required',
            'polytechnic_id' => 'required',
            'university_id' => 'required',
            'department_id' => 'required',
            'regNum' => 'required|max:10'
        ]);

        //$validData['']
        $user = User::create($validData);
        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user'=>$user, 'access_token'=>$accessToken]);
    }

    public function login(Request $request)
    {
        //validation
        $loginData = $request->validate([
            'regNum' => 'required|max:10'
        ]);

        if(!auth()->attempt($loginData)){
            return response(['message' => 'Invalid credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        return response(['user'=>auth()->user(), 'access_token'=>$accessToken]);
    }
}
