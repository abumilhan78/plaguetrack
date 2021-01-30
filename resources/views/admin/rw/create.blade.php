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
                  <select class="form-control @error('subdist_id') is-invalid @enderror" id="subdist" name="subdist_id" style="width: 100%;">
                    <option value="">Pilih RW</option>
                    @foreach($subdist as $key)
                    <option value="{{$key->id}}">{{$key->subdist_name}}</option>
                    @endforeach
                  </select>
                  @error('subdist_id')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
                </div>
                  <div class="form-group">
                    <label for="distInput">Nama RW</label>
                    <input type="text" name="rw_name" class="form-control @error('rw_name') is-invalid @enderror" id="distInput" placeholder="Enter RW Name">
                    @error('rw_name')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>
                    @enderror
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
  $('#subdist').select2({
      placeholder : 'Select a RW'
    })
</script>
@endpush