
<div class="tab-pane fade" id="list-cart-product" role="tabpanel" aria-labelledby="list-banner-cart-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.advertisement.cart-page-banner')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h5>Banner One</h5>
                <div class="form-group">
                    <label>Status</label>
                    <br>
                    <label class="custom-switch mt-2">
                        <input type="checkbox" {{ @$cart_page_banner->banner_one->status == 1 ? 'checked' : '' }} name="banner_one_status" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </div>
                <div class="form-group">
                    <img src="{{ asset(@$cart_page_banner->banner_one->banner_image) }}" alt="banner_one" width="150px">
                </div>
                <div class="form-group">
                    <label>Banner Image</label>
                    <input type="file" class="form-control" name="banner_one_image" value="">
                    <input type="hidden" class="form-control" name="banner_one_old_image" value="{{ @$cart_page_banner->banner_one->banner_image }}">
                </div>
                <div class="form-group">
                    <label>Site Name</label>
                    <input type="text" class="form-control" name="banner_one_url" value="{{ @$cart_page_banner->banner_one->banner_url }}">
                </div>
                <hr>
                <h5>Banner Two</h5>
                <div class="form-group">
                    <label>Status</label>
                    <br>
                    <label class="custom-switch mt-2">
                        <input type="checkbox" {{ @$cart_page_banner->banner_two->status == 1 ? 'checked' : '' }} name="banner_two_status" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </div>
                <div class="form-group">
                    <img src="{{ asset(@$cart_page_banner->banner_two->banner_image) }}" alt="banner_two" width="150px">
                </div>
                <div class="form-group">
                    <label>Banner Image</label>
                    <input type="file" class="form-control" name="banner_two_image" value="">
                    <input type="hidden" class="form-control" name="banner_two_old_image" value="{{ @$cart_page_banner->banner_two->banner_image }}">
                </div>
                <div class="form-group">
                    <label>Site Name</label>
                    <input type="text" class="form-control" name="banner_two_url" value="{{ @$cart_page_banner->banner_two->banner_url }}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>