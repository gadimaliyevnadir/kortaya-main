<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();
        return view('frontend.pages.faqs.index',compact('faqs'));
    }

}
