<!DOCTYPE html>
<html>
<head>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/login/vendor/bootstrap/css/bootstrap.min.css")}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}">
<!--===============================================================================================-->
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <title></title>
</head>
<body>
  <header class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            <a class="nav-link" href="#">Features</a>
            <a class="nav-link" href="#">Pricing</a>
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <main class="mt-4">
    <section class="container">
       <div class="card-deck">
         <div class="card bg-dark text-white">
           <div class="card-body">
             <div class="card-title">Positif</div>
           </div>
           <div class="card-footer">
             <small class="text-muted">blabla</small>
           </div>
         </div>

          <div class="card">
           <div class="card-body">
             <div class="card-title">Meninggal</div>
           </div>
           <div class="card-footer">
             <small class="text-muted">blabla</small>
           </div>
         </div>

         <div class="card">
           <div class="card-body">
             <div class="card-title">Sembuh</div>
           </div>
           <div class="card-footer">
             <small class="text-muted">blabla</small>
           </div>
       </div>
    </section>

  </main>

  <footer>
    
  </footer>

<!--===============================================================================================-->
    <script src="{{asset("assets/login/vendor/jquery/jquery-3.2.1.min.js")}}"></script>
<!--===============================================================================================-->
    <script src="{{asset("assets/login/vendor/bootstrap/js/popper.js")}}"></script>
    <script src="{{asset("assets/login/vendor/bootstrap/js/bootstrap.min.js")}}"></script>
<!--===============================================================================================-->
  
</body>
</html>