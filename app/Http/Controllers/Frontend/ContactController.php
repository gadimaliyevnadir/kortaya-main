<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ContactRequest;
use App\Http\Requests\Frontend\ReviewRequest;
use App\Mail\SendContactMail;
use App\Models\Contact;
use App\Models\Review;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('frontend.pages.contacts.index');
    }

    public function contactSendRequest(ContactRequest $request)
    {
        $data = $request->validated();
        try {
            Contact::create([
                'name'=>$data['name'],
                'email'=>$data['email'],
                'subject'=>$data['subject'],
                'message'=>$data['message'],
            ]);

//            $fromAddress =  config('mail.main_email');
//            $toAddress =  config('mail.main_email_to');
//            $fromName = 'Admin';
//            $mail = new SendContactMail($data);
//            $mail->from($fromAddress, $fromName);
//            Mail::to($toAddress)->send($mail);

            return response()->json([
                'success' => true,
                'data' => '',
                'message' => 'Your request has been sent'
            ]);
        }catch (\Exception $e) {
            dd($e->getMessage());
            Log::channel('frontend')->error($e->getMessage());
            return response()->json([
                'success' => false,
                'data' => '',
                'message' => $e->getMessage()
            ]);
        }

    }
    public function reviewSendRequest(ReviewRequest $request)
    {
        $data = $request->validated();
        try {
            Review::create([
                'ip'=>$request->ip(),
                'user_id'=>auth()->check() ? auth()->id() : null,
                'product_id'=>$data['product_id'],
                'name'=>$data['name'],
                'email'=>$data['email'],
                'comment'=>$data['comment'],
                'ratings_review_point'=>$data['ratings_review_point'],
            ]);

//            $fromAddress =  config('mail.main_email');
//            $toAddress =  config('mail.main_email_to');
//            $fromName = 'Admin';
//            $mail = new SendContactMail($data);
//            $mail->from($fromAddress, $fromName);
//            Mail::to($toAddress)->send($mail);

            return response()->json([
                'success' => true,
                'data' => '',
                'message' => 'Your request has been sent'
            ]);
        }catch (\Exception $e) {
            dd($e->getMessage());
            Log::channel('frontend')->error($e->getMessage());
            return response()->json([
                'success' => false,
                'data' => '',
                'message' => $e->getMessage()
            ]);
        }

    }

}
