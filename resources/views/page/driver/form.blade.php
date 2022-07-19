@extends('app')

@section('content')



<!-- Page header -->
<div class="page-header">
  <div class="page-header-content header-elements-md-inline">
    
    <div class="d-flex">
        <div class="page-title">
            <h4 class="font-weight-semibold">
                Driver
            </h4>
            <div class="breadcrumb ml-0 mt-1">
                <a href="javascript:;" class="breadcrumb-item py-0">Driver</a>
                <a href="javascript:;" class="breadcrumb-item py-0">Form</a>
            </div>
        </div>
        <a href="#" class="header-elements-toggle text-body d-md-none"><i class="icon-more"></i></a>
    </div>

    <div class="header-elements d-none py-0 mb-3 mb-md-0">
      <button class="btn btn-secondary ml-3" type="button" onclick="history.back()">
        <i class="icon-arrow-left8 mr-2"></i> 
        Back
      </button>
    </div>
  </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content pt-0">
  <div class="row">
    <div class="col-md-5">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Form Driver</h5>
          <hr>
        </div>
        <div class="card-body">
          <form method="post" action="{{ route('save-driver') }}" enctype="multipart/form-data"> @csrf
            <div class="form-group row">
              <label class="col-form-label col-lg-3">Name</label>
              <div class="col-lg-9">
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" maxlength="50" required>
                <small class="text-danger">{{ $errors->first('name') }}</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label col-lg-3">Description</label>
              <div class="col-lg-9">
                <textarea name="description" class="form-control" id="" cols="30" rows="3" maxlength="100">{{ old('description') }}</textarea>
                <small class="text-danger">{{ $errors->first('description') }}</small>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-form-label col-lg-3 pt-0">Active</label>
              <div class="col-lg-9">
                <label class="custom-control custom-switch">
                  <input type="checkbox" name="active" class="custom-control-input" {{ (old('active')) ? "checked" : "" }}>
                  <span class="custom-control-label">Yes</span>
                </label>
              </div>
            </div>
            <hr>
            <div class="form-group">
              <button class="btn btn-light" type="button" onclick="history.back()"> <i class="icon-arrow-left8 mr-1"></i> Back</button>
              <button class="btn btn-primary" type="submit"> <i class="icon-paperplane mr-1"></i> Submit </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /content area -->

@endsection


@section('plugins')
    <!-- Theme JS files -->
    
    <!-- /theme JS files -->
@endsection


@section('script')
    <script type="text/javascript">
    
    </script>
@endsection
