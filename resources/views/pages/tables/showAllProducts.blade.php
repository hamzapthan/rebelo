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
              <td>
               @foreach(json_decode($subProducts->subImage,true) as $images)
               <img src="{{asset($images)}}" alt="image" style="border-radius: 0px; width: 75px; height: 70px;" >
                  @break
                 @endforeach 
                 </td>
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
@elseif(isset($subProSingle,$proName))
<div class="row">
   
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
      <a href="{{ route('subpro.edit',$subProSingle->id)}}">
      <button type="button" class="btn btn-primary">Edit</button></a>
       <div>
        <h6 class="card-title">Product Against {{$proName}} </h6>
        </div>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                
                <th>Name</th>
                <th>Brand</th>
                <th>Details</th>
                <th>Colour</th>
                <th>Status</th>
               
              </tr>
            </thead>
          
            <tbody>
            
              <tr >
             
                <td>{{ $subProSingle->subName }}</td>
                <td>{{ $subProSingle->subBrnad }}</td>
                <td>{{ $subProSingle->subDetail }}</td>
                <td>{{ $subProSingle->subColour }}</td>
               @if($subProSingle->status ==1 )
                <td><span class="badge badge-success">On</span></td>
                @else
               <td> <span class="badge badge-danger">Off</span> </td>
                @endif
                
              </tr>
             
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
                
                <th>Meta Title</th>
                <th>MetaDescription</th>
                <th>Meta Keyword</th>
               
               
              </tr>
            </thead>
          
            <tbody>
            
            <tr >
              <td>{{ $subProSingle->subMetaTitle}}</td>
              <td>{{ $subProSingle->subMetaDesc}}</td>
              <td>{{ $subProSingle->subMetaKeyword}}</td>
            </tr>
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
