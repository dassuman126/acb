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
                            <h3 class="card-title">Create Statistics</h3>
                            <a href="{{ route('stat_list') }}" class="btn btn-warning btn-block btn-flat btn-sm"
                                style="float: right;width:150px;color: black;"><i class="fa fa-users"></i> Statistics
                                List</a>

                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('create_stat') }}" id="add_pr" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                @if(session('message'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="javascript:" class="close" data-dismiss="alert"
                                        aria-label="close">&times;</a>
                                    <strong>Success!</strong> {{ session('message') }}
                                </div>
                                @endif
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="required" for="exampleInputEmail1">Statistics Title</label>
                                            <input id="title" type="text"
                                                class="form-control @error('title') is-invalid @enderror" name="title"
                                                value="{{ old('title') }}" required autofocus>

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
                                            <input id="title_mr" type="text"
                                                class="form-control @error('title_mr') is-invalid @enderror"
                                                name="title_mr" value="{{ old('title_mr') }}" required autofocus>

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
                                            <input id="title_hi" type="text"
                                                class="form-control @error('title_hi') is-invalid @enderror"
                                                name="title_hi" value="{{ old('title_hi') }}" autofocus>

                                            @error('title_hi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="" for="exampleInputEmail1">Link</label>
                                            <input id="link" type="text"
                                                class="form-control @error('link') is-invalid @enderror"
                                                name="link" value="{{ old('link') }}" autofocus>

                                            @error('link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="" for="exampleInputEmail1">Upload File</label>
                                            <input id="file" type="file"
                                                class="form-control @error('file') is-invalid @enderror"
                                                name="file" value="{{ old('file') }}" autofocus>

                                            @error('file')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="required" for="exampleInputEmail1">Year</label>
                                            <input type="text" id="year" class="form-control @error('year') is-invalid @enderror" name="year" required>

                                            @error('year')
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
    // $(document).ready(function () {
    //     $('#range').change(function () {
    //         var rangeId = $(this).val();
    //         if (rangeId) {
    //             $.ajax({
    //                 type: "GET",
    //                 url: "{{ route('fetch.units') }}",
    //                 data: { range_id: rangeId },
    //                 success: function (response) {
    //                     $('#unit').empty();
    //                     $('#unit').append('<option value="">Select</option>');
    //                     $.each(response, function (key, value) {
    //                         $('#unit').append('<option value="' + value.id + '">' + value.title + '</option>');
    //                     });
    //                 }
    //             });
    //         } else {
    //             $('#unit').empty();
    //             $('#unit').append('<option value="">Select</option>');
    //         }
    //     });
    // });


    $(function () {
        $.validator.setDefaults({
            submitHandler: function () {
                $('#add_pr').submit();
            }
        });
        $('#add_pr').validate({
            rules: {
                title: {
                    required: true
                },
                title_mr: {
                    required: true
                },

                link: {
                    required: true
                },
                file: {
                    required: true
                },
                year: {
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