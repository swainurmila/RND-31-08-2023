@extends('layouts.app')
@section('content')

<style>
.sptb-1 {
    /* background: linear-gradient(-225deg,rgb(40 79 117) 17%,rgb(40 79 117) 92%)!important; */
    background: #1e314e !important;
}
.text-center.text-white {
    text-transform: uppercase;
}
.bannerimg {
    padding: 2rem 0 2rem;
    background-size: cover;
}
.content-wrapper{min-height: 600px;}
.text-center.text-white h1 {
    font-size: 28px;
}
/* footer {
	display: none;
} */

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  /* padding: 8px; */
}
th {
    text-align: center;
    font-weight: bold;
    height: 40px;
}

/* tr:nth-child(even) {
  background-color: #dddddd;
} */
/* .table thead {
    
} */
.table thead th {
    font-weight: bold !important;
    height:50px !important;
}
.content-wrapper ul li a span {
    font-size: 15px;
}
.subheader h1 {
   
}
section#subheader h1 {
    color: #ffffff;
    font-size: 22px;
    float: left;
    padding-right: 40px;
    text-transform: none;
    display: block;
    margin: 0px;
}
.subheader .breadcrumbs {
    font-size: 13px;
    color: #ffffff;
    float: right;
    list-style: none;
    margin: 10px 0px 0px 0px;
    padding: 0px;
}
.subheader{
    padding:60px 0 60px 0;  
}

/* ==== */



/* table,
    tr {
        font-family: arial, sans-serif;
        border: 0px solid black;
        border-collapse: collapse;
        width: 50%;
    }


    th {
        border: 2px solid black;
        text-align: left;
        padding: 10px;
        font-family: 'Times New Roman', Times, serif;
    }

    td {
        border: 2px solid black;

    } */




    

    .stud-form {
        margin-top: 20px;
        width: 100%;
    }

    .stud-form p {
        width: 90%;
        font-family: 'Times New Roman', Times, serif;
        font-size: 25px;
        font-weight: bold;
    }

    .fee_structure {
        border: 1px solid #000;
        width: 100%;
        padding: 0px;

    }

    .left {
        float: left;
        margin-left: 40px;
        font-weight: bold;
    }

    .right {
        float: right;
        font-weight: bold;
        margin-right: 40px;

    }

    .main-divi {
        margin-top: 50px;

    }

    .note-rec {
        margin-top: 50px;

    }

    .date-left {
        float: left;
        margin-left: 40px;
        font-weight: bold;
    }

    .head-right {
        float: right;
        font-weight: bold;
        margin-right: 40px;
    }

    /* p {
        text-align: justify;
        font-size: 10px;
        margin: 0px 40px 0px 40px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    } */

    .vc-date {
        float: left;
        margin: 0px 10px 0px 30px;
        font-weight: bold;
    }

    .c {
        clear: both;
    }

    .vc-bput {
        margin-top: 50px;
    }

    .vc-bputt {
        float: right;
        margin: 0px 10px 0px 30px;
        font-weight: bold;
        margin-right: 40px;
    }

    .dsc-table {
        width: 90%;
    }

    .bput-table {
        border: 2px;
        width: 90%;
        height: 100%;
    }



    .form-left {
        float: left;
        padding: 10px;
        margin: 45px;

    }

    .table-data {
        float: right;
        width: 20%;
    }

    .table-data table {
        width: 40%;
        margin: 20px 0px 200px 0px;
        height: 40%;
    }

    .present {
        float: left;
        margin: 20px 60px 60px 100px
        font-family: 'Times New Roman', Times, serif;
    }
    /* .present h5{
        margin-left: 60px;
        font-family: 'Times New Roman', Times, serif;
    } */
    /* .permanent {
        float: right;
        margin: 20px 200px 0px 20px
    }
    .permanent h5{
        margin-left: 60px;
        font-family: 'Times New Roman', Times, serif;
    } */
    /* .bio-data h5 {
        margin: 20px 60px;
        font-family: 'Times New Roman', Times, serif;
    } */

    /* .info-data {
        margin: 20px 60px;
    }

    .info-data table {
        width: 100%;
    } */

    .stud-info {
        margin: 20px 60px 20px 0px;
        width: 50%;
    }

    .stud-info tr th {
        width: 40%;

    }

    

    .dec-head {
        font-family: 'Times New Roman', Times, serif;
        text-decoration: underline;
        font-weight: bold;
    }

    

    .declare {
        font-family: 'Times New Roman', Times, serif;
        text-align: justify;
        font-size: 18px;
    }
    tbody td {
	padding: 17px !important;
}
input[type="text"] {
	
	background: none;
	border: none; 
	border-bottom: 2px dotted #000;
}
.d-flex {
	display: flex;
	align-items: center;
}
textarea{
    width: 100%;
    height: 50px;
    border-bottom: 2px dotted #000;
}
.d-flex {
	display: flex;
	align-items: center;
	margin-bottom: 20px;
}
.comm_div h5 {
	margin-right: 20px;
}

