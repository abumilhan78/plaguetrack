 @extends('template.admin.master')
@section('district', 'active')

@section('content')

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <div class="card card-teal mt-4">
              <div class="card-header">
                <h3 class="card-title">Edit Data Kota</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('district.update', $district->id)}}" method="POST">
              	@csrf
                @method('patch')
                <div class="card-body">
                  <div class="form-group">
                    <label>Kota</label>
                    <select class="form-control select2bs4" name="city_id" style="width: 100%;">
                      @foreach($city as $key)
                      <option value="{{$key->id}}" @if($key->city_name == $district->city->city_name) selected @endif>{{$key->city_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="provinceInput">Nama Kota</label>
                    <input type="text" name="dist_name" class="form-control" value="{{$district->dist_name}}" id="provinceInput" placeholder="Enter City Name">
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

