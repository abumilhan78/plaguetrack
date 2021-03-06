@extends('template.admin.master')

@push('cssdatatable')
  <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
@endpush

@section('prov', 'active')

@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card mt-4">
              <div class="card-header">
                <h3 class="card-title">Province</h3>
                <div class="card-tools">
                  <a href="{{url('admin/report/prov')}}" class="btn btn-info">Cetak Data</a>
                  <a href="{{route('province.create')}}" class="btn btn-primary">Add Data</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Provinsi</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($prov as $key)
                      <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$key->prov_name}}</td>
                          <td>{{$key->created_at}}</td>
                          <td>
                            <a href="{{route('province.edit', $key->id)}}" class="btn btn-outline-info">Edit</a>
                            <form action="{{route('province.destroy', $key->id)}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button type="submit" onclick="return confirm('Apakah Anda Yakin?')" class="btn btn-outline-danger">Hapus</button>
                            </form>
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

@endsection


@push('jsdatatable')
<script src="{{asset("assets/adminlte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
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
@endpush