@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Order</a></li>
    <li class="breadcrumb-item active" aria-current="page">Order Items</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Order Detail</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Order Number</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>Country</th>
                <th>Phone No</th>
                <th>Notes</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
          
              <tr>
            
              <td>{{ $orderAlls->order_number}}</td>
                <td>{{ $orderAlls->first_name}} {{$orderAlls->last_name }}  </td>
                <td>{{ $orderAlls->address}}</td>
                <td>{{ $orderAlls->city}}</td>
                <td>{{ $orderAlls->country}}</td>
                <td>{{ $orderAlls->phone_number}}</td>
                <td>{{ $orderAlls->notes}}</td>
            @if($orderAlls->status == 1)
             <td><span class="badge badge-success">Delivered</span></td>
                @elseif($orderAlls->status == 2)
                <td><span class="badge badge-danger">Canacel</span></td>
                @else
                <td><span class="badge badge-danger">Pending</span></td>
                     @endif     
              <!-- <td>  @if($orderAlls->status == 0)
                <a href="{{ route('order.deliver',$orderAlls->id)}}"> <button>Pending</button>  </a>
               @else
                <button>Delivered</button>
               
               @endif 
               </td> -->
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
        <h6 class="card-title">Order Detail</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Product Brand</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>
                <!-- <th>Options</th> -->
                <!-- <th>Phone No</th>
                <th>Notes</th> -->
              </tr>
            </thead>
            <tbody>
            <?php   $i=0; ?>
            @foreach($orderDetail as $orderDetails)
              <tr>
              <?php    $id = $orderDetails->id;  
            // //  echo  $rowCount = App\Models\OrderItem::find($id)->count();  die;
            //  echo   $statusSum = App\Models\OrderItem::find($id)->sum('status');
             

               $product = App\Models\OrderItem::find($id)->backtosubproduct;
               
                ?>
                <td>{{ $product->subName }}</td>
                <td>{{ $product->subBrnad }}</td>
              <td>{{ $orderDetails->quantity}}</td>
                <td>{{ $orderDetails->price}} {{$orderDetails->last_name }}  </td>
               <td>
             @if($orderDetails->status == 0)
                <a href="{{ route('order.deliver.item',$orderDetails->id)}}"> <button class="btn btn-primary">Pending</button>  </a>
                @elseif($orderDetails->status == 2)
                <span class="badge badge-danger">Cancel</span>
                 @else
                 <button class="btn btn-primary">Deliver</button>
                   
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
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush