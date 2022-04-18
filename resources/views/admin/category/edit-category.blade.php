@extends('admin.layouts.main')
@section('main-content')
 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>Edit Category</h1>
        </div>
        <div class="col-sm-6">
              <a href="{{ url('admin/all-category') }}" class="float-sm-right btn btn-success w-50">All Category</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-offset-4 ">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
            <div class="col-6 col-offset-3">
                     <!-- general form elements -->
            <div class="card card-primary">
                {{-- show success message --}}
                @if (Session::get('success'))
                   <div class="alert alert-success text-bold" role="alert">
                    {{ Session::get('success') }}
                  </div> 
                @endif
                {{-- show error message --}}
                @if (Session::get('fail'))
                   <div class="alert alert-warning text-bold" role="alert">
                    {{ Session::get('fail') }}
                  </div> 
                @endif

                <!-- form start -->
                <form action="{{ url('/admin/edit-category/'.$categoryData->category_id) }}" method="POST">
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="category_name">Category Name</label>
                      <input type="text" class="form-control" name="category_name" id="category_name" value="{{ $categoryData->category_name }}" placeholder="Category Name">
                      <strong class="text-danger">@error('category_name') {{ $message }}  @enderror</strong>
                    </div>
                    <div class="form-group">
                      <label for="category_id">Category_id</label>
                      <select class="form-control" name="cat_id">
                        <option  value=""  @if ($categoryData->cat_id == null) selected  @endif >Select Category</option>
                        @foreach ($category as $category)
                            <option value="{{ $category->category_id }}"
                                @if ($categoryData->cat_id !== null && $categoryData->cat_id == $category->category_id) selected @endif >{{ $category->category_name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <button class=" btn btn-success">Update Category</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
              <!-- /.card -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection