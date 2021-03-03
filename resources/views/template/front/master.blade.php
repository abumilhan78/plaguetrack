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
    html{
      scroll-behavior: smooth;
    }
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

    .trans{
      transition: 0.5s;
    }
  </style>
</head>
<body>
  <header class="shadow">
  <nav class="navbar navbar-expand-lg navbar-dark bg-cyan p-3 trans">
  <div class="container-fluid flex-row">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#provins">Data Provinsi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#global">Data Global</a>
        </li>
      </ul>
    </div>
    <a class="navbar-brand " href="{{url('/')}}">PlagueTrack</a>
  </div>
</nav>
  </header>

  @yield('main')

<footer class="main-footer bg-cyan p-3 text-white text-center mt-5 trans">
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
  window.addEventListener('scroll', () => {
    var header = document.querySelector('header');
    var nav = document.querySelector('nav');
    var footer = document.querySelector('footer');
    header.classList.toggle('fixed-top', window.scrollY > 0);
    nav.classList.toggle('navbar-light', window.scrollY > 0);
    nav.classList.toggle('p-3', window.scrollY < 1);
    nav.classList.toggle('navbar-dark', window.scrollY < 1);
    nav.classList.toggle('bg-light', window.scrollY > 0);
    footer.classList.toggle('bg-cyan', window.scrollY < 1000);
    footer.classList.toggle('text-white', window.scrollY < 1000);
    footer.classList.toggle('p-3', window.scrollY < 1000);
    footer.classList.toggle('bg-light', window.scrollY > 1000);
    footer.classList.toggle('text-dark', window.scrollY > 1000);
    footer.classList.toggle('p-2', window.scrollY > 1000);
  });
</script>

</body>
</html>