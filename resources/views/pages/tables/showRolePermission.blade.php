@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
   
  </ol>
</nav>

<div class="row">
@can('role-edit')
<a href="{{ route('edit.role',$role->id)}}">
      <button type="button" class="btn btn-primary ml-3 mb-3">Edit Role</button></a>
      @endcan
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">{{ $role->name }}</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
              
                
              </tr>
            </thead>
            <tbody>
            <?php   $i=1; ?>
            @foreach($rolePermissions as $rolePermissionss)
              <tr>
                <td>{{ $i++   }}</td>
                <td>{{  $rolePermissionss->name }}</td>
                
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