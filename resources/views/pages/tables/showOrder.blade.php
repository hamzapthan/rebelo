@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
  </ol>
</nav>
@if(isset($cancelOrder))
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Order Number</th>
                <th>Name</th>
                <th>Total</th>
                <th>Date</th>
                <th>Order Details</th>
               
              </tr>
            </thead>
            <tbody>
              
                <?php $i=0; ?>
              @foreach($cancelOrder as $orderAlls)
                           <tr>
            
                <td>{{ $i+1 }}</td>
                <td>{{ $orderAlls->order_number}}</td>
                <td>{{ $orderAlls->first_name}}  {{ $orderAlls->last_name}}</td>
                <td>{{ $orderAlls->grand_total}}</td>
                <td>{{ $orderAlls->created_at}}</td>
                <td><a href="{{ route('order.show.singles',$orderAlls->id)}}">View</a> </td>
            
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
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Order Number</th>
                <th>Name</th>
                <th>Total</th>
                <th>Date</th>
                <th>Order Details</th>
                @foreach($orderAll as $orderAlls)
                @if($orderAlls->status == 0 )
               
                <th>Cancel Order</th>

                @endif
                @break
                @endforeach
              </tr>
            </thead>
            <tbody>
              
                <?php $i=0; ?>
              @foreach($orderAll as $orderAlls)
                           <tr>
            
                <td>{{ $i+1 }}</td>
                <td>{{ $orderAlls->order_number}}</td>
                <td>{{ $orderAlls->first_name}}  {{ $orderAlls->last_name}}</td>
                <td>{{ $orderAlls->grand_total}}</td>
                <td>{{ $orderAlls->created_at}}</td>
                <td><a href="{{ route('order.show.singles',$orderAlls->id)}}">View</a> </td>
           @if($orderAlls->status == 0 )
            <td> <a href="{{ route('order.status.cancel',$orderAlls->id)}}"> <button class="btn btn-danger">Cancel</button>  </a>
           @endif
               </td>
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