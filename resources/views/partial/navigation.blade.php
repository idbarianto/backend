<div class="navbar navbar-expand-xl navbar-light navbar-static px-0">
    <div class="d-flex pl-3">
        <div class="navbar-brand wmin-0 mr-1">
            <a href="{{ route('dashboard') }}" class="d-inline-block"><h4 class="m-0 p-0"> Technical-Test </h4></a>
        </div>
    </div>

    <div class="d-flex ml-4 w-100 w-xl-auto overflow-auto overflow-xl-visible scrollbar-hidden border-top border-top-xl-0 order-1 order-xl-0">
        <ul class="navbar-nav navbar-nav-underline flex-row text-nowrap">

            <li class="nav-item mega-menu-full nav-item-dropdown-xl">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-make-group mr-2"></i> Navigation
                </a>

                <div class="dropdown-menu dropdown-content">
                    <div class="d-xl-flex">
                        <div
                            class="d-flex flex-row flex-xl-column bg-light overflow-auto overflow-xl-visible rounded-top rounded-xl-top-0 rounded-xl-left">
                            <div class="dropdown-content-body flex-1 border-bottom border-bottom-xl-0 py-2 py-xl-3">
                                <div class="font-weight-semibold border-bottom d-none d-xl-block pb-2 mb-2">
                                    Navigation
                                </div>
                                <div class="nav flex-xl-column flex-nowrap justify-content-center wmin-xl-300">
                                    <a href="#tab-dashboard" class="list-group-item list-group-item-action rounded mr-2 mr-xl-0" data-toggle="tab">
                                        <i class="icon-stack2 position-static pr-1 mr-2"></i>
                                        Dashboard
                                        <i class="icon-arrow-right8 position-static list-group-item-active-indicator d-none d-xl-inline-block ml-auto"></i>
                                    </a>

                                    <a href="#tab-vehicle" class="list-group-item list-group-item-action rounded mr-2 mr-xl-0" data-toggle="tab">
                                        <i class="icon-car position-static pr-1 mr-2"></i>
                                        Vehicle
                                        <i class="icon-arrow-right8 position-static list-group-item-active-indicator d-none d-xl-inline-block ml-auto"></i>
                                    </a>

                                    
                                    <a href="#tab-driver" class="list-group-item list-group-item-action rounded mr-2 mr-xl-0" data-toggle="tab">
                                        <i class="icon-collaboration position-static pr-1 mr-2"></i>
                                        Driver
                                        <i class="icon-arrow-right8 position-static list-group-item-active-indicator d-none d-xl-inline-block ml-auto"></i>
                                    </a>

                                    <a href="#tab-vehicle-request" class="list-group-item list-group-item-action rounded mr-2 mr-xl-0" data-toggle="tab">
                                        <i class="icon-menu6 position-static pr-1 mr-2"></i>
                                        Vehicle Request
                                        <i class="icon-arrow-right8 position-static list-group-item-active-indicator d-none d-xl-inline-block ml-auto"></i>
                                    </a>

                                    <a href="#tab-report" class="list-group-item list-group-item-action rounded mr-2 mr-xl-0" data-toggle="tab">
                                        <i class="icon-users position-static pr-1 mr-2"></i>
                                        Report
                                        <i class="icon-arrow-right8 position-static list-group-item-active-indicator d-none d-xl-inline-block ml-auto"></i>
                                    </a>

                                    
                                    <a href="#tab_user_management" class="list-group-item list-group-item-action rounded mr-2 mr-xl-0" data-toggle="tab">
                                        <i class="icon-users position-static pr-1 mr-2"></i>
                                        User Management
                                        <i class="icon-arrow-right8 position-static list-group-item-active-indicator d-none d-xl-inline-block ml-auto"></i>
                                    </a>

                                    <div class="font-weight-semibold border-bottom pb-2 mb-2"></div>

                                    <a href="#tab_menu" class="list-group-item list-group-item-action rounded mr-2 mr-xl-0" data-toggle="tab">
                                        <i class="icon-menu6 position-static pr-1 mr-2"></i>
                                        Menu
                                        <i class="icon-arrow-right8 position-static list-group-item-active-indicator d-none d-xl-inline-block ml-auto"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="tab-content flex-xl-1">

                            <div class="tab-pane dropdown-content-body dropdown-scrollable-xl fade"id="tab-dashboard">
                                <div class="row">
                                    <div class="col-lg-6 mb-3 mb-lg-0">
                                        <div class="font-weight-semibold border-bottom pb-2 mb-2">Dasboard</div>
                                        <a href="{{ route('dashboard') }}" class="dropdown-item rounded">Dashboard</a>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane dropdown-content-body dropdown-scrollable-xl fade" id="tab-vehicle">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="font-weight-semibold border-bottom pb-2 mb-2">Vehicle</div>
                                        <a href="{{ route('vehicle') }}" class="dropdown-item rounded">List Vehicle</a>
                                        <a href="{{ route('form-vehicle') }}" class="dropdown-item rounded">Form Vehicle</a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane dropdown-content-body dropdown-scrollable-xl fade" id="tab-driver">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="font-weight-semibold border-bottom pb-2 mb-2">Driver</div>
                                        <a href="{{ route('driver') }}" class="dropdown-item rounded">List Driver</a>
                                        <a href="{{ route('form-driver') }}" class="dropdown-item rounded">Form Driver</a>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="tab-pane dropdown-content-body dropdown-scrollable-xl fade" id="tab-vehicle-request">
                                <div class="row">
                                    <div class="col-lg-6 mb-3 mb-lg-0">
                                        <div class="font-weight-semibold border-bottom pb-2 mb-2">Request</div>
                                        <a href="{{ route('vehicle-request') }}" class="dropdown-item rounded">Request all</a>
                                        <a href="{{ route('form-vehicle-request') }}" class="dropdown-item rounded">Form request</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="font-weight-semibold border-bottom pb-2 mb-2">Request Status</div>
                                        <a href="javascript:;" class="dropdown-item rounded">Pending</a>
                                        <a href="javascript:;" class="dropdown-item rounded">Approve</a>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="tab-pane dropdown-content-body dropdown-scrollable-xl fade" id="tab-report">
                                <div class="row">
                                    <div class="col-lg-6 mb-3 mb-lg-0">
                                        <div class="font-weight-semibold border-bottom pb-2 mb-2">Report</div>
                                        <a href="javascript:;" class="dropdown-item rounded">Vehicle</a>
                                        <a href="javascript:;" class="dropdown-item rounded">Request</a>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane dropdown-content-body dropdown-scrollable-xl fade" id="tab_user_management">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="font-weight-semibold border-bottom pb-2 mb-2"><i class="icon-users mr-1"></i> User</div>
                                        <a href="{{ route('user') }}" class="dropdown-item rounded">Data User</a>
                                        <a href="{{ route('form-user') }}" class="dropdown-item rounded">Form User</a>
                                    </div>
                            
                                    <div class="col-lg-4">
                                        <div class="font-weight-semibold border-bottom pb-2 mb-2"><i class="icon-users4 mr-1"></i> Role</div>
                                        <a href="javascript:;" class="dropdown-item rounded">Data User Role</a>
                                        <a href="javascript:;" class="dropdown-item rounded">Form User Role</a>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane dropdown-content-body dropdown-scrollable-xl fade" id="tab_menu">
                                <div class="row">
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <div class="font-weight-semibold border-bottom pb-2 mb-2">Sections</div>
                                        <a href="javascript:;" class="dropdown-item rounded">No header</a>
                                        <a href="javascript:;" class="dropdown-item rounded">No footer</a>
                                        <a href="javascript:;" class="dropdown-item rounded">Fixed header</a>
                                        <a href="javascript:;" class="dropdown-item rounded">Fixed footer</a>
                                    </div>
                            
                                    <div class="col-lg-4 mb-3 mb-lg-0">
                                        <div class="font-weight-semibold border-bottom pb-2 mb-2">Sidebars</div>
                                        <a href="javascript:;" class="dropdown-item rounded">2 sidebars on 1 side</a>
                                        <a href="javascript:;" class="dropdown-item rounded">2 sidebars on 2 sides</a>
                                        <a href="javascript:;" class="dropdown-item rounded">3 sidebars</a>
                                    </div>
                            
                                    <div class="col-lg-4">
                                        <div class="font-weight-semibold border-bottom pb-2 mb-2">Layout</div>
                                        <a href="javascript:;" class="dropdown-item rounded">Static layout</a>
                                        <a href="javascript:;" class="dropdown-item rounded">Boxed page</a>
                                        <a href="javascript:;" class="dropdown-item rounded active">Liquid content</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </li>

        </ul>
    </div>

    <div class="d-flex flex-xl-1 justify-content-xl-end order-0 order-xl-1 pr-3">
        <ul class="navbar-nav navbar-nav-underline flex-row">
            <li class="nav-item">
                <a href="#notifications" class="navbar-nav-link navbar-nav-link-toggler" data-toggle="modal">
                    <i class="icon-bell2"></i> <span class="badge badge-mark border-pink bg-pink"></span>
                </a>
            </li>
        
            <li class="nav-item nav-item-dropdown-xl dropdown dropdown-user h-100">
                <a href="#" class="navbar-nav-link navbar-nav-link-toggler d-flex align-items-center h-100 dropdown-toggle"
                    data-toggle="dropdown">
                    <img src="{{ asset('assets/global/images/user-icon.png') }}" class="rounded-circle mr-xl-2" height="38" alt="">
                    <span class="d-none d-xl-block">{{ \Auth::user()->name }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right mr-2">
                    <a href="{{ route('sign-out') }}" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>

</div>