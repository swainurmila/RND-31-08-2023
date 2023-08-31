{{-- @php
    dd(session('userdata'));
@endphp --}}
@extends('admin.layouts.app')
@section('content')
    <style>
        .blink_me {
            animation: blinker 15s linear infinite;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
    </style>
    
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="fw-normal mt-0 text-truncate" title="Campaign Sent">PHD Application</h5>
                            <h3 class="my-2 py-1"><span data-plugin="counterup">{{$stu_paid->count()}}</span></h3>
                            {{-- <p class="mb-0 text-muted">
                                <span class="text-success me-2"><span class="mdi mdi-arrow-up-bold"></span> 5.27%</span>
                                <span class="text-nowrap">Since last month</span>
                            </p> --}}
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-soft-primary rounded">
                                <i class="ri-stack-line font-20 text-primary"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="fw-normal mt-0 text-truncate" title="New Leads">PHD Students</h5>
                            <h3 class="my-2 py-1"><span data-plugin="counterup">{{$stu_appaly->count()}}</span></h3>
                            
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-soft-primary rounded">
                                <i class="ri-slideshow-2-line font-20 text-primary"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="fw-normal mt-0 text-truncate" title="Deals">Supervisor Application</h5>
                            <h3 class="my-2 py-1"><span data-plugin="counterup">{{$sup_appaly->count()}}</span></h3>
                            
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-soft-primary rounded">
                                <i class="ri-hand-heart-line font-20 text-primary"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h5 class="fw-normal mt-0 text-truncate" title="Booked Revenue">Supervisor Enlisted</h5>
                            <h3 class="my-2 py-1"><span data-plugin="counterup">{{$sup_list->count()}}</span></h3>
                            
                        </div>
                        <div class="avatar-sm">
                            <span class="avatar-title bg-soft-primary rounded">
                                <i class="ri-money-dollar-box-line font-20 text-primary"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>


    
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">Department wise PHD Students</h4>
                        {{-- <div class="btn-group mb-2">
                            <button type="button" class="btn btn-xs btn-light active">Today</button>
                            <button type="button" class="btn btn-xs btn-light">Weekly</button>
                            <button type="button" class="btn btn-xs btn-light">Monthly</button>
                        </div> --}}
                    </div>
                    <div class="mt-3" dir="ltr">
                        <div id="campaigns-chart2" class="apex-charts" data-colors="#27d4e3,#d9d615,#f56d15,#de417f,#2c77a2,#b874bf,#fd5e8f,#25097a,#4d0662,#1d6266"></div>
                    </div>
                    <div class="graph_wrap text-center mt-2">
                        @php
                            $color = $color;
                           // dd($color);
                          
                           $numbers = $numbers;
                           //dd($numbers);
                           $i = 0;
                        @endphp
                        @foreach ($department as $key => $item) 
                        {{-- {{ $key++;}} --}}
                        
                        <div class="graph_wrap_sub">
                            <h4 class="fw-normal">
                                <span>{{$numbers[$i++]}}</span>
                            </h4>
                            <p class="text-muted mb-0 mb-2 g_lable"><i
                                    class="mdi mdi-checkbox-blank-circle" style="color:{{$color[$key++]}}"></i>{{$item->departments_title}}</p>
                        </div>
                        @endforeach
                        
                        {{-- <div class="col-md-4">
                            <h4 class="fw-normal mt-3">
                                <span>3,487</span>
                            </h4>
                            <p class="text-muted mb-0 mb-2"><i
                                    class="mdi mdi-checkbox-blank-circle text-success"></i> Reached</p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="fw-normal mt-3">
                                <span>1,568</span>
                            </h4>
                            <p class="text-muted mb-0 mb-2"><i
                                    class="mdi mdi-checkbox-blank-circle text-primary"></i> Opened</p>
                        </div> --}}
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-widgets">
                            <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                            <a data-bs-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false" aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                            <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                        </div>
                        <h4 class="header-title mb-0">Year Wise PHD Students</h4>

                        <div id="cardCollpase5" class="collapse pt-3 show" dir="ltr">
                            <div id="apex-column-1" class="apex-charts" data-colors="#005fa7,#1abc9c,#CED4DC"></div>
                        </div> <!-- collapsed end -->
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    {{-- <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Settings</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                        </div>
                    </div> --}}
                    <h4 class="header-title mb-3">Nodal Center List</h4>

                    <div class="table-responsive">
                        <table class="table table-striped table-nowrap table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Sl.no</th>
                                    <th>College Name</th>
                                    <th>Enroll Student Count</th>
                                   

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nodal_list  as $key => $item)
                                    <tr>
                                        <td>{{ ++$key}}</td>
                                        <td>
                                            <h5 class="font-14 mt-0 mb-1 fw-normal">{!! Str::limit($item->college_name, 10, ' ...') !!}</h5>
                                            {{-- <span class="text-muted font-13">Senior Sales Executive</span> --}}
                                        </td>
                                        @php
                                            $count = \App\Models\PhdApplicationInfo::where('nodal_id',$item->id)->count();
                                        @endphp
                                        <td>{{$count}}</td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                        
                    </div> <!-- end table-responsive-->
                    <div class="row">    
                        <div class="col-auto d-grid mt-2">
                            <a class="btn btn-primary cust_btn" href="{{ route('nodal') }}">View all</a>
                        </div>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div>
        <!-- end col-->

        <div class="col-xl-7">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                           
                            <h4 class="header-title mb-4">Enlisted Supervisor List</h4>
                            @foreach ($supervisor_list as $item)
                            <div class="d-flex">
                               
                                <img class="avatar-sm align-self-center me-3 rounded-circle"  src="{{$item->photo == '' ? asset('/admin_assets/images/account.jpg') : asset('/upload/employee_photo/'.$item->photo)}}"  alt="Generic placeholder image">
                                <div class="flex-1">
                                    <span class="badge badge-soft-warning float-end">Supervisor</span>
                                    <h5 class="mt-0 mb-1">{{$item->name}}</h5>
                                    <span class="text-muted font-13">{{$item->email}}</span>
                                </div>
                            </div>
                            @endforeach
                            
                            <div class="row">    
                                <div class="col-auto d-grid mt-4">
                                    <a class="btn btn-primary cust_btn" href="{{ route('control-cell.sup-all-application') }}">View all</a>
                                </div>
                            </div>
                            
                        </div>
                        <!-- end card-body -->
                        
                    </div>
                    <!-- end card-->
                </div>
                <!-- end col -->  
                
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                           
                            <h4 class="header-title mb-4">PHD Department List</h4>

                            <div class="table-responsive">
                                <table class="table table-striped table-nowrap table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Department Name</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($department->take(3) as $item)
                                        <tr>
                                            <td>
                                                <h5 class="font-14 mt-0 mb-1 fw-normal">{{ $item->departments_title }}</h5>
                                                {{-- <span class="text-muted font-13">Senior Sales Executive</span> --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                        
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive-->
                            <div class="row">    
                                <div class="col-auto d-grid mt-2 text-center">
                                    <a class="btn btn-primary cust_btn" href="{{ route('control-cell.departments') }}">View all</a>
                                </div>
                            </div>
                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card-->
                </div>
                <!-- end col -->  
            </div><!-- end row-->
        </div>
        <!-- end col-->
    </div>
    <!-- end row-->
@endsection

@section('js')
    <script>
var colors = ['#3bafda','#1abc9c', '#CED4DC'];
var dataColors = $("#apex-column-1").data('colors');
if (dataColors) {
    colors = dataColors.split(",");
}
var options = {
    chart: {
        height: 380,
        type: 'bar',
        toolbar: {
            show: false
        }
    },
    plotOptions: {
        bar: {
            horizontal: false,
            endingShape: 'rounded',
            columnWidth: '55%',
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        show: true,
        width: 2,
        colors: ['transparent']
    },
    colors: colors,
    series: [{
        name: 'PHD Student',
        data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
    }],
    xaxis: {
        categories: ['2018', '2019', '2020', '2021', '2022', '2023', '2024', '2025', '2026'],
    },
    legend: {
        offsetY: 5,
    },
    yaxis: {
        title: {
            text: 'as (Percent)'
        }
    },
    fill: {
        opacity: 1

    },
    grid: {
        row: {
            colors: ['transparent', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.2
        },
        borderColor: '#f1f3fa',
        padding: {
            bottom: 10
        }
    },
    tooltip: {
        y: {
            formatter: function (val) {
                return  val + " Percent"
            }
        }
    }
}

var chart = new ApexCharts(
    document.querySelector("#apex-column-1"),
    options
);

chart.render();

// ===================

var department_title = [{!! $dep_title !!}];
var colors = ["#ea54ce", "#8ea310", "#986281", "#e1566c", "#daf0b5", "#291b2e","#a0c8a6", "#b40e11", "#173f8d","#eab3c3"];
var dataColors = $("#campaigns-chart2").data('colors');
if (dataColors) {
    colors = dataColors.split(",");
}

//console.log()
var options = {
    chart: {
        height: 280,
        type: 'donut',
    },
    series: [44,55,41,26,63,14,23,44,36,12],
    legend: {
        show: false,
        position: 'bottom',
        horizontalAlign: 'center',
        verticalAlign: 'middle',
        floating: false,
        fontSize: '14px',
        offsetX: 0,
        offsetY: 7
    },
    labels: department_title,
    colors: colors,
    responsive: [{
        breakpoint: 600,
        options: {
            chart: {
                height: 210
            },
            legend: {
                show: false
            },
        }
    }],
}

var chart = new ApexCharts(
    document.querySelector("#campaigns-chart2"),
    options
);

chart.render();
        </script>
@endsection
