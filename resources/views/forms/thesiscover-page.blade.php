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
        font-size:20px;
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
.bput-fromt-page h5{
    font-weight: bold;
    font-family: 'Times New Roman', Times, serif;
    padding: 10px;
    font-size:20px;
}
.bput-fromt-page img{
height: 180px;
width: 210px;
}
.bput-fromt-page h6{
    font-family: 'Times New Roman', Times, serif;
    padding: 6px;
    font-size:20px;
}
.bput-fromt-page h3{
    font-family: 'Times New Roman', Times, serif;
    font-weight: bold;
}
h2{
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
            <h4 class="title-head">FORMATION OF THESIS COVER PAGE </h4>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="row bput-fromt-page">
                <div class="col-md-12 text-center">
                    <h5>Approved title of the Thesis in Title case</h5>
                    <p>(Font Size 16 ,bold)

                    </p>
                       <h5>Thesis Submitted to BijuPatnik University Of Technology, Odisha</h5>
                    
                    <h5>For award of the degree of</h5>
                    <p>(Font Size 16 ,bold,italic)</p>
                    <h5>DOCTOR OF PHILOSOPHY</h5>
                    <p>(Fort Size 14, bold)</p>
                    <h5>(Faculty of..............	) </h5>
                    <p>(Fort Size 14, bold)</p>
                    <h5>NAME OF THE RESEARCH STUDENT</h5>
                    <p>(Fort Size 18, bold)</p>
                    <img src="{{asset('image/BPUT.jpg')}}" alt="bput front page">
                        <h5>Under the Guidance of</h5>
                        <p>(Font Size 12,bold)

                        </p>
                        <h5>Name of the Supervisor </h5>
                        <p>(Font Size 14,bold)</p>
                        <h5>Designation of Research Supervisor</h5>
                        <p>(Font Size 12,bold)</p>
                        
                        <h6>Biju Patnaik University Of Technology, Odisha, Rourkela </h6>
                    
                        <h5>Year </h5>
                        
                    </h5>
                </div>
            </div>

           <div><h6>* (WITHOUT ANY TITLE LIKE Mr.Mrs. MS.)</h6></div>
           
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
