<div class="tab-pane fade" id="list-banner-product" role="tabpanel" aria-labelledby="list-banner-product-list">
    <div class="card border">
        <div class="card-body">
            <form action="{{route('admin.advertisement.product-page-banner')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Status</label>
                    <br>
                    <label class="custom-switch mt-2">
                        <input type="checkbox" {{ @$product_page_banner->banner_one->status == 1 ? 'checked' : '' }} name="status" class="custom-switch-input">
                        <span class="custom-switch-indicator"></span>
                    </label>
                </div>
                <div class="form-group">
                    <img src="{{ asset(@$product_page_banner->banner_one->banner_image) }}" alt="banner_one" width="150px">
                </div>
                <div class="form-group">
                    <label>Banner Image</label>
                    <input type="file" class="form-control" name="banner_image" value="">
                    <input type="hidden" class="form-control" name="banner_old_image" value="{{ @$product_page_banner->banner_one->banner_image }}">
                </div>
                <div class="form-group">
                    <label>Site Name</label>
                    <input type="text" class="form-control" name="banner_url" value="{{ @$product_page_banner->banner_one->banner_url }}">
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
