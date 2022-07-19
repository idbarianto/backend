@extends('app')

@section('content')



<!-- Page header -->
<div class="page-header">
  <div class="page-header-content header-elements-md-inline">
    
    <div class="d-flex">
        <div class="page-title">
            <h4 class="font-weight-semibold">
                Vehicle Request
            </h4>
            <div class="breadcrumb ml-0 mt-1">
                <a href="javascript:;" class="breadcrumb-item py-0">Vehicle Request</a>
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
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Form Vehicle Request</h5>
          <hr>
        </div>
        <div class="card-body">
          <form method="post" action="{{ route('save-vehicle-request') }}" enctype="multipart/form-data"> @csrf
            
            <div class="row">
              <div class="col-md-5">
                <div class="form-group row">
                  <label class="col-form-label col-lg-3">Request Date</label>
                  <div class="col-lg-9">
                    <input type="date" name="request_date" class="form-control" value="{{ (old('request_date')) ? old('request_date') : date('Y-m-d') }}" required>
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-form-label col-lg-3">Vehicle</label>
                  <div class="col-lg-9">
                    <select name="vehicle_id" class="form-control select-search" required>
                      <option value=""> - Select vehicle - </option>
                      @foreach($vehicle as $obj)
                        <option value="{{$obj->id}}" {{ (old('vehicle_id') == $obj->id) ? "selected" : "" }}>{{$obj->name}}</option>
                      @endforeach
                    </select>
                    <small class="text-danger">{{ $errors->first('vehicle_id') }}</small>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-form-label col-lg-3">Diver</label>
                  <div class="col-lg-9">
                    <select name="driver_id" class="form-control select-search" required>
                      <option value=""> - Select driver - </option>
                      @foreach($driver as $obj)
                        <option value="{{$obj->id}}" {{ (old('driver_id') == $obj->id) ? "selected" : "" }}>{{$obj->name}}</option>
                      @endforeach
                    </select>
                    <small class="text-danger">{{ $errors->first('driver_id') }}</small>
                  </div>
                </div>
              </div>
              <div class="col-md-7">
                <div class="form-group row">
                  <label class="col-form-label col-lg-3 text-right">Description</label>
                  <div class="col-lg-9">
                    <textarea name="description" class="form-control" id="" cols="30" rows="6" maxlength="100">{{ old('description') }}</textarea>
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                  </div>
                </div>
              </div>
            </div>

            <hr>

            <div class="form-group">
              <button class="btn btn-light" type="button" onclick="history.back()"> <i class="icon-arrow-left8 mr-1"></i> Back</button>
              <button class="btn btn-primary" type="submit" name="draft" value="1"> <i class="icon-floppy-disk mr-1"></i> Save as draft </button>
              <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#remark-approval"> <i class="icon-paperplane mr-1"></i> Approval Request </button>
            </div>
            
            <div id="remark-approval" class="modal fade" tabindex="-1">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header bg-primary text-white">
                    <h6 class="modal-title">Approval Request</h6>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <h6 class="font-weight-semibold"><strong>Approval Remark</strong></h6>
                    <textarea name="request_remark" class="form-control" id="" cols="30" rows="4"></textarea>
                    <br>
                    <div class="form-group">
                      <label for=""><strong>Select Approval</strong></label>
                      @foreach($approver as $obj)
                        <p><input type="checkbox" class="approver mr-1" name="approver[]" value="{{$obj->id}}">{{$obj->name}}</p>
                      @endforeach
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mx-1" data-dismiss="modal"><i class="icon-cross3 mr-1"></i>Close</button>
                    <button type="submit" name="submit" value="1" class="btn btn-primary mx-1"><i class="icon-checkmark4 mr-1"></i>Submit</button>
                  </div>
                </div>
              </div>
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
