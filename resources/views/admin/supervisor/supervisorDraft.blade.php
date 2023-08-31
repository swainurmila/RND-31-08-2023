@extends('admin.layouts.app')
@section('heading', 'Supervisor Draft Form')
@section('sub-heading', 'Supervisor Draft Form')
@section('content')

<style>

.form-row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -5px;
    margin-left: -5px;
}

.panel-heading {
    padding: 10px 15px;
    border-bottom: 1px solid transparent;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
}
div#add_qualfication, div#add_employment2, div#add_employment3, div#add_best_three_publications, div#add_atleast_one_publications, div#add_phd_students {
    justify-content: space-between;
    align-items: center;
}
.col-md-3.cust-txt-input {
    width: 22%;
    margin-bottom: 20px;
}

.col-md-4.cust-txt-input2 {
    width: 30%;
    margin-bottom: 20px;
}
.mytooltip .tooltip-item {
    background: #c81c1c;
    cursor: pointer;
    display: inline-block;
    font-weight: 700;
    padding: 3px 10px;
    color: #fff;
}
.mytooltip {
    display: inline;
    position: relative;
    z-index: 999;
}
.mytooltip .tooltip-content {
    position: absolute;
    z-index: 9999;
    width: 360px;
    left: 50%;
    margin: 0 0 20px -180px;
    bottom: 100%;
    text-align: left;
    font-size: 14px;
    line-height: 30px;
    -webkit-box-shadow: -5px -5px 15px rgba(48, 54, 61, 0.2);
    box-shadow: -5px -5px 15px rgba(48, 54, 61, 0.2);
    background: #2b2b2b;
    opacity: 0;
    cursor: default;
    pointer-events: none;
}
.mytooltip:hover .tooltip-content {
    pointer-events: auto;
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0) rotate3d(0, 0, 0, 0deg);
    transform: translate3d(0, 0, 0) rotate3d(0, 0, 0, 0deg);
}
.mytooltip .tooltip-content img {
    position: relative;
    display: block;
    float: left;
    margin-right: 1em;
    max-width: 100%;
}
    
    /* .tab{display: none; width: 100%; height: 50%;margin: 0px auto;}
    .current{display: block;}
    

    
    button {background-color: #55a5db; color: #ffffff; border: none; padding: 10px 20px; font-size: 17px; font-family: Raleway; cursor: pointer; }
    
    button:hover {opacity: 0.8; }
    
    .previous {background-color: #bbbbbb; }
    
    
    .step {height: 30px; width: 30px; cursor: pointer; margin: 0 2px; color: #fff; background-color: #bbbbbb; border: none; border-radius: 50%; display: inline-block; opacity: 0.8; padding: 5px}
    
    .step.active {
        opacity: 1;
        background-color: #55a5db !important;
    }
    
    .step.finish {background-color: #55a5db; } */
    
    .error {color: #f00; } 
    .biju-odisha{
        font-family:'Times New Roman', Times, serif;
        text-align: center;
    }
    .form-section-title h2 {
    font-size: 1.6rem !important;
}
    </style>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <!-- cta -->
                                <div class="panel-container show" role="content"><div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                                    <div class="panel-content">   
                                        <div class="section-title form-section-title">
                                            <h2 class="biju-odisha"><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h2>
                                            <p style="text-align: center !important;"><b>APPLICATION FORMAT FOR RECOGNITION OF PROSPECTIVE SUPERVISOR / CO-SUPERVISOR FOR THE ACADEMIC YEAR_W.E.F.<br> JULY 2022 TO JUNE 2023</b></p>
                                        </div>                              
                                        
                                        <form action="{{route('sup.draft.store',[$id])}}" class="form" method="POST" id="myForm"  enctype="multipart/form-data">
                                            @csrf
                                            <div class="tab">
                                                 <div class="mb-2 row">
                                                    <label class="col-md-4 col-form-label" for="faculty"><b>Faculty: <span class="error">*</span></b></label>
                                                    <div class="col-md-8">
                                                        <select class="custom-select form-control" id="faculty" name="faculty" >
                                                            <option value="" >Select Faculty</option>
                                                            <option value="Architecture" {{ $supervisors->faculty == 'Architecture' ? 'selected' : '' }}>Architecture</option>
                                                            <option value="Engineering" {{ $supervisors->faculty == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                                                            <option value="Management" {{ $supervisors->faculty == 'Management' ? 'selected' : '' }}>Management</option>
                                                            <option value="Pharmacy" {{ $supervisors->faculty == 'Pharmacy' ? 'selected' : '' }}>Pharmacy</option>
                                                            <option value="Computer Application & Science" {{ $supervisors->faculty == 'Computer Application & Science' ? 'selected' : '' }}>Computer Application & Science</option>
                                                        </select>
                                                    </div>
                                                </div>
                            
                                                <div class="mb-2 row">
                                                    <label class="col-md-4 col-form-label"  for="full_name"><b>Full Name: <span class="error">*</span></b></label>
                                                    <div class="col-md-8">
                                                        <input type="text" id="full_name" name="full_name" class="form-control" placeholder = "Enter name in Block Letters" value="{{ $supervisors->full_name }}" >
                                                    
                                                        <small id="" class="form-text text-muted">(in block letters)</small>
                                                    </div>
                                                </div>
                                                <div class="mb-2 row">
                                                    <label class="col-md-4 col-form-label"  for="organisation"><b>Name of the Institution / Organisation with detailed address: <span class="error">*</span></b></label>
                                                    <div class="col-md-8">
                                                        <input type="text" id="organisation"  name="organisation" class="form-control" placeholder = "Enter name of the institution" value="{{ $supervisors->institution_organisation }}" >
                                                    </div>
                                                </div>
                                                <div class="mb-2 row">
                                                    <label class="col-md-4 col-form-label"  for="nature_of_appointment"><b>Nature of Present Appointment as Teaacher/Scientist (Full time Regular / Contractual / Part-time / Guest / Resource Person): <span class="error">*</span></b></label>
                                                    <div class="col-md-8">
                                                        <input type="text" id="nature_of_appointment"  name="nature_of_appointment" class="form-control" value="{{ $supervisors->present_appointment }}" placeholder = "Enter name of the institution" >
                                                    </div>
                                                </div>
                            
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <div class="mb-2 row">
                                                            <label class="col-md-4 col-form-label"  for="date_of_birth"><b>Date of Birth (DD/MM?YYYY): <span class="error">*</span></b></label>
                                                            <div class="col-md-7">
                                                                <input type="date" id="date_of_birth" name="date_of_birth"  class="form-control" placeholder = "Enter DOB." value="{{ $supervisors->dob }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="mb-2 row">
                                                            <label class="col-md-4 col-form-label"  for="age"><b>Age as on last date of application (in years): <span class="error">*</span></b></label>
                                                            <div class="col-md-8">
                                                                <input type="number" id="age"  name="age" class="form-control" placeholder = "Enter Age" value="{{ $supervisors->age }}" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                            
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <div class="mb-2 row">
                                                            <label class="col-md-4 col-form-label"  for="marital_status"><b>Marital Status: <span class="error">*</span></b></label>
                                                            <div class="col-md-7">
                                                                <input type="text" id="marital_status"  name="marital_status" class="form-control" placeholder = "Enter your marital status" value="{{ $supervisors->marital_status }}" >
                                                            </div>
                                                        </div>
                                                    </div>
                            
                                                    <div class="form-group col-md-6">
                                                        <div class="mb-2 row">
                                                            <label class="col-md-4 col-form-label" for="gender"><b>Gender: <span class="error">*</span></b></label>
                                                            <div class="col-md-8">
                                                                <select class="custom-select form-control" id="gender" name="gender">
                                                                    <option value="">Select Gender</option>
                                                                    <option value="Male" {{ $supervisors->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                                    <option value="Female" {{ $supervisors->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                            
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <div class="mb-2 row">
                                                            <label class="col-md-4 col-form-label"  for="permanent_address"><b>Permanent address: <span class="error">*</span></b></label>
                                                            <div class="col-md-7">
                                                            <textarea class="form-control" id="permanent_address" rows="5" name="permanent_address">{{ $supervisors->permanent_address }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="mb-2 row">
                                                            <label class="col-md-4 col-form-label"  for="correspondance_address"><b>Correspondence address: <span class="error">*</span></b></label>
                                                            <div class="col-md-8">
                                                                <textarea class="form-control" id="correspondance_address" rows="5" name="correspondance_address">{{ $supervisors->correspondence_address }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                            
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <div class="mb-2 row">
                                                            <label class="col-md-4 col-form-label"  for="natinality"><b>Nationality: <span class="error">*</span></b></label>
                                                            <div class="col-md-7">
                                                            <input type="text" id="natinality"  name="natinality" class="form-control" placeholder = "Enter your Nationality" value="{{ $supervisors->nationality }}"  >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="mb-2 row">
                                                            <label class="col-md-4 col-form-label"  for="aadhar_card_number"><b>Aadhar Card No.: <span class="error">*</span></b></label>
                                                            <div class="col-md-8">
                                                                <input type="number" id="aadhar_card_number"  name="aadhar_card_number" class="form-control" placeholder = "Enter your aadhar card number" value="{{ $supervisors->aadhar_no }}" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-2 row">
                                                    <label class="col-md-3 col-form-label"  for="discipline_specialization"><b>Disciline & Specialization: <span class="error">*</span></b></label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="discipline_specialization"  name="discipline_specialization" class="form-control" placeholder = "Enter your descipline/specialization" value="{{ $supervisors->disciline_specialization }}" >
                                                    </div>
                                                </div>
                                                </br>
                                                <div class="panel-heading" style="color:#fff;background:#0a64a0 !important;"><b>Educational Qualification (from Matriculation onwards): <span class="error">*</span></b></div>
                                                <p style = "text-align: justify !important;"><b>(Attach self-attested photo Copies of the relevant documents as Annexures.) </b></p>
                                    
                                                <div class="form-row pres" id="add_qualfication">
                                                    <div class="col-md-3 cust-txt-input">
                                                        <label class=" col-form-label"  for="qualification_field"><b>Exam Passed:</b></label>
                                                        <select class="custom-select form-control" name="exam_pass" id="qualification_field">
                                                            <option value="" >Select Exam</option>
                                                            <option value="HSC">HSC</option>
                                                            <option value="+2">+2</option>
                                                            <option value="Graduation">Graduation</option>
                                                            <option value="Post-Graduation">Post-Graduation</option>
                                                            <option value="MPhil">MPhil</option>
                                                            <option value="Ph.D">Ph.D</option>
                                                        </select>
                                                        <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                    </div>
                                                    <div class="col-md-3 cust-txt-input items" id="items">
                                                        <label class=" col-form-label"  for="specialization"><b>Specialization:</b></label>      
                                                        <input type="text" id="specialization" name="qual_spec" class="form-control ip_presdata" placeholder = "Enter specialization" >
                                                        <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                    </div>
                            
                                                    <div class="col-md-3 cust-txt-input">
                                                        <label class=" col-form-label" for="board_university"><b>Board / University:</b></label>
                                                        <input type="text" id="board_university" name="qua_board" class="form-control" placeholder = "Enter University" >
                                                        <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                    </div>
                                                    <div class="col-md-3 cust-txt-input">
                                                        <label class=" col-form-label"  for="passing_year"><b>Year of Passing:</b></label>
                                                        <select class="custom-select form-control" name="qua_year" id="passing_year">
                                                            <option value="" >Select Years</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2017">2017</option>
                                                        </select>
                                                        <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                    </div>
                                                    <div class="col-md-3 cust-txt-input">
                                                        <label class=" col-form-label"  for="division"><b>Class / Division:</b></label>
                                                        <input type="text" id="division" name="qua_divi" class="form-control" placeholder = "Enter University" >
                                                        <span class="error-msg prs_name text-danger" id="prs_name"></span>    
                                                    </div>
                                                    <div class="col-md-3 cust-txt-input">
                                                        <label class=" col-form-label"  for="percentage_cgpa"><b>% marks/CGPA:</b></label>
                                                        <input type="text" id="percentage_cgpa" name="qua_marks" class="form-control" placeholder = "Enter University" >       
                                                        <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                    </div>
                                                    <div class="col-md-3 cust-txt-input">
                                                        <label class=" col-form-label" for="phdstudent_percentage_cgpa"><b>Upload
                                                                Certificate:</b></label>
                                                        <input class="form-control" type="file" name="file" id="formFile">
                                                        <input type="hidden" name="file_thumb" value="" id="formFile2">
                                                    </div>
                                                    <div class="col-md-3 cust-txt-input">
                                                        <div class="form-group">
                                                            <button type="button"
                                                                class="btn add_qualification_dtls  btn-outline-success btn-icon waves-effect waves-themed " style="margin-top: 2.3rem !important;"
                                                                id="add_qualification_dtls">
                                                                +
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <table class="table table-sm m-0 table-bordered">
                                                        <thead class="">
                                                            <tr class="table-heading">
                                                                <th>Exam Passed</th>
                                                                <th>Specialization</th>
                                                                <th>Board / University</th>
                                                                <th>Year of passing</th>
                                                                <th>Class / Division</th>
                                                                <th>% marks/ CGPA</th>
                                                                <th>Certificate</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="SupQuali">
                                                            @foreach ($SupervisorQualification as $value)
                                                            <tr>
                                                                <td>{{ $value->exam }}</td>
                                                                <td>{{ $value->specialization }}</td>
                                                                <td>{{ $value->board_university }}</td>
                                                                <td>{{ $value->year }}</td>
                                                                <td>{{ $value->division }}</td>
                                                                <td>{{ $value->percentage }}%</td>
                                                                <td><a href="javascript:void(0)"
                                                                        onclick="upload_image_view('/upload/supervisor/qualification/{{ $value->certificate }}')">
                                                                        View Upload File</a>
                                                                </td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field"
                                                                        onclick="delete_certificate({{ $value->id }}, {{ $value->sup_id }})" data-name = 'SupQuali'>Remove</button>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            
                                                        </tbody>
                                                        <tbody class="addnewrow">

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- <div class="row pxy-4  float-right" >
                                                     <input type="button"  class="next btn next-btn-style"  id="next1" style=''/>
                                                </div> -->
                                            </div>
                            
                                            <div class="tab">:
                                                <small id="" class="form-text text-muted">*Ph.D should be from a recognised institute</small>
                                                    <small id="" class="form-text text-muted">*If Ph.D from Foreign University, Please eclose an Equivalence certificate.</small>
                            
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"  for="phd_thesis"><b>Title of own Ph.D Thesis: <span class="error">*</span></b></label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="phd_thesis"  name="phd_thesis" class="form-control" placeholder = "Enter Thesis" value="{{$supervisors->phd_thesis}}" >
                                                        </div>
                                                    </div>
                            
                                                    <div class="panel-heading" style="color:#fff;background:#0a64a0 !important;"><b>Details of full time Employment: <span class="error">*</span></b></div>
                                                    <p style = "text-align: justify !important;"><b>(Attach self-attested photo Copies of the experience certificates from the employer.)</b></p>
                            
                                                    <div class="form-row" id="add_employment2">
                                                        
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"  for="employer_name"><b>Name:</b></label>      
                                                            <input type="text" id="employer_name" name="emp_name"  class="form-control" placeholder = "Enter Name" >
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                            
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"  for="employer_address"><b>Address:</b></label>
                                                            <input type="text" id="employer_address" name="emp_add"  class="form-control" placeholder = "Enter Address" >
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                                                        
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"  for="employer_designation"><b>Designation:</b></label>
                                                            <input type="text" id="employer_designation" name="emp_desig" class="form-control" placeholder = "Enter Designation" >
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>         
                                                        </div>
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"  for="pay_scale"><b>Pay Scale:</b></label>
                                                            <input type="text" id="pay_scale" name="emp_pay" class="form-control" placeholder = "Enter Pay Scale" >       
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"  for="date_from"><b>From:</b></label>
                                                            <input type="date" id="date_from" name="emp_frm" class="form-control" placeholder = "Enter Date From.">       
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                            
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"  for="date_upto"><b>To:</b></label>
                                                            <input type="date" id="date_upto" name="emp_to"  class="form-control" placeholder = "Enter Date Upto.">       
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                            
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"  for="employer_type"><b>Type:</b></label>
                                                            <select class="custom-select form-control" name="emp_type" id="employer_type">
                                                                <option  value="">Choose Type</option>
                                                                <option value="Full Time Regular">Full Time Regular</option>
                                                                <option value="Part Time">Part Time</option>
                                                                <option value="Contractual">Contractual</option>
                                                                <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"><b>Appointment Date:</b></label>
                                                            <input type="date" id="appointment_date" name="emp_appoint" class="form-control" placeholder = "Enter Appointment Order & Date.">       
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                            
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label" ><b>Experience Certificate:</b></label>
                                                            <input class="form-control" type="file" name="exp_certi" id="exp_certi">      
                                                            <input type="hidden" value="" name="exp_certi" id="exp_hid_certi">      
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                            
                                                        <div class="col-md-3 cust-txt-input">
                                                            <div class="form-group">
                                                                <button type="button"
                                                                    class="btn add_employment_dtls btn-outline-success btn-icon waves-effect waves-themed " style="margin-top: 2.3rem !important;"
                                                                    id="add_employment_dtls">
                                                                    +
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 cust-txt-input"></div>
                                                        <div class="col-md-3 cust-txt-input"></div>
                                                        <table class="table table-sm m-0 table-bordered">
                                                            <thead class="">
                                                                <tr class="table-heading">
                                                                    <th>Name</th>
                                                                    <th>Address</th>
                                                                    <th>Designation</th>
                                                                    <th>Pay Scale</th>
                                                                    <th>From</th>
                                                                    <th>To</th>
                                                                    <th>Type</th>
                                                                    <th>Appointment Date</th>
                                                                    <th>Experience Certificate</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="SupEmp">
                                                               
                                                                @foreach ($SupervisorEmployment as $value)
                                                                <tr>
                                                                    <td>{{ $value->name }}</td>
                                                                    <td>{{ $value->address }}</td>
                                                                    <td>{{ $value->designation }}</td>
                                                                    <td>{{ $value->pay_scale }}</td>
                                                                    <td>{{ $value->from }}</td>
                                                                    <td>{{ $value->to }}</td>
                                                                    <td>{{ $value->type }}</td>
                                                                    <td>{{ $value->appointment_date }}</td>
                                                                    <td><a href="javascript:void(0)"
                                                                            onclick="upload_image_view('/upload/phdsupervisor/{{ $value->employment_cerificate }}')">
                                                                            View Upload File</a>
                                                                    </td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field"
                                                                            onclick="delete_employment({{ $value->id }}, {{ $value->sup_id }})">Remove</button>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tbody class="addEmployeeRow">
                                                            </tbody>
                                                        </table>
                                                    </div>
                            
                                                    <small id="" class="form-text text-muted">*Enclose self attested copy of the appointment order and Experience Certificate.</small>
                                                
                                                    <div class="mb-2 row">
                                                        <label class="col-md-8 col-form-label"  for="full_time_total_exp"><b>Total Full-Time Experience in regular position in AICTE/UGC/Govt. recognised institution only (in years): <span class="error">*</span></b></label>
                                                        <div class="col-md-4">
                                                            <input type="text" id="full_time_total_exp"  name="full_time_total_exp" class="form-control" placeholder = "Enter Full Time experience in years" value="{{$supervisors->teaching_experience}}" >
                                                        </div>
                                                    </div>
                            
                                                    <div class="form-row" id="add_employment3">
                                                        <div class="col-md-4 cust-txt-input2">
                                                            <label class=" col-form-label"  for="teaching_exp"><b>Teaching experience (in years):<span class="error">*</span> </b></label>      
                                                            <input type="number" id="teaching_exp"  name="teaching_exp" class="form-control" placeholder = "Enter Teaching experience in years" value="{{$supervisors->teaching_experience}}" >
                                                        </div>
                                                        <div class="col-md-4 cust-txt-input2">
                                                            <label class=" col-form-label"  for="research_exp"><b>Research experience (in years): <span class="error">*</span></b></label>      
                                                            <input type="number" id="research_exp" name="research_exp" class="form-control" placeholder = "Enter Research experience in years" value="{{$supervisors->research_experience}}" >
                                                        </div>
                                                        <div class="col-md-4 cust-txt-input2">
                                                            <label class=" col-form-label"  for="phd_exp"><b>Post Ph.D experience (in years): <span class="error">*</span></b></label>      
                                                            <input type="number" id="phd_exp"  name="phd_exp" class="form-control" placeholder = "Enter Ph.D experience in years" value="{{$supervisors->post_phd_experience}}" >
                                                        </div>
                                                    </div>
                                                    
                                                    </br>
                                                    <div class="panel-heading" style="color:#fff;background:#0a64a0 !important;"><b>Publication in Journals during last five years (SCI/SCOPUS indexed / UGC listed journals): <span class="error">*</span></b></div>
                                                    </br>
                                                    <div class="mb-2 row">
                                                        <label class="col-md-3 col-form-label"  for="total_journals_paper"><b>Total Number of Papers in Journals:</b>
                                                        </label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="total_journals_paper"  name="total_journals_paper" class="form-control" placeholder = "Enter total journals paper" value="{{$supervisors->no_papers_journals}}" >
                                                        </div>
                                                    </div>
                                                    <p style = "text-align: justify !important;"><b>Provide details of best three publications (published / accepted)</b></p>
                                                    <small id="" class="form-text text-muted">(Attach the front page only)</small>
                                                
                                                    <div class="form-row add_best_three_publications" id="add_best_three_publications">
                                                        
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"  for="best_three_title_of_paper"><b>Title:</b></label>      
                                                            <input type="text" id="best_three_title_of_paper" class="form-control" name="pub_name" placeholder = "Enter title of paper" >
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                            
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"  for="best_three_paper_authors"><b>Author(s):</b></label>
                                                            <input type="text" id="best_three_paper_authors" name="pub_auth" class="form-control" placeholder = "Enter Author(s)" >
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                                                        
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"  for="best_three_journal_name"><b>Name of the Journal:</b></label>
                                                            <input type="text" id="best_three_journal_name" name="pub_jour" class="form-control" placeholder = "Enter name of the journal" >
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>      
                                                        </div>
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"  for="best_three_vol_year_page"><b>Vol,&Year,Page:</b></label>
                                                            <input type="text" id="best_three_vol_year_page" name="pub_vol" class="form-control" placeholder = "Enter volume,year and page" >       
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                            
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"  for="best_three_indexing"><b>Indexing:</b></label>
                                                            <input type="text" id="best_three_indexing" name="pub_index" class="form-control"  >       
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                            
                                                        <div class="col-md-4 cust-txt-input2">
                                                            <label class=" col-form-label" ><b>Upload front Page :</b></label>
                                                            <input type="file" class="form-control" name="journal_uplaod" id="journal_uplaod">       
                                                            <input type="hidden" value="" id="journal_uplaod_hid">       
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                                                        
                            
                                                        <div class="col-md-4 cust-txt-input2">
                                                            <div class="form-group">
                                                                <button type="button"
                                                                    class="btn add_best_three_publication_dtls btn-outline-success btn-icon waves-effect waves-themed " style="margin-top: 2.3rem !important;"
                                                                    id="add_best_three_publication_dtls">
                                                                    +
                                                                </button>
                                                            </div>
                                                        </div>
                            
                                                        <table class="table table-sm m-0 table-bordered">
                                                            <thead class="">
                                                                <tr class="table-heading">
                                                                    <th>Title</th>
                                                                    <th>Author(s)</th>
                                                                    <th>Name of Journals</th>
                                                                    <th>vol,year&Page</th>
                                                                    <th>Indexing</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="SupPub">
                                                                @foreach ($PublicationJournals as $value)
                                                                    <tr>
                                                                        <td>{{$value->title}}</td>
                                                                        <td>{{$value->author}}</td>
                                                                        <td>{{$value->name_of_journal}}</td>
                                                                        <td>{{$value->vol_year_page}}</td>
                                                                        <td>{{$value->indexing}}</td>
                                                                        <td>
                                                                            <a href="javascript:void(0)"
                                                                            onclick="upload_image_view('/upload/supervisor_publish/{{ $value->frontpage_cover }}')">
                                                                            View Upload File</a>
                                                                       </td>
                                                                    <td>
                                                                        <button type="button"
                                                                            class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field"
                                                                            onclick="delete_publication({{ $value->id }}, {{ $value->sup_id }})">Remove</button>
                                                                    </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tbody class="add3PubRow">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    </br>
                                                    <div class="panel-heading" style="color:#fff;background:#0a64a0 !important;"><b>Details of the publication in Journals during last five years (SCI / SCOPUS indexed Journals as First / Corresponding Author): <span class="error">*</span></b></div>
                                                    <p style = "text-align: justify !important;"><b>Provide details of at least one publication (published / accepted) as the First / Corresponding Author and attach one photo copy of the full paper.</b></p>
                            
                                                    <div class="form-row" id="add_atleast_one_publications">
                                                        
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"  for="atleast_one_title_of_paper"><b>Title:</b></label>      
                                                            <input type="text" id="atleast_one_title_of_paper" name="det_title" class="form-control" placeholder = "Enter title of paper" >
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                            
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"  for="atleast_one_paper_authors"><b>Author(s):</b></label>
                                                            <input type="text" id="atleast_one_paper_authors" class="form-control" name="author_name" placeholder = "Enter Author(s)" >
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                                                        
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"  for="atleast_one_journal_name"><b>Name of the Journal:</b></label>
                                                            <input type="text" id="atleast_one_journal_name" class="form-control" placeholder = "Enter name of the journal" name="jour_name" >
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>         
                                                        </div>
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"  for="atleast_one_vol_year_page"><b>Vol,&Year,Page:</b></label>
                                                            <input type="text" id="atleast_one_vol_year_page" class="form-control" placeholder = "Enter volume,year and page" name="vol_type" >       
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                            
                                                        <div class="col-md-3 cust-txt-input">
                                                            <label class=" col-form-label"  for="atleast_one_indexing"><b>Indexing:</b></label>
                                                            <input type="text" id="atleast_one_indexing" class="form-control" name="index_name"  >       
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                            
                                                        <div class="col-md-3 cust-txt-input2">
                                                            <label class=" col-form-label" ><b>Upload pdf :</b></label>
                                                            <input type="file" class="form-control" name="journal_pdf" id="journal_pdf">       
                                                            <input type="hidden" value="" id="journal_pdf_hid">       
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                                                        
                            
                                                        <div class="col-md-3 cust-txt-input">
                                                            <div class="form-group">
                                                                <button type="button"
                                                                    class="btn add_atleast_one_publication_dtls btn-outline-success btn-icon waves-effect waves-themed " style="margin-top: 2.3rem !important;"
                                                                    id="add_atleast_one_publication_dtls">
                                                                    +
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 cust-txt-input"></div>
                                                        <table class="table table-sm m-0 table-bordered">
                                                            <thead class="">
                                                                <tr class="table-heading">
                                                                    <th>Title</th>
                                                                    <th>Author(s)</th>
                                                                    <th>Name of Journals</th>
                                                                    <th>vol,year&Page</th>
                                                                    <th>Indexing</th>
                                                                    {{-- <th>Pulication Details File</th> --}}
                                                                </tr>
                                                            </thead>
                                                            <tbody class="SupDetailPub">
                                                                @foreach ($DetailsPublicationJournals as $value)
                                                                <tr>
                                                                    <td>{{$value->title}}</td>
                                                                    <td>{{$value->author}}</td>
                                                                    <td>{{$value->name_of_journal}}</td>
                                                                    <td>{{$value->vol_year_page}}</td>
                                                                    <td>{{$value->indexing}}</td>
                                                                    <td><a href="javascript:void(0)"
                                                                        onclick="upload_image_view('/upload/supervisor_publish/{{ $value->book_cover }}')">
                                                                        View Upload File</a>
                                                                </td>
                                                                <td>
                                                                    <button type="button"
                                                                        class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field"
                                                                        onclick="delete_pub_detail({{ $value->id }}, {{ $value->sup_id }})">Remove</button>
                                                                </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                            <tbody class="add1PubRow">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    </br>
                                                    <!-- <div class="row pxy-4 button-end-style">
                                                        <input type="button"  class="previous btn prev-btn-style"  id="previous1" style=''/>
                                                        <input type="button"  class="next btn next-btn-style"  id="next2" style=''/>
                                                    </div> -->
                                            </div>
                            
                                            <div class="tab">
                                                <div class="panel-heading" style="color:#fff;background:#0a64a0 !important;"><b>Details of Ph.D Students presently supervising: <span class="error">*</span></b></div>
                                                    </br>
                                                    <div class="mb-2 row">
                                                        <label class="col-md-2 col-form-label"  for="phd_total_number"><b>Total Number:</b></label>
                                                        <div class="col-md-10">
                                                            <input type="number" id="phd_total_number"  name="phd_total_number" class="form-control" placeholder = "Enter total number" value="{{$DetailsOfSupervisor->tot_no_supervising}}" >
                                                        </div>
                                                    </div>
                            
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"  for="as_supervisor"><b>As Supervisor:</b></label>
                                                                <div class="col-md-7">
                                                                <input type="number" id="as_supervisor"  name="as_supervisor" class="form-control" placeholder = "Enter number as supervisor" value="{{$DetailsOfSupervisor->no_as_supervisor}}" > nos.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"  for="as_cosupervisor"><b>As Co-Supervisor:</b></label>
                                                                <div class="col-md-8">
                                                                    <input type="number" id="as_cosupervisor" name="as_cosupervisor" class="form-control" placeholder = "Enter number as co-supervisor" value="{{$DetailsOfSupervisor->no_as_cosupervisor}}" > nos.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                            
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"  for="as_unreserved"><b>Unreserved (UR):</b></label>
                                                                <div class="col-md-7">
                                                                <input type="number" id="as_unreserved"  name="as_unreserved" class="form-control" placeholder = "Enter number as Unreserved" value="{{$DetailsOfSupervisor->unreserved}}" > nos.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"  for="as_st_sc"><b>ST/SC:</b></label>
                                                                <div class="col-md-8">
                                                                    <input type="number" id="as_st_sc"  name="as_st_sc" class="form-control" placeholder = "Enter number as ST/SC" value="{{$DetailsOfSupervisor->sc_st}}" > nos.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"  for="as_differently_abled"><b>Differently Abled:</b></label>
                                                                <div class="col-md-7">
                                                                    <input type="number" id="as_differently_abled"  name="as_differently_abled" class="form-control" placeholder = "Enter number as Differently Abled" value="{{$DetailsOfSupervisor->differently_abled}}" > nos.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                            
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"  for="as_national_test_qualified"><b>National Test Qualified:</b></label>
                                                                <div class="col-md-7">
                                                                <input type="text" id="as_national_test_qualified"  name="as_national_test_qualified" class="form-control" placeholder = "Enter number as national test " value="{{$DetailsOfSupervisor->test_qualified}}" > nos.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <div class="mb-2 row">
                                                                <label class="col-md-4 col-form-label"  for="as_anyother"><b>Any Other:</b></label>
                                                                <div class="col-md-8">
                                                                    <input type="number" id="as_anyother"  name="as_anyother" class="form-control" placeholder = "Enter number if any other" value="{{$DetailsOfSupervisor->other}}" > nos.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                            
                                                    <p style = "text-align: justify !important;"><b>*GATE/ UGC-NET /CAT /SLET /QIP/FIP/ NDP/ UGC-CSIR NET/ GPAT or other similar national tests</b></p>
                                                    </br>
                                                    <small id="" class="form-text text-muted">Copy of the University/Institute notification to be enclosed in this Tabular format)</small>
                            
                                                    <div class="form-row" id="add_phd_students">
                                                        
                                                        <div class="col-md-4 cust-txt-input2">
                                                            <label class=" col-form-label"  for="phd_student_name"><b>Name of the student:</b></label>      
                                                            <input type="text" id="phd_student_name" name="oth_name" class="form-control" placeholder = "Enter PhD student name" >
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                            
                                                        <div class="col-md-4 cust-txt-input2">
                                                            <label class=" col-form-label"  for="phd_select_sup_cosup"><b>Supervisor/CoSupervisor:</b></label>
                                                            <input type="text" id="phd_select_sup_cosup" name="oth_sup" class="form-control" placeholder = "Enter Role" >
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                                                        
                                                        <div class="col-md-4 cust-txt-input2">
                                                            <label class=" col-form-label"  for="phd_regdno_enrol_status"><b>University Regd.No. /Enrolment No. & Present Status (Continuing/Submitted):</b></label>
                                                            <input type="text" id="phd_regdno_enrol_status" name="oth_status" class="form-control" placeholder = "Enter Regd. no./ Enrollment No/ Status" >
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>        
                                                        </div>
                                                        <div class="col-md-4 cust-txt-input2">
                                                            <label class=" col-form-label"  for="phd_university_name"><b>Name of the University:</b></label>
                                                            <input type="text" id="phd_university_name" name="oth_uni" class="form-control" placeholder = "Enter name of the university" >       
                                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                                        </div>
                                                        <div class="col-md-4 cust-txt-input2">
                                                            <div class="form-group">
                                                                <button type="button"
                                                                    class="btn add_phd_students_dtls btn-outline-success btn-icon waves-effect waves-themed " style="margin-top: 2.3rem !important;"
                                                                    id="add_phd_students_dtls">
                                                                    +
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 cust-txt-input2"></div>
                                                        <table class="table table-sm m-0 table-bordered">
                                                            <thead class="">
                                                                <tr class="table-heading">
                                                                    <th>Name of the student</th>
                                                                    <th>Supervisor/Co-Supervisor</th>
                                                                    <th>University Regd.No. /Enrolment No. & Present Status</th>
                                                                    <th>Name of the University:</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="SupOther">
                                                                @foreach ($OtherSimilarTest as $value)
                                                                    <tr>
                                                                        <td>{{$value->student_name}}</td>
                                                                        <td>{{$value->supervisor_cosupervisor}}</td>
                                                                        <td>{{$value->university_regd_no}}</td>
                                                                        <td>{{$value->university_name}}</td>
                                                                        <td><button type="button"
                                                                            class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field"
                                                                            onclick="delete_other_test({{ $value->id }}, {{ $value->sup_id }})">Remove</button></td>
                                                                    </tr>   
                                                                @endforeach
                                                            </tbody>
                                                            <tbody class="addPhdStudentRow">
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    </br>
                                                    
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"  for="area_research_work"><b>Area of Proposed Research work:</b></label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control" id="area_research_work" rows="5" name="area_research_work">{{$DetailsOfSupervisor->area_of_proposed_research}}</textarea>
                                                        </div>
                                                    </div>
                            
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label" for="debarred_action"><b>Have you ever been debarred from supervising from any university:</b></label>
                                                        <div class="col-md-8">
                                                            <select class="custom-select form-control" id="debarred_action" name="debarred_action">
                                                                <option value="" >Choose Action Type</option>
                                                                <option value="YES" {{ $DetailsOfSupervisor->debarred_from_university == 'YES' ? 'selected' : '' }}>YES</option>
                                                                <option value="NO" {{ $DetailsOfSupervisor->debarred_from_university == 'NO' ? 'selected' : '' }}>NO</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <small id="" class="form-text text-muted">If yes, give reasons and attach the documents detail.</small>
                                                    </br>
                            
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"  for="any_other_relevant_info"><b>Any other relevant information (if any):</b></label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control" id="any_other_relevant_info" rows="5" name="any_other_relevant_info">{{$DetailsOfSupervisor->other_relevant_information}}</textarea>
                                                        </div>
                                                    </div>
                            
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"  for="email"><b>Mail ID of the Head of the Institute: <span class="error">*</span></b></label>
                                                        <div class="col-md-8">
                                                            <input type="email" id="email"  name="mailid_head_institute" class="form-control" placeholder = "Enter mail id of the institute" value="{{$DetailsOfSupervisor->mail_id_head}}">
                                                            
                                                        </div>
                                                    </div>
                                                    <!-- <div class="mb-2 row">
                                                        <label class="col-md-4" for="file"><b class="">Upload Employer Certificate</b></label>
                                                        <div class="col-md-8">
                                                            <input type="file" id="file" name="employee_certificate_file" multiple>
                                                        </div>
                                                    </div> -->
                            
                                                    <div class="form-row" id="add_employment">
                                                        <div class="col">
                                                            <label class="" for="file"><b class="">Upload Employer Certificate <span class="error">*</span></b></label>      
                                                            <input type="file" id="file" name="employee_certificate_file" multiple>
                                                            <input type="hidden" id="employee_hid_certificate" name="employee_hid_certificate" value="{{$supervisors->employer_certificate}}" >
                                                            <p><a href="javascript:void(0)"
                                                                onclick="upload_image_view('/upload/employee_certificate/{{ $supervisors->employer_certificate }}')">
                                                                View Upload File</a>

                                                            </p>
                                                            
                                                        </div>
                                                        <!-- <div class="col">
                                                        </div> -->
                                                        <div class="col">
                                                            <p class="" style="text-align: inherit !important;"> 
                                                                <span class="mytooltip tooltip-effect-1"> 
                                                                    <span class="tooltip-item">Sample Employer Certificate</span> 
                                                                    <span class="tooltip-content clearfix"> 
                                                                        <img src="{{asset('image/certificate_sample.png')}}"> 
                                                                    </span> 
                                                                </span> 
                                                            </p> 
                                                        </div>
                                                    </div>
                            
                                                    <!-- <div class="">
                                                        <p class="" style="text-align: inherit !important;"> 
                                                            <span class="mytooltip tooltip-effect-1"> 
                                                                <span class="tooltip-item">Sample Employer Certificate</span> 
                                                                <span class="tooltip-content clearfix"> 
                                                                    <img src="{{asset('image/certificate_sample.png')}}"> 
                                                                </span> 
                                                            </span> 
                                                        </p>
                                                    </div> -->
                            
                                                    <div class="form-row">
                                                        <div class="col">
                                                                <label class="" for="file"><b class="">Upload your photo <span class="error">*</span></b></label>      
                                                                <input type="file" id="file" name="upload_photo_file" multiple>
                                                                <input type="hidden" id="upload_hid_photo" name="upload_hid_photo" value="{{$supervisors->photo}}" >
                                                                <p><a href="javascript:void(0)"
                                                                    onclick="upload_image_view('/upload/employee_photo/{{ $supervisors->photo }}')">
                                                                    View Upload File</a></p>
                                                                
                                                            </div>
                                                    
                                                    </div>
                            
                                                    
                            
                                                    <div>
                                                        <h2 style="text-align: center;margin-top: 4rem !important;font-size: 1.3rem !important;"><b>DECLARATION</b></h2>
                                                        <p style = "text-align: justify !important;"><input type="checkbox" name="" id="" checked required><b>I hereby, solemnly declare that the information furnished in this application are true and correct to the best of my knowledge and belief. If at any time, I am found to have concealed/ supressed a material/ information or given any false details, the University shall have every right to take action against me for which I shall have no objection.</b></p>
                                                        </br>
                            
                                                        <div class="row">
                                                            <div class="col-lg">
                                                                <small id="" class="form-text text-muted"><b>Date:{{date('d-m-Y')}}</b></small>
                                                                <small id="" class="form-text text-muted"><b>Place:</b></small>
                                                            </div>
                                                            <div class="col-lg">
                                                            </div>
                                                            <div class="col-lg">
                                                            </div>
                                                            <div class="col-lg">
                                                                <small id="" class="form-text text-muted"><b>Signature of Applicant with date:</b></small>
                                                                <small id="" class="form-text text-muted"><b>(Name,Designation and Affiliation address)</b></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="row pxy-4 button-end-style">
                                                        <input type="button"  class="previous btn prev-btn-style"  id="previous2" style=''/>
                                                        <input type="submit"  class="submit btn submit-btn-style"  id="next3" style=''/>
                                                    </div> -->
                                            </div>
                                            
                                            <div class="input_wrap preview_form">
                                                <div class="row"></div>
                                                <div class="border border-primary"></div>
                                                <div class="row"></div>
                                                <div style="float:right; margin-top: 5px;">
                                                    {{-- <button type="button" class="previous">back</button> --}}
                                                    
                                                    <button type="submit" class="btn btn-success waves-effect waves-themed float-right">Save As Draft</button>
                                                    <a type="button" href="{{route('sup.preview',[$id])}}" class="btn btn-success waves-effect waves-themed float-right">preview</a>
                                                </div>
                                            </div>
                                            
                                            <div >
                                                
                                            </div>
                                            {{-- <div style="text-align:center;margin-top:40px;">
                                                <span class="step">1</span>
                                                <span class="step">2</span>
                                                <span class="step">3</span>
                                            </div> --}}
                                           
                                        </form>


                                    </div>
                                </div>
                                    
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>                   <!-- end row -->    
      
    {{-- <button  type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#scrollable-modal">Scrollable Modal</button> --}}

{{-- <div class="modal fade" id="upload_image_view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" id="view_upload_image">
                   
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}

<div class="modal fade" id="upload_image_view" tabindex="-1" role="dialog"
                                            aria-labelledby="scrollableModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="scrollableModalTitle">Modal title</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row" id="view_upload_image">
                                                            {{-- <img src="" alt="Upload_img" class="img-responsive card-img-top" id="view_upload_image">
                                                            <embed src="" frameborder="0" width="100%" id="view_upload_image" height="400px"> --}}
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->  

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
            


            
@endsection

            


@section('js')


<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/additional-methods.js"></script>
{{-- <script>
    (function ( $ ) {
  $.fn.multiStepForm = function(args) {
      if(args === null || typeof args !== 'object' || $.isArray(args))
        throw  " : Called with Invalid argument";
      var form = this;
      var tabs = form.find('.tab');
      var steps = form.find('.step');
      steps.each(function(i, e){
        $(e).on('click', function(ev){
        });
      });
      form.navigateTo = function (i) {/*index*/
        /*Mark the current section with the class 'current'*/
        tabs.removeClass('current').eq(i).addClass('current');
        // Show only the navigation buttons that make sense for the current section:
        form.find('.previous').toggle(i > 0);
        atTheEnd = i >= tabs.length - 1;
        form.find('.next').toggle(!atTheEnd);
        // console.log('atTheEnd='+atTheEnd);
        form.find('.submit').toggle(atTheEnd);
        fixStepIndicator(curIndex());
        return form;
      }
      function curIndex() {
        /*Return the current index by looking at which section has the class 'current'*/
        return tabs.index(tabs.filter('.current'));
      }
      function fixStepIndicator(n) {
        steps.each(function(i, e){
          i == n ? $(e).addClass('active') : $(e).removeClass('active');
        });
      }
      /* Previous button is easy, just go back */
      form.find('.previous').click(function() {
        form.navigateTo(curIndex() - 1);
      });

      /* Next button goes forward iff current block validates */
      form.find('.next').click(function() {
        if('validations' in args && typeof args.validations === 'object' && !$.isArray(args.validations)){
          if(!('noValidate' in args) || (typeof args.noValidate === 'boolean' && !args.noValidate)){
            form.validate(args.validations);
            if(form.valid() == true){
              form.navigateTo(curIndex() + 1);
              return true;
            }
            return false;
          }
        }
        form.navigateTo(curIndex() + 1);
      });
      
      form.find('.submit').on('click', function(e){
        if(typeof args.beforeSubmit !== 'undefined' && typeof args.beforeSubmit !== 'function')
          args.beforeSubmit(form, this);
        /*check if args.submit is set false if not then form.submit is not gonna run, if not set then will run by default*/        
        if(typeof args.submit === 'undefined' || (typeof args.submit === 'boolean' && args.submit)){
          form.submit();
        }
        return form;
      });
      /*By default navigate to the tab 0, if it is being set using defaultStep property*/
      typeof args.defaultStep === 'number' ? form.navigateTo(args.defaultStep) : null;

      form.noValidate = function() {
        
      }
      return form;
  };
}( jQuery ));
</script> --}}
<script class="" type="text/javascript">
    //add qualification details
    var count = 1;
    var counter = 0;
    $(document).ready(function(){
        $('.add_qualification_dtls').click(function(e){
            //alert('hello');
            e.preventDefault();
            var qualification_field = $('#qualification_field').val();
            var specialization = $('#specialization').val();
            var board_university = $('#board_university').val();
            var passing_year = $('#passing_year').val();
            var division = $('#division').val();
            var percentage_cgpa = $('#percentage_cgpa').val();
            var formFile2 = $('#formFile2').val();
            if(qualification_field == '' && passing_year == ''){
                $('.prs_name').html('Field is required.');
            }
            
            if (qualification_field != '' && passing_year != ''){
                var newRow = '<tr>' +
                        '<td>' + qualification_field+'<input type ="hidden" name= "qualification_field[]" value="' +
                        qualification_field + '"></td>' +
                        '<td>' + specialization + '<input type ="hidden" name= "specialization[]" value="' +
                        specialization + '"></td>' +
                        '<td>' + board_university +'<input type ="hidden" name= "board_university[]" value="' +
                        board_university + '"></td>' +
                        '<td>' + passing_year + '<input type ="hidden" name= "passing_year[]" value="' +
                        passing_year + '"></td>' +
                        '<td>' + division + '<input type ="hidden" name= "division[]" value="' +
                        division + '"></td>' +
                        '<td>' + percentage_cgpa + '<input type ="hidden" name= "percentage_cgpa[]" value="' +
                        percentage_cgpa + '"></td>' +
                        '<td> <a href="javascript:void(0);" onclick="upload_image_view(' +
                                "'/upload/supervisor/qualification/" +
                                formFile2 + "'" + ');" >View Upload File</a><input type="hidden" name="formFile_hid[]" value="' +
                formFile2 + '"> </td>' +
                        '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                        counter + '">Remove</button></td></tr>';
                        
            $('.addnewrow').append(newRow);
            count++;
            counter++;
            }
        });

        $(".addnewrow").on("click", ".remove_field", function(e) {
                $(this).parent('td').parent('tr').remove();
                counter--;
                count--;
            });
    });

    //add employment details
    var countEmpRow = 1;
    var counterEmpRow = 0;
    $(document).ready(function(){
        $('.add_employment_dtls').click(function(e){
            e.preventDefault();
            var employer_name        = $('#employer_name').val();
            var employer_address     = $('#employer_address').val();
            var employer_designation = $('#employer_designation').val();
            var pay_scale            = $('#pay_scale').val();
            var date_from            = $('#date_from').val();
            var date_upto            = $('#date_upto').val();
            var employer_type        = $('#employer_type').val();
            var appointment_date     = $('#appointment_date').val();
            var exp_hid_certi        = $('#exp_hid_certi').val();
            if(employer_name == '' || employer_designation == '' || pay_scale == '' || date_from == '' || date_upto == '' || employer_type == '' || appointment_date == ''){
                $('.prs_name').html('Field is required.');
            }

            if (employer_name != '' && pay_scale != '' && employer_designation != '' && date_from != '' && date_upto != '' && appointment_date != ''){
                var newRow = '<tr>' +
                        '<td>' + employer_name +'<input type ="hidden" value="' +
                            employer_name + '" name= "employer_name[]">'  + '</td>' +
                        '<td>' + employer_address +'<input type ="hidden" value="' +
                            employer_address + '" name= "employer_address[]">'  + '</td>' +
                        '<td>' + employer_designation +'<input type ="hidden" value="' +
                            employer_designation + '" name= "employer_designation[]">'  + '</td>' +
                        '<td>' + pay_scale +'<input type ="hidden" value="' +
                            pay_scale + '" name= "pay_scale[]">'  + '</td>' +
                        '<td>' + date_from +'<input type ="hidden" value="' +
                            date_from + '" name= "date_from[]">'  + '</td>' +
                        '<td>' + date_upto +'<input type ="hidden" value="' +
                            date_upto + '" name= "date_upto[]">'  + '</td>' +
                        '<td>' + employer_type +'<input type ="hidden" value="' +
                            employer_type + '" name= "employer_type[]">'  + '</td>' +
                        '<td>' + appointment_date +'<input type ="hidden" value="' +
                            appointment_date + '" name= "appointment_date[]">'  + '</td>' +
                            '<td> <a href="javascript:void(0);" onclick="upload_image_view(' +
                                "'/upload/phdsupervisor/" +
                                exp_hid_certi + "'" + ');" >View Upload File</a><input type="hidden" name="exp_hid_certi[]" value="' +
                                exp_hid_certi + '"> </td>' +
                        '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                        counterEmpRow + '">Remove</button></td></tr>';
                $('.addEmployeeRow').append(newRow);
                countEmpRow++;
                counterEmpRow++;
            }
        });

        $(".addEmployeeRow").on("click", ".remove_field", function(e) {
                $(this).parent('td').parent('tr').remove();
                counterEmpRow--;
                countEmpRow--;
            });
    });

    //add best three publication details
    var count3PubRow = 1;
    var counter3PubRow = 0;
    $(document).ready(function(){
        $('.add_best_three_publication_dtls').click(function(e){
            e.preventDefault();
            var best_three_title_of_paper   = $('#best_three_title_of_paper').val();
            var best_three_paper_authors    = $('#best_three_paper_authors').val();
            var best_three_journal_name     = $('#best_three_journal_name').val();
            var best_three_vol_year_page    = $('#best_three_vol_year_page').val();
            var best_three_indexing         = $('#best_three_indexing').val();
            var journal_uplaod_hid          = $('#journal_uplaod_hid').val();
            if(best_three_title_of_paper == '' || best_three_paper_authors == '' || best_three_journal_name == '' || best_three_vol_year_page == '' || best_three_indexing == ''){
                $('.prs_name').html('Field is required.');
            }

            if (best_three_title_of_paper != '' && best_three_paper_authors != '' && best_three_journal_name != '' && best_three_vol_year_page != '' && best_three_indexing != ''){
                var newRow = '<tr>' +
                        '<td>' + best_three_title_of_paper +'<input type ="hidden" value="'+best_three_title_of_paper  +'" name= "best_three_title_of_paper[]">'  +  '</td>' +
                        '<td>' + best_three_paper_authors +'<input type ="hidden" value="'+ best_three_paper_authors +'" name= "best_three_paper_authors[]">'  +  '</td>' +
                        '<td>' + best_three_journal_name +'<input type ="hidden" value="'+ best_three_journal_name +'" name= "best_three_journal_name[]">'  +  '</td>' +
                        '<td>' + best_three_vol_year_page +'<input type ="hidden" value="'+ best_three_vol_year_page +'" name= "best_three_vol_year_page[]">'  +  '</td>' +
                        '<td>' + best_three_indexing +'<input type ="hidden" value="'+best_three_indexing  +'" name= "best_three_indexing[]">'  + '</td>' +
                        '<td> <a href="javascript:void(0);" onclick="upload_image_view(' +
                                "'/upload/supervisor_publish/" +
                                journal_uplaod_hid + "'" + ');" >View Upload File</a><input type="hidden" name="journal_uplaod_hid[]" value="' +
                                journal_uplaod_hid + '"> </td>' +
                        '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                        counter3PubRow + '">Remove</button></td></tr>';
            $('.add3PubRow').append(newRow);
            count3PubRow++;
            counter3PubRow++;
            }
        });

        $(".add3PubRow").on("click", ".remove_field", function(e) {
                $(this).parent('td').parent('tr').remove();
                counter3PubRow--;
                count3PubRow--;
            });
    });

    //add atleast one  publication details
    var count1PubRow = 1;
    var counter1PubRow = 0;
    
    $(document).ready(function(){
        $('.add_atleast_one_publication_dtls').click(function(e){
            //alert('das');
            e.preventDefault();
            var atleast_one_title_of_paper = $('#atleast_one_title_of_paper').val();
            var atleast_one_paper_authors  = $('#atleast_one_paper_authors').val();
            var atleast_one_journal_name   = $('#atleast_one_journal_name').val();
            var atleast_one_vol_year_page  = $('#atleast_one_vol_year_page').val();
            var atleast_one_indexing       = $('#atleast_one_indexing').val();
            var journal_pdf_hid            = $('#journal_pdf_hid').val();
            if(atleast_one_title_of_paper == '' || atleast_one_paper_authors == '' || atleast_one_journal_name == '' || atleast_one_vol_year_page == '' || atleast_one_indexing == ''){
                $('.prs_name').html('Field is required.');
            }
            
            if (atleast_one_title_of_paper != '' && atleast_one_paper_authors != '' && atleast_one_journal_name != '' && atleast_one_vol_year_page != '' && atleast_one_indexing != ''){
                var newRow = '<tr>' +
                        '<td>' + atleast_one_title_of_paper +'<input type ="hidden" value="'+atleast_one_title_of_paper  +'" name= "atleast_one_title_of_paper[]">'  +  '</td>' +
                        '<td>' + atleast_one_paper_authors +'<input type ="hidden" value="'+ atleast_one_paper_authors +'" name= "atleast_one_paper_authors[]">'  +  '</td>' +
                        '<td>' + atleast_one_journal_name +'<input type ="hidden" value="'+ atleast_one_journal_name +'" name= "atleast_one_journal_name[]">'  +  '</td>' +
                        '<td>' + atleast_one_vol_year_page +'<input type ="hidden" value="'+ atleast_one_vol_year_page +'" name= "atleast_one_vol_year_page[]">'  +  '</td>' +
                        '<td>' + atleast_one_indexing +'<input type ="hidden" value="'+atleast_one_indexing  +'" name= "atleast_one_indexing[]">'  + '</td>' +
                        '<td> <a href="javascript:void(0);" onclick="upload_image_view(' +
                                "'/upload/supervisor_publish/" +
                                journal_pdf_hid + "'" + ');" >View Upload File</a><input type="hidden" name="journal_pdf_hid[]" value="' +
                                journal_pdf_hid + '"> </td>' +
                        '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                        counter3PubRow + '">Remove</button></td></tr>';
            $('.add1PubRow').append(newRow);
            
            count1PubRow++;
            counter1PubRow++;
            }
        });

        $(".add1PubRow").on("click", ".remove_field", function(e) {
                $(this).parent('td').parent('tr').remove();
                counter1PubRow--;
                count1PubRow--;
            });
    });

    //add phd students details
    var countPhdStudentsRow = 1;
    var counterPhdStudentsRow = 0;
    $(document).ready(function(){
        $('.add_phd_students_dtls').click(function(e){
            e.preventDefault();
            var phd_student_name = $('#phd_student_name').val();
            var phd_select_sup_cosup = $('#phd_select_sup_cosup').val();
            var phd_regdno_enrol_status = $('#phd_regdno_enrol_status').val();
            var phd_university_name = $('#phd_university_name').val();
            if(phd_student_name == '' || phd_select_sup_cosup == '' || phd_regdno_enrol_status == '' || phd_university_name == '' ){
                $('.prs_name').html('Field is required.');
            }

            if (phd_student_name != '' && phd_select_sup_cosup != '' && phd_regdno_enrol_status != '' && phd_university_name != ''){
                var newRow = '<tr>' +
                        '<td>' + phd_student_name +'<input type ="hidden" value="'+ phd_student_name +'" name= "phd_student_name[]">'  + '</td>' +
                        '<td>' + phd_select_sup_cosup +'<input type ="hidden" value="'+ phd_select_sup_cosup +'" name= "phd_select_sup_cosup[]">'  + '</td>' +
                        '<td>' + phd_regdno_enrol_status +'<input type ="hidden" value="'+ phd_regdno_enrol_status +'" name= "phd_regdno_enrol_status[]">'  + '</td>' +
                        '<td>' + phd_university_name +'<input type ="hidden" value="'+ phd_university_name +'" name= "phd_university_name[]">'  + '</td>' +
                        '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                        counterPhdStudentsRow + '">Remove</button></td></tr>';
            $('.addPhdStudentRow').append(newRow);
            countPhdStudentsRow++;
            counterPhdStudentsRow++;
            }
        });

        $(".addPhdStudentRow").on("click", ".remove_field", function(e) {
                $(this).parent('td').parent('tr').remove();
                counterPhdStudentsRow--;
                countPhdStudentsRow--;
            });
    });
</script>

<script type="text/javascript">
		$(document).ready(function(){
			
			$.validator.addMethod('username', function(value, element, param) {
				var nameRegex = /^[a-zA-Z0-9]+$/;
				return value.match(nameRegex);
			}, 'Only a-z, A-Z, 0-9 characters are allowed');

			var val	=	{
			    // Specify validation rules
			    rules: {
                    faculty: "required",
                    full_name: "required",
                    organisation: "required",
                    nature_of_appointment: "required",
                    date_of_birth: "required",
                    age: "required",
                    marital_status: "required",
                    gender: "required",
                    permanent_address: "required",
                    correspondance_address: "required",
                    natinality: "required",
                    aadhar_card_number: "required",
                    discipline_specialization: "required",
                    exam_pass: "required",
                    qual_spec: "required",
                    qua_board: "required",
                    qua_year: "required",
                    qua_divi: "required",
                    qua_marks: "required",
                    phd_thesis: "required",
                    emp_name: "required",
                    emp_add: "required",
                    emp_desig: "required",
                    emp_pay: "required",
                    emp_frm : 'required',
                    emp_to : 'required',
                    emp_type : 'required',
                    emp_appoint : 'required',
                    full_time_total_exp : 'required',
                    teaching_exp : 'required',
                    research_exp : 'required',
                    phd_exp : 'required',
                    total_journals_paper : 'required',
                    pub_name : 'required',
                    pub_auth : 'required',
                    pub_jour : 'required',
                    pub_vol : 'required',
                    pub_index : 'required',
                    phd_total_number : 'required',
                    as_supervisor : 'required',
                    as_cosupervisor : 'required',
                    as_unreserved : 'required',
                    as_st_sc : 'required',
                    as_differently_abled : 'required',
                    as_national_test_qualified : 'required',
                    as_anyother : 'required',
                    oth_name : 'required',
                    oth_sup : 'required',
                    oth_status : 'required',
                    oth_uni: 'required',
                    area_research_work : 'required',
                    debarred_action : 'required',
                    any_other_relevant_info : 'required',
                    det_title : 'required',
                    author_name : 'required',
                    jour_name : 'required',
                    vol_type : 'required',
                    index_name : 'required',
                    employee_certificate_file: {
                        required: false,
                         extension: "jpg|pdf|png|jpeg"

                    },

                    upload_photo_file: {
                        required: false,
                        extension: "jpg|pdf|png|jpeg"

                    }

			    },
			    // Specify validation error messages
                messages: {
					faculty: "faculty name is required",
                    full_name: "Full name is required",
                    organisation: "Organisation is required",
                    nature_of_appointment: "required",
                    date_of_birth: "Date of birth is required",
                    age: "Age is required",
                    marital_status: "Marital status required",
                    gender: "gender is required",
                    permanent_address: "Address is required",
                    correspondance_address: "required",
                    natinality: "Nationality required",
                    aadhar_card_number: "Aadhar card is required",
                    discipline_specialization: "disipline required",
                    exam_pass: "qualification is required",
                    qual_spec: "specialization required",
                    qua_board: "University required",
                    qua_year: "passing year required",
                    qua_divi: "Dividion required",
                    qua_marks: "CGPA/% required",
                    phd_thesis: "required",
                    emp_name: "Employer name required",
                    emp_add: "Employer address required",
                    emp_desig: "Emp[loyer designation required",
                    emp_pay: "required",
                    emp_frm : 'required',
                    emp_to : 'required',
                    emp_type : 'required',
                    emp_appoint : 'required',
                    full_time_total_exp : 'required',
                    teaching_exp : 'required',
                    research_exp : 'required',
                    phd_exp : 'required',
                    total_journals_paper : 'required',
                    pub_name : 'required',
                    pub_auth : 'required',
                    pub_jour : 'required',
                    pub_vol : 'required',
                    pub_index : 'required',
                    phd_total_number : 'required',
                    as_supervisor : 'required',
                    as_cosupervisor : 'required',
                    as_unreserved : 'required',
                    as_st_sc : 'required',
                    as_differently_abled : 'required',
                    as_national_test_qualified : 'required',
                    as_anyother : 'required',
                    oth_name : 'required',
                    oth_sup : 'required',
                    oth_status : 'required',
                    oth_uni: 'required',
                    area_research_work : 'required',
                    debarred_action : 'required',
                    any_other_relevant_info : 'required',
                    employee_certificate_file : 'required',
                    upload_photo_file: 'required'
                    
					
			    }
			}
			$("#myForm").multiStepForm(
			{
				// defaultStep:0,
				beforeSubmit : function(form, submit){
					console.log("called before submiting the form");
					console.log(form);
					console.log(submit);
				},
				//validations:val,
			}
			).navigateTo(0);
		});
	</script>

    <script>
         $(document).ready(function() {

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('change', '#formFile', function() {
    console.log('thumb upload');
    var name = document.getElementById("formFile").files[0].name;

    //alert(name);
    var form_data = new FormData();
    var ext = name.split('.').pop().toLowerCase();
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("formFile").files[0]);
    //var f = document.getElementById("file").files[0];
    form_data.append("file", document.getElementById('formFile').files[0]);

    $.ajax({
        url: "{{ route('sup.quali.certi') }}",
        method: "POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            console.log(data);
            // $('#uploaded_image').html(data);
            // $('#prescription_file').prop("href", data.pdf_path);
            $('#formFile2').val(data.img_name);
            // $('.modal-body embed').prop("src", data.pdf_path)

        }
    });

});



// ===== experiance certificate 

$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('change', '#exp_certi', function() {
            console.log('thumb upload');
            var name = document.getElementById("exp_certi").files[0].name;

            //alert(name);
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("exp_certi").files[0]);
            //var f = document.getElementById("file").files[0];
            form_data.append("file", document.getElementById('exp_certi').files[0]);

            $.ajax({
                url: "{{ route('supervisors.exp.certi') }}",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    // $('#uploaded_image').html(data);
                    // $('#prescription_file').prop("href", data.pdf_path);
                    $('#exp_hid_certi').val(data.img_name);
                    // $('.modal-body embed').prop("src", data.pdf_path)

                }
            });

        });


 //======= for journal upload
 
 $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('change', '#journal_uplaod', function() {
            console.log('thumb upload');
            var name = document.getElementById("journal_uplaod").files[0].name;

            //alert(name);
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("journal_uplaod").files[0]);
            //var f = document.getElementById("file").files[0];
            form_data.append("file", document.getElementById('journal_uplaod').files[0]);

            $.ajax({
                url: "{{ route('supervisors.journal') }}",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    // $('#uploaded_image').html(data);
                    // $('#prescription_file').prop("href", data.pdf_path);
                    $('#journal_uplaod_hid').val(data.img_name);
                    // $('.modal-body embed').prop("src", data.pdf_path)

                }
            });

        });

// ===== For full publish file 

$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('change', '#journal_pdf', function() {
            console.log('thumb upload');
            var name = document.getElementById("journal_pdf").files[0].name;

            //alert(name);
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("journal_pdf").files[0]);
            //var f = document.getElementById("file").files[0];
            form_data.append("file", document.getElementById('journal_pdf').files[0]);

            $.ajax({
                url: "{{ route('supervisors.journal') }}",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    // $('#uploaded_image').html(data);
                    // $('#prescription_file').prop("href", data.pdf_path);
                    $('#journal_pdf_hid').val(data.img_name);
                    // $('.modal-body embed').prop("src", data.pdf_path)

                }
            });

        });

});


// ========= for delete qualification certificate
function delete_certificate(id, sup_id) {

var postData = new FormData();
postData.append('id', id);
postData.append('sup_id', sup_id);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    async: true,
    type: "post",
    contentType: false,
    url: "{{ url('supervisor/delete-qual-certi') }}",
    data: postData,
    processData: false,
    success: function(data) {
        console.log(data);
        $('.SupQuali').empty();
        var newRow = '';
        var c = 0;
        $.each(data, function(key, value) {

            newRow += '<tr>' +
                '<td>' + value.exam + '</td>' +
                '<td>' + value.specialization +
                '</td>' +
                '<td>' + value.board_university +
                '</td>' +
                '<td>' + value.year +
                '</td>' +
                '<td>' + value.division +
                '</td>' +
                '<td>' + value.percentage +
                '</td>' +
                '<td>' + '<a href="javascript:void(0)" onclick="upload_image_view(' +
                "'/upload/supervisor/qualification/" + value.certificate + "'" + ');">View Upload File</a><input type="hidden" name="formFile_hid[]" value="' +
                value.certificate + '">' +
                '</td>' +
                '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" onclick="delete_certificate(' +
                value.id + ', ' + value.sup_id + ')">Remove</button></td></tr>';
        });
        $('.SupQuali').append(newRow);

    }
});
}


// ========= for delete Employement certificate
function delete_employment(id, sup_id) {

var postData = new FormData();
postData.append('id', id);
postData.append('sup_id', sup_id);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    async: true,
    type: "post",
    contentType: false,
    url: "{{ url('supervisor/delete-employment') }}",
    data: postData,
    processData: false,
    success: function(data) {
        console.log(data);
        $('.SupEmp').empty();
        var newRow = '';
        var c = 0;
        $.each(data, function(key, value) {

            newRow += '<tr>' +
                '<td>' + value.name + '</td>' +
                '<td>' + value.address +
                '</td>' +
                '<td>' + value.designation +
                '</td>' +
                '<td>' + value.pay_scale +
                '</td>' +
                '<td>' + value.from +
                '</td>' +
                '<td>' + value.to +
                '</td>' +
                '<td>' + value.type +
                '</td>' +
                '<td>' + value.appointment_date +
                '</td>' +
                '<td>' + '<a href="javascript:void(0)" onclick="upload_image_view(' +
                "'/upload/phdsupervisor/" + value.employment_cerificate + "'" + ');">View Upload File</a><input type="hidden" name="exp_hid_certi[]" value="' +
                value.employment_cerificate + '">' +
                '</td>' +
                '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" onclick="delete_employment(' +
                value.id + ', ' + value.sup_id + ')">Remove</button></td></tr>';
        });
        $('.SupEmp').append(newRow);

    }
});
}


