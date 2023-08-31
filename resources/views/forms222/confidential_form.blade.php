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

    .title-head {
        font-weight: bold;
        text-decoration: underline;
        text-align: center;
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
    .dsc-member{
        font-weight: bold;
        text-decoration: underline;
        margin: 40px 0px 60px 50px;
    }

    .signature h5 {
        margin: 20px 60px 0px 50px;
        font-family: 'Times New Roman', Times, serif;
    }
    .dsc-person h5{
margin: 40px;
font-weight: bold;
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
            <h4 class="title-head">CONFIDENTIAL</h4>
            <h6 class="title-board">Recommend additional list of Experts for the Open Defence Viva Voce Board(Within 600
                kms of railway distance)</h6>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="row signature">

                <div class="col-md-12">

                    <h5>1. Name of the Student:
                        _______________________________________________________________________________</h5>
                    <h5>2. Registration Number & Faculty:
                        ______________________________________________________________________</h5>
                    <h5>3. Name of the Supervisor (Mobile No. & Email):
                        __________________________________________________________ </h5>
                    <h5>4. Name of the Co-Supervisor (Mobile No. & Email):
                        _______________________________________________________</h5>
                    <h5>5. Title of the Thesis:
                        _________________________________________________________________________________</h5>
                    <h5>6. List of additional 0ó Experts for Viva Voce Board whose affiliation is within distance of
                        maximum 600 kms (railway distance) from Rourkela as per Ph.D. Regulation clause Ph.D.-
                        3.1.3 c
                    </h5>
                </div>
            </div>
            <div class="row thesis">
                <div class="col-md-12 thesis-info">
                    <table class="table  table-bordered adjudication">
                        <tr>
                            <th>Sl no.</th>
                            <th>Name</th>
                            <th>Designation &
                                Specialization
                            </th>
                            <th>Affiliation
                                Institute
                                Address &
                                Website
                                Address

                            </th>
                            <th>Mobile No.</th>
                            <th>E-mail</th>
                            <th>Remarks</th>
                        </tr>
                        
                        <tr>
                            <td>1</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                     
                    </table>
                </div>
            </div>

            <div>
                <h5 class="dsc-member"> Signature of DSC Members</h5>
            </div>
            <div class="row dsc-strut">
                <div class="col-md-4">
                    <p> _____________________</p>
                   
                    <p>_____________________</p>
                  
                </div>
                <div class="col-md-4">
                    <p> _____________________</p>
                   
                    <p> _____________________</p>
                   

                </div>
                <div class="col-md-4">
                    <p>_____________________</p>
                 
                    <p> _____________________</p>
                    
                </div>
            </div>
            <div class="row dsc-person">
                <div class="col-md-6">
                    <h5>Date: ________________________</h5>
                </div>
                <div class="col-md-6 text-right">
                    <h5>Chairperson, DSC</h5>
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
