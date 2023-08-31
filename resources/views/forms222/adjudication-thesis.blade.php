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

    .signature {
        margin: 60px 0px 60px 100px;
    }

    .signature h5 {
        font-size: 18px;
        font-family: 'Times New Roman', Times, serif;
    }

    .dsc-record h5 {
        margin: 40px;
        text-align: center;
        font-weight: bold;
        text-decoration: underline;
        font-family: 'Times New Roman', Times, serif;
    }

    .dsc-record h6 {
        margin: 40px;
        text-align: justify;
        font-family: 'Times New Roman', Times, serif;
        line-height: 25px;
        font-size: 20px;
    }

    .dsc-member {
        text-align: center;
        font-weight: bold;
        text-decoration: underline;
        font-family: 'Times New Roman', Times, serif;
    }

    .dsc-strut {
        margin-top: 40px;
    }

    .cover-data {
        text-align: center;
        font-weight: bold;
        font-size: 18px;
        text-decoration: underline;
        font-family: 'Times New Roman', Times, serif;
    }

    .adjudication th {
        text-align: center;
        font-weight: bold;
        font-size: 18px;
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
            <h4 class="title-head"><b>FORMAT FOR PANEL OP PROPOSED EXAMINERS FOR ADJUDICATION OF Pb.D THESIS</b></h4>
            <h5 class="cover-data">Confidential (To be submitted in sealed cover) </h5>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="row signature">
                <div class="col-md-6">
                    <h5>Name of the Student:</h5>
                    <h5>Regd. No.:</h5>
                    <h5>Title of Thesis:</h5>
                    <h5>Name of Supervisor:</h5>

                </div>
                <div class="col-md-6">

                    <h5>Faculty of:</h5>
                    <h5>Date of Registration: </h5>
                    <h5>Date of Enrollment ___________________ & <br>No: __________________</h5>
                    <h5>Name of Co-Supervisor:</h5>
                </div>
            </div>
            <div class="row thesis">
                <div class="col-md-12 thesis-info">
                    <table class="table  table-bordered adjudication">
                        <tr>
                            <th>Sl no.</th>
                            <th>Name of Examiner & Designation</th>
                            <th>Designation</th>
                            <th>Telephone No &
                                Address
                            </th>
                            <th>E-mail, If any</th>
                        </tr>
                        <tr>
                            <th colspan="5">Adjudicators from outside odisha</th>

                        </tr>
                        <tr>
                            <td>1</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <th colspan="5">Adjudicators from Abroad :</th>

                        </tr>
                        <tr>
                            <td>1</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 dsc-record">
                    <h5>RECOMMENDATION OF THE DSC </h5>
                    <h6>Certified that the DSC scrutinized the Synopsis, Course work, Publication, Plagiarism report
                        and the candidate: has fulIy delivered the Pre-Thesis seminar before the OSC and the work
                        carried out the scholar has reached the standard for thesis submission and the candidate
                        fulfills all tin requirements as per the Ph. D. regulation 2019 of BPUT for the same. We hereby
                        recommended the composition of the above list of examiners for adjudication of the thesis arid
                        list of examiners fot the Viva Voce Board.
                        Note: It is necessary for supervisors to attach Curriculum vitae of cach Adjudicator mention in
                        the list as per the Performa given for the perusal of the Honorable Vice Chancellor, Biju
                        Patnaik University of Technology, Odisha.The examiners suggested, should be actively engaged in
                        the area o I research work concerned, end also as for as possible, not be below the rank of
                        associate Professor / Senior Scientist in the grade of Associate professor or above with Ph.D
                        qualification.

                    </h6>
                </div>
            </div>
            <div>
                <h5 class="dsc-member">Name & Full Structure of the DSC members</h5>
            </div>
            <div class="row dsc-strut">
                <div class="col-md-4">
                    <p>1. _____________________</p>
                    <p>(Supervisor)</p>
                    <p>4. _____________________</p>
                    <p>(Expert)</p>
                </div>
                <div class="col-md-4">
                    <p>2. _____________________</p>
                    <p>(Co-Supervisor)</p>
                    <p>5. _____________________</p>
                    <p>(Co-Chairperson)</p>

                </div>
                <div class="col-md-4">
                    <p>3. _____________________</p>
                    <p>(Expert)</p>
                    <p>6. _____________________</p>
                    <p>(Chairperson)</p>
                </div>
            </div>
            <br>
            <h5>Date: ____________________</h5>
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
