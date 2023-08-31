@include('frontend.layouts.header')
<style>
    .tab {
        display: none;
        width: 100%;
        height: 50%;
        margin: 0px auto;
    }

    .current {
        display: block;
    }

    /* input {padding: 10px; width: 100%; font-size: 17px; font-family: Raleway; border: 1px solid #aaaaaa; } */

    .button {
        background-color: #4CAF50;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        font-size: 17px;
        font-family: Raleway;
        /* cursor: pointer;*/
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
        background-color: #69c769;
    }

    .step.finish {
        background-color: #4CAF50;
    }

    .error {
        color: #f00;
    }


    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 90%;
    }


    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 0px;
    }

    .title-head {
        font-weight: bold;
        text-decoration: underline;
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
    }



    .signature {
        margin-top: 40px;

    }

    .signature h5 {
        margin: 20px 60px 0px 50px;
        font-family: 'Times New Roman', Times, serif;
        text-align: justify;
        font-size: 18px;
        line-height: 30px;

    }

    .dsc-cover h5 {
        margin: 20px 60px 0px 50px;
        font-family: 'Times New Roman', Times, serif;
        text-align: justify;
        font-size: 18px;
        line-height: 30px;
    }

    .dsc-cover h4 {
        margin: 0px 60px 0px 50px;
        font-family: 'Times New Roman', Times, serif;
        text-align: center;
        font-weight: bold;
        text-decoration: underline;
    }

    .sign h5 {
        margin: 40px 60px 0px 50px;
        font-family: 'Times New Roman', Times, serif;
        text-align: justify;
        font-weight: bold;
    }

    .reach {
        margin: 5px 0px 30px 60px;
        font-size: 16px;
        font-family: 'Times New Roman', Times, serif;
    }

    .sign-examiner h5 {
        margin: 60px;
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
    }

    .Chancellor {
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
        text-decoration: underline;
    }

    .je-rd h5 {
        margin: 40px 60px 0px 50px;
        font-weight: bold;
        text-align: center;
    }

    .required-doct h5 {
        margin: 5px 0px 0px 60px;
        font-family: 'Times New Roman', Times, serif;
    }
</style>
@include('frontend.partials.navigation')
<div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<section class="sptb portal_background ">
    <div class="container form-border-container">
        <div class="phd-form-section-title form-section-title">
            <h2><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h2>
            <h4 class="title-head">PROPOSAL FOR SUBMISSION OF Ph.D THESIS</h4>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="row signature">
                <div class="col-md-12">
                    <h5>Certified that research work of Shri / Mr./ Mrs._____________________________________ Enrollment
                        No./date Regd.No./date ________________________________ a student in the OCR of
                        ______________________________________ is nearly complete and the candidate will be able to
                        submit his/ her dissertation within the time limit of three months prescribed under regulation.
                        A synopsis of his proposed work may kindly be accepted and permission be granted to the
                        candidate to submit his/ her Thesis to the univemiiy through his/ her Research supervisor
                    </h5>
                </div>
            </div>
            <div class="row sign">
                <div class="col-md-4">
                    <h5>Date: __________________</h5>
                </div>
                <div class="col-md-4">
                    <h5>Full signature of Supervisor</h5>
                </div>
                <div class="col-md-4">
                    <h5>Full Signature of Co-Supervisor</h5>
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
            <div class="row dsc-cover">
                <div class="col-md-12">
                    <h4>Recommendation of DSC </h4>
                    <h5>The student has made an open oral presentation before the DSC on dated _______________________
                        and the academic
                        audience. The DSC members have reviewed the synopsis and heard the oral presentation. The
                        student
                        has completed the required number of course works and other related works as per provisional
                        registrations and has cleared all the dues of NCR & University. The DSC is satisfied that he/
                        she
                        can submit the Thesis in 03 months. The list of possible external examiners (Form No.:
                        BPUTPh.D-2019/24.1 & 24.2) is enclosed for approval (in sealed cover).
                        The thesis will be / need not be seen by the committee before submission
                    </h5>
                </div>
            </div>

            <div class="row sign">
                <div class="col-md-4">
                    <h5>Chairperson,DSC</h5>
                </div>
                <div class="col-md-4">
                    <h5>Full signature of Supervisor</h5>
                </div>
                <div class="col-md-4">
                    <h5>Head of NCR/Dett.</h5>
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h5 class=" Chancellor ">Recommended to Vice- Chancellor for approval for thesis submission </h5>
                    <h6>All documents 8re verified and found correct and permission may be given for Thesis submission.

                    </h6>
                </div>
            </div>
            <div class="row je-rd">
                <div class="col-md-6">
                    <h5>J E (R&D)</h5>
                </div>
                <div class="col-md-6">
                    <h5>PIC (R&D),BPUT</h5>
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
            <div class="row">
                <div class="col-md-12">
                    <h5 style="font-weight:bold;margin-left:60px">Approved for thesis submission</h5>
                    <h5 style="text-align: center;">Approved / Not Approved</h5>
                    <h5 style="text-align: right;font-weight:bold;margin-right:60px">Vice Chancellor, BPUT</h5>
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
            <div class="row">
                <div class="col-md-12 required-doct">
                    <h6 class="reach">* To reach the University in 03 months before the proposed date of submission of
                        thesis.</h6>
                    <h5>
                        <b> N.B:</b> This proposal is required to be sent to the R&D cell of BPUT w ith the following
                        Oocuinents:

                    </h5>
                    <h5>1. Form No: IIPUT/ Ph.0-2019/ 24.1 & 24.2 (in closed cover)</h5>
                    <h5>2. Two hard copies & soft copy in PDF of the synopsis dully signed by the scholar, supervisors &
                        Head of NCR.

                    </h5>
                    <h5>3. Copy of all Research publications of the scholar related to the thesis (attested by student
                        and superisor).</h5>
                    <h5>4. Serf attested copies of course work Grade sheets.</h5>
                    <h5>5. Self attested copy of the Fees paid to University and NCR</h5>
                    <h5>6. Any other</h5>
                </div>
            </div>
            <!-- <form action="" class="form" method="POST" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="enrollment_fee"><b>1. Name : <span
                                class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="enrollment_fee" name="stud_name" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="registration_fee"><b>2.Enrollment No. & Date : <span
                                class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="registration_fee" name="enr_no" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="semester_fee"><b>3. Faculty of : <span
                                class="error">*</span></b></br>
                        <table>
                            <tr>
                                <td>a</td>
                                <td>3,000/-</td>
                                <td>University fee to be deposited to BPUT A/C</td>
                            </tr>
                            <tr>
                                <td>b</td>
                                <td>7,000/-</td>
                                <td>Nodal Center fee to be deposited with the center of research</td>
                            </tr>
                        </table>
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="semester_fee" name="faculty" class="form-control" placeholder="">
                    </div>
                </div>

                <div style="overflow:auto;">
                    <div style="float:right; margin-top: 5px;">
                        <a href="/declaration-freeform" class="button">Submit</a>
                    </div>
                </div>

            </form>-->
        </div>
        <div class="item-all-cat center-block text-center education-categories">

        </div>
    </div>
</section>
