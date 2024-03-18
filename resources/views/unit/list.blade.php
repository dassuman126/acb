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
                  <h3 class="card-title">Units List</h3>
                  <a href="{{ route('add_unit') }}" class="btn btn-warning btn-block btn-flat btn-sm " style="float: right;width:150px;color: black;"><i class="fa fa-plus"></i> Add Unit</a>
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
                            <th>Range</th>
                            <th>Title</th>
                            <th>Title In Marathi</th>
                            <th>Title In Hindi</th>
                            <th>Address</th>
                            <th>Address In Marathi</th>
                            <th>Address In Hindi</th>
                            <th>Phone No/ Alternate No</th>
                            {{-- <th>Alternate Phone No</th> --}}
                            <th>Fax</th>
                            <th>Email ID</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($unit as $units )
                            <tr>
                              <td>{{ isset($units->ranges->unit)?$units->ranges->title:"Range Deleted" }}</td>
                              <td>{{ $units->title }}</td>
                              <td>{{ $units->title_mr }}</td>
                              <td>{{ $units->title_hi }}</td>
                              <td>{{ $units->address }}</td>
                              <td>{{ $units->address_mr }}</td>
                              <td>{{ $units->address_hi }}</td>
                              <td>{{ $units->phone1 }} {{ $units->phone2?"/".$units->phone2:"" }} </td>
                              {{-- <td> </td> --}}
                              <td>{{ $units->fax }}</td>
                              <td>{{ $units->email }}</td>
                                <td>  
                                  <div class="btn-group">
                                      <button type="button" onclick="location.href='{{ route('edit_unit', $units->id) }}';" class="btn btn-success btn-block btn-sm"><i class="fa fa-edit"></i></button>
                                      <form type="submit" method="POST" style="display: inline"
                                          action="{{ route('unit.destroy', $units->id) }}"
                                          onsubmit="return confirmDelete(event)">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger btn-block btn-sm"><i class="fa fa-trash"></i></button>
                                      </form>
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