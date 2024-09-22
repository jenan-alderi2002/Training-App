<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        return Employee::all();
    }
    public  function show($id){
        $employee=Employee::find($id);
        if(!$employee){
            return response()->json(["message"=>"Employee not found"],404);
        }
        $employee = Employee::with('experiences')->findOrFail($id);
        return new EmployeeResource($employee);
    }
    public function Search($name){

        $employee = Employee::where('name', 'like', '%' . $name . '%')->get();
        if ($employee->isEmpty()) {

            return response()->json([['message' => 'No Employee found']], 404);
        }
        return response()->json($employee, 200);

    }
}
