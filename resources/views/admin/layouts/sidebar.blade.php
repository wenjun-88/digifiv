<?php
use Illuminate\Support\Arr;use Illuminate\Support\Facades\Auth;
use App\Models\Resource;

$authUser = Auth::user();

$path = 'images/Main_User.svg';
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('admin.index') }}" class="brand-link">
    <img src="{{ asset('images/AdminLTELogo.png') }}" alt="Logo"
         class="brand-image elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset($path) }}" class="img-circle elevation-2"
             alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ $authUser->name ?? '' }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('admin.index') }}" class="nav-link {{ activeRoute('admin.index', true) }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <li class="nav-item">
        <a href="{{ route('admin.product.index') }}" class="nav-link {{ activeRoute('admin.product', true) }}">
            <i class="nav-icon fas fa-boxes"></i>
            <p>
                Product List
            </p>
        </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
