@extends('frontend.layouts.master')

@section('title')
    {{ $settings->site_name }} || Checkout
@endsection

@section('content')
   <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>check out</h4>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li><a href="javascript:;">check out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        CHECK OUT PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <form class="wsus__checkout_form">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="wsus__check_form">
                            <h5>Billing Details <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">add
                                    new address</a></h5>
                            <div class="row">
                                @foreach ($addresses as $address)
                                    <div class="col-xl-6">
                                        <div class="wsus__checkout_single_address">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                    id="flexRadioDefault1" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Select Address
                                                </label>
                                            </div>
                                            <ul>
                                                <li><span>Name :</span> {{$address->name}}</li>
                                                <li><span>Phone :</span> {{$address->phone}}</li>
                                                <li><span>Email :</span> {{$address->email}}</li>
                                                <li><span>Country :</span> {{$address->country}}</li>
                                                <li><span>City :</span> {{$address->city}}</li>
                                                <li><span>Zip Code :</span> {{$address->zip}}</li>
                                                <li><span>Address :</span> {{$address->address}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="wsus__order_details" id="sticky_sidebar">
                            <p class="wsus__product">shipping Methods</p>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                    value="option1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    free shipping
                                    <span>(10 - 12 days)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2"
                                    value="option2">
                                <label class="form-check-label" for="exampleRadios2">
                                    express shipping
                                    <span>(5 - 10 days)</span>
                                </label>
                            </div>
                            <div class="wsus__order_details_summery">
                                <p>subtotal: <span>$120.00</span></p>
                                <p>shipping fee: <span>$20.00</span></p>
                                <p>tax: <span>$00.00</span></p>
                                <p><b>total:</b> <span><b>$140.00</b></span></p>
                            </div>
                            <div class="terms_area">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked3"
                                        checked>
                                    <label class="form-check-label" for="flexCheckChecked3">
                                        I have read and agree to the website <a href="#">terms and conditions *</a>
                                    </label>
                                </div>
                            </div>
                            <a href="payment.html" class="common_btn">Place Order</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <div class="wsus__popup_address">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">add new address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="wsus__check_form p-3">
                            <form action="{{route('user.checkout.address.create')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Name *" name="name" value="{{old('name')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Phone *" name="phone" value="{{old('phone')}}">>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="email" placeholder="Email *" name="email" value="{{old('email')}}">>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <select class="select_2" name="country"">
                                                <option value="">Country / Region *</option>
                                                @foreach (config('settings.country_list') as $key => $country)
                                                    <option {{$country === old('country') ? 'selected' : ''}} value="{{$key}}">{{$country}}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="State *" name="state" value="{{old('state')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Town / City *" name="city" value="{{old('city')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Zip *" name="zip" value="{{old('zip')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="wsus__check_single_form">
                                            <input type="text" placeholder="Address *" name="address" value="{{old('address')}}">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__check_single_form">
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--============================
        CHECK OUT PAGE END
    ==============================-->
@endsection
