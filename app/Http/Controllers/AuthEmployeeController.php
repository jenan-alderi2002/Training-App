<?php

namespace App\Http\Controllers;

use App\Http\Requests\clientloginRequest;
use App\Http\Requests\clientregisterRequest;
use App\Http\Requests\employeeloginRequest;
use App\Http\Requests\employeeregisterRequest;
use App\Models\Client;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthEmployeeController extends Controller
{
    public function register(employeeregisterRequest $request)
    {
        $fields = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/images');
            $fields['image'] = str_replace('public/', '', $imagePath);
        }

        $employee = Employee::create($fields);
        $token = $employee->createToken('myapptoken')->plainTextToken;

        $urlToImage = asset('storage/' . $employee->image);

        $response = [
            'employee' => $employee,
            'token' => $token,
            'image_url' => $urlToImage,
            'message' => 'success',
        ];

        return response($response, 201);
    }


    public function login(employeeloginRequest $request)
    {
        $fields = $request->validated();

        //check email

        $employee = Employee::query()->where('email', $fields['email'])->first();
//check password
        if (!$employee || !Hash::check($fields['password'], $employee->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);

        }
        $token = $employee->createToken('myapptoken')->plainTextToken;
        $response = [
            'employee' => $employee,
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
