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
                    <a href="javascript:;" class="breadcrumb-item py-0">Driver</a>
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
            <h5 class="card-title">Report Data Driver </h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form id="form-filter-data">
                            <div class="d-sm-flex">
                                <div class="form-group-feedback form-group-feedback-left flex-grow-1 mb-3 mb-sm-0">
                                    <input type="text" name="name" class="form-control" value="{{request()->get('name')}}" placeholder="Search name">
                                    <div class="form-control-feedback form-control-feedback-sm">
                                        <i class="icon-search4 text-muted"></i>
                                    </div>
                                </div>
                                <div class="ml-sm-2">
                                    <select name="active" class="select-fixed-singgle">
                                        <option value="">All</option>
                                        <option value="1" {{ (request()->get('active') == "1") ? "selected" : "" }}>Active</option>
                                        <option value="0" {{ (request()->get('active') == "0") ? "selected" : "" }}>Inactive</option>
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
                            @include('report.data.driver')
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
    
    </script>
@endsection
