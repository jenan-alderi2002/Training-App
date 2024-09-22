<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Employee_servicesController extends Controller
{
    public function create(Request $request){
        $filed=$request->file('filed');
    }
}
