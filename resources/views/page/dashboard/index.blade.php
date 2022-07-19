@extends('app')

@section('content')


<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">

        <div class="d-flex">
            <div class="page-title">
                <h4 class="font-weight-semibold">
                    Dashboard
                </h4>
            </div>
            <a href="#" class="header-elements-toggle text-body d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none py-0 mb-3 mb-md-0"></div>
    </div>
</div>
<!-- /page header -->


<!-- Content area -->
<div class="content pt-0">

    <!-- Blocks with chart -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex pb-1">
                    <div>
                        <span class="card-title font-weight-semibold">Total User</span>
                        <h2 class="font-weight-bold mb-0">{{ $count->user }} <small class="text-success font-size-base ml-2"></small></h2>
                    </div>

                    <div class="dropdown ml-auto">
                        <a href="#" data-toggle="dropdown"
                            class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill"><i
                                class="icon-more2"></i></a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('user') }}" class="dropdown-item"><i class="icon-file-eye"></i> View data user</a>
                        </div>
                    </div>
                </div>
                <div class="chart-container">
                    <div class="chart" id="area_gradient_blue" style="height: 100px"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex pb-1">
                    <div>
                        <span class="card-title font-weight-semibold">Total Vehicle</span>
                        <h2 class="font-weight-bold mb-0">{{ $count->vehicle }} <small class="text-success font-size-base ml-2"></small></h2>
                    </div>

                    <div class="dropdown ml-auto">
                        <a href="#" data-toggle="dropdown"
                            class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill"><i
                                class="icon-more2"></i></a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('vehicle') }}" class="dropdown-item"><i class="icon-file-eye"></i> View data vehicle</a>
                        </div>
                    </div>
                </div>

                <div class="chart-container">
                    <div class="chart" id="area_gradient_orange" style="height: 100px"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex pb-1">
                    <div>
                        <span class="card-title font-weight-semibold">Total Driver</span>
                        <h2 class="font-weight-bold mb-0">{{ $count->driver }} <small class="text-danger font-size-base ml-2"></small></h2>
                    </div>

                    <div class="dropdown ml-auto">
                        <a href="#" data-toggle="dropdown"
                            class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill"><i
                                class="icon-more2"></i></a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('driver') }}" class="dropdown-item"><i class="icon-file-eye"></i> View data driver</a>
                        </div>
                    </div>
                </div>

                <div class="chart-container">
                    <div class="chart" id="area_gradient_green" style="height: 100px"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /blocks with chart -->

    <div class="row">
        
        <div class="col-xl-8">

            <!-- Annual sales report -->
            <div class="card">
                <div class="card-header d-flex py-0">
                    <h6 class="card-title font-weight-semibold py-3">Chart usage vehicle by request</h6>

                    <div class="dropdown align-self-center ml-auto">
                        <a href="#" data-toggle="dropdown"
                            class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill">
                            <i class="icon-more2"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('vehicle-request') }}" class="dropdown-item"><i class="icon-file-eye"></i> View vehicle request</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="chart-container">
                        <div class="chart" id="bars_usage" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
            <!-- /annual sales report -->

        </div>
        
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header d-flex pb-1">
                    <div>
                        <span class="card-title font-weight-semibold">Total vehicle request</span>
                        <h2 class="font-weight-bold mb-0">{{ $count->vehicle_request }}<small class="text-success font-size-base ml-2"></small></h2>
                    </div>

                    <div class="dropdown ml-auto">
                        <a href="#" data-toggle="dropdown"
                            class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill"><i
                                class="icon-more2"></i></a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('vehicle-request') }}" class="dropdown-item"><i class="icon-file-eye"></i> View data vehicle request</a>
                        </div>
                    </div>
                </div>

                <div class="chart-container">
                    <div class="chart" id="area_gradient_blue" style="height: 100px"></div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header d-flex pb-1">
                    <div>
                        <span class="card-title font-weight-semibold">Total vehicle request (Waiting)</span>
                        <h2 class="font-weight-bold mb-0">{{ $count->vehicle_request_waiting }} <small class="text-success font-size-base ml-2"></small></h2>
                    </div>

                    <div class="dropdown ml-auto">
                        <a href="#" data-toggle="dropdown"
                            class="btn btn-outline-light btn-icon btn-sm text-body border-transparent rounded-pill"><i
                                class="icon-more2"></i></a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('vehicle-request') }}" class="dropdown-item"><i class="icon-file-eye"></i> View data vehicle request (Waiting)</a>
                        </div>
                    </div>
                </div>

                <div class="chart-container">
                    <div class="chart" id="area_gradient_blue" style="height: 100px"></div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /content area -->
           

