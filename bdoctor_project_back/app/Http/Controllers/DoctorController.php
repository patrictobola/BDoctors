<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Doctor $doctor)
    {
        $user_id = Auth::id();
        $doctor = Doctor::findOrFail($user_id);
        // $user = Auth::user();
        return view('admin.doctors.index', compact('doctor'));
    }

    // if($user_id === $doctor_id){}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializations = Specialization::all();
        return view('admin.doctors.create', compact('specializations'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $doctor = new Doctor();

        $doctor->fill($data);

        $doctor['user_id'] = Auth::id();

        $doctor->save();

        return to_route('admin.doctor.index', $doctor);
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('admin.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('admin.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $data = $request->all();
        $doctor->update($data);
        return to_route('admin.doctor.index', $doctor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
