@include('admin.layouts.header')
@include('admin.partials.navigation') 
@include('admin.partials.sidebar')
<style>
.print {
    width: 100px;
    margin: 0 auto;
}
    </style>
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
         @include('admin.partials.breadcrumb')
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <!-- cta -->
                                <div class="panel-container show" role="content"><div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                                    <div class="panel-content">                                 
                                        <form method="post" class="comm_frm prev_wrap">
                                            <div class="input_wrap preview_form">
                                                <h4 style="text-align: center;text-decoration: underline;"><b>Verification Of Candidate by Head, NCR</b> </h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p>the application and all documents, certificates and manuscript etc of the Candidate <b>{{$student->name}}</b> has been verified with the orginals in the Department of __________ NCR ______________ and are found to be correct.</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6"> <p>Signature of Head the Deptt./ NCR</p> 
                                                        <b><span>co-chairperson</span></b>
                                                    </div>
                                                    <div class="col-md-6" style="text-align: right;">
                                                        <p>Signature of Head of the Institution (NCR) </p>
                                                        <b><span>(chairperson)</span></b>
                                                    </div>
                                                </div>
                                                <div class="row" style="text-align: center;">
                                                    <button type="button" class="btn btn-success waves-effect waves-themed print"
                                                    onclick="window.print();">Print</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                    
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>                   <!-- end row -->    
        </div>      
    </div>
</div>
@include('admin.layouts.footer'); 
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
            


            


            




{{-- @section('js')
@endsection --}}

