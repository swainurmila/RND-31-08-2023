@extends('admin.layouts.app')
@section('heading', 'Co-Supervisor Form')
@section('sub-heading', 'Co-Supervisor Draft Form')
@section('content')

    <style>
        .form-row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -5px;
            margin-left: -5px;
        }

        .panel-heading {
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-right-radius: 3px;
            border-top-left-radius: 3px;
        }

        div#add_qualfication,
        div#add_employment2,
        div#add_employment3,
        div#add_best_three_publications,
        div#add_atleast_one_publications,
        div#add_phd_students {
            justify-content: space-between;
            align-items: center;
        }

        .col-md-3.cust-txt-input {
            width: 22%;
            margin-bottom: 20px;
        }

        .col-md-4.cust-txt-input2 {
            width: 30%;
            margin-bottom: 20px;
        }

        .mytooltip .tooltip-item {
            background: #c81c1c;
            cursor: pointer;
            display: inline-block;
            font-weight: 700;
            padding: 3px 10px;
            color: #fff;
        }

        .mytooltip {
            display: inline;
            position: relative;
            z-index: 999;
        }

        .mytooltip .tooltip-content {
            position: absolute;
            z-index: 9999;
            width: 360px;
            left: 50%;
            margin: 0 0 20px -180px;
            bottom: 100%;
            text-align: left;
            font-size: 14px;
            line-height: 30px;
            -webkit-box-shadow: -5px -5px 15px rgba(48, 54, 61, 0.2);
            box-shadow: -5px -5px 15px rgba(48, 54, 61, 0.2);
            background: #2b2b2b;
            opacity: 0;
            cursor: default;
            pointer-events: none;
        }

        .mytooltip:hover .tooltip-content {
            pointer-events: auto;
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0) rotate3d(0, 0, 0, 0deg);
            transform: translate3d(0, 0, 0) rotate3d(0, 0, 0, 0deg);
        }

        .mytooltip .tooltip-content img {
            position: relative;
            display: block;
            float: left;
            margin-right: 1em;
            max-width: 100%;
        }

        /* .tab{display: none; width: 100%; height: 50%;margin: 0px auto;}
                                    .current{display: block;} */

        /* input {padding: 10px; width: 100%; font-size: 17px; font-family: Raleway; border: 1px solid #aaaaaa; } */

        button {
            background-color: #55a5db;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        .previous {
            background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 30px;
            width: 30px;
            cursor: pointer;
            margin: 0 2px;
            color: #fff;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.8;
            padding: 5px
        }

        .step.active {
            opacity: 1;
            background-color: #55a5db !important;
        }

        .step.finish {
            background-color: #55a5db;
        }

        .error {
            color: #f00;
        }

        .biju-odisha {
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
        }

        .form-section-title h2 {
            font-size: 1.6rem !important;
        }
    </style>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <div class="panel-container show" role="content">
                                <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                                <div class="panel-content">
                                    <div class="section-title form-section-title">
                                        <h2 class="biju-odisha"><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY,
                                                ODISHA, ROURKELA</b></h2>
                                        <p style="text-align: center !important;"><b>APPLICATION FORMAT FOR
                                                RECOGNITION OF PROSPECTIVE SUPERVISOR / CO-SUPERVISOR FOR THE
                                                ACADEMIC YEAR_W.E.F.<br> JULY 2022 TO JUNE 2023</b></p>
                                    </div>

                                    <ul id="progressbar">
                                        <li id="account">Personal Information</li>
                                        <li class="active" id="personal">Education Info</li>
                                        <li id="journal">Journal/Piblication</li>
                                    </ul>

                                    <form action="{{ route('codraft.store.education',[$id]) }}" class="form" method="POST"
                                        id="myForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="tab">
                                            <div class="panel-heading" style="color:#fff;background:#0a64a0 !important;">
                                                <b>Educational Qualification (from Matriculation onwards): <span
                                                        class="error">*</span></b>
                                            </div>
                                            <p style="text-align: justify !important;"><b>(Attach self-attested
                                                    photo Copies of the relevant documents as Annexures.) </b>
                                            </p>

                                            <div class="form-row pres" id="add_qualfication">
                                                {{-- <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label" for="qualification_field"><b>Exam
                                                            Passed:</b></label>
                                                    <select class="custom-select form-control" name="exam_pass"
                                                        id="qualification_field">
                                                        <option value="">Select Exam</option>
                                                        <option value="HSC">HSC</option>
                                                        <option value="+2">+2</option>
                                                        <option value="Graduation">Graduation</option>
                                                        <option value="Post-Graduation">Post-Graduation
                                                        </option>
                                                        <option value="MPhil">MPhil</option>
                                                        <option value="Ph.D">Ph.D</option>
                                                    </select>
                                                    <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                </div>
                                                <div class="col-md-3 cust-txt-input items" id="items">
                                                    <label class=" col-form-label"
                                                        for="specialization"><b>Specialization:</b></label>
                                                    <input type="text" id="specialization" name="qual_spec"
                                                        class="form-control ip_presdata" placeholder="Enter specialization">
                                                    <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                </div>

                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label" for="board_university"><b>Board /
                                                            University:</b></label>
                                                    <input type="text" id="board_university" name="qua_board"
                                                        class="form-control" placeholder="Enter University">
                                                    <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                </div>
                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label" for="passing_year"><b>Year
                                                            of Passing:</b></label>
                                                    <select class="custom-select form-control" name="qua_year"
                                                        id="passing_year">
                                                        <option value="">Select Years</option>
                                                        @for ($i = date('Y'); $i >= date('Y') - 50; $i--)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                        
                                                    </select>
                                                    <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                </div>
                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label" for="division"><b>Class /
                                                            Division:</b></label>
                                                    <input type="text" id="division" name="qua_divi"
                                                        class="form-control" placeholder="Enter University">
                                                    <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                </div>
                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label" for="percentage_cgpa"><b>%
                                                            marks/CGPA:</b></label>
                                                    <input type="text" id="percentage_cgpa" name="qua_marks"
                                                        class="form-control" placeholder="Enter University">
                                                    <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                </div>
                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label"
                                                        for="phdstudent_percentage_cgpa"><b>Upload
                                                            Certificate:</b></label>
                                                    <input class="form-control" type="file" name="file"
                                                        id="formFile">
                                                    <input type="hidden" name="file_thumb" value=""
                                                        id="formFile2">
                                                </div>
                                                <div class="col-md-3 cust-txt-input">
                                                    <div class="form-group">
                                                        <button type="button"
                                                            class="btn add_qualification_dtls  btn-outline-success btn-icon waves-effect waves-themed "
                                                            style="margin-top: 2.3rem !important;"
                                                            id="add_qualification_dtls">
                                                            +
                                                        </button>
                                                    </div>
                                                </div> --}}
                                                <table class="table table-sm m-0 table-bordered">
                                                    
                                                    <table class="table table-sm m-0 table-bordered">
                                                        <thead class="">
                                                            <tr class="table-heading">
                                                                <th>Exam Passed</th>
                                                                <th>Specialization</th>
                                                                <th>Board / University</th>
                                                                <th>Year of passing</th>
                                                                <th>Class / Division</th>
                                                                <th>% marks/ CGPA</th>
                                                                <th>Certificate</th>
                                                                <th>Certificate</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="SupQuali">
                                                            @foreach ($SupervisorQualification as $value)
                                                            <tr>
                                                                <td>
                                                                    
                                                                    <input type="hidden" name="exam[]" value="{{ $value->exam }}">
                                                                    {{ $value->exam }}
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="plus_two_spec" name="spec[]"
                                                                        class="form-control chk_blank" value="{{ $value->specialization }}">
                                                                    
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control chk_blank"
                                                                    id="plus_two_board" name="board[]" value="{{ $value->board_university }}">
                                                                    
                                                                </td>
                                                                <td>
                                                                    <select class="custom-select form-control chk_blank"
                                                                        id="plus_two_year" name="year[]" id="passing_year">
                                                                        <option value="">Select Years</option>
                                                                        @for ($i = date('Y'); $i >= date('Y') - 50; $i--)
                                                                            <option value="{{ $i }}" {{ $value->year == $i ? 'selected' : '' }}>
                                                                                {{ $i }}</option>
                                                                        @endfor
                                                                    </select>
                                                                    {{-- {{ $value->year }} --}}
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control chk_blank"
                                                                        id="plus_two_class" name="class[]" value="{{ $value->division }}">
                                                                    
                                                                </td>
                                                                <td>
                                                                    <input type="text" class="form-control chk_blank"
                                                                        id="plus_two_percent" name="percent[]" value="{{ $value->percentage }}">
                                                                   
                                                                </td>
                                                                <td>
                                                                    {{-- <input type="file"
                                                                        class="form-control chk_blank_file"
                                                                        class="quali_certi" name="certi[]"> --}}
                                                                    <a href="javascript:void(0)"
                                                                        onclick="upload_image_view('/upload/supervisor/certificates/{{ $value->certificate }}')">
                                                                        View Upload File</a>
                                                                </td>
                                                                <td>
                                                                    {{-- <input type="file"
                                                                        class="form-control quali_mark chk_blank_file"
                                                                        name="mark[]"> --}}
                                                                    <a href="javascript:void(0)"
                                                                        onclick="upload_image_view('/upload/supervisor/certificates/{{ $value->marksheet }}')">
                                                                        View Upload File</a>
                                                                </td>
                                                                {{-- <td>
                                                                    <button type="button"
                                                                        class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field"
                                                                        onclick="delete_certificate({{ $value->id }}, {{ $value->sup_id }})" data-name = 'SupQuali'>Remove</button>
                                                                </td> --}}
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </tbody>
                                                        <tbody class="addnewrow">

                                                        </tbody>
                                                    </table>
                                            </div>
                                            <!-- <div class="row pxy-4  float-right" >
                                                                                 <input type="button"  class="next btn next-btn-style"  id="next1" style=''/>
                                                                            </div> -->
                                        </div>

                                        <div class="tab">:
                                            <small id="" class="form-text text-muted">*Ph.D should be
                                                from a recognised institute</small>
                                            <small id="" class="form-text text-muted">*If Ph.D from
                                                Foreign University, Please eclose an Equivalence
                                                certificate.</small>

                                            <div class="mb-2 row">
                                                <label class="col-md-4 col-form-label" for="phd_thesis"><b>Title of own
                                                        Ph.D Thesis: <span class="error">*</span></b></label>
                                                <div class="col-md-8">
                                                    <input type="text" id="phd_thesis" name="phd_thesis"
                                                        class="form-control" placeholder="Enter Thesis" value="{{$supervisors->phd_thesis}}">
                                                </div>
                                            </div>

                                            <div class="panel-heading" style="color:#fff;background:#0a64a0 !important;">
                                                <b>Details of
                                                    full time Employment: <span class="error">*</span></b>
                                            </div>
                                            <p style="text-align: justify !important;"><b>(Attach self-attested
                                                    photo Copies of the experience certificates from the
                                                    employer.)</b></p>

                                            <div class="form-row" id="add_employment2">

                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label"
                                                        for="employer_name"><b>Name:</b></label>
                                                    <input type="text" id="employer_name" name="employer_name"
                                                        class="form-control" placeholder="Enter Name">
                                                    <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                </div>

                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label"
                                                        for="employer_address"><b>Address:</b></label>
                                                    <input type="text" id="employer_address" name="employer_address"
                                                        class="form-control" placeholder="Enter Address">
                                                    <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                </div>

                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label"
                                                        for="employer_designation"><b>Designation:</b></label>
                                                    <input type="text" id="employer_designation"
                                                        name="employer_designation" class="form-control"
                                                        placeholder="Enter Designation">
                                                    <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                </div>
                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label" for="pay_scale"><b>Pay
                                                            Scale:</b></label>
                                                    <input type="text" id="pay_scale" name="pay_scale"
                                                        class="form-control" placeholder="Enter Pay Scale">
                                                    <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                </div>
                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label" for="date_from"><b>From:</b></label>
                                                    <input type="date" id="date_from" name="date_from"
                                                        class="form-control" placeholder="Enter Date From.">
                                                    <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                </div>

                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label" for="date_upto"><b>To:</b></label>
                                                    <input type="date" id="date_upto" name="date_upto"
                                                        class="form-control" placeholder="Enter Date Upto.">
                                                    <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                </div>

                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label"
                                                        for="employer_type"><b>Type:</b></label>
                                                    <select id="employer_type" class="custom-select form-control" name="employer_type"
                                                        id="emp_type">
                                                        <option value="">Choose Type</option>
                                                        <option value="Full Time Regular">Full Time Regular
                                                        </option>
                                                        <option value="Part Time">Part Time</option>
                                                        <option value="Contractual">Contractual</option>
                                                        <span class="error-msg prs_name text-danger"
                                                            id="prs_name"></span>
                                                    </select>
                                                </div>

                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label"><b>Appointment
                                                            Date:</b></label>
                                                    <input type="date" id="appointment_date" name="appointment_date"
                                                        class="form-control"
                                                        placeholder="Enter Appointment Order & Date.">
                                                    <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                </div>

                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label"><b>Experience
                                                            Certificate:</b></label>
                                                    <input class="form-control" type="file" name="exp_certi"
                                                        id="exp_certi">
                                                    <input type="hidden" value="" name="exp_certi"
                                                        id="exp_hid_certi">
                                                    <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                </div>

                                                <div class="col-md-3 cust-txt-input">
                                                    <div class="form-group">
                                                        <button type="button"
                                                            class="btn add_employment_dtls btn-outline-success btn-icon waves-effect waves-themed "
                                                            style="margin-top: 2.3rem !important;"
                                                            id="add_employment_dtls">
                                                            +
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 cust-txt-input"></div>
                                                <div class="col-md-3 cust-txt-input"></div>
                                                <table class="table table-sm m-0 table-bordered">
                                                    <thead class="">
                                                        <tr class="table-heading">
                                                            <th>Name</th>
                                                            <th>Address</th>
                                                            <th>Designation</th>
                                                            <th>Pay Scale</th>
                                                            <th>From</th>
                                                            <th>To</th>
                                                            <th>Type</th>
                                                            <th>Appointment Date</th>
                                                            <th>Experience Certificate</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="SupEmp">
                                                               
                                                        @foreach ($SupervisorEmployment as $value)
                                                        <tr>
                                                            <td>{{ $value->name }}</td>
                                                            <td>{{ $value->address }}</td>
                                                            <td>{{ $value->designation }}</td>
                                                            <td>{{ $value->pay_scale }}</td>
                                                            <td>{{ $value->from }}</td>
                                                            <td>{{ $value->to }}</td>
                                                            <td>{{ $value->type }}</td>
                                                            <td>{{ $value->appointment_date }}</td>
                                                            <td><a href="javascript:void(0)"
                                                                    onclick="upload_image_view('/upload/phdsupervisor/{{ $value->employment_cerificate }}')">
                                                                    View Upload File</a>
                                                            </td>
                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field"
                                                                    onclick="delete_employment({{ $value->id }}, {{ $value->sup_id }})">Remove</button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tbody class="addEmployeeRow">
                                                    </tbody>
                                                </table>
                                            </div>

                                            <small id="" class="form-text text-muted">*Enclose self
                                                attested copy of the appointment order and Experience
                                                Certificate.</small>

                                            <div class="mb-2 row">
                                                <label class="col-md-8 col-form-label" for="full_time_total_exp"><b>Total
                                                        Full-Time Experience in
                                                        regular position in AICTE/UGC/Govt. recognised
                                                        institution only (in years): <span
                                                            class="error">*</span></b></label>
                                                <div class="col-md-4">
                                                    <input type="number" id="full_time_total_exp"
                                                        name="full_time_total_exp" class="form-control"
                                                        placeholder="Enter Full Time experience in years" value="{{$supervisors->recognised_institution}}">
                                                </div>
                                            </div>

                                            <div class="form-row" id="add_employment3">
                                                <div class="col-md-4 cust-txt-input2">
                                                    <label class=" col-form-label" for="teaching_exp"><b>Teaching
                                                            experience (in
                                                            years):<span class="error">*</span> </b></label>
                                                    <input type="number" id="teaching_exp" name="teaching_exp"
                                                        class="form-control"
                                                        placeholder="Enter Teaching experience in years" value="{{$supervisors->teaching_experience}}">
                                                </div>
                                                <div class="col-md-4 cust-txt-input2">
                                                    <label class=" col-form-label" for="research_exp"><b>Research
                                                            experience (in years):
                                                            <span class="error">*</span></b></label>
                                                    <input type="number" id="research_exp" name="research_exp"
                                                        class="form-control"
                                                        placeholder="Enter Research experience in years" value="{{$supervisors->research_experience}}">
                                                </div>
                                                <div class="col-md-4 cust-txt-input2">
                                                    <label class=" col-form-label" for="phd_exp"><b>Post Ph.D
                                                            experience (in years): <span
                                                                class="error">*</span></b></label>
                                                    <input type="number" id="phd_exp" name="phd_exp"
                                                        class="form-control" placeholder="Enter Ph.D experience in years" value="{{$supervisors->post_phd_experience}}">
                                                </div>
                                            </div>

                                            </br>


                                            <div>
                                                <div class="mt-5 text-center">
                                                    <button type="submit" class="submit">Save & Next</button>
                                                    <a href="{{ route('costore.draft.view', [$id]) }}" class="submit" type="submit">previous</a>
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
    </div> <!-- end row -->

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

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->



@endsection







@section('js')
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script src="{{ asset('js/form-validation-by-sc.js') }}"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/additional-methods.js"></script>




    <script type="text/javascript">
        $(document).ready(function() {

            //  ===  size in kb ===
            $.validator.addMethod('filesize', function(value, element, param) {

                var size = element.files[0].size;

                size = size / 1024;
                size = Math.round(size);
                return this.optional(element) || size <= param;

            }, 'File size must be less than {0} Kb.');

            jQuery("#myForm").validate({
                // Specify validation rules
                //alert('hi');
                rules: {
                    // employer_name: "required",
                    // employer_address: "required",
                    // employer_designation: "required",
                    // pay_scale: "required",
                    // date_from: "required",
                    // date_upto: "required",
                    // employer_type: "required",
                    // appointment_date: "required",
                    // exp_certi: {
                    //     required: true,
                    //     extension: "jpg,jpeg,pdf,png",
                    //     filesize: 500
                    // },
                    // full_time_total_exp: "required",
                    // teaching_exp: "required",
                    // research_exp: "required",
                    // phd_exp: "required",
                    // phd_thesis: "required"


                },
                // Specify validation error messages
                messages: {
                    // exp_certi: {
                    //     extension: "please upload formrt jpg,png,pdf,jpeg ",
                    //     filesize: "filesize must be less than 500kb"
                    // }

                }
            });
        });

    //     $("#myForm").on('submit', function(e) {
    //         // chk_hospital();
    //         e.preventDefault();
    //         var validation = [];
    //         var form_valid = $("#myForm").valid();
    //         validation = $('#myForm').scvalidateform({
    //             formId: 'myForm'
    //         });
    //         if ($.inArray('false', validation) >= '0') {
    //             return false;
    //         } else if(form_valid == false){
    //             return false;
    //         }else {
    //     $(this)[0].submit();
    // }
    //     });
    </script>

    <script>
        //add employment details
        var countEmpRow = 1;
        var counterEmpRow = 0;
        $(document).ready(function() {
            $('.add_employment_dtls').click(function(e) {
                e.preventDefault();



                var employer_name2 = $('#employer_name').valid();
                var employer_address2 = $('#employer_address').valid();
                var employer_designation2 = $('#employer_designation').valid();
                var pay_scale2 = $('#pay_scale').valid();
                var date_from2 = $('#date_from').valid();
                var date_upto2 = $('#date_upto').valid();
                var employer_type2 = $('#employer_type').valid();
                var appointment_date2 = $('#appointment_date').valid();
                var exp_hid_certi2 = $('#exp_certi').valid();



                if (employer_name2 && employer_address2 && employer_designation2 && pay_scale2 &&
                    date_from2 && date_upto2 && employer_type2 && appointment_date2 && exp_hid_certi2) {

                var employer_name = $('#employer_name').val();
                var employer_address = $('#employer_address').val();
                var employer_designation = $('#employer_designation').val();
                var pay_scale = $('#pay_scale').val();
                var date_from = $('#date_from').val();
                var date_upto = $('#date_upto').val();
                var employer_type = $('#employer_type').val();
                var appointment_date = $('#appointment_date').val();
                var exp_hid_certi = $('#exp_hid_certi').val();

                var newRow = '<tr>' +
                    '<td>' + employer_name + '<input type ="hidden" value="' +
                    employer_name + '" name= "employer_name[]">' + '</td>' +
                    '<td>' + employer_address + '<input type ="hidden" value="' +
                    employer_address + '" name= "employer_address[]">' + '</td>' +
                    '<td>' + employer_designation + '<input type ="hidden" value="' +
                    employer_designation + '" name= "employer_designation[]">' + '</td>' +
                    '<td>' + pay_scale + '<input type ="hidden" value="' +
                    pay_scale + '" name= "pay_scale[]">' + '</td>' +
                    '<td>' + date_from + '<input type ="hidden" value="' +
                    date_from + '" name= "date_from[]">' + '</td>' +
                    '<td>' + date_upto + '<input type ="hidden" value="' +
                    date_upto + '" name= "date_upto[]">' + '</td>' +
                    '<td>' + employer_type + '<input type ="hidden" value="' +
                    employer_type + '" name= "employer_type[]">' + '</td>' +
                    '<td>' + appointment_date + '<input type ="hidden" value="' +
                    appointment_date + '" name= "appointment_date[]">' + '</td>' +
                    '<td> <a href="javascript:void(0);" onclick="upload_image_view(' +
                    "'/upload/phdsupervisor/" +
                    exp_hid_certi + "'" +
                    ');" >View Upload File</a><input type="hidden" name="exp_hid_certi[]" value="' +
                    exp_hid_certi + '"> </td>' +
                    '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                    counterEmpRow + '">Remove</button></td></tr>';
                $('.addEmployeeRow').append(newRow);
                countEmpRow++;
                counterEmpRow++;
                 }
            });

            $(".addEmployeeRow").on("click", ".remove_field", function(e) {
                $(this).parent('td').parent('tr').remove();
                counterEmpRow--;
                countEmpRow--;
            });
        });
    </script>

    <script>
        //  $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });

        // $(document).on('change', '.quali_certi', function() {
        //     console.log('thumb upload');
        //     var name = document.getElementsByClassName("form-control quali_certi").files[0].name;

        //     alert(name);
        //     var form_data = new FormData();
        //     var ext = name.split('.').pop().toLowerCase();
        //     var oFReader = new FileReader();
        //     oFReader.readAsDataURL(document.getElementById("formFile").files[0]);
        //     //var f = document.getElementById("file").files[0];
        //     form_data.append("file", document.getElementById('formFile').files[0]);

        //     $.ajax({
        //         url: "{{ route('sup.quali.certi') }}",
        //         method: "POST",
        //         data: form_data,
        //         contentType: false,
        //         cache: false,
        //         processData: false,
        //         success: function(data) {
        //             console.log(data);
        //             // $('#uploaded_image').html(data);
        //             // $('#prescription_file').prop("href", data.pdf_path);
        //             $('#formFile2').val(data.img_name);
        //             // $('.modal-body embed').prop("src", data.pdf_path)

        //         }
        //     });

        // });
        // ===== experiance certificate 

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('change', '#exp_certi', function() {
            console.log('thumb upload');
            var name = document.getElementById("exp_certi").files[0].name;

            //alert(name);
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("exp_certi").files[0]);
            //var f = document.getElementById("file").files[0];
            form_data.append("file", document.getElementById('exp_certi').files[0]);

            $.ajax({
                url: "{{ route('supervisors.exp.certi') }}",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    // $('#uploaded_image').html(data);
                    // $('#prescription_file').prop("href", data.pdf_path);
                    $('#exp_hid_certi').val(data.img_name);
                    // $('.modal-body embed').prop("src", data.pdf_path)

                }
            });

        });

        // ========= for delete Employement certificate
function delete_employment(id, sup_id) {

var postData = new FormData();
postData.append('id', id);
postData.append('sup_id', sup_id);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    async: true,
    type: "post",
    contentType: false,
    url: "{{ url('cosupervisor/delete-employment') }}",
    data: postData,
    processData: false,
    success: function(data) {
        console.log(data);
        $('.SupEmp').empty();
        var newRow = '';
        var c = 0;
        $.each(data, function(key, value) {

            newRow += '<tr>' +
                '<td>' + value.name + '</td>' +
                '<td>' + value.address +
                '</td>' +
                '<td>' + value.designation +
                '</td>' +
                '<td>' + value.pay_scale +
                '</td>' +
                '<td>' + value.from +
                '</td>' +
                '<td>' + value.to +
                '</td>' +
                '<td>' + value.type +
                '</td>' +
                '<td>' + value.appointment_date +
                '</td>' +
                '<td>' + '<a href="javascript:void(0)" onclick="upload_image_view(' +
                "'/upload/phdsupervisor/" + value.employment_cerificate + "'" + ');">View Upload File</a><input type="hidden" name="exp_hid_certi[]" value="' +
                value.employment_cerificate + '">' +
                '</td>' +
                '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" onclick="delete_employment(' +
                value.id + ', ' + value.sup_id + ')">Remove</button></td></tr>';
        });
        $('.SupEmp').append(newRow);

    }
});
}
    </script>

    <script>
        // view image in a modal ========

        function upload_image_view(url) {
            // alert(url);
            event.preventDefault();
            $('#view_upload_image').html('<embed src="' + url +
                '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
            $('#upload_image_view').modal('show');
        }
    </script>

@endsection
