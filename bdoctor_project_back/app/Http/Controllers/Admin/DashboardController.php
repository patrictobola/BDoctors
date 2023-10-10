<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Review;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::id();
        $doctor = Doctor::findOrFail($user_id);
        $messages = Message::where('doctor_id', '=', $user_id)->get();
        $reviews = Review::where('doctor_id', '=', $user_id)->get();

        // Messagi di Gennaio 2022
        $messagesGen2022 = Message::where('doctor_id', $user_id)
        ->whereMonth('date', 1) 
        ->whereYear('date', 2022)
        ->get();

        // Messaggi di Febbraio 2022
        $messagesFeb2022 = Message::where('doctor_id', $user_id)
        ->whereMonth('date', 2)
        ->whereYear('date', 2022)
        ->get();

        // Messaggi di Marzo 2022
        $messagesMar2022 = Message::where('doctor_id', $user_id)
        ->whereMonth('date', 3)
        ->whereYear('date', 2022)
        ->get();

        // Messaggi di Aprile 2022
        $messagesApr2022 = Message::where('doctor_id', $user_id)
        ->whereMonth('date', 4)
        ->whereYear('date', 2022)
        ->get();

        // Messaggi di Maggio 2022
        $messagesMag2022 = Message::where('doctor_id', $user_id)
        ->whereMonth('date', 5)
        ->whereYear('date', 2022)
        ->get();

        // Messaggi di Giugno 2022
        $messagesGiu2022 = Message::where('doctor_id', $user_id)
        ->whereMonth('date', 6)
        ->whereYear('date', 2022)
        ->get();

        // Messaggi di Luglio 2022
        $messagesLug2022 = Message::where('doctor_id', $user_id)
        ->whereMonth('date', 7)
        ->whereYear('date', 2022)
        ->get();

        // Messaggi di Agosto 2022
        $messagesAug2022 = Message::where('doctor_id', $user_id)
        ->whereMonth('date', 8)
        ->whereYear('date', 2022)
        ->get();

        // Messaggi di Settembre 2022
        $messagesSet2022 = Message::where('doctor_id', $user_id)
        ->whereMonth('date', 9)
        ->whereYear('date', 2022)
        ->get();

        // Messaggi di Ottobre 2022
        $messagesOtt2022 = Message::where('doctor_id', $user_id)
        ->whereMonth('date', 10)
        ->whereYear('date', 2022)
        ->get();

        // Messaggi di Novembre 2022
        $messagesNov2022 = Message::where('doctor_id', $user_id)
        ->whereMonth('date', 11)
        ->whereYear('date', 2022)
        ->get();

        // Messaggi di Dicembre 2022
        $messagesDec2022 = Message::where('doctor_id', $user_id)
        ->whereMonth('date', 12)
        ->whereYear('date', 2022)
        ->get();


        return view('admin.admin', compact('doctor', 'messages', 'reviews', 
        'messagesGen2022',
        'messagesFeb2022',
        'messagesMar2022',
        'messagesApr2022',
        'messagesMag2022',
        'messagesGiu2022',
        'messagesLug2022',
        'messagesAug2022',
        'messagesSet2022',
        'messagesOtt2022',
        'messagesNov2022',
        'messagesDec2022',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
