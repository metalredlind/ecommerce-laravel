@extends('vendor.layouts.master')

@section('content')

      <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
    @include('vendor.layouts.sidebar')
      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
        <a href="{{route('vendor.products.index')}}" class="btn btn-warning mb-2"><i class="fas fa-angle-double-left"></i> Back</a>
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i>Products Variants</h3>
            <h6>Product: {{$product->name}}</h6>
            <div class="create_button">
              <a href="{{route('vendor.products-variant.create', ['product' => $product->id])}}" class="btn btn-primary"><i class="fas fa-plus"></i>  Create Product</a>
            </div>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                {{ $dataTable->table() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->
    
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
            url:"{{route('vendor.products-variant.change-status')}}",
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