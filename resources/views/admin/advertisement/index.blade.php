@extends('admin.layouts.master')

@section('content')
    
<!-- Main Content -->
    <section class="section">
      <div class="section-header">
        <h1>Settings</h1>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-2">
                    <div class="list-group" id="list-tab" role="tablist">
                      <a class="list-group-item list-group-item-action active" id="list-banner-1-list" data-toggle="list" href="#list-banner-1" role="tab">Homepage Banner Section 1</a>
                      <a class="list-group-item list-group-item-action" id="list-banner-2-list" data-toggle="list" href="#list-banner-2" role="tab">Homepage Banner Section 2</a>
                      <a class="list-group-item list-group-item-action" id="list-banner-3-list" data-toggle="list" href="#list-banner-3" role="tab">Homepage Banner Section 3</a>
                      <a class="list-group-item list-group-item-action" id="list-banner-4-list" data-toggle="list" href="#list-banner-4" role="tab">Homepage Banner Section 4</a>
                      <a class="list-group-item list-group-item-action" id="list-banner-product-list" data-toggle="list" href="#list-banner-product" role="tab">Product Page Banner</a>
                      <a class="list-group-item list-group-item-action" id="list-banner-cart-list" data-toggle="list" href="#list-cart-product" role="tab">Cart Page Banner</a>
                    </div>
                  </div>
                  <div class="col-10">
                    <div class="tab-content" id="nav-tabContent">

                      @include('admin.advertisement.homepage-banner-1')

                      @include('admin.advertisement.homepage-banner-2')
                      
                      @include('admin.advertisement.homepage-banner-3')
                      
                      @include('admin.advertisement.homepage-banner-4')
                      
                      @include('admin.advertisement.product-page-banner')

                      @include('admin.advertisement.cart-page-banner')
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection