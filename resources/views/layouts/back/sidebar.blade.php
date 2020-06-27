<aside class="main-sidebar elevation-4 sidebar-light-teal">
  <a href="{{ url('/') }}" class="brand-link navbar-teal">
    <img src="{{ asset('logo.png') }}" class="brand-image img-circle elevation-3"
         style="opacity: .8" alt="logo">
    <span class="brand-text font-weight-light">Animal Care</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img
            src="{{ \Illuminate\Support\Facades\Auth::user()->image ? asset('dist/img/'.\Illuminate\Support\Facades\Auth::user()->image) : asset('logo.png') }}"
            class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">
          <i id="online" class="fas fa-circle text-success"></i>
          {{ \Illuminate\Support\Facades\Auth::user()->name}}
        </a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
            <i class="nav-icon fas fa-home"></i>
            <p>
             Home 
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('doctor.index') }}" class="nav-link {{ request()->is('doctor') ? 'active' : '' }}">
            <i class="nav-icon fas fa-heartbeat"></i>
            <p>
             Doctor
            </p>
          </a>
        </li>
         <li class="nav-item">
          <a href="{{ route('doctor.create') }}" class="nav-link {{ request()->is('doctor/create') ? 'active' : '' }}">
            <i class="nav-icon fas fa-plus"></i>
            <p>
             Tambah Doctor
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('user.index') }}" class="nav-link {{ request()->is('user') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
             User
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('user.create') }}" class="nav-link {{ request()->is('user/create') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user-plus"></i>
            <p>
             Add Doctor
            </p>
          </a>
        </li>
        {{--  <li class="nav-item">
          <a href="{{ route('blog.index') }}" class="nav-link {{ request()->is('blog') ? 'active' : '' }}">
            <i class="nav-icon fas fa-info "></i>
            <p>
             Blog
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('blog.create') }}" class="nav-link {{ request()->is('blog/create') ? 'active' : '' }}">
            <i class="nav-icon fas fa-plus "></i>
            <p>
             Add Blog
            </p>
          </a>
        </li>  --}}
      </ul>
    </nav>
</aside>
