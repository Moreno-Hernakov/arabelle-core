<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
    <ul class="nav flex-column">
        <li class="nav-item">
        <a class="nav-link {{Request::is('dashboard')? 'active' : ''}}" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard <span class="sr-only">(current)</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link {{Request::is('home')? 'active' : ''}}" href="home">
            <span data-feather="file"></span>
            My admin
        </a>
        </li>
        
        
    </ul>

    
    </div>
</nav>
