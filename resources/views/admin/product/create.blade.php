@extends('admin.layouts.master')

@section('content')
    
<!-- Main Content -->
    <section class="section">
      <div class="section-header">
        <h1>Product</h1>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Create Product</h4>
              </div>
              <div class="card-body">
                <form action="{{route('admin.slider.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputState">Category</label>
                                <select id="inputState" class="form-control main-category" name="category">
                                  <option value="" class="disabled">Select</option>
                                  @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputState">Sub Category</label>
                                <select id="inputState" class="form-control subcategory" name="sub_category">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputState">Child Category</label>
                                <select id="inputState" class="form-control child-category" name="child_category">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <div class="">
                        <div class="form-group">
                            <label for="inputState">Brand</label>
                            <select id="inputState" class="form-control child-category" name="brand">
                                @foreach ($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                  @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>SKU</label>
                        <input type="text" class="form-control" name="sku" value="{{old('sku')}}">
                    </div>

                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price" value="{{old('price')}}">
                    </div>

                    <div class="form-group">
                        <label>Offer Price</label>
                        <input type="text" class="form-control" name="offer_price" value="{{old('offer_price')}}">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Offer Start Date</label>
                                <input type="text" class="form-control datepicker" name="offer_start_date" value="{{old('offer_start_date')}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Offer End Date</label>
                                <input type="text" class="form-control datepicker" name="offer_end_date" value="{{old('offer_end_date')}}">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Stock Quantity</label>
                        <input type="number" min="0" class="form-control" name="qty" value="{{old('qty')}}">
                    </div>

                    <div class="form-group">
                        <label>Video Link</label>
                        <input type="text" class="form-control" name="video_link" value="{{old('video_link')}}">
                    </div>

                    <div class="form-group">
                        <label>Short Description</label>
                        <textarea name="short_description" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Long Description</label>
                        <textarea name="long_description" class="form-control summernote"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputState">Is Top</label>
                                <select id="inputState" class="form-control" name="is_top">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputState">Is Best</label>
                                <select id="inputState" class="form-control" name="is_best">
                                    <option value="">Select</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputState">Is Featured</label>
                                <select id="inputState" class="form-control" name="is_featured">
                                    <option value="">Select</option>
                                  <option value="1">Yes</option>
                                  <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>SEO Title/label>
                        <input type="text" class="form-control" name="seo_title" value="{{old('seo_title')}}">
                    </div>

                    <div class="form-group">
                        <label>SEO Description</label>
                        <textarea name="seo_description" class="form-control"></textarea>                    </div>

                    <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection


@push('scripts')
    {{-- get categories --}}
    <script>
      $(document).ready(function(){
        $('body').on('change', '.main-category', function(){
          let id = $(this).val();
          $.ajax({
            method: 'GET',
            url: '{{route("admin.product.get-subcategories")}}',
            data:{
              id: id
            },
            success: function(data){
              $('.subcategory').html('<option value="">Select</option>')
              $.each(data, function(i, item){
                $('.subcategory').append(`<option value="${item.id}">${item.name}</option>`)
              })
            },
            error: function(xhr, status, error){
              console.log(error);
            }
          })
        })
      })
    </script>

    {{-- get chil categories --}}
    <script>
        $(document).ready(function(){
        $('body').on('change', '.subcategory', function(){
            let id = $(this).val();
            $.ajax({
            method: 'GET',
            url: '{{route("admin.product.get-child-categories")}}',
            data:{
                id: id
            },
            success: function(data){
                $('.child-category').html('<option value="">Select</option>')
                $.each(data, function(i, item){
                    $('.child-category').append(`<option value="${item.id}">${item.name}</option>`)
                })
            },
            error: function(xhr, status, error){
                console.log(error);
            }
            })
        })
        })
    </script> 
@endpush