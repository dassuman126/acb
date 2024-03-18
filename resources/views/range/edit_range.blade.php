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
                <h3 class="card-title">Update Range</h3>
                <a href="{{ route('range_list') }}" class="btn btn-warning btn-block btn-flat btn-sm" style="float: right;width:150px;color: black;"><i class="fa fa-list"></i> Range List</a>

              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('update_range') }}" id="add_user">
                @csrf
                <input type="hidden" value="{{ $range->id }}" id="range_id" name="range_id">
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
                        <label class="required" for="exampleInputEmail1">Title</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $range->title }}" required  autofocus>   
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                      </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label class="required" for="exampleInputEmail1">Title In Marathi</label>
                          <input id="title_mr" type="text" class="form-control @error('title_mr') is-invalid @enderror" name="title_mr" value="{{ $range->title_mr }}" required  autofocus> 
                                      @error('title_mr')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="" for="exampleInputEmail1">Title In Hindi</label>
                          <input id="title_hi" type="text" class="form-control @error('title_hi') is-invalid @enderror" name="title_hi" value="{{ $range->title_hi }}" autofocus>
                                      @error('title_hi')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="required" for="exampleInputEmail1">Address</label>
                          <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" required  autofocus>{{ $range->address }}</textarea>
                                      @error('address')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="required" for="exampleInputEmail1">Address In Marathi</label>
                          <textarea id="address_mr" class="form-control @error('address_mr') is-invalid @enderror" name="address_mr" required  autofocus>{{ $range->address_mr }}</textarea>
                                      @error('address_mr')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="" for="exampleInputEmail1">Address In Hindi</label>
                          <textarea id="address_hi" class="form-control @error('address_hi') is-invalid @enderror" name="address_hi"  autofocus>{{ $range->address_hi }}</textarea>
                                      @error('address_hi')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="required" for="exampleInputEmail1">Telephone No</label>
                          <input id="phone1" type="text" class="form-control @error('phone1') is-invalid @enderror" name="phone1" value="{{ $range->phone1 }}" required  autofocus>
                                      @error('phone1')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="" for="exampleInputEmail1">Alternate Telephone No</label>
                          <input id="phone2" type="text" class="form-control @error('phone2') is-invalid @enderror" name="phone2" value="{{ $range->phone2 }}"   autofocus>
                                      @error('name')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="required" for="exampleInputEmail1">Fax No</label>
                          <input id="fax" type="text" class="form-control @error('fax') is-invalid @enderror" name="fax" value="{{ $range->fax }}" required  autofocus>
                                      @error('fax')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                        </div>
                      </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="exampleInputPassword1">Email Id</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $range->email }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
          fax: {
            required: true,
          },
          phone1: {
            required: true,
            number: true,
        },
        phone2: {
            number: true,
        },
          title: {
            required: true
          },
          title_mr: {
            required: true
          },
          address: {
            required: true
          },
          address_mr: {
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