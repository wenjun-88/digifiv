@extends('admin.layouts.layout')

@section('title', 'Edit Product')

@section('page_title', 'Edit Product')

@php($routePrefix = 'admin.product')
@php($routeData = ['product' => $product])
@php($breadcrumbs[] = ['label' => 'Product', 'uri' => route('admin.product.index')])
@php($breadcrumbs[] = ['label' => $product->name, 'uri' => route('admin.product.show', ['product' => $product])])


@php($show = isset($show)? $show : 0)
@if ($show == 0)
@php($breadcrumbs[] = ['label' => 'Edit', 'uri' => route('admin.product.edit', $product)])
@endif


@push('styles')

  <style>
    img.avatar {
      width: 150px;
      height: 150px;
      object-fit: contain;
    }
    div.avatar {
      width: 150px;
      height: 150px;
      border-radius: 0.5rem;
      background: lightgray;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  </style>

@endpush


@section('content')
  <div class="card col-8">
    <form action="{{ route('admin.product.update', $product) }}" method="post" autocomplete="OFF">
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="form-row">
            <div class="col-md-8 mb-3">
                <label for="">Name</label>
                <div class="">
                <input type="text" class="form-control" name="name" value="{{ $product->name }}">
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
                <input type="number" class="form-control" name="stock" value="{{ $product->stock }}">
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
                <input type="text" class="form-control" name="description" value="{{ $product->description }}">
                </div>
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <hr>

        @if (!isset($show) || $show != 1)
          <div class="form-row">
            <button class="btn btn-primary" type="submit">Update</button>
          </div>
        @else
          <div class="form-row">
            <a href="{{ route("$routePrefix.edit", $routeData) }}" class="btn btn-primary" type="submit">Edit</a>
          </div>
        @endif
      </div>
    </form>
  </div>
@endsection


@push('scripts')

@endpush
