@extends('template.admin.master')
@section('cit', 'active')

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
                <h3 class="card-title">Tambah Data Kota</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('city.store')}}" method="POST">
              	@csrf
          		{{ method_field('POST') }}
                <div class="card-body">
                  <div class="form-group">
                  <label>Provinsi</label>
                  <select class="form-control @error('prov_id') is-invalid @enderror" id="prov" name="prov_id" style="width: 100%;">
                    <option value="" selected>pilih provinsi</option>
                    @foreach($prov as $key)
                    <option value="{{$key->id}}">{{$key->prov_name}}</option>
                    @endforeach
                  </select>
                  @error('prov_id')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
                </div>
                  <div class="form-group">
                    <label for="cityInput">Nama Kota</label>
                    <input type="text" name="city_name" class="form-control @error('city_name') is-invalid @enderror" id="cityInput" placeholder="Enter City Name">
                    @error('city_name')
                  <div class="invalid-feedback">
                    {{ $message }}
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
  $('#prov').select2({
    placeholder : "Select a province",
  });

  
</script>
@endpush