// ========= for delete Publication certificate
function delete_publication(id, sup_id) {

var postData = new FormData();
postData.append('id', id);
postData.append('sup_id', sup_id);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    async: true,
    type: "post",
    contentType: false,
    url: "{{ url('supervisor/delete-publication') }}",
    data: postData,
    processData: false,
    success: function(data) {
        console.log(data);
        $('.SupPub').empty();
        var newRow = '';
        var c = 0;
        $.each(data, function(key, value) {

            newRow += '<tr>' +
                '<td>' + value.title + '</td>' +
                '<td>' + value.author +
                '</td>' +
                '<td>' + value.name_of_journal +
                '</td>' +
                '<td>' + value.vol_year_page +
                '</td>' +
                '<td>' + value.indexing +
                '</td>' +
                '<td>' + '<a href="javascript:void(0)" onclick="upload_image_view(' +
                "'/upload/supervisor_publish/" + value.frontpage_cover + "'" + ');">View Upload File</a><input type="hidden" name="journal_uplaod_hid[]" value="' +
                value.frontpage_cover + '">' +
                '</td>' +
                '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" onclick="delete_publication(' +
                value.id + ', ' + value.sup_id + ')">Remove</button></td></tr>';
        });
        $('.SupPub').append(newRow);

    }
});
}



