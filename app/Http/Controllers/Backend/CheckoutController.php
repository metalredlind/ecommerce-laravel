<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $addresses = UserAddress::where('user_id', Auth::user()->id)->get();
        return view('frontend.pages.checkout', compact('addresses'));
    }

    public function createAddress(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'phone' => ['required', 'max:200'],
            'email' => ['required', 'email'],
            'country' => ['required', 'max:200'],
            'state' => ['required', 'max:200'],
            'city' => ['required', 'max:200'],
            'zip' => ['required', 'max:200'],
            'address' => ['required', 'max:200'],
        ]);

        $address = new UserAddress();
        $address->user_id = Auth::user()->id;
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->email = $request->email;
        $address->country = $request->country;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->zip = $request->zip;
        $address->address = $request->address;
        $address->save();

        toastr('New Address created successfully', 'success', 'Success');

        return redirect()->back();
    }
}
