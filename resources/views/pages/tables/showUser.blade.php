@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
   </ol>
</nav>
@if(isset($frontendUser))
<div class="row">
        <a href="{{ route('create.user')}}">
      <button type="button" class="btn btn-primary ml-3 mb-3">Add New User</button></a>
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Users</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>email</th>
                <th>Position</th>
               
                <th>Options</th>
                <th>Roles</th>
              </tr>
            </thead>
            <tbody>
            
              @foreach($frontendUser as $users)
              <tr id="row_{{ $users->id}}">
                <td>{{ $users->name}}</td>
                <td>{{ $users->email}}</td>
                <td>FrontEnd</td>
                
                 
                <td><div class="btn-group">
 <a href=""> <button type="button" class="btn btn-primary">Orders</button></a>
  
  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  
  <div class="dropdown-menu">
   
<a class="dropdown-item" href="javascript:void(0)"  data-id="{{$users->id}}" onclick="deletePost(event.target)">Delete</a>
    
</div></td>
               
               

               
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@else

<div class="row">
<a href="{{ route('create.user')}}">
      <button type="button" class="btn btn-primary ml-3 mb-3">Add New User</button></a>
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Users</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>email</th>
                <th>Position</th>
               @can('user-edit')
                <th>Options</th>
              @endcan
              
              </tr>
            </thead>
            <tbody>
            
              @foreach($userAll as $users)
              <tr id="row_{{ $users->id}}">
                <td>{{ $users->name}}</td>
                <td>{{ $users->email}}</td>
               
                
                @can('user-edit') 
                <td><div class="btn-group">
 <a href="{{ route('user.edit',$users->id) }}"> <button type="button" class="btn btn-primary">Edit</button></a>
  
  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  
  <div class="dropdown-menu">
   
<a class="dropdown-item" href="javascript:void(0)"  data-id="{{$users->id}}" onclick="deletePost(event.target)">Delete</a>
    
</div></td>
        @endcan       
               
<td><span class="badge badge-success">
                <?php $datas   =   App\Models\User::datainsert($users->id);
                   foreach($datas as $name){
                      echo $name->name;
}

                ?>
                
                </span></td>
               
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
<script>
function deletePost(event) {

var user_id = $(event).data("id");

let _url = `/deleteUser/${user_id}`;
let _token   = $('meta[name="csrf-token"]').attr('content');
$.ajax({

   type:'Delete',
   url:_url,
   data:{
   _token:_token
  },
  success:function(response){
     alert('Data Is deleted');
       $("#row_"+user_id).remove();
   }
});

}</script>