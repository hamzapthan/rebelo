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
@if(isset($catProduct,$catName))
<div class="row">
   
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
     
       <div>
        <h6 class="card-title">Product Against {{ $catName->catName  }} </h6>
        </div>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Status</th>
               
              </tr>
            </thead>
          
            <tbody>
            <?php $i=1; ?>
             @foreach($catProduct as $catProducts) 
            
              <tr >
              <td>{{ $i++ }}</td>
                <td>{{ $catProducts->proName}}</td>
                <td>{{ $catProducts->proBrnad}}</td>
               @if($catProducts->status ==1 )
                <td><span class="badge badge-success">On</span></td>
                @else
               <td> <span class="badge badge-danger">Off</span> </td>
                @endif
               
               
                
              </tr>
              @endforeach
            </tbody>
    </table>
        </div>
      </div>
    </div>
  </div>
</div>
@elseif(isset($subProduct,$proName))
<div class="row">
   
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
     
       <div>
        <h6 class="card-title">Product Against {{ $proName->proName  }} </h6>
        </div>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Image</th>
                <th>Colour</th>
                <th>Status</th>
               
              </tr>
            </thead>
          
            <tbody>
            <?php $i=1; ?>
             @foreach($subProduct as $subProducts) 
            
              <tr >
              <td>{{ $i++ }}</td>
                <td>{{ $subProducts->subName}}</td>
                <td>{{ $subProducts->subBrnad}}</td>
                <td>{{ $subProducts->subImage}}</td>
                <td>{{ $subProducts->subColour}}</td>
               @if($subProducts->status ==1 )
                <td><span class="badge badge-success">On</span></td>
                @else
               <td> <span class="badge badge-danger">Off</span> </td>
                @endif
               
               
                
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