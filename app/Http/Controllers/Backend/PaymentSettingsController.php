<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaypalSetting;
use App\Models\StripeSetting;
use Illuminate\Http\Request;

class PaymentSettingsController extends Controller
{
    public function index()
    {
        $paypalSetting = PaypalSetting::first();
        $stripeSetting = StripeSetting::first();
        return view('admin.payment-settings.index', compact('paypalSetting','stripeSetting'));
    }
}
