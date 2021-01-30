@extends('template.admin.master')
@section('dist', 'active')

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
                <h3 class="card-title">Tambah Data Kecamatan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('district.store')}}" method="POST">
              	@csrf
          		{{ method_field('POST') }}
                <div class="card-body">
                  <div class="form-group">
                  <label>Kota</label>
                  <select class="form-control @error('city_id') is-invalid @enderror" id="city" name="city_id" style="width: 100%;">
                    <option value="">Pilih Kota</option>
                    @foreach($city as $key)
                    <option value="{{$key->id}}">{{$key->city_name}}</option>
                    @endforeach
                  </select>
                  @error('city_id')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
                </div>
                  <div class="form-group">
                    <label for="distInput">Nama Kecamatan</label>
                    <input type="text" name="dist_name" class="form-control @error('dist_name') is-invalid @enderror" id="distInput" placeholder="Enter City Name">
                    @error('dist_name')
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
  $('#city').select2({
      placeholder : 'Select a city'
    })
</script>
@endpush