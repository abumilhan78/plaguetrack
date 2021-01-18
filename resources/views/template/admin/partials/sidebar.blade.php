<aside class="main-sidebar sidebar-light-teal elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link navbar-teal">
      <img src="{{asset("assets/adminlte/dist/img/AdminLTELogo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset("assets/adminlte/dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item active">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
         <!--  <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-viruses"></i>
              <p>
                Case
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{url("admin/case")}}" class="nav-link @yield('case')">
                  <i class="fas fa-map nav-icon"></i>
                  <p>Case (Local)</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url("tabel")}}" class="nav-link @yield('case')">
                  <i class="fas fa-globe-americas nav-icon"></i>
                  <p>Case (Global)</p>
                </a>
              </li>

              
            </ul>
          </li> -->

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-map-marked-alt"></i>
              <p>
                Plague Case
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{url("admin/local")}}" class="nav-link @yield('dasbor')">
                  <i class="fas fa-map nav-icon"></i>
                  <p>Local Case</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url("admin/global")}}" class="nav-link @yield('dasbor')">
                  <i class="fas fa-globe-americas nav-icon"></i>
                  <p>Global Case</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-map-marked-alt"></i>
              <p>
                Area
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url("admin/province")}}" class="nav-link @yield('dasbor')">
                  <i class="fas fa-place-of-worship nav-icon"></i>
                  <p>Provinsi</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url("admin/city")}}" class="nav-link @yield('dasbor')">
                  <i class="fas fa-place-of-worship nav-icon"></i>
                  <p>City</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url("admin/district")}}" class="nav-link @yield('dasbor')">
                  <i class="fas fa-place-of-worship nav-icon"></i>
                  <p>District</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url("admin/subdistrict")}}" class="nav-link @yield('dasbor')">
                  <i class="fas fa-place-of-worship nav-icon"></i>
                  <p>Sub-District</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url("admin/rw")}}" class="nav-link @yield('dasbor')">
                  <i class="fas fa-place-of-worship nav-icon"></i>
                  <p>RW</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>