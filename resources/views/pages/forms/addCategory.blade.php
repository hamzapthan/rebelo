@extends('layout.master')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
  
@endpush

@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
   
  </ol>
</nav>
@if(isset($editCategory))
    <div class="row">
  <div class="col-lg-8 grid-margin stretch-card align center">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Eidt Category  </h4>
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
         @endif
        <form class="cmxform" id="signupForm" method="post" action="{{route('update.cat',$editCategory->id)}}" enctype="multipart/form-data">
        @csrf
          <fieldset>
            <div class="form-group">
              <label for="name">Category Name</label>
              <input id="name" class="form-control" name="catName" type="text" value="{{$editCategory->catName}}" >
              @if($errors->has('catName'))
              <div class="alert alert-danger">{{ $errors->first('catName') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Category Detail</label>
              <input id="name" class="form-control" name="catDetail" type="text" value="{{$editCategory->catDetail}}">
              @if($errors->has('catDetail'))
              <div class="alert alert-danger">{{ $errors->first('catDetail') }}</div>
              @endif
            </div>
            
            <div>
            <img src="{{ asset($editCategory->image) }}" style="height:60px; width:80px;border-radius:0"> 
            </div>

            <div class="form-group">
            <label>File upload</label>
            <input type="file" name="image" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
             
            </div>
            @if($errors->has('image'))
              <div class="alert alert-danger">{{ $errors->first('image') }}</div>
              @endif
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
        <h4 class="card-title">Add Category</h4>
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
        @endif
        <form class="cmxform" id="signupForm" method="post" action="{{route('insert.cat')}}" enctype="multipart/form-data">
        @csrf
          <fieldset>
            <div class="form-group">
              <label for="name">Category Name</label>
              <input id="name" class="form-control" name="catName" type="text">
              @if($errors->has('catName'))
              <div class="alert alert-danger">{{ $errors->first('catName') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Category Detail</label>
              <input id="name" class="form-control" name="catDetail" type="text">
              @if($errors->has('catDetail'))
              <div class="alert alert-danger">{{ $errors->first('catDetail') }}</div>
              @endif
            </div>
            
            
           
            <div class="form-group">
            <label>File upload</label>
            <input type="file" name="image" class="file-upload-default">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
              </span>
             
            </div>
            @if($errors->has('image'))
              <div class="alert alert-danger">{{ $errors->first('image') }}</div>
              @endif
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