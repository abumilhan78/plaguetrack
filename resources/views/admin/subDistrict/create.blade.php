@extends('template.admin.master')
@section('subdist', 'active')

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
                <h3 class="card-title">Tambah Data Kelurahan/Desa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('subdistrict.store')}}" method="POST">
              	@csrf
          		{{ method_field('POST') }}
                <div class="card-body">
                  <div class="form-group">
                  <label>Kecamatan</label>
                  <select class="form-control @error('dist_id') is-invalid @enderror" id="dist" name="dist_id" style="width: 100%;">
                    <option value="">Pilih Kecamatan</option>
                    @foreach($district as $key)
                    <option value="{{$key->id}}">{{$key->dist_name}}</option>
                    @endforeach
                  </select>
                  @error('dist_id')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
                </div>
                  <div class="form-group">
                    <label for="distInput">Nama Kelurahan/Desa</label>
                    <input type="text" name="subdist_name" class="form-control @error('subdist_name') is-invalid @enderror" id="distInput" placeholder="Enter City Name">
                    @error('subdist_name')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
                  </div>
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
  $('#dist').select2({
      placeholder : 'Select a district'
    })
</script>
@endpush