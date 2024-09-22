<?php

namespace App\Http\Controllers;

use App\Http\Requests\experienceRequest;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ExperienceController extends Controller
{
    public function create(ExperienceRequest $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized.'], 401);
        }

        $user = Auth::user();

        if ($user->role !== 'employee') {
            return response()->json(['message' => 'Forbidden. Only employees can add experiences.'], 403);
        }

        $validated = $request->validated();

        $experience = new Experience();
        $experience->employee_id = $user->id;
        $experience->text = $validated['text'];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('experiences', 'public');
            $experience->image = $imagePath;
        }

        $urlToImage = asset('storage/' . $experience->image);

        $experience->save();

        return response()->json([
            'message' => 'Experience added successfully.',
            'data' => $experience,
            'urlToImage' => $urlToImage,
        ], 201);
    }
    public function update
    }
