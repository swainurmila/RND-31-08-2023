@extends('admin.layouts.app')
@section('heading', 'PHP Student Form')
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

        label.error {
            color: #f00;
            font-size: 11px;
            font-style: italic;
        }

        .biju-odisha {
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
        }

        .form-section-title h2 {
            font-size: 1.6rem !important;
        }

        #candidate_full_name {
            text-transform: uppercase;
        }
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
                                        <p class="text-center"><b>APPLICATION FORMAT FOR ENROLLMENT TO Ph.D PROGRAMME
                                                {{ date('Y') }}</b></p>
                                    </div>

                                    <ul id="progressbar">
                                        <li class="active" id="account">Personal Information</li>
                                        <li id="personal">Education Info</li>
                                        <li id="payment">Payment Details</li>
                                    </ul>

                                    <form action="{{ route('store.personal.info') }}" class="form" method="POST"
                                        id="myForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="tab">

                                            <div class="mb-2 row">
                                                <label class="col-md-3 col-form-label"><b>Full Name of the
                                                        candidate: <span class="error">*</span> </b></label>
                                                <div class="col-md-9">
                                                    <div class="mb-2 row">
                                                        <div class="col-md-2">
                                                            <select class="form-select " id="name_prefix"
                                                                name="name_prefix">
                                                                <option value="">Select title</option>
                                                                <option value="Mrs">Mrs.</option>
                                                                <option value="Mr">Mr.</option>
                                                                <option value="Miss">Miss</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <input type="text" id="candidate_full_name"
                                                                value="{{ $student->name }}" name="candidate_full_name"
                                                                class="form-control"
                                                                placeholder="Enter name in Block Letters">
                                                            <small id="" class="form-text text-muted">
                                                                (IN BLOCK CAPITAL LETTERS) (As per 10<sup>th</sup>
                                                                Certificate)</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label class="col-md-3 col-form-label" for="academic_programme"><b>Name of
                                                        the Faculty <span class="error">*</span></b></label>
                                                <div class="col-md-9">
                                                    <input type="text" id="name_of_faculty" value=""
                                                        name="name_of_faculty" class="form-control"
                                                        placeholder="Name Of Faculty">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">

                                                <label class="col-md-3 col-form-label" for="academic_programme"><b>Academic
                                                        Programme:
                                                        Ph.D(Engg/Pharmacy/etc)AS<span class="error">*</span>
                                                    </b></label>
                                                <div class="col-md-9">
                                                    <select class="form-select " id="academic_programme"
                                                        name="academic_programme">
                                                        <option value="">Choose Academic
                                                            Programme</option>
                                                        @foreach ($department as $item)
                                                            <option value="{{ $item->id }}">
                                                                {{ $item->departments_title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-3 col-form-label" for="academic_programme"><b>Topic of
                                                        Ph.D. work <span class="error">*</span></b></label>
                                                <div class="col-md-9">
                                                    <input type="text" id="topic_of_phd_work" value=""
                                                        name="topic_of_phd_work" class="form-control"
                                                        placeholder="Topic of Ph.D. work">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-3 col-form-label" for="ncr_department_name"><b>Choose
                                                        Nadal Centre: <span class="error">*</span></b></label>
                                                <div class="col-md-9">
                                                    <select class="form-select" id="nodal_centre" name="nodal_centre">
                                                        <option value="">Select Nodal Centre</option>
                                                        @foreach ($nodal_centre as $item)
                                                            <option value="{{ $item->id }}">{{ $item->college_name }}
                                                            </option>
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
                                                        <option value="NCR , NCR Department 1">NCR , NCR
                                                            Department
                                                            1</option>
                                                        <option value="NCR , NCR Department 2">NCR , NCR
                                                            Department
                                                            2</option>
                                                        <option value="NCR , NCR Department 3">NCR , NCR
                                                            Department
                                                            3</option>
                                                        <option value="NCR , NCR Department 4">NCR , NCR
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
                                                    <input type="text" id="mothers_name" value=""
                                                        name="mothers_name" class="form-control"
                                                        placeholder="Enter your Mother's Name">
                                                </div>
                                            </div>


                                            <div class="mb-2 row">
                                                <label class="col-md-3 col-form-label"
                                                    for="permanent_address"><b>Permanent address: <span
                                                            class="error">*</span></b></label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" id="permanent_address" rows="5" name="permanent_address"></textarea>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label class="col-md-3 col-form-label" for="present_address"><b>Present
                                                        address: <span class="error">*</span></b></label>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" id="present_address" rows="5" name="present_address"></textarea>
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
                                                                (DD/MM/YYYY): <span class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                            <input type="date" id="date_of_birth" name="date_of_birth"
                                                                class="form-control" placeholder="Enter DOB.">
                                                        </div>
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
                                                                placeholder="Enter nationality.">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row mb-2">
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label" for="aadhar_card"><b>Aadhar
                                                                Card: <span class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" name="aadhar_card"
                                                                id="aadhar_card" placeholder="Aadharcard No.">
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="student_category"><b>Student
                                                                Category: <span class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                            <select class="form-select " id="student_category"
                                                                name="student_category">
                                                                <option value="">Choose Field</option>
                                                                <option value="Full Time">Full Time</option>
                                                                <option value="Part Time">Part Time</option>
                                                                <option value="Full Time Special">Full Time
                                                                    Special
                                                                </option>

                                                            </select>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">

                                                        <label class="col-md-4 col-form-label" for="flexCheckDefault">
                                                            Are you Physically Changed
                                                        </label>
                                                        <div class="col-md-7">
                                                            <input style="margin-top:25px; " class=""
                                                                type="checkbox" value="" id="flexCheckDefault">
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <div class="han_upload">
                                                        <div class="mb-2 row">
                                                            <label class="col-md-4 col-form-label"
                                                                for="han_certi"><b>Upload Handicap Certificate: <span
                                                                        class="error">*</span></b></label>
                                                            <div class="col-md-7">
                                                                <input type="file" class="form-control"
                                                                    name="han_certi" id="han_certi">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="general_category"><b>Caste: <span
                                                                    class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                            <select class="form-select" id="general_category"
                                                                name="general_category">
                                                                <option value="">Choose Field</option>
                                                                <option value="SC/ST">SC/ST</option>
                                                                {{-- <option value="Differently Abled">Differently
                                                                    Abled
                                                                </option> --}}
                                                                <option value="General">General</option>
                                                            </select>
                                                        </div>

                                                    </div>

                                                </div>


                                                <div class="form-group col-md-6">
                                                    <div class="cat_upload">
                                                        <div class="mb-2 row">
                                                            <label class="col-md-4 col-form-label"
                                                                for="cate_certi"><b>Upload Caste Certificate: <span
                                                                        class="error">*</span></b></label>
                                                            <div class="col-md-8">
                                                                <input type="file" class="form-control"
                                                                    name="cate_certi" id="cate_certi">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            {{-- <div class="form-row mb-2">
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label" for="aadhar_card"><b>Aadhar
                                                                Card: <span class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                            <input type="text" class="form-control" name="aadhar_card"
                                                                id="aadhar_card" placeholder="Aadharcard No.">
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
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <div class="form-row">
                                                {{-- <div class="form-group col-md-9">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-3 col-form-label"
                                                            for="student_category"><b>Student
                                                                Category: <span class="error">*</span></b></label>
                                                        <div class="col-md-9">
                                                            <select class="form-select " id="student_category"
                                                                name="student_category">
                                                                <option value="">Choose Field</option>
                                                                <option value="Full Time">Full Time</option>
                                                                <option value="Part Time">Part Time</option>
                                                                <option value="Full Time Special">Full Time
                                                                    Special
                                                                </option>

                                                            </select>

                                                        </div>
                                                    </div>
                                                </div> --}}

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
    </div> <!-- end row -->
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
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.17.0/additional-methods.js"></script>

    {{-- <script type="text/javascript" src="{{ asset('js/multi-form.js') }}"></script> --}}

    <script class="" type="text/javascript">
        //add phd student qualification details
        var count = 1;
        var counter = 0;
        $(document).ready(function() {
            $('.add_phdstudent_qualification_dtls').click(function(e) {
                e.preventDefault();
                var phdstudent_qualification_field = $('#phdstudent_qualification_field').val();
                var phdstudent_specialization = $('#phdstudent_specialization').val();
                var phdstudent_board_university = $('#phdstudent_board_university').val();
                var phdstudent_passing_year = $('#phdstudent_passing_year').val();
                var phdstudent_division = $('#phdstudent_division').val();
                var phdstudent_percentage_cgpa = $('#phdstudent_percentage_cgpa').val();
                var formFile2 = $('#formFile2').val();
                var newRow = '<tr>' +
                    '<td>' + phdstudent_qualification_field +
                    '<input type="hidden" name="stu_quali[]" value="' +
                    phdstudent_qualification_field + '"></td>' +
                    '<td>' + phdstudent_specialization + '<input type="hidden" name="stu_spec[]" value="' +
                    phdstudent_specialization + '"></td>' +
                    '<td>' + phdstudent_board_university +
                    '<input type="hidden" name="stu_univer[]" value="' +
                    phdstudent_board_university + '"></td>' +
                    '<td>' + phdstudent_passing_year +
                    '<input type="hidden" name="stu_pass_year[]" value="' +
                    phdstudent_passing_year + '"></td>' +
                    '<td>' + phdstudent_division + '<input type="hidden" name="stu_division[]" value="' +
                    phdstudent_division + '"></td>' +
                    '<td>' + phdstudent_percentage_cgpa +
                    '<input type="hidden" name="stu_percentage[]" value="' +
                    phdstudent_percentage_cgpa + '"></td>' +
                    '<td> <a href="javascript:void(0);" onclick="upload_image_view(' +
                    "'/upload/phdstudent/" +
                    formFile2 + "'" +
                    ');" >View Upload File</a><input type="hidden" name="formFile_hid[]" value="' +
                    formFile2 + '"> </td>' +
                    '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                    counter + '">Remove</button></td></tr>';
                $('.addPhdQualifyrow').append(newRow);
                count++;
                counter++;
            });

            $(".addPhdQualifyrow").on("click", ".remove_field", function(e) {
                $(this).parent('td').parent('tr').remove();
                counter--;
                count--;
            });
        });

        //add phd student organisation details
        var countPhdOrganiseRow = 1;
        var counterPhdOrganiseRow = 0;
        $(document).ready(function() {
            $('.add_phdstudent_organisation_dtls').click(function(e) {
                e.preventDefault();
                var phdstudent_organisation_name = $('#phdstudent_organisation_name').val();
                var phdstudent_designation = $('#phdstudent_designation').val();
                var phdstudent_duration = $('#phdstudent_duration').val();
                var phdstudent_jobnature = $('#phdstudent_jobnature').val();
                var noc_certi_hid = $('#noc_certi_hid').val();

                var newRow = '<tr>' +
                    '<td>' + phdstudent_organisation_name +
                    '<input type="hidden" name="stu_orga[]" value="' +
                    phdstudent_organisation_name + '"></td>' +
                    '<td>' + phdstudent_designation + '<input type="hidden" name="stu_desig[]" value="' +
                    phdstudent_designation + '"></td>' +
                    '<td>' + phdstudent_duration + '<input type="hidden" name="stu_duration[]" value="' +
                    phdstudent_duration + '"></td>' +
                    '<td>' + phdstudent_jobnature + '<input type="hidden" name="stu_jobnature[]" value="' +
                    phdstudent_jobnature + '"></td>' +
                    '<td> <a href="javascript:void(0);" onclick="upload_image_view(' +
                    "'/upload/phdstudent/" +
                    noc_certi_hid + "'" +
                    ');" >View Upload File</a><input type="hidden" name="noc_certi_hid[]" value="' +
                    noc_certi_hid + '"> </td>' +
                    '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                    counterPhdOrganiseRow + '">Remove</button></td></tr>';
                $('.addPhdOrganisationrow').append(newRow);
                countPhdOrganiseRow++;
                counterPhdOrganiseRow++;
            });

            $(".addPhdOrganisationrow").on("click", ".remove_field", function(e) {
                $(this).parent('td').parent('tr').remove();
                counterPhdOrganiseRow--;
                countPhdOrganiseRow--;
            });
        });
    </script>


    <script>
        function myFunction() {
            var checkBox = document.getElementById("myCheck");
            var text = document.getElementById("text");
            if (checkBox.checked == true) {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }
    </script>

    <script>
        function myFunctionOrganisation() {
            var checkBox = document.getElementById("myCheckOrganisation");
            var text = document.getElementById("textOrganisation");
            if (checkBox.checked == true) {
                text.style.display = "block";
            } else {
                text.style.display = "none";
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            //  ===  size in kb ===
            $.validator.addMethod('filesize', function(value, element, param) {

                var size = element.files[0].size;

                size = size / 1024;
                size = Math.round(size);
                return this.optional(element) || size <= param;

            }, 'File size must be less than {0} Kb.');

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
                    // phdstudent_qualification_field: "required",
                    // phdstudent_specialization: "required",
                    // phdstudent_board_university: "required",
                    // phdstudent_passing_year: "required",
                    // phdstudent_division: "required",
                    // phdstudent_percentage_cgpa: "required",
                    // phd_proposed_work: "required",
                    // phdstudent_propose_supervisor: "required",
                    // phdstudent_supervisor_add: "required",
                    // phdstudent_supervisor_phone: "required",
                    // phdstudent_propose_cosupervisor: "required",
                    // phdstudent_cosupervisor_add: "required",
                    // phdstudent_cosupervisor_email: "required",
                    // phdstudent_cosupervisor_phone: "required",
                    // phdstudent_organisation_name: "required",
                    // phdstudent_designation: "required",
                    // phdstudent_duration: "required",
                    // phdstudent_jobnature: "required",
                    check: "required",
                    //cate_certi: "required",
                    cate_certi: {
                        required: true,
                        extension: "jpg,jpeg,pdf,png",
                        filesize: 500
                    },
                    han_certi: {
                        required: true,
                        extension: "jpg,jpeg,pdf,png",
                        filesize: 500
                    },
                    upload_aadhar_card: {
                        required: true,
                        extension: "jpg,jpeg,pdf,png",
                        filesize: 500
                    },
                    aadhar_card: {
                        required: true,
                        digits: true,
                        maxlength: 12,
                        minlength: 12,
                    },
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
                    },
                    han_certi: {
                        extension: "please upload formrt jpg,png,pdf,jpeg ",
                    },
                    upload_aadhar_card: {
                        extension: "please upload formrt jpg,png,pdf,jpeg ",
                    }
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('change', '#formFile', function() {
                console.log('thumb upload');
                var name = document.getElementById("formFile").files[0].name;

                //alert(name);
                var form_data = new FormData();
                var ext = name.split('.').pop().toLowerCase();
                var oFReader = new FileReader();
                oFReader.readAsDataURL(document.getElementById("formFile").files[0]);
                //var f = document.getElementById("file").files[0];
                form_data.append("file", document.getElementById('formFile').files[0]);

                $.ajax({
                    url: "{{ route('phdStudents.certi') }}",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        // $('#uploaded_image').html(data);
                        // $('#prescription_file').prop("href", data.pdf_path);
                        $('#formFile2').val(data.img_name);
                        // $('.modal-body embed').prop("src", data.pdf_path)

                    }
                });

            });

            // =========== option show adn hide

            $(function() {
                $('.cat_upload').hide();
                $('.han_upload').hide();

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
            });


        });

        // ======== for noc  certificate

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('change', '#noc_certi', function() {
            console.log('thumb upload');
            var name = document.getElementById("noc_certi").files[0].name;

            //alert(name);
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("noc_certi").files[0]);
            //var f = document.getElementById("file").files[0];
            form_data.append("file", document.getElementById('noc_certi').files[0]);

            $.ajax({
                url: "{{ route('phdStudents.noccerti') }}",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    // $('#uploaded_image').html(data);
                    // $('#prescription_file').prop("href", data.pdf_path);
                    $('#noc_certi_hid').val(data.img_name);
                    // $('.modal-body embed').prop("src", data.pdf_path)

                }
            });

        });


        // ======== for supervisor select option



        // $(document).on('change', '#academic_programme', function(e) {
        //     e.preventDefault();
        //     var id = $(this).val();

        //     //alert(id);
        //     //console.log(id);
        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //     });
        //     $.ajax({
        //         type: 'get',
        //         url: "{{ route('find.supervisor') }}",
        //         data: {
        //             // "_token": "{{ csrf_token() }}",
        //             "id": id
        //         },
        //         dataType: 'json',
        //         success: function(data) {
        //             console.log(data);
        //             // console.log(data[0]['name']);
        //             // console.log(data[1]['name']);
        //             // console.log(data['supervisor'][0]);

        //             // $valu = data[0]['s_name'];
        //             for (var i = 0; i < data['supervisor'].length; i++) {
        //                 $('#prop_super').append('<option value="' + data['supervisor'][i].name +
        //                     '" data-id="' + data['supervisor'][i].id + '">' + data['supervisor'][i]
        //                     .name + '</option>');
        //             }

        //             for (var i = 0; i < data['cosupervisor'].length; i++) {
        //                 $('#prop_cosuper').append('<option value="' + data['cosupervisor'][i].name +
        //                     '" data-id="' + data['cosupervisor'][i].id + '">' + data['cosupervisor']
        //                     [i].name + '</option>');
        //             }



        //         }
        //     });

        // });

        // $(document).on('change', '#prop_super', function(e) {
        //     var optionSelected = $(this).find('option:selected').attr('data-id');
        //     //alert(optionSelected);
        //     $('#sup_id').val(optionSelected);
        // });
        // $(document).on('change', '#prop_cosuper', function(e) {
        //     var option = $('option:selected', this).attr('data-id');
        //     //alert(optionSelected);
        //     $('#cosup_id').val(option);
        // });


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
