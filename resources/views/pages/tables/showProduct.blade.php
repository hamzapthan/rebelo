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
@can('product-create')
     <a href="{{ route('create.pro')}}">
      <button type="button" class="btn btn-primary ml-3 mb-3">Add New Sub Category</button></a>
      @endcan
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
     
       <div>
        <h6 class="card-title">Sub Categories </h6>
        </div>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Products</th>
                <th>Status</th>
                @can('product-edit')
                  <th>Options</th>
              @endcan
              </tr>
            </thead>
            <tbody>
            <?php $i=1; ?>
             @foreach($product as $products) 
            
              <tr id="row_{{$products->id}}">
              <td>{{ $i++ }}</td>
                <td>{{ $products->proName}}</td>
                <td>{{ $products->proBrnad}}</td>
                <?php   $id = $products->id;    
                       $catName =  App\Models\Product::find($id)->backcatproduct;
                       
                     
                  ?>

                <td>{{ $catName->catName}}</td>
                  
                <?php
                        $pro_id = $products->id;
                         $catPro = App\Models\Product::find($pro_id)->proproduct;
                          ?>
                <td><a href="{{ route('pro.subpro',$products->id)}}">Product</a>(<?php  echo count($catPro);  ?>)</td>
                <td>
                <div id="status_div_{{$products->id}}">
                 @if($products->status ==1 )
                <span class="badge badge-success">On</span>
                @else
                <span class="badge badge-danger">Off</span> 
                @endif
                </div>
                </td>
                @can('product-edit')
                <td>
               
                <div class="btn-group">
 <a href="{{ route('pro.edit',$products->id) }}"> <button type="button" class="btn btn-primary">Edit</button></a>
  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu">
  @if($products->status ==1 )
     <a href="javascript:void(0)" data-id="{{ $products->id }}" onclick="statusProOff(event.target)" class="dropdown-item">Mark as 'Off'</a>
     @else
     <a href="javascript:void(0)" data-id="{{ $products->id }}" onclick="statusProOn(event.target)" class="dropdown-item">Mark as 'On'</a>
     @endif
     @can('product-delete')
<a href="javascript:void(0)"  data-id="{{$products->id}}" onclick="deletePost(event.target)" class="dropdown-item">Delete</a>
    @endcan
</div></td>
@endcan
               
                
              </tr>
              @endforeach
            </tbody>
  <script>
             function statusProOff(event) {
        var pro_id  = $(event).data("id");
        console.log(pro_id)
    let _url = `/proStatusSilent/${pro_id}`;
     $.ajax({
       url: _url,
      type: "Get",
    success: function(response) {
        if(response) {
          alert("data is modifiertwetweed");
          var sts = "status_div_"+pro_id; 
           $('#'+sts).html("<span class='badge badge-danger'>Off</span>");
          }
       }
     });
  }
 
  function statusProOn(event) {
        var pro_id  = $(event).data("id");
        
    let _url = `/proStatusOn/${pro_id}`;
     $.ajax({
       url: _url,
      type: "Get",
    success: function(response) {
        if(response) {
          alert("data is modifiertwetweed");
          // window.location.reload();
   
          }
       }
     });
  }

  function deletePost(event) {

var pro_id = $(event).data("id");

let _url = `/deletePro/${pro_id}`;
let _token   = $('meta[name="csrf-token"]').attr('content');
$.ajax({

   type:'Delete',
   url:_url,
   data:{
   _token:_token
  },
  success:function(response){
     alert('Data Is deleted');
    //  window.location.reload();
    

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