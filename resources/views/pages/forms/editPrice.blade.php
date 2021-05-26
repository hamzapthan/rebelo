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
        <h4 class="card-title">Storage Form</h4>
         @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
        @endif
        <form class="cmxform" id="signupForm" method="post" action="{{ route('update.price',$storagePrice->id)}}">
        @csrf
          <fieldset>
            <div class="form-group">
              <label for="name">Edit Price</label>
              
            <div class="form-group">
              <label for="name">New</label>
              <input id="name" class="form-control" name="new" type="number" value="{{ $storagePrice->new }}">
              @if($errors->has('new'))
              <div class="alert alert-danger">{{ $errors->first('new') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">working	</label>
              <input id="name" class="form-control" name="working" type="number" value="{{ $storagePrice->working}}">
              @if($errors->has('working'))
              <div class="alert alert-danger">{{ $errors->first('working') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Dead</label>
              <input id="name" class="form-control" name="dead" type="number" value="{{ $storagePrice->dead }}">
               @if($errors->has('dead'))
              <div class="alert alert-danger">{{ $errors->first('dead') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">prob1</label>
              <input id="name" class="form-control" name="prob1" type="number" value="{{ $storagePrice->prob1 }}">
            </div>
            <div class="form-group">
              <label for="name">prob2</label>
              <input id="name" class="form-control" name="prob2" type="number" value="{{ $storagePrice->prob2 }}">
            </div>
            <div class="form-group">
              <label for="name">prob3</label>
              <input id="name" class="form-control" name="prob3" type="number" value="{{ $storagePrice->prob3 }}">
            </div>
            <div class="form-group">
              <label for="name">prob4</label>
              <input id="name" class="form-control" name="prob4" type="number" value="{{ $storagePrice->prob4 }}">
            </div>
            <div class="form-group">
              <label for="name">prob5</label>
              <input id="name" class="form-control" name="prob5" type="number" value="{{ $storagePrice->prob5 }}">
            </div>
            <div class="form-group">
              <label for="name">prob6</label>
              <input id="name" class="form-control" name="prob6" type="number" value="{{ $storagePrice->prob6 }}">
            </div>
            <div class="form-group">
              <label for="name">prob7</label>
              <input id="name" class="form-control" name="prob7" type="number" value="{{ $storagePrice->prob7 }}">
            </div>
            <div class="form-group">
              <label for="name">prob8</label>
              <input id="name" class="form-control" name="prob8" type="number" value="{{ $storagePrice->prob8 }}">
            </div>
            <div class="form-group">
              <label for="name">prob9</label>
              <input id="name" class="form-control" name="prob9" type="number" value="{{ $storagePrice->prob9 }}">
            </div>
            <div class="form-group">
              <label for="name">prob10</label>
              <input id="name" class="form-control" name="prob10" type="number" value="{{ $storagePrice->prob10 }}">
            </div>
            <div class="form-group">
              <label for="name">prob11</label>
              <input id="name" class="form-control" name="prob11" type="number" value="{{ $storagePrice->prob11 }}">
            </div>
            <div class="form-group">
              <label for="name">prob12</label>
              <input id="name" class="form-control" name="prob12" type="number" value="{{ $storagePrice->prob12 }}">
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
  
@endpush