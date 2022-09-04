<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name') }} | @yield('title', 'Dashboard')</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
  @if (isset($useDate) && $useDate)
  <!-- DateRangePicker -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}"/>
  @endif
  @if (isset($useDataTable) && $useDataTable)
    <link rel="stylesheet" href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datatables-plugins/responsive/css/responsive.bootstrap4.min.css') }}">
  @endif

  {{-- <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}"> --}}


  @if (isset($useSelect2) && $useSelect2)
    <link href="{{ asset('vendor/select2/css/select2.min.css') }}" rel="stylesheet" />
  @endif

  @stack('styles')

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">

  <!-- Navbar -->
@include('admin.layouts.nav')

<!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('admin.layouts.sidebar')


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">@yield('page_title', 'Dashboard')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
              @isset($breadcrumbs)
                @foreach ($breadcrumbs as $index => $breadcrumb)
                  @php($active = $index == (count($breadcrumbs) - 1))
                  <li class="breadcrumb-item{{ $active? ' active' : '' }}">
                    @if ($active)
                      {{ $breadcrumb['label'] }}
                    @else
                      <a href="{{ $breadcrumb['uri'] }}">
                        {{ $breadcrumb['label'] }}
                      </a>
                    @endif
                  </li>
                @endforeach
              @else
                <li class="breadcrumb-item active">@yield('breadcrumb', 'Dashboard')</li>
              @endisset
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid" id="app">
        @yield('content')
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('admin.layouts.footer')

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE -->
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
<!-- moment -->
<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
@if (isset($useDate) && $useDate)
  <!-- DateRangePicker -->
  <script type="text/javascript" src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
@endif
@if (isset($useDataTable) && $useDataTable)
  <script src="{{ asset('js/utils.js') }}"></script>
  <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables-plugins/responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables-plugins/responsive/js/responsive.bootstrap4.min.js') }}"></script>
@endif
@if (isset($useSelect2) && $useSelect2)
  <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
@endif

@routes

<script src="{{ mix('js/app.js') }}"></script>

<!-- SweetAlert2 -->
<script src="{{ asset('js/sweetalert2@11.js') }}"></script>
@include('sweetalert::alert')

@stack('scripts')



</body>
</html>
