<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-right-from-bracket"></i>
                Setting
            </button>
            <div class="dropdown-menu mr-1" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('logout') }}">Logout
                </a>
                {{-- <a class="dropdown-item" href="{{ route('admin.change.password') }}">Change Password
          </a> --}}
            </div>
        </div>
        <!-- Navbar Search -->
        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->


    </ul>
</nav>
