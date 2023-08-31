@extends('admin.layouts.app')
@section('heading', 'Payment Of Semester Fee')
@section('sub-heading', 'Payment Of Semester Fee')
@section('content')
    <style>
        .card {
            font-size: 16px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 30px;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 5px;
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
                                    <h3 class="text-center"><b>SEMESTER REGISTRATION PREVIEW</b></h3>

                                </div>
                                <form id="bputpaymentForm" method="POST"
                                    action="{{ route('semester-registration-final-submit') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="border border-primary mb-4 card">
                                        <div class="card-header">
                                            <h4 class="text-primary">STUDENT DETAILS</h4>
                                        </div>
                                        <div class="text-secondary card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6 "><span><b>Name of The Research
                                                                    Student:</b></span>
                                                        </div>
                                                        <div class="col-md-6"><span><b>{{ $info->name }}</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6 "><span><b>Name of The
                                                                    BPUT-NCR:</b></span>
                                                        </div>
                                                        <div class="col-md-6"><span><b>{{ $info->college_name }}</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <div class="row">
                                                        <div class="col-md-6 "><span><b>Name of The
                                                                    Department:</b></span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span><b>{{ $info->departments_title }}</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6 "><span><b>Title of PHD
                                                                    Work:</b></span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span><b>{{ $info->topic_of_phd_work }}</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6 "><span><b>Enrollment
                                                                    No.:</b></span>
                                                        </div>
                                                        <div class="col-md-6"><span><b>{{ $info->enrollment_no }}</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6 "><span><b>Date of
                                                                    Enrollment:</b></span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span><b>{{ $info->enrollment_date }}</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6 "><span><b>Registration.
                                                                    No.:</b></span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span><b>{{ $info->registration_no ? $info->registration_no : '-' }}</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6 "><span><b>Date of
                                                                    Registration:</b></span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span><b>{{ $info->registration_date ? $info->registration_date : '-' }}</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6 "><span><b>Name of the Research
                                                                    Supervisor:</b></span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <span><b>{{ $info->supervisor_name }}</b></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="border border-primary mb-4 card">
                                        <div class="card-header text-secondary">
                                            <h4 class="text-primary">COURSE WORK DETAILS</h4>
                                        </div>
                                        <div class="text-secondary card-body">
                                            <table class="">
                                                <tr>
                                                    <th>Serial No.</th>
                                                    <th>List of Coursework Assigned</th>
                                                    <th>Credits</th>
                                                    <th>Status</th>
                                                </tr>
                                                @foreach ($coursework_sub as $key => $val)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $val->course_title }}</td>
                                                        <td>{{ $val->credits }}</td>
                                                        <td>
                                                            @if ($val->status == 0)
                                                                On Going
                                                            @else
                                                                Completed
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>

                                        </div>
                                    </div>
                                    <div class="border border-primary mb-4 card">
                                        <div class="card-header text-secondary">
                                            <h4 class="text-primary">PAYMENT DETAILS</h4>
                                        </div>
                                        <div class="text-secondary card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="border border-primary mb-4 card">
                                                        <div class="header text-center">
                                                            <h5 class="text-primary">NCR PAYMENT DETAILS</h4>
                                                        </div>
                                                        <div class="text-secondary card-body">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6 "><span><b>Payment
                                                                                Mode:</b></span>
                                                                    </div>
                                                                    <div class="col-md-6"><span><b>
                                                                                @if ($payment_details->ncr_pmode == 'draft')
                                                                                    DRAFT
                                                                                @elseif($payment_details->ncr_pmode == 'cash')
                                                                                    CASH
                                                                                @elseif($payment_details->ncr_pmode == 'cheque')
                                                                                    CHEQUE
                                                                                @endif
                                                                            </b></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6 "><span><b>Bank
                                                                                Name:</b></span>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span><b>{{ $payment_details->ncr_pbank ? $payment_details->ncr_pbank : '-' }}</b></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6 "><span><b>Payment
                                                                                Date:</b></span>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span><b>{{ $payment_details->ncr_pdate }}</b></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6 "><span><b>Payment
                                                                                Amount:</b></span>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span><b>{{ $payment_details->ncr_pamount }}</b></span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6 "><span><b>Payment
                                                                                Receipt:</b></span>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <a href="javascript:void(0);"
                                                                            onclick="upload_image_view('{{ $payment_details->ncr_preceipt }}')"
                                                                            title="View NCR Payment Receipt">
                                                                            View Receipt
                                                                        </a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="border border-primary mb-4 card">
                                                        <div class="header text-center">
                                                            <h5 class="text-primary">BPUT PAYMENT DETAILS</h4>
                                                        </div>
                                                        <div class="text-secondary card-body">
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6 "><span><b>Payment
                                                                                Date:</b></span>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span><b>{{ $payment_details->bput_pdate }}</b></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6 "><span><b>Payment
                                                                                Amount:</b></span>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span><b>{{ $payment_details->bput_pamount }}</b></span>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="row">
                                                                    <div class="col-md-6 "><span><b>Payment
                                                                                Receipt:</b></span>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <a href="javascript:void(0);"
                                                                            onclick="upload_image_view('{{ route('semester-payment.payment', $payment_details->id) }}')"
                                                                            title="View NCR Payment Receipt">
                                                                            View Invoice
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if ($payemt_status && $payemt_status->status != 0)
                                        <div class="row mt-4 mb-2">
                                            <div class="sumb_btn text-center">
                                                <a href="{{ url()->previous() }}"
                                                    class="btn btn-primary waves-effect waves-light me-1"> Back</a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row mt-4 mb-2">
                                            <div class="sumb_btn text-center">
                                                <input type="hidden" name="app_id" value="{{ $payment_details->id }}">
                                                <input type="hidden" name="appl_id"
                                                    value="{{ $payment_details->appl_id }}">
                                                <input type="hidden" name="semester"
                                                    value="{{ $payment_details->semester }}">
                                                <input class="btn-lg btn-primary" type="submit" value="SUBMIT">
                                            </div>
                                        </div>
                                    @endif
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
    <div class="modal" tabindex="-1" id="upload_image_view">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close text-red" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="modal-body">
                    <div id="view_upload_image"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        function upload_image_view(url) {
            event.preventDefault();
            $('#view_upload_image').html('<embed src="' + url +
                '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
            $('#upload_image_view').modal('show');
        }
    </script>
@endsection
