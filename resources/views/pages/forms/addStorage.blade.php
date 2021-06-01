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
@if(isset($id))
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
        <form class="cmxform" id="signupForm" method="post" action="{{route('insert.storage')}}">
        @csrf
          <fieldset>
            <div class="form-group">
              <label for="name">Storage Space</label>
              <input id="name" class="form-control" name="storage" type="text">
              @if($errors->has('storage'))
              <div class="alert alert-danger">{{ $errors->first('storage') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">New</label>
              <input id="name" class="form-control" name="new" type="number">
              @if($errors->has('new'))
              <div class="alert alert-danger">{{ $errors->first('new') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Working	</label>
              <input id="name" class="form-control" name="working" type="number">
              @if($errors->has('working'))
              <div class="alert alert-danger">{{ $errors->first('working') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Dead</label>
              <input id="name" class="form-control" name="dead" type="number">
               @if($errors->has('dead'))
              <div class="alert alert-danger">{{ $errors->first('dead') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Prob1</label>
              <input id="name" class="form-control" name="prob1" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob2</label>
              <input id="name" class="form-control" name="prob2" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob3</label>
              <input id="name" class="form-control" name="prob3" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob4</label>
              <input id="name" class="form-control" name="prob4" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob5</label>
              <input id="name" class="form-control" name="prob5" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob6</label>
              <input id="name" class="form-control" name="prob6" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob7</label>
              <input id="name" class="form-control" name="prob7" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob8</label>
              <input id="name" class="form-control" name="prob8" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob9</label>
              <input id="name" class="form-control" name="prob9" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob10</label>
              <input id="name" class="form-control" name="prob10" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob11</label>
              <input id="name" class="form-control" name="prob11" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob12</label>
              <input id="name" class="form-control" name="prob12" type="number">
            </div>

            <div class="form-group">
             
              <input id="name" class="form-control" name="subpro_id" value="{{ $id }}" type="hidden">
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
        <h4 class="card-title">Storage Form</h4>
         @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
        @endif
        <form class="cmxform" id="signupForm" method="post" action="{{route('insert.storage')}}">
        @csrf
          <fieldset>
            <div class="form-group">
              <label for="name">Storage Space</label>
              <input id="name" class="form-control" name="storage" type="text">
              @if($errors->has('storage'))
              <div class="alert alert-danger">{{ $errors->first('storage') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">New</label>
              <input id="name" class="form-control" name="new" type="number">
              @if($errors->has('new'))
              <div class="alert alert-danger">{{ $errors->first('new') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Working	</label>
              <input id="name" class="form-control" name="working" type="number">
              @if($errors->has('working'))
              <div class="alert alert-danger">{{ $errors->first('working') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Dead</label>
              <input id="name" class="form-control" name="dead" type="number">
               @if($errors->has('dead'))
              <div class="alert alert-danger">{{ $errors->first('dead') }}</div>
              @endif
            </div>
            <div class="form-group">
              <label for="name">Prob1</label>
              <input id="name" class="form-control" name="prob1" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob2</label>
              <input id="name" class="form-control" name="prob2" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob3</label>
              <input id="name" class="form-control" name="prob3" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob4</label>
              <input id="name" class="form-control" name="prob4" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob5</label>
              <input id="name" class="form-control" name="prob5" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob6</label>
              <input id="name" class="form-control" name="prob6" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob7</label>
              <input id="name" class="form-control" name="prob7" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob8</label>
              <input id="name" class="form-control" name="prob8" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob9</label>
              <input id="name" class="form-control" name="prob9" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob10</label>
              <input id="name" class="form-control" name="prob10" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob11</label>
              <input id="name" class="form-control" name="prob11" type="number">
            </div>
            <div class="form-group">
              <label for="name">Prob12</label>
              <input id="name" class="form-control" name="prob12" type="number">
            </div>

  

           
            <div class="form-group">
          <label>Select</label>
          <select class="js-example-basic-single w-100" name="subpro_id">
          @foreach($subProduct as $subProducts)
            <option value="{{ $subProducts->id}}">{{ $subProducts->subName }}</option>
           @endforeach
          </select>
          @if($errors->has('subpro_id'))
              <div class="alert alert-danger">{{ $errors->first('subpro_id') }}</div>
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
  
@endpush