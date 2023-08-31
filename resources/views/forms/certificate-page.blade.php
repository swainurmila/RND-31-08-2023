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

    h2 {
        font-family: 'Times New Roman', Times, serif;
        font-weight: bold;
    }

    .bput-fromt-page h3 {
        font-family: 'Times New Roman', Times, serif;
        font-weight: bold;
        font-size:20px;
        text-align: center;
        text-decoration: underline;
    }
    .bput-fromt-page h5{
        font-family: 'Times New Roman', Times, serif;
        text-align: justify;
        margin: 40px 60px 60px 20px;
        font-size:18px;
        padding: 10px;
        line-height: 30px;
    }
    .bput-fromt-page h4{
        font-family: 'Times New Roman', Times, serif;
      padding: 10px;
        margin-left: 60px; 
        font-size:18px;
       
    }
    .bput-fromt-page h6{
        font-family: 'Times New Roman', Times, serif;
      padding: 10px;
        margin-left: 60px; 
        font-size:18px;
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
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="row bput-fromt-page">
                <div class="col-md-12">
                    <h3>CERTIFICATE</h3>
                    <h5>Research Proposal entitled <b>'Guidelines for Writing Research Proposal for Confirming Doctoral
                            Programme Registration” </b>being submitted by Mr./Ms.<b> Yogesh Bhagwan Patil (Regd. No.
                            170490010XX) </b>to the Biju Patnaik University of Technology, Odisha for the registration
                        of Ph.D. Degree under the faculty of Engineering .</h5>
                    <h6>Signed by Research student </h6>
                    <h4>(Name of the student)</h4><br><br>
                    <h6>Signed by Research Supervisor</h6>
                    <h4>(Name and Designation )</h4><br><br>
                    <h6>Signed by Research Co-Supervisor, if any </h6>
                    <h4>(Name and Designation)</h4><br><br>
                    <h6>Date : __________________________</h6>
                    <h4>Place : __________________________</h4>
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
