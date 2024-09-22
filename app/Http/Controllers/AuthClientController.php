<?php

namespace App\Http\Controllers;

use App\Http\Requests\clientloginRequest;
use App\Http\Requests\clientregisterRequest;
use App\Models\Client;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthClientController extends Controller
{
    public function register(clientregisterRequest $request)
    {
        $fields = $request->validated();
        $client = Client::create($fields);
        $token=$client->createToken('myapptoken')->plainTextToken;

        $response = [
            'client' => $client,
            'token' => $token,
            'message' => 'success',
        ];

        return response($response, 201);
    }


    public function login(clientloginRequest $request)
    {
        $fields = $request->validated();

        //check email

        $client = Client::query()->where('email', $fields['email'])->first();
//check password
        if (!$client || !Hash::check($fields['password'], $client->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);

        }
        $token = $client->createToken('myapptoken')->plainTextToken;
        $response = [
            'client' => $client,
            'token' => $token,
            'message' => 'success',

        ];
        return response($response, 201);

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json('Logged out successfully');
    }



  public function  DeleteAcount(Request $request){
        $request->user()->currentAccessToken()->delete();
        $request->user()->delete();
        return response()->json('Delete Acount successfully');
  }

}
