@php
    $categoryProductSliderSectionThree = json_decode($categoryProductSliderSectionThree->value, true);
    
@endphp

<section id="wsus__weekly_best" class="home2_wsus__weekly_best_2 ">
    <div class="container">
        <div class="row">
            @foreach ($categoryProductSliderSectionThree as $sliderSectionThree)
            @php
                $lastKey = [];
                foreach ($sliderSectionThree as $key => $category) {
                    if ($category === null)  {
                        break;
                    }
                    $lastKey = [$key => $category];
                };
                if (array_keys($lastKey)[0] === 'category') {
                    $category = \App\Models\Category::find($lastKey['category']);
                    $products = \App\Models\Product::where('category_id', $category->id)->orderBy('id','DESC')->take(6)->get();
                } elseif(array_keys($lastKey)[0] === 'sub_category') {
                    $category = \App\Models\SubCategory::find($lastKey['sub_category']);
                    $products = \App\Models\Product::where('sub_category_id', $category->id)->orderBy('id','DESC')->take(6)->get();
                } else {
                    $category = \App\Models\ChildCategory::find($lastKey['child_category']);
                    $products = \App\Models\Product::where('child_category_id', $category->id)->orderBy('id','DESC')->take(6)->get();
                }
            @endphp

            <div class="col-xl-6 col-sm-6">
                <div class="wsus__section_header">
                    <h3>{{ $category->name }}</h3>
                </div>
                <div class="row weekly_best2">
                    {{-- <div class="col-xl-4 col-lg-4">
                        <a class="wsus__hot_deals__single" href="#">
                            <div class="wsus__hot_deals__single_img">
                                <img src="images/pro9.jpg" alt="bag" class="img-fluid w-100">
                            </div>
                            <div class="wsus__hot_deals__single_text">
                                <h5>men's sholder bag</h5>
                                <p class="wsus__rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </p>
                                <p class="wsus__tk">$120.20 <del>130.00</del></p>
                            </div>
                        </a>
                    </div> --}}
                    @foreach ($products as $item)
                    <div class="col-xl-4 col-lg-4">
                        <a class="wsus__hot_deals__single" href="{{route('product-detail', $item->slug)}}">
                            <div class="wsus__hot_deals__single_img">
                                <img src="{{ asset($item->thumb_image) }}" alt="bag" class="img-fluid w-100">
                            </div>
                            <div class="wsus__hot_deals__single_text">
                                <h5>{!!limitText($item->name)!!}</h5>
                                <p class="wsus__rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </p>
                                @if (checkDiscount($item))
                                    <p class="wsus__tk">{{$settings->currency_icon}}{{$item->offer_price}} <del>{{$settings->currency_icon}}{{$item->price}}</del></p>
                                @else
                                    <p class="wsus__tk">{{$settings->currency_icon}}{{$item->price}} </p>
                                @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                    
                </div>
            </div>
                
            @endforeach
            
        </div>
    </div>
</section>