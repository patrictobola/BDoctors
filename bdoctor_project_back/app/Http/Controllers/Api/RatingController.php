<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request)

    {
        $data = $request->all();
        $doctor_id = $data['doctor_id'];
        // $user_id = Auth::id();
        $doctor = Doctor::findOrFail($doctor_id);
        $rating = new Rating;
        $rating->fill($data);
        $rating->save();
        // dd($doctor);
        $doctor->ratings()->attach($doctor);
    }
}
