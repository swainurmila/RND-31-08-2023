@extends('admin.layouts.app')
@section('heading', 'PAYMENT DETAILS OF SEMESTER FEE')
@section('sub-heading', 'PAYMENT DETAILS OF SEMESTER FEE')
@section('content')
<div class="container-fluid">
            <!-- start page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <div class="panel-container show" role="content">
                                <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                                    <div class="panel-content p-4">
                                        <h1 class="text-center mb-4">Your application has been submitted successfully</h1>
                                        <h5 class="text-center"><span class="text-danger"> Status:</span> Payment pending <b class="text-success"></b> </h5>
                                        <?php if(empty($payemt_details->transaction_id_bput)){ ?>
                                            <p class="text-center"><a href="{{url('phdstudent/final-payment-student/'.$id.'/bput') }}" class="btn btn-primary waves-effect waves-light">Click Here To Payment BPUT</a></p>
                                        <?php }elseif(empty($payemt_details->transaction_id_college)){ ?>
                                            <p class="text-center"><a href="{{url('phdstudent/final-payment-student/'.$id.'/college')}}" class="btn btn-primary waves-effect waves-light">Click Here To Payment College</a></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection      
@section('js')
<script>
</script>
@endsection