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
                    <h5 class="declaration">DECLARATION </h5>
                    <h5>I hereby, solemnly declare that the information furnished in this application are true and
                        correct to the best of my knowledge and belief. If at any time, I am found to have concealed/
                        suppressed any material/ information or given any false details, the University shall have every
                        right to take action against me for which I shall have no objection.
                    </h5>

                </div>
            </div>
            <div class="row sign-bar">
                <div class="col-md-6">
                    <h5>Place : _______________</h5>
                    <h5>Date : ________________</h5>
                </div>
                <div class="col-md-6 text-center">
                    <h5 style="font-weight: bold">Signature of Applicant with date </h5>
                    <h5>(Name , Designation and Affiliation address)</h5>
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
            <div class="row thesis">
                <div class="col-md-12 thesis-info">
                    <h5 class="declaration">CERTIFICATE FROM EMPLOYER</h5>
                    <h5>This is to certify that Dr. , (Designation) is working as a full time regular faculty since
                        years. Forwarded with the remarks that the facts stated in the above application have been
                        verified and found correct and this institution/ organization has no objection to the
                        candidature of the applicant being considered for the recognition as Research Supervisor/
                        Co-Supervisor for Ph.D programme of Biju Patnaik Univenity of Technology, Odisha, Rourkela. This
                        is to further certify that the applicant fulfills all requirements of BPUT Ph.D Regulation 2019
                        and BPUT Act and Statutes to be recognized as a Ph.D Supervisor / Co-Supervisor.


                    </h5>

                </div>
            </div>

            <div class="row sign-bar">
                <div class="col-md-6">
                    <h5>Place : _______________</h5>
                    <h5>Date : ________________</h5>
                </div>
                <div class="col-md-6">
                    <h5 style="font-weight: bold">Signature of 4he head of the Institution<br>Organization (witb date A
                        seal)</h5>
                    <h5>Designation: </h5>
                    <h5>Address:

                    </h5>
                    <h5>Telephone:</h5>
                    <h5>E-mail id:

                    </h5>
                </div>
            </div>
            <div class="row thesis">
                <div class="col-md-12 thesis-info">
                    <h5 class="declaration">Recommendation of the DRDC</h5>
                    <h5>Recommended/ Not Recommended for recognition as Supervisor/ Co- Supervisor for the academic year
                        w.e.f. july _______________ to June _______________,

                    </h5>

                </div>
            </div>
            <div class="row sign-bar">
                <div class="col-md-6">
                    <h5>year : _______________</h5>
                    <h5>Date : ________________</h5>
                </div>
                <div class="col-md-6 text-center">
                    <h5 style="font-weight: bold">Chairperson, DRDC </h5>
                   
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
            <div class="row thesis">
                <div class="col-md-12 thesis-info text-center">
                    <h5 class="declaration">Remarks by Vice Chancellor</h5>
                    <h5>Approved / Not Approved
                    </h5>

                </div>
            </div>
            <div class="row sign-bar">
                <div class="col-md-6">
                  
                    <h5>Date : ________________</h5>
                </div>
                <div class="col-md-6 text-center">
                    <h5 style="font-weight: bold">Vice-Chancellor </h5>
                   
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
