<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Fitness Euphoria</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link  @if (Route::is('admin.dashboard')) active @endif">
                        <i class="fas fa-house-user"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category') }}"
                        class="nav-link  @if (Route::is('admin.category', 'admin.category.create', 'admin.category.edit')) active @endif">
                        <i class="fas fa-house-user"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.blog') }}"
                        class="nav-link  @if (Route::is('admin.blog', 'admin.blog.create', 'admin.blog.edit')) active @endif">
                        <i class="fas fa-house-user"></i>
                        <p>
                            Blogs
                        </p>
                    </a>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('admin.products') }}"
                        class="nav-link  @if (Route::is('admin.products', 'admin.products.create', 'admin.products.edit')) active @endif">
                        <i class="fas fa-house-user"></i>
                        <p>
                            Products
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.trainer') }}"
                        class="nav-link  @if (Route::is('admin.trainer', 'admin.trainer.create', 'admin.trainer.edit')) active @endif">
                        <i class="fas fa-house-user"></i>
                        <p>
                            Trainers
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.class') }}"
                        class="nav-link  @if (Route::is('admin.class', 'admin.class.create', 'admin.class.edit')) active @endif">
                        <i class="fas fa-house-user"></i>
                        <p>
                            Class
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.gallery') }}"
                        class="nav-link  @if (Route::is('admin.gallery', 'admin.gallery.create', 'admin.gallery.edit')) active @endif">
                        <i class="fas fa-house-user"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.contacts') }}"
                        class="nav-link  @if (Route::is('admin.contacts')) active @endif">
                        <i class="fas fa-house-user"></i>
                        <p>
                            Contacts
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.order') }}"
                        class="nav-link  @if (Route::is('admin.order')) active @endif">
                        <i class="fas fa-house-user"></i>
                        <p>
                            Order
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