.datepicker-days td {
	padding: 5px 10px !important;
}
.col-form-label {
	width: 100%;
	text-align: left;
}
.cust-txt-input {
	margin-bottom: 30px;
}
.comm_div.d-flex .div_L {
	width: 45%;
	text-align: left;
}
.comm_div.d-flex .div_R {
	width: 60%;
}
#datepicker {
	width: 180px;
}

.bio-data .div_L {
	
	text-align: left;
}
.bio-data .div_R {
	
	text-align: left;
}
.error {
	font-size: 11px;
	color: red;
	font-family: arial;
	font-weight: normal;
	width: 100%;
	text-align: left;
}
.info-mob{display: none;}

.dd_f1 .form-control {
	display: initial;
}
.dd_f1 {
	display: flex;
	justify-content: space-evenly;
}
.dd_f1 .error {
	text-align: center;
}

.form_no {
	text-align: right;
}
.form_no h4 {
	margin: 0;
}
.form_no h4 {
	margin: 0;
	font-size: 16px;
	font-weight: bold;
	line-height: 10px;
}

/*============= responsive ============ */
@media only screen and (max-width: 640px) {
  .dd_f1{display: none;}
  .d-flex{flex-flow: row wrap;}
  .comm_div.d-flex .div_L,.comm_div.d-flex .div_R {
	width: 100%;
}
.div_R input {
	width: 100% !important;
}
.fee_structure{
    margin-top: 20px !important;
    padding: 20px !important;
}
.info-desk{display: none;}
.info-mob{display: block;}
}

    </style>

<section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom subheader" style="background-position: 50% 0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Entrance Form</h1>
                <ul class="breadcrumbs">
                    <li><a href="/" style="color: #29b6f6; font-weight: bold;">Home</a></li> 
                    <b>/</b> 
                    <li class="active">Entrance Form</li>
                </ul>            
            </div>
        </div>
    </div>
