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

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Add Slider</button>


<div class="modal fade bd-example-modal-xl" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">  
  
    <div class="modal-content">
      <div class="modal-header">
       
        <h5 class="modal-title" id="exampleModalLabel">Add Slider Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('slider.store')}}">
        @csrf
        <!-- //First Row -->
      <div class="row">
          <div class="col-md-3"> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="recipient-name" name="title[]">
          </div>
          </div>
          <div class="col-md-3"> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description:</label>
            <input type="text" class="form-control" id="recipient-name" name="desc[]">
          </div>
          </div>
          <div class="col-md-3"> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Image:</label>
            <input type="file" class="form-control" id="recipient-name" name="image[]">
          </div>
          </div>
          <div class="col-md-3"> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">status:</label>
            <input type="text" class="form-control" id="recipient-name" name="status[]">
          </div>
          </div>
        
      
<!-- Second ROW  -->
      
          <div class="col-md-3"> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="recipient-name" name="khan[]">
          </div>
          </div>
          <div class="col-md-3"> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description:</label>
            <input type="text" class="form-control" id="recipient-name" name="khan[]">
          </div>
          </div>
          <div class="col-md-3"> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Image:</label>
            <input type="file" class="form-control" id="recipient-name" name="khan[]">
          </div>
          </div>
          <div class="col-md-3"> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Status:</label>
            <input type="text" class="form-control" id="recipient-name" name="khan[]">
          </div>
          </div>
          <div class="col-md-3"> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="recipient-name" name="title[]">
          </div>
          </div>
          <div class="col-md-3"> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description:</label>
            <input type="text" class="form-control" id="recipient-name" name="des[]">
          </div>
          </div>
          <div class="col-md-3"> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Image:</label>
            <input type="file" class="form-control" id="recipient-name" name="image[]">
          </div>
          </div>
          <div class="col-md-3"> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Status:</label>
            <input type="text" class="form-control" id="recipient-name" name="status[]">
          </div>
          </div> <div class="col-md-3"> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text" class="form-control" id="recipient-name" name="title[]">
          </div>
          </div>
          <div class="col-md-3"> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Description:</label>
            <input type="text" class="form-control" id="recipient-name" name="des4">
          </div>
          </div>
          <div class="col-md-3"> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Image:</label>
            <input type="file" class="form-control" id="recipient-name" name="image4">
          </div>
          </div>
          <div class="col-md-3"> 
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Status:</label>
            <input type="text" class="form-control" id="recipient-name" name="status4">
          </div>
          </div>
         
      </div>
      </div>
      
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send message</button>
      </div>

      </form>
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
  
@endpush