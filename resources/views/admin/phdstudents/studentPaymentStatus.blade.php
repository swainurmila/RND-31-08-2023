@extends('admin.layouts.app')
@section('heading', 'Payment Status')
@section('sub-heading', 'Payment Status')
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

                                <h2 class="text-center text-success mb-4">Your Payment Has Been Done !!</h2>
                                <h5 class="text-center mb-2">your payment id : <b
                                        class="text-warning">{{ $payment_id }}</b></h5>
                                <h5 class="text-center  mb-2">Payment Status : <b
                                        class="text-warning">{{ $payment_status }}</b></h5>
                                <h5 class="text-center  mb-2">Payment Request Id : <b
                                        class="text-warning">{{ $payment_request_id }}</b></h5>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
