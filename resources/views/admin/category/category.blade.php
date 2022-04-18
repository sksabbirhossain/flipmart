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
              <a href="{{ url('admin/add-category') }}" class="float-sm-right btn btn-success w-50">Add Category</a>
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
                  <th>Category_id</th>
                  <th>Category Name</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($category as $category)
                  <tr>
                    <td class="text-bold">{{ $category->category_id }}</td>
                    <td class="text-bold"> {{ $category->category_name }} </td>
                    <td>
                      <a href="{{ url('admin/edit-category/'.$category->category_id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-pen"></i></a>
                      <a href="{{ url('admin/delete-category/'.$category->category_id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                  </tr>

                  @foreach ($category->subCategory as $subCategory)
                    <tr>
                      <td>{{ $subCategory->category_id }}</td>
                      <td> {{ $subCategory->category_name }} </td>
                      <td>
                        <a href="{{ url('admin/edit-category/'.$subCategory->category_id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-pen"></i></a>
                        <a href="{{ url('admin/delete-category/'.$subCategory->category_id) }}" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr>
                  @endforeach
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