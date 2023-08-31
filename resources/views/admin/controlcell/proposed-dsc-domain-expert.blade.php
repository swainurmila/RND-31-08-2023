@extends('admin.layouts.app')
@section('heading', 'OFFICE ORDER ON FORMATION OF DSC FOR THE REARCH SCHLOR')
@section('sub-heading', 'OFFICE ORDER ON FORMATION OF DSC FOR THE REARCH SCHLOR')
@section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <!-- cta -->
                                    <div class="custom-accordion">
                                        @if(session()->has('message'))
                                            <br/>
                                            {!! session()->get('message') !!}
                                        @endif
                                        <div class="mt-4">
                                            <form method="POST" action="{{ route('control-cell.proposed-domain-expert-submit') }}" enctype="multipart/form-data" onsubmit="">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="student_name">Candidate Name.</label>
                                                        <input type="text" class="form-control" id="candidate_name" aria-describedby="candidate_name" placeholder="Enter Candidate Name" name="candidate_name">
                                                        @if ($errors->has('candidate_name'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('candidate_name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="form-group  col-md-6">
                                                        <label for="father_husband_name">Father/Husband's Name.</label>
                                                        <input type="text" class="form-control" id="father_husband_name" placeholder="Father/Husband's Name" name="father_husband_name">
                                                        @if ($errors->has('father_husband_name'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('father_husband_name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                   
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="corres_address">Address For Correspondence.</label>
                                                        <input type="text" class="form-control" id="corres_address" placeholder="Address For Correspondence." name="corres_address">
                                                        @if ($errors->has('corres_address'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('corres_address') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="form-group col-md-6">
                                                        <label for="enrollment_no">Enrollment No.</label>
                                                        <input type="text" class="form-control" id="enrollment_no" placeholder="Enrollment No." name="enrollment_no">
                                                        @if ($errors->has('enrollment_no'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('enrollment_no') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  col-md-6">
                                                        <label for="department_ncr">Department NCR.</label>
                                                        <select class="form-control" id="department_ncr" placeholder="Department NCR." name="department_ncr">
                                                            <option>please select</option>
                                                            <?php foreach($nodal_centre as $key=>$val){ ?>
                                                                <option value="<?php echo $val->college_name ; ?> "><?php echo $val->college_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        @if ($errors->has('department_ncr'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('department_ncr') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="form-group  col-md-6">
                                                        <label for="dob">D.O.B..</label>
                                                        <input type="date" class="form-control" id="dob" placeholder="D.O.B." name="dob">
                                                        @if ($errors->has('dob'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('dob') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  col-md-6">
                                                        <label for="category">Category.</label>
                                                        <input type="text" class="form-control" id="category" placeholder="Category" name="category">
                                                        @if ($errors->has('category'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('category') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="form-group  col-md-6">
                                                        <label for="category_of_studentship">Category Of Studentship.</label>
                                                        <input type="text" class="form-control" id="category_of_studentship" placeholder="Category Of Studentship." name="category_of_studentship">
                                                        @if ($errors->has('category_of_studentship'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('category_of_studentship') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  col-md-6">
                                                        <label for="faculty_dept">Faculty.</label>
                                                        <input type="text" class="form-control" id="faculty_dept" placeholder="Faculty" name="faculty_dept">
                                                        @if ($errors->has('faculty_dept'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('faculty_dept') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="form-group  col-md-6">
                                                        <label for="discipline_specialization">Discipline/Specialization.</label>
                                                        <input type="text" class="form-control" id="discipline_specialization" placeholder="Discipline/Specialization" name="discipline_specialization">
                                                        @if ($errors->has('discipline_specialization'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('discipline_specialization') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  col-md-6">
                                                        <label for="broadarea_of_research_pur">Broad Area of Research Proposed.</label>
                                                        <input type="text" class="form-control" id="broadarea_of_research_pur" placeholder="Broad Area of Rearch Proposed" name="broadarea_of_research_pur">
                                                        @if ($errors->has('broadarea_of_research_pur'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('broadarea_of_research_pur') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="form-group  col-md-6">
                                                        <label for="sponsored_student">Sponsored Student.</label>
                                                        <input type="text" class="form-control" id="sponsored_student" placeholder="Sponsored Student" name="sponsored_student">
                                                        @if ($errors->has('sponsored_student'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('sponsored_student') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  col-md-6">
                                                        <label for="supervisor_name">Name of Supervisor.</label>
                                                        <input type="text" class="form-control" id="supervisor_name" placeholder="Name of Supervisor" name="supervisor_name">
                                                        @if ($errors->has('supervisor_name'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('supervisor_name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="form-group  col-md-6">
                                                        <label for="supervisor_address">Address Of Supervisor.</label>
                                                        <textarea id="supervisor_address" placeholder="Address Of Supervisor" name="supervisor_address" class="form-control"></textarea>
                                                        @if ($errors->has('supervisor_address'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('supervisor_address') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                   
                                                </div>
                                                <div class="row">
                                                    <label for="head_of_institute">Doctoral Scrutiny Committee of the Student.</label>
                                                    <div class="form-group  col-md-3">
                                                        <br>
                                                        <label for="department_ncr">Head Of the Institute(NCR) Chairperson.</label>
                                                        <input type="text" class="form-control" id="head_of_institute" placeholder="Head Of the Institute(NCR) Chairperson." name="head_of_institute">
                                                        @if ($errors->has('head_of_institute'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('head_of_institute') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="form-group  col-md-3">
                                                        <br>
                                                        <label for="head_of_dept">Head Of the Dept.Co- Chairperson.</label>
                                                        <input type="text" class="form-control" id="head_of_dept" placeholder="Head Of the Dept.Co- Chairperson." name="head_of_dept">
                                                        @if ($errors->has('head_of_dept'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('head_of_dept') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="form-group  col-md-3">
                                                        <br>
                                                        <label for="department_ncr">Expert Member(1).</label>
                                                        <input type="text" class="form-control" id="expert_member_1" placeholder="Expert Member(1)." name="expert_member_1">
                                                        @if ($errors->has('expert_member_1'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('expert_member_1') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="form-group  col-md-3">
                                                        <br>
                                                        <label for="expert_member_2">Expert Member(2).</label>
                                                        <input type="text" class="form-control" id="expert_member_2" placeholder="Expert Member(2)." name="expert_member_2">
                                                        @if ($errors->has('expert_member_2'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('expert_member_2') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                   
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  col-md-6">
                                                        <br>
                                                        <label for="principal_convencer">Principal Supervisor Member Convencer.</label>
                                                        <input type="text" class="form-control" id="principal_convencer" placeholder="Principal Supervisor Member Convencer." name="principal_convencer">
                                                        @if ($errors->has('principal_convencer'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('principal_convencer') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                    <div class="form-group  col-md-6">
                                                        <br>
                                                        <label for="co_sup_convencer">Co-Supervisor Joint Member Convencer.</label>
                                                        <input type="text" class="form-control" id="co_sup_convencer" placeholder="Co-Supervisor Joint Member Convencer." name="co_sup_convencer">
                                                        @if ($errors->has('co_sup_convencer'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('co_sup_convencer') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    
                                                </div>
                                            </br>
                                                <div class="col text-center">
                                                    <button style="text-align: center;" type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>                   <!-- end row -->    

@endsection      
{{-- @section('js')
@endsection --}}

