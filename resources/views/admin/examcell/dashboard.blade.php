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
    
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="header-title">PHD Entrance Complete Applications VS Incomplete Applications</h4>
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
                    {{-- @foreach ($department as $key => $item) 
                    <div class="graph_wrap_sub">
                        <h4 class="fw-normal">
                            <span>{{$numbers[$i++]}}</span>
                        </h4>
                        <p class="text-muted mb-0 mb-2 g_lable"><i
                                class="mdi mdi-checkbox-blank-circle" style="color:{{$color[$key++]}}"></i>{{$item->departments_title}}</p>
                    </div>
                    @endforeach --}}
                </div>
            </div>
        </div> <!-- end card-->
    </div> <!-- end col -->
@endsection

@section('js')
<script>
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
        type: 'pie',
    },
    series: [{!! $phd_entrance_selected !!}, {!! $phd_entrance_applied !!}],
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
    labels:['complete applications', 'incomplete applications'],
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
