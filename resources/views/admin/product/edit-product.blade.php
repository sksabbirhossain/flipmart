@extends('admin.layouts.main')
@section('main-content')
 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>Edit Product</h1>
        </div>
        <div class="col-sm-6">
              <a href="{{ url('admin/all-products') }}" class="float-sm-right btn btn-success w-50">All Products</a>
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
            <div class="col-12 ">
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
                <form action="{{ url('/admin/edit-product/'.$productData->product_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">       
                      <div class="col-6">
                          <!-- general form elements -->
                          <div class="card card-primary">
                              <div class="card-body">
                                  <div class="form-group">
                                      <label for="product_name">Product Name</label>
                                      <input type="text" class="form-control" name="product_name" id="product_name" value="{{ $productData->product_name }}" placeholder="Product Name">
                                      <strong class="text-danger">@error('product_name') {{ $message }}  @enderror</strong>
                                  </div>

                                  <div class="form-group">
                                      <label for="cat_id">Category</label>
                                      <select class="form-control" name="category">
                                        <option  value=""  @if ($productData->cat_id == null) selected  @endif >Select Category</option>
                                        @foreach ($category as $category)
                                            <option value="{{ $category->category_id }}" >{{ $category->category_name }}</option>
                                        @endforeach
                                      </select>
                                      <strong class="text-danger">@error('category') {{ $message }}  @enderror</strong>
                                  </div>

                                  <div class="form-group">
                                      <label for="cat_id">Sub Category</label>
                                      <select class="form-control" name="cat_id">
                                          <option value="">Select Sub Category</option>
                                          @foreach ($category->subCategory as $category)
                                              <option value="{{ $category->category_id }}" >{{ $category->category_name }}</option>
                                          @endforeach
                                      </select>
                                      <strong class="text-danger">@error('cat_id') {{ $message }}  @enderror</strong>
                                  </div>

                                  <div class="form-group">
                                      <label for="image">Product Image</label>
                                      <input type="file" class="form-control" name="image" id="image">
                                      <strong class="text-danger">@error('image') {{ $message }}  @enderror</strong>
                                      <img class="mt-3 img-fluid" src="{{ asset('uploads/productImages/'.$productData->image) }}" alt="" >
                                  </div>

                                  <div class="form-group">
                                      <label for="qty">Quenty</label>
                                      <input type="number" min="1" class="form-control" name="qty" id="qty" value="{{ $productData->qty }}" placeholder="Quenty">
                                      <strong class="text-danger">@error('qty') {{ $message }}  @enderror</strong>
                                  </div>

                                  <div class="form-group">
                                      <label for="price">Price</label>
                                      <input type="number" class="form-control" name="price" id="price" value="{{ $productData->price }}" placeholder="Price">
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
                                      <textarea class="form-control" name="small_description" id="small_description" cols="30" rows="4">{{ $productData->small_description }} </textarea>
                                      <strong class="text-danger">@error('small_description') {{ $message }}  @enderror</strong>
                                  </div>
                          
                                  <div class="form-group">
                                      <label for="description">Description</label>
                                      <textarea class="form-control" name="description" id="description" cols="30" rows="4">{{ $productData->description }}</textarea>
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