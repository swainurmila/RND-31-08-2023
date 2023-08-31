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

    @php
        // ->orderBy('desc', 'id')
        $data = DB::table('phd_application_info')
            ->where('stud_id', session('userdata')['userID'])
            ->orderBy('id', 'desc')
            ->first();
    @endphp
    @if ($data != '' && $data->application_status == 6)
        <div class="blink_me">
            <div class="row">
                <div class="col-md-5">
                    <a href="#">
                        <div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show"
                            role="alert">
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                            <span>Now You are eligible to Pay for the registration <span
                                    class="badge bg-danger float-end">New</span></span>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <div class="panel-container show" role="content">
                                <h1>Welcome PHD Student Dashboard</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('js')
@endsection
