@extends('admin.layouts.master')

@section('content')
    
<!-- Main Content -->
    <section class="section">
      <div class="section-header">
        <h1>Footer</h1>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Edit Footer Social</h4>
              </div>
              <div class="card-body">
                <form action="{{route('admin.footer-socials.update', $footerSocials->id)}}" method="POST">
                  @csrf
                  @method('PUT')
                    <div class="form-group">
                      <label>Icon</label>
                      <div>
                        <button class="btn btn-primary" data-icon="{{ $footerSocials->icon }}" data-selected-class="btn-danger" data-unselected-class="btn-primary" role="iconpicker" name="icon"></button>
                      </div>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $footerSocials->name }}">
                    </div>
                    <div class="form-group">
                        <label>url</label>
                        <input type="text" class="form-control" name="url" value="{{ $footerSocials->url }}">
                    </div>
                    <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                          <option {{$footerSocials->status === 1 ? 'selected' : ''}} value="1">Active</option>
                          <option {{$footerSocials->status === 0 ? 'selected' : ''}} value="0">Inactive</option>
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
