<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\TermsAndConditions;
use Illuminate\Http\Request;

class TermsAndConditionsController extends Controller
{
    public function index()
    {
        $content = TermsAndConditions::first();
        return view('admin.terms-conditions.index', compact('content'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => ['required']
        ]);

        TermsAndConditions::updateOrCreate(
            ['id' => 1],
            [
                'content' => $request->content
            ]
        );

        toastr('Terms & Conditions content updated successfully','success','Success');

        return redirect()->back();
    }
}
