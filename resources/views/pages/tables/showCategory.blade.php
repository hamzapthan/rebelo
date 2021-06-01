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
     <a href="{{ route('create.cat')}}">
      <button type="button" class="btn btn-primary ml-3 mb-3">Add New Category</button></a>
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
     
       <div>
        <h6 class="card-title">Category </h6>
        </div>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Detail</th>
                <th>Image</th>
                <th>Products</th>
                <th>Status</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=1; ?>
             @foreach($category as $categories) 
            
              <tr id="row_{{$categories->id}}">
              <td>{{ $i++ }}</td>
                <td>{{ $categories->catName}}</td>
                <td>{{ $categories->catDetail}}</td>
                <td><img src="{{ asset($categories->image) }}" style="height:60px; width:80px;border-radius:0"> </td>
               <?php
                        $cat_id = $categories->id;
                        $catPro = App\Models\Category::find($cat_id)->catproduct;
                           ?>
                <td><a href="{{route('show.catPro',$cat_id) }}">Products</a><?php  echo count($catPro) ?></td>
                @if($categories->status ==1 )
                <td><span class="badge badge-success">On</span></td>
                @else
               <td> <span class="badge badge-danger">Off</span> </td>
                @endif
  
                <td><div class="btn-group">
 <a href="{{ route('cat.edit',$categories->id) }}"> <button type="button" class="btn btn-primary">Edit</button></a>
  
  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  
  <div class="dropdown-menu">
  @if($categories->status ==1 )
     <a href="javascript:void(0)" data-id="{{ $categories->id }}" onclick="statusProOff(event.target)" class="dropdown-item">Mark as 'Off'</a>
     @else
     <a href="javascript:void(0)" data-id="{{ $categories->id }}" onclick="statusProOn(event.target)" class="dropdown-item">Mark as 'On'</a>
     @endif
    
<a class="dropdown-item" href="javascript:void(0)"  data-id="{{$categories->id}}" onclick="deletePost(event.target)">Delete</a>
    
</div></td>
               
                
              </tr>
              @endforeach
            </tbody>
  <script>
             function statusProOff(event) {
        var cat_id  = $(event).data("id");
        
    let _url = `/catStatusSilent/${cat_id}`;
     $.ajax({
       url: _url,
      type: "Get",
    success: function(response) {
        if(response) {
          alert("data is modifiertwetweed");
          $("#row_"+cat_id).remove();
          window.location.reload();
          }
       }
     });
  }
  function statusProOn(event) {
        var cat_id  = $(event).data("id");
        
    let _url = `/catStatusOn/${cat_id}`;
     $.ajax({
       url: _url,
      type: "Get",
    success: function(response) {
        if(response) {
          alert("data is modifiertwetweed");
          window.location.reload();
   
          }
       }
     });
  }

  function deletePost(event) {

var cat_id = $(event).data("id");

let _url = `/deleteCat/${cat_id}`;
let _token   = $('meta[name="csrf-token"]').attr('content');
$.ajax({

   type:'Delete',
   url:_url,
   data:{
   _token:_token
  },
  success:function(response){
     alert('Data Is deleted');
       $("#row_"+cat_id).remove();
   }
});

}
            </script>
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