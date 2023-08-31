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
        width: 100%;
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

    .thesis-info h6 {
        font-size: 18px;
        margin: 30px 60px 20px 60px;
        text-align: justify;
        font-family: 'Times New Roman', Times, serif;
    }

    .signature {
        margin: 60px;
    }

    .signature h5 {
        font-weight: bold;
        margin: 40px;
        font-family: 'Times New Roman', Times, serif;
    }

    .title-head {
        text-align: center;
        font-weight: bold;
        text-decoration: underline;
    }

    .thesis-receipt h6 {
        font-size: 18px;
        margin: 20px 60px 20px 60px;
        text-align: justify;
        font-family: 'Times New Roman', Times, serif;
        line-height: 25px;

    }

    .memo h6 {
        font-size: 15px;
        margin-left: 100px;
    }
    .memo h5 {
        font-size: 15px;
        margin-left: 80px;
        font-weight: bold;
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
            <h4 class="title-head"><b>RECEIPT OF Ph.D. THESIS FOR EXAMINATION</b></h4>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row thesis">
                <div class="col-md-12 thesis-info">
                    <h6>1.
                        Name of the student/scholar: _________________________________________________________
                    </h6>
                    <h6>2. Name of the Research Supervisors: ___________________________________________________</h6>
                    <h6>3. Enrolment No. with date: ___________________________________________________________
                    </h6>
                    <h6>4. Registration No. with date: _________________________________________________________
                    </h6>
                    <h6>5. Title of the Thesis: ________________________________________________________________
                    </h6>
                </div>
            </div>
            <div class="row thesis">
                <div class="col-md-12 thesis-receipt">
                    <h6>Received ___________________________________ copies (hard bound and sofi) of the above mentioned
                        Thesis from Head, BPUT —NCR _______________________________________ for examination along with
                        all required docoments as per regulation of the University. The NCR will be
                        informed by the University on the status of examination in due course.
                    </h6>
                </div>
            </div>
            <div class="row signature">
                <div class="col-md-6">
                    <h5>Date. _____________</h5>

                </div>
                <div class="col-md-6">
                    <h5>Signature of the J.E. (R&D). BPUT</h5>

                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">

            <div class="row memo">
                <div class="col-md-12">
                    <h5>Memo No: ___________ Date. __________________</h5>
                    <h5>Forwarded for information to the</h5>
                    <h6>(1) The Head,NCR, _____________________________________ </h6>
                    <h6>(2) Research Scholar(Through the Research Supervisor)</h6>
                    <h6>(3) PlC (R&D), BPUT, Rourkela</h6>
                </div>
            </div>
            <div class="row signature">
                <div class="col-md-6">
                   

                </div>
                <div class="col-md-6">
                    <h5>Signature of the J.E. (R&D). BPUT</h5>

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
