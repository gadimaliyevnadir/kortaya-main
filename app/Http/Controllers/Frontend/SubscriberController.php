<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendContactMail;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{

    public function subscribeSendRequest(Request $request)
    {
        $data = $request->all();
        try {
            Subscriber::create([
                'ip'=>ipfind(),
                'user_id'=>auth()->check() ? auth()->id() : null,
                'email'=>$data['email'],
            ]);
            return response()->json([
                'success' => true,
                'data' => '',
                'message' => 'Your request has been sent'
            ]);
        }catch (\Exception $e) {
            Log::channel('frontend')->error($e->getMessage());
            return response()->json([
                'success' => false,
                'data' => '',
                'message' => $e->getMessage()
            ]);
        }

    }

}
