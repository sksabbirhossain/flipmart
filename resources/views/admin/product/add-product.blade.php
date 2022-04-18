@extends('admin.layouts.main')
@section('main-content')
 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>Add Product</h1>
        </div>
        <div class="col-sm-6">
              <a href="{{ url('admin/all-products') }}" class="float-sm-right btn btn-success w-50">All Product</a>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
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
                <form action="{{ url('/admin/add-product') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">       
                        <div class="col-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="product_name">Product Name</label>
                                        <input type="text" class="form-control" name="product_name" id="product_name" value="{{ old('product_name') }}" placeholder="Product Name">
                                        <strong class="text-danger">@error('product_name') {{ $message }}  @enderror</strong>
                                    </div>

                                    <div class="form-group">
                                        <label for="cat_id">Category</label>
                                        <select class="form-control" name="category"> 
                                            <option selected="selected" value="">Select Category</option>
                                            @foreach ($category as $category)
                                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        <strong class="text-danger">@error('category') {{ $message }}  @enderror</strong>
                                    </div>

                                    <div class="form-group">
                                        <label for="cat_id">Sub Category</label>
                                        <select class="form-control" name="cat_id">
                                            <option selected="selected" value="">Select Category</option>
                                            @foreach ($category->subCategory as $category)
                                                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        <strong class="text-danger">@error('cat_id') {{ $message }}  @enderror</strong>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Product Image</label>
                                        <input type="file" class="form-control" name="image" id="image">
                                        <strong class="text-danger">@error('image') {{ $message }}  @enderror</strong>
                                    </div>

                                    <div class="form-group">
                                        <label for="qty">Quenty</label>
                                        <input type="number" min="1" class="form-control" name="qty" id="qty" value="{{ old('qty') }}" placeholder="Quenty">
                                        <strong class="text-danger">@error('qty') {{ $message }}  @enderror</strong>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="number" class="form-control" name="price" id="price" value="{{ old('price') }}" placeholder="Price">
                                        <strong class="text-danger">@error('price') {{ $message }}  @enderror</strong>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <div class="col-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="small_description">Short Description</label>
                                        <textarea class="form-control" name="small_description" id="small_description" cols="30" rows="4">{{ old('small_description') }} </textarea>
                                        <strong class="text-danger">@error('small_description') {{ $message }}  @enderror</strong>
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="4">{{ old('description') }}</textarea>
                                        <strong class="text-danger">@error('description') {{ $message }}  @enderror</strong>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Add Product</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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