<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\TermsAndConditions;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $about = About::first();
        return view('frontend.pages.about', compact('about'));
    }

    public function termsAndConditions()
    {
        $terms = TermsAndConditions::first();
        return view('frontend.pages.terms-and-conditions', compact('terms'));
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }
}
