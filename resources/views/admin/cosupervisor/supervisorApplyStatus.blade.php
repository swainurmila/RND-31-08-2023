@extends('admin.layouts.app')
@section('heading', 'Co-Supervisor Application Info')
@section('sub-heading', 'Co-Supervisor Application Info')
@section('content')



<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <!-- cta -->
                    <div class="panel-container show" role="content"><div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                    @if ($draft_status == 1)
                    <div class="panel-content">                                 
                        <h1>Form Incomplete</h1>
                        <a href="{{ route('cosup.education.view',[$user_id])}}">click here to complete your form</a>
                    </div>
                    @endif 
                    @if ($draft_status == 2 )
                    <div class="panel-content">                                 
                        <h1>Form Incomplete</h1>
                        <a href="{{ route('cosup.journal.view',[$user_id])}}">click here to complete your form</a>
                    </div>
                    @endif 
                    @if ($draft_status == 3 )
                    <div class="panel-content">                                 
                        <h1>Form Incomplete</h1>
                        <a href="{{ route('cojournal.draft.view',[$user_id])}}">click here to complete your form</a>
                    </div>
                    @endif 
                    
                    @if ($draft_status == 4)
                    <div class="panel-content">                                 
                        <h1>you have already applied</h1>
                        @php
                        if($supervisorDetails->application_status == 1){
                            $status = 'Pending at Control Cell';
                        }elseif($supervisorDetails->application_status == 2){
                            $status = 'Pending at VC';
                        }elseif($supervisorDetails->application_status == 3){
                            $status = 'Rejected by R&D control cell';
                        }elseif($supervisorDetails->application_status == 4){
                            $status = 'Approved By VC';
                        }elseif($supervisorDetails->application_status == 5){
                            $status = 'Rejected by VC';
                        } 
                        @endphp
                        <p>status: your status {{$status}} <a href="#">View</a></p>
                    </div>
                    @endif
                        
                    </div>
                        
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div> 
     
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

@endsection
