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



    .title-head {
        font-weight: bold;
        text-decoration: underline;
        text-align: center;
    }

    .thesis-info h5 {
        margin: 30px 60px 5px 60px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
        list-style: 20px;

    }

    .sign-bar {
        margin: 50px 0px 50px 60px;
    }

    .sign-bar h5 {
        margin: 10px 0px 0px 60px;
        font-family: 'Times New Roman', Times, serif;
    }

    .applicant {
        text-align: right;
        margin: 50px 60px 40px 80px;
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
    }

    .declaration {
        font-weight: bold;
        text-align: center;
        text-decoration: underline;
    }
    .year-date{
        margin: 50px 60px 40px 0px;
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
                    <h5 class="declaration">CHECK LIST</h5>
                    <table class="table  table-bordered ">
                    <tr>
                        <td>1.(i) Self attested Copy of the Photo ID Card (Voter lD/ PAN Card/Aadhar Card, etc.)<br>(ii) Two passport size Photographs</td>
                        <tr>
                        <td>2.	Self attested Copy of Certificates/Mark (Grade) sheet of all Examination Passed (as per
                            Application Sl. No.11).
                            <br>(i)	10th mark sheet
                            <br>(ii)	10th Certificate
                            <br>(iii) 12th / Diploma Certificate
                            <br>(iv) 12th/Diploma Mark sheet
                            <br>(v) UG Certificate 
                            <br>(vi) UG Mark sheets
                            <br>(vii)	Post-graduation Degree Certificate
                            <br>(viii)	Post-graduation Mark sheets
                            <br>(ix)	Ph.D Degree Certificate
                            <br>(x)	Post Doctoral certificate (if any)
                            </td>
                        </tr>
                        <tr>
                        <td>3. Self attested copy of front pages of three publications in last five years (Refer: Application Sl,
                            No.14)
                            </td>
                        </tr>
                        <tr>
                        <td>4. Self attested Photo copies of the best publication as first/ corresponding author in SCI/Scopus
                            indexed Journals ( Refer: Application Sl.No. 15)
                            </td>
                        </tr>
                        <tr>
                        <td>5. Self attested copy of the University/Institute Supervisor allotment notification
                            ( Refer: Application SI no.16)
                            </td>
                    </tr>
                    <tr>
                        <td>6. Experience Certificates ( refer: Application SI.No.13)</td>
                    </tr>
                    <tr>
                        <td>7. Self attested copy of the Appointment order in the Present post.</td>
                    </tr>
                    <tr>
                        <td>8. Self attested copy of photo ID proof such as Aadhaar card/Driving Licence/PAN card</td>
                    </tr>
                   </table>
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
                <a href="/check-listform" class="button">Next</a>
            </div>
        </div>

        </form>
    </div>
    <div class="item-all-cat center-block text-center education-categories">

    </div>
    </div>
</section>