// ========= for delete Publication Details certificate
function delete_pub_detail(id, sup_id) {

var postData = new FormData();
postData.append('id', id);
postData.append('sup_id', sup_id);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    async: true,
    type: "post",
    contentType: false,
    url: "{{ url('supervisor/delete-publication-detail') }}",
    data: postData,
    processData: false,
    success: function(data) {
        console.log(data);
        $('.SupDetailPub').empty();
        var newRow = '';
        var c = 0;
        $.each(data, function(key, value) {

            newRow += '<tr>' +
                '<td>' + value.title + '</td>' +
                '<td>' + value.author +
                '</td>' +
                '<td>' + value.name_of_journal +
                '</td>' +
                '<td>' + value.vol_year_page +
                '</td>' +
                '<td>' + value.indexing +
                '</td>' +
                '<td>' + '<a href="javascript:void(0)" onclick="upload_image_view(' +
                "'/upload/supervisor_publish/" + value.book_cover + "'" + ');">View Upload File</a><input type="hidden" name="journal_pdf_hid[]" value="' +
                value.book_cover + '">' +
                '</td>' +
                '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" onclick="delete_publication(' +
                value.id + ', ' + value.sup_id + ')">Remove</button></td></tr>';
        });
        $('.SupDetailPub').append(newRow);

    }
});
}


// ========= for delete Other test
function delete_other_test(id, sup_id) {

var postData = new FormData();
postData.append('id', id);
postData.append('sup_id', sup_id);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});
$.ajax({
    async: true,
    type: "post",
    contentType: false,
    url: "{{ url('supervisor/delete-other-test') }}",
    data: postData,
    processData: false,
    success: function(data) {
        console.log(data);
        $('.SupOther').empty();
        var newRow = '';
        var c = 0;
        $.each(data, function(key, value) {

            newRow += '<tr>' +
                '<td>' + value.student_name + '</td>' +
                '<td>' + value.supervisor_cosupervisor +
                '</td>' +
                '<td>' + value.university_regd_no +
                '</td>' +
                '<td>' + value.university_name +
                '</td>' +
                '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" onclick="delete_publication(' +
                value.id + ', ' + value.sup_id + ')">Remove</button></td></tr>';
        });
        $('.SupOther').append(newRow);

    }
});
}

// view image in a modal ========

function upload_image_view(url) {
   // alert(url);
            event.preventDefault();
            $('#view_upload_image').html('<embed src="' + url +
                '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
            $('#upload_image_view').modal('show');
        }
    </script>


@endsection

