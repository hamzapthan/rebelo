@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    
  </ol>
</nav>
<?php 

if(isset($sellingData)){ ?>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Product to Sell</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
              <th>Storage</th>
                <th>First Name</th>
                <th>Last Name</th>
                
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>PostalCode </th>
                <th>City</th>
               
              </tr>
            </thead>
            <tbody>
              <tr>
              <td>{{$sellingData->sellStorage }}</td>
                
              <td>{{ $sellingData->first_name}} </td>
                <td>{{ $sellingData->last_name}} </td>
                <td>{{$sellingData->email }}</td>
                
                <td>{{ $sellingData->mobile}}</td>
                <td>{{ $sellingData->address}}</td>
                <td>{{ $sellingData->postCode}}</td>
                <td>{{ $sellingData->state}}</td>

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
        <h6 class="card-title">Product Details</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Product Brand</th>
                <th>Detail</th>
                <th>Product Colour</th>
                <th>Image</th>
                <th>View</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $subprodata->subName}} </td>
                <td>{{ $subprodata->subBrnad}} </td>
                <td>{{$subprodata->subDetail }}</td>
                <td>{{ $subprodata->subColour}}</td>
                @foreach(json_decode($subprodata->subImage,true) as $images)
                <td><img src="{{ asset($images) }}" alt="image" style="border-radius: 0px; width: 75px; height: 70px;" >
                  @break
                 @endforeach</td>
                 <td><a href="{{ route('show.subPro',$subprodata->id)}}">View</a>
                 </td>
               </tr>
             </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@isset($sellpaypal)
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Payment Details</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Paypal Id</th>
                <th>Paypal Status</th>
               
                </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($sellpaypal as $sellpaypals)
                <td>{{ $sellpaypals->paypalid}} </td>
                <td>{{ $sellpaypals->status}} </td>
               @endforeach
               </tr>
             </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endisset
@isset($sellbank)
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Payment  Details</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Bank Name</th>
                <th>Accouhnt Name</th>
                <th>B2B</th>
                <th>Account Number</th>
               
                </tr>
            </thead>
            <tbody>
            <tr>
               @foreach($sellbank as $sellbanks)
                <td>{{ $sellbanks->bankname}} </td>
                <td>{{ $sellbanks->accountname}} </td>
                <td>{{$sellbanks->b2b }}</td>
                <td>{{ $sellbanks->accountnumber}}</td>
               @endforeach
               </tr>
             </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endisset
@isset($sellstripe)
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Payment Details</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Stripe Id</th>
                <th>Stripe Stauts</th>
               
                </tr>
            </thead>
            <tbody>
            <tr>
            @foreach($sellstripe as $sellstripes)
                <td>{{ $sellstripes->sripeid}} </td>
                <td>{{ $sellstripes->status}} </td>
               @endforeach
                 </td>
               </tr>
             </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endisset
<?php }else{ ?>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Data Table</h6>
        <div class="table-responsive">
          <table id="dataTableExample" class="table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Storage</th>
                <th>Product Name</th>
                <th>Product Data </th>
                <th>Image</th>
                <th>View</th>
              </tr>
            </thead>
            <tbody>
             @foreach($selling as $sellings)
             <?php   $id = $sellings->id;  
                  
                  $userData = App\Models\SellProduct::find($id)->backusersell;
                
             
                  $subprodata = App\Models\SellProduct::find($id)->backproductsell;
               
             
             ?>
              <tr>
              <td>{{ $userData->name}} </td>
                <td>{{ $sellings->email}} </td>
                
                <td>{{$sellings->sellStorage }}</td>
                <td>{{ $subprodata->subName}}</td>
                <td>{{ $subprodata->subBrnad}}</td>
                @foreach(json_decode($subprodata->subImage,true) as $images)
                <td><img src="{{ asset($images) }}" alt="image" style="border-radius: 0px; width: 75px; height: 70px;" >
                  @break
                 @endforeach</td>
                
                <td><a href="{{ route('sell.pro.view',$sellings->id) }}">View</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php }?>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush