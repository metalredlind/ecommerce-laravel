<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'rating' => ['required'],
            'review' => ['required','200'],
            'image' => ['required','image']
        ]);
    }
}
