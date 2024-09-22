<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){
        return Service::all();

    }

    public function Search($name){

        $service = Service::where('name', 'like', '%' . $name . '%')->get();
        if ($service->isEmpty()) {

            return response()->json([['message' => 'No Services found']], 404);

        }
        return response()->json($service, 200);

    }
}
