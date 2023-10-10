<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Review;
use App\Models\Doctor;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        $ratings = $doctor->ratings()->get();
        $reviews = Review::where('doctor_id', '=', $user_id)->get();

        // $date = Carbon::createFromFormat('Y-m-d H:i:s', $rating->date);
        // Messagi di Gennaio 2022
        $messagesNov2022 = Message::where('doctor_id', $user_id)
            ->whereMonth('date', 11)
            ->whereYear('date', 2022)
            ->get();

        // Messaggi di Febbraio 2022
        $messagesDic2022 = Message::where('doctor_id', $user_id)
            ->whereMonth('date', 12)
            ->whereYear('date', 2022)
            ->get();
        // Messaggi di Marzo 2022
        $messagesGen2023 = Message::where('doctor_id', $user_id)
            ->whereMonth('date', 1)
            ->whereYear('date', 2023)
            ->get();

        // Messaggi di Aprile 2022
        $messagesFeb2023 = Message::where('doctor_id', $user_id)
            ->whereMonth('date', 2)
            ->whereYear('date', 2023)
            ->get();

        // Messaggi di Maggio 2022
        $messagesMar2023 = Message::where('doctor_id', $user_id)
            ->whereMonth('date', 3)
            ->whereYear('date', 2023)
            ->get();

        // Messaggi di Giugno 2022
        $messagesApr2023 = Message::where('doctor_id', $user_id)
            ->whereMonth('date', 4)
            ->whereYear('date', 2023)
            ->get();

        // Messaggi di Novembre 2022
        $messagesMag2023 = Message::where('doctor_id', $user_id)
            ->whereMonth('date', 5)
            ->whereYear('date', 2023)
            ->get();

        // Messaggi di Dicembre 2022
        $messagesGiu2023 = Message::where('doctor_id', $user_id)
            ->whereMonth('date', 6)
            ->whereYear('date', 2023)
            ->get();
        // Messaggi di Luglio 2022
        $messagesLug2023 = Message::where('doctor_id', $user_id)
            ->whereMonth('date', 7)
            ->whereYear('date', 2023)
            ->get();

        // Messaggi di Agosto 2023
        $messagesAug2023 = Message::where('doctor_id', $user_id)
            ->whereMonth('date', 8)
            ->whereYear('date', 2023)
            ->get();

        // Messaggi di Settembre 2023
        $messagesSet2023 = Message::where('doctor_id', $user_id)
            ->whereMonth('date', 9)
            ->whereYear('date', 2023)
            ->get();

        // Messaggi di Ottobre 2023
        $messagesOtt2023 = Message::where('doctor_id', $user_id)
            ->whereMonth('date', 10)
            ->whereYear('date', 2023)
            ->get();

        $ratingsGen2023 = [];
        // Voti di Gennaio 2023
        foreach ($ratings as $rating) {
            $date = Carbon::parse($rating->date);
            if ($date->month === 1 && $date->year === 2023) {
                $ratingsGen2023[] = $date->format('Y-m-d');
            }
        };
        $ratingsFeb2023 = [];
        // Voti di Gennaio 2023
        foreach ($ratings as $rating) {
            $date = Carbon::parse($rating->date);
            if ($date->month === 2 && $date->year === 2023) {
                $ratingsFeb2023[] = $date->format('Y-m-d');
            }
        };
        $ratingsMar2023 = [];
        // Voti di Gennaio 2023
        foreach ($ratings as $rating) {
            $date = Carbon::parse($rating->date);
            if ($date->month === 3 && $date->year === 2023) {
                $ratingsMar2023[] = $date->format('Y-m-d');
            }
        };
        $ratingsApr2023 = [];
        // Voti di Gennaio 2023
        foreach ($ratings as $rating) {
            $date = Carbon::parse($rating->date);
            if ($date->month === 4 && $date->year === 2023) {
                $ratingsApr2023[] = $date->format('Y-m-d');
            }
        };
        $ratingsMag2023 = [];
        // Voti di Gennaio 2023
        foreach ($ratings as $rating) {
            $date = Carbon::parse($rating->date);
            if ($date->month === 5 && $date->year === 2023) {
                $ratingsMag2023[] = $date->format('Y-m-d');
            }
        };
        $ratingsGiu2023 = [];
        // Voti di Gennaio 2023
        foreach ($ratings as $rating) {
            $date = Carbon::parse($rating->date);
            if ($date->month === 6 && $date->year === 2023) {
                $ratingsGiu2023[] = $date->format('Y-m-d');
            }
        };
        $ratingsLug2023 = [];
        // Voti di Gennaio 2023
        foreach ($ratings as $rating) {
            $date = Carbon::parse($rating->date);
            if ($date->month === 7 && $date->year === 2023) {
                $ratingsLug2023[] = $date->format('Y-m-d');
            }
        };
        $ratingsAgo2023 = [];
        // Voti di Gennaio 2023
        foreach ($ratings as $rating) {
            $date = Carbon::parse($rating->date);
            if ($date->month === 8 && $date->year === 2023) {
                $ratingsAgo2023[] = $date->format('Y-m-d');
            }
        };
        $ratingsSet2023 = [];
        // Voti di Gennaio 2023
        foreach ($ratings as $rating) {
            $date = Carbon::parse($rating->date);
            if ($date->month === 9 && $date->year === 2023) {
                $ratingsSet2023[] = $date->format('Y-m-d');
            }
        };
        $ratingsOtt2023 = [];
        // Voti di Gennaio 2023
        foreach ($ratings as $rating) {
            $date = Carbon::parse($rating->date);
            if ($date->month === 10 && $date->year === 2023) {
                $ratingsOtt2023[] = $date->format('Y-m-d');
            }
        };
        $ratingsNov2022 = [];
        // Voti di Gennaio 2022
        foreach ($ratings as $rating) {
            $date = Carbon::parse($rating->date);
            if ($date->month === 11 && $date->year === 2022) {
                $ratingsNov2022[] = $date->format('Y-m-d');
            }
        };
        $ratingsDic2022 = [];
        // Voti di Gennaio 2022
        foreach ($ratings as $rating) {
            $date = Carbon::parse($rating->date);
            if ($date->month === 12 && $date->year === 2022) {
                $ratingsDic2022[] = $date->format('Y-m-d');
            }
        };



        return view('admin.admin', compact(
            'ratings',
            'ratingsGen2023',
            'ratingsFeb2023',
            'ratingsMar2023',
            'ratingsApr2023',
            'ratingsMag2023',
            'ratingsGiu2023',
            'ratingsLug2023',
            'ratingsAgo2023',
            'ratingsSet2023',
            'ratingsOtt2023',
            'ratingsNov2022',
            'ratingsDic2022',
            'doctor',
            'messages',
            'messagesNov2022',
            'messagesDic2022',
            'messagesGen2023',
            'messagesFeb2023',
            'messagesMar2023',
            'messagesApr2023',
            'messagesMag2023',
            'messagesGiu2023',
            'messagesLug2023',
            'messagesAug2023',
            'messagesSet2023',
            'messagesOtt2023',
            'reviews',

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
