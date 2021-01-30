@extends('template.admin.master')
@section('cit', 'active')

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
              <form action="{{route('city.update', $city->id)}}" method="POST">
              	@csrf
                @method('patch')
                <div class="card-body">
                  <div class="form-group">
                    <label>Provinsi</label>
                    <select class="form-control select2bs4" name="prov_id" style="width: 100%;">
                      @foreach($prov as $key)
                      <option value="{{$key->id}}" @if($key->prov_name == $city->province->prov_name) selected @endif>{{$key->prov_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="provinceInput">Nama Kota</label>
                    <input type="text" name="city_name" class="form-control" value="{{$city->city_name}}" id="provinceInput" placeholder="Enter City Name">
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

