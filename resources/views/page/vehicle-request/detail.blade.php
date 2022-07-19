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
                    <a href="javascript:;" class="breadcrumb-item py-0">Detail</a>
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
                    <h5 class="card-title">Data Vehicle Request Detail</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3">Request Date</label>
                                <div class="col-lg-9">
                                    <input type="text"class="form-control" value="{{ date('Y-m-d', strtotime($data->request_date)) }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3">Vehicle</label>
                                <div class="col-lg-9">
                                    <input type="text"class="form-control" value="{{ $data->vehicle->name }}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3">Driver</label>
                                <div class="col-lg-9">
                                    <input type="text"class="form-control" value="{{ $data->driver->name }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group row">
                                <label class="col-form-label col-lg-3 text-right">Description</label>
                                <div class="col-lg-9">
                                    <textarea name="description" class="form-control" id="" cols="30" rows="6" maxlength="100" readonly>{{ $data->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Approver</th>
                                        <th>Status</th>
                                        <th>Approval remark</th>
                                        <th>Approval date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data->approver as $key => $obj)
                                        <tr>
                                            <td class="text-center">{{ ++$key }}</td>
                                            <td>
                                                {{ $obj->user->name }}
                                                @if($obj->current == true)
                                                    <span class="badge badge-info ml-1">Review</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if(\Auth::user()->id == $obj->approver && $obj->current == true)
                                                    <button class="btn-xs btn-primary" data-toggle="modal" data-target="#approve"> Approve </button>
                                                    <button class="btn-xs btn-danger" data-toggle="modal" data-target="#reject"> Reject </button>
                                                @else
                                                    {{ $obj->status }}
                                                @endif
                                            </td>
                                            <td>{{ $obj->approval_remark ?? "-" }}</td>
                                            <td class="text-center">
                                                @if($obj->approval_date)
                                                    {{ date('j F Y', strtotime($obj->approval_date) )}}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
<!-- /content area -->
           


<div id="approve" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h6 class="modal-title">Approval Remark</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post">
                @csrf
                <div class="modal-body">
                    <h6 class="font-weight-semibold"><strong>Approval Remark</strong></h6>
                    <textarea name="approval_remark" class="form-control" id="" cols="30" rows="4"></textarea>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mx-1" data-dismiss="modal">Close</button>
                    <button type="submit" name="approval" value="Approve" class="btn btn-primary mx-1"><i class="icon-checkmark4 mr-1"></i>Approve</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="reject" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h6 class="modal-title">Approval Remark</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form method="post">
                @csrf
                <div class="modal-body">
                    <h6 class="font-weight-semibold"><strong>Approval Remark</strong></h6>
                    <textarea name="approval_remark" class="form-control" id="" cols="30" rows="4"></textarea>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mx-1" data-dismiss="modal">Close</button>
                    <button type="submit" name="approval" value="Reject" class="btn btn-danger mx-1"><i class="icon-cross3 mr-1"></i>Reject</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection


@section('plugins')
    <!-- Theme JS files -->
    
    <!-- /theme JS files -->
@endsection


@section('script')
    <script type="text/javascript">
    
    </script>
@endsection
