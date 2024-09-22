<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Favourite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function create(Request $request, $employeeId)
    {
        $client = auth()->user();

        if (!$client) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $employee = Employee::findOrFail($employeeId);


        $existingFavorite = Favourite::where('client_id', $client->id)
            ->where('employee_id', $employeeId)
            ->first();

        if ($existingFavorite) {
            return response()->json(['message' => 'Employee already favorited'], 200);
        }

        Favourite::create([
            'client_id' => $client->id,
            'employee_id' => $employeeId,
        ]);

        return response()->json(['message' => 'Employee favorited successfully!'], 200);
    }

    public function delete(Request $request, $employeeId){

        $client = auth()->user();

        if (!$client) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $existingFavorite = Favourite::where('client_id', $client->id)
            ->where('employee_id', $employeeId)
            ->first();

        if (!$existingFavorite) {
            return response()->json(['message' => 'Employee is not in favorites'], 404);
        }

        $existingFavorite->delete();

        return response()->json(['message' => 'Employee removed from favorites successfully!'], 200);
    }

    public function show(Request $request): \Illuminate\Http\JsonResponse
    {

        $client = auth()->user();

        if (!$client) {
            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        $favorites = Favourite::where('client_id', $client->id)
            ->with('employee')
            ->get();

        return response()->json($favorites, 200);

    }
}

