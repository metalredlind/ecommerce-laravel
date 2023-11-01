@extends('admin.layouts.master')

@section('content')
    
<!-- Main Content -->
    <section class="section">
      <div class="section-header">
        <h1>Product Variant Items</h1>
      </div>

      <div class="section-body">
        <div class="mb-3">
            <a href="{{route('admin.products-variant.index', ['product' => $product->id])}}" class="btn btn-primary">Back</a>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Variant</h4>
                <div class="card-header-action">
                    <a href="{{route('admin.products-variant.create')}}" class="btn btn-primary mb-2"><i class="fas fa-plus"></i> Create New</a>
                </div>
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
          url:"{{route('admin.products-variant.change-status')}}",
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