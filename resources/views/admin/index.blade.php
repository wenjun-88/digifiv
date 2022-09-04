@extends('admin.layouts.layout')

@section('title', 'Dashboard')

@section('page_title', 'Dashboard')

@section('breadcrumb', 'Dashboard')

@push('styles')

@endpush


@section('content')
  <div class="mx-5">
    <div class="row mb-3">
        <div class="col-12 col-sm-6 col-md-3">
          {{-- <a href="{{ route('admin.user.index') }}"> --}}
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content" style="color: #000;">
                <span class="info-box-text">Total Registered Users</span>
                <span class="info-box-number">{{ number_format($userCount) }}</span>
                <div>
                  <div class="float-right">
                    <i class="fas fa-arrow-circle-right"></i>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          {{-- </a> --}}
        </div>


    </div>





  </div>
@endsection

@push('scripts')

@endpush
