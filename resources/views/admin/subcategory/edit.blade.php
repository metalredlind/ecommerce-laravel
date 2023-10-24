@extends('admin.layouts.master')

@section('content')
    
<!-- Main Content -->
    <section class="section">
      <div class="section-header">
        <h1>Sub Category</h1>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Edit Sub-Category</h4>
              </div>
              <div class="card-body">
                <form action="{{route('admin.subcategory.update', $subCategories->id)}}" method="POST">
                  @csrf
                  @method('PUT')
                    <div class="form-group">
                      <label for="inputState">Category</label>
                      <select id="inputState" class="form-control" name="category">
                        <option value="">Select</option>
                        @foreach ($categories as $category)
                          <option {{$category->id == $subCategories->category_id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$subCategories->name}}">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                          <option {{$subCategories->status == 1 ? 'selected' : ''}} value="1">Active</option>
                          <option {{$subCategories->status == 0 ? 'selected' : ''}} value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


@endsection
