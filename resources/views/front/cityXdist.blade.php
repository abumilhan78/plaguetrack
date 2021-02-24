@extends('template.front.master')

@section('main')
    <main>
        <div class="container mt-5 mx-6">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{url("detail/".$dt[0]->id_prov)}}">{{ucwords(strtolower($dt[0]->provinsi))}}</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ucwords(strtolower($dt[0]->kota))}}</li>
            </ol>
          </nav>
        </div>
        <section class=''>
            <div class="container">
              <div class="card p-3 br-2 bg-banner shadow" >
                <div class="card-body">
                  <h5 class="card-title text-white mb-4">Data Statistik Coronavirus di Indonesia Berdasarkan Provinsi {{$dt[0]->kota}}</h5>
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
                          <td><a class="text-decoration-none" href="">{{ucwords(strtolower($value->kecamatan))}}</a></td>
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
    </main>
@endsection