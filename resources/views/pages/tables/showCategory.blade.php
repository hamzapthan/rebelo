@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
      </ol>
</nav>
<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
    </style>
 <div id="message"></div>
<div class="row">
@can('category-create')
     <a href="{{ route('create.cat')}}">
      <button type="button" class="btn btn-primary ml-3 mb-3">Add New Category</button></a>
      @endcan

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

                <th>Name</th>
                <th>Detail</th>
                <th>Image</th>
                <th>Products</th>
                <th>Status</th>
                @can('category-edit')
                <th>Options</th>
                @endcan

              </tr>
            </thead>
            <tbody>

             @foreach($category as $categories)

              <tr id="row_{{$categories->id}}">

                <td>{{ $categories->catName}}</td>
                <td>{{ $categories->catDetail}}</td>
                <td><img src="{{ asset($categories->image) }}" style="height:60px; width:80px;border-radius:0"> </td>
                <td><a href="{{route('show.catPro',$categories->id) }}">Products</a> <?php  echo count($categories->catproducts) ?></td>
                <td>
                @if($categories->status == 1 )
                <div id="switch_{{ $categories->id }}">
                <label class="switch"><input type="checkbox" checked onchange="change_status_inactive({{$categories->id}})"><span class="slider round"></span></label>
                @else
               <label class="switch"><input type="checkbox"  onchange="change_status_active({{$categories->id}})"><span class="slider round"></span></label>
            </div>

            </td>
                @endif
  @can('category-edit')
                <td><div class="btn-group">
 <a href="{{ route('cat.edit',$categories->id) }}"> <button type="button" class="btn btn-primary">Edit</button></a>

  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>

  <div class="dropdown-menu">
     @can('category-delete')
    <a class="dropdown-item" href="javascript:void(0)"  data-id="{{$categories->id}}" onclick="deletePost(event.target)">Delete</a>
    @endcan
</div></td>
@endcan


              </tr>
              @endforeach
            </tbody>
  <script>
   function change_status_inactive(id){

        let _url = '{{ route('cat.silent') }}';
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:'get',
            url:_url,
            data:{
            _token:_token,
            id: id
            },
            success:function(response){
                var sts = "switch_"+id;
                $('#'+sts).html(' <label class="switch"><input type="checkbox"  onchange="change_status_active('+id+')"><span class="slider round"></span></label>')
                $('#message').html('<div class="alert alert-success">'+response.message+'</div>');
                setInterval(function(){
                    $('#message').html('');

                }, 2000);
            }
        });
    }
  function change_status_active(id){

let _token   = $('meta[name="csrf-token"]').attr('content');
    let _url = '{{ route('cat.silent.on') }}';

     $.ajax({
       url: _url,
      type: 'Get',
      data:{
     _token:_token,
     id:id
      },
    success: function(response) {
        var sts = "switch_"+id;
                $('#'+sts).html(' <label class="switch"><input type="checkbox" checked  onchange="change_status_inactive('+id+')"><span class="slider round"></span></label>')
                $('#message').html('<div class="alert alert-success">'+response.message+'</div>');
                setInterval(function(){
                    $('#message').html('');

                }, 2000);
       }
     });
  }

  function deletePost(event) {

var cat_id = $(event).data("id");
  let _url = '{{ route('delete.cat')}}'

let _token   = $('meta[name="csrf-token"]').attr('content');
$.ajax({
type:'GET',
   url:_url,
   data:{
   _token:_token,
   id:cat_id
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
