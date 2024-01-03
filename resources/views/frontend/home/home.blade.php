@extends('frontend.layouts.master')

@section('title')
    {{$settings->site_name}} || E-commerce
@endsection

@section('content')



    <!--============================
        BANNER PART 2 START
    ==============================-->
        @include('frontend.home.sections.bannerslider')
    <!--============================
        BANNER PART 2 END
    ==============================-->


    <!--============================
        FLASH SELL START
    ==============================-->
    @include('frontend.home.sections.flashsale')
    <!--============================
        FLASH SELL END
    ==============================-->


    <!--============================
       MONTHLY TOP PRODUCT START
    ==============================-->
    {{-- @include('frontend.home.sections.topcategoriesproduct') --}}
    <!--============================
       MONTHLY TOP PRODUCT END
    ==============================-->


    <!--============================
        BRAND SLIDER START
    ==============================-->
    {{-- @include('frontend.home.sections.brandslider') --}}
    <!--============================
        BRAND SLIDER END
    ==============================-->


    <!--============================
        SINGLE BANNER START
    ==============================-->
    {{-- @include('frontend.home.sections.singlebanner') --}}
    <!--============================
        SINGLE BANNER END  
    ==============================-->


    <!--============================
        HOT DEALS START
    ==============================-->
    {{-- @include('frontend.home.sections.hotdeals') --}}
    <!--============================
        HOT DEALS END  
    ==============================-->


    <!--============================
        ELECTRONIC PART START  
    ==============================-->
    {{-- @include('frontend.home.sections.categoryproductslider1') --}}
    <!--============================
        ELECTRONIC PART END  
    ==============================-->


    <!--============================
        ELECTRONIC PART START  
    ==============================-->
    {{-- @include('frontend.home.sections.categoryproductslider2') --}}
    <!--============================
        ELECTRONIC PART END  
    ==============================-->


    <!--============================
        LARGE BANNER  START  
    ==============================-->
    {{-- @include('frontend.home.sections.largebanner') --}}
    <!--============================
        LARGE BANNER  END  
    ==============================-->


    <!--============================
        WEEKLY BEST ITEM START  
    ==============================-->
    {{-- @include('frontend.home.sections.weeklybestitem') --}}
    <!--============================
        WEEKLY BEST ITEM END 
    ==============================-->


    <!--============================
      HOME SERVICES START
    ==============================-->
    {{-- @include('frontend.home.sections.services') --}}
    <!--============================
        HOME SERVICES END
    ==============================-->


    <!--============================
        HOME BLOGS START
    ==============================-->
    {{-- @include('frontend.home.sections.blog') --}}
    <!--============================
        HOME BLOGS END
    ==============================-->
    
@endsection