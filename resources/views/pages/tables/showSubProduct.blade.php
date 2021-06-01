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
     <a href="{{ route('create.subPro')}}">
      <button type="button" class="btn btn-primary">Add New Sub Products</button></a>
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
     
       <div>
        <h6 class="card-title">SuProducts </h6>
        </div>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Prodcuct</th>
                <th>Storage</th>
                <th>FullView</th>
                <th>Images</th>
                <th>Status</th>
                <th>Options</th>
              </tr>
            </thead>
            <tbody>
            <?php $i=1; ?>
             @foreach($subProduct as $subProducts) 
            
              <tr id="row_{{$subProducts->id}}">
              <td>{{ $i++ }}</td>
                <td>{{ $subProducts->subName}}</td>
                <td>{{ $subProducts->subBrnad}}</td>
              <?php   $id = $subProducts->id;
                       $productName = App\Models\SubProduct::find($id)->backproproduct;
                      
              ?>
                <td>{{   $productName->proName }}</td>
                <td><a href="{{route('subpro.storage',$subProducts->id)}}">Storage</a></td>
                
                <td><a href="{{ route('show.subPro',$subProducts->id)}}">View</a>
                </td>
               
                <td><a href="{{ route('subpro.image.id',$subProducts->id)}}">
                 @foreach(json_decode($subProducts->subImage,true) as $images)
                  <img src="{{asset($images)}}" alt="image" style="border-radius: 0px; width: 75px; height: 70px;" >
                  @break
                 @endforeach 
                 </a></td>
               <?php
                        // $cat_id = $categories->id;
                        // $catPro = App\Models\Category::find($cat_id)->catproduct;
                           ?>
                @if($subProducts->status ==1 )
                <td><span class="badge badge-success">On</span></td>
                @else
               <td> <span class="badge badge-danger">Off</span> </td>
                @endif
  
                <td><div class="btn-group">
 <a href="{{ route('subpro.edit',$subProducts->id) }}"> <button type="button" class="btn btn-primary">Edit</button></a>
  
  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  
  <div class="dropdown-menu">
  @if($subProducts->status ==1 )
     <a href="javascript:void(0)" data-id="{{ $subProducts->id }}" onclick="statusProOff(event.target)" class="dropdown-item">Mark as 'Off'</a>
     @else
     <a href="javascript:void(0)" data-id="{{ $subProducts->id }}" onclick="statusProOn(event.target)" class="dropdown-item">Mark as 'On'</a>
     @endif
    
<a class="dropdown-item" href="javascript:void(0)"  data-id="{{$subProducts->id}}" onclick="deleteSubPro(event.target)">Delete</a>
    
</div></td>
               
                
              </tr>
              @endforeach
            </tbody>
  <script>
             function statusProOff(event) {
        var subpro_id  = $(event).data("id");
        
    let _url = `/subproStatusSilent/${subpro_id}`;
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
  function statusProOn(event) {
        var subpro_id  = $(event).data("id");
        
    let _url = `/subproStatusOn/${subpro_id}`;
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

  function deleteSubPro(event) {

var subpro_id = $(event).data("id");

let _url = `/deleteSubPro/${subpro_id}`;
let _token   = $('meta[name="csrf-token"]').attr('content');
$.ajax({

   type:'Delete',
   url:_url,
   data:{
   _token:_token
  },
  success:function(response){
     alert('Data Is deleted');
       $("#row_"+subpro_id).remove();
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