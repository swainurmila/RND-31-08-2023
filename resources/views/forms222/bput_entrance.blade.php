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
            <h4 style="text-align:center"><b>APPLICATION FOR BPUT ENTRANCE TEST FOR RESEARCH (BPUT- ETR)</b></h4>
            <p style="font-style:italic">(To be submitted by the candidate for appearing the Entrance Test / Claiming exemption from Entrance Test)</p>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="" class="form" method="POST" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="enrollment_fee"><b>1. Name of the Candidate : <span
                                class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="enrollment_fee" name="name" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="registration_fee"><b>2. Father/Husband's Name: : <span
                                class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="registration_fee" name="lname" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="semester_fee"><b>3. Address for Correspondence : <span
                                class="error">*</span></b></br>
                        <!--<table>
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
                        </table>-->
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="semester_fee" name="address" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="reg_renewal_fee"><b>4. Sex (Male/Female) : <span
                                class="error">*</span></b><br></label>
                    <div class="col-md-8">
                        <input type="text" id="reg_renewal_fee" name="sex" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>5. Marital status (Married / Single)
                            : <span class="error">*</span></b><br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="marital" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>6. Date of Birth
                            : <span class="error">*</span></b><br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="dob" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>7. Whether GEN /SC / ST/ Differently
                            abled : <span class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="cast" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>8. Nationality: <span
                                class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="nationality" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>9. Mother Tongue
                            :<span class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="language" class="form-control" placeholder="">
                    </div>
                </div>
                <!--<div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>10. Address during the leave with
                            Tel. No. :<span class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="title-work" class="form-control" placeholder="">
                    </div>
                </div>-->



                <!--<div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b><span
                                class="error">*</span>Fees to be collected from international students would be
                            USD equivalent to INR as mentioned above </label>
                </div>
                <div class="mb-2 row">
                    <span class="error">*</span>The above mentioned rates of fees shall be subject to change by
                    the BPUT from time to time
                </div>-->
                <div style="overflow:auto;">
                    <div style="float:right; margin-top: 5px;">
                        <a href="/bput_entranceform" class="button">Submit</a>
                    </div>
                </div>

            </form>
        </div>
        <div class="item-all-cat center-block text-center education-categories">

        </div>
    </div>
</section>
