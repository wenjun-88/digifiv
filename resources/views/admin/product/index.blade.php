@extends('admin.layouts.layout')

@section('title', 'Product List')

@section('page_title', 'Product List')

@section('breadcrumb', 'Product List')
@php($useDataTable = true)

@php($routeData = [
])

@push('styles')

@endpush


@section('content')
  <div class="card">
    <div class="card-header">
      <div class="float-right">

        <a class="btn btn-sm btn-secondary" href="{{ route('admin.product.create') }}"><i
            class="fa fa-plus fa-fw"></i> Add</a>

        <a class="btn btn-sm btn-secondary" id="refresh" href="#"><i
            class="fa fa-fw fa-sync-alt"></i> Refresh</a>
      </div>

      <div class="clearfix"></div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-responsive">
        <table id="table" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Name</th>
            <th>Stock</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
          <tr>
            <th>Name</th>
            <th>Stock</th>
            <th>Action</th>
          </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <!-- /.card-body -->
  </div>

@endsection


@push('scripts')

  <script>
    var table;
    $(function () {
      table = $('#table').dataTable({
        processing: true,
        serverSide: true,
        select: true,
        ajax: {
          url: "{{ route('admin.product.listing', $routeData) }}",
          type: "POST",
          data: (d) => {
            return {
              ...d,
              _token: "{{ csrf_token() }}",   //pass the CSRF_TOKEN()
            };
          },
        },
        columns: [{
          title: "{{ __('Name') }}",
          data: "name",
          render: function (name, type, row) {
            return name + (row.deleted_at ? " (Deleted)" : "");
          }
        }, {
          title: "{{ __('Stock') }}",
          data: "stock",
          render: function (stock, type, row) {
            return stock == null ? "0" : stock;
          }
        }, {
          orderable: false,
          className: "table-action-container",
          data: null,
          render: function (data, type, row) {
            const buttons = [];

            const editUrl = route('admin.product.edit', { product: row });
            const editButton = Utils.createEditButton(editUrl);
            buttons.push(editButton);

            let deleteButton;
            if (row.deleted_at) {
                deleteButton = `<button class="btn btn-sm btn-danger" type="button" onclick="deleteId('${row.id}', true)">
                <i class="fa fa-fw fa-trash-alt"></i><span class="d-none d-md-inline-block">Force Delete</span>
                </button>`;
            } else {
                deleteButton = `<button class="btn btn-sm btn-danger" type="button" onclick="deleteId('${row.id}', false)">
                <i class="fa fa-fw fa-trash-alt"></i><span class="d-none d-md-inline-block">Delete</span>
                </button>`;
            }
            buttons.push(deleteButton);


            return `<div class=''>${buttons.join('')}</div>`;
          },
        }],
      });
    });

    function deleteId(id, force) {
        swal.fire({
        title: 'Are you sure?',
        text: 'You won\'t be able to revert this!',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonColor: '#3085d6',
        confirmButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((response) => {
        if (!response.dismiss) {
          return axios.post(("{{ route('admin.product.destroy', ['product' => '_']) }}").replace("_", `${id}`), {
            _method: "DELETE",
            force: force ? 1 : 0,
            _token: "{{ csrf_token() }}"   //pass the CSRF_TOKEN()
          }).then((response) => {
            var table = $('#table').DataTable();
            table.draw();
            swal.fire(
              'Deleted!',
              'Record has been deleted.',
              'success'
            )
          }).catch((err) => {
            swal.fire(
              'Aw!',
              err + 'Unexpected error occurred',
              'error'
            )
          });
        }
      });
    }


    $("#refresh").click(function () {
      const table = $('#table').DataTable();
      table.draw();
    });


  </script>

@endpush
