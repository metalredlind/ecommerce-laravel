@extends('admin.layouts.master')

@section('content')
    
<!-- Main Content -->
    <section class="section">
      <div class="section-header">
        <h1>Flash Sale</h1>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Flash Sale End Date</h4>
              </div>
              <div class="card-body">
                <form action="{{route('admin.flash-sale.update')}}" method="POST">
                  @csrf
                  @method('PUT')
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Sale End Date</label>
                            <input type="text" class="form-control datepicker" name="end_date" value="{{@$flashSaleDate->end_date}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ml-3">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Add Flash Sale Products</h4>
              </div>
              <div class="card-body">
                <form action="{{route('admin.flash-sale.add-product')}}" method="POST">
                  @csrf
                    <div class="">
                        <div class="form-group">
                            <label>Add Product</label>
                            <select name="product" id="" class="form-control select2">
                              <option value="">Select</option>
                              @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Show at home</label>
                          <select name="show_at_home" id="" class="form-control">
                            <option value="">Select</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Status</label>
                          <select name="status" id="" class="form-control">
                            <option value="">Select</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>All Flash Sale Products</h4>
              </div>
              <div class="card-body">
                {{ $dataTable->table() }}
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection

@push('scripts')
  {{ $dataTable->scripts(attributes: ['type' => 'module']) }} 

  <script>
      $(document).ready(function(){
        $('body').on('click', '.change-status', function(){
          let isChecked = $(this).is(':checked');
          let id = $(this).data('id');
          console.log(id);

          $.ajax({
            url:"{{route('admin.product.change-status')}}",
            method: 'PUT',
            data: {
              status: isChecked,
              id: id
            },
            success: function(data){
              toastr.success(data.message);
            },
            error: function(xhr, status, error){
              console.log(error);
            }
          })
        })
      })
  </script>
@endpush