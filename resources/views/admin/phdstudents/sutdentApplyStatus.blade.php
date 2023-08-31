@extends('admin.layouts.app')
@section('heading', 'Apply Form Status')
@section('sub-heading', 'Form Status')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <div class="panel-container show" role="content">
                                <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                                @if ($draft_status == 1)
                                    <div class="panel-content p-4">
                                        <h1>Form Incomplete</h1>
                                        <a href="{{ route('draft.info', [$appl_details->id]) }}">click here to complete your form</a>
                                    </div>
                                @elseif ($draft_status == 2)
                                    <div class="panel-content p-4">
                                        <h1 class="text-center mb-4">Your application has been submitted successfully</h1>
                                        <h5 class="text-center"><span class="text-danger"> Status:</span> Payment pending <b
                                                class="text-success"></b> </h5>
                                        <p class="text-center"><a class="btn btn-primary waves-effect waves-light"
                                                href="{{ route('student.view', [$appl_details->id]) }}">Click Here To Payment</a></p>
                                    </div>
                                
                                @elseif ( ($draft_status == 3) && ($appl_details->application_status == 1) )
                                <div class="panel-content p-4">
                                    <h3 class="text-center mb-4">Your have already applied for this post.</h3>
                                    <h5 class="text-center  mb-2">Enrollment No: <b
                                        class="text-warning">{{ $appl_details->enrollment_no }}</b></h5>
                                    <h5 class="text-center  mb-2">Application pending at: <b
                                            class="text-warning">Nodal Centre</b></h5>

                                            <a class="btn btn-primary cust_btn" href="{{ route('invoice', [$appl_details->id]) }}">View Invoice
                                                all</a>
                                
                                </div>
                                @else 
                                <div class="panel-content p-4">
                                    <h3 class="text-center mb-4">Final submit of your applicaion is pending.</h3>
                                    <p class="text-center"><a class="btn btn-primary waves-effect waves-light"
                                        href="{{ route('student.view', [$appl_details->id]) }}">Click Here To Final Submit</a></p>
                                </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
