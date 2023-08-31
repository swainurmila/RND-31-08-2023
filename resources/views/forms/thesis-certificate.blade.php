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

    .thesis-info h6 {
        font-size: 18px;
        margin: 40px 60px 20px 60px;
        text-align: justify;
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
    
</style>
@include('frontend.partials.navigation')
<div class="progress">
    <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<section class="sptb portal_background ">
    <div class="container form-border-container">
        <div class="phd-form-section-title form-section-title">
            <h2><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h2>
            <h4 style="text-align:center"><b>THESIS CERTIFICATE</b></h4>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-12 thesis-info">
                    <h6>1.
                        The thesis
                        entitled"........................................................................................
                        being submitted to
                        the Biju Patnaik University Of Technology, Odisha for the award of Ph.D. Degree under the
                        Faculty of .............................................is based on my original work
                        carried out under the guidance of ..............................from...................... to
                        ........................

                    </h6>
                    <h6>2. The Research work has not been submitted elsewhere for award of any degree.</h6>
                    <h6>3. The material borrowed from other source and incorporated in the Thesis has been duly
                        acknowledged and/or referenced.


                    </h6>
                    <h6>4. I understand that I would be held responsible and accountable for plagiarism, if any.
                        detected later on.

                    </h6>
                    <h6>5. Research papers published based on the research conducted out of and in the course of the
                        study leading to Ph.D. are duly credited to BPUT and appended to the Thesis and has not formed
                        the basis for the award of any degree, diploma, associate ship, fellowship, titles in this or
                        any olher University or other institute of Higher learning.

                    </h6>
                </div>
            </div>
            <div class="row signature">
                <div class="col-md-6">
                    <h5>Date. _____________</h5>
                    <h5>Counter signed by Research Supervisor </h5>
                    <h5>Date. _____________</h5>
                </div>
                <div class="col-md-6">
                    <h5>Signature of Research Student</h5>
                    <h5>Counter signed by Research Co-Supervisor</h5>
                    <h5>Date. _____________</h5>
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
