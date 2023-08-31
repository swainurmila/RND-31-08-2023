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

    .thesis-info h5 {
        font-size: 15px;
        margin: 10px 60px 0px 50px;
        font-family: 'Times New Roman', Times, serif;
        font-size:18px;
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

    .dsc-member {
        /* font-weight: bold;
        text-decoration: underline; */
        margin: 20px 60px 0px 50px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
    }

    .dsc-member h5 {
        margin: 20px 60px 0px 50px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 20px;
    }

    .signature h5 {
        margin: 20px 60px 0px 50px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
    }

    .signature h6 {
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
        text-align: center;
        font-size: 20px;
        text-decoration: underline;
    }

    .dsc-person h5 {
        margin: 40px;
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
    }

    .letter {
        margin: 0px 40px 0px 500px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 15px;
    }

    .present {
        margin: 20px 0px 0px 100px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
    }

    .adjudication td {
        text-align: center;
    }

    .sign-date {
        margin: 60px;
    }
    .sign-bar{
margin-top: 60px;
    }
.sign-bar h6{
    margin: 0px 60px 0px 60px;
    font-family: 'Times New Roman', Times, serif;
    font-weight: bold;
    font-size:17px;
}
    .consent h4 {
        text-align: center;
        font-weight: bold;
        text-decoration: underline;
        font-family: 'Times New Roman', Times, serif;
    }

    .consent h5 {
        margin: 10px 60px 0px 60px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
    }
    .consent h6{
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
        text-align: right;
        margin-right:80px; 
    }
    .forward{
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
        font-weight: bold;
        text-decoration: underline;
    }
    .pic-bput h5{
        margin: 30px 60px 0px 60px;
        font-weight: bold;
    }
    .cell-action{
        margin: 60px;
    }
    .cell-action h6{
        font-family: 'Times New Roman', Times, serif;
        font-size: 18px;
     margin-top:20px; 
        
    }
    .action{
        text-align: center;
        font-weight: bold;
        text-decoration: underline;
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
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="row signature">

                <div class="col-md-12">
                    <h6>Verification of Candidate by Head, NCR</h6>
                    <h5>The application and all documents, certificates and manuscripts etc of the Candidate
                        ____________________________________
                        has been verified with the originals ii the Department of
                        _______________________________________NCR _____________________________________________
                        and are found to be correct.
                        The DSC for the candidate be constituted.

                    </h5>
                </div>
            </div>
            <div class="row sign-bar">
                <div class="col-md-6">
                    <h6>Signature of Head of the Deptt. / NCR </h6>

                    <h6>(Co-Chairperson)</h6>

                </div>
                <div class="col-md-6 co-supervisor">
                    <h6>Signature of Head of the Institution (NCR)</h6>
                    <h6>(Co-Chairperson)</h6>
                </div>
            </div>
            <div class="row thesis">
                <div class="col-md-12 thesis-info">
                    <h5><b>Check List</b></h5>
                    <h5>The Head of NCR is required to submit the following documents.</h5>
                    <h5>1. Name & contact address list of domain Experts (8 Names) from Research Supervisor</h5>
                    <h5>2. Name & contact address of Head of Institute who will serve as Chairperson in DSC.</h5>
                    <h5>3. Name & contact address of Head of NCR I Department who will serve as to-Chairperson in DSC
                    </h5>
                    <h5>4. Demand Draft of Rs 10,000 in favor of BPUT, Rourkela to be drawn at SBI, Uditnagar, Rourkela
                    </h5>
                    <h5>5. Research Proposal of the candidate dully signed by the candidate and proposed Research
                        Supervisor and
                        Co-Supervisor(if any)
                    </h5>
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:10px">
            
            <div class="row consent">
                <div class="col-md-12">
                    <h4>For official use only at BPUT</h4>
                    <h5>The following members are Recommended for the Doctoral Scrutiny  Committee of the student :</h5>
                    <h5>1. ___________________ Head ofthe Institution</h5>
                    <h6>Chairperson</h6>
                    <h5>2. ___________________Head of the NCR/Department </h5>
                    <h6>Co-Chairperson</h6>
                    <h5>3. ___________________Domain expert, Insida Odisha (Nominated by VC)</h5>
                    <h6>Member</h6>
                    <h5>4. ___________________Domain expert, Inside Odisha(outside the OCR) (Nominated by VC)	</h5>
                    <h6>Member</h6>
                    <h5>5. ___________________Research Supervisor</h5>
                    <h6>Member Convener</h6>
                    <h5>6. ___________________Co-Supervisor (if any)</h5>
                    <h6>Joint Member Convener</h6>
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:10px">
            <div><h5 class="forward">Recommended and forward by</h5></div>
            <div class="row pic-bput">
                <div class="col-md-6">
                    <h5>J.E(R&D)</h5>
                </div>
                <div class="col-md-6 text-center">
                    <h5>PIC(R&D),BPUT</h5>
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:10px">
            <div><h5 class="forward">Approved / Not Approved

            </h5></div>
            <div class="row pic-bput">
                <div class="col-md-6">
                    {{-- <h5>J.E(R&D)</h5> --}}
                </div>
                <div class="col-md-6 text-center">
                    <h5>Vice-Chancellor, BPUT</h5>
                </div>
            </div>
            <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:10px">
            <div class="row cell-action">
                <div class="col-md-12">
                    <h5 class="action">BPUT(R&D) Ph.D cell for Records and Necessary action</h5>
                    <h6>Amount of Fee paid Rs. 	____________________________	 & the University Receipt No. / Bank DD No. ____________________________		 & Date ____________________________	, Issuing Bank: ____________________________	(Attach photo copy of the University Receipt / Bank DD) for provisional allotment.

                    </h6>
                    <h6>The student is assigned the following Enrollment Number & NCR :</h6>
                    <h6>Name of the student: ____________________________ 	Name of NCR: ____________________________</h6>
                    <table>
                        <tr>
                            <th>Faculty</th>
                            <th>Session</th>
                            <th>Disciplined Specialization</th>
                            <th>Category of studentship
                                (Full Time / Part Time
                                Full Time Special)
                                </th>
                            <th>Enrollment Number with date</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    <h6>The provisional Enrollment of the student is approved with effect from: ___________________________________________________</h6>
                    <h6>He is required to submit within 06 years from the date of enrollment.</h6>
                </div>
            </div>
            <div class="row pic-bput">
                <div class="col-md-6">
                    <h5>Verified and found correct

                    </h5>
                    <h5>Jr. Executive (R&D)</h5>
                </div>
                <div class="col-md-6 text-center">
                    <h5>Approved / Not Approved</h5>
                    <h5>PIC (R&D), BPUT</h5>
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
                    <a href="/application-enrollment-Consent" class="button">Next</a>
                </div>
            </div>

            </form>
        </div>
        <div class="item-all-cat center-block text-center education-categories">

        </div>
    </div>
</section>
