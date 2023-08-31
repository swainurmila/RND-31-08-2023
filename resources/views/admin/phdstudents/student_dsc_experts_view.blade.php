@extends('admin.layouts.app')
@section('heading', 'Recipt')
@section('sub-heading', 'Paymetn Recipt')
@section('content')
    <style>
        .font-weight-bold {
            font-weight: bold;
            color: #000000;
        }
    </style>
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
                                        <img src="{{ asset('admin_assets/images/BPUT.jpg') }}" alt="" height="22"
                                            style="max-width:60px;">
                                    </span>
                                    <span></span>
                                </a>
                            </div>
                        </div>
                        <div class="float-end">
                            <h4 class="m-0 d-print-none">Domain Experts View</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mt-3">
                                <p><b>Hello, {{ $student->name }}</b></p>
                            </div>
                        </div><!-- end col -->
                        <div class="col-md-4 offset-md-2">
                            <div class="mt-3 float-end">
                                <p class="m-b-1
                                0"><b>Enrollment No. : </b> <span
                                        class="float-end">
                                        &nbsp;&nbsp;&nbsp;&nbsp; {{ $student->enrollment_no }}</span></p>
                                <p class="m-b-10"><strong>Status : </strong>
                                    <span
                                        class="float-end badge bg-{{ Helper::appliedApplicationStatusColor($student->application_status) }}">
                                        {{ Helper::appliedApplicationStatus($student->application_status) }}
                                    </span>
                                </p>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-hover m-0 table-centered  nowrap w-100" cellspacing="0">
                                    <thead class="bg-light">
                                        <th class="text-uppercase">Sl. No.</th>
                                        <th class="text-uppercase">name</th>
                                        <th class="text-uppercase">Department</th>
                                        <th class="text-uppercase">Designation</th>
                                    </thead>

                                    <tbody class="font-14">
                                        @foreach ($domain_experts as $key => $value)
                                            @php
                                                $fontCase = $value['status'] == 1 ? 'font-weight-bold' : '';
                                            @endphp
                                            <tr>
                                                <td class="{{ $fontCase }} text-capitalize">{{ ++$key }}</td>
                                                <td class="{{ $fontCase }} text-capitalize">
                                                    {{ $value['professor_name'] }}</td>
                                                <td class="{{ $fontCase }} text-capitalize">{{ $value['dept_name'] }}
                                                </td>
                                                <td class="{{ $fontCase }} text-capitalize">
                                                    {{ $value['designation'] }}</td>
                                            </tr>
                                        @endforeach
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
