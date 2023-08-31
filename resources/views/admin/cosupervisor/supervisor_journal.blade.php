@extends('admin.layouts.app')
@section('heading', 'Co-Supervisor')
@section('sub-heading', 'Co-Supervisor Form Apply')
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
                                        <li id="personal">Education Info</li>
                                        <li class="active" id="journal">Journal/Piblication</li>
                                    </ul>

                                    <form action="{{ route('cosup.journal.store', [$id]) }}" class="form" method="POST"
                                        id="myForm" enctype="multipart/form-data">
                                        @csrf

                                        <div class="panel-heading" style="color:#fff;background:#0a64a0 !important;">
                                            <b>Publication in Journals during last five years (SCI/SCOPUS
                                                indexed / UGC listed journals): <span class="error">*</span></b>
                                        </div>
                                        </br>
                                        <div class="mb-2 row">
                                            <label class="col-md-3 col-form-label" for="total_journals_paper"><b>Total
                                                    Number of Papers in
                                                    Journals:</b>
                                            </label>
                                            <div class="col-md-8">
                                                <input type="text" id="total_journals_paper" name="total_journals_paper"
                                                    class="form-control" placeholder="Enter total journals paper">
                                            </div>
                                        </div>
                                        <p style="text-align: justify !important;"><b>Provide details of
                                                best three publications (published / accepted)</b></p>
                                        <small id="" class="form-text text-muted">(Attach the
                                            front page only)</small>

                                        <div class="form-row add_best_three_publications" id="add_best_three_publications">

                                            <div class="col-md-3 cust-txt-input">
                                                <label class=" col-form-label"
                                                    for="best_three_title_of_paper"><b>Title:</b></label>
                                                <input type="text" id="best_three_title_of_paper" class="form-control"
                                                    name="pub_name" placeholder="Enter title of paper">

                                            </div>

                                            <div class="col-md-3 cust-txt-input">
                                                <label class=" col-form-label"
                                                    for="best_three_paper_authors"><b>Author(s):</b></label>
                                                <input type="text" id="best_three_paper_authors" name="pub_auth"
                                                    class="form-control" placeholder="Enter Author(s)">

                                            </div>

                                            <div class="col-md-3 cust-txt-input">
                                                <label class=" col-form-label" for="best_three_journal_name"><b>Name of the
                                                        Journal:</b></label>
                                                <input type="text" id="best_three_journal_name" name="pub_jour"
                                                    class="form-control" placeholder="Enter name of the journal">

                                            </div>
                                            <div class="col-md-3 cust-txt-input">
                                                <label class=" col-form-label"
                                                    for="best_three_vol_year_page"><b>Vol,&Year,Page:</b></label>
                                                <input type="text" id="best_three_vol_year_page" name="pub_vol"
                                                    class="form-control" placeholder="Enter volume,year and page">

                                            </div>

                                            <div class="col-md-3 cust-txt-input">
                                                <label class=" col-form-label"
                                                    for="best_three_indexing"><b>Indexing:</b></label>
                                                <input type="text" id="best_three_indexing" name="pub_index"
                                                    class="form-control">

                                            </div>

                                            <div class="col-md-4 cust-txt-input2">
                                                <label class=" col-form-label"><b>Upload front Page
                                                        :</b></label>
                                                <input type="file" class="form-control" name="journal_uplaod"
                                                    id="journal_uplaod">
                                                <input type="hidden" value="" id="journal_uplaod_hid">

                                            </div>


                                            <div class="col-md-4 cust-txt-input2">
                                                <div class="form-group">
                                                    <button type="button"
                                                        class="btn add_best_three_publication_dtls btn-outline-success btn-icon waves-effect waves-themed "
                                                        style="margin-top: 2.3rem !important;"
                                                        id="add_best_three_publication_dtls">
                                                        +
                                                    </button>
                                                </div>
                                            </div>

                                            <table class="table table-sm m-0 table-bordered">
                                                <thead class="">
                                                    <tr class="table-heading">
                                                        <th>Title</th>
                                                        <th>Author(s)</th>
                                                        <th>Name of Journals</th>
                                                        <th>vol,year&Page</th>
                                                        <th>Indexing</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="add3PubRow">
                                                </tbody>
                                            </table>
                                        </div>
                                        </br>
                                        <div class="panel-heading" style="color:#fff;background:#0a64a0 !important;">
                                            <b>Details of
                                                the publication in Journals during last five years (SCI /
                                                SCOPUS indexed Journals as First / Corresponding Author):
                                                <span class="error">*</span></b>
                                        </div>
                                        <p style="text-align: justify !important;"><b>Provide details of at
                                                least one publication (published / accepted) as the First /
                                                Corresponding Author and attach one photo copy of the full
                                                paper.</b></p>

                                        <div class="form-row" id="add_atleast_one_publications">

                                            <div class="col-md-3 cust-txt-input">
                                                <label class=" col-form-label"
                                                    for="atleast_one_title_of_paper"><b>Title:</b></label>
                                                <input type="text" id="atleast_one_title_of_paper" name="det_title"
                                                    class="form-control" placeholder="Enter title of paper">

                                            </div>

                                            <div class="col-md-3 cust-txt-input">
                                                <label class=" col-form-label"
                                                    for="atleast_one_paper_authors"><b>Author(s):</b></label>
                                                <input type="text" id="atleast_one_paper_authors" class="form-control"
                                                    name="author_name" placeholder="Enter Author(s)">

                                            </div>

                                            <div class="col-md-3 cust-txt-input">
                                                <label class=" col-form-label" for="atleast_one_journal_name"><b>Name of
                                                        the
                                                        Journal:</b></label>
                                                <input type="text" id="atleast_one_journal_name" class="form-control"
                                                    placeholder="Enter name of the journal" name="jour_name">

                                            </div>
                                            <div class="col-md-3 cust-txt-input">
                                                <label class=" col-form-label"
                                                    for="atleast_one_vol_year_page"><b>Vol,&Year,Page:</b></label>
                                                <input type="text" id="atleast_one_vol_year_page" class="form-control"
                                                    placeholder="Enter volume,year and page" name="vol_type">

                                            </div>

                                            <div class="col-md-3 cust-txt-input">
                                                <label class=" col-form-label"
                                                    for="atleast_one_indexing"><b>Indexing:</b></label>
                                                <input type="text" id="atleast_one_indexing" class="form-control"
                                                    name="index_name">

                                            </div>

                                            <div class="col-md-3 cust-txt-input2">
                                                <label class=" col-form-label"><b>Upload pdf :</b></label>
                                                <input type="file" class="form-control" name="journal_pdf"
                                                    id="journal_pdf">
                                                <input type="hidden" value="" id="journal_pdf_hid">

                                            </div>


                                            <div class="col-md-3 cust-txt-input">
                                                <div class="form-group">
                                                    <button type="button"
                                                        class="btn add_atleast_one_publication_dtls btn-outline-success btn-icon waves-effect waves-themed "
                                                        style="margin-top: 2.3rem !important;"
                                                        id="add_atleast_one_publication_dtls">
                                                        +
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-3 cust-txt-input"></div>
                                            <table class="table table-sm m-0 table-bordered">
                                                <thead class="">
                                                    <tr class="table-heading">
                                                        <th>Title</th>
                                                        <th>Author(s)</th>
                                                        <th>Name of Journals</th>
                                                        <th>vol,year&Page</th>
                                                        <th>Indexing</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="add1PubRow">
                                                </tbody>
                                            </table>
                                        </div>
                                        </br>
                                        
                                        <div class="tab">
                                            <div class="panel-heading" style="color:#fff;background:#0a64a0 !important;">
                                                <b>Details of
                                                    Ph.D Students presently supervising: <span class="error">*</span></b>
                                            </div>
                                            </br>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="phd_total_number"><b>Total
                                                        Number:</b></label>
                                                <div class="col-md-10">
                                                    <input type="number" id="phd_total_number" name="phd_total_number"
                                                        class="form-control" placeholder="Enter total number">
                                                </div>
                                            </div>
        
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label" for="as_supervisor"><b>As
                                                                Supervisor:</b></label>
                                                        <div class="col-md-7">
                                                            <input type="number" id="as_supervisor" name="as_supervisor"
                                                                class="form-control" placeholder="Enter number as supervisor">
                                                            nos.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label" for="as_cosupervisor"><b>As
                                                                Co-Supervisor:</b></label>
                                                        <div class="col-md-8">
                                                            <input type="number" id="as_cosupervisor" name="as_cosupervisor"
                                                                class="form-control" placeholder="Enter number as co-supervisor">
                                                            nos.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label" for="as_unreserved"><b>Unreserved
                                                                (UR):</b></label>
                                                        <div class="col-md-7">
                                                            <input type="number" id="as_unreserved" name="as_unreserved"
                                                                class="form-control" placeholder="Enter number as Unreserved">
                                                            nos.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="as_st_sc"><b>ST/SC:</b></label>
                                                        <div class="col-md-8">
                                                            <input type="number" id="as_st_sc" name="as_st_sc"
                                                                class="form-control" placeholder="Enter number as ST/SC"> nos.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="as_differently_abled"><b>Differently
                                                                Abled:</b></label>
                                                        <div class="col-md-7">
                                                            <input type="number" id="as_differently_abled"
                                                                name="as_differently_abled" class="form-control"
                                                                placeholder="Enter number as Differently Abled">
                                                            nos.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="as_national_test_qualified"><b>National Test
                                                                Qualified:</b></label>
                                                        <div class="col-md-7">
                                                            <input type="text" id="as_national_test_qualified"
                                                                name="as_national_test_qualified" class="form-control"
                                                                placeholder="Enter number as national test ">
                                                            nos.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label" for="as_anyother"><b>Any
                                                                Other:</b></label>
                                                        <div class="col-md-8">
                                                            <input type="number" id="as_anyother" name="as_anyother"
                                                                class="form-control" placeholder="Enter number if any other"> nos.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <p style="text-align: justify !important;"><b>*GATE/ UGC-NET /CAT
                                                    /SLET /QIP/FIP/ NDP/ UGC-CSIR NET/ GPAT or other similar
                                                    national tests</b></p>
                                            </br>
                                            <small id="" class="form-text text-muted">Copy of the
                                                University/Institute notification to be enclosed in this Tabular
                                                format)</small>
        
                                            <div class="form-row" id="add_phd_students">
        
                                                <div class="col-md-4 cust-txt-input2">
                                                    <label class="col-form-label" for="phd_student_name"><b>Name of the
                                                            student:</b></label>
                                                    <input type="text" id="phd_student_name" name="phd_student_name"
                                                        class="form-control" placeholder="Enter PhD student name">
        
                                                </div>
        
                                                <div class="col-md-4 cust-txt-input2">
                                                    <label class="col-form-label"><b>Supervisor/CoSupervisor:</b></label>
                                                    <input type="text" id="phd_select_sup_cosup" name="phd_select_sup_cosup"
                                                        class="form-control" placeholder="Supervisor/CoSupervisor">
        
                                                </div>
        
                                                <div class="col-md-4 cust-txt-input2">
                                                    <label class="col-form-label"><b>University
                                                            Regd.No.
                                                            /Enrolment No. & Present Status
                                                            (Continuing/Submitted):</b></label>
                                                    <input type="text" id="phd_regdno_enrol_status"
                                                        name="phd_regdno_enrol_status" class="form-control"
                                                        placeholder="Enter Regd. no./ Enrollment No/ Status">
        
                                                </div>
                                                <div class="col-md-4 cust-txt-input2">
                                                    <label class="col-form-label"><b>Name of the
                                                            University:</b></label>
                                                    <input type="text" id="phd_university_name" name="phd_university_name"
                                                        class="form-control" placeholder="Enter name of the university">
        
                                                </div>
                                                <div class="col-md-4 cust-txt-input2">
                                                    <div class="form-group">
                                                        <button type="button"
                                                            class="btn add_phd_students_dtls btn-outline-success btn-icon waves-effect waves-themed "
                                                            style="margin-top: 2.3rem !important;" id="add_phd_students_dtls2">
                                                            +
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 cust-txt-input2"></div>
                                                <table class="table table-sm m-0 table-bordered">
                                                    <thead class="">
                                                        <tr class="table-heading">
                                                            <th>Name of the student</th>
                                                            <th>Supervisor/Co-Supervisor</th>
                                                            <th>University Regd.No. /Enrolment No. & Present
                                                                Status</th>
                                                            <th>Name of the University:</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="addPhdStudentRow">
                                                    </tbody>
                                                </table>
                                            </div>
                                            </br>
        
                                            <div class="mb-2 row">
                                                <label class="col-md-4 col-form-label" for="area_research_work"><b>Area of
                                                        Proposed Research
                                                        work:</b></label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" id="area_research_work" rows="5" name="area_research_work"></textarea>
                                                </div>
                                            </div>
        
                                            <div class="mb-2 row">
                                                <label class="col-md-4 col-form-label" for="debarred_action"><b>Have you ever been
                                                        debarred from
                                                        supervising from any university:</b></label>
                                                <div class="col-md-8">
                                                    <select class="custom-select form-control" id="debarred_action"
                                                        name="debarred_action">
                                                        <option value="">Choose Action Type</option>
                                                        <option value="YES">YES</option>
                                                        <option value="NO">NO</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <small id="" class="form-text text-muted">If yes, give
                                                reasons and attach the documents detail.</small>
                                            </br>
        
                                            <div class="mb-2 row">
                                                <label class="col-md-4 col-form-label" for="any_other_relevant_info"><b>Any other
                                                        relevant
                                                        information (if any):</b></label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" id="any_other_relevant_info" rows="5" name="any_other_relevant_info"></textarea>
                                                </div>
                                            </div>
        
                                            <div class="mb-2 row">
                                                <label class="col-md-4 col-form-label" for="email"><b>Mail
                                                        ID of the Head of the Institute: <span class="error">*</span></b></label>
                                                <div class="col-md-8">
                                                    <input type="email" id="email" name="mailid_head_institute"
                                                        class="form-control" placeholder="Enter mail id of the institute">
        
                                                </div>
                                            </div>
                                            <!-- <div class="mb-2 row">
                                                                    <label class="col-md-4" for="file"><b class="">Upload Employer Certificate</b></label>
                                                                    <div class="col-md-8">
                                                                        <input type="file" id="file" name="employee_certificate_file" multiple>
                                                                    </div>
                                                                </div> -->
        
                                            <div class="form-row" id="add_employment">
                                                <div class="col">
                                                    <label class="" for="file"><b class="">Upload Employer
                                                            Certificate <span class="error">*</span></b></label>
                                                    <input type="file" id="file" name="employee_certificate_file"
                                                        multiple>
                                                </div>
                                                <!-- <div class="col">
                                                                    </div> -->
                                                <div class="col">
                                                    <p class="" style="text-align: inherit !important;">
                                                        <span class="mytooltip tooltip-effect-1">
                                                            <span class="tooltip-item">Sample Employer
                                                                Certificate</span>
                                                            <span class="tooltip-content clearfix">
                                                                <img src="{{ asset('image/certificate_sample.png') }}">
                                                            </span>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
        
                                            <!-- <div class="">
                                                                    <p class="" style="text-align: inherit !important;">
                                                                        <span class="mytooltip tooltip-effect-1">
                                                                            <span class="tooltip-item">Sample Employer Certificate</span>
                                                                            <span class="tooltip-content clearfix">
                                                                                <img src="{{ asset('image/certificate_sample.png') }}">
                                                                            </span>
                                                                        </span>
                                                                    </p>
                                                                </div> -->
        
                                            <div class="form-row">
                                                <div class="col">
                                                    <label class="" for="file"><b class="">Upload your photo
                                                            <span class="error">*</span></b></label>
                                                    <input type="file" id="file" name="upload_photo_file" multiple>
                                                </div>
        
                                            </div>
        
        
        
                                            {{-- <div>
                                                <h2
                                                    style="text-align: center;margin-top: 4rem !important;font-size: 1.3rem !important;">
                                                    <b>DECLARATION</b></h2>
                                                <p style="text-align: justify !important;"><b>I hereby, solemnly
                                                        declare that the information furnished in this
                                                        application are true and correct to the best of my
                                                        knowledge and belief. If at any time, I am found to have
                                                        concealed/ supressed a material/ information or given
                                                        any false details, the University shall have every right
                                                        to take action against me for which I shall have no
                                                        objection.</b></p>
                                                </br>
        
                                                <div class="row">
                                                    <div class="col-lg">
                                                        <small id=""
                                                            class="form-text text-muted"><b>Date:</b></small>
                                                        <small id=""
                                                            class="form-text text-muted"><b>Place:</b></small>
                                                    </div>
                                                    <div class="col-lg">
                                                    </div>
                                                    <div class="col-lg">
                                                    </div>
                                                    <div class="col-lg">
                                                        <small id=""
                                                            class="form-text text-muted"><b>Signature of
                                                                Applicant with date:</b></small>
                                                        <small id=""
                                                            class="form-text text-muted"><b>(Name,Designation
                                                                and Affiliation address)</b></small>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <!-- <div class="row pxy-4 button-end-style">
                                                                    <input type="button"  class="previous btn prev-btn-style"  id="previous2" style=''/>
                                                                    <input type="submit"  class="submit btn submit-btn-style"  id="next3" style=''/>
                                                                </div> -->
        
        
                                            <div>
                                                <div class="mt-5 text-center">
                                                    <button type="submit" class="submit">Save & Next</button>
                                                    <a href="{{ route('codraft.education.view', [$id]) }}" class="submit" type="submit">previous</a>
                                                </div>
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
    {{-- <script src="{{asset('js/jquery.validate.js')}}"></script> --}}
    {{-- <script src="{{ asset('js/form-validation-by-sc.js') }}"></script> --}}
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
                    phd_student_name: "required",
                    phd_select_sup_cosup: "required",
                    phd_regdno_enrol_status: "required",
                    phd_university_name: "required",
                    total_journals_paper: "required",
                    pub_name: "required",
                    pub_auth: "required",
                    pub_jour: "required",
                    pub_vol: "required",
                    pub_index: "required",
                    journal_uplaod: {
                        required: true,
                        extension: "jpg,jpeg,pdf,png",
                        filesize: 500
                    },
                    det_title: "required",
                    jour_name: "required",
                    author_name: "required",
                    vol_type: "required",
                    index_name: "required",
                    journal_pdf: {
                        required: true,
                        extension: "jpg,jpeg,pdf,png",
                        filesize: 500
                    }



                },
                // Specify validation error messages
                messages: {
                    journal_uplaod: {
                        extension: "please upload formrt jpg,png,pdf,jpeg ",
                        filesize: "filesize must be less than 500kb"
                    },
                    journal_pdf: {
                        extension: "please upload formrt jpg,png,pdf,jpeg ",
                        filesize: "filesize must be less than 500kb"
                    },




                }
                // ,
                // errorElement: "div",
                // wrapper: "div",
                // errorLabelContainer: ".message"
            });


        });
    </script>

    <script>
        //add best three publication details
        var count3PubRow = 1;
        var counter3PubRow = 0;
        $(document).ready(function() {
            $('.add_best_three_publication_dtls').click(function(e) {
                e.preventDefault();
                var best_three_title_of_paper2 = $('#best_three_title_of_paper').valid();
                var best_three_paper_authors2 = $('#best_three_paper_authors').valid();
                var best_three_journal_name2 = $('#best_three_journal_name').valid();
                var best_three_vol_year_page2 = $('#best_three_vol_year_page').valid();
                var best_three_indexing2 = $('#best_three_indexing').valid();
                var journal_uplaod_hid2 = $('#journal_uplaod').valid();


                if (best_three_title_of_paper2 && best_three_paper_authors2 &&
                    best_three_journal_name2 && best_three_vol_year_page2 &&
                    best_three_indexing2 && journal_uplaod_hid2) {

                    var best_three_title_of_paper = $('#best_three_title_of_paper').val();
                    var best_three_paper_authors = $('#best_three_paper_authors').val();
                    var best_three_journal_name = $('#best_three_journal_name').val();
                    var best_three_vol_year_page = $('#best_three_vol_year_page').val();
                    var best_three_indexing = $('#best_three_indexing').val();
                    var journal_uplaod_hid = $('#journal_uplaod_hid').val();

                    var newRow = '<tr>' +
                        '<td>' + best_three_title_of_paper + '<input type ="hidden" value="' +
                        best_three_title_of_paper + '" name= "best_three_title_of_paper[]">' + '</td>' +
                        '<td>' + best_three_paper_authors + '<input type ="hidden" value="' +
                        best_three_paper_authors + '" name= "best_three_paper_authors[]">' + '</td>' +
                        '<td>' + best_three_journal_name + '<input type ="hidden" value="' +
                        best_three_journal_name + '" name= "best_three_journal_name[]">' + '</td>' +
                        '<td>' + best_three_vol_year_page + '<input type ="hidden" value="' +
                        best_three_vol_year_page + '" name= "best_three_vol_year_page[]">' + '</td>' +
                        '<td>' + best_three_indexing + '<input type ="hidden" value="' +
                        best_three_indexing + '" name= "best_three_indexing[]">' + '</td>' +
                        '<td> <a href="javascript:void(0);" onclick="upload_image_view(' +
                        "'/upload/supervisor_publish/" +
                        journal_uplaod_hid + "'" +
                        ');" >View Upload File</a><input type="hidden" name="journal_uplaod_hid[]" value="' +
                        journal_uplaod_hid + '"> </td>' +
                        '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                        counter3PubRow + '">Remove</button></td></tr>';
                    $('.add3PubRow').append(newRow);
                    count3PubRow++;
                    counter3PubRow++;
                }
            });

            $(".add3PubRow").on("click", ".remove_field", function(e) {
                $(this).parent('td').parent('tr').remove();
                counter3PubRow--;
                count3PubRow--;
            });
        });
        //add atleast one  publication details
        var count1PubRow = 1;
        var counter1PubRow = 0;

        $(document).ready(function() {
            $('.add_atleast_one_publication_dtls').click(function(e) {
                //alert('das');
                e.preventDefault();

                var atleast_one_title_of_paper2 = $('#atleast_one_title_of_paper').valid();
                var atleast_one_paper_authors2 = $('#atleast_one_paper_authors').valid();
                var atleast_one_journal_name2 = $('#atleast_one_journal_name').valid();
                var atleast_one_vol_year_page2 = $('#atleast_one_vol_year_page').valid();
                var atleast_one_indexing2 = $('#atleast_one_indexing').valid();
                var journal_pdf_hid2 = $('#journal_pdf').valid();


                if (atleast_one_title_of_paper2 && atleast_one_paper_authors2 &&
                    atleast_one_journal_name2 && atleast_one_vol_year_page2 &&
                    atleast_one_indexing2 && journal_pdf_hid2) {

                    var atleast_one_title_of_paper = $('#atleast_one_title_of_paper').val();
                    var atleast_one_paper_authors = $('#atleast_one_paper_authors').val();
                    var atleast_one_journal_name = $('#atleast_one_journal_name').val();
                    var atleast_one_vol_year_page = $('#atleast_one_vol_year_page').val();
                    var atleast_one_indexing = $('#atleast_one_indexing').val();
                    var journal_pdf_hid = $('#journal_pdf_hid').val();


                    var newRow = '<tr>' +
                        '<td>' + atleast_one_title_of_paper + '<input type ="hidden" value="' +
                        atleast_one_title_of_paper + '" name= "atleast_one_title_of_paper[]">' + '</td>' +
                        '<td>' + atleast_one_paper_authors + '<input type ="hidden" value="' +
                        atleast_one_paper_authors + '" name= "atleast_one_paper_authors[]">' + '</td>' +
                        '<td>' + atleast_one_journal_name + '<input type ="hidden" value="' +
                        atleast_one_journal_name + '" name= "atleast_one_journal_name[]">' + '</td>' +
                        '<td>' + atleast_one_vol_year_page + '<input type ="hidden" value="' +
                        atleast_one_vol_year_page + '" name= "atleast_one_vol_year_page[]">' + '</td>' +
                        '<td>' + atleast_one_indexing + '<input type ="hidden" value="' +
                        atleast_one_indexing + '" name= "atleast_one_indexing[]">' + '</td>' +
                        '<td> <a href="javascript:void(0);" onclick="upload_image_view(' +
                        "'/upload/supervisor_publish/" +
                        journal_pdf_hid + "'" +
                        ');" >View Upload File</a><input type="hidden" name="journal_pdf_hid[]" value="' +
                        journal_pdf_hid + '"> </td>' +
                        '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                        counter3PubRow + '">Remove</button></td></tr>';
                    $('.add1PubRow').append(newRow);

                    count1PubRow++;
                    counter1PubRow++;
                }
            });

            $(".add1PubRow").on("click", ".remove_field", function(e) {
                $(this).parent('td').parent('tr').remove();
                counter1PubRow--;
                count1PubRow--;
            });
        });
        //add phd students details
        var countPhdStudentsRow = 1;
        var counterPhdStudentsRow = 0;
        $(document).ready(function() {
            $('#add_phd_students_dtls2').click(function(e) {
                //alert('hi');
                e.preventDefault();
                var phd_student_name2 = $('#phd_student_name').valid();
                var phd_select_sup_cosup2 = $('#phd_select_sup_cosup').valid();
                var phd_regdno_enrol_status2 = $('#phd_regdno_enrol_status').valid();
                var phd_university_name2 = $('#phd_university_name').valid();


                if (phd_student_name2 && phd_select_sup_cosup2 && phd_regdno_enrol_status2 &&
                    phd_university_name2) {

                    var phd_student_name = $('#phd_student_name').val();
                    var phd_select_sup_cosup = $('#phd_select_sup_cosup').val();
                    var phd_regdno_enrol_status = $('#phd_regdno_enrol_status').val();
                    var phd_university_name = $('#phd_university_name').val();

                    var newRow = '<tr>' +
                        '<td>' + phd_student_name + '<input type ="hidden" value="' + phd_student_name +
                        '" name= "phd_student_name[]">' + '</td>' +
                        '<td>' + phd_select_sup_cosup + '<input type ="hidden" value="' +
                        phd_select_sup_cosup + '" name= "phd_select_sup_cosup[]">' + '</td>' +
                        '<td>' + phd_regdno_enrol_status + '<input type ="hidden" value="' +
                        phd_regdno_enrol_status + '" name= "phd_regdno_enrol_status[]">' + '</td>' +
                        '<td>' + phd_university_name + '<input type ="hidden" value="' +
                        phd_university_name + '" name= "phd_university_name[]">' + '</td>' +
                        '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                        counterPhdStudentsRow + '">Remove</button></td></tr>';
                    $('.addPhdStudentRow').append(newRow);
                    countPhdStudentsRow++;
                    counterPhdStudentsRow++;
                }
            });

            $(".addPhdStudentRow").on("click", ".remove_field", function(e) {
                $(this).parent('td').parent('tr').remove();
                counterPhdStudentsRow--;
                countPhdStudentsRow--;
            });
        });
    </script>

    <script>
        //======= for journal upload

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('change', '#journal_uplaod', function() {
            console.log('thumb upload');
            var name = document.getElementById("journal_uplaod").files[0].name;

            //alert(name);
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("journal_uplaod").files[0]);
            //var f = document.getElementById("file").files[0];
            form_data.append("file", document.getElementById('journal_uplaod').files[0]);

            $.ajax({
                url: "{{ route('supervisors.journal') }}",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    // $('#uploaded_image').html(data);
                    // $('#prescription_file').prop("href", data.pdf_path);
                    $('#journal_uplaod_hid').val(data.img_name);
                    // $('.modal-body embed').prop("src", data.pdf_path)

                }
            });

        });

        // ===== For full publish file 

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('change', '#journal_pdf', function() {
            console.log('thumb upload');
            var name = document.getElementById("journal_pdf").files[0].name;

            //alert(name);
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("journal_pdf").files[0]);
            //var f = document.getElementById("file").files[0];
            form_data.append("file", document.getElementById('journal_pdf').files[0]);

            $.ajax({
                url: "{{ route('supervisors.journal') }}",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    // $('#uploaded_image').html(data);
                    // $('#prescription_file').prop("href", data.pdf_path);
                    $('#journal_pdf_hid').val(data.img_name);
                    // $('.modal-body embed').prop("src", data.pdf_path)

                }
            });
        });
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
