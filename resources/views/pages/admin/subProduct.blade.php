@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />

@endpush

@section('content')
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

<nav class="page-breadcrumb">
  <ol class="breadcrumb">
  </ol>
</nav>
<div id="message"></div>
@can('subCat-create')
     <a href="{{ route('create.pro')}}">
      <button type="button" class="btn btn-primary ml-3 mb-3">Add New Sub Category</button></a>
      @endcan
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Sub Category</h6>
        <div class="table-responsive">
        <table id="sub_category" class="table ">
        <thead>
              <tr>
               <th>Name</th>
               <th>Brand</th>
               <th>Category</th>
               <th>Product</th>
               <th>Status</th>
              @can('subCat-edit')
               <th>Options</th>
               @endcan
              </tr>
            </thead>
            <tbody>
             </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="confirmModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Confirmation</h2>
            </div>
            <div class="modal-body">
                <h4 align="center" style="margin:0;">Are you sure you want to remove this data?</h4>
            </div>
            <div class="modal-footer">
             <button type="button" name="ok_button" id="ok_button" class="btn btn-danger">OK</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
<script>
$(document).ready(function(){

 $('#sub_category').DataTable({
  processing: true,
  serverSide: true,
  ajax: {
   url: "{{ route('show.pro.all') }}",
  },
  columns: [

   {
    data: 'action1',
    name: 'action1'
   },
   {
    data: 'action2',
    name: 'action2'
   },
   {
    data: 'action3',
    name: 'action3',
    orderable: true
   },
   {
    data: 'action4',
    name: 'action4',
    orderable: true
   },
   {
    data: 'action5',
    name: 'action5',
    orderable: true
   },
   @can('subCat-edit')
   {
    data: 'action6',
    name: 'action6',
    orderable: true
   }
   @endcan



  ]
 });



//delete method
// var user_id;
// $(document).on('click', '.delete', function(){
//  id = $(this).attr('id');
//  $('#confirmModal').modal('show');
// });


// $('#ok_button').click(function(){
//   $.ajax({
//    url:"delete/user/"+user_id,
//    beforeSend:function(){
//     $('#ok_button').text('Deleting...');
//    },
//    success:function(data)
//    {
//     setTimeout(function(){
//      $('#confirmModal').modal('hide');
//      $('#user_table').DataTable().ajax.reload();
//      alert('Data Deleted');
//     }, 2000);
//    }
//   })
//  });
});

function change_status_active(id){
        let _url = '{{ route('pro.status.on') }}';
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
                $('#'+sts).html(' <label class="switch"><input type="checkbox" checked onchange="change_status_inactive('+id+')"><span class="slider round"></span></label>')
                $('#message').html('<div class="alert alert-success">'+response.message+'</div>');
                setInterval(function(){
                    $('#message').html('');
                }, 2000);
            }
        });
    }

    function change_status_inactive(id){
        let _url = '{{ route('pro.status.silent') }}';
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

   function delete_pro(id){


  let _token   = $('meta[name="csrf-token"]').attr('content');
  let _url = '{{ route('delete.pro') }}';
$.ajax({
   type:'GET',
   url:_url,
   data:{
   _token:_token,
   id:id
  },
  success:function(response){
    $('#delete_row').closest("tr").remove();


   }
});
   }

 </script>

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
