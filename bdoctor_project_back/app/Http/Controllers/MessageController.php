<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)

    {
        $data = $request->all();
        $message = new Message;
        $message->fill($data);
        // Genera una data casuale tra gennaio 2022 e dicembre 2022
        $startDate = strtotime('2022-01-01');
        $endDate = strtotime('2022-12-31');
        $randomTimestamp = mt_rand($startDate, $endDate);
        $randomDate = date('Y-m-d', $randomTimestamp);
        $message['date']= $randomDate;
        $message->save();
    }
}
