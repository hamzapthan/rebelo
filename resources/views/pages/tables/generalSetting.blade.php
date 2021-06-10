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

<!-- <nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Tables</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data Table</li>
  </ol>
</nav> -->
<div id="message"></div>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">General Setting</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Page Name</th>
                <th>Section</th>
                <th>Status</th>
                <th>Content</th>

               </tr>
            </thead>
            <tbody>
            @foreach($generalAlls as $generalAll)
              <tr>

                <td>{{ $generalAll->pageName }}</td>
                <td>{{ $generalAll->section }}</td>
              <td>
                @if($generalAll->status == 1)
                  <div id="switch_{{ $generalAll->id }}">
                <label class="switch">
                        <input type="checkbox" checked onchange="change_status_inactive({{ $generalAll->id }})">
                        <span class="slider round"></span>
                    </label>

                @else
                    <label class="switch">
                        <input type="checkbox" onchange="change_status_active({{ $generalAll->id }})">
                        <span class="slider round"></span>
                    </label>
                @endif
            </div>
            </td>

                {{-- <td><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" >Edit</button></td> --}}
            <td><button class="btn btn-primary" onclick="DataModel({{ $generalAll->id }})">Edit</button></td>
            </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bd-example-modal-xl" id="home_slider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">

    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title" id="exampleModalLabel">Add Slider Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('admin.generalSetting.home_slider1') }}" enctype="multipart/form-data">
        @csrf
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Button</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                <td><input type="text" class="form-control" name="title"  id="title"> </td>
                <td><textarea  name="description" id="description"></textarea></td>
                <td><input class="form-control" name="image" type="file"></td>
                <td>
                    <input type="text" class="form-control" name="button_title" placeholder="Enter Button title" id="button_title"><br>
                    <input type="text" class="form-control" name="button_link" placeholder="Enter Button link" id="button_link">
                    <input type="hidden" class="form-control" name="id" id="id"  >
                </td>
                </tr>
            </tbody>
        </table>
        <!-- //First Row -->
      {{-- <div class="row">
          <div class="col-md-3">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="recipient-name" name="title[]">
          </div>
          </div>
          <div class="col-md-3">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description:</label>
            <input type="text" class="form-control" id="recipient-name" name="desc[]">
          </div>
          </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Image:</label>
                    <input type="file" class="form-control" id="recipient-name" name="">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="status" class="form-check-label">Status</label>
                    <input type="checkbox" id="status" name="status" class="form-control">
                </div>
            </div>



      </div> --}}
      </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>

      </form>
    </div>
  </div>
</div>
<script>

    function DataModel(id){
           $('#id').val(id);

        _url = '{{ route('admin.generalSetting.edit') }}';
        let _token   = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type:'GET',
            url:_url,
            data:{
            _token:_token,
            id:id
            },
            success:function(response){
             if(response){

                 $('#title').val(response.message.title);
                 $('#description').val(response.message.description);
                 $('#button_link').val(response.message.button_link);
                 $('#button_title').val(response.message.button_title);

                 $('#home_slider').modal('show');
             }
            }
        });




    }
    function change_status_inactive(id){
        let _url = '{{ route('admin.generalSetting.slider_status_inactive') }}';
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
        let _url = '{{ route('admin.generalSetting.slider_status_active') }}';
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
</script>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
