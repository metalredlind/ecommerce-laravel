<section id="wsus__banner">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__banner_content">
                    <div class="row banner_slider">
                        @foreach ($sliders ?? [] as $slider)
                        <div class="col-xl-12">
                            <div class="wsus__single_slider" style="background: url({{ $slider->banner ?? asset('frontend/images/default-banner.jpg') }});">
                                <div class="wsus__single_slider_text">
                                    <h3>{!! $slider->type ?? 'Special Offer' !!}</h3>
                                    <h1>{!! $slider->title ?? 'Great Deals' !!}</h1>
                                    <h6>start at: {{ $settings->currency_icon ?? '$' }}{{ $slider->starting_price ?? '0.00' }}</h6>
                                    <a class="common_btn" href="{{ $slider->btn_url ?? '#' }}">shop now</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>