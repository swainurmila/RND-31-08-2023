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

    .thesis-info h5 {
        margin: 30px 60px 5px 60px;
        font-family: 'Times New Roman', Times, serif;
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

    .applicant {
        text-align: right;
        margin: 50px 60px 40px 80px;
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
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

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row thesis">
                <div class="col-md-12 thesis-info">
                    <h5>11. Educational Qualification (from Matriculation onwards):

                    </h5>
                    <h5>(Attach self-attested photo Copies of the relevant documents as Annexures )
                    </h5>
                    <table class="table  table-bordered adjudication">
                        <tr>
                            <th>Exam. passed</th>
                            <th>Specialization</th>
                            <th>Board / University</th>
                            <th>Year of
                                Passing
                            </th>
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
                            <td>Post-Graduation</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>M.Phil</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Ph.D</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    <h6>*Ph.D should be from a recognised institute</h6>
                    <h6>*If Ph.D is from Foreign University, Please enclose an Equivalence certificate.
                        <h5>12. Title of own Ph.D Thesis: ______________________________________ </h5>
                        <h5>13. Details of full time Employment:</h5>
                        <h5>(Attach self-attested copies of the experience certificates from the employer)</h5>
                    </h6>
                    <table class="table  table-bordered adjudication">
                        <tr>
                            <th>Sl.No.</th>
                            <th>Name and
                                address of employer
                            </th>

                            <th>Designation
                            </th>
                            <th>Pay-scale
                            </th>
                            <th>From
                            </th>
                            <th>To</th>
                            <th>Full time
                                Regular or Part time
                                or Contractual
                            </th>
                            <th>Appointment
                                order A date
                            </th>
                        </tr>
                        <tr>

                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
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
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </table>
                    <h6>*Enclose self attested copy of the appointment order and Experience Certificate</h6>
                    <h5>a. Total Full-time Experience in regular position in AICTE/UGC/Govt. recognized institution only
                        (in years): __________________________,
                        <h5>(i) Teaching experience(years): _____________________</h5>
                        <h5>(ii) Research experience (years):  _____________________</h5>
                        <h5>b.Post Ph.D experience (years) :_____________________________</h5>
                    </h5>
                    <h5>14.	Publications in Journals during last five years (SCI / SCOPUS indexed / UGC	listed journals):

                    </h5>
                    <h5>Total Number of Papers in Journals: __________________________________________	

                    </h5>
                </div>
            </div>

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
                <a href="/academic-wef-page" class="button">Next</a>
            </div>
        </div>

        </form>
    </div>
    <div class="item-all-cat center-block text-center education-categories">

    </div>
    </div>
</section>
