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
            <h4 style="text-align:center"><b><u>APPLICATION FOR CHANGE OF RESEARCR SUPERVISORS CO SUPERVISOR </u></b></h4>
           
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="" class="form" method="POST" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="enrollment_fee"><b>1. Name of Ph.D Student : <span
                                class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="enrollment_fee" name="name" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="registration_fee"><b>2. Name of NCR : <span
                                class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="registration_fee" name="name_ncr" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="semester_fee"><b>3. Name of the Faculty : <span
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
                        <input type="text" id="semester_fee" name="faculty" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>4. Branch / Specialisation
                        
                            : <span class="error">*</span></b><br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="branch" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>5. Enrollment No. & Date of Enrollment
                        
                            : <span class="error">*</span></b><br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="eno_no" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>6. Regd. No with date of Registration
                        
                            : <span class="error">*</span></b><br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="regd" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>7. Title of Ph.D. work 
                            : <span class="error">*</span></b><br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="topic" class="form-control" placeholder="">
                    </div>
                </div>
              
                <!--<div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>8. Category of studentship
                        (FulI Time / Part Time / Full Time Special)
                        : <span
                                class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="studentship" class="form-control" placeholder="">
                    </div>
                </div>-->
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>8. Name of the present Research Supervisor
                            :<span class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="supervisor_name" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>9. Name of Proposed Research Supervisor
                            :<span class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="p_supervisor" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>10. Name of the present Research Co-Supervisor
                        
                            :<span class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="pre_co_sup" class="form-control" placeholder="">
                    </div>
                </div>
               <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>11. Name of Proposed Research Co-Supervisor
                        
                            :<span class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="pro_sup" class="form-control" placeholder="">
                    </div>
                </div>
               <!-- <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>13. Name & Address of the
                        Supervisors :
                        
                            <span class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="supervisors" class="form-control" placeholder="">
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
                        <a href="/supervisorform" class="button">Submit</a>
                    </div>
                </div>

            </form>
        </div>
        <div class="item-all-cat center-block text-center education-categories">

        </div>
    </div>
</section>
