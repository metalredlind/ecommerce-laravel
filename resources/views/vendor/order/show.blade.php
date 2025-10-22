@php
    $address = json_decode($order->order_address)
@endphp

@extends('vendor.layouts.master')

@section('title')
    {{$settings->site_name}} || Products
@endsection

@section('content')

      <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
    @include('vendor.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i>Order Details</h3>
            <div class="wsus__dashboard_profile">
                <!--============================
                    INVOICE PAGE START
                ==============================-->
                <section id="">
                    <div class="">
                        <div class="wsus__invoice_area">
                            <div class="wsus__invoice_header">
                                <div class="wsus__invoice_content">
                                    <div class="row">
                                        <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                            <div class="wsus__invoice_single">
                                                <h5>Invoice To</h5>
                                                <h6>{{$address->name}}</h6>
                                                <p>{{$address->email}}</p>
                                                <p>{{$address->phone}}</p>
                                                <p>{{$address->address}}, {{$address->city}}, {{$address->state}}, {{$address->zip}}</p>
                                                <p>{{$address->country}}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                            <div class="wsus__invoice_single text-md-center">
                                                <h5>shipping information</h5>
                                                <h6>{{$address->name}}</h6>
                                                <p>{{$address->email}}</p>
                                                <p>{{$address->phone}}</p>
                                                <p>{{$address->address}}, {{$address->city}}, {{$address->state}}, {{$address->zip}}</p>
                                                <p>{{$address->country}}</p>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-4">
                                            <div class="wsus__invoice_single text-md-end">
                                                <h5>Order ID: #{{$order->invoice_id}}</h5>
                                                <h6>Order Status: {{$order->order_status}}</h6>
                                                <p>Payment Method: {{$order->payment_method}}</p>
                                                <p>Payment Status: {{$order->payment_status}}</p>
                                                <p>Transaction ID: {{$order->transaction->transaction_id}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wsus__invoice_description">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th class="name">
                                                    product
                                                </th>
                                                <th class="amount">
                                                    Vendor
                                                </th>

                                                <th class="amount">
                                                    amount
                                                </th>

                                                <th class="quentity">
                                                    quentity
                                                </th>
                                                <th class="total">
                                                    total
                                                </th>
                                            </tr>
                                            @foreach ($order->orderProducts as $product)
                                                @if ($product->vendor_id === Auth::user()->vendor->id)
                                                @php
                                                    $variants = json_decode($product->variants);
                                                    $total = 0;
                                                    $total += $product->unit_price * $product->qty;
                                                @endphp
                                                <tr>
                                                    <td class="name">
                                                        <p>{{$product->product_name}}</p>
                                                        @foreach ($variants as $key => $item)
                                                        <span>{{$key}}: {{$item->name}} ({{$settings->currency_icon}}{{$item->price}})</span>
                                                        @endforeach
                                                    </td>
                                                    <td class="amount">
                                                        {{$product->vendor->shop_name}}
                                                    </td>
                                                    <td class="amount">
                                                        {{$settings->currency_icon}}{{$product->unit_price}}
                                                    </td>

                                                    <td class="quentity">
                                                        {{$product->qty}}
                                                    </td>
                                                    <td class="total">
                                                        {{$settings->currency_icon}}{{$product->unit_price * $product->qty}}
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="wsus__invoice_footer">
                                <p><span>Total Amount:</span> {{$settings->currency_icon}}{{$total}} </p>
                            </div>
                        </div>
                    </div>
                </section>
                <!--============================
                    INVOICE PAGE END
                ==============================-->

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->
    
@endsection

@push('scripts')

@endpush