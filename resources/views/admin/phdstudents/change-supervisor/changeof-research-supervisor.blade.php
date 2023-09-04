@extends('admin.layouts.app')
@section('heading', 'APPLICATION FOR CHANGE OF RESEARCH SUPERVISOR')
@section('sub-heading', 'CHANGE OF RESEARCH SUPERVISOR')
@section('content')
    <style>
        .row.mb-2 {
            padding-left: 30px;
            padding-right: 30px;
        }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <div class="custom-accordion">
                                @if (session()->has('message'))
                                    <br />
                                    {!! session()->get('message') !!}
                                @endif
                                <div class="mt-4">
                                    <form method="POST" action="{{ route('changeof-research-supervisor-form') }}"
                                        enctype="multipart/form-data" onsubmit="">
                                        @csrf
                                        {{-- <div class="row"> --}}
                                        <div class="border border-purple mb-4 card">
                                            <div class="card-header mb-2">
                                                <div class="row">
                                                    <div class="col-md-8 text-right">
                                                        <h4 class="text-purple text-uppercase">Change of Research Supervisor
                                                            and Co-supervisor</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="form-group col-md-6">
                                                    <label for="phd_student_name" class="text-uppercase">Name Of PH.D Student: <sup
                                                        class="text-danger"> *</sup></label>
                                                    <input type="text" class="form-control" id="phd_student_name"
                                                        aria-describedby="phd_student_name" placeholder="Enter Name"
                                                        name="phd_student_name" value="{{ $info->name }}" readonly>
                                                    @if ($errors->has('phd_student_name'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('phd_student_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="name_of_ncr" class="text-uppercase">Name Of Ncr: <sup
                                                        class="text-danger"> *</sup></label>
                                                    <input type="text" class="form-control" id="present_center"
                                                        aria-describedby="phd_student_name" placeholder="Enter Name"
                                                        name="present_center" value="{{ $info->college_name }}" readonly>
                                                    {{-- <select name="present_center" class="form-control" id="present_center">
                                                            <option value="">Select</option>
                                                            @foreach ($nodal as $key => $nodal)
                                                                <option value="{{ $nodal->id }}">{{ $nodal->college_name }}
                                                                </option>
                                                            @endforeach
                                                        </select> --}}
                                                    @if ($errors->has('name_of_ncr'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('name_of_ncr') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="form-group col-md-6">
                                                    <label for="faculty" class="text-uppercase">Name of the faculty: <sup
                                                        class="text-danger"> *</sup></label>
                                                    <input type="text" class="form-control" id="faculty"
                                                        placeholder="Name of the faculty" name="faculty"
                                                        value="{{ $info->name_of_faculty }}" readonly>
                                                    @if ($errors->has('faculty'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('faculty') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="branch_name" class="text-uppercase">Branch/Specialization: <sup
                                                        class="text-danger"> *</sup></label>
                                                    <input type="text" class="form-control" id="branch_name"
                                                        placeholder="Branch Name" name="branch_name"
                                                        value="{{ $info->departments_title }}" readonly>
                                                    @if ($errors->has('branch_name'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('branch_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="form-group col-md-6">
                                                    <label for="enrollment_no" class="text-uppercase">Enrollment No. <sup
                                                        class="text-danger"> *</sup></label>
                                                    <input type="text" class="form-control" id="enrollment_no"
                                                        aria-describedby="enrollment_no" placeholder="Enter enrollment no"
                                                        name="enrollment_no" value="{{ $info->enrollment_no }}" readonly>
                                                    @if ($errors->has('enrollment_no'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('enrollment_no') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="enrollment_date" class="text-uppercase">Enrollment Date: <sup
                                                        class="text-danger"> *</sup></label>
                                                    <input type="date" class="form-control" id="enrollment_date"
                                                        placeholder="Enrollment Date" name="enrollment_date"
                                                        value="{{ $info->enrollment_date }}" readonly>
                                                    @if ($errors->has('enrollment_date'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('enrollment_date') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="form-group  col-md-6">
                                                    <label for="registration_no" class="text-uppercase">Regd. No:</label>
                                                    <input type="text" class="form-control" id="registration_no"
                                                        placeholder="Regd No" name="registration_no"
                                                        value="{{ $info->registration_no != null ? $info->registration_no : '-' }}">
                                                    @if ($errors->has('registration_no'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('registration_no') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="registration_date" class="text-uppercase">Date Of Registration:</label>
                                                    <input type="date" class="form-control" id="regd_date"
                                                        placeholder="Date Of Registration" name="registration_date"
                                                        value="{{ $info->registration_date != null ? $info->registration_date : '-' }}">
                                                    @if ($errors->has('registration_date'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('registration_date') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="form-group col-md-12">
                                                    <label for="title_of_phd" class="text-uppercase">Title Of PH.D Work: <sup
                                                        class="text-danger"> *</sup></label>
                                                    <input type="text" class="form-control" id="title_of_phd"
                                                        placeholder="Title Of PH.D Work" name="title_of_phd"
                                                        value="{{ $info->topic_of_phd_work }}" readonly>
                                                    @if ($errors->has('title_of_phd'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('title_of_phd') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="form-group  col-md-6">
                                                    <label for="present_research_supervisor" class="text-uppercase">Present Research Supervisor
                                                        Name: <sup
                                                        class="text-danger"> *</sup></label>
                                                        <input type="hidden" name="pre_sup_id" value="{{$info->sup_id}}">
                                                    <input type="text" class="form-control" id="present_research_supervisor"
                                                        placeholder="Title Of PH.D Work" name="present_research_supervisor"
                                                        value="{{ $info->supervisor_name }}" readonly>
                                                    {{-- <select name="present_research_supervisor" class="form-control"
                                                        id="present_research_supervisor">
                                                        <option value="">Select</option>
                                                        @foreach ($supervisor as $key => $sup)
                                                            <option value="{{ $sup->id }}">
                                                                {{ $sup->first_name . ' ' . $sup->last_name }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}
                                                    @if ($errors->has('present_research_supervisor'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('present_research_supervisor') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label for="proposed_research_supervisor" class="text-uppercase">Proposed Research Supervisor
                                                        Name: <sup
                                                        class="text-danger"> *</sup></label>
                                                    <select name="proposed_research_supervisor" class="form-control"
                                                        id="proposed_research_supervisor">
                                                        <option value="">Select</option>
                                                        @foreach ($supervisor as $key => $sup)
                                                            <option value="{{ $sup->id }}">
                                                                {{ $sup->first_name . ' ' . $sup->last_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('proposed_research_supervisor'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('proposed_research_supervisor') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="form-group  col-md-6">
                                                    <label for="pres_cosupervisor_name" class="text-uppercase">Present Research Co.Supervisor
                                                        Name:</label>
                                                        <input type="hidden" name="pres_cosup_id" value="{{$info->cosup_id}}">
                                                        <input type="text" class="form-control"
                                                        id="pres_cosupervisor_name"
                                                        placeholder="Present Research Co.Supervisor Name"
                                                        name="pres_cosupervisor_name" value="{{ $info->co_supervisor_name != null ? $info->co_supervisor_name : '-' }}">
                                                 
                                                    @if ($errors->has('pres_cosupervisor_name'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('pres_cosupervisor_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label for="pros_resc_cosupervisor" class="text-uppercase">Proposed Research
                                                        Co.Supervisor:</label>
                                                        <select name="pros_resc_cosupervisor" class="form-control"
                                                        id="pros_resc_cosupervisor">
                                                        <option value="">Select</option>
                                                        @foreach ($supervisor as $key => $sup)
                                                            <option value="{{ $sup->id }}">
                                                                {{ $sup->first_name . ' ' . $sup->last_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('pros_resc_cosupervisor'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('pros_resc_cosupervisor') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mb-2">

                                                <div class="form-group  col-md-12">
                                                    <label for="reason_for_change" class="text-uppercase">Reason For Change: <sup
                                                        class="text-danger"> *</sup></label>
                                                    <textarea class="form-control" id="reason_for_change" placeholder="Reason For Change" name="reason_for_change"></textarea>
                                                    @if ($errors->has('reason_for_change'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('reason_for_change') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="form-group  col-md-6">
                                                    <label for="approved_by_bput" class="text-uppercase">Proposed Supervisor/Co.Supervisor
                                                        Approved Of
                                                        BPUT <sup
                                                        class="text-danger"> *</sup></label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            onclick="javascript:yesnoCheck();" name="approved_by_bput"
                                                            id="yesCheck">
                                                        <label class="form-check-label" for="approved_by_bput"
                                                            value='yes'>
                                                            Yes
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio"
                                                            onclick="javascript:yesnoCheck();" name="approved_by_bput"
                                                            id="noCheck">
                                                        <label class="form-check-label" for="approved_by_bput"
                                                            value='no'>
                                                            No
                                                        </label>
                                                    </div>
                                                    @if ($errors->has('approved_by_bput'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('approved_by_bput') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group  col-md-6" id="ifYes" style="display:none">
                                                    <label for="proposed_supervisor" class="text-uppercase">Copy of the Recognisation
                                                        Letter:</label>
                                                    <input type="file" class="form-control" name="document">
                                                    @if ($errors->has('document'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('document') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        {{-- </div> --}}


                                        <div class="col text-center">
                                            <button style="text-align: center;" type="submit"
                                                class="btn btn-purple">SUBMIT</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function yesnoCheck() {
            if (document.getElementById('yesCheck').checked) {
                document.getElementById('ifYes').style.display = 'block';
            } else document.getElementById('ifYes').style.display = 'none';

        }
    </script> <!-- end row -->
@endsection
{{-- @section('js')
@endsection --}}
