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

    .thick {
        width: 80px;
        height: 40px;
    }
    .box{
        margin-left: 65%;
    }
    .sign h5{
        margin: 0px 40px 0px 60px;
        padding: 20px;
        font-weight: bold;
    }
    .affili{
        margin-left: 60px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
    }
    .dsc-cover{
        margin: 40px;
    }
    .dsc-cover h6{
        margin-top:20px;
        font-size:15px;
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
                    <h5>Name of the Candidate ___________________________________________ Regd.no
                        __________________________________</h5>
                    <h5>Title of the thesis:
                        _________________________________________________________________________________________ </h5>
                    <h5>(Please send detailed report on the thesis on separate sheet, and specific recommendation by
                        ticking any one of the following option)
                    </h5>
                </div>
            </div>
            <div class="row signature">
                <div class="col-md-12">
                    <h5>(i) Thesis is accepted in the present form and recommended for the award of Ph.D. degree.
                            </h5>
                    <div class="row text-center">
                        <div class="col-md-6">OR</div>
                        <div class="col-md-6 box"><input class="thick"type="text"></div>
                    </div>
                    <h5>(ii) Thesis needs minor clarifications indicated in the report which need to be clarified by the
                        candidate at final Viva-Voce and it is recommended for the award of Ph.D. degree. 
                            </h5><div class="row text-center">
                                <div class="col-md-6">OR</div>
                                <div class="col-md-6 box"><input class="thick"type="text"></div>
                            </div>

                    <h5>(iii) Thesis needs minor corrections to be made by the candidate as indicated in the report,
                        which need to be incorporated in the thesis and clarified at the final Viva-Voce and it is
                        recommended for the award of Ph.D. degree.</h5>
                        <div class="row text-center">
                            <div class="col-md-6">OR</div>
                            <div class="col-md-6 box"><input class="thick"type="text"></div>
                        </div>
                    <h5>(iv) Thesis needs major corrections as indicated in the report and the revised thesis to be
                        referred back to the adjudicator concerned for fresh evaluation.
                            </h5>
                            <div class="row text-center">
                                <div class="col-md-6">OR</div>
                                <div class="col-md-6 box"><input class="thick"type="text"></div>
                            </div>
                    <h5>(v) Thesis is rejected for the reasons specified in the report and not recommended for award of
                        Ph.D. Degree.

                    </h5>
                    <div class="row text-center">
                        
                        <div class="col-md-6 box"><input class="thick"type="text"></div>
                    </div>
                </div>
            </div>
            <div class="row sign">
                <div class="col-md-6">
                    <h5>Place: __________________</h5>
                    <h5>Date : __________________</h5>
                </div>
                <div class="col-md-6">
                    <h5>Signature of Examiner </h5>
                    <h5>Name of the Examiner </h5>
                </div>
               
            </div>
          
            <div class="row dsc-cover">
                <div class="col-md-12">
                    <h5 class="affili">Affiliation : ________________________________________________________________________________ </h5>
                    <h6>1. A detailed signed Report should be enclosed in a separate sheet </h6>
                    <h6>2. lt is expected to receive the report within six weeks counting for the date of receiving the hard copy of the thesis. (Thesis need not be returned unless it contains instructions for corrections).</h6>
                    <h6>3. The.University requires a signed report from the examiner. Please return it to :<br>
                        Director of Examinations.<br>
                        Biju Patnaik University of Technology, Odisha, Rourkela, PO:-, Rourkela, 769015, India	(throygh both by c- email and speed- post)
                        
                        </h6>
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
