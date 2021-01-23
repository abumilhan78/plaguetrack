 @extends('template.admin.master')
@section('district', 'active')

@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card card-teal mt-4">
              <div class="card-header">
                <h3 class="card-title">Edit Data Kelurahan/Desa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('subdistrict.update', $subdistrict->id)}}" method="POST">
                @csrf
                @method('patch')
                <div class="card-body">
                  <div class="form-group">
                    <label>Kecamatan</label>
                    <select class="form-control select2bs4" name="dist_id" style="width: 100%;">
                      @foreach($district as $key)
                      <option value="{{$key->id}}" @if($key->dist_name == $subdistrict->district->dist_name) selected @endif>{{$key->dist_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="provinceInput">Nama Desa</label>
                    <input type="text" name="subdist_name" class="form-control" value="{{$subdistrict->subdist_name}}" id="provinceInput" placeholder="Enter Sub-District Name">
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

