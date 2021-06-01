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
        <h6 class="card-title">Data Table</h6>
        <p class="card-description">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>
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
              @foreach($orderAll as $orderAlls)
                           <tr>
            
                <td>{{ $i+1 }}</td>
                <td>{{ $orderAlls->order_number}}</td>
                <td>{{ $orderAlls->first_name}}  {{ $orderAlls->last_name}}</td>
                <td>{{ $orderAlls->grand_total}}</td>
                <td>{{ $orderAlls->created_at}}</td>
                <td><a href="{{ route('order.show.single',$orderAlls->id)}}">View</a> </td>
            
              </tr>
              @endforeach  
            </tbody>
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