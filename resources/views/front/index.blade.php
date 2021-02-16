<!DOCTYPE html>
<html>
<head>
<!--===============================================================================================-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<!--===============================================================================================-->
  <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/fontawesome-free/css/all.min.css")}}">
<!--===============================================================================================-->
<link rel="stylesheet" href="{{asset("assets/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">

  <title></title>
  <style>
    .bg-cyan {
      background-color : #64dfdf;
    }

    .bg-magenta{
      background-color : #29a19c;
    }

    .bg-magenta-2{
      background-color : #af0069;
    }

    .bg-blue {
      background-color : #16c79a;
    }

    .bg-teal {
      background-color : #11698e;
    }

    .bg-banner {
      background-color : #64dfdf;
    }


    .br-2{
      border-radius: 15px;
    }
  </style>
</head>
<body>
  <header class="shadow">
  <nav class="navbar navbar-expand-lg navbar-dark bg-cyan p-3">
  <div class="container-fluid flex-row">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>
      </ul>
    </div>
    <a class="navbar-brand " href="#">PlagueTrack</a>
  </div>
</nav>
  </header>

  <main>
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

    <section class='p-5'>
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
                    <td>{{ucwords(strtolower($value->provinsi))}}</td>
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

    <section class='p-3'>
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

<footer class="main-footer bg-cyan p-3 text-white text-center">
    <small>Made with <span class="fas fa-heart"></span> by <a href="https://github.com/abumilhan78">Mochammad Qaysa Al-Haq</a>.</small>
    
</footer>

<!--===============================================================================================-->
    <script src="{{asset("assets/login/vendor/jquery/jquery-3.2.1.min.js")}}"></script>
<!--===============================================================================================-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<!--===============================================================================================-->
<script src="{{asset("assets/adminlte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("assets/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("assets/adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("assets/adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  var dt = {!! $dt !!}
  console.log(dt)
</script>

</body>
</html>