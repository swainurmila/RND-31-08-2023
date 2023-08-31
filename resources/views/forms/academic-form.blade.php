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
        margin-top: 30px;
    }

    .thesis-info th {
        font-size: 15px;

        font-family: 'Times New Roman', Times, serif;
    }

    .title-head {
        font-weight: bold;
        text-decoration: underline;
        text-align: center;
    }

    .title-board {
        font-weight: bold;
        text-decoration: underline;
        text-align: center;
        margin-top: 20px;
    }

    .signature {
        margin-top: 40px;
    }


    .signature h5 {
        margin: 20px 60px 0px 50px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
    }
.applicant{
    text-align: right;
    margin: 50px 60px 40px 80px;
    font-weight: bold;
}

    .academy {
        text-align: center;
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
            <h4 class="academy"><>APPLICATION FORMAT FOR RECOGNITION PROSPECTIVE SUPERVISOR / CO-SUPERVISOR<br> FOR THE
                    ACADEMIC YEAR W.E.F JULY ____________________ TO JUNE</h4>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="row signature">

                <div class="col-md-6">
                    <h5>Faculty: Architecture /Engineering / Management /</h5>
                    <h5 style="margin-left: 110px">Pharmacy / Computed Application & Science</h5>
                </div>
                <div class="col-md-6 text-center">
                    <textarea name="" id="" cols="10" rows="5"></textarea>
                    <p>(Paste recent Colour Pbotograph
                        size 25 * 35mm)

                    </p>
                </div>
            </div>
            <div class="row thesis">
                <div class="col-md-12 thesis-info">
                   
                    <table class="table  table-bordered adjudication">
                        <tr>
                            <th>1</th>
                            <th>Name in full (in bloch letters)</th>
                            <td></td>
                        <tr>
                            <th>2
                            </th>
                            <th>Department with Designation </th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>3</th>
                            <th> Name of the Institution / Organisation
                                with detailed address</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>4</th>
                            <th>Nature of Present Appointment as
                                Teacher/ Scientist <br>(Full time Regular / Contractual Part-time / Guest / Resource
                                Person)
                                :</th>
                            <td></td>
                        </tr>
                        <th rowspan="2">5</th>
                        <th> Date of Birth (DD/MM/YYYY)</th>
                        <td></td>

                        <tr>
                            <th>Age as on last date of application
                                ( in years)
                            </th>
                        </tr>

                        </tr>
                        <tr>
                            <th>6</th>
                            <th>(a)Marital Status :</th>
                            <td>(b)Gender :</td>
                        </tr>
                        <tr>
                            <th rowspan="2">7</th>
                            <th>a) Permanent address:</th>
                            <td>b) Correspondence address:</td>
                        <tr>
                            <th>Phone (with STD)
                                Mobile No.</th>
                            <td>E-mail :</td>
                        </tr>

                        </tr>
                        <tr>
                            <th>8</th>
                            <th>Nationality : </th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>9</th>
                            <th> Discipline & Specialization
                            </th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>10</th>
                            <th> Aadhaar Card No.</th>
                            <td></td>
                        </tr>

                        </tr>

                    </table>
                </div>
            </div>
            <div>
                <h5 class="applicant">Full Signature of the Applicant with date
                </h5>
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
                </div>-->

            <div style="overflow:auto;">
                <div style="float:right; margin-top: 5px;">
                    <a href="/academic-wef" class="button">Next</a>
                </div>
            </div>

            </form>
        </div>
        <div class="item-all-cat center-block text-center education-categories">

        </div>
    </div>
</section>