@endsection


@section('plugins')

    <!-- Theme JS files -->
    <script src="{{ asset('assets/global/js/plugins/visualization/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/global/js/demo_charts/pages/dashboard_6/light/area_gradient.js') }}"></script>
    <!-- /theme JS files -->
    
@endsection


@section('script')
    <script type="text/javascript">

        var bars_grouped_element = document.getElementById('bars_usage');

        if (bars_grouped_element) {

            var bars_grouped = echarts.init(bars_grouped_element);

            var legendColor = '#777',
                legendFontSize = 12,
                tooltipShadowColor = 'rgba(0,0,0,0.05)',
                axisLabelColor = '#777',
                axisLineColor = '#ddd',
                axisSplitLineColor = '#eee',
                barColor1 = '#1990FF',
                barColor2 = '#65bc6a';

            bars_grouped.setOption({

                textStyle: {
                    fontFamily: 'Roboto, Arial, Verdana, sans-serif',
                    fontSize: 14
                },

                tooltip: {
                    trigger: 'axis',
                    formatter: 'Usage in {b}',
                    padding: [10, 15],
                    axisPointer: {
                        type: 'shadow',
                        shadowStyle: {
                            color: tooltipShadowColor
                        },
                        z: -1
                    }
                },

                grid: {
                    left: '10',
                    right: '10',
                    bottom: '0',
                    top: '0',
                    containLabel: true
                },

                legend: {
                    show: false,
                    left: 'center',
                    icon: 'circle',
                    bottom: '0',
                    itemGap: 16,
                    itemHeight: 10,
                    data: [
                        {
                            name:'Forecasted'
                        },
                        {
                            name:'Actual'
                        }
                    ],
                    textStyle: {
                        color: legendColor,
                        legendFontSize: legendFontSize
                    }
                },

                xAxis: {
                    type: 'category',
                    data: ['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sep', 'Oct', 'Nov','Dec'],
                    axisLabel: {
                        textStyle: {
                            color: axisLabelColor
                        }
                    },
                    axisTick:{
                        show: false
                    },
                    axisLine:{
                        lineStyle:{
                            color: axisLineColor
                        }
                    },
                    splitLine: {
                        show: false
                    }
                },

                yAxis: {
                    type: 'value',
                    axisLabel: {
                        show: false,
                        textStyle: {
                            color: axisLabelColor
                        }
                    },
                    axisLine:{
                        show: false
                    },
                    axisTick:{
                        show: false
                    },
                    splitLine: {
                        show: true,
                        lineStyle: {
                            color: axisSplitLineColor,
                            type: 'dashed'
                        }
                    }
                },

                series: [
                    {
                        name: 'Actual',
                        type: 'bar',
                        // data: [30, 45, 55, 60, 62, 72, 80, 62, 60, 55, 45, 30],
                        data: {{$data_chart}},

                        barWidth: 10,
                        barGap: '10%',
                        itemStyle: {
                            normal: {
                                show: true,
                                color: barColor2,
                                 barBorderRadius: [20, 20, 0, 0]
                            },
                            emphasis: {
                                color: barColor2
                            }
                        }
                    }
                ]
            });
        }
    
    </script>
@endsection
