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

    .signature {
        margin: 60px;
    }

    .signature h5 {
        font-weight: bold;
        margin: 40px;
        font-family: 'Times New Roman', Times, serif;
    }

    .thesis-receipt h6 {
        font-size: 18px;
        margin: 20px 60px 20px 60px;
        text-align: justify;
        font-family: 'Times New Roman', Times, serif;
        line-height: 25px;

    }

    .bput-comment h5 {
        font-weight: bold;
        text-decoration: underline;
        font-size:20px;
        font-family: 'Times New Roman', Times, serif;
    }
    .bput-comment h6 {
        font-family: 'Times New Roman', Times, serif;
        font-size:18px;
    }
    .bput-comment1 h5 {
        margin-top: 50px;
        text-align: center;
    }
    .title-head{
        font-weight: bold;
        text-decoration: underline;
        text-align: center;
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
            <h4 class="title-head">RECEIPT OF Ph.D. THESIS FOR EXAMINATION</h4>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row thesis">
                <div class="col-md-12 thesis-info">
                    <table class="table  table-bordered">
                        <tr>
                            <th>Name of the Scholar</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Name of the faculty (Engg./Pharmacy/Management etc)</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Enrollmant No. & Date</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Date of completion of Course work</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Regd. No. & Date of Registration</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Date of Approval of synopsis of the thesis</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Due Date for submission of Ph.D. Thesis</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Has any Extension been approved earlier</th>
                            <td>Yes/No</td>
                        </tr>
                        <tr>
                            <th>If yes, up to what date(Give copy of order)</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Extension required up to</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th colspan="2">Reason of extension & progress made till date: (5 lines)</th>

                        </tr>

                    </table>
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
            <div class="row bput-comment">
                <div class="col-md-12 text-center">
                    <h5>Recommendation of Research Supervisor</h5>
                    <h6>Extension in time to submit Thesis up to....................may be/may not be given.</h6>
                </div>
            </div>
            <div class="row bput-comment1">
                <div class="col-md-6">
                    <h5>Date. _____________</h5>

                </div>
                <div class="col-md-6">
                    <h5>Research Supervisor</h5>

                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
            <div class="row bput-comment">
                <div class="col-md-12 text-center">
                    <h5>Recommendation of the DSC</h5>
                    <h6>Extension in time to submit Thesis up to....................may be/may not be given.</h6>
                </div>
            </div>
            <div class="row bput-comment1">
                <div class="col-md-4">
                    <h5>Date. _____________</h5>
                </div>
                <div class="col-md-4">
                    <h5>(head of the NRC )</h5>
                </div>
                <div class="col-md-4">
                    <h5>(Chairperson,DSC)</h5>

                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
            <div class="row bput-comment">
                <div class="col-md-12 text-center">
                    <h5>Recommendation (R&D) cell ,BPUT</h5><BR>
                    <h6>May be considered for approval of extension upto.________________________________</h6>
                </div>
            </div>
            <div class="row bput-comment1">
                <div class="col-md-6">
                    <h5>J.E.(R&D)/ SO</h5>
                </div>
               
                <div class="col-md-6">
                    <h5>PIC(R&D), BPUT</h5>

                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">

            <div class="row bput-comment">
                <div class="col-md-12 text-center">
                    <h5>Approval by Vice Chancellor</h5><BR>
                    <h6>Approved / Not Approved</h6>
                </div>
            </div>
            <div class="row bput-comment1">
                <div class="col-md-6">
                    <h5>Date: _________________</h5>
                </div>
               
                <div class="col-md-6">
                    <h5>Vice Chancellor,BPUT</h5>

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
