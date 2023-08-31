@extends('admin.layouts.app')
@section('heading', 'APPLICATION FOR CHANGE OF RESEARCH WORK TITLE')
@section('sub-heading', 'APPLICATION FOR CHANGE OF RESEARCH WORK TITLE')
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
                                            <form method="POST" action="{{ route('change-reserach-title-submit') }}" enctype="multipart/form-data" onsubmit="">
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
                                                        <label for="department_ncr">Name Of NCR.</label>
                                                        <select class="form-control" id="department_ncr" placeholder="Name Of NCR." name="department_ncr">
                                                            <option value="">please select</option>
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
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="faculty_of_dept">Faculty Of Dept.</label>
                                                        <input type="text" class="form-control" id="faculty_of_dept" placeholder="Faculty Of Dept." name="faculty_of_dept">
                                                        @if ($errors->has('faculty_of_dept'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('faculty_of_dept') }}</strong>
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
                                                    <div class="form-group col-md-6">
                                                        <label for="registration_no">Registration No.</label>
                                                        <input type="text" class="form-control" id="registration_no" placeholder="Registration No." name="registration_no">
                                                        @if ($errors->has('registration_no'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('registration_no') }}</strong>
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
                                                        <label for="current_title_researchwork">Present Title Of Research Work.</label>
                                                        <input type="text" class="form-control" id="current_title_researchwork" placeholder="Present Title Of Research Work" name="current_title_researchwork">
                                                        @if ($errors->has('current_title_researchwork'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('current_title_researchwork') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label for="propose_title_researchwork">Proposed Title Of Research Work.</label>
                                                        <input type="text" class="form-control" id="propose_title_researchwork" placeholder="Proposed Title Of Research Work." name="propose_title_researchwork">
                                                        @if ($errors->has('propose_title_researchwork'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('propose_title_researchwork') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  col-md-6">
                                                        <label for="reason_change_title">Reason For Change Of Title.</label>
                                                        <input type="text" class="form-control" id="reason_change_title" placeholder="Reason For Change Of Title" name="reason_change_title">
                                                        @if ($errors->has('reason_change_title'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('reason_change_title') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label for="scope_of_rearch">Change Area/Scope of Rearch.</label>
                                                        <input type="text" class="form-control" id="scope_of_rearch" placeholder="Change Area/Scope of Rearch" name="scope_of_rearch">
                                                        @if ($errors->has('scope_of_rearch'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('scope_of_rearch') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>  
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  col-md-6">
                                                        <label for="student_signature">Student Signature.</label>
                                                        <input type="file" class="form-control" id="student_signature" placeholder="Reason For Change Of Title" name="student_signature">
                                                        @if ($errors->has('student_signature'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('student_signature') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                </br>
                                                <div class="col text-center">
                                                    <button style="text-align: center;" type="submit" class="btn btn-primary btn-lg">Save</button>
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

