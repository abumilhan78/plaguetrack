@extends('template.admin.master')
@section('loc', 'active')

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
                <h3 class="card-title">Tambah Data Kasus</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('local.store')}}" method="POST">
              	@csrf
                
                  
                  @livewire('kasus')
                  
                
                <!-- /.card-body -->

                
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