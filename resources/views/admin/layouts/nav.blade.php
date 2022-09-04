@php
  use App\Models\Resource;
  $path = 'images/Main_User.svg';
@endphp

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown user user-menu">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <img src="{{ asset($path) }}" class="user-image" alt="User Image">
        <span class="hidden-xs">{{ Auth::user()->name ?? '' }}</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- User image -->
        <li class="user-header">
          <img src="{{ asset($path) }}" class="img-circle" alt="User Image">

          <p>
            {{ Auth::user()->name ?? '' }}
          </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
          <div class="float-right">
            <a href="#" onclick="event.preventDefault(); document.getElementById('admin-logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
            <form id="admin-logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="admin" value="admin">
            </form>
          </div>
        </li>
      </ul>
    </li>
  </ul>
</nav>
