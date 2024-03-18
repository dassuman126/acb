@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update User Details</h3>
                <a href="{{ route('user_list') }}" class="btn btn-warning btn-block btn-flat btn-sm" style="float: right;width:150px;color: black;"><i class="fa fa-users"></i> User List</a>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('update_user') }}" id="add_user">
                @csrf
                <input type="hidden" value="{{ $user->id }}" name="user_id" id="user_id">
                <div class="card-body">
                  @if(session('message'))
                  <div class="alert alert-success alert-dismissible">
                    <a href="javascript:" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> {{ session('message') }}
                  </div>
                  @endif
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="required" for="exampleInputEmail1">Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="required" for="exampleInputPassword1">Email Id</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                      </div>
                    </div>
                    
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="required" for="exampleSelectBorder">Role</label>
                        <select class="form-control" name="role_id" id="role_id">
                          <option value="1" @if($user->role_id==1) selected @endif>Admin</option>
                          <option value="2" @if($user->role_id==2) selected @endif>State</option>
                          <option value="3" @if($user->role_id==3) selected @endif>Range</option>
                          <option value="4" @if($user->role_id==4) selected @endif>Unit</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    $(function () {
      $.validator.setDefaults({
        submitHandler: function () {
          $('#add_user').submit();
        }
      });
      $('#add_user').validate({
        rules: {
          email: {
            required: true,
            email: true,
          },
          
          name: {
            required: true
          },
          role_id: {
            required: true
          },
        },
        messages: {
          email: {
            required: "Please enter a email address",
            email: "Please enter a valid email address"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },
          terms: "Please accept our terms"
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script>
@endsection