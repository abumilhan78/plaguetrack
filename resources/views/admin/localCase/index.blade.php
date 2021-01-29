@extends('template.admin.master')
@section('loc', 'active')
@push('cssdatatable')
  <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
@endpush

@section('loc', 'active')
@section('content')

 <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card mt-4">
              <div class="card-header">
                <h3 class="card-title">COVID-19 Local Case</h3>
                <div class="card-tools">
                  <a href="{{route('local.create')}}" class="btn btn-primary">Add Data</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-dark">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Lokasi</th>
                    <th>RW</th>
                    <th>Sembuh</th>
                    <th>Meninggal</th>
                    <th>Positif</th>
                    <th>Reaktif</th>
                    <th>Created At</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($local as $key)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>Desa/Kelurahan : {{$key->rw->subdist->subdist_name}}<br>
                        Kecamatan : {{$key->rw->subdist->district->dist_name}}<br>
                        Kab/Kota : {{$key->rw->subdist->district->city->city_name}}<br>
                        Provinsi : {{$key->rw->subdist->district->city->province->prov_name}}
                      </td>
                      <td>{{$key->rw->rw_name}}</td>
                      <td>{{$key->sembuh}}</td>
                      <td>{{$key->meninggal}}</td>
                      <td>{{$key->positif}}</td>
                      <td>{{$key->reaktif}}</td>
                      <td>{{$key->created_at}}</td>
                      <td>
                        <a href="{{route('local.edit', $key->id)}}" class="btn btn-outline-info">Edit</a>
                        <form action="{{route('local.destroy', $key->id)}}" method="post" class="d-inline">
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