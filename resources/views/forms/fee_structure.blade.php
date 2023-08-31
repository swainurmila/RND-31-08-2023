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
</style>
@include('frontend.partials.navigation')
<div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<section class="sptb portal_background ">
    <div class="container form-border-container">
        <div class="phd-form-section-title form-section-title">
            <h2><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h2>
            <p><b>FEE STRUCTURE</b></p>
            <p><b>Programme Fees for Doctor of Philosophy(Ph.D) Programme for Indian Students</b></p>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="" class="form" method="POST" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="enrollment_fee"><b>1. Ph.D Enrollment Fee: <span
                                class="error">*</span></b></br>(One time payment to be made to the University at
                        the time of Enrollment)</label>
                    <div class="col-md-8">
                        <input type="text" id="enrollment_fee" name="enrollment_fee" class="form-control"
                            placeholder="10000">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="registration_fee"><b>2. Ph.D Registration Fee: <span
                                class="error">*</span></b></br>(One time payment to be made to the University
                        at the time of Registration)</label>
                    <div class="col-md-8">
                        <input type="text" id="registration_fee" name="registration_fee" class="form-control"
                            placeholder="15000">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="semester_fee"><b>3. Semester Fee: <span
                                class="error">*</span></b></br>(To be paid as given below at the beginning of
                        each semester upto 6 yrs or till submission of THESIS whichever is earlier with effect from the
                        date of enrollment)</br>
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
                        <input type="text" id="semester_fee" name="semester_fee" class="form-control"
                            placeholder="10000">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="reg_renewal_fee"><b>4. Registration Renewal Fee: <span
                                class="error">*</span></b></br>(per Semester to be paid to the University in
                        case of renewal of registration after six years of enrollment)</label>
                    <div class="col-md-8">
                        <input type="text" id="reg_renewal_fee" name="reg_renewal_fee" class="form-control"
                            placeholder="20000">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>5. Thesis Submission Fee: <span
                                class="error">*</span></b></br>(To be paid to the university at the time of
                        thesis submission)</label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="thesis_sub_fee" class="form-control"
                            placeholder="15000">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b><span
                                class="error">*</span>Fees to be collected from international students would be
                            USD equivalent to INR as mentioned above </label>
                </div>
                <div class="mb-2 row">
                    <span class="error">*</span>The above mentioned rates of fees shall be subject to change by
                    the BPUT from time to time
                </div>
                <div style="overflow:auto;">
                    <div style="float:right; margin-top: 5px;">
                        <a href="/feestructureform" class="button">Submit</a>
                    </div>
                </div>

            </form>
        </div>
        <div class="item-all-cat center-block text-center education-categories">

        </div>
    </div>
</section>
