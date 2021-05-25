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
     <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
     
       <div>
        <h6 class="card-title">Images </h6>
        </div>
        @foreach(json_decode($subProImage->subImage,true) as $images)
        <div class="table-responsive">
        
                  <img src="{{asset($images)}}" alt="image" style="border-radius: 0px; width: 175px; height: 170px;" >
                  <button data-image="{{ $images }}" data-id="{{ $subProImage->id }}" onclick="deleteSubProImage(event.target)" >delete</button>
              </div>
              @endforeach 
      </div>
    </div>
  </div>
</div>
<script>
             
  

  function deleteSubProImage(event) {

var subpro_id = $(event).data("id");
var img = $(event).data("image");
image = img.replace(/^.*[\\\/]/, '');
    
let _url = `/deleteSubProImage/${subpro_id}/${image}`;
let _token   = $('meta[name="csrf-token"]').attr('content');
$.ajax({

   type:'Delete',
   url:_url,
   data:{
   _token:_token
  },
  success:function(response){
     alert('Data Is deleted');
      
   }
});

}
            </script>
 
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush