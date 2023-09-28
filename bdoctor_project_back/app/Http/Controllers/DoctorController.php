<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
        $doctor = new Doctor;
        return view('admin.doctors.create', compact('specializations', 'doctor'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'phone_number' => 'nullable|numeric|digits:10|unique:doctors',
            'profile_photo' => 'nullable|image',
            'cv' => 'nullable|file:pdf',
            'performances' => 'nullable|string',
            'description' => 'nullable|string',
        ], [
            'phone_number.numeric' => 'Il telefono può contenere solo numeri',
            'phone_number.digits' => 'Il telefono può avere solo 10 numeri',
            'phone_number.unique' => 'Il telefono risulta già assegnato ad un altro utente',
            'profile_photo.image' => 'La foto profilo deve essere una foto',
            'cv.file' => 'Il CV deve essere un PDF',
            'performances.string' => 'Inseriti caratteri non validi',
            'description.string' => 'Inseriti caratteri non validi',
        ]);


        $data = $request->all();

        $doctor = new Doctor();

        if (array_key_exists('profile_photo', $data)) {
            $img_url = Storage::putFile('doctor_profile_photos', $data['profile_photo']);
            $data['profile_photo'] = $img_url;
        }

        if (array_key_exists('cv', $data)) {
            $file_url = Storage::putFile('doctor_cvs', $data['cv']);
            $data['cv'] = $file_url;
        }

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
        $specializations = Specialization::all();
        return view('admin.doctors.edit', compact('doctor', 'specializations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'phone_number' => ['nullable', 'numeric', 'digits:10', Rule::unique('doctors')->ignore($doctor->id)],
            'profile_photo' => 'nullable|image',
            'cv' => 'nullable|file:pdf',
            'address' => 'nullable|string',
            'performances' => 'nullable|string',
            'description' => 'nullable|string',
            'specialization' => 'required'
        ], [
            'phone_number.numeric' => 'Il telefono può contenere solo numeri',
            'phone_number.digits' => 'Il telefono può avere solo 10 numeri',
            'phone_number.unique' => 'Il telefono risulta già assegnato ad un altro utente',
            'profile_photo.image' => 'La foto profilo deve essere una foto',
            'cv.file' => 'Il CV deve essere un PDF',
            'address.string' => 'Inseriti caratteri non validi',
            'performances.string' => 'Inseriti caratteri non validi',
            'description.string' => 'Inseriti caratteri non validi',
            'specialization' => 'Seleziona una specializzazione tra quelle disponibili.'
        ]);
        $data = $request->all();

        if (array_key_exists('profile_photo', $data)) {
            $img_url = Storage::putFile('doctor_profile_photos', $data['profile_photo']);
            $data['profile_photo'] = $img_url;
        }

        if (array_key_exists('cv', $data)) {
            $file_url = Storage::putFile('doctor_cvs', $data['cv']);
            $data['cv'] = $file_url;
        }

        $doctor->update($data);

        // Creo un array che contenga gli id delle specializzazioni del dottore
        $doctor_specs_ids = [];

        foreach ($doctor->specializations as $doc_spec) {
            $doctor_specs_ids[] = $doc_spec->id;
        }

        // Se una specializzazione dei dati non è contenuta nelle specializzazioni del dottore, la inserisco
        foreach ($data['specialization'] as $data_spec) {
            if (!in_array($data_spec, $doctor_specs_ids)) $doctor->specializations()->attach($data_spec);
        }

        // Se una specializzazione del dottore non è contenuta nelle specializzazioni dei dati, la tolgo
        foreach ($doctor_specs_ids as $doc_spec_id) {
            if (!in_array($doc_spec_id, $data['specialization'])) $doctor->specializations()->detach($doc_spec_id);
        }

        return to_route('admin.doctor.index', $doctor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctorName = $doctor->user->name;

        $doctor->delete();

        return to_route('admin.doctor.create')
            ->with('alert-type', 'success')
            ->with('alert-message', "$doctorName successfully deleted");
    }
}
