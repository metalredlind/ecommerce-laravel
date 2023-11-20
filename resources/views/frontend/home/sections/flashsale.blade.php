<section id="wsus__flash_sell" class="wsus__flash_sell_2">
    <div class=" container">
        <div class="row">
            <div class="col-xl-12">
                <div class="offer_time" style="background: url({{asset('frontend/images/flash_sell_bg.jpg')}})">
                    <div class="wsus__flash_coundown">
                        <span class=" end_text">flash sell</span>
                        <div class="simply-countdown simply-countdown-one"></div>
                        <a class="common_btn" href="{{route('flash-sale')}}">see more <i class="fas fa-caret-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row flash_sell_slider">
            @foreach ($flashSaleItems as $item)
            @php
                $product = \App\Models\Product::find($item->product_id);
            @endphp
            <div class="col-xl-3 col-sm-6 col-lg-4">
                    <div class="wsus__product_item">
                        <span class="wsus__new">{{productType($product->product_type)}}</span>
                        @if (checkDiscount($product))
                            <span class="wsus__minus">-{{calculateDiscountPercent($product->price, $product->offer_price)}}%</span>
                        @endif
                        
                        <a class="wsus__pro_link" href="{{route('product-detail', $product->slug)}}">
                            <img src="{{asset($product->thumb_image)}}" alt="product" class="img-fluid w-100 img_1" />
                            <img src="
                            @if(isset($product->productImageGalleries[0]->image))
                                {{asset($product->productImageGalleries[0]->image)}}
                            @else
                                {{asset($product->thumb_image)}}
                            @endif
                            " alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                        class="far fa-eye"></i></a></li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">{{$product->category->name}} </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(133 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="{{route('product-detail', $product->slug)}}">{{$product->name}}</a>
                            @if (checkDiscount($product))
                                <p class="wsus__price">${{$product->offer_price}} <del>${{$product->price}}</del></p>
                            @else
                                <p class="wsus__price">${{$product->price}}</p>
                            @endif
                            <a class="add_cart" href="#">add to cart</a>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@push('scripts')
<script>
    $(document).ready(function(){
        // default example
        simplyCountdown('.simply-countdown-one', {
            year: {{date('Y', strtotime($flashSaleDate->end_date))}},
            month: {{date('m', strtotime($flashSaleDate->end_date))}},
            day: {{date('d', strtotime($flashSaleDate->end_date))}},
            enableUtc: true
        });
    })
</script>
@endpush