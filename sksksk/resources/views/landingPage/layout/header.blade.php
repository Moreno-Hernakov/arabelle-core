 <!-- NAVBAR -->
 <nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0 pl-5 font-weight-bold" href="/"><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp; arabelle</a>
      <ul class="navbar-nav px-5  py-3 ml-auto">
        @auth
        <li class="nav-item dropdown text-nowrap">
          <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Selamat Datang {{auth()->user()->username}}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/dashboard">Dashboard</a>
            <div class="dropdown-divider"></div>
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
                <!-- <a class="nav-link" href="#">Sign out</a> -->
            </form>
          </div>
        </li>
        @else
        <li class="nav-item">
          <a href="/login" style="text-decoration:none;" class="login  text-light"><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Login</a>          
        </li>
        @endauth     
      </ul>
    </nav>