<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::with('user', 'ratings', 'specializations', 'reviews')->orderByDesc('created_at')->paginate(5);
        return response()->json($doctors);
    }


    public function indexBySpecializations(string $id)
    {
        $specializationId = $id; // Replace with the desired specialization ID

        $doctors = Doctor::with('user', 'ratings', 'specializations', 'reviews')
            ->whereHas('specializations', function ($query) use ($specializationId) {
                $query->where('specializations.id', $specializationId);
            })
            ->paginate(20);

        return response()->json($doctors);
    }
    public function indexBySpecializationsAndRating(string $id, string $rating)
    {
        $specializationId = $id; // Replace with the desired specialization ID
        $minVote = $rating;
        $doctors = Doctor::with('user', 'ratings', 'specializations', 'reviews')
            ->whereHas('specializations', function ($query) use ($specializationId) {
                $query->where('specializations.id', $specializationId);
            })
            ->withAvg('ratings', 'vote')
            ->having('ratings_avg_vote', '>=', $minVote)
            ->paginate(20);

        return response()->json($doctors);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctor = Doctor::with('ratings', 'specializations', 'reviews', 'user')->find($id);
        if (!$doctor) return response(null, 404);
        return response()->json($doctor);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
