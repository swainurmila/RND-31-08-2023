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

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 18px;
    }

    .thesis {
        margin-top: 50px;
    }

    .thesis-info th {
        font-size: 15px;

        font-family: 'Times New Roman', Times, serif;
    }

    .title-head {
        font-weight: bold;
        text-decoration: underline;
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
    }

    .title-board {
        font-weight: bold;
        text-decoration: underline;
        text-align: center;
        margin-top: 20px;
        font-family: 'Times New Roman', Times, serif;
    }

    .signature {
        margin-top: 40px;

    }

    .dsc-member {
        font-weight: bold;
        text-decoration: underline;
        margin: 40px 0px 60px 50px;
    }

    .signature h5 {
        margin: 20px 60px 0px 50px;
        font-family: 'Times New Roman', Times, serif;
        text-align: justify;
        font-size: 18px;
        line-height: 30px;
    }

    .dsc-person h5 {
        margin: 40px;
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
    }

    .sign-examiner h5 {
        margin: 60px;
        font-weight: bold;
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
            <h4 class="title-head">EXTERNAL EXAMINER REPORT FOR PH.D THESIS</h4>
            <h6 class="title-board">CONFIDENTIAL</h6>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="row signature">

                <div class="col-md-12">

                    <h5>I ______________________________________________________________________ have gone through the
                        contents of the Ph.D Thesis entitled “ ________________________________________________________
                        " Submitted by the research scholar Mr/ Mrs __________________________________________________
                        for the award of Ph.D degree . My observation in respect of the above is as follows.
                        (Please use separate sheet if necessary)
                        Redg. No: __________________________.
                        <p>___________________________________________________________________________________________________________________________________________________________________
                        </p>
                        <p>___________________________________________________________________________________________________________________________________________________________________
                        </p>
                        <p>___________________________________________________________________________________________________________________________________________________________________
                        </p>
                        <p>___________________________________________________________________________________________________________________________________________________________________
                        </p>
                        <p>___________________________________________________________________________________________________________________________________________________________________
                        </p>
                        <p>___________________________________________________________________________________________________________________________________________________________________
                        </p>
                        <p>___________________________________________________________________________________________________________________________________________________________________
                        </p>
                        <p>___________________________________________________________________________________________________________________________________________________________________
                        </p>
                        <p>___________________________________________________________________________________________________________________________________________________________________
                        </p>
                        <p>___________________________________________________________________________________________________________________________________________________________________
                        </p>
                        <p>___________________________________________________________________________________________________________________________________________________________________
                        </p>

                    </h5>
                </div>
            </div>
            <div class="row sign-examiner">
                <div class="col-md-6">
                    <h5>Place : _________________</h5>
                    <h5>Date : ___________________</h5>
                </div>
                <div class="col-md-6">
                    <h5>Signature of Examiner : __________________________ </h5>
                    <h5>Name of the Examiner : __________________________ </h5>
                    <h5>Address :</h5>
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
