@extends('app')

@section('content')


<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">

        <div class="d-flex">
            <div class="page-title">
                <h4 class="font-weight-semibold">
                    Vehicle
                </h4>
                <div class="breadcrumb ml-0 mt-1">
                    <a href="javascript:;" class="breadcrumb-item py-0">Vehicle</a>
                    <a href="javascript:;" class="breadcrumb-item py-0">Data</a>
                </div>
            </div>
            <a href="#" class="header-elements-toggle text-body d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0">
            <a href="{{ route('form-vehicle') }}" class="btn btn-lg btn-secondary ml-3">
                <i class="icon-file-plus mr-2"></i>
                Add New Vehicle
            </a>
        </div>
    </div>
</div>
<!-- /page header -->



<!-- Content area -->
<div class="content pt-0">

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Data Vehicle</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-xs table-hover">
                    <thead>
                        <tr>
                            <th class="text-center font-weight-bold"><input type="checkbox"></th>
                            <th class="text-center font-weight-bold">Name</th>
                            <th class="text-center font-weight-bold">Description</th>
                            <th class="text-center font-weight-bold">Status</th>
                            <th class="text-center font-weight-bold">Created</th>
                            <th class="text-center font-weight-bold">##</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $obj)
                            <tr>
                                <td class="text-center" width="50em"><input type="checkbox"></td>
                                <td>{{$obj->name}}</td>
                                <td>{{$obj->description}}</td>
                                <td class="text-center">
                                    @if($obj->active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-light">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center">{{ date('j F Y', strtotime($obj->created_at))}}</td>
                                <td class="text-center p-0" width="120em">
                                    <ul class="list-inline mb-0">
                                        <li class="dropdown">
                                            <button class="btn btn-indigo p-1 font-size-xs dropdown-toggle text-white" data-toggle="dropdown">Options</button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <div class="dropdown-header">Options</div>
                                                <a href="{{ route('edit-vehicle', encrypt($obj->id)) }}" class="dropdown-item py-1 font-size-xs"><i class="icon-pencil7"></i>Edit entry</a>
                                                <form action="{{ route('delete-vehicle') }}" method="post" onsubmit="confirm_delete_data(this)">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="id" value="{{encrypt($obj->id)}}">
                                                    <button class="dropdown-item py-1 font-size-xs btn btn-link"><i class="icon-bin"></i>Remove entry</button>
                                                </form>  
                                            </ul>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
