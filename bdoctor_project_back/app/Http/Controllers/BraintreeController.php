<?php

namespace App\Http\Controllers;

use Braintree\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BraintreeController extends Controller
{
    public function getClientToken()
    {
        $user = Auth::user();

        // Check se user è autenticato
        if ($user) {
            $gateway = new Gateway([
                'environment' => config('services.braintree.environment'),
                'merchantId' => config('services.braintree.merchant_id'),
                'publicKey' => config('services.braintree.public_key'),
                'privateKey' => config('services.braintree.private_key'),
            ]);

            $clientToken = $gateway->clientToken()->generate([
                "customerId" => $user->id,
            ]);

            return response()->json(['clientToken' => $clientToken]);
        } else {
        }
    }
}
