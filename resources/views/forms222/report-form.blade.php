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
        margin: 0px 40px 0px 60px;
        font-family: 'Times New Roman', Times, serif;
        text-align: justify;
        font-size: 18px;
        line-height: 30px;

    }

    .prof1 {
        margin-left: 110px;
    }

    .prof {
        margin: 20px 60px 20px 60px;
    }

    .prof h6 {
        font-size: 15px;
        padding: 7px;
        font-family: 'Times New Roman', Times, serif;
    }

    .modification {
        font-size: 18px;
        padding: 7px;
        font-family: 'Times New Roman', Times, serif;
        margin: 20px 60px 20px 60px;
    }

    .certificate {
        text-align: center;
        font-weight: bold;
        text-decoration: underline;
    }

    .board {
        font-weight: bold;
        text-decoration: underline;
        margin-left: 60px;
    }

    .expert {
        margin: 40px;
    }

    .expert h5 {

        font-weight: bold;
    }

    .copies h5 {
        margin: 0px 60px 10px 60px;
        font-size: 18px;
        font-family: 'Times New Roman', Times, serif;
    }
    .panel-of-exam h5{
        margin: 0px 60px 10px 60px;
        font-size: 18px;
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
            <h4 class="title-head">CONFIDENTIAL REPORTS OF EXAMINERS ON Ph.D THESIS EVALUATION </h4>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="row signature">
                <div class="col-md-12">
                    <h5>Name of the Candidate
                        ____________________________________________________________________________</h5>

                    <h5>Name of the Scholar:
                        ______________________________________________________________________________ </h5>
                    <h5>Title of the thesis:
                        _________________________________________________________________________________
                    </h5>
                    <h5>Review of Examiner's Report :</h5>
                </div>
            </div>

            <div class="row prof">
                <div class="col-md-12">
                    <h6>1. Examiner : Prof./ Dr.
                        _____________________________________________________________________________ </h6>
                    <h6>2. Examiner : Prof./ Dr.
                        _____________________________________________________________________________ </h6>
                    <h6>3. Supervisor(s) : Prof./
                        Dr___________________________________________________________________________</h6>
                    <h6 class="prof1"> Prof./
                        Dr___________________________________________________________________________</h6>
                    <h6>Date of Viva Voice: ______________________________ No of members present in seminar:
                        __________________________ </h6>
                    <h6>Recommendation :</h6>
                    <h6>(a) Performance:
                        ________________________________________________________________________________________</h6>
                    <h6>(b) Degree (if recommended) to be awarded: _____________________________ Ph.D Programme
                        ______________________</h6>
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
            <div class="row">
                <div class="col-md-12">
                    <h5 class="certificate">Certificate by Viva- Voice Board</h5>
                    <h5 class="modification">Modification / Corrections as suggested by External Examiner have been
                        incorporated and modified version of the Thesis submitted. The candidate has/ has not
                        successfully defended through open seminar his/ her Thesis before the viva- Voice board and
                        Board recommends for award of Degree.

                    </h5>
                    <h5 class="board">Signature of Board of viva- voice examiners :

                    </h5>
                </div>
            </div>
            <div class="row expert">
                <div class="col-md-6">
                    <h5>Ext. Expert</h5>
                    <h6>Date :</h6>
                </div>
                <div class="col-md-6 text-center">
                    <h5>Chairman of Viva Board (Principal Supervisor) </h5>
                    <h6>Date :</h6>
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
            <div class="row">
                <div class="col-md-12 copies">
                    <h5>1. Two copies of the corrected bound thesis received.</h5>
                    <h5>2. Two copies of the corrected thesis in the form of CD containing MS-WORD and PDF file
                        received.</h5>
                    <h5>3. The copies of thesis in paper and electronic form will be sent to central library if
                        approved.</h5>
                </div>
            </div>
            <div class="row expert">
                <div class="col-md-6">

                    <h6>Date :</h6>
                </div>
                <div class="col-md-6 text-center">

                    <h6 style="font-weight: bold">J.E.(R&D), BPUT</h6>
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
            <div class="row">
                <div class="col-md-12 panel-of-exam">
                    <h5>The recommendation of the panel of examiners may be accepted for award / not award of Ph.D degree. The student is provisionally allowed for award of Ph.D degree subjected to the approval by Honble Chancellor .
                        
                        </h5>
                </div>
            </div>
            <div class="row expert">
                <div class="col-md-6">

                </div>
                <div class="col-md-6 text-center">

                    <h6 style="font-weight: bold">PIC (R&D), BPUT</h6>
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
            <div class="row">
                <div class="col-md-12 panel-of-exam">
                    <h5>The degree may be awarded in the next convocation. Notification be brought out accordingly by the PIC(R&D), BPUT with intimation to the Register and Director of Examinations. The Academic Council end Board of Management to be informed in the next meeting
                        </h5>
                </div>
            </div>
            <div class="row expert">
                <div class="col-md-6">

                </div>
                <div class="col-md-6 text-center">

                    <h6 style="font-weight: bold">Vice-Chancellor, BPUT</h6>
                </div>
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
