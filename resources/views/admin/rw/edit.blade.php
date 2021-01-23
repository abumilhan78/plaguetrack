 @extends('template.admin.master')
@section('rw', 'active')

@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card card-teal mt-4">
              <div class="card-header">
                <h3 class="card-title">Edit Data RW</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('rw.update', $rw->id)}}" method="POST">
                @csrf
                @method('patch')
                <div class="card-body">
                  <div class="form-group">
                    <label>Kelurahan/Desa</label>
                    <select class="form-control select2bs4" name="subdist_id" style="width: 100%;">
                      @foreach($subdist as $key)
                      <option value="{{$key->id}}" @if($key->subdist_name == $rw->subdist->subdist_name) selected @endif>{{$key->subdist_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="provinceInput">Nama RW</label>
                    <input type="text" name="rw_name" class="form-control" value="{{$rw->rw_name}}" id="provinceInput" placeholder="Enter Sub-District Name">
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

