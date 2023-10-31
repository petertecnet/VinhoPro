
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex bg-black text-danger align-items-center">

    <div class="logo d-flex align-items-center">
    
      <a href="{{ url('/') }}" class="logo d-flex align-items-center brand-gatenex">
        <img src="{{ asset('img/gatenexlogo.png') }}" alt="Logo" class="img-fluid">
       
      </a>
      <i class="bi bi-list toggle-sidebar-btn text-danger"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        
            <form  class="search-form d-flex align-items-center" action="{{ route('search.index') }}" method="GET">
        <input type="text" name="search" id="search" placeholder="Pesquisar" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search text-danger"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search text-danger"></i>
          </a>
        </li><!-- End Search Icon-->
@guest
<li class="nav-item dropdown m-3">

    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="{{ asset('img/user.png') }}" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2 text-danger">Acesso</span>
      </a><!-- End Profile Iamge Icon -->
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
      <li class="dropdown-header text-danger">
        Jà tem conta?
        <a href="{{ route('login') }}"><span class="badge rounded-pill bg-danger p-2 ms-2">Login </span></a>
      </li>
      <li>
        <hr class="dropdown-divider text-danger">
      </li>
      <li class="dropdown-header text-danger">
        Ainda não tem conta?
        <a href="{{ route('register') }}"><span class="badge rounded-pill bg-danger p-2 ms-2">Registrar </span></a>
      </li>
      <li>
        <hr class="dropdown-divider text-danger">
      </li>
    </ul><!-- End Messages Dropdown Items -->

  </li><!-- End Messages Nav -->
@endguest

 
@auth

<li class="nav-item dropdown ">
    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell text-white "></i>
    </a><!-- End Notification Icon -->

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header text-danger">
           Você tem 
           <span class="text-danger">{{Auth::user()->interactions->where('interaction_type', 'notification')->count()}} </span>notificações
            <a href="#"><span class="badge rounded-pill bg-danger p-2 ms-2">Ver todas </span></a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li class="notification-item">
            <div id="notification-list">
                <!-- Dynamic notifications will be added here -->
            </div>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li class="dropdown-footer">
            <a href="#">Mostrar todas as notificações</a>
        </li>
    </ul><!-- End Notification Dropdown Items -->
</li><!-- End Notification Nav -->


  <li class="nav-item dropdown">

    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
      <i class="bi bi-chat-left-text"></i>
      <span class="badge bg-success badge-number">3</span>
    </a><!-- End Messages Icon -->

    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
      <li class="dropdown-header">
        You have 3 new messages
        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>

      <li class="message-item">
        <a href="#">
          <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
          <div>
            <h4>Maria Hudson</h4>
            <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
            <p>4 hrs. ago</p>
          </div>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>

      <li class="message-item">
        <a href="#">
          <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
          <div>
            <h4>Anna Nelson</h4>
            <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
            <p>6 hrs. ago</p>
          </div>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>

      <li class="message-item">
        <a href="#">
          <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
          <div>
            <h4>David Muldon</h4>
            <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
            <p>8 hrs. ago</p>
          </div>
        </a>
      </li>
      <li>
        <hr class="dropdown-divider">
      </li>

      <li class="dropdown-footer">
        <a href="#">Show all messages</a>
      </li>

    </ul><!-- End Messages Dropdown Items -->

  </li><!-- End Messages Nav -->
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset(auth()->user()->avatar) }}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2 text-white">{{Auth::user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{Auth::user()->name}}</h6>
              <span>{{ Auth::user()->profile->name ?? 'Participante' }}</span>

            </li>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('user.show', Auth::user()->id) }}">
                <i class="bi bi-person"></i>
                <span>Meu perfil</span>
              </a>
            </li>
            
            <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('item.index') }}">
                  <i class="bi bi-diagram-2"></i>
                  <span>Meus itens</span>
                </a>
              </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"  onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sair</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->
@endauth
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar" style="background-image: url({{ asset('img/background.png')}})">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('home') }}">
              <i class="bi bi-house"></i>
              <span>Inicio</span>
            </a>
          </li>
          <li class="nav-item">
              <a class="nav-link collapsed" href="{{ route('event.index') }}">
                <i class="bi bi-alarm"></i>
                <span>Eventos</span>
              </a>
            </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('production.index') }}">
              <i class="bi bi-gem"></i>
              <span>Produções</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('blog.index') }}">
              <i class="bi bi-newspaper"></i>
              <span>Ta sabendo?</span>
            </a>
          </li>
        
          @auth
          @if(Auth::user()->profile != null && Auth::user()->profile->name != null)
   
          @if(Auth::user()->profile->name === "Produtor" || Auth::user()->profile->name === "Administrador")
          
      <li class="nav-heading text-white">Administrativo</li>
      <li class="nav-item br-2 text-white">
        <a class="nav-link collapsed bg-black text-white br-1 collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" aria-expanded="true">
          <i class="bi bi-menu-button-wide text-white"></i><span class="text-white">Produtor</span><i class="bi bi-chevron-down ms-auto text-white"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse show text-white" data-bs-parent="#sidebar-nav" aria-expanded="true">



          <li>
            <a href="components-alerts.html"  id="startScanner" data-bs-toggle="modal" data-bs-target="#qrScannerModal">
              <i class="bi bi-circle"></i><span>Scan</span>
            </a>
          </li>
          <li>
            <a href="{{ route('production.create') }}">
              <i class="bi bi-circle"></i><span>Nova produção</span>
            </a>
          </li>
          <li>
            <a href="{{ route('event.new') }}">
              <i class="bi bi-circle"></i><span>Novo evento</span>
            </a>
          </li>
          <li>
            <a href="{{ route('event.my') }}">
              <i class="bi bi-circle"></i><span>Meus eventos</span>
            </a>
          </li>
          <li>
            <a href="{{ route('production.my') }}">
              <i class="bi bi-circle"></i><span>Minhas produções</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
@endif
@if(Auth::user()->profile->name === "Administrador")
      <li class="nav-item">
        <a class="nav-link collapsed bg-danger text-white" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-command text-white"></i><span>Administração</span><i class="bi bi-chevron-down ms-auto text-white"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('blog.index') }}">
              <i class="bi bi-circle"></i><span>Blogs</span>
            </a>
          </li>
          <li>
            <a href="{{ route('user.index') }}">
              <i class="bi bi-circle"></i><span>Usuários</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
@endif
@endif
@endauth


    </ul>

  </aside><!-- End Sidebar-->