@extends('admin.layouts.main')
@section('main-content')
 <!-- Content Header (Page header) -->
 <section class="content-header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6">
          <h1>All Categories</h1>
        </div>
        <div class="col-sm-6">
              <a href="{{ url('admin/add-product') }}" class="float-sm-right btn btn-success w-50">Add Product</a>
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
              <table class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th style="min-width: 250px">Product Name</th>
                  <th>Image</th>
                  <th>Product Description</th>
                  <th style="min-width: 120px">category</th>
                  <th>Price</th>
                  <th>Quenty</th>
                  <th style="min-width: 100px">Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                  <tr>
                    <td>{{ $product->product_id }}</td>
                    <td>{{ $product->product_name }}</td>
                    <td><img src="{{ asset('uploads/productImages/'.$product->image) }}" alt="" style="width: 60px;height:60px; border-radius: 10%; object-fit: cover;"></td>
                    <td>{{ Str::limit($product->description, 200) }}</td>
                    <td> {{ $product->category->category_name}} </td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>
                      <a href="{{ url('admin/edit-product/'.$product->product_id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-pen"></i></a>
                      <a href="{{ url('admin/delete-product/'.$product->product_id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
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