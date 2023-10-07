<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Sponsor;
use App\Models\Payment;
use Braintree\Gateway;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Doctor $doctor)
    {
        $user_id = Auth::id();
        $doctor = Doctor::findOrFail($user_id);

        $sponsors = Sponsor::all();
        return view('payments.index', compact('doctor', 'sponsors'));
    }
    // Payment function to send a payment request 
    public function store(Request $request)
    {
        $user = Auth::id();
        $doctor = Doctor::findOrFail($user);
        $sponsor = Sponsor::findOrFail($request->sponsor);
        if ($doctor->id == $request->doctor) {

            // I took the id of the sponsorship requested
            $sponsorship = $request->sponsor;
            // Calculate the cost from the sponsorship requested
            $cost = $sponsor->cost;



            // if ($doctor->user_id != $user) {
            //     return view('notAuthorized');
            // }

            $payload = $request->input('payload', false);

            $gateway = new Gateway([
                'environment' => 'sandbox',
                'merchantId' => '837hcd35nzkx3c3x',
                'publicKey' => 'bf57n7wd4pz7xjh3',
                'privateKey' => '4c0b31e8dc061d3e0ed7288a129ba5cf',
            ]);

            $result = $gateway->transaction()->sale([
                'amount' => $cost,
                'paymentMethodNonce' => $request->payment_method_nonce,
            ]);

            if ($result->success) {
                $doctor->sponsors()->attach($sponsor);
                return to_route('admin.admin')->with('type', 'payment')->with('message', 'Payment successful')->with('alert', 'success');
            } else {
                return 'Transaction declined. Reason: ' . $result->message;
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id, Request $request)
    {
        $sponsor = $id;
        $doctor = $request->query('doctor');
        return view('payments.show', compact('sponsor', 'doctor'));
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
