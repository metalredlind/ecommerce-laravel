<section id="wsus__large_banner">
    <div class="container">
        <div class="row">
            <div class="cl-xl-12">
                @if (!empty($homepage_section_banner_four) && !empty($homepage_section_banner_four->banner_one) && $homepage_section_banner_four->banner_one->status == 1)
                    <div class="wsus__large_banner_content">
                        <a href="{{ $homepage_section_banner_four->banner_one->banner_url }}">
                            <img class="img-fluid" src="{{ $homepage_section_banner_four->banner_one->banner_image }}"
                                alt="">
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
