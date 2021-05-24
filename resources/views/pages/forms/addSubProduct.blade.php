@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
  
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Forms</a></li>
   
  </ol>
</nav>

<div class="row">
  <div class="col-lg-8 grid-margin stretch-card align center">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Sub Products</h4>
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
        @endif
        <form class="cmxform" id="signupForm" method="post" action="{{ route('insert.subPro')}}" enctype="multipart/form-data">
        @csrf
          <fieldset>
            <div class="form-group">
              <label for="name">Name</label>
              <input id="name" class="form-control" name="subName" type="text">
              @if($errors->has('subName'))
              <div class="alert alert-danger">{{ $errors->first('subName') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Brand</label>
              <input id="name" class="form-control" name="subBrnad" type="text">
              @if($errors->has('subBrnad'))
              <div class="alert alert-danger">{{ $errors->first('subBrnad') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Detail</label>
              <input id="name" class="form-control" name="subDetail" type="text">
              @if($errors->has('subDetail'))
              <div class="alert alert-danger">{{ $errors->first('subDetail') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="email">Colour</label>
              <input id="email" class="form-control" name="subColour" type="colour">
              @if($errors->has('subColour'))
              <div class="alert alert-danger">{{ $errors->first('subColour') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">MetaTitle</label>
              <input id="name" class="form-control" name="subMetaTitle" type="text">
              @if($errors->has('subMetaTitle'))
              <div class="alert alert-danger">{{ $errors->first('subMetaTitle') }}</div>
              @endif
            </div>
            <div class="form-group">
            <label for="exampleFormControlTextarea1">Meta Description </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="subMetaDesc"></textarea>
            @if($errors->has('subMetaDesc'))
              <div class="alert alert-danger">{{ $errors->first('subMetaDesc') }}</div>
              @endif
          </div>
            <div class="card">
        <label>MetaKeyword</label>
          <input name="subMetaKeyword" id="tags"  />
          @if($errors->has('subMetaKeyword'))
              <div class="alert alert-danger">{{ $errors->first('subMetaKeyword') }}</div>
              @endif
        </div>
            <div class="form-group">
          <label>Select Product</label>
          <select class="js-example-basic-single w-100" name="pro_id">
            <?php $product = App\Models\Product::producton();     
           
           ?>
           @if(count($product))
            @foreach($product as $products)
            <option value="{{ $products->id}}">{{$products->proName}}</option>
            @endforeach
            @else
            <option >No data</option>
            @endif
          </select>
        </div>
        <div class="form-group">
            <label>File upload</label>
            <input type="file" name="subImage[]" class="file-upload-default" accept="image/*" multiple="multiple">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
            </div>
            @if($errors->has('subImage'))
              <div class="alert alert-danger">{{ $errors->first('subImage') }}</div>
              @endif
          </div>
        
       
            <input class="btn btn-primary" type="submit" value="Submit">
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>
 
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/select2.js') }}"></script>
  <script src="{{ asset('assets/js/typeahead.js') }}"></script>
  <script src="{{ asset('assets/js/tags-input.js') }}"></script>
  <script src="{{ asset('assets/js/file-upload.js') }}"></script>
  
  
@endpush