<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return Category::all();
    }

    public function Search($name){

        $category = Category::where('name', 'like', '%' . $name . '%')->get();
        if ($category->isEmpty()) {

            return response()->json([['message' => 'No Category found']], 404);
        }
        return response()->json($category, 200);

    }
}
