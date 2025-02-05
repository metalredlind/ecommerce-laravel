<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaypalSetting;
use Illuminate\Http\Request;

class PaymentSettingsController extends Controller
{
    public function index()
    {
        $paypalSetting = PaypalSetting::first();
        return view('admin.payment-settings.index', compact('paypalSetting'));
    }
}
