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
@if(isset($role,$permission,$rolePermissions))
<div class="row">
  <div class="col-lg-8 grid-margin stretch-card align center">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Role </h4>
       
        @if(session()->has('message'))
         <div class="alert alert-success">
        {{ session()->get('message') }}
         </div>
        @endif
        <form class="cmxform" id="signupForm" method="post" action="{{ route('update.role',$role->id) }}">
        @csrf
          <fieldset>
            <div class="form-group">
              <label for="name">Role</label>
              <input id="name" class="form-control" name="name" type="text" value="{{ $role->name }}">
              @if($errors->has('name'))
              <div class="alert alert-danger">{{ $errors->first('name') }}</div>
              @endif
            </div>

            <div class="form-group">
            @foreach($permission as $value)
            <div class="form-check">
            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                {{ $value->name }}</label>
              @if($errors->has('permission'))
              <div class="alert alert-danger">{{ $errors->first('permission') }}</div>
              @endif
            </div>
            
            @endforeach
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
        <h4 class="card-title">Add Role </h4>
       
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
        @endif
        <form class="cmxform" id="signupForm" method="post" action="{{ route('store.role') }}">
        @csrf
          <fieldset>
            <div class="form-group">
              <label for="name">Role</label>
              <input id="name" class="form-control" name="name" type="text">
              @if($errors->has('name'))
              <div class="alert alert-danger">{{ $errors->first('name') }}</div>
              @endif
            </div>

            <div class="form-group">
            @foreach($permission as $permissions)
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="permission[]" value="{{ $permissions->id }}">
                {{ $permissions->name }}
              </label>
              @if($errors->has('permission'))
              <div class="alert alert-danger">{{ $errors->first('permission') }}</div>
              @endif
            </div>
            @endforeach
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
  
@endpush