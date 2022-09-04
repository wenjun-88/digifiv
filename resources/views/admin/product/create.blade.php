@extends('admin.layouts.layout')

@section('title', 'Create Product')

@section('page_title', 'Create Product')

@section('breadcrumb', 'Create Product')

@php($breadcrumbs[] = ['label' => 'Product List', 'uri' => route('admin.product.index')])
@php($breadcrumbs[] = ['label' => 'Create Product'])

@push('styles')

@endpush


@section('content')
  <div class="card">
    <form class="needs-validation" action="{{ route('admin.product.store') }}" method="post" autocomplete="OFF">
      @csrf
      <div class="card-body">

        <div class="form-row">
          <div class="col-md-8 mb-3">
            <label for="">Name</label>
            <div class="">
              <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            @error('name')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-8 mb-3">
            <label for="">Stock</label>
            <div class="">
              <input type="number" class="form-control" name="stock" value="{{ old('stock') }}">
            </div>
            @error('stock')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-8 mb-3">
            <label for="">Description</label>
            <div class="">
              <input type="text" class="form-control" name="description" value="{{ old('description') }}">
            </div>
            @error('description')
            <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>



        <hr>

        <div class="form-row">
          <button class="btn btn-primary">Create</button>
        </div>
      </div>
    </form>
  </div>
@endsection


@push('scripts')


@endpush