</section>
<div class="content-wrapper">
    <div class="sptb">
        <div class="container">
            
            <form action="{{route('phd_entran_apply')}}" method="post" id="myForm" enctype="multipart/form-data">
                @csrf
            <section class="fee_structure clearfix" style="margin-top: 80px; padding: 50px 40px;">
                <div class="section-title form-section-title dsc-form">
                    <div class="form_no">
                        @php
                            $prev_year = date('Y') - 1;
                           // dd($prev_year);
                        @endphp
                        <h4>Form No.: BPUT/Ph.D.- 2019/7.1</h4>
                        <br>
                        <h4>(vide Ph.D.-9.1)</h4>
                    </div>
                    <center>
                        <h3><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h3>
                        <h5><b>
                                APPLICATION FOR BPUT ENTRANCE TEST FOR ADMISSION TO THE Ph.D PROGRAM(RESEARCH)(BPUT- ETR): {{$prev_year}}/{{date('y')}}
                            </b></h5>
                        <p style="font-style:italic">(To be submitted by the candidate for appearing the Entrance Test /
                            Claiming exemption from Entrance Test)</p><br>
                        <div class="dd_f1">
                            <div class="dd_details">(DD No. <input type="text" class="form-control" name="dd_no" style="width: 200px"></div>
                            <div class="dd_details" style="display: flex">
                                <p style="margin-top:4px; "> Dt. </p> 
                                <div id="datepicker2" class="input-group date">
                                    <input class="form-control datepicker" type="text" name="dd_date"   />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                </div>
                            </div>
                            <div class="dd_details"> Bank Name:<input type="text" class="form-control" name="dd_bank"style="width: 200px"> </div>
                            <div class="dd_details">
                                Rs.1000/-)(Non-refundable)
                            </div>
                        </div>
                        <div class="form-table" style="margin-top: 40px;">
                            <div class="row">
                                <div class="col-md-8 text-left">
                                    <div class="comm_div d-flex">
                                        <div class="div_L">
                                            <h5>1. Name of the Candidate : </h5>
                                        </div>
                                        <div class="div_R">
                                            <input type="text" id="name" name="name" class="form-control" style="width: 250px;">
                                        </div>
                                        
                                    </div>
                                    <div class="comm_div d-flex">
                                        <div class="div_L">
                                            <h5>2. Father / Husband's Name: </h5>
                                        </div>
                                        <div class="div_R">
                                            <input type="text" name="father_husband_name" class="form-control" style="width: 250px;">
                                        </div>
                                        
                                    </div>
                                    
                                    
                                </div>
                                <div class="col-md-4 text-right">
                                    <div class="pro_pic">
                                        <input type="file" class="form-control" id="photo2" name="photo2" accept="image/png, image/gif, image/jpeg">
                                        <b>Please Upload Your Photo</b><br>
                                        <small><i> Note <sup ><span style="color:red">*</span></sup> Please be advised that your application will be rejected if the picture you have submitted is not clear and appropriate..</i></small>
                                        <br>
                                        <small><span style="color: red;">Max file size 50kb</span></small>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                        <div class="c"></div>
                        <div class="row">
                            <div class="col-md-12 text-left">
                                <h5>3. Address for Correspondence</h5>
                            </div>
                            
                            <div class="col-md-6 clearfix">
                                <div class="present" style="padding-top:30px;  "><u>Present Address</u>
                                
                                    
                                     <p class="text-left" style="padding-top:10px;">
                                        <textarea name="present_address" id="" cols="30" rows="10"></textarea>
                                     </p>
                                     
                                     
                                        <div class="comm_div d-flex">
                                            <div class="div_L">
                                                <h5>Mobile Contact No : </h5>
                                            </div>
                                            <div class="div_R">
                                                <input type="text" name="mobile" class="form-control" style="width: 250px;">
                                            </div>
                                            
                                        </div>
                                        
                                   
                                     
                                        <div class="comm_div d-flex">
                                            <div class="div_L">
                                                <h5>E-mail ID : </h5>
                                            </div>
                                            <div class="div_R">
                                                <input type="text" name="email" class="form-control" style="width: 250px;">
                                            </div>
                                            
                                        </div>
                                        
                                    
                                     {{-- <p class="text-left">Mobile Contact No <input type="text" style="width: 250px;"></p>
                                     <p class="text-left">E-mail ID <input type="text" style="width: 330px;"></p> --}}
                                    
                             </div>
                            </div>
                            <div class="col-md-6">
                                <div class="permanent" style="padding-top:30px;"><u>Permanent Address</u>
                                    <h5>
                                        
                                        <p class="text-left" style="padding-top:10px;">
                                            <textarea name="permanent_address" id="" cols="30" rows="10"></textarea>
                                         </p>
                                        {{-- <p class="text-right"><input type="text" style="width: 400px;"></p>
                                        <p class="text-right">Mobile Contact No <input type="text" style="width: 250px;"></p>
                                        <p class="text-right">E-mail ID <input type="text" style="width: 330px;"></p> --}}
                                        
                                    </h5>
                             </div>
                            </div>
                            
    
                            
                </div>
                <div class="c"></div>
                <div class="bio-data" style="margin-top: 40px;">
                    
                        <div class="comm_div d-flex">
                            <div class="div_L">
                                <h5>4. Sex (Male/Female) :</h5>
                            </div>
                            <div class="div_R">
                                <select name="gender" id="" class="form-control" style="width:200px;">
                                    <option value="">Select Gender</option>    
                                    <option value="male">Male</option>    
                                    <option value="female">Female</option>    
                                    </select>
                            </div>
                            
                        </div>
                       
                        
                   
                    
                        <div class="comm_div d-flex">
                            <div class="div_L">
                                <h5>5. Marital status (Married / Single) :</h5>
                            </div>
                            <div class="div_R">
                                <select name="marital_status" id="" class="form-control" style="width:200px;">
                                    <option value="">Select Marital status</option>    
                                    <option value="married">Married</option>    
                                    <option value="single">Single</option>    
                                    </select>
                            </div>
                            
                        </div>
                        
                        
                    
                    <div class="comm_div d-flex">
                        <div class="div_L">
                            <h5>6. Date of Birth :</h5>
                        </div>
                        <div class="div_R">
                            <div id="datepicker" class="input-group date">
                                <input class="form-control" type="text" name="dob"   />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="comm_div d-flex">
                        <div class="div_L">
                            <h5>7. Category GEN /SC / ST/ Differently abled :</h5>
                        </div>
                        <div class="div_R">
                            <select name="category" class="form-control" id="" style="width: 200px;">
                                <option value="">Select Category</option>    
                                <option value="gen">GEN</option>    
                                <option value="sc">SC</option>    
                                <option value="st">ST</option>    
                                <option value="diffirently abled">Differently abled</option>    
                            </select>
                        </div>
                       
                    </div>
                    <div class="comm_div d-flex">
                        <div class="div_L">
                            <h5>8. Nationality : </h5>
                        </div>
                        <div class="div_R">
                            <select name="nationality" class="form-control" id="" style="width: 200px;">
                                <option value="">Select Nationality</option>    
                                <option value="indian">Indian</option>    
                                <option value="canadian">Canadian</option>      
                            </select>
                        </div>
                        
                    </div>
                    <div class="comm_div d-flex">
                        <div class="div_L">
                            <h5>9. Mother Tongue : </h5>
                        </div>
                        <div class="div_R">
                            <input type="text" name="mother_tounge" class="form-control" style="width: 250px;">
                        </div> 
                    </div>
                    
                    
                  
                    <hr style="border: 1px solid #29b6f6; margin: 60px 0;">
                    
                   
                    <h4 class="text-left">10. In case of selection, Choice of BPUT-NCR (in order of preference)</h4>
                    <div class="info-data info-desk" style="margin-top: 40px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>1</th>
                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                    <th>2</th>
                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
    
    
                                </tr>
                                <tr>
                                    <th>3</th>
                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                    <th>4</th>
                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <th>5</th>
                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                    <th>6</th>
                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    <div class="info-data info-mob" style="margin-top: 40px;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>1</th>
                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <th>3</th>
                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <th>4</th>
                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <th>5</th>
                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <th>6</th>
                                    <td><input type="text" name="selection_ncr2[]" class="form-control" style="width: 100%;"></td>
                                </tr>
                            </thead>
                        </table>
                    </div>

                    {{-- <h5 class="text-left"  style="margin-top:40px; ">11. Educational Qualification (HSC onwards) [Enclose self attested copy of documents]</h5> --}}
                    <h6 class="text-left"></h6>
                    <div class="panel-heading" style="color:#fff;background:#0a64a0 !important;">
                        <b>11. Educational Qualification (HSC onwards) [Enclose self attested copy of documents] <span class="error">*</span></b>
                    </div>
                    {{-- <small style="display: inline-block" class="text-pink mt-2"><i>(Certificates are
                        in pdf/jpg/jpeg/png format and size must be less than
                        500kb)</i></small> --}}
                    </br>
                    <div class="form-row clearfix" id="add_phdstudent_qualfication">
                        <div class="col-md-4 cust-txt-input">
                            <label class="col-form-label"
                                for="phdstudent_qualification_field"><b>Degree :</b></label>
                            <select class="form-select form-control "id="phdstudent_qualification_field" name="phdstudent_qualification_field">
                                <option value="">Choose Exam Passed:</option>
                                <option value="HSC">HSC</option>
                                <option value="+2">+2</option>
                                <option value="Graduation">Graduation</option>
                                <option value="Post-Graduation">Post-Graduation
                                </option>
                                <option value="MPhil">MPhil</option>
                            </select>
                        </div>
                        

                        <div class="col-md-4 cust-txt-input">
                            <label class=" col-form-label"
                                for="phdstudent_board_university"><b>Board /
                                    University:</b></label>
                            <input type="text" id="phdstudent_board_university" value=""
                                class="form-control"
                                placeholder="Enter University" name="phdstudent_board_university">

                        </div>
                        <div class="col-md-4 cust-txt-input">
                            <label class=" col-form-label" for="phdstudent_passing_year"><b>Year of
                                    Passing:</b></label>
                            <select class="form-select form-control" id="phdstudent_passing_year" name="phdstudent_passing_year">
                                <option value="">Choose Years:</option>
                                @for ($i = date('Y'); $i >= date('Y') - 50; $i--)
                                    <option value="{{ $i }}">
                                        {{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-2 cust-txt-input">
                            <label class=" col-form-label" for="phdstudent_division"><b>Class /
                                    Division:</b></label>
                            <input type="text" id="phdstudent_division" value="" class="form-control" placeholder="Enter Division" name="phdstudent_division">

                        </div>
                        <div class="col-md-2 cust-txt-input">
                            <label class=" col-form-label" for="phdstudent_percentage_cgpa"><b>%
                                    marks/CGPA:</b></label>
                            <input type="text" id="phdstudent_percentage_cgpa" value=""
                                 class="form-control"
                                placeholder="Enter marks/CGPA" name="phdstudent_percentage_cgpa">
                        </div>
                        <div class="col-md-4 cust-txt-input">
                            <label class=" col-form-label" for="phdstudent_major_sub"><b>
                                    Major subject:</b></label>
                            <input type="text" id="phdstudent_major_sub" value=""
                                 class="form-control"
                                placeholder="Enter Subjects" name="phdstudent_major_sub">
                        </div>
                        {{-- <div class="col-md-4 cust-txt-input">
                            <label class=" col-form-label"
                                for="phdstudent_percentage_cgpa"><b>Upload
                                    Certificate:</b></label>
                            <input class="form-control" type="file" name="cerificate"
                                id="formFile">
                            <input type="hidden" name="file_thumb" value="" id="formFile2">
                        </div>
                        <div class="col-md-4 cust-txt-input">
                            <label class=" col-form-label"
                                for="phdstudent_percentage_cgpa"><b>Upload
                                    Marksheet:</b></label>
                            <input class="form-control" type="file" name="marksheet"
                                id="marksheet">
                            <input type="hidden" name="file_marksheet" value=""
                                id="file_marksheet">
                        </div> --}}
                        <div class="col-md-4 cust-txt-input">
                            <div class="form-group">
                                <button type="button"
                                    class="btn add_phdstudent_qualification_dtls2  btn-success btn-icon waves-effect waves-themed "
                                    style="margin-top: 2.3rem !important;"
                                    id="add_phdstudent_qualification_dtls2">
                                    Add Qualification
                                </button>
                            </div>
                        </div>
                        {{-- <table class="table table-sm m-0 table-bordered mt-2">
                            <thead class="">
                                <tr class="table-heading">
                                    <th>Exam Passed</th>
                                    <th>Specialization</th>
                                    <th>Board / University</th>
                                    <th>Year of passing</th>
                                    <th>Class / Division</th>
                                    <th>% Marks/ CGPA</th>
                                    <th>Certificate</th>
                                    <th>Marksheet</th>
                                </tr>
                            </thead>
                            <tbody class="addPhdQualifyrow2">
                            </tbody>
                        </table> --}}
                    </div>
                    <div class="tbd">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="width: 100%;">
                                <thead style="background: #b9aaaa;">
                                    <tr>
                                        <th scope="col">Degree</th>
                                        <th scope="col">University/Board</th>
                                        <th scope="col">Year of Passing</th>
                                        <th scope="col">Class/Division</th>
                                        <th scope="col">% of marks/ CGPA</th>
                                        <th scope="col">Major subject(s)</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="addPhdQualifyrow2">
                                </tbody>
                            </table>
                        </div>
                        <br>
                        
                    </div>
                    
                    <div class="col-md-12 text-center">
                        {{-- {{route('')}} --}}
                        <button type="submit" class="btn btn-primary">Next</button>
                        {{-- <a href="{{route('entrance_form_two')}}" class="btn btn-primary">Next</a> --}}
                    </div>
                    </center>
                </div>
            </section>
        </form>
        </div>
    </div>
</div>



<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>




@endsection

@section('jss')
<script>
        $(document).ready(function() {
  $("#datepicker").datepicker({ 
         //autoclose: true, 
        // todayHighlight: true
        format: 'yyyy-mm-dd'
  });
  $(".datepicker").datepicker({ 
         //autoclose: true, 
        // todayHighlight: true
        format: 'yyyy-mm-dd'
  });
//   ======== disabled =======
if ($(window).width() < 640) {
   //alert('Less than 640');
   $('.info-desk input').attr('disabled', 'disabled'); //Disable
   $('.info-mob input').removeAttr('disabled'); //Enable
}
else {
  // alert('More than 640');
   $('.info-mob input').attr('disabled', 'disabled');
   $('.info-desk input').removeAttr('disabled');;
}


});
    </script>

<script>
   

    // add qualification 
    
            var count = 1;
            var counter = 0;
            $(document).ready(function() {
                $('#add_phdstudent_qualification_dtls2').click(function(e) {
    
                    //alert('hi');
                    e.preventDefault();
                    // var exam_passed = $('#phdstudent_qualification_field').valid();
                    // var discipline = $('input[name="phdstudent_specialization"]').valid();
                    // var university = $('input[name="phdstudent_board_university"]').valid();
                    // var passing = $('#phdstudent_passing_year').valid();
                    // var division = $('input[name="phdstudent_division"]').valid();
                    // var marks = $('input[name="phdstudent_percentage_cgpa"]').valid();
                    // var Certificate = $('input[name="cerificate"]').valid();
                    // var marksheet = $('#marksheet').valid();
    
    
                    // if (exam_passed && discipline && university && passing && division && marks &&
                    //     Certificate && marksheet) {
                        var phdstudent_qualification_field = $('#phdstudent_qualification_field').val();
                        var phdstudent_board_university = $('#phdstudent_board_university').val();
                        var phdstudent_passing_year = $('#phdstudent_passing_year').val();
                        var phdstudent_division = $('#phdstudent_division').val();
                        var phdstudent_percentage_cgpa = $('#phdstudent_percentage_cgpa').val();
                        var phdstudent_major_sub = $('#phdstudent_major_sub').val();
                       
                        var newRow = '<tr>' +
                            '<td>' + phdstudent_qualification_field +
                            '<input type="hidden" name="stu_quali[]" value="' +
                            phdstudent_qualification_field + '"></td>' +
                           
                            '<td>' + phdstudent_board_university +
                            '<input type="hidden" name="stu_univer[]" value="' +
                            phdstudent_board_university + '"></td>' +
                            '<td>' + phdstudent_passing_year +
                            '<input type="hidden" name="stu_pass_year[]" value="' +
                            phdstudent_passing_year + '"></td>' +
                            '<td>' + phdstudent_division +
                            '<input type="hidden" name="stu_division[]" value="' +
                            phdstudent_division + '"></td>' +
                            '<td>' + phdstudent_percentage_cgpa +
                            '<input type="hidden" name="stu_percentage[]" value="' +
                            phdstudent_percentage_cgpa + '"></td>' +
                            '<td>' + phdstudent_major_sub +
                            '<input type="hidden" name="stu_spec[]" value="' +
                            phdstudent_major_sub + '"></td>' +
                           
                            '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                            counter + '">Remove</button></td></tr>';
                        $('.addPhdQualifyrow2').append(newRow);
                        count++;
                        counter++;
                   // }
    
                });
    
                $(".addPhdQualifyrow2").on("click", ".remove_field", function(e) {
                    $(this).parent('td').parent('tr').remove();
                    counter--;
                    count--;
                });
            });
        </script>

<script type="text/javascript">
    $(document).ready(function() {

        // var f=$('#photo2').files[0].size;
        // alert(f);

        $.validator.addMethod('filesize', function(value, element, param) {
var size = element.files[0].size;
size = size / 1024;
size = Math.round(size);
return this.optional(element) || size <= param;

}, 'File size must be less than {0} Kb');
        // jQuery("#").validate({
        jQuery("#myForm").validate({
            // Specify validation rules
            //var val = {
            rules: {
                
                name: "required",
                father_husband_name: "required",
                //photo2: "required",
                present_address: "required",
                permanent_address: "required",
                dob: "required",
                dd_no: "required",
                dd_date: "required",
                dd_bank: "required",
                //mobile: "required",
                mobile: {
                    required: true,
                    number: true,
                    maxlength:10,
                    minlength:10
                },
                email: {
                    required: true,
                    email: true
                },
                photo2: {
                    required: true,
                    extension: "jpg,jpeg,png",
                    filesize: 50
                },
                gender: "required",
                marital_status: "required",
                category: "required",
                nationality: "required",
                mother_tounge: "required",
                phdstudent_qualification_field: "required",
                phdstudent_board_university: "required",
                phdstudent_passing_year: "required",
                phdstudent_division: "required",
                phdstudent_percentage_cgpa: "required",
                phdstudent_major_sub: "required"

                

            },
            // Specify validation error messages
            messages: {
                photo2: {
                        extension: "please upload formrt jpg,png,jpeg ",
                    },
            }
            // }
        });
      
    });
</script>
@endsection


