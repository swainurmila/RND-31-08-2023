@extends('admin.layouts.app')
@section('heading', 'Recipt')
@section('sub-heading', 'Paymetn Recipt')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Logo & title -->
                    <div class="clearfix">
                        <div class="float-start">
                            <div class="auth-logo">
                                <a href="/" class="logo logo-dark">
                                    <span class="logo-lg">
                                        <img src="{{ asset('admin_assets/images/BPUT.jpg') }}" alt=""
                                            height="22" style="max-width:60px;">
                                    </span>
                                    <span></span>
                                </a>

                            </div>
                        </div>
                        <div class="float-end">
                            <h4 class="m-0 d-print-none">Invoice</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-3">
                                <p><b>Hello, {{$student->name}}</b></p>
                                
                            </div>

                        </div><!-- end col -->
                        <div class="col-md-4 offset-md-2">
                            <div class="mt-3 float-end">
                                <p class="m-b-1
                                0"><b>Enrollment No. : </b> <span class="float-end">
                                        &nbsp;&nbsp;&nbsp;&nbsp; {{$student->enrollment_no}}</span></p>
                                <p class="m-b-10"><strong>Status : </strong>
                                    @if ($transaction->amount == 3000)

                                    @else
                                     <span class="float-end"><span
                                            class="badge bg-danger">Pending To Nodal</span></span>
                                    @endif        
                                        </p>
                                {{-- <p class="m-b-10"><strong>Order No. : </strong> <span class="float-end">000013 </span></p> --}}
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->



                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table mt-4 table-centered">
                                    <thead>
                                        <tr>
                                            <th colspan="5"><h4 class="text-center">Payment Details</h4></th>
                                        </tr>
                                        <tr>
                                            <th>#</th>
                                            <th>Form Name</th>
                                            <th >Transaction Id</th>
                                            <th >Transaction Date</th>
                                            <th >Transaction Type</th>
                                            {{-- @if ($transaction->amount == 3000)
                                            <th >NCR Fee</th>
                                            @endif --}}
                                            <th class="text-end">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                @if ($transaction->amount == 3000)
                                                  <b>Semester Registration Fee </b>  
                                                @else
                                                <b>Apllication fee for Phd student application</b>
                                                @endif
                                                
                                            </td>
                                            <td>{{$transaction->transaction_id}}</td>
                                            <td>{{$transaction->transaction_date}}</td>
                                            <td>{{$transaction->transaction_response}}</td>
                                            {{-- @if ($transaction->amount == 3000)
                                            <th><a href="javascript:void(0)"
                                                onclick="upload_image_view('/upload/ncr_fees_invoice/{{ $appl_id->ncr_fee_file }}')">
                                                View File</a> </th>
                                            @endif --}}
                                            <td class="text-end">{{$transaction->amount}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> <!-- end table-responsive -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="clearfix pt-5">
                                <h6 class="text-muted">Notes:</h6>

                                <small class="text-muted">
                                    All accounts are to be paid within 7 days from receipt of
                                    invoice. To be paid by cheque or credit card or direct payment
                                    online. If account is not paid within 7 days the credits details
                                    supplied as confirmation of work undertaken will be charged the
                                    agreed quoted fee noted above.
                                </small>
                            </div>
                        </div> <!-- end col -->
                        
                    </div>
                    <!-- end row -->

                    <div class="mt-4 mb-1">
                        <div class="text-end d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light me-1"><i
                                    class="mdi mdi-printer me-1"></i> Print</a>
                            {{-- <a href="#" class="btn btn-success waves-effect waves-light">Submit</a> --}}
                        </div>
                    </div>
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

    <div class="modal fade" id="upload_image_view" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollableModalTitle">View Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="view_upload_image">
                        {{-- <img src="" alt="Upload_img" class="img-responsive card-img-top" id="view_upload_image">
                                                            <embed src="" frameborder="0" width="100%" id="view_upload_image" height="400px"> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('js')
    <script>
         function upload_image_view(url) {
            // alert(url);
            event.preventDefault();
            $('#view_upload_image').html('<embed src="' + url +
                '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
            $('#upload_image_view').modal('show');
        }
    </script>
@endsection
