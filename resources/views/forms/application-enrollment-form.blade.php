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

    .dsc-member {
        /* font-weight: bold;
        text-decoration: underline; */
        margin: 20px 60px 0px 50px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
    }

    .dsc-member h5 {
        margin: 20px 60px 0px 50px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
    }

    .signature h5 {
        margin: 20px 60px 0px 50px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
    }

    .dsc-person h5 {
        margin: 40px;
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
    }

    .letter {
        margin: 0px 40px 0px 500px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 15px;
    }

    .present {
        margin: 20px 0px 0px 100px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
    }

    .adjudication td {
        text-align: center;
    }

    .sign-date {
        margin: 60px;
    }

    .consent h4 {
        text-align: center;
        font-weight: bold;
        text-decoration: underline;
        font-family: 'Times New Roman', Times, serif;
    }

    .consent h5 {
        margin: 10px 60px 0px 60px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
    }
    .sign-bar{
        margin:60px;
    }
    .sign-bar h6{
        font-size:16px;
        font-family: 'Times New Roman', Times, serif;
        font-weight: bold;
    }
    .co-supervisor h6{
        margin-left:200px;
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
            <h4 style="text-align:center"><b><u>APPLICATION FOR ENROLMENT TO Ph.D. PROGRAMME - < Year> </u></b></h4>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="row signature">

                <div class="col-md-12">

                    <h5>1. Full name of the candidate(Mr/Mrs/Miss) :
                        _______________________________________________________________________</h5>
                    <h6 class="letter">(IN BLOCK CAPITAL LETTERS) (As per l0th Certificate)</h6>
                    <h5>2. Academic Programme: Ph.D (Engg/pharmacy/ etc.):
                        _______________________________________________________________</h5>
                    <h5>3. Name of NCR and Department:
                        _______________________________________________________________________________</h5>
                    <h5>5. Mother's Name :
                        ___________________________________________________________________________________________</h5>
                    <h5>6. Permanent Address :
                        ________________________________________________________________________________________
                    </h5>
                    <h6 class="present">Present Address with email id and phone no:
                        __________________________________________________________________________<br><br>_________________________________________________________________________________

                    </h6>
                    <h5>7. (a)Date od birth : ___________________________________________</h5>
                    <h5> (b) Student Category (Full Time / Part Time / Full Time Special):
                        ____________________________________________</h5>
                    <h5>(c) Nationality: _____________________________(d)Category (SC/ST/Differently able / General):
                        ________________</h5>
                    <h5>8. Qualification : (HSE onwards)</h5>
                </div>
            </div>
            <div class="row thesis">
                <div class="col-md-12 thesis-info">
                    <table class="table  table-bordered adjudication">
                        <tr>
                            <th>Exam. passed</th>
                            <th>Discipline/
                                Specialization
                            </th>
                            <th>Board/University
                            </th>
                            <th>Year of
                                passing </th>
                            <th>Class/
                                Division
                            </th>
                            <th>% marks /
                                CGPA
                            </th>
                        </tr>
                        <tr>
                            <td>HSC</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>+2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td></td>
                        </tr>
                        <tr>
                            <td>Graduation</td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Post Graduation</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td></td>
                        </tr>
                        <tr>
                            <td>M.PhiI</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    </table>
                </div>
            </div>

            <div>
                <h5 class="dsc-member">9. Organization where working (if employed)</h5>
            </div>
            <div class="row dsc-strut">
                <div class="col-md-12">
                    <table class="table  table-bordered adjudication">
                        <tr>
                            <th>Name of the Organization</th>
                            <th>Designation</th>
                            <th>Duration</th>
                            <th>Nature of job</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="dsc-member">
                <h5>10. If applying to be enrolled as a Fulltime Scholar / Part time Scholar, Then attach NOC in
                    prescribed Form No.BPUTfPh.D-2019/ 2 and BPUTfPb.D-2019/3 as the case may be.</h5>

                <h5> 11. Proposed Title of the Ph.D work to be carried out:
                    _____________________________________________________</h5>
                <h5>12. Details of Ph.D Enrolment Fee (in favor of BPUT, Rourkela to be drawn at SBI, Uditnagar,
                    Rourkela) Crossed Demand Draft No.: ________________________, Date: ____________________________
                    Amount in Rs. 10.000/- , Issuing Bank: ________________________________________, </h5>
                <h5>13. (a) Name of Proposed Supervisor with address , mail id & phone no.: </h5>
                <h5 style="margin-left:76px ">(b) Name of Proposed Co-Supervisor (if any ) u‘ith address , mail id &
                    phone no :</h5>

            </div>
            <div class="row sign-date">
                <div class="col-md-6">
                    <h6>Date: _____________________</h6><br>
                    <h6>Place : _____________________</h6>
                </div>
                <div class="col-md-6">
                    <h5 style="margin-left:200px;font-weight:bold">full Signature of the Candidate </h5>
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:0px">
            <div class="row consent">
                <div class="col-md-12">
                    <h4>Consent by Research Supervisor/ Co-supervisor</h4>
                    <h5>This is to certify that there exists vacancy in the relevant category with me as per the BPUT
                        Ph.D Regulation 2019 and I agree to supervise the candidate towards his/ her Ph.D.

                    </h5>
                </div>
            </div>
            <div class="row sign-bar">
                <div class="col-md-6">
                    <h6>full Signature</h6>
                    <h6>Name: ____________________</h6>
                    <h6>(Research Supervisor)</h6>
                    <h6>Date : ___________
                    </h6>
                </div>
                <div class="col-md-6 co-supervisor">
                    <h6>full Signature</h6>
                    <h6>Name: ____________________</h6>
                    <h6>(Co-Supervisor)</h6>
                    <h6>Date : ____________________</h6>
                </div>
            </div>
            <div class="row consent">
                <div class="col-md-12">
                  
                    <h5><b>Note </b>: The research supervisor is required to provide eight names of Expert (at least one Expert external to that BPUT-NCR) from inside Odisha with proven Research potential not below the rank of Associate Prof.
                    </h5>
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
                </div>-->

            <div style="overflow:auto;">
                <div style="float:right; margin-top: 5px;">
                    <a href="/application-enrollment-Consent" class="button">Next</a>
                </div>
            </div>

            </form>
        </div>
        <div class="item-all-cat center-block text-center education-categories">

        </div>
    </div>
</section>
