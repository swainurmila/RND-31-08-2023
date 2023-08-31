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
            margin-bottom: 0px;
        }

        .col-md-4.cust-txt-input2 {
            width: 30%;
            margin-bottom: 0px;
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

        button,
        a.submit {
            background-color: #55a5db;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
            border-radius: 5px;
            text-transform: capitalize;
        }

        /* a.submit {
                                    padding: 14px 30px;
                                } */

        button:hover {
            opacity: 0.8;
        }

        .previous {
            background-color: #bbbbbb;
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
                                        <h2 class="text-center"><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA,
                                                ROURKELA</b></h2>
                                        <p class="text-center"><b>APPLICATION FORMAT FOR ENROLMENT TO Ph.D PROGRAMME
                                                {{ date('Y') }}</b></p>
                                    </div>

                                    <ul id="progressbar">
                                        <li id="account">Personal Information</li>
                                        <li class="active" id="personal">Education Info</li>
                                        <li id="payment">Payment Details</li>
                                    </ul>

                                    <form action="{{ route('draft.education.store', [$id]) }}" class="form" method="POST"
                                        id="myForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="tab">
                                            </br>
                                            <div class="panel-heading" style="color:#fff;background:#0a64a0 !important;">
                                                <b>Qualification
                                                    (HSC
                                                    Onwards): <span class="error">*</span></b>
                                            </div>
                                            <small style="display: inline-block" class="text-pink mt-2"><i>(Certificates are
                                                    in pdf/jpg/jpeg/png format and size must be less than
                                                    500kb)</i></small>
                                            </br>
                                            <div class="form-row pres" id="add_phdstudent_qualfication">
                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label"
                                                        for="phdstudent_qualification_field"><b>Exam
                                                            Passed:</b></label>
                                                    <select class="form-select " name="phdstudent_qualification_field"
                                                        id="phdstudent_qualification_field">
                                                        <option value="">Choose Exam Passed:</option>
                                                        <option value="HSC">HSC</option>
                                                        <option value="+2">+2</option>
                                                        <option value="Graduation">Graduation</option>
                                                        <option value="Post-Graduation">Post-Graduation
                                                        </option>
                                                        <option value="MPhil">MPhil</option>
                                                    </select>
                                                    <label class="error"></label>
                                                </div>
                                                <div class="col-md-3 cust-txt-input items" id="items">
                                                    <label class=" col-form-label"
                                                        for="phdstudent_specialization"><b>Discipline/Specialization:</b></label>
                                                    <input type="text" id="phdstudent_specialization" value=""
                                                        name="phdstudent_specialization" class="form-control ip_presdata"
                                                        placeholder="Enter specialization">
                                                    <label class="error"></label>
                                                </div>

                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label"
                                                        for="phdstudent_board_university"><b>Board /
                                                            University:</b></label>
                                                    <input type="text" id="phdstudent_board_university" value=""
                                                        name="phdstudent_board_university" class="form-control"
                                                        placeholder="Enter University">
                                                    <label class="error"></label>

                                                </div>
                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label" for="phdstudent_passing_year"><b>Year
                                                            of
                                                            Passing:</b></label>
                                                    <select class="form-select " id="phdstudent_passing_year"
                                                        name="phdstudent_passing_year">
                                                        <option value="">Choose Years:</option>
                                                        @for ($i = date('Y'); $i >= date('Y') - 50; $i--)
                                                            <option value="{{ $i }}">
                                                                {{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                    <label class="error"></label>
                                                </div>
                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label" for="phdstudent_division"><b>Class /
                                                            Division:</b></label>
                                                    <input type="text" id="phdstudent_division" value=""
                                                        name="phdstudent_division" class="form-control"
                                                        placeholder="Enter University">
                                                    <label class="error"></label>

                                                </div>
                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label" for="phdstudent_percentage_cgpa"><b>%
                                                            marks/CGPA:</b></label>
                                                    <input type="text" id="phdstudent_percentage_cgpa" value=""
                                                        name="phdstudent_percentage_cgpa" class="form-control"
                                                        placeholder="Enter University">
                                                    <label class="error"></label>
                                                </div>
                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label"
                                                        for="phdstudent_percentage_cgpa"><b>Upload
                                                            Certificate:</b></label>
                                                    <input class="form-control" type="file" name="file"
                                                        id="formFile">
                                                    <label class="error"></label>
                                                    <input type="hidden" name="file_thumb" value=""
                                                        id="formFile2">

                                                </div>
                                                <div class="col-md-3 cust-txt-input">
                                                    <label class=" col-form-label"
                                                        for="phdstudent_percentage_cgpa"><b>Upload
                                                            Marksheet:</b></label>
                                                    <input class="form-control" type="file" name="marksheet"
                                                        id="marksheet">
                                                    <label class="error"></label>
                                                    <input type="hidden" name="file_marksheet" value=""
                                                        id="file_marksheet">

                                                </div>
                                                <div class="col-md-3 cust-txt-input">
                                                    <div class="form-group">
                                                        <button type="button"
                                                            class="btn add_phdstudent_qualification_dtls  btn-success btn-icon waves-effect waves-themed "
                                                            style="margin-bottom: 2.3rem !important;"
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
                                                            <th>Marksheet</th>
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
                                                                <td><a href="javascript:void(0)"
                                                                        onclick="upload_image_view('/upload/phdstudent/{{ $value->marksheet }}')">
                                                                        View Upload File</a>
                                                                </td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field"
                                                                        onclick="delete_stu_certificate({{ $value->id }}, {{ $value->appl_id }})"
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
                                                onclick="myFunctionOrganisation()"
                                                data-value="{{ count($Organisation) }}">

                                            <div style="display: none;" id="textOrganisation" class="form-row">
                                                <div class="panel-heading mt-4"
                                                    style="color:#fff;background:#0a64a0 !important;">
                                                    <b>Organisation: <span class="error">*</span></b>
                                                </div>
                                                <small style="display: inline-block"
                                                    class="text-pink mt-2"><i>(Certificates are in pdf/jpg/jpeg/png format
                                                        and size must be less than
                                                        500kb)</i></small>
                                                <div id="textOrganisation2" class="form-row">
                                                    <div class="col-md-3 cust-txt-input">
                                                        <label class=" col-form-label"
                                                            for="phdstudent_organisation_name"><b>Name of the
                                                                Organisation:</b></label>
                                                        <input type="text" id="phdstudent_organisation_name"
                                                            value="" name="phdstudent_organisation_name"
                                                            class="form-control ip_presdata"
                                                            placeholder="Enter specialization">
                                                        <label class="error"></label>
                                                    </div>

                                                    <div class="col-md-3 cust-txt-input">
                                                        <label class=" col-form-label"
                                                            for="phdstudent_designation"><b>Designation:</b></label>
                                                        <input type="text" id="phdstudent_designation" value=""
                                                            name="phdstudent_designation" class="form-control"
                                                            placeholder="Enter University">
                                                        <label class="error"></label>
                                                    </div>
                                                    <div class="col-md-3 cust-txt-input">
                                                        <label class=" col-form-label"
                                                            for="phdstudent_duration"><b>Duration:</b></label>
                                                        <input type="text" id="phdstudent_duration" value=""
                                                            name="phdstudent_duration" class="form-control"
                                                            placeholder="Enter University">
                                                        <label class="error"></label>
                                                    </div>
                                                    <div class="col-md-3 cust-txt-input">
                                                        <label class=" col-form-label"
                                                            for="phdstudent_jobnature"><b>Nature of
                                                                Job:</b></label>
                                                        <input type="text" id="phdstudent_jobnature" value=""
                                                            name="phdstudent_jobnature" class="form-control"
                                                            placeholder="Enter University">
                                                        <label class="error"></label>
                                                    </div>
                                                    <div class="col-md-3 cust-txt-input">
                                                        <label class=" col-form-label"><b>Upload NOC
                                                                Certificate:</b></label>
                                                        <input type="file" class="form-control" name="noc_certi"
                                                            id="noc_certi">
                                                        <label class="error"></label>
                                                        <input type="hidden" value="" id="noc_certi_hid">
                                                    </div>
                                                    <div class="col-md-3 cust-txt-input">
                                                        <div class="form-group">
                                                            <button type="button"
                                                                class="btn add_phdstudent_organisation_dtls  btn-success btn-icon waves-effect waves-themed "
                                                                style="margin-top: 15px !important;"
                                                                id="add_phdstudent_organisation_dtls">
                                                                Add Organisation
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 cust-txt-input"></div>
                                                    <div class="col-md-3 cust-txt-input"></div>
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
                                                                            onclick="delete_orga_certi({{ $value->id }}, {{ $value->appl_id }})"
                                                                            data-name='SupQuali'>Remove</button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tbody class="addPhdOrganisationrow">
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                            <br>
                                            <div id="Other_Doc_row">
                                                <div class="panel-heading mt-4"
                                                    style="color:#fff;background:#0a64a0 !important;">
                                                    <b>Other Documents: <span class="error">*</span></b>
                                                </div>
                                                <small style="display: inline-block"
                                                    class="text-pink mt-2"><i>(Certificates are in pdf/jpg/jpeg/png format
                                                        and size must be less than
                                                        500kb)</i></small>
                                                <div class="form-row mt-4">
                                                    <div class="form-group col-md-9">
                                                        <div class="han_upload">
                                                            <div class="row">
                                                                <label class="col-md-5 col-form-label" for="phd_app_certi"
                                                                    style="padding-left:20px "><b>PHD Signed Application
                                                                        Form: <span class="error">*</span></b></label>
                                                                <div class="col-md-7">
                                                                    <input type="file" class="form-control"
                                                                        name="phd_app_certi" id="phd_app_certi">
                                                                    <input type="hidden" name="phd_app_hid_certi"
                                                                        value="">
                                                                    <p><a href="javascript:void(0)"
                                                                            onclick="upload_image_view('/upload/phd_app_certi/{{ $student->phd_app_file }}')">
                                                                            View Upload File</a></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="OtherDocument" class="form-row">
                                                    <div class="col-md-6 cust-txt-input">
                                                        <label class=" col-form-label"
                                                            for="phdstudent_organisation_name"><b>Name of Qualified
                                                                Test:</b><small><i> (GATE, NET, GPAT,
                                                                    etc..)</i></small></b></label>
                                                        <input type="text" id="other_doc_title" value=""
                                                            name="other_doc_title" class="form-control ip_presdata"
                                                            placeholder="Enter specialization">
                                                        <label class="error"></label>
                                                    </div>
                                                    <div class="col-md-3 cust-txt-input">
                                                        <label class=" col-form-label"><b>Upload File:</b></label>
                                                        <input class="form-control" type="file" name="other_doc_file"
                                                            id="other_doc_file">
                                                        <label class="error"></label>
                                                        <input type="hidden" value="" id="other_doc_file2">

                                                    </div>
                                                    <div class="col-md-3 cust-txt-input">
                                                        <div class="form-group">
                                                            <button type="button"
                                                                class="btn add_phdstudent_Other_Doc  btn-success btn-icon waves-effect waves-themed "
                                                                id="add_phdstudent_Other_Doc" style="margin-top: 15px;">
                                                                Add Document
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 cust-txt-input"></div>
                                                    <div class="col-md-3 cust-txt-input"></div>
                                                    <table class="table table-sm m-0 table-bordered">
                                                        <thead class="">
                                                            <tr class="table-heading">
                                                                <th>Title</th>
                                                                <th>View File</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="StuOther">
                                                            @foreach ($OtherDocuments as $value)
                                                                <tr>
                                                                    <td>{{ $value->doc_title }}</td>
                                                                    <td><a href="javascript:void(0)"
                                                                            onclick="upload_image_view('/upload/phdstudent/other_doc/{{ $value->doc_path }}')">
                                                                            View Upload File</a>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field"
                                                                            onclick="delete_other_certi({{ $value->id }},{{ $value->appl_id }})"
                                                                            data-name='SupQuali'>Remove</button>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tbody class="addOtherDocrow">
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <br>

                                            <br>
                                            <div class="sec-title">
                                                <p class=""><b>If applying to be enrolled as a Full Time
                                                        Scholar / Part Time
                                                        Scholar, Then attach NOC in prescribed Form No.
                                                        <b>BPUT/Ph.D-2019/2 and
                                                            BPUT/Ph.D-2019/3</b> as the case may be.</b>
                                                <p>
                                            </div>

                                            <div class="mb-2 row">
                                                <label class="col-md-4 col-form-label" for="phd_proposed_work"><b>Proposed
                                                        Title of the Ph.D
                                                        work to be carried out:</b></label>
                                                <div class="col-md-8">
                                                    <input type="text" id="phd_proposed_work"
                                                        value="{{ $student->topic_of_phd_work }}" name="phd_proposed_work"
                                                        class="form-control" placeholder="">
                                                </div>
                                            </div>


                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="phdstudent_propose_supervisor"><b>Proposed
                                                                Supervisor Name <span class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                            {{-- <input type="text" id="phdstudent_propose_supervisor"
                                                                value="{{ $PhdSupervisor->supervisor_name }}"
                                                                name="phdstudent_propose_supervisor" class="form-control"
                                                                placeholder="Enter supervisor name."> --}}
                                                            <select class="form-select text-capitalize" id="prop_super"
                                                                name="phdstudent_propose_supervisor">
                                                                <option value="">--- select supervisor --
                                                                </option>
                                                                @foreach ($supervisor as $key => $sup)
                                                                    <option value="{{ $sup->id }}"
                                                                        {{ $PhdSupervisor->sup_id != null && $PhdSupervisor->sup_id === $sup->id ? 'selected' : '' }}
                                                                        class="text-capitalize">
                                                                        {{ $sup->first_name . ' ' . $sup->last_name }}
                                                                    </option>
                                                                @endforeach

                                                            </select>
                                                            <input type="hidden" value="" name="sup_id"
                                                                id="sup_id">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="phdstudent_supervisor_add"><b>Supervisor
                                                                Address: <span class="error">*</span></b></label>
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
                                                                E-Mail Id: <span class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                            <input type="email" id="phdstudent_supervisor_email"
                                                                value="{{ $PhdSupervisor->supervisor_email }}"
                                                                name="phdstudent_supervisor_email" class="form-control"
                                                                placeholder="Enter supervisor emai id.">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="phdstudent_supervisor_phone"><b>Supervisor
                                                                Phone: <span class="error">*</span></b></label>
                                                        <div class="col-md-8">
                                                            <input type="tel" placeholder="123-45-678"
                                                                id="phdstudent_supervisor_phone"
                                                                value="{{ $PhdSupervisor->supervisor_phone }}"
                                                                name="phdstudent_supervisor_phone" class="form-control"
                                                                placeholder="Enter  valid contact number">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <label for="myCheck"><b>Proposed DSE (if any): </b></label>
                                            <input type="checkbox" id="myCheck" onclick="myFunction()">

                                            <div id="text" style="display: none;">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">

                                                        <div class="mb-2 row">
                                                            <label class="col-md-4 col-form-label"
                                                                for="phdstudent_propose_cosupervisor"><b>Proposed
                                                                    DSE Name</b></label>
                                                            <div class="col-md-7">
                                                                <input type="text" id="phdstudent_propose_cosupervisor"
                                                                    value="{{ $PhdSupervisor->co_supervisor_name }}"
                                                                    name="phdstudent_propose_cosupervisor"
                                                                    class="form-control"
                                                                    placeholder="Enter co supervisor name.">
                                                                {{-- <select class="form-select " id="prop_cosuper"
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
                                                            <div class="col-md-7">
                                                                <input type="email" id="phdstudent_cosupervisor_email"
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
                                                                    id="phdstudent_cosupervisor_phone"
                                                                    value="{{ $PhdSupervisor->co_supervisor_phone }}"
                                                                    name="phdstudent_cosupervisor_phone"
                                                                    class="form-control"
                                                                    placeholder="Enter  valid contact number">
                                                            </div>
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
                                                        <input type="hidden" name="hid_photo"
                                                            value="{{ $student->photo }}">
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
                                                        <input type="hidden" name="signature_hid"
                                                            value="{{ $student->signature }}">
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

                                </div>






                                <div class="mt-5 text-center">
                                    <button type="submit" class="submit">Save & Next</button>
                                    <a href="{{ route('draft.info', [$id]) }}" class="submit"
                                        type="submit">previous</a>
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
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/additional-methods.js"></script>

    {{-- <script type="text/javascript" src="{{ asset('js/multi-form.js') }}"></script> --}}

    <script>
        // $('#prop_super').on('change', (e) => {

        //     var supervisor_id = $('#prop_super').val();

        //     $.ajax({
        //         url: "{{ route('get.supervisor.details') }}",
        //         method: "GET",
        //         data: {
        //             id: supervisor_id
        //         },
        //         // contentType: false,
        //         // cache: false,
        //         // processData: false,
        //         success: function(data) {
        //             console.log(data);
        //             $('#phdstudent_supervisor_add').val(data.address1);
        //             $('#phdstudent_supervisor_email').val(data.data.email);
        //             $('#phdstudent_supervisor_phone').val(data.data.phone);
        //         }
        //     });
        // });
    </script>

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
                var file_marksheet = $('#file_marksheet').val();

                if (formFile2 != '') {
                    var upload_cert_file = document.getElementById('formFile');
                    var upload_cert_file = upload_cert_file.files;
                    var upload_cert_file2 = upload_cert_file[0].size;

                    var upload_cert_file_size = Math.round((upload_cert_file2 / 1024));

                    console.log(upload_cert_file_size);
                }
                if (file_marksheet != '') {
                    var upload_mark_file = document.getElementById('marksheet');
                    var upload_mark_file = upload_mark_file.files;
                    var upload_mark_file2 = upload_mark_file[0].size;

                    var upload_mark_file_size = Math.round((upload_mark_file2 / 1024));

                    console.log(upload_mark_file_size);
                }



                if (phdstudent_qualification_field === "" && phdstudent_specialization === "" &&
                    phdstudent_board_university === "" && phdstudent_passing_year === "" &&
                    phdstudent_division === "" && phdstudent_percentage_cgpa === "" && formFile2 === "" &&
                    file_marksheet === "") {
                    $("#phdstudent_qualification_field").next("label.error").text('this field is required');
                    $("#phdstudent_specialization").next("label.error").text('this field is required');
                    $("#phdstudent_board_university").next("label.error").text('this field is required');
                    $("#phdstudent_passing_year").next("label.error").text('this field is required');
                    $("#phdstudent_division").next("label.error").text('this field is required');
                    $("#phdstudent_percentage_cgpa").next("label.error").text('this field is required');
                    $("#formFile").next("label.error").text('this field is required');
                    $("#marksheet").next("label.error").text('this field is required');

                } else if (phdstudent_qualification_field === "" || phdstudent_specialization === "" ||
                    phdstudent_board_university === "" || phdstudent_passing_year === "" ||
                    phdstudent_division === "" || phdstudent_percentage_cgpa === "" || formFile2 === "" ||
                    file_marksheet === "") {
                    $('#phdstudent_qualification_field').val() !== '' ? $('#phdstudent_qualification_field')
                        .next("label.error").text('') : $("#phdstudent_qualification_field").next(
                            "label.error").text('this field is required');

                    $('#phdstudent_specialization').val() !== '' ? $('#phdstudent_specialization').next(
                            "label.error").text('') : $("#phdstudent_specialization").next("label.error")
                        .text('this field is required');

                    $('#phdstudent_board_university').val() !== '' ? $('#phdstudent_board_university').next(
                            "label.error").text('') : $("#phdstudent_board_university").next("label.error")
                        .text('this field is required');

                    $('#phdstudent_passing_year').val() !== '' ? $('#phdstudent_passing_year').next(
                            "label.error").text('') : $("#phdstudent_passing_year").next("label.error")
                        .text('this field is required');

                    $('#phdstudent_division').val() !== '' ? $('#phdstudent_division').next("label.error")
                        .text('') : $("#phdstudent_division").next("label.error").text(
                            'this field is required');

                    $('#phdstudent_percentage_cgpa').val() !== '' ? $('#phdstudent_percentage_cgpa').next(
                            "label.error").text('') : $("#phdstudent_percentage_cgpa").next("label.error")
                        .text('this field is required');

                    $('#formFile2').val() !== '' ? $('#formFile').next("label.error").text('') : $(
                        "#formFile").next("label.error").text('this field is required');

                    $('#file_marksheet').val() !== '' ? $('#marksheet').next("label.error").text('') : $(
                        "#marksheet").next("label.error").text('this field is required');


                } else if (upload_cert_file_size > 500 || upload_mark_file_size > 500) {
                    upload_cert_file_size > 500 ? $('#formFile').next("label.error").text(
                        'File size must be less than 500kb') : $("#formFile").next("label.error").text(
                        '');
                    upload_mark_file_size > 500 ? $('#marksheet').next("label.error").text(
                        'File size must be less than 500kb') : $("#marksheet").next("label.error").text(
                        '');

                }
                // else if(upload_mark_file_size > 500 ){
                //     upload_mark_file_size > 500 ? $('#marksheet').next("label.error").text('File size must be less than 500kb'):$("#marksheet").next("label.error").text('');
                // }
                else {


                    $('#phdstudent_qualification_field').next("label.error").remove();
                    $('#phdstudent_specialization').next("label.error").remove();
                    $('#phdstudent_board_university').next("label.error").remove();
                    $('#phdstudent_passing_year').next("label.error").remove();
                    $('#phdstudent_division').next("label.error").remove();
                    $('#phdstudent_percentage_cgpa').next("label.error").remove();
                    $('#formFile').next("label.error").remove();
                    $('#marksheet').next("label.error").remove();

                    var newRow = '<tr>' +
                        '<td>' + phdstudent_qualification_field +
                        '<input type="hidden" name="stu_quali[]" value="' +
                        phdstudent_qualification_field + '"></td>' +
                        '<td>' + phdstudent_specialization +
                        '<input type="hidden" name="stu_spec[]" value="' +
                        phdstudent_specialization + '"></td>' +
                        '<td>' + phdstudent_board_university +
                        '<input type="hidden" name="stu_univer[]" value="' +
                        phdstudent_board_university + '"></td>' +
                        '<td>' + phdstudent_passing_year +
                        '<input type="hidden" name="stu_pass_year[]" value="' +
                        phdstudent_passing_year + '"></td>' +
                        '<td>' + phdstudent_division +
                        '<input type="hidden" name="stu_division[]" value="' +
                        phdstudent_division + '"></td>' +
                        '<td>' + phdstudent_percentage_cgpa +
                        '<input type="hidden" name="stu_percentage[]" value="' +
                        phdstudent_percentage_cgpa + '"></td>' +
                        '<td> <a href="javascript:void(0);" onclick="upload_image_view(' +
                        "'/upload/phdstudent/" +
                        formFile2 + "'" +
                        ');" >View Upload File</a><input type="hidden" name="formFile_hid[]" value="' +
                        formFile2 + '"> </td>' +
                        '<td> <a href="javascript:void(0);" onclick="upload_image_view(' +
                        "'/upload/phdstudent/" +
                        file_marksheet + "'" +
                        ');" >View Upload File</a><input type="hidden" name="marksheet_hid[]" value="' +
                        file_marksheet + '"> </td>' +
                        '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                        counter + '">Remove</button></td></tr>';
                    $('.addPhdQualifyrow').append(newRow);
                    count++;
                    counter++;
                }
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

                if (noc_certi_hid != '') {
                    var noc_certi = document.getElementById('noc_certi');
                    var noc_certi = noc_certi.files;
                    var noc_certi2 = noc_certi[0].size;

                    var upload_noc_certi_size = Math.round((noc_certi2 / 1024));

                    console.log(upload_noc_certi_size);
                }
                if (phdstudent_organisation_name === "" && phdstudent_designation === "" &&
                    phdstudent_duration === "" && phdstudent_jobnature === "" && noc_certi_hid === "") {
                    $("#phdstudent_organisation_name").next("label.error").text('this field is required');
                    $("#phdstudent_designation").next("label.error").text('this field is required');
                    $("#phdstudent_duration").next("label.error").text('this field is required');
                    $("#phdstudent_jobnature").next("label.error").text('this field is required');
                    $("#phdstudent_division").next("label.error").text('this field is required');
                    $("#noc_certi").next("label.error").text('this field is required');


                } else if (phdstudent_organisation_name === "" || phdstudent_designation === "" ||
                    phdstudent_duration === "" || phdstudent_jobnature === "" || noc_certi_hid === "") {

                    $('#phdstudent_organisation_name').val() !== '' ? $('#phdstudent_organisation_name')
                        .next("label.error").text('') : $("#phdstudent_organisation_name").next(
                            "label.error").text('this field is required');

                    $('#phdstudent_designation').val() !== '' ? $('#phdstudent_designation').next(
                            "label.error").text('') : $("#phdstudent_designation").next("label.error")
                        .text('this field is required');

                    $('#phdstudent_duration').val() !== '' ? $('#phdstudent_duration').next(
                            "label.error").text('') : $("#phdstudent_duration").next("label.error")
                        .text('this field is required');

                    $('#phdstudent_jobnature').val() !== '' ? $('#phdstudent_jobnature').next(
                            "label.error").text('') : $("#phdstudent_jobnature").next("label.error")
                        .text('this field is required');

                    $('#noc_certi_hid').val() !== '' ? $('#noc_certi').next("label.error")
                        .text('') : $("#noc_certi").next("label.error").text(
                            'this field is required');

                } else if (upload_noc_certi_size > 500) {
                    upload_noc_certi_size > 500 ? $('#noc_certi').next("label.error").text(
                            'File size must be less than 500kb') : $("#noc_certi").next("label.error")
                        .text('');
                } else {

                    $('#phdstudent_organisation_name').next("label.error").text('');
                    $('#phdstudent_designation').next("label.error").text('');
                    $('#phdstudent_duration').next("label.error").text('');
                    $('#phdstudent_jobnature').next("label.error").text('');
                    $('#noc_certi').next("label.error").text('');


                    var newRow = '<tr>' +
                        '<td>' + phdstudent_organisation_name +
                        '<input type="hidden" name="stu_orga[]" value="' +
                        phdstudent_organisation_name + '"></td>' +
                        '<td>' + phdstudent_designation +
                        '<input type="hidden" name="stu_desig[]" value="' +
                        phdstudent_designation + '"></td>' +
                        '<td>' + phdstudent_duration +
                        '<input type="hidden" name="stu_duration[]" value="' +
                        phdstudent_duration + '"></td>' +
                        '<td>' + phdstudent_jobnature +
                        '<input type="hidden" name="stu_jobnature[]" value="' +
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
                }
            });

            $(".addPhdOrganisationrow").on("click", ".remove_field", function(e) {
                $(this).parent('td').parent('tr').remove();
                counterPhdOrganiseRow--;
                countPhdOrganiseRow--;
            });
        });

        // add Other Document
        var countOtherDocRow = 1;
        var counterOtherDocRow = 0;
        $(document).ready(function() {
            $('.add_phdstudent_Other_Doc').click(function(e) {
                e.preventDefault();
                var other_doc_title = $('#other_doc_title').val();
                var other_doc_file = $('#other_doc_file2').val();

                if (other_doc_file != '') {
                    var other_doc = document.getElementById('other_doc_file');
                    var other_doc = other_doc.files;
                    var other_doc2 = other_doc[0].size;

                    var upload_other_doc_size = Math.round((other_doc2 / 1024));

                    console.log(upload_other_doc_size);
                }

                if (other_doc_title === "" && other_doc_file === "") {
                    $("#other_doc_title").next("label.error").text('this field is required');
                    $("#other_doc_file").next("label.error").text('this field is required');
                    // $("#other_doc_file").after(
                    //     "<label class='error'>file is less than 500 kb</label>");

                } else if (other_doc_file === "" || other_doc_title === "") {
                    $('#other_doc_title').val() !== '' ? $('#other_doc_title').next("label.error").text(
                        '') : $("#other_doc_title").next("label.error").text('this field is required');

                    $('#other_doc_file2').val() !== '' ? $('#other_doc_file').next("label.error").text('') :
                        $("#other_doc_file").next("label.error").text('this field is required');


                } else if (upload_other_doc_size > 500) {
                    upload_other_doc_size > 500 ? $('#other_doc_file').next("label.error").text(
                            'File size must be less than 500kb') : $("#other_doc_file").next("label.error")
                        .text('');
                } else {

                    $('#other_doc_title').next("label.error").text('');
                    $('#other_doc_file').next("label.error").text('');


                    var newRow = '<tr>' +
                        '<td>' + other_doc_title +
                        '<input type="hidden" name="other_doc_title_hid[]" value="' +
                        other_doc_title + '"></td>' +

                        '<td> <a href="javascript:void(0);" onclick="upload_image_view(' +
                        "'/upload/phdstudent/other_doc/" +
                        other_doc_file + "'" +
                        ');" >View Upload File</a><input type="hidden" name="other_doc_hid[]" value="' +
                        other_doc_file + '"> </td>' +
                        '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                        counterOtherDocRow + '">Remove</button></td></tr>';
                    $('.addOtherDocrow').append(newRow);
                    countOtherDocRow++;
                    counterOtherDocRow++;
                }
            });

            $(".addOtherDocrow").on("click", ".remove_field", function(e) {
                // alert('1');
                $(this).parent('td').parent('tr').remove();
                counterOtherDocRow--;
                countOtherDocRow--;
            });
        });
    </script>


    <script>
        // ========= for delete student qualificatoin  certificate

        function delete_stu_certificate(id, appl_id) {

            var postData = new FormData();
            postData.append('id', id);
            postData.append('appl_id', appl_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                async: true,
                type: "post",
                contentType: false,
                url: "{{ url('/phdstudent/delete-qual-certi') }}",
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
                            '<td> <a href="javascript:void(0);" onclick="upload_image_view(' +
                            "'/upload/phdstudent/" +
                            value.marksheet + "'" +
                            ');" >View Upload File</a><input type="hidden" name="formFile_hid[]" value="' +
                            value.marksheet + '"> </td>' +
                            '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" onclick="delete_certificate(' +
                            value.id + ', ' + value.appl_id + ')">Remove</button></td></tr>';
                    });
                    $('.StuQuali').append(newRow);

                }
            });
        }







        // ========= for delete student organization certificate

        function delete_orga_certi(id, appl_id) {

            var postData = new FormData();
            postData.append('id', id);
            postData.append('appl_id', appl_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                async: true,
                type: "post",
                contentType: false,
                url: "{{ url('/phdstudent/delete-orga-certi') }}",
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
                            value.id + ', ' + value.appl_id + ')">Remove</button></td></tr>';
                    });
                    $('.StuOrga').append(newRow);

                }
            });
        }

        // ========= for delete Other certificate

        function delete_other_certi(id, appl_id) {



            var postData = new FormData();
            postData.append('id', id);
            postData.append('appl_id', appl_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                async: true,
                type: "post",
                contentType: false,
                url: "{{ url('/phdstudent/delete-other-certi') }}",
                data: postData,
                processData: false,
                success: function(data) {
                    console.log(data);
                    $('.StuOther').empty();
                    var newRow = '';
                    var c = 0;
                    $.each(data, function(key, value) {

                        newRow += '<tr>' +
                            '<td>' + value.doc_title + '</td>' +
                            '</td>' +
                            '<td> <a href="javascript:void(0);" onclick="upload_image_view(' +
                            "'/upload/phdstudent/" +
                            value.doc_path + "'" +
                            ');" >View Upload File</a><input type="hidden" name="other_doc_hid[]" value="' +
                            value.doc_path + '"> </td>' +
                            '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" onclick="delete_certificate(' +
                            value.id + ', ' + value.appl_id + ')">Remove</button></td></tr>';
                    });
                    $('.StuOther').append(newRow);

                }
            });
        }


        // ========== upload marksheet 

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('change', '#marksheet', function() {
            console.log('Marksheet upload');
            var name = document.getElementById("marksheet").files[0].name;

            //alert(name);
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("marksheet").files[0]);
            //var f = document.getElementById("file").files[0];
            form_data.append("file", document.getElementById('marksheet').files[0]);

            $.ajax({
                url: "{{ route('phdStudents.marksheet') }}",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    // $('#uploaded_image').html(data);
                    // $('#prescription_file').prop("href", data.pdf_path);
                    $('#file_marksheet').val(data.img_name);
                    // $('.modal-body embed').prop("src", data.pdf_path)

                }
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


            // jQuery("#").validate({
            jQuery("#myForm").validate({
                // Specify validation rules
                //var val = {
                rules: {
                    // name_prefix: "required",
                    // name_of_faculty: "required",
                    // topic_of_phd_work: "required",
                    // academic_programme: "required",
                    // ncr_department_name: "required",
                    // father_husband_name: "required",
                    // mothers_name: "required",
                    // permanent_address: "required",
                    // present_address: "required",
                    // phdstudent_mobile: "required",
                    // date_of_birth: "required",
                    // phd_nationality: "required",
                    // student_category: "required",
                    // general_category: "required",


                    // phdstudent_qualification_field: "required",
                    // phdstudent_specialization: "required",
                    // phdstudent_board_university: "required",
                    // phdstudent_passing_year: "required",
                    // phdstudent_division: "required",
                    // phdstudent_percentage_cgpa: "required",
                    // phd_proposed_work: "required",
                    phdstudent_propose_supervisor: "required",
                    phdstudent_supervisor_add: "required",
                    phdstudent_supervisor_phone: "required",
                    phdstudent_propose_cosupervisor: "required",
                    phdstudent_cosupervisor_add: "required",
                    phdstudent_cosupervisor_email: "required",
                    phdstudent_cosupervisor_phone: "required",




                    check: "required",
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


        // ======== for Other Document Upload

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('change', '#other_doc_file', function() {
            console.log('thumb upload');
            var name = document.getElementById("other_doc_file").files[0].name;

            //alert(name);
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("other_doc_file").files[0]);
            //var f = document.getElementById("file").files[0];
            form_data.append("file", document.getElementById('other_doc_file').files[0]);

            $.ajax({
                url: "{{ route('phdStudents.other') }}",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    // $('#uploaded_image').html(data);
                    // $('#prescription_file').prop("href", data.pdf_path);
                    $('#other_doc_file2').val(data.img_name);
                    // $('.modal-body embed').prop("src", data.pdf_path)

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

        if (oraga_val != 0) {
            $('#myCheckOrganisation').prop('checked', true);
            $('#textOrganisation').css({
                'display': 'block'
            });
        }
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

        if (dse_val != "") {
            $('#myCheck').prop('checked', true);
            $('#text').css({
                'display': 'block'
            });
        }
    </script>


@endsection
