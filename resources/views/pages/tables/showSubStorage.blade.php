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
@if(isset($storagePrice))
<div class="row">


  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Storages Spaces</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>New</th>
                <th>Working</th>
                <th>Dead</th>
                <th>Prob1</th>
                <th>Prob2</th>
                <th>Prob3</th>
                <th>Prob4</th>
                <th>Prob5</th>
                <th>Edit</th>
                </tr>
            </thead>
            <tbody>
        
            @foreach($storagePrice as $storagePrices)
              <tr>
                <td>{{  $storagePrices->new }}</td>
                <td>{{  $storagePrices->working }}</td>
                <td>{{  $storagePrices->dead }}</td>
                <td>{{  $storagePrices->prob1 }}</td>
                <td>{{  $storagePrices->prob2 }}</td>
                <td>{{  $storagePrices->prob3 }}</td>
                <td>{{  $storagePrices->prob4 }}</td>
                <td>{{  $storagePrices->prob5 }}</td>
                <td> <a href="{{ route('price.edit',$storagePrices->id)   }}">Edit</a> </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
       
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
              <th>Prob6</th>
                <th>Prob7</th>
                <th>Prob8</th>
                <th>Prob9</th>
                <th>Prob10</th>
                <th>Prob11</th>
                <th>Prob12</th>

               
              </tr>
            </thead>
            <tbody>
        
            @foreach($storagePrice as $storagePrices)
              <tr>
             
                <td>{{  $storagePrices->prob6 }}</td>
                <td>{{  $storagePrices->prob7 }}</td>
                <td>{{  $storagePrices->prob8 }}</td>
                <td>{{  $storagePrices->prob8 }}</td>
                <td>{{  $storagePrices->prob10 }}</td>
                <td>{{  $storagePrices->prob11 }}</td>
                <td>{{  $storagePrices->prob12 }}</td>
                
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
<a href="{{ route('create.role')}}">
      <button type="button" class="btn btn-primary">Add New Role</button></a>

  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Storages Spaces</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Show</th>
                <th>Edit</th>
                <th>Delete</th>
               
              </tr>
            </thead>
            <tbody>
            {{  $i=1 }}
            @foreach($subStorage as $subStorages)
              <tr id="row_{{$subStorages->id}}">
                <td>{{ $i++   }}</td>
                <td>{{  $subStorages->storage }}</td>
                <td><a href="{{ route('show.storage.single',$subStorages->id)}}">Show</a></td>
                <td><a href="{{ route('edit.storage',$subStorages->id) }}">Edit</a></td>
                <td><a  href="javascript:void(0)"  data-id="{{$subStorages->id}}" onclick="deletePost(event.target)">Delete</a></td>
                

               
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

var store_id = $(event).data("id");

let _url = `/deleteStorage/${store_id}`;
let _token   = $('meta[name="csrf-token"]').attr('content');
$.ajax({

   type:'Delete',
   url:_url,
   data:{
   _token:_token
  },
  success:function(response){
     alert('Data Is deleted');
       $("#row_"+store_id).remove();
       window.location.reload();
   }
});

}
  </script>