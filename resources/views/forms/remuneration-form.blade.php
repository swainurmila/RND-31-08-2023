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

    .td-data {
        text-align: right;
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
    }

    .board {
        text-align: right;
        margin: 40px 50px 0px 0px;
        font-weight: bold;
    }

    .modification {
        margin: 40px;
        font-family: 'Times New Roman', Times, serif;
    }

    .drdc-meeting {
        font-family: 'Times New Roman', Times, serif;
        margin: 0px 80px 60px 20px;
    }
    .Pre-receipt{
        margin-left: 100px;
    }
    .Pre-receipt  h5{
        font-family: 'Times New Roman', Times, serif;
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
            <h4 class="title-head">REMUNERATION BILL FOR Ph.D WORK</h4>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="row signature">
                <div class="col-md-12">
                    <h5>Name of the Claimant (In capital letter) :
                        ____________________________________________________________</h5>

                    <h5>Designation:
                        ________________________________Institution/ Organization: ______________________________ </h5>
                    <h5>Postal Address:
                        _________________________________________________________________________________
                    </h5>
                    <h5>Bank Name :________________________________________Bank IFSC Code: _____________________________
                    </h5>
                    <h5>Account No:_____________________________________PAN No :_______________________________________
                    </h5>
                </div>
            </div>

            <div class="row prof">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>Sl no.</th>
                            <th>Particulars</th>
                            <th>Date</th>
                            <th>No. of days</th>
                            <th>Rate per day </th>
                            <th>Amt. claimed in Rs.</th>
                            <th>Remarks</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>DRDC meeting</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td> DSC meeting</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Ph.D Thesis Valuation</td>

                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Ph.D Viva-Voce
                                Exam
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Other</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="td-data">Total</td>
                            <td></td>
                            <td></td>

                        </tr>
                        <tr>
                            <td colspan="5" class="td-data">Add TA / Conveyance (Bill enclosed)</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="5" class="td-data">Grand Total Amount Rs.</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="7">(In words Rs.
                                _______________________________________________________________)</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <h5 class="modification">I here by certify that I have completed the work entrusted to me as DRDC
                        meeting/ DSC Meeting/ Ph.D Thesis valuation/ Ph.D Viva Voice Examination of BPUT and that the
                        claim has been prepared.


                    </h5>
                    <h5 class="board">Signature of Claimant with date

                    </h5>
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
        </div>
        <div class="row">
            <div class="col-md-12">

                <h5 class="drdc-meeting">Certified that the claimant ha s conducted the as DRDC meeting/ DSC Meeting/
                    Ph.D Thesis valuation/ P h.D Viva-Voice Exams nation/other held at BPUT on ________________________
                    and claimed amount is correct and may be paid.
            </div>
        </div>
        <div class="row Pre-receipt">
            <div class="col-md-6">
                <h5>Sign of Jr. Ex,(R&D)</h5>
                <p>Passed & pa id Rs. _________________________ </p>
                <p>Vide Cheque No & date: ___________________________</p>
            </div>
            <div class="col-md-6">
                <h5>Signature of PLC(R&D)</h5>
                <h6 style="font-weight:bold">Pre-receipt</h6>
                <p>Received payment of Rs. ______________________</p>
                <p>Received payment of Rs _______________________</p>
                <p>Date : __________________________</p>
            </div>
        </div>
        <div><h5 class="board">Signature of Claimant with date

        </h5></div>
        <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
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
