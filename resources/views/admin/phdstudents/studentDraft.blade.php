@include('admin.layouts.header')
@include('admin.partials.navigation')
@include('admin.partials.sidebar')

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

    div#add_phdstudent_qualfication,
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

    /* .tab {
        display: none;
        width: 100%;
        height: 50%;
        margin: 0px auto;
    } */

    .current {
        display: block;
    }

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
                                        <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                                        <div class="panel-content">
                                            <div class="section-title form-section-title">
                                                <h2><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h2>
                                                <p><b>APPLICATION FORMAT FOR ENROLMENT TO Ph.D PROGRAMME < YEAR></b></p>
                                            </div>

                                            <form action="{{ route('stu.draft.store',[$id]) }}" class="form"
                                                method="POST" id="myForm" enctype="multipart/form-data">
                                                @csrf
                                                <div class="tab">

                                                    <div class="mb-2 row">
                                                        <label class="col-md-3 col-form-label"><b>Full Name of the
                                                                candidate: <span class="error">*</span> </b></label>
                                                        <div class="col-md-9">
                                                            <div class="mb-2 row">
                                                                <div class="col-md-2">
                                                                    <select class="custom-select " id="name_prefix"
                                                                        name="name_prefix">
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
                                                                        value="{{ $stu_full_name }}"
                                                                        name="candidate_full_name" class="form-control"
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
                                                        <label class="col-md-3 col-form-label"
                                                            for="academic_programme"><b>Name of the Faculty <span
                                                                    class="error">*</span></b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="name_of_faculty"
                                                                value="{{ $student->name_of_faculty }}"
                                                                name="name_of_faculty" class="form-control"
                                                                placeholder="Name Of Faculty">
                                                        </div>
                                                    </div>

                                                    <div class="mb-2 row">

                                                        <label class="col-md-3 col-form-label"
                                                            for="academic_programme"><b>Academic Programme:
                                                                Ph.D(Engg/Pharmacy/etc)<span class="error">*</span>
                                                            </b></label>
                                                        <div class="col-md-9">
                                                            <select class="custom-select " id="academic_programme"
                                                                name="academic_programme">
                                                                <option value="">Choose Academic
                                                                    Programme</option>

                                                                @foreach ($department as $item)
                                                                    <option value="{{ $item->id }}" {{ $item->id == $student->academic_programme ? 'selected' : '' }}>
                                                                        {{ $item->departments_title }}</option>
                                                                @endforeach


                                                                {{-- <option value="Mathmatics">Mathmatics</option>
                                <option value="Polymer SC. and Technology">Polymer SC. and Technology</option>
                                <option value="Bio-Technology">Bio-Technology</option>
                                <option value="Computer Application">Computer Application</option> --}}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 row">
                                                        <label class="col-md-3 col-form-label"
                                                            for="academic_programme"><b>Topic of Ph.D. work <span
                                                                    class="error">*</span></b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="topic_of_phd_work"
                                                                value="{{ $student->topic_of_phd_work }}"
                                                                name="topic_of_phd_work" class="form-control"
                                                                placeholder="Topic of Ph.D. work">
                                                        </div>
                                                    </div>
                                                    <div class="mb-2 row">
                                                        <label class="col-md-3 col-form-label"
                                                            for="ncr_department_name"><b>Name of NCR and
                                                                Department: <span class="error">*</span></b></label>
                                                        <div class="col-md-9">
                                                            {{-- <input type="text" id="ncr_department_name" value="" name="ncr_department_name"
                                class="form-control" placeholder="Enter NCR & Department"> --}}
                                                            <select class="custom-select" id="academic_programme"
                                                                name="ncr_department_name">
                                                                <option value="">Select NCR</option>
                                                                <option value="NCR , NCR Department 1" {{ $student->ncr_department == 'NCR , NCR Department 1' ? 'selected' : '' }}>NCR , NCR
                                                                    Department
                                                                    1</option>
                                                                <option value="NCR , NCR Department 2" {{ $student->ncr_department == 'NCR , NCR Department 2' ? 'selected' : '' }}>NCR , NCR
                                                                    Department
                                                                    2</option>
                                                                <option value="NCR , NCR Department 3" {{ $student->ncr_department == 'NCR , NCR Department 3' ? 'selected' : '' }}>NCR , NCR
                                                                    Department
                                                                    3</option>
                                                                <option value="NCR , NCR Department 4" {{ $student->ncr_department == 'NCR , NCR Department 4' ? 'selected' : '' }}>NCR , NCR
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
                                                                value="{{ $student->father_husband }}"
                                                                name="father_husband_name" class="form-control"
                                                                placeholder="Enter your Father's Name">
                                                        </div>
                                                    </div>

                                                    <div class="mb-2 row">
                                                        <label class="col-md-3 col-form-label"
                                                            for="mothers_name"><b>Mother's Name: <span
                                                                    class="error">*</span></b></label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="mothers_name"
                                                                value="{{ $student->mother }}" name="mothers_name"
                                                                class="form-control"
                                                                placeholder="Enter your Mother's Name">
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
                                                        <label class="col-md-3 col-form-label"
                                                            for="present_address"><b>Present address: <span
                                                                    class="error">*</span></b></label>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" id="present_address" rows="5" name="present_address">{{ $student->present_address }}</textarea>
                                                        </div>
                                                    </div>


                                                    {{-- <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="mb-2 row">
                                <label class="col-md-4 col-form-label" for="phdstudent_email"><b>Enrollment No: <span class="error">*</span></b></label>
                                <div class="col-md-8">
                                    <input type="text" id="enrollment_no" value="" name="enrollment_no"
                                        class="form-control" placeholder="Enter your Enrollment">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="mb-2 row">
                                <label class="col-md-4 col-form-label" for="phdstudent_mobile"><b>Enrollment Date:</b></label>
                                <div class="col-md-8">
                                    <input type="date" id="enrollment_date" name="enrollment_date" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div> --}}



                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"
                                                                    for="phdstudent_email"><b>Email: <span
                                                                            class="error">*</span></b></label>
                                                                <div class="col-md-7">
                                                                    <input type="email" id="phdstudent_email"
                                                                        value="{{ $student->email }}"
                                                                        name="phdstudent_email" class="form-control"
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
                                                                        id="phdstudent_mobile"
                                                                        value="{{ $student->phone }}"
                                                                        name="phdstudent_mobile" class="form-control"
                                                                        placeholder="Enter your valid contact number">
                                                                    {{-- pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"
                                                                    for="date_of_birth"><b>Date of Birth
                                                                        (DD/MM?YYYY): <span
                                                                            class="error">*</span></b></label>
                                                                <div class="col-md-7">
                                                                    <input type="date" id="date_of_birth"
                                                                        name="date_of_birth" class="form-control"
                                                                        placeholder="Enter DOB."
                                                                        value="{{ $student->dob }}">
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
                                                                        placeholder="Enter nationality."
                                                                        value="{{ $student->nationality }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"
                                                                    for="student_category"><b>Student
                                                                        Category: <span
                                                                            class="error">*</span></b></label>
                                                                <div class="col-md-7">
                                                                    <select class="custom-select "
                                                                        id="student_category" name="student_category">
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
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"
                                                                    for="general_category"><b>Category: <span
                                                                            class="error">*</span></b></label>
                                                                <div class="col-md-8">
                                                                    <select class="custom-select"
                                                                        id="general_category" name="general_category">
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
                                                            <div class="mb-2 row">
                                                                <div class="cat_upload">
                                                                    <label class="col-md-4 col-form-label"><b>Upload:
                                                                            <span class="error">*</span></b></label>
                                                                    <div class="col-md-8">
                                                                        <input type="file" name="cate_certi"
                                                                            id="cate_certi">
                                                                        <input type="hidden" name="cate_hid_ceti" value="{{ $student->category_certificate }}">    
                                                                        <p><a href="javascript:void(0)"
                                                                                onclick="upload_image_view('/upload/caste_certificate/{{ $student->category_certificate }}')">
                                                                                View Upload File</a></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>

                                                <div class="tab">
                                                    </br>
                                                    <div class="panel-heading"
                                                        style="color:#fff;background:#0a64a0 !important;">
                                                        <b>Qualification
                                                            (HSC
                                                            Onwards): <span class="error">*</span></b></div>
                                                    </br>
                                                    <div class="form-row pres" id="add_phdstudent_qualfication">
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"
                                                                for="phdstudent_qualification_field"><b>Exam
                                                                    Passed:</b></label>
                                                            <select class="custom-select "
                                                                name="phdstudent_qualification_field"
                                                                id="phdstudent_qualification_field">
                                                                <option value="">Choose Exam Passed:</option>
                                                                <option value="HSC">HSC</option>
                                                                <option value="+2">+2</option>
                                                                <option value="Graduation">Graduation</option>
                                                                <option value="Post-Graduation">Post-Graduation
                                                                </option>
                                                                <option value="MPhil">MPhil</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 cust-txt-input items" id="items">
                                                            <label class=" col-form-label"
                                                                for="phdstudent_specialization"><b>Discipline/Specialization:</b></label>
                                                            <input type="text" id="phdstudent_specialization"
                                                                value="" name="phdstudent_specialization"
                                                                class="form-control ip_presdata"
                                                                placeholder="Enter specialization">
                                                            <span class="error-msg prs_name text-danger"
                                                                id="prs_name"></span>
                                                        </div>

                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"
                                                                for="phdstudent_board_university"><b>Board /
                                                                    University:</b></label>
                                                            <input type="text" id="phdstudent_board_university"
                                                                value="" name="phdstudent_board_university"
                                                                class="form-control" placeholder="Enter University">

                                                        </div>
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"
                                                                for="phdstudent_passing_year"><b>Year of
                                                                    Passing:</b></label>
                                                            <select class="custom-select "
                                                                id="phdstudent_passing_year"
                                                                name="phdstudent_passing_year">
                                                                <option value="">Choose Years:</option>
                                                                <option value="2022">2022</option>
                                                                <option value="2021">2021</option>
                                                                <option value="2020">2020</option>
                                                                <option value="2019">2019</option>
                                                                <option value="2018">2018</option>
                                                                <option value="2017">2017</option>
                                                                <option value="2016">2016</option>
                                                                <option value="2015">2015</option>
                                                                <option value="2014">2014</option>
                                                                <option value="2013">2013</option>
                                                                <option value="2012">2012</option>
                                                                <option value="2011">2011</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"
                                                                for="phdstudent_division"><b>Class /
                                                                    Division:</b></label>
                                                            <input type="text" id="phdstudent_division"
                                                                value="" name="phdstudent_division"
                                                                class="form-control" placeholder="Enter University">

                                                        </div>
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"
                                                                for="phdstudent_percentage_cgpa"><b>%
                                                                    marks/CGPA:</b></label>
                                                            <input type="text" id="phdstudent_percentage_cgpa"
                                                                value="" name="phdstudent_percentage_cgpa"
                                                                class="form-control" placeholder="Enter University">
                                                        </div>
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"
                                                                for="phdstudent_percentage_cgpa"><b>Upload
                                                                    Certi:</b></label>
                                                            <input class="form-control" type="file" name="file"
                                                                id="formFile">
                                                            <input type="hidden" name="file_thumb" value=""
                                                                id="formFile2">
                                                        </div>
                                                        <div class="col-md-3 cust-txt-input">
                                                            <div class="form-group">
                                                                <button type="button"
                                                                    class="btn add_phdstudent_qualification_dtls  btn-outline-success btn-icon waves-effect waves-themed "
                                                                    style="margin-top: 2.3rem !important;"
                                                                    id="add_phdstudent_qualification_dtls">
                                                                    Add Qualification
                                                                </button>
                                                            </div>
                                                        </div>
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
                                                                </tr>
                                                            </thead>
                                                            <tbody class="StuQuali">
                                                                @foreach ($StudentQualification as $value)
                                                                    <tr>
                                                                        <td>{{ $value->exam_passed }}</td>
                                                                        <td>{{ $value->Specialization }}</td>
                                                                        <td>{{ $value->board_university }}</td>
                                                                        <td>{{ $value->year_of_passing }}</td>
                                                                        <td>{{ $value->division }}</td>
                                                                        <td>{{ $value->percentage }}%</td>
                                                                        <td><a href="javascript:void(0)"
                                                                                onclick="upload_image_view('/upload/phdstudent/{{ $value->certificate }}')">
                                                                                View Upload File</a>
                                                                        </td>
                                                                        <td>
                                                                            <button type="button"
                                                                                class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field"
                                                                                onclick="delete_stu_certificate({{ $value->id }}, {{ $value->stu_id }})"
                                                                                data-name='SupQuali'>Remove</button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tbody class="addPhdQualifyrow">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    </br>
                                                    <label for="myCheckOrganisation">Organisation where working (if
                                                        employed): </label>
                                                    
                                                    <input type="checkbox" id="myCheckOrganisation"
                                                        onclick="myFunctionOrganisation()" data-value="{{count($Organisation)}}">     
                                                    <!-- <div  class="panel-heading" style="color:#fff;background:#0a64a0 !important;"></div>
                    </br> -->
                                                    <div style="display: none;" id="textOrganisation"
                                                        class="form-row" id="add_phdstudent_qualfication">
                                                        <div class="col">
                                                            <label class=" col-form-label"
                                                                for="phdstudent_organisation_name"><b>Name of the
                                                                    Organisation:</b></label>
                                                            <input type="text" id="phdstudent_organisation_name"
                                                                value="" name="phdstudent_organisation_name"
                                                                class="form-control ip_presdata"
                                                                placeholder="Enter specialization">
                                                            <span class="error-msg prs_name text-danger"
                                                                id="prs_name"></span>
                                                        </div>

                                                        <div class="col">
                                                            <label class=" col-form-label"
                                                                for="phdstudent_designation"><b>Designation:</b></label>
                                                            <input type="text" id="phdstudent_designation"
                                                                value="" name="phdstudent_designation"
                                                                class="form-control" placeholder="Enter University">

                                                        </div>
                                                        <div class="col">
                                                            <label class=" col-form-label"
                                                                for="phdstudent_duration"><b>Duration:</b></label>
                                                            <input type="text" id="phdstudent_duration"
                                                                value="" name="phdstudent_duration"
                                                                class="form-control" placeholder="Enter University">

                                                        </div>
                                                        <div class="col">
                                                            <label class=" col-form-label"
                                                                for="phdstudent_jobnature"><b>Nature of
                                                                    Job:</b></label>
                                                            <input type="text" id="phdstudent_jobnature"
                                                                value="" name="phdstudent_jobnature"
                                                                class="form-control" placeholder="Enter University">
                                                        </div>
                                                        <div class="col">
                                                            <label class=" col-form-label"><b>Upload NOC
                                                                    Certificate:</b></label>
                                                            <input type="file" name="noc_certi" id="noc_certi">
                                                            <input type="hidden" value="" id="noc_certi_hid">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <button type="button"
                                                                    class="btn add_phdstudent_organisation_dtls  btn-outline-success btn-icon waves-effect waves-themed "
                                                                    style="margin-top: 2.3rem !important;"
                                                                    id="add_phdstudent_organisation_dtls">
                                                                    Add Organisation
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <table class="table table-sm m-0 table-bordered">
                                                            <thead class="">
                                                                <tr class="table-heading">
                                                                    <th>Organisation Name</th>
                                                                    <th>Designation</th>
                                                                    <th>Duration</th>
                                                                    <th>Nature of job</th>
                                                                    <th>N.O.C Certificate</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="StuOrga">
                                                                @foreach ($Organisation as $value)
                                                                    <tr>
                                                                        <td>{{ $value->organisation_name }}</td>
                                                                        <td>{{ $value->designation }}</td>
                                                                        <td>{{ $value->duration }}</td>
                                                                        <td>{{ $value->natutre_of_job }}</td>
                                                                        <td><a href="javascript:void(0)"
                                                                                onclick="upload_image_view('/upload/phdstudent/{{ $value->noc_certificate }}')">
                                                                                View Upload File</a>
                                                                        </td>
                                                                        <td>
                                                                            <button type="button"
                                                                                class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field"
                                                                                onclick="delete_orga_certi({{ $value->id }}, {{ $value->stu_id }})"
                                                                                data-name='SupQuali'>Remove</button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tbody class="addPhdOrganisationrow">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    </br>
                                                    <div class="sec-title">
                                                        <p class=""><b>If applying to be enrolled as a Full Time
                                                                Scholar / Part Time
                                                                Scholar, Then attach NOC in prescribed Form No.
                                                                <b>BPUT/Ph.D-2019/2 and
                                                                    BPUT/Ph.D-2019/3</b> as the case may be.</b>
                                                        <p>
                                                    </div>

                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="phd_proposed_work"><b>Proposed Title of the Ph.D
                                                                work to be carried out:</b></label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="phd_proposed_work"
                                                                value="" name="phd_proposed_work"
                                                                class="form-control"
                                                                placeholder="Enter total proposed Work">
                                                        </div>
                                                    </div>


                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"
                                                                    for="phdstudent_propose_supervisor"><b>Proposed
                                                                        Supervisor Name <span
                                                                            class="error">*</span></b></label>
                                                                <div class="col-md-7">
                                                                    <input type="text"
                                                                        id="phdstudent_propose_supervisor"
                                                                        value="{{ $PhdSupervisor->supervisor_name }}"
                                                                        name="phdstudent_propose_supervisor"
                                                                        class="form-control"
                                                                        placeholder="Enter supervisor name.">
                                                                    {{-- <select class="custom-select " id="prop_super"
                                                                    name="phdstudent_propose_supervisor">
                                                                    <option value="">--- select supervisor --
                                                                    </option>



                                                                </select>
                                                                <input type="hidden" value="" name="sup_id"
                                                                    id="sup_id"> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"
                                                                    for="phdstudent_supervisor_add"><b>Supervisor
                                                                        Address: <span
                                                                            class="error">*</span></b></label>
                                                                <div class="col-md-8">
                                                                    <textarea class="form-control" id="phdstudent_supervisor_add" rows="5" name="phdstudent_supervisor_add">{{ $PhdSupervisor->supervisor_address }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"
                                                                    for="phdstudent_supervisor_email"><b>Supervisor
                                                                        E-Mail Id: <span
                                                                            class="error">*</span></b></label>
                                                                <div class="col-md-7">
                                                                    <input type="email"
                                                                        id="phdstudent_supervisor_email"
                                                                        value="{{ $PhdSupervisor->supervisor_email }}"
                                                                        name="phdstudent_supervisor_email"
                                                                        class="form-control"
                                                                        placeholder="Enter supervisor emai id.">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"
                                                                    for="phdstudent_supervisor_phone"><b>Supervisor
                                                                        Phone: <span
                                                                            class="error">*</span></b></label>
                                                                <div class="col-md-8">
                                                                    <input type="tel" placeholder="123-45-678"
                                                                        id="phdstudent_supervisor_phone"
                                                                        value="{{ $PhdSupervisor->supervisor_phone }}"
                                                                        name="phdstudent_supervisor_phone"
                                                                        class="form-control"
                                                                        placeholder="Enter  valid contact number">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <label for="myCheck"><b>Proposed DSE (if any): </b></label>
                                                    <input type="checkbox" id="myCheck" onclick="myFunction()" data-name = "{{ $PhdSupervisor->co_supervisor_name }}">

                                                    <div id="text" class="form-row" style="display: none;">
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"
                                                                    for="phdstudent_propose_cosupervisor"><b>Proposed
                                                                        DSE Name</b></label>
                                                                <div class="col-md-8">
                                                                    <input type="text"
                                                                        id="phdstudent_propose_cosupervisor"
                                                                        value="{{ $PhdSupervisor->co_supervisor_name }}"
                                                                        name="phdstudent_propose_cosupervisor"
                                                                        class="form-control"
                                                                        placeholder="Enter co supervisor name.">
                                                                    {{-- <select class="custom-select " id="prop_cosuper"
                                                                    name="phdstudent_propose_cosupervisor">
                                                                    <option value="">--- select co-supervisor --
                                                                    </option>
                                                                </select>
                                                                <input type="hidden" value="" name="cosup_id"
                                                                    id="cosup_id"> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"
                                                                    for="phdstudent_cosupervisor_add"><b>DSE
                                                                        Address:</b></label>
                                                                <div class="col-md-8">
                                                                    <textarea class="form-control" id="phdstudent_cosupervisor_add" rows="5" name="phdstudent_cosupervisor_add">{{ $PhdSupervisor->co_supervisor_address }}</textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"
                                                                    for="phdstudent_cosupervisor_email"><b>DSE E-Mail
                                                                        Id:</b>
                                                                </label>
                                                                <div class="col-md-8">
                                                                    <input type="email"
                                                                        id="phdstudent_cosupervisor_email"
                                                                        value="{{ $PhdSupervisor->co_supervisor_email }}"
                                                                        name="phdstudent_cosupervisor_email"
                                                                        class="form-control"
                                                                        placeholder="Enter co supervisor emai id.">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"
                                                                    for="phdstudent_cosupervisor_phone"><b>DSE
                                                                        Phone:</b></label>
                                                                <div class="col-md-8">
                                                                    <input type="tel" placeholder="123-45-678"
                                                                        value="{{ $PhdSupervisor->co_supervisor_phone }}"
                                                                        id="phdstudent_cosupervisor_phone"
                                                                        value=""
                                                                        name="phdstudent_cosupervisor_phone"
                                                                        class="form-control"
                                                                        placeholder="Enter  valid contact number">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    </br>
                                                    <div>
                                                        </br>
                                                        <hr>


                                                        <div class="row">
                                                            <div class="col-lg">
                                                                {{-- <small id="" class="form-text text-muted"><b>Date:</b></small>
                                <small id="" class="form-text text-muted"><b>Place:</b></small> --}}
                                                                <label class="col-form-label" for=""><b>Upload
                                                                        Passport Size
                                                                        Photo:</b>(<small>photo
                                                                        size not more than 200kb</small><span
                                                                        class="error">*<span></small>)</label>
                                                                <input type="file" name="photo">
                                                                <input type="hidden" name="hid_photo" value="{{ $student->photo }}">
                                                                <p><a href="javascript:void(0)"
                                                                        onclick="upload_image_view('/upload/photo/{{ $student->photo }}')">
                                                                        View Upload File</a></p>
                                                            </div>
                                                            <div class="col-lg">
                                                            </div>
                                                            <div class="col-lg">
                                                            </div>
                                                            <div class="col-lg">
                                                                <label class="col-form-label" for=""><b>upload
                                                                        Signature:</b>(<small>Signature
                                                                        size not
                                                                        more than 200kb<span
                                                                            class="error">*<span></small>)</label>
                                                                <input type="file" name="signature">
                                                                <input type="hidden" name="signature_hid" value="{{ $student->signature }}">
                                                                <p><a href="javascript:void(0)"
                                                                        onclick="upload_image_view('/upload/signature/{{ $student->signature }}')">
                                                                        View Upload File</a></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </br>
                                                    {{-- <div class="row pxy-4 button-end-style"> 
                         <input type="button" name="previous" class="previous btn prev-btn-style" value="Previous" id="previous1" style=''/>
                        <input type="submit" name="submit" class="submit btn submit-btn-style" value="Submit" id="next3" style=''/>
                    </div> --}}

                                                </div>

                                                <div style="overflow:auto;">
                                                    <div style="float:right; margin-top: 5px;">
                                                        
                                                        <button type="submit" class="submit">Save as Draft</button>
                                                        <a type="button" href="{{route('stu.preview',[$id])}}" class="btn btn-success waves-effect waves-themed float-right">preview</a>
                                                    </div>
                                                </div>
                                                <!-- Circles which indicates the steps of the form: -->
                                                <div style="text-align:center;margin-top:40px;">
                                                    {{-- <span class="step">1</span>
                                                <span class="step">2</span> --}}
                                                    {{-- <span class="step">3</span>
	    <span class="step">4</span> --}}
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
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollableModalTitle">Modal title</h5>
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
@include('admin.layouts.footer');
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->












<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>

{{-- <script type="text/javascript" src="{{ URL::asset('js/multi-form.js') }}"></script> --}}

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

    var dse_val = $('#myCheck').attr('data-name');

    //alert(dse_val);
    
    if(dse_val != "" ){
        $('#myCheck').prop('checked', true);
        $('#text').css({'display':'block'});
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
    var oraga_val = $('#myCheckOrganisation').attr('data-value');
    //alert(oraga_val);
    
    if(oraga_val != 0 ){
        $('#myCheckOrganisation').prop('checked', true);
        $('#textOrganisation').css({'display':'block'});
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {


        jQuery("#").validate({
            //jQuery("#myForm").validate({
            // Specify validation rules
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
                enrollment_no: "required",
                enrollment_date: "required",
                phdstudent_mobile: "required",
                date_of_birth: "required",
                phd_nationality: "required",
                student_category: "required",
                general_category: "required",
                phdstudent_qualification_field: "required",
                phdstudent_specialization: "required",
                phdstudent_board_university: "required",
                phdstudent_passing_year: "required",
                phdstudent_division: "required",
                phdstudent_percentage_cgpa: "required",
                phd_proposed_work: "required",
                phdstudent_propose_supervisor: "required",
                phdstudent_supervisor_add: "required",
                phdstudent_supervisor_phone: "required",
                phdstudent_propose_cosupervisor: "required",
                phdstudent_cosupervisor_add: "required",
                phdstudent_cosupervisor_email: "required",
                phdstudent_cosupervisor_phone: "required",
                cate_certi: "required",
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
                }
            }
        });
        // $("#myForm").multiStepForm({
        //     // defaultStep:0,
        //     beforeSubmit: function(form, submit) {
        //         console.log("called before submiting the form");
        //         console.log(form);
        //         console.log(submit);
        //     },
        //     //validations:val,
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
            //$('.cat_upload').hide();
            $('#general_category').change(function() {

                //var sel_val = $(this).val();
                //alert(sel_val);

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

    var sel_val = $('#general_category').val();
        //alert(sel_val);
        if (sel_val == 'SC/ST' || sel_val == 'Differently Abled') {
           
            $('.cat_upload').show();
        } else {
            $('.cat_upload').hide();
        }

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

// ========= for delete student qualificatoin  certificate

function delete_stu_certificate(id, stu_id) {

var postData = new FormData();
postData.append('id', id);
postData.append('stu_id', stu_id);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    async: true,
    type: "post",
    contentType: false,
    url: "{{ url('/phdStudents/delete-qual-certi') }}",
    data: postData,
    processData: false,
    success: function(data) {
        console.log(data);
        $('.StuQuali').empty();
        var newRow = '';
        var c = 0;
        $.each(data, function(key, value) {

            newRow += '<tr>' +
                '<td>' + value.exam_passed + '</td>' +
                '<td>' + value.Specialization +
                '</td>' +
                '<td>' + value.board_university +
                '</td>' +
                '<td>' + value.year_of_passing +
                '</td>' +
                '<td>' + value.division +
                '</td>' +
                '<td>' + value.percentage +
                '</td>' +
                '<td> <a href="javascript:void(0);" onclick="upload_image_view(' +
                "'/upload/phdstudent/" +
                value.certificate + "'" +
                ');" >View Upload File</a><input type="hidden" name="formFile_hid[]" value="' +
                value.certificate + '"> </td>' +
                '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" onclick="delete_certificate(' +
                value.id + ', ' + value.stu_id + ')">Remove</button></td></tr>';
        });
        $('.StuQuali').append(newRow);

    }
});
}




// ========= for delete student organization certificate

function delete_orga_certi(id, stu_id) {

var postData = new FormData();
postData.append('id', id);
postData.append('stu_id', stu_id);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    async: true,
    type: "post",
    contentType: false,
    url: "{{ url('/phdStudents/delete-orga-certi') }}",
    data: postData,
    processData: false,
    success: function(data) {
        console.log(data);
        $('.StuOrga').empty();
        var newRow = '';
        var c = 0;
        $.each(data, function(key, value) {

            newRow += '<tr>' +
                '<td>' + value.organisation_name + '</td>' +
                '<td>' + value.designation +
                '</td>' +
                '<td>' + value.duration +
                '</td>' +
                '<td>' + value.natutre_of_job +
                '</td>' +
                '<td> <a href="javascript:void(0);" onclick="upload_image_view(' +
                "'/upload/phdstudent/" +
                value.noc_certificate + "'" +
                ');" >View Upload File</a><input type="hidden" name="noc_certi_hid[]" value="' +
                value.noc_certificate + '"> </td>' +
                '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" onclick="delete_certificate(' +
                value.id + ', ' + value.stu_id + ')">Remove</button></td></tr>';
        });
        $('.StuOrga').append(newRow);

    }
});
}


    function upload_image_view(url) {
        // alert(url);
        event.preventDefault();
        $('#view_upload_image').html('<embed src="' + url +
            '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
        $('#upload_image_view').modal('show');
    }
</script>
