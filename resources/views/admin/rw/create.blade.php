@extends('template.admin.master')
@section('rw', 'active')

@push('css')
  <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/select2/css/select2.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
@endpush

@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card card-teal mt-4">
              <div class="card-header">
                <h3 class="card-title">Tambah Data RW</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('rw.store')}}" method="POST">
              	@csrf
          		{{ method_field('POST') }}
                <div class="card-body">
                  <div class="form-group">
                  <label>Kelurahan/Desa</label>
                  <select class="form-control select2bs4" name="subdist_id" style="width: 100%;">
                    @foreach($subdist as $key)
                    <option value="{{$key->id}}">{{$key->subdist_name}}</option>
                    @endforeach
                  </select>
                </div>
                  <div class="form-group">
                    <label for="distInput">Nama RW</label>
                    <input type="text" name="rw_name" class="form-control" id="distInput" placeholder="Enter RW Name">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-outline-info btn-block">Submit</button>
                </div>
              </form>
            </div>

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
  </section>

@endsection

@push('script')
<script src="{{asset("assets/adminlte/plugins/select2/js/select2.full.min.js")}}"></script>
<script type="text/javascript">
  $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
</script>
@endpush