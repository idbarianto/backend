@extends('app')

@section('content')



<!-- Page header -->
<div class="page-header">
  <div class="page-header-content header-elements-md-inline">
    
    <div class="d-flex">
        <div class="page-title">
            <h4 class="font-weight-semibold">
                <a href="javascript:;" class="sidebar-control sidebar-secondary-toggle mr-2">
                    <i class="icon-transmission"></i>
                </a>
                Dashboard
            </h4>
            <div class="text-muted">Welcome back, Eugene!</div>
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
          <h5 class="card-title">Form User</h5>
          <hr>
        </div>
        <div class="card-body">
          <form method="post" action="{{ route('save-user') }}" enctype="multipart/form-data"> @csrf
            <div class="form-group row">
              <label class="col-form-label col-lg-3">Name</label>
              <div class="col-lg-9">
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" maxlength="50" required>
                <small class="text-danger">{{ $errors->first('name') }}</small>
              </div>
            </div>
            
            <div class="form-group row">
              <label class="col-form-label col-lg-3">Email</label>
              <div class="col-lg-9">
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" maxlength="50" required>
                <small class="text-danger">{{ $errors->first('email') }}</small>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label col-lg-3">Role</label>
              <div class="col-lg-9">
                <select name="role" class="form-control select-search" required>
                  <option value=""> - Select role - </option>
                  @foreach(["Admin","Head"] as $role)
                    <option value="{{$role}}" {{ (old('role') == $role) ? "selected" : "" }}>{{$role}}</option>
                  @endforeach
                </select>
                <small class="text-danger">{{ $errors->first('role') }}</small>
              </div>
            </div>

            <div class="form-group row">
              <label class="col-form-label col-lg-3">Password</label>
              <div class="col-lg-9">
                <input type="password" name="password" class="form-control" value="{{ old('password') }}" minlength="6" required>
                <small class="text-danger">{{ $errors->first('password') }}</small>
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
