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
        width: 70%;
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
                    <h5>Provide details of best three publications (published / accepted)


                    </h5>
                    <h5>(Attach the front pages only )
                    </h5>
                    <table class="table  table-bordered adjudication">
                        <tr>
                            <th>Sl. No.</th>
                            <th>Title of paper</th>
                            <th>Author(s)</th>
                            <th>Name of the journal
                            </th>
                            <th>Vol & Year page
                            </th>
                            <th>Indexing
                            </th>

                        </tr>
                        <tr>
                            <td>1.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </table>

                    <h5>15. Details of the publication in Journals during last five years (SCI / SCOPUS indexed
                        Journals as First / Corresponding Author) : </h5>
                    <h5>Provide details of at least one publication (published / accepted) as the First / Corresponding
                        Author and attach one photo copy of the full paper.

                    </h5>
                    </h6>
                    <table class="table  table-bordered adjudication">
                        <tr>
                            <th>Sl. No.</th>
                            <th>Title of paper</th>
                            <th>Author(s)</th>
                            <th>Name of the journal
                            </th>
                            <th>Vol & Year page
                            </th>
                            <th>Indexing
                            </th>


                        </tr>
                        <tr>

                            <td>1.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                        <tr>

                            <td>2.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>

                    </table>

                    <h5 style="font-weight: bold">16. Details of Ph.D Students presently supervising:</h5>

                    <h5>Total Number: ______________________ (a) As Supervisor: ________________________________ nos.
                        (b) As Co- Supervisor: </h5>
                    <h5>In reserved (UR): _________________________ nos, ST / SC : ____________ nos, Differently A bled:
                        ________________ nos. </h5>
                    <h5>National Test Qualified: ______________________________ nos. Any other:
                        __________________________ nos.</h5>
                    <h5>*GATE/ UGC-NET / CAT /SLET/QIP / FIP/ NDF/ AGC-CS IR NET/ GPAT or other similar national tests
                    </h5>
                    <h5>(Copy of the University/Institute notification to be enclosed in this Tabular format)</h5>
                    <table class="table  table-bordered adjudication">
                        <tr>
                            <th>Sl. No.</th>
                            <th>Name of Student</th>
                            <th>Supervisor/
                                co-supervisor
                                </th>
                            <th>University Regd. No./
                                Enrolment No. & Present Status (Continuing/ Submitted)
                                
                            </th>
                            <th>Name of the university
                            </th>
                           


                        </tr>
                        <tr>

                           
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

                        </tr>

                    </table>
                    <h5 style="font-weight: bold">17. Area of proposed Research work :</h5>
                    <h5 style="font-weight: bold">18. Have you ever been debarred from supervising from any university: YES / NO :</h5>
                    <h6 style="margin-left: 100px">If yes , give reasons and attach the details documents</h6>
                    <h5 style="font-weight: bold">19. Any other relevant information (lf any):

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
                <a href="/academic-declaration" class="button">Next</a>
            </div>
        </div>

        </form>
    </div>
    <div class="item-all-cat center-block text-center education-categories">

    </div>
    </div>
</section>
