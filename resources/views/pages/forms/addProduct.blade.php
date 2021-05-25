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
@if(isset($editProduct))
    <div class="row">
  <div class="col-lg-8 grid-margin stretch-card align center">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Form Validation</h4>
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
         @endif
        <form class="cmxform" id="signupForm" method="post" action="{{route('update.pro',$editProduct->id)}}" enctype="multipart/form-data">
        @csrf
          <fieldset>
            <div class="form-group">
              <label for="name">Product Name</label>
              <input id="name" class="form-control" name="proName" type="text" value="{{$editProduct->proName}}" >
              @if($errors->has('proName'))
              <div class="alert alert-danger">{{ $errors->first('proName') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Product Detail</label>
              <input id="name" class="form-control" name="proBrnad" type="text" value="{{$editProduct->proBrnad}}">
              @if($errors->has('proBrnad'))
              <div class="alert alert-danger">{{ $errors->first('proBrnad') }}</div>
              @endif
            </div>
            <div class="form-group">
          <label>Select</label>
          <?php
               $cat_id = $editProduct->cat_id; 
               echo $cat_id;
              $countries = App\Models\Category::status();
              echo $countries;
                       ?>
         
          <select class="js-example-basic-single w-100" name="cat_id" >
          @foreach($countries as $role)
            <option value="{{ $role->id }}" {{ $cat_id == $role->id ? 'selected="selected"' : '' }}>{{ $role->catName }}</option>    
    @endforeach
          </select>
         
        </div>
       
            <input class="btn btn-primary" type="submit" value="Submit">
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
@else


<div class="row">
  <div class="col-lg-8 grid-margin stretch-card align center">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Create Products</h4>
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
        @endif
        <form class="cmxform" id="signupForm" method="post" action="{{route('insert.pro')}}" >
        @csrf
          <fieldset>
            <div class="form-group">
              <label for="name">Product Name</label>
              <input id="name" class="form-control" name="proName" type="text">
              @if($errors->has('proName'))
              <div class="alert alert-danger">{{ $errors->first('proName') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Product Brand</label>
              <input id="name" class="form-control" name="proBrnad" type="text">
              @if($errors->has('proBrnad'))
              <div class="alert alert-danger">{{ $errors->first('proBrnad') }}</div>
              @endif
            </div>
            <div class="form-group">
          <label>Select</label>
          <?php    $category = App\Models\Category::status();
                       ?>
         
          <select class="js-example-basic-single w-100" name="cat_id">
          @foreach($category as $categories) 
            <option value="{{ $categories->id }}">{{ $categories->catName}}</option>
            @endforeach 
          </select>
         
        </div>
           
            <input class="btn btn-primary" type="submit" value="Submit">
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
@endif
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