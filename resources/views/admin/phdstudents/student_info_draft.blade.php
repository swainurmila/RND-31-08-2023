@extends('admin.layouts.app')
@section('heading', 'PHP Student Draft')
@section('sub-heading', 'Student Form Apply')
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

        #candidate_full_name {
            text-transform: uppercase;
        }

        /* .tab {
                        display: none;
                        width: 100%;
                        height: 50%;
                        margin: 0px auto;
                    }


                    .current {
                        display: block;
                    } */
    </style>

    <!-- end page title -->
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
                                        <h2 class="text-center"><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA,
                                                ROURKELA</b></h2>
                                        <p class="text-center"><b>APPLICATION FORMAT FOR ENROLMENT TO Ph.D PROGRAMME
                                                {{ date('Y') }}</b></p>
                                    </div>

                                    <ul id="progressbar">
                                        <li class="active" id="account">Personal Information</li>
                                        <li id="personal">Education Info</li>
                                        <li id="payment">Payment Details</li>
                                    </ul>

                                    <form action="{{ route('draft.info.store', [$id]) }}" class="form" method="post"
                                        id="myForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="tab">

                                            <div class="mb-2 row">
                                                <label class="col-md-3 col-form-label"><b>Full Name of the
                                                        candidate: <span class="error">*</span> </b></label>
                                                <div class="col-md-9">
                                                    <div class="mb-2 row">
                                                        <div class="col-md-2">
                                                            <select class="form-select" id="name_prefix" name="name_prefix">
                                                                <option value="">Select Pretitle</option>
                                                                <option value="Mrs"
                                                                    {{ $name_prefix == 'Mrs.' ? 'selected' : '' }}>
                                                                    Mrs.</option>
                                                                <option value="Mr"
                                                                    {{ $name_prefix == 'Mr.' ? 'selected' : '' }}>
                                                                    Mr.</option>
                                                                <option value="Miss"
                                                                    {{ $name_prefix == 'Miss.' ? 'selected' : '' }}>
                                                                    Miss</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" id="candidate_full_name"
                                                                value="{{ $stu_full_name }}" name="candidate_full_name"
                                                                class="form-control"
                                                                placeholder="Enter name in Block Letters">
                                                            <small id="" class="form-text text-muted">
                                                                (IN
                                                                BLOCK CAPITAL LETTERS) (As
                                                                per
                                                                10<sup>th</sup> Certificate)</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label class="col-md-3 col-form-label" for="academic_programme"><b>Name of
                                                        the Faculty <span class="error">*</span></b></label>
                                                <div class="col-md-9">
                                                    <input type="text" id="name_of_faculty"
                                                        value="{{ $student->name_of_faculty }}" name="name_of_faculty"
                                                        class="form-control" placeholder="Name Of Faculty">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label class="col-md-3 col-form-label" for="academic_programme"><b>Academic
                                                        Programme:
                                                        Ph.D(Engg/Pharmacy/etc)<span class="error">*</span>
                                                    </b></label>
                                                <div class="col-md-9">
                                                    <select class="form-select " id="academic_programme"
                                                        name="academic_programme">
                                                        <option value="">Choose Academic
                                                            Programme</option>

                                                        @foreach ($department as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $item->id == $student->academic_programme ? 'selected' : '' }}>
                                                                {{ $item->departments_title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-3 col-form-label" for="academic_programme"><b>Topic of
                                                        Ph.D. work <span class="error">*</span></b></label>
                                                <div class="col-md-9">
                                                    <input type="text" id="topic_of_phd_work"
                                                        value="{{ $student->topic_of_phd_work }}" name="topic_of_phd_work"
                                                        class="form-control" placeholder="Topic of Ph.D. work">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-3 col-form-label" for="ncr_department_name"><b>Choose
                                                        Nadal Centre: <span class="error">*</span></b></label>
                                                <div class="col-md-9">
                                                    <select class="form-select" id="nodal_centre" name="nodal_centre">
                                                        <option value="">Select Nodal Centre</option>
                                                        @foreach ($nodal_centre as $item)
                                                            <option value="{{ $item->id }}"
                                                                {{ $item->id == $student->nodal_id ? 'selected' : '' }}>
                                                                {{ $item->college_name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-3 col-form-label" for="ncr_department_name"><b>Name of
                                                        NCR and
                                                        Department: <span class="error">*</span></b></label>
                                                <div class="col-md-9">
                                                    <select class="form-select" id="academic_programme"
                                                        name="ncr_department_name">
                                                        <option value="">Select NCR</option>
                                                        <option value="NCR , NCR Department 1"
                                                            {{ $student->ncr_department == 'NCR , NCR Department 1' ? 'selected' : '' }}>
                                                            NCR , NCR
                                                            Department
                                                            1</option>
                                                        <option value="NCR , NCR Department 2"
                                                            {{ $student->ncr_department == 'NCR , NCR Department 2' ? 'selected' : '' }}>
                                                            NCR , NCR
                                                            Department
                                                            2</option>
                                                        <option value="NCR , NCR Department 3"
                                                            {{ $student->ncr_department == 'NCR , NCR Department 3' ? 'selected' : '' }}>
                                                            NCR , NCR
                                                            Department
                                                            3</option>
                                                        <option value="NCR , NCR Department 4"
                                                            {{ $student->ncr_department == 'NCR , NCR Department 4' ? 'selected' : '' }}>
                                                            NCR , NCR
                                                            Department
                                                            4</option>
                                                    </select>

                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label class="col-md-3 col-form-label"
                                                    for="father_husband_name"><b>Father's / Husband's
                                                        Name: <span class="error">*</span></b></label>
                                                <div class="col-md-9">
                                                    <input type="text" id="father_husband_name"
                                                        value="{{ $student->father_husband }}" name="father_husband_name"
                                                        class="form-control" placeholder="Enter your Father's Name">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label class="col-md-3 col-form-label" for="mothers_name"><b>Mother's
                                                        Name: <span class="error">*</span></b></label>
                                                <div class="col-md-9">
                                                    <input type="text" id="mothers_name"
                                                        value="{{ $student->mother }}" name="mothers_name"
                                                        class="form-control" placeholder="Enter your Mother's Name">
                                                </div>
                                            </div>


                                            <div class="mb-2 row">
                                                <label class="col-md-3 col-form-label"
                                                    for="permanent_address"><b>Permanent address: <span
                                                            class="error">*</span></b></label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" id="permanent_address" rows="5" name="permanent_address">{{ $student->permannt_address }}</textarea>
                                                </div>
                                            </div>



                                            <div class="mb-2 row">
                                                <label class="col-md-3 col-form-label" for="present_address"><b>Present
                                                        address: <span class="error">*</span></b></label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" id="present_address" rows="5" name="present_address">{{ $student->present_address }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="phdstudent_email"><b>Email: <span
                                                                    class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                            <input type="email" id="phdstudent_email"
                                                                value="{{ $student->email }}" name="phdstudent_email"
                                                                class="form-control"
                                                                placeholder="Enter your valid email id">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="phdstudent_mobile"><b>Phone No: <span
                                                                    class="error">*</span></b></label>
                                                        <div class="col-md-8">
                                                            <input type="tel" placeholder="123-45-678"
                                                                id="phdstudent_mobile" value="{{ $student->phone }}"
                                                                name="phdstudent_mobile" class="form-control"
                                                                placeholder="Enter your valid contact number">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label" for="date_of_birth"><b>Date
                                                                of Birth
                                                                (MM/DD/YYYY): <span class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                            <input type="date" id="date_of_birth" name="date_of_birth"
                                                                class="form-control" placeholder="Enter DOB."
                                                                value="{{ $student->dob }}">
                                                        </div>

                                                        <script>
                                                            function getAge(DOB) {
                                                                var today = new Date();
                                                                var birthDate = new Date(DOB);
                                                                var age = today.getFullYear() - birthDate.getFullYear();
                                                                var m = today.getMonth() - birthDate.getMonth();
                                                                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                                                                    age--;
                                                                }
                                                                return age;
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="phd_nationality"><b>Nationality: <span
                                                                    class="error">*</span></b></label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="phd_nationality"
                                                                name="phd_nationality" class="form-control"
                                                                placeholder="Enter nationality."
                                                                value="{{ $student->nationality }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label" for="aadhar_card"><b>Aadhar
                                                                Card: <span class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" name="aadhar_card"
                                                                id="aadhar_card" value="{{ $student->aadhar_card }}">
                                                            <input type="hidden" name="adha_hid_card"
                                                                value="{{ $student->aadhar_card }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="upload_aadhar_card"><b>Upload Aadhar Card: <span
                                                                    class="error">*</span></b></label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="form-control"
                                                                name="upload_aadhar_card" id="upload_aadhar_card">

                                                            <p><a href="javascript:void(0)"
                                                                    onclick="upload_image_view('/upload/aadhar/{{ $student->aadhar_certificate }}')">
                                                                    View Upload File</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="student_category"><b>Student
                                                                Category: <span class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                            <select class="form-select " id="student_category"
                                                                name="student_category">
                                                                <option value="">Choose Field</option>
                                                                <option value="Full Time"
                                                                    {{ $student->student_category == 'Full Time' ? 'selected' : '' }}>
                                                                    Full Time</option>
                                                                <option value="Part Time"
                                                                    {{ $student->student_category == 'Part Time' ? 'selected' : '' }}>
                                                                    Part Time</option>
                                                                <option value="Full Time Special"
                                                                    {{ $student->student_category == 'Full Time Special' ? 'selected' : '' }}>
                                                                    Full Time Special
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6"></div>
                                                <div class="form-group col-md-6">
                                                    {{-- <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="student_category"><b>Student
                                                                Category: <span class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                            <select class="form-select " id="student_category"
                                                                name="student_category">
                                                                <option value="">Choose Field</option>
                                                                <option value="Full Time"
                                                                    {{ $student->student_category == 'Full Time' ? 'selected' : '' }}>
                                                                    Full Time</option>
                                                                <option value="Part Time"
                                                                    {{ $student->student_category == 'Part Time' ? 'selected' : '' }}>
                                                                    Part Time</option>
                                                                <option value="Full Time Special"
                                                                    {{ $student->student_category == 'Full Time Special' ? 'selected' : '' }}>
                                                                    Full Time Special
                                                                </option>

                                                            </select>

                                                        </div>
                                                    </div> --}}

                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label" for="flexCheckDefault">
                                                            Are you Physically Challanged
                                                        </label>
                                                        <div class="col-md-7">
                                                            <input style="margin-top:25px; " class=""
                                                                type="checkbox"
                                                                @if ($student->hadicap_certificate != '') checked @endif
                                                                value="" id="flexCheckDefault">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="han_upload">
                                                        <div class="mb-2 row">
                                                            <label class="col-md-4 col-form-label"
                                                                for="han_certi"><b>Upload Handicap Certificate: <span
                                                                        class="error">*</span></b></label>
                                                            <div class="col-md-8">
                                                                <input type="file" class="form-control"
                                                                    name="han_certi" id="han_certi">
                                                                <input type="hidden" name="han_hid_ceti"
                                                                    value="{{ $student->hadicap_certificate }}">
                                                                @if ($student->hadicap_certificate != '')
                                                                    <p><a href="javascript:void(0)"
                                                                            onclick="upload_image_view('/upload/hadicap_certificate/{{ $student->hadicap_certificate }}')">
                                                                            View Upload File</a></p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="mb-2 row">
                                                        <div class="cat_upload">
                                                            <label class="col-md-4 col-form-label"><b>Upload Certificate:
                                                                    <span class="error">*</span></b></label>
                                                            <div class="col-md-8">
                                                                <input type="file" class="form-control"
                                                                    name="cate_certi" id="cate_certi">
                                                                <input type="hidden" name="cate_hid_ceti"
                                                                    value="{{ $student->category_certificate }}">
                                                                @if ($student->category_certificate != '')
                                                                    <p><a href="javascript:void(0)"
                                                                            onclick="upload_image_view('/upload/caste_certificate/{{ $student->category_certificate }}')">
                                                                            View Upload File</a></p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="general_category"><b>Caste: <span
                                                                    class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                            <select class="form-select" id="general_category"
                                                                name="general_category">
                                                                <option value="">Choose Field</option>
                                                                <option value="SC/ST"
                                                                    {{ $student->category == 'SC/ST' ? 'selected' : '' }}>
                                                                    SC/ST</option>
                                                                <option value="Differently Abled"
                                                                    {{ $student->category == 'Differently Abled' ? 'selected' : '' }}>
                                                                    Differently Abled
                                                                </option>
                                                                <option value="General"
                                                                    {{ $student->category == 'General' ? 'selected' : '' }}>
                                                                    General</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="cat_upload">
                                                        <div class="mb-2 row">
                                                            <label class="col-md-4 col-form-label"
                                                                for="upload_aadhar_card"><b>Upload Caste Certificate: <span
                                                                        class="error">*</span></b></label>
                                                            <div class="col-md-8">
                                                                <input type="file" class="form-control"
                                                                    name="cate_certi" id="cate_certi">
                                                                <input type="hidden" name="cate_hid_ceti"
                                                                    value="{{ $student->category_certificate }}">
                                                                @if ($student->category_certificate != '')
                                                                    <p><a href="javascript:void(0)"
                                                                            onclick="upload_image_view('/upload/caste_certificate/{{ $student->category_certificate }}')">
                                                                            View Upload File</a></p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="upload_aadhar_card"><b>Upload Aadhar Card: <span
                                                                    class="error">*</span></b></label>
                                                        <div class="col-md-8">
                                                            <input type="file" class="form-control"
                                                                name="upload_aadhar_card" id="upload_aadhar_card">
                                                        </div>
                                                    </div>
                                                </div> --}}

                                            </div>

                                            <div class="form-row">
                                            </div>
                                        </div>
                                </div>

                                <div class="mt-5 text-center">
                                    <button type="submit" class="submit">Save & Next</button>
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
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/additional-methods.js"></script>

    {{-- <script type="text/javascript" src="{{ asset('js/multi-form.js') }}"></script> --}}

    <script type="text/javascript">
        $(document).ready(function() {
            //  ===  size in kb ===
            $.validator.addMethod('filesize', function(value, element, param) {

                var size = element.files[0].size;

                size = size / 1024;
                size = Math.round(size);
                return this.optional(element) || size <= param;

            }, 'File size must be less than {0} Kb');

            // jQuery("#").validate({
            jQuery("#myForm").validate({
                // Specify validation rules
                //var val = {
                rules: {
                    name_prefix: "required",
                    name_of_faculty: "required",
                    topic_of_phd_work: "required",
                    academic_programme: "required",
                    ncr_department_name: "required",
                    father_husband_name: "required",
                    mothers_name: "required",
                    permanent_address: "required",
                    present_address: "required",
                    phdstudent_mobile: "required",
                    date_of_birth: "required",
                    phd_nationality: "required",
                    student_category: "required",
                    general_category: "required",

                    check: "required",
                    //cate_certi: "required",
                    // cate_certi: {
                    //     required: true,
                    //     extension: "jpg,jpeg,pdf,png",
                    //     filesize: 500
                    // },
                    // upload_aadhar_card: {
                    //     required: true,
                    //     extension: "jpg,jpeg,pdf,png",
                    //     filesize: 500
                    // },
                    candidate_full_name: {
                        required: true,
                        minlength: 4
                    },
                    phdstudent_email: {
                        required: true,
                        email: true
                    },
                    phdstudent_supervisor_email: {
                        required: true,
                        email: true
                    }

                },
                // Specify validation error messages
                messages: {
                    candidate_full_name: "Please Enter your fulll name.",
                    phdstudent_email: {
                        required: "Email is required",
                        email: "Please enter a valid e-mail",
                    },
                    phdstudent_supervisor_email: {
                        required: "Email is required",
                        email: "Please enter a valid e-mail",
                    },
                    cate_certi: {
                        extension: "please upload formrt jpg,png,pdf,jpeg ",
                    }
                    // upload_aadhar_card: {
                    //     extension: "please upload formrt jpg,png,pdf,jpeg ",
                    // }
                }
                // }
            });
            // $("#myForm").multiStepForm({
            //     // defaultStep:0,
            //     beforeSubmit: function(form, submit) {
            //         console.log("called before submiting the form");
            //         console.log(form);
            //         console.log(submit);
            //     },
            //    // validations: val,
            // }).navigateTo(0);
        });
    </script>

    <script>
        $(document).ready(function() {

            $(function() {
                // $('.cat_upload').hide();
                //  $('.han_upload').hide();

                $("#flexCheckDefault").change(function() {
                    if (this.checked) {
                        $('.han_upload').show();
                    } else {
                        $('.han_upload').hide();
                    }
                });
                $('#general_category').change(function() {
                    var das = $(this).children("option:selected").val();
                    if (das == 'SC/ST' || das == 'Differently Abled') {
                        $('.cat_upload').show();
                    } else {
                        $('.cat_upload').hide();
                    }
                    // $('.colors').hide();
                    // $('#' + $(this).val()).show();
                });
                var das2 = $('#general_category').children("option:selected").val();
                //alert(das2);
                if (das2 == 'SC/ST' || das2 == 'Differently Abled') {
                    $('.cat_upload').show();
                } else {
                    $('.cat_upload').hide();
                }
            });
        });

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
