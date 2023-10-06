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
        $message->save();
    }
}
