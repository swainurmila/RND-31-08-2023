@extends('layouts.appent')
@section('content')
    <style>
        form {
            width: 100%;
            height: 100%;
            border-radius: 1px solid black;
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
/* input[type="text"] {
	
	background: no-repeat;
	border: none;
	border-bottom: 2px dotted #000;
} */
table {
  font-family: 'Times New Roman', Times, serif;
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
.note-box {
        background-color: #f0f0f0; 
        padding: 5px;
        border: 1px solid #ccc; 
        border-radius: 5px;
        margin-bottom: 20px;
        color: red;
        width: 540px;
        margin-left: 450px;
    }
    .note-box p {
        margin: 0; 
        /* font-style: italic;  */
    }
/* input[type="text"] {
	
	background: none;
	border: none; 
	border-bottom: 2px dotted #000;
} */
.error {
	font-size: 11px;
	color: red;
	font-family: 'Times New Roman', Times, serif;
	font-weight: normal;
	width: 100%;
	text-align: left;
}
.comm_div.d-flex .div_L {
	width: 45%;
	text-align: left;
}
.comm_div.d-flex .div_R {
	width: 60%;
}
.d-flex {
	display: flex;
	align-items: center;
	margin-bottom: 20px;
}
.form_no {
    text-align: right;
    margin-bottom: 30px;
}
.form_no h4 {
	margin: 0;
	font-size: 16px;
	font-weight: bold;
	line-height: 10px;
}
.file_up label {
	width: 100%;
	text-align: left;
}
.file_up {
	margin-bottom: 20px;
}
.file_up label {
	width: 100%;
	text-align: left;
	font-size: 12px;
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
.sig_pic input{width: 100% !important; margin: 0 !important;}
.table_check_wrap{padding: 0;}
}
    </style>
    {{-- <div class="bread_crumbs">
    <div class="container22">
        <div class="sptb-1 bannerimg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white" style="margin: 0;">
                        <h1 class="" style="color:#fff;">{{ $page->page_title }}</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active text-white"  aria-current="page" style="margin: 0;">{{ $page->page_title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
    <section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom subheader"
        style="background-position: 50% 0px;">
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
    </section> --}}
    <div class="content-wrapper">
        <div class="sptb">
            <div class="container">
                {{-- <div>
                <h6 style="text-align:right"><b>ANNEXURE.BPUT/ Ph.D-2019</b></h6>
                <h6 style="text-align:right"><b>[video Ph.D.-27]</b></h6>
    
            </div> --}}
                <section class="fee_structure" style="margin-top: 80px; padding: 50px 40px;">
                    <div class="section-title form-section-title dsc-form">
                        <center>

                            <form action="{{route('phd_entran_two_update',[$id])}}" method="post" enctype="multipart/form-data" >
                                @csrf

                                {{-- <div style="margin-left:50%;">
                                    <p>Form No.:BPUT/Ph.D-2019/7.1(vide Ph.D-9.1)</p>
                                </div> --}}
                                <div class="form_no">
                                    @php
                                        $prev_year = date('Y') - 1;
                                       // dd($prev_year);
                                    @endphp
                                    <h4>Form No.: BPUT/Ph.D.- {{$prev_year}}/{{date('Y')}}/7.1</h4>
                                    <br>
                                    <h4>(vide Ph.D.-9.1)</h4>
                                </div>
                                <div class="row-12">

                                    <div class="col-md-12 text-left">
                                        <div class="comm_div d-flex">
                                            <div class="div_L">
                                                <p>12. Mention the faculty in which research is to be conducted: </p>
                                            </div>
                                            <div class="div_R">
                                                <select class="form-control" name="department">
                                                    <option value="">Select Department</option>    
                                                    <option value="engineering"{{$phd_data->department == 'engineering' ? 'selected' : ''}}>Engineering</option>    
                                                    <option value="management_studies" {{$phd_data->department == 'management_studies' ? 'selected' : ''}}>Management Studies</option>    
                                                    <option value="pharmacy" {{$phd_data->department == 'pharmacy' ? 'selected' : ''}}>Pharmacy</option>    
                                                    <option value="computer_application" {{$phd_data->department == 'computer_application' ? 'selected' : ''}}>Computer Application</option>    
                                                    <option value="science" {{$phd_data->department == 'science' ? 'selected' : ''}}>Science</option>    
                                                    <option value="architecture" {{$phd_data->department == 'architecture' ? 'selected' : ''}}>Architecture</option>    
                                                </select>
                                            </div>
                                        </div>
                                        

                                    </div>
                                    <div class="col-md-12">
                                        <div class="comm_div d-flex">
                                            <div class="div_L">
                                                <p>13.Branch/Specialiazation: </p>
                                            </div>
                                            <div class="div_R">
                                                <input type="text" class="form-control" name="branch" value="{{$phd_data->branch}}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>



                                <div class="col-md-12 text-left">
                                    <div class="comm_div d-flex">
                                        <div class="div_L">
                                            <p>15. Are you claimimg for exemption of Entrance test:</p>
                                        </div>
                                        <div class="div_R">
                                            <select class="form-control" name="claim_entrance">
                                                <option value="">Select</option>    
                                                <option value="yes" {{$phd_data->claim_entrance == 'yes' ? 'selected' : ''}}>Yes</option>    
                                                <option value="no" {{$phd_data->claim_entrance == 'no' ? 'selected' : ''}}>No</option>    
                                                </select>
                                        </div>
                                    </div>
                                    
                                    <div class="note-box">
                                        <p>
                                            (NOTE: if yes, justify the same with proper document and mention the exemption category)
                                        </p>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <h3 class="text-center"><u>Declaration </u></h3><br>
                                    <p class="text-left">
                                        I do here by declare that the information furnished in this application is true to the
                                        best of my knowledge and belief.if admitted,i shall abide by rules and regulations of
                                        the University and Nodal centre of research allotted to me.if any information furnished
                                        in this application is found to be untrue, i am liable to forfeit the seat allotted to
                                        me any time in future and legal action be taken against me.
                                    </p><br>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 text-left">
                                        <div class="comm_div d-flex">
                                            <div class="div_L" style="width: 70px">
                                                <p>Date:</p>
                                            </div>
                                            <div class="div_R">
                                                <input class="form-control" type="date" name="date" value="{{$phd_data->date}}"  />
                                                {{-- <div id="datepicker" class="input-group date">
                                                    <input class="form-control" type="text" name="date" value="{{$phd_data->date}}"  />
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="comm_div d-flex">
                                            <div class="div_L" style="width: 70px">
                                                <p>Place:</p>
                                            </div>
                                            <div class="div_R">
                                                <input type="text" class="form-control" name="place" value="{{$phd_data->place}}">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <div class="sig_pic">
                                        <img src="/upload/phd_entrance/{{$phd_data->signature}}" alt="" style="max-width: 100px;  margin-bottom:10px;">
                                        <input type="file" class="form-control" name="signature2" accept="image/png, image/gif, image/jpeg"  style="width: 400px;margin-left:110px;">
                                        <input type="hidden" value="{{$phd_data->signature}}" name="photo_hid">
                                        <p><b> Full Signature of the candidate</b> </p>
                                        </div>
                                    </div>
                                </div>
                                
                               
                                
                                <hr>
                                <hr>
                                <div class="row">
                                    <h3 class="text-center">Upload Documents</h3>
                                    <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="file_up">
                                            <label class="form-label">High School Certificate :</label>
                                            <input type="file" class="form-control" name="high_school_certificate" id="">
                                            <input type="hidden" name="hid_high_school_certificate" value="{{$phdCerti->high_school_certificate}}">
                                            <div class="view_file text-left" style="margin-top: 10px;">
                                                <a href="javascript:void(0)" onclick="show_certi('{{$phdCerti->high_school_certificate}}')">View File</a>
                                                <a download href="{{$phdCerti->high_school_certificate}}" >Download File</a>
                                               
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="file_up">
                                            <label class="form-label">Memorandum Certificate of High School :</label>
                                            <input type="file" class="form-control" name="memo_high_school" id="">
                                            <input type="hidden" name="hid_memo_high_school" value="{{$phdCerti->memo_high_school}}">
                                            <div class="view_file text-left" style="margin-top: 10px;">
                                                <a href="javascript:void(0)" onclick="show_certi('{{$phdCerti->memo_high_school}}')">View File</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="file_up">
                                            <label class="form-label">Intermediate certificates :</label>
                                            <input type="file" class="form-control" name="intermidiate_certificate" id="">
                                            <input type="hidden" name="hid_intermidiate_certificate" value="{{$phdCerti->intermidiate_certificate}}">
                                            <div class="view_file text-left" style="margin-top: 10px;">
                                                <a href="javascript:void(0)" onclick="show_certi('{{$phdCerti->intermidiate_certificate}}')">View File</a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="file_up">
                                            <label class="form-label">Memorandum Certificate of intermediate :</label>
                                            <input type="file" class="form-control" name="memo_intermediate" id="">
                                            <input type="hidden" name="hid_memo_intermediate" value="{{$phdCerti->memo_intermediate}}">
                                            <div class="view_file text-left" style="margin-top: 10px;">
                                                <a href="javascript:void(0)" onclick="show_certi('{{$phdCerti->memo_intermediate}}')">View File</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="file_up">
                                            <label class="form-label">UG Certificate :</label>
                                            <input type="file" class="form-control" name="ug_certificate" id="">
                                            <input type="hidden" name="hid_ug_certificate" value="{{$phdCerti->ug_certificate}}">
                                            <div class="view_file text-left" style="margin-top: 10px;">
                                                <a href="javascript:void(0)" onclick="show_certi('{{$phdCerti->ug_certificate}}')">View File</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="file_up">
                                            <label class="form-label">Memorandum Certificate of UG :</label>
                                            <input type="file" class="form-control" name="memo_ug" id="">
                                            <input type="hidden" name="hid_memo_ug" value="{{$phdCerti->memo_ug}}">
                                            <div class="view_file text-left" style="margin-top: 10px;">
                                                <a href="javascript:void(0)" onclick="show_certi('{{$phdCerti->memo_ug}}')">View File</a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="file_up">
                                            <label class="form-label">PG/M.phil Certificate :</label>
                                            <input type="file" class="form-control" name="pg_mphil_cerficate" id="">
                                            <input type="hidden" name="hid_pg_mphil_cerficate" value="{{$phdCerti->pg_mphil_cerficate}}">
                                            <div class="view_file text-left" style="margin-top: 10px;">
                                                @if ($phdCerti->pg_mphil_cerficate != '')
                                                <a href="javascript:void(0)" onclick="show_certi('{{$phdCerti->pg_mphil_cerficate}}')">View File</a>
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="file_up">
                                            <label class="form-label">Memorandum Certificate of PG/M.phil :</label>
                                            <input type="file" class="form-control" name="memo_pg_mphil" id="">
                                            <input type="hidden" name="hid_memo_pg_mphil" value="{{$phdCerti->memo_pg_mphil}}">
                                            <div class="view_file text-left" style="margin-top: 10px;">
                                                @if ($phdCerti->memo_pg_mphil != '')
                                                <a href="javascript:void(0)" onclick="show_certi('{{$phdCerti->memo_pg_mphil}}')">View File</a>
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="file_up">
                                            <label class="form-label">SC/ST/Differently abled Certificate :</label>
                                            <input type="file" class="form-control" name="sc_st_certficate" id="">
                                            <input type="hidden" name="hid_sc_st_certficate" value="{{$phdCerti->sc_st_certficate}}">
                                            <div class="view_file text-left" style="margin-top: 10px;">
                                                @if ($phdCerti->sc_st_certficate != '')
                                                <a href="javascript:void(0)" onclick="show_certi('{{$phdCerti->sc_st_certficate}}')">View File</a>  
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="file_up">
                                            <label class="form-label">Proof of National Eligibility :</label>
                                            <input type="file" class="form-control" name="proof_national_eligibility" id="">
                                            <input type="hidden" name="hid_proof_national_eligibility" value="{{$phdCerti->proof_national_eligibility}}">
                                            <div class="view_file text-left" style="margin-top: 10px;">
                                                @if ($phdCerti->proof_national_eligibility != '')
                                                <a href="javascript:void(0)" onclick="show_certi('{{$phdCerti->proof_national_eligibility}}')">View File</a>
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="file_up">
                                            <label class="form-label">Passport size photograph:</label>
                                            <input type="file" class="form-control" name="passport_photographs" id="">
                                            <input type="hidden" name="hid_passport_photographs" value="{{$phdCerti->passport_photographs}}">
                                            <div class="view_file text-left" style="margin-top: 10px;">
                                                <a href="javascript:void(0)" onclick="show_certi('{{$phdCerti->passport_photographs}}')">View File</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="file_up">
                                            <label class="form-label">Aadhaar Card :</label>
                                            <input type="file" class="form-control" name="adhaar_card" id="">
                                            <input type="hidden" name="hid_adhaar_card" value="{{$phdCerti->adhaar_card}}">
                                            <div class="view_file text-left" style="margin-top: 10px;">
                                                <a href="javascript:void(0)" onclick="show_certi('{{$phdCerti->adhaar_card}}')">View File</a>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <h3 class="text-center">Enclosures: (Self attested copy of)</h3>
                                   
                                    <div class="col-md-12 table_check_wrap">
                                        <div class="table_check_info">
                                            <table class="table table-bordered" style="width: 100%;"">
                                                <tr>
                                                    <th>1</th>
                                                    <td><p>High School Pass Certificate Examination or Other equivalent Examination Pass
                                                        Certificate</p></td>
                                                    <td><input type="checkbox" value="high_school_pass" {{ in_array('high_school_pass', $enclosures) ? 'checked' : ''}}  name="check_info[]" id=""></td>
                                                </tr>
                                                <tr>
                                                    <th>2</th>
                                                    <td><p>Memorandum of Marks of high School Certificate Examination or equivalent
                                                        Examinations</p></td>
                                                    <td><input type="checkbox" value="memorandum_high_school" {{ in_array('memorandum_high_school', $enclosures) ? 'checked' : ''}}  name="check_info[]" id=""></td>
                                                </tr>
                                                <tr>
                                                    <th>3</th>
                                                    <td><p>Pass certificates of intermediate/Diploma(Engg.etc.)Examinations</p></td>
                                                    <td><input type="checkbox" value="certificate_of_intermediate" {{ in_array('certificate_of_intermediate', $enclosures) ? 'checked' : ''}} name="check_info[]" id=""></td>
                                                </tr>
                                                <tr>
                                                    <th>4</th>
                                                    <td><p>Memorandum of Marks of intermediate/Diploma(Engg.etc.)Examinations</p></td>
                                                    <td><input type="checkbox" value="memorandum_marks_intermediate" {{ in_array('memorandum_marks_intermediate', $enclosures) ? 'checked' : ''}} name="check_info[]" id=""></td>
                                                </tr>
                                                <tr>
                                                    <th>5</th>
                                                    <td><p>Pass Certificate of UG or other equivalent Examinations</p></td>
                                                    <td><input type="checkbox" value="certificate_of_ug" {{ in_array('certificate_of_ug', $enclosures) ? 'checked' : ''}} name="check_info[]" id=""></td>
                                                </tr>
                                                <tr>
                                                    <th>6</th>
                                                    <td><p>Memorandum of Marks of UG or other equivalent Examinations</p></td>
                                                    <td><input type="checkbox" value="memorandum_marks_ug" {{ in_array('memorandum_marks_ug', $enclosures) ? 'checked' : ''}} name="check_info[]" id=""></td>
                                                </tr>
                                                <tr>
                                                    <th>7</th>
                                                    <td><p>Pass certificate of PG/M.phil Examinations</p></td>
                                                    <td><input type="checkbox" value="certificate_of_pg_mphill" {{ in_array('certificate_of_pg_mphill', $enclosures) ? 'checked' : ''}} name="check_info[]" id=""></td>
                                                </tr>
                                                <tr>
                                                    <th>8</th>
                                                    <td><p>Memorandum of Marks of PG/M.phil Examination</p></td>
                                                    <td><input type="checkbox" value="memorandum_marks_pg_mphill" {{ in_array('memorandum_marks_pg_mphill', $enclosures) ? 'checked' : ''}} name="check_info[]" id=""></td>
                                                </tr>
                                                <tr>
                                                    <th>9</th>
                                                    <td><p>Certificate in support of SC/ST/Differently abled Catagory as the case may be (Mention Clearly)</p></td>
                                                    <td><input type="checkbox" value="certificate_of_sc_st" {{ in_array('certificate_of_sc_st', $enclosures) ? 'checked' : ''}} name="check_info[]" id=""></td>
                                                </tr>
                                                <tr>
                                                    <th>10</th>
                                                    <td><p>Proof of National Eligibility Test qualified if any(GATE/GPAT/NET etc.)</p></td>
                                                    <td><input type="checkbox" value="national_eligibility" {{ in_array('national_eligibility', $enclosures) ? 'checked' : ''}} name="check_info[]" id=""></td>
                                                </tr>
                                                <tr>
                                                    <th>11</th>
                                                    <td><p>Two passport size phonographs</p></td>
                                                    <td><input type="checkbox" {{ in_array('passport_photo', $enclosures) ? 'checked' : ''}} value="passport_photo" name="check_info[]" id=""></td>
                                                </tr>
                                                <tr>
                                                    <th>12</th>
                                                    <td><p>Aadhaar Card</p></td>
                                                    <td><input type="checkbox" {{ in_array('aadhaar_card', $enclosures) ? 'checked' : ''}} value="aadhaar_card"  name="check_info[]" id=""></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                
                               
                                <br>

                                <h3 class="text-center">Draft Details</h3>

                                <div class="dd_wrap">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>DD No.</th>
                                            <th>Date</th>
                                            <th>Bank Name</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" name="dd_no" value="{{$phd_data->dd_no}}"></td>
                                            <td>
                                                <input class="form-control" type="date" name="dd_date" value="{{$phd_data->dd_date}}"  />
                                                {{-- <div id="datepicker1" class="input-group date">
                                                    <input class="form-control" type="text" name="dd_date" value="{{$phd_data->dd_date}}"  />
                                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                </div> --}}
                                            </td>
                                            <td><input type="text" class="form-control" name="dd_bank" value="{{$phd_data->dd_bank}}"></td>
                                        </tr>
                                    </table>
                                </div>

                                <hr style="border: 1px solid #29b6f6; margin: 60px 0;">
                                
                                {{-- <div class="row">
                                    <div class="col-md-12 text-left">
                                        <h4><u> For office use only</u></h4><br>
                                        <p> Serial No. of the Application:<input type="text"></p>
                                        <p> Date of Receipt<input type="text"></p><br>
                                    </div>
                                </div> --}}
                                

                                {{-- <div class="row">
                                    <div class="col-md-6 text-left">
                                        <p><b> J.E(R&amp;D Cell),BPUT</b></p>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <p><b>PIC(R&amp;D),BPUT</b></p>
                                    </div>
                                   
                                </div> --}}

                                <div class="col-md-12 text-center">
                                    <input type="hidden" value="{{$phd_data->name}}" name="name">
                                    <input type="hidden" value="{{$phd_data->email}}" name="email">
                                    <input type="hidden" value="{{$id}}" name="id">
                                    {{-- {{route('')}} --}}
                                    <a href="{{route('phd_entran_draft',[$id])}}" class="btn btn-primary">Back</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                
                            </form>

                            
                        </center>
                    </div>
                </section>
            </div>
        </div>

    </div>

 <!-- Modal -->
 <div class="modal fade" id="default-example-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    Certificate View
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fal fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body cert_view">
                <img src="" alt="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
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
  $("#datepicker1").datepicker({ 
         //autoclose: true, 
        // todayHighlight: true
        format: 'yyyy-mm-dd'
  });
});

function show_certi(url)
{
    //alert(url);
    //$('.cert_view').attr('src',url);
    $('.cert_view').html('<embed src="' + url +
                '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
    $('#default-example-modal').modal('show');

}
    </script>
    @endsection
