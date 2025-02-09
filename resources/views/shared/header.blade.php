  <!-- Topbar header - style you can find in pages.scss -->
  <header class="topbar" data-navbarbg="skin5">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">


              <a class="navbar-brand" href="{{ route('album.home') }}">
                  <!-- Logo icon -->
                  <b class="logo-icon ps-2">
                      <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                      <!-- Dark Logo icon -->
                      <img src="{{ asset('assets/images/logo-icon.png') }}" alt="homepage" class="light-logo" />

                  </b>
                  <!--End Logo icon -->
                  <!-- Logo text -->
                  <span class="logo-text">
                      <!-- dark Logo text -->
                      My Album
                  </span>

              </a>

              <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                      class="ti-menu ti-close"></i></a>
          </div>

          <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

              <ul class="navbar-nav float-start me-auto">
                  <li class="nav-item d-none d-lg-block"><a class="nav-link sidebartoggler waves-effect waves-light"
                          href="javascript:void(0)" data-sidebartype="mini-sidebar"><i
                              class="mdi mdi-menu font-24"></i></a></li>

                  <!-- ============================================================== -->
                  <!-- Search -->
                  <!-- ============================================================== -->
                  <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark"
                          href="javascript:void(0)"><i class="ti-search"></i></a>
                      <form class="app-search position-absolute">
                          <input type="text" class="form-control" placeholder="Search &amp; enter"> <a
                              class="srh-btn"><i class="ti-close"></i></a>
                      </form>
                  </li>
              </ul>
              <!-- ============================================================== -->
              <!-- Right side toggle and nav items -->
              <!-- ============================================================== -->
              <ul class="navbar-nav float-end">

                  <!-- User profile and search -->
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#"
                          id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="{{ asset('assets/images/users/1.jpg') }}" alt="user" class="rounded-circle"
                              width="31">
                      </a>
                      <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">

                          <div class="dropdown-divider"></div>
                          <form action="{{ route('logout') }}" method="POST">
                            @csrf
                              <button class="dropdown-item text-danger"><i
                                      class="fa fa-power-off me-1 ms-1"></i> Logout</button>
                          </form>

                      </ul>
                  </li>

              </ul>
          </div>
      </nav>
  </header>
