<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user | register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      {{-- toastr --}}
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>
<body>
    <div class="container " style="margin-top: 10%">
        <div class="row">
            <div class="col-md-4 offset-md-4" >
                <div class="loginForm">
                  <div class="card card-body " style="max-width: 280px">
                    <h2 class="card-title text-center mb-4">Admin Login</h1> <hr>
                    @if (Session::get('success'))
                      <div class="alert alert-success text-center text-bold" role="alert">
                       {{Session::get('success')}}
                      </div>
                    @endif
                    @if (Session::get('fail'))
                        <div class="alert alert-danger text-center text-bold" role="alert">
                          {{Session::get('fail')}}
                        </div>
                    @endif
                  <form action="{{ route('admin.check') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" name="email" placeholder="Enter email">
                      <strong class="text-danger">@error('email') {{$message}} @enderror</strong>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password">
                      <strong class="text-danger">@error('password') {{$message}} @enderror</strong>
                    </div>
                    <button type="submit" class="btn btn-success btn-block">LogIn</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    {!! Toastr::message() !!}
</body>
</html>