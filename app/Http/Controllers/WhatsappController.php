<?php

namespace App\Http\Controllers;

use App\Services\TwilioService;
use Illuminate\Http\Request;

class WhatsAppController extends Controller
{
    protected $twilioService;

    public function __construct(TwilioService $twilioService)
    {
        $this->twilioService = $twilioService;
    }

    public function sendWhatsApp(Request $request)
    {
        $to = $request->input('+6283112299237'); // Nomor penerima WhatsApp
        $message = $request->input('message'); // Pesan yang akan dikirim

        $response = $this->twilioService->sendWhatsAppMessage($to, $message);

        if ($response === true) {
            return response()->json(['status' => 'success', 'message' => 'WhatsApp message sent.']);
        } else {
            return response()->json(['status' => 'error', 'message' => $response]);
        }
    }
}
