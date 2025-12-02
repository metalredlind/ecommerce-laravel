<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\MailHelper;
use App\Http\Controllers\Controller;
use App\Mail\SubscriptionVerification;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class NewsLetterController extends Controller
{
    public function newsLetterRequest(Request $request)
    {
        $request->validate([
            'email' => ['required','email']
        ]);

        $existSubscriber = NewsletterSubscriber::where('email', $request->email)->first();

        if ($existSubscriber) {
            if($existSubscriber->is_verified == 0){
                //send verification link
            } elseif ($existSubscriber->is_verified == 1) {
                return response(['status'=>'error', 'message'=>'You already subscribed with this email!']);
            }
        } else {
            $subscriber = new NewsletterSubscriber();
            $subscriber->email = $request->email;
            $subscriber->verified_token = Str::random(25);
            $subscriber->is_verified = 0;

            $subscriber->save();

            //set mail config
            MailHelper::setMailConfig();

            //send mail
            Mail::to($subscriber->email)->send(new SubscriptionVerification($subscriber));

            return response(['status'=>'success', 'message'=>'A verification link has been sent to your email!']);
        }
    }

    public function newsLetterEmailVerify($token)
    {
        dd($token);
    }
}
