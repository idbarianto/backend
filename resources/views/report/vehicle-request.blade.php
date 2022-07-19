@extends('app')

@section('content')


<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">

        <div class="d-flex">
            <div class="page-title">
                <h4 class="font-weight-semibold">
                    Report
                </h4>
                <div class="breadcrumb ml-0 mt-1">
                    <a href="javascript:;" class="breadcrumb-item py-0">Report</a>
                    <a href="javascript:;" class="breadcrumb-item py-0">Vehicle Request</a>
                </div>
            </div>
            <a href="#" class="header-elements-toggle text-body d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0"></div>
    </div>
</div>
<!-- /page header -->



<!-- Content area -->
<div class="content pt-0">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Report Data Vehicle Request </h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <form id="form-filter-data">
                            <div class="d-sm-flex">
                                <div class="form-group-feedback form-group-feedback-left flex-grow-1 mb-3 mb-sm-0">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input name="start" value="{{  request()->get("start") }}" class="form-control" type="date" placeholder="Filter date" {{ (request()->get('all_periode')) ? "disabled" : "" }} required >
                                        </div>
                                        <div class="col-md-6">
                                            <input name="end" value="{{  request()->get("end") }}" class="form-control" type="date" placeholder="Filter date" {{ (request()->get('all_periode')) ? "disabled" : "" }} required >
                                        </div>
                                        <label class="form-label pl-2" for=""><input onclick="is_all_periode(this)" type="checkbox" class="me-1" name="all_periode" {{ (request()->get('all_periode')) ? "checked" : "" }}> All Periode</label>
                                    </div>
                                </div>
                                <div class="ml-sm-2">
                                    <select name="vehicle" class="select-search custome-width">
                                        <option value="">All</option>
                                        @foreach($vehicle as $obj)
                                            <option value="{{ $obj->id }}" {{ (request()->get('vehicle') == $obj->id) ? "selected" : "" }}>{{ $obj->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="ml-sm-2">
                                    <select name="driver" class="select-search custome-width">
                                        <option value="">All</option>
                                        @foreach($driver as $obj)
                                            <option value="{{ $obj->id }}" {{ (request()->get('driver') == $obj->id) ? "selected" : "" }}>{{ $obj->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="ml-sm-2">
                                    <input type="hidden" name="generate" value="true">
                                    <button type="submit" class="btn btn-primary w-100 w-sm-auto"><i class="icon-search4 mr-1"></i>Generate</button>
                                    <button type="reset" class="btn btn-light w-100 w-sm-auto"><i class="icon-reset mr-1"></i>Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 pt-4">
                        @if(request()->get('generate'))
                            <a href="{{ url()->full() }}&export=true" target="_blank" class="btn btn-primary mb-2" rel=""><i class="icon-file-excel mr-1"></i> Export</a>
                            @include('report.data.vehicle-request')
                        @endif
                    </div>
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
        
        let is_all_periode = (e) => {
            if(!e.checked) {
                $("[name=start]").removeAttr("disabled");
                $("[name=end]").removeAttr("disabled");
            } else {
                $("[name=start]").attr("disabled","disabled");
                $("[name=end]").attr("disabled","disabled");
            }
        }
    
    </script>
@endsection
