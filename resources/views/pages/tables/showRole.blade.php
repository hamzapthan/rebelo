@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Tables</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Table</li>
  </ol>
</nav>

<div class="row">
<a href="{{ route('create.role')}}">
      <button type="button" class="btn btn-primary">Add New Role</button></a>

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Roles</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Permissions</th>
                <th>Edit</th>
                <th>Delete</th>
               
              </tr>
            </thead>
            <tbody>
            {{  $i=1 }}
            @foreach($role as $roles)
              <tr>
                <td>{{ $i++   }}</td>
                <td>{{  $roles->name }}</td>
                <td><a href="{{ route('show.role.per',$roles->id)}}">Permissions</a></td>
                <td><a href="{{ route('edit.role',$roles->id) }}">Edit</a></td>
                <td><a href=" {{ route('delete.role',$roles->id) }}">Delete</a></td>
               
               
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush