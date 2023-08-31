@extends('admin.layouts.app')
@section('heading', 'Payment Of Semester Fee')
@section('sub-heading', 'Payment Of Semester Fee')
@section('content')
    <style>
        .card {
            font-size: 16px;
        }
    </style>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
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
                                <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                                <div class="section-title form-section-title mb-3">
                                    <h3 class="text-center"><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA,
                                            ROURKELA</b></h3>
                                    <h4 class="text-center"><u><b>SEMESTER REGISTRATION FORM FOR Ph.D. PROGRAMME</b></u>
                                    </h4>
                                </div>
                                <div class="panel-content p-4">
                                    <form id="paymentForm" method="POST"
                                        action="{{ route('semester-registration-payment-submit') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        {{-- <div class="text-black border-primary card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <span>
                                                            <h5>All the semester dues till date has
                                                                been cleared upto date and copies
                                                                are enclosed:</h5>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-5 mt-1">
                                                        <input class="form-check-input" type="radio" name="reg_status"
                                                            id="reg_status" value="1"> <b>Yes</b>
                                                        &nbsp;
                                                        <input class="form-check-input" type="radio" name="reg_status"
                                                            id="reg_status" value="0"> <b>No</b>
                                                        <div id="clearance_form">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <div class="border border-primary mb-2 card">
                                            <div class="card-header">
                                                <h4 class="text-primary">NCR PAYMENT DETAILS</h4>
                                            </div>
                                            <div class="text-primary card-body">
                                                <div class="ncr-payment">
                                                    @if ($sem_payment->ncr_preceipt == '')
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="elapsed_month">Mode of Payment</label>
                                                                <select class="form-control" id="payment_mode"
                                                                    placeholder="Name Of NCR." name="payment_mode">
                                                                    <option value="">---select----</option>
                                                                    <option value="cash">CASH</option>
                                                                    <option value="draft">DRAFT</option>
                                                                    <option value="cheque">CHEQUE</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div id="paymentFieldsContainer">
                                                                    <label for="elapsed_month">Bank Name</label>
                                                                    <input type="text" class="form-control "
                                                                        id="ncr_pbank" name="ncr_pbank" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-1">
                                                            <div class="col-md-6">
                                                                <label for="elapsed_month">Payment Amount</label>
                                                                <input type="text" class="form-control" id="ncr_pamount"
                                                                    name="ncr_pamount" value="7000" readonly>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="elapsed_month">Payment Date</label>
                                                                <input type="date" class="form-control" id="ncr_pdate"
                                                                    name="ncr_pdate" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-1">
                                                            <div class="col-md-6">
                                                                <label for="elapsed_month">Payment Receipt</label>
                                                                <input type="file" class="form-control" id="ncr_preceipt"
                                                                    name="ncr_preceipt" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-4 mb-2">
                                                            <div class="sumb_btn text-center">
                                                                <input type="hidden" name="app_id"
                                                                    value="{{ $sem_payment->id }}">
                                                                <input type="hidden" name="appl_id"
                                                                    value="{{ $sem_payment->appl_id }}">
                                                                <input class="btn btn-primary" type="submit"
                                                                    value="PAY">
                                                            </div>
                                                        </div>
                                                        @else
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6 text-primary"><span ><b>Payment Mode:</b></span>
                                                                </div>
                                                                <div class="col-md-6"><span><b>@if($sem_payment->ncr_pmode == 'draft')
                                                                    DRAFT
                                                                    @elseif($sem_payment->ncr_pmode == 'cash')
                                                                    CASH
                                                                    @elseif($sem_payment->ncr_pmode == 'cheque')
                                                                    CHEQUE
                                                                    @endif</b></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6 text-primary"><span><b>Bank Name:</b></span>
                                                                </div>
                                                                <div class="col-md-6"><span><b>{{ $sem_payment->ncr_pbank ? $sem_payment->ncr_pbank : '-'}}</b></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6 text-primary"><span><b>Payment Date:</b></span>
                                                                </div>
                                                                <div class="col-md-6"><span><b>{{ $sem_payment->ncr_pdate }}</b></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="row">
                                                                <div class="col-md-6 text-primary"><span><b>Payment Amount:</b></span>
                                                                </div>
                                                                <div class="col-md-6"><span><b>{{ $sem_payment->ncr_pamount }}</b></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <form id="bputpaymentForm" method="POST"
                                        action="{{ route('semester-bput-payment-submit') }}" enctype="multipart/form-data">
                                        @csrf
                                        <br>
                                        <div class="border border-primary mb-4 card">
                                            <div class="card-header">
                                                <h4 class="text-primary">BPUT PAYMENT DETAILS</h4>
                                            </div>
                                            <div class="text-primary card-body">
                                                <div class="ncr-payment">
                                                    <div class="row mt-1">
                                                        <div class="col-md-6">
                                                            <label for="elapsed_month">Payment Amount</label>
                                                            <input type="text" class="form-control" id="bput_pamount"
                                                                name="bput_pamount" value="3000" readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="elapsed_month">Payment Date</label>
                                                            <input type="date" class="form-control" id="bput_pdate"
                                                                name="bput_pdate" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-4 mb-2">
                                                <div class="sumb_btn text-center">
                                                    <input type="hidden" name="appl_id"
                                                        value="{{ $sem_payment->appl_id }}">
                                                    <input type="hidden" name="app_id" value="{{ $sem_payment->id }}">
                                                    <input class="btn btn-primary" type="submit" value="PAY">
                                                </div>
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
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            // Form validation
            $('#paymentForm').validate({
                errorElement: 'span', // Specify the element to be used for error messages
                errorClass: 'text-danger', // Specify the CSS class for error messages
                rules: {
                    reg_status: {
                        required: true
                    },
                    payment_mode: {
                        required: true
                    },

                    ncr_pamount: {
                        required: true
                    },
                    ncr_pdate: {
                        required: true
                    },
                    ncr_preceipt: {
                        required: true,
                        extension: "jpg|jpeg|pdf|png",
                        filesize: 500
                    },
                },
                messages: {
                    reg_status: {
                        required: "Please select an option."
                    },
                    payment_mode: {
                        required: "Please select a payment mode."
                    },

                    ncr_pamount: {
                        required: "Please enter the payment amount."
                    },
                    ncr_pdate: {
                        required: "Please enter the payment date."
                    },
                    ncr_preceipt: {
                        required: "Please upload a receipt.",
                        extension: "Please upload a file with a valid format (jpg, jpeg, pdf, png).",
                        filesize: "The file size must be less than or equal to 500 KB."
                    },
                },
                errorPlacement: function(error, element) {
                    // Add error messages after the respective input fields
                    error.insertAfter(element);
                }
            });
            $('#bputpaymentForm').validate({
                errorElement: 'span', // Specify the element to be used for error messages
                errorClass: 'text-danger', // Specify the CSS class for error messages
                rules: {
                    bput_pamount: {
                        required: true
                    },
                    bput_pdate: {
                        required: true
                    }
                },
                messages: {
                    bput_pamount: {
                        required: "Please enter the payment amount."
                    },
                    bput_pdate: {
                        required: "Please enter the payment date."
                    }
                },
                errorPlacement: function(error, element) {
                    // Add error messages after the respective input fields
                    error.insertAfter(element);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#paymentFieldsContainer').hide();
            $('#payment_mode').change(function() {
                var selectedOption = $(this).val();
                if (selectedOption === 'draft' || selectedOption === 'cheque') {
                    $('#paymentFieldsContainer').show();
                } else {
                    $('#paymentFieldsContainer').hide();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#clearance_form').hide();
            $('input[name="reg_status"]').change(function() {
                var selectedValue = $(this).val();
                if (selectedValue === '1') {
                    $('#clearance_form').show();
                } else {
                    $('#clearance_form').hide();
                }
            });
        });
    </script>


    {{-- <script>
        // Show/hide payment fields based on selected option
        $('#payment_mode').change(function() {
            var selectedOption = $(this).val();
            if (selectedOption === 'draft' || selectedOption === 'cheque') {
                $('#paymentFieldsContainer').show();
            } else {
                $('#paymentFieldsContainer').hide();
            }
        });

        // Show/hide clearance form based on selected option
        $('input[name="reg_status"]').change(function() {
            var selectedValue = $(this).val();
            if (selectedValue === '1') {
                $('#clearance_form').show();
            } else {
                $('#clearance_form').hide();
            }
        });
    </script> --}}



@endsection
