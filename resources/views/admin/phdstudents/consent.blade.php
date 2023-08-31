@include('admin.layouts.header')

<style>
    div.comm_frm .form-label {
        text-transform: capitalize;
        font-size: 13px;
        font-weight: bold;
    }

</style>
@include('admin.partials.navigation')
@include('admin.partials.sidebar')
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
                                    <div class="panel-container show" role="content">
                                        <div class="loader"><i
                                                class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                                        <div class="panel-content">


                                            <div class="comm_frm prev_wrap">


                                                {{-- <input type="submit"> --}}

                                                <div class="input_wrap preview_form">
                                                    <h3 style="text-align: center; text-decoration: underline;">
                                                        <b>Consent By Research Supervisor/co-supervisor</b> </h3>
                                                    
                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>candidate Name:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">{{ $student->name }}</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Academic Programme:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="form-label">{{ $student->academic_programme }}</label>
                                                        </div>

                                                    </div>



                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>Name of NCR and Department:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="form-label">{{ $student->ncr_department }}</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Father's / Husband's Name:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="form-label">{{ $student->father_husband }}</label>
                                                        </div>


                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>Mother's Name:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">{{ $student->mother }}</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Registration No:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="form-label">{{ $student->registration_no }}</label>
                                                        </div>

                                                    </div>







                                                </div>

                                                <hr>

                                                <p><b>This is to certify that there exists vacancy in the relevant
                                                    category with me as per the BPUT Ph.D Regulation 2019 and I
                                                    agree to supervise the candidate towards his/her Ph.D.</b>
                                            </p>

                                                <table class="table">
                                                    <tr>
                                                        <td>Full Signature: </td>
                                                        <td>Full Signature: </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Name: </td>
                                                        <td>Name: </td>
                                                    </tr>
                                                    <tr>
                                                        <td>(Research Supervisor) <b>{{ $supervisor->supervisor_name }}</b>   </td>
                                                        <td>(Co-supervisor) <b>{{ $supervisor->co_supervisor_name }}</b></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Date: </td>
                                                        <td>Date: </td>
                                                    </tr>
                                                </table>

                                                <div class="input_wrap preview_form">
                                                    <div class="row">
                                                        <p>Note:- Research Supervisor is required to provide eight names of Expert (at least one Expert external to that BPUT-NCR) inside Odisha with proven Research potential not below the rank of Associate Prof.

                                                        </p>
                                                    </div>
                                                </div>


                                                <div class="input_wrap preview_form">



                                                    <div class="border border-primary"></div>
                                                    <div class="row">

                                                        <div class="cust-print">
                                                            @if (trim($student->supervisor_status) == '')
                                                                <button type="submit"
                                                                    class="btn btn-success waves-effect waves-themed">SUBMIT</button>
                                                            @endif
                                                            <a href="{{ route('phdStudents.admin.index') }}"
                                                                class="btn btn-success waves-effect waves-themed float-right">Back</a>

                                                                <a href="#"
                                                                class="btn btn-success waves-effect waves-themed float-right" onclick="window.print()">Print</a>
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
                </div>
            </div> <!-- end row -->
        </div>
    </div>
</div>
@include('admin.layouts.footer');
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->











{{-- @section('js')
@endsection --}}
