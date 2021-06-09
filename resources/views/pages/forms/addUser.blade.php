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
@if(isset($userEdit))

<div class="row">
  <div class="col-lg-8 grid-margin stretch-card align center">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Admin User</h4>
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
        @endif
        <form class="cmxform" id="signupForm" method="post" action="{{ route('insert.user') }}">
        @csrf
          <fieldset>
            <div class="form-group">
              <label for="name">Name</label>
              <input id="name" class="form-control" name="name" type="text" value="{{ $userEdit->name }}">
              @if($errors->has('name'))
              <div class="alert alert-danger">{{ $errors->first('name') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input id="name" class="form-control" name="email" type="email" value="{{ $userEdit->email }}">
              @if($errors->has('email'))
              <div class="alert alert-danger">{{ $errors->first('email') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" class="form-control" name="password" type="text" >
              @if($errors->has('password'))
              <div class="alert alert-danger">{{ $errors->first('password') }}</div>
              @endif
            </div>
            <div class="form-group">
          <label>Select</label>
          <select class="js-example-basic-single w-100" name="adminroles" >
           @foreach($allRoles as $role)
            <option value="{{ $role->id }}"  {{ $assignRoleId == $role->id ? 'selected="selected"' : '' }} >{{ $role->name }}</option>
            @endforeach
          </select>

        </div>

            <input type="hidden" value="{{ $userEdit->id }}" name="id">
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
        <h4 class="card-title">Add Admin User</h4>
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
        @endif
        <form class="cmxform" id="signupForm" method="post" action="{{ route('admin.insert.user') }}">
        @csrf
          <fieldset>
            <div class="form-group">
              <label for="name">Name</label>
              <input id="name" class="form-control" name="name" type="text">
              @if($errors->has('name'))
              <div class="alert alert-danger">{{ $errors->first('name') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input id="email" class="form-control" name="email" type="email">
              @if($errors->has('email'))
              <div class="alert alert-danger">{{ $errors->first('email') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input id="password" class="form-control" name="password" type="text">
              @if($errors->has('password'))
              <div class="alert alert-danger">{{ $errors->first('password') }}</div>
              @endif
            </div>
            <div class="form-group">
          <label>Select</label>
          <select class="js-example-basic-single w-100" name="adminroles">
           @foreach($role as $roles)
            <option value="{{ $roles->id }}">{{ $roles->name }}</option>
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
  <script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js') }}"></script>

@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/typeahead.js') }}"></script>

@endpush
