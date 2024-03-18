@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Press Release List</h3>
                  <a href="{{ route('add_pr') }}" class="btn btn-warning btn-block btn-flat btn-sm " style="float: right;width:150px;color: black;"><i class="fa fa-user-plus"></i> Add Press Release</a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                  @if(session('message'))
                  <div class="alert alert-success alert-dismissible">
                    <a href="javascript:" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> {{ session('message') }}
                  </div>
                  @endif
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>#SL No.</th>
                          <th>Title</th>
                          <th>Range</th>
                          <th>Unit</th>
                          <th>Type</th>
                          <th>File</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($prs as $key => $pr )
                            <tr>
                              <td>{{ $key+1 }}</td>
                                <td>{{ $pr->title }}</td>
                                <td>{{ $pr->range }}</td>
                                <td>{{ $pr->unit }}</td>
                                <td>{{ $pr->type }}</td>
                                <td>
                                  <a href="{{ asset('storage/'.$pr->file) }}" target="__blank">
                                  View
                              </a></td>
                                <td>  
                                  <div class="btn-group">
                                    <button type="button"
                                    onclick="location.href='{{ route('edit_pr', $pr->id) }}';" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fa fa-edit"></i></button>
                                    <form type="submit" method="POST" style="display: inline"
                                          action="{{ route('pr.destroy', $pr->id) }}"
                                          onsubmit="return confirmDelete(event)">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                      </form>
                                  </div>
                                  </div>
                                  
                               
                            </td>
                              </tr>
                            @endforeach
                       
                        </tbody>
                      </table>
                </div>
                
              </div>
              <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": true, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
@endsection