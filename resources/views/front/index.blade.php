@extends('template.front.master')

@section('main')
<main class="mb-5">
  <section class='p-5'>
    <div class="container d-flex justify-content-between">
      <div class="container">
        <div class="bg-banner br-2 text-white p-3 shadow">
        <h1>PlagueTrack</h1>
        <p>Provide you a statistics of corona virus from around the world</p>
        </div>
      </div>
      <div>
        <img src="{{asset('assets/img/jumbo.png')}}" width='500' alt="">
      </div>
    </div>
    <div class="row justify-content-center mt-5">
      <div class="card col-4 m-3 br-2 bg-magenta-2 text-white shadow" style="width: 18rem;">
        <div class="card-body d-flex justify-content-between">
          <div>
            <h5 class="card-title">Total Positif</h5>
            <p class="card-text">{{number_format($sum_glob['positif'])}} <span class=' d-block'>jiwa</span></p>
          </div>
          <div class="">
            <img src="{{asset('assets/img/corona.png')}}" width='200' height='150' alt="">
          </div>
        </div>
      </div>
      <div class="card col-4 m-3 br-2 bg-blue text-white shadow" style="width: 18rem;">
      <div class="card-body d-flex">
          <div>
            <h5 class="card-title">Total Sembuh</h5>
            <p class="card-text">{{number_format($sum_glob['sembuh'])}} <span class=' d-block'>jiwa</span></p>
          </div>
          <div class="">
            <img src="{{asset('assets/img/distance.png')}}" width='200' height='150' alt="">
          </div>
        </div>
      </div>
      <div class="card col-4 m-3 br-2 bg-teal text-white shadow" style="width: 18rem;">
      <div class="card-body d-flex">
          <div>
            <h5 class="card-title">Total Meninggal</h5>
            <p class="card-text">{{number_format($sum_glob['meninggal'])}} <span class=' d-block'>jiwa</span></p>
          </div>
          <div class="">
            <img src="{{asset('assets/img/grave.png')}}" width='200' height='150' alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class='p-5' id="provins">
    <div class="container">
      <div class="card p-3 br-2 bg-banner shadow" >
        <div class="card-body">
          <h5 class="card-title text-white mb-4">Data Statistik Coronavirus di Indonesia Berdasarkan Provinsi</h5>
          <div class="container bg-primary" style="border-radius: 15px">
            <table class="table table-dark table-striped rounded">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Provinsi</th>
                  <th scope="col">Positif</th>
                  <th scope="col">Sembuh</th>
                  <th scope="col">Meninggal</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dt as $prov => $value)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td><a class="text-decoration-none" href="{{url("detail/$value->id")}}">{{ucwords(strtolower($value->provinsi))}}</a></td>
                  <td>{{$value->positif}}</td>
                  <td>{{$value->sembuh}}</td>
                  <td>{{$value->meninggal}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class='p-3' id="global">
    <div class="container">
      <div class="card p-3 br-2 bg-banner shadow" >
        <div class="card-body">
          <h5 class="card-title text-white mb-4">Kasus Coronavirus Global</h5>
          <div class="container" style="border-radius: 15px">
            <table id="example1" class="table table-dark table-striped rounded">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Negara</th>
                  <th scope="col">Positif</th>
                  <th scope="col">Sembuh</th>
                  <th scope="col">Meninggal</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dt_global as $glob => $value)
                <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                  <td>{{ucwords(strtolower($value['Negara']))}}</td>
                  <td>{{number_format($value['Positif'])}}</td>
                  <td>{{number_format($value['Sembuh'])}}</td>
                  <td>{{number_format($value['Meninggal'])}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

</main>
@endsection