@extends('admin.layouts.app')
@section('heading', 'APPLICATION FOR CHANGE OF NODAL CENTRE')
@section('sub-heading', 'CHANGE OF NODAL CENTRE')
@section('content')
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
                                    <form method="POST" action="{{ route('changeof-nodal-reserach-center-form') }}"
                                        enctype="multipart/form-data" onsubmit="">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="student_name">Name.</label>
                                                <input type="text" class="form-control" id="name"
                                                    aria-describedby="name" placeholder="Enter Name" name="name"
                                                    value="{{ $info->name }}">
                                                @if ($errors->has('name'))
                                                    <span class="error-text" role="alert">
                                                        <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="faculty_of">Faculty Of.</label>
                                                <input type="text" class="form-control" id="faculty_of"
                                                    aria-describedby="faculty_of" placeholder="Faculty Of."
                                                    name="faculty_of" value="{{ $info->name_of_faculty }}">
                                                @if ($errors->has('faculty_of'))
                                                    <span class="error-text" role="alert">
                                                        <strong
                                                            style="color: red;">{{ $errors->first('faculty_of') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="enrollment_no">Enrollment No..</label>
                                                <input type="text" class="form-control" id="enrollment_no"
                                                    aria-describedby="enrollment_no" placeholder="Enter enrollment no"
                                                    name="enrollment_no" value="{{ $info->enrollment_no }}">
                                                @if ($errors->has('enrollment_no'))
                                                    <span class="error-text" role="alert">
                                                        <strong
                                                            style="color: red;">{{ $errors->first('enrollment_no') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="enrollment_date">Enrollment Date:</label>
                                                <input type="date" class="form-control" id="enrollment_date"
                                                    placeholder="Enrollment Date." name="enrollment_date"
                                                    value="{{ $info->enrollment_date }}">
                                                @if ($errors->has('enrollment_date'))
                                                    <span class="error-text" role="alert">
                                                        <strong
                                                            style="color: red;">{{ $errors->first('enrollment_date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group  col-md-6">
                                                <label for="registration_no">Regd. No:</label>
                                                <input type="text" class="form-control" id="registration_no"
                                                    placeholder="Regd No" name="registration_no"
                                                    value="{{ $info->registration_no }}">
                                                @if ($errors->has('registration_no'))
                                                    <span class="error-text" role="alert">
                                                        <strong
                                                            style="color: red;">{{ $errors->first('registration_no') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="registration_date">Date Of Registration:</label>
                                                <input type="date" class="form-control" id="regd_date"
                                                    placeholder="Date Of Registration" name="registration_date"
                                                    value="{{ $info->registration_date }}">
                                                @if ($errors->has('registration_date'))
                                                    <span class="error-text" role="alert">
                                                        <strong
                                                            style="color: red;">{{ $errors->first('registration_date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="branch_name">Branch/Specialization.</label>
                                                <input type="text" class="form-control" id="branch_name"
                                                    placeholder="Branch Name." name="branch_name">
                                                @if ($errors->has('branch_name'))
                                                    <span class="error-text" role="alert">
                                                        <strong
                                                            style="color: red;">{{ $errors->first('branch_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="topic_of_research">Topic Of Research Work.</label>
                                                <input type="text" class="form-control" id="topic_of_research"
                                                    placeholder="Topic Of Research Work." name="topic_of_research">
                                                @if ($errors->has('topic_of_research'))
                                                    <span class="error-text" role="alert">
                                                        <strong
                                                            style="color: red;">{{ $errors->first('topic_of_research') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group  col-md-6">
                                                <label for="present_status_research">Present status Researchwork.</label>
                                                <select class="form-control" id="present_status_research"
                                                    name="present_status_research">
                                                    <option value="">Please Choose</option>
                                                    <option value="Complete">Complete</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Intermediate State">Intermediate State</option>
                                                </select>
                                                @if ($errors->has('present_status_research'))
                                                    <span class="error-text" role="alert">
                                                        <strong
                                                            style="color: red;">{{ $errors->first('present_status_research') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="present_nodal_centre">Present Nodal Research Centre.</label>
                                                <input type="text" class="form-control" id="present_nodal_centre"
                                                    placeholder="Present Title Of Research Work"
                                                    name="present_nodal_centre">
                                                @if ($errors->has('present_nodal_centre'))
                                                    <span class="error-text" role="alert">
                                                        <strong
                                                            style="color: red;">{{ $errors->first('present_nodal_centre') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group  col-md-6">
                                                <label for="present_supervisor_name">Present Supervisor Name.</label>
                                                <input type="text" class="form-control" id="present_supervisor_name"
                                                    placeholder="Present Supervisor Name." name="present_supervisor_name">
                                                @if ($errors->has('present_supervisor_name'))
                                                    <span class="error-text" role="alert">
                                                        <strong
                                                            style="color: red;">{{ $errors->first('present_supervisor_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="co_supervisor_name">Present Co.Supervisor Name.</label>
                                                <input type="text" class="form-control" id="co_supervisor_name"
                                                    placeholder="Reason For Change Of Title" name="co_supervisor_name">
                                                @if ($errors->has('co_supervisor_name'))
                                                    <span class="error-text" role="alert">
                                                        <strong
                                                            style="color: red;">{{ $errors->first('co_supervisor_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="form-group  col-md-6">
                                                <label for="proposed_nodal_centre">Proposed Nodal Centre.</label>
                                                <input type="text" class="form-control" id="proposed_nodal_centre"
                                                    placeholder="Proposed Nodal Centre" name="proposed_nodal_centre">
                                                @if ($errors->has('proposed_nodal_centre'))
                                                    <span class="error-text" role="alert">
                                                        <strong
                                                            style="color: red;">{{ $errors->first('proposed_nodal_centre') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="proposed_supervisor">Name of Proposed Supervisor.</label>
                                                <input type="text" class="form-control" id="proposed_supervisor"
                                                    placeholder="Name of Proposed Supervisor" name="proposed_supervisor">
                                                @if ($errors->has('proposed_supervisor'))
                                                    <span class="error-text" role="alert">
                                                        <strong
                                                            style="color: red;">{{ $errors->first('proposed_supervisor') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="form-group  col-md-6">
                                                <label for="proposed_co_supervisor">Name of Proposed Co.Supervisor.</label>
                                                <input type="text" class="form-control" id="proposed_co_supervisor"
                                                    placeholder="Name of Proposed Co.Supervisor"
                                                    name="proposed_co_supervisor">
                                                @if ($errors->has('proposed_co_supervisor'))
                                                    <span class="error-text" role="alert">
                                                        <strong
                                                            style="color: red;">{{ $errors->first('proposed_co_supervisor') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group  col-md-6">
                                                <label for="proposed_supervisor">Reason For Change Of Centre Doc.</label>
                                                <input type="file" class="form-control" id="document"
                                                    placeholder="Reason For Change Of Centre Doc" name="document">
                                                @if ($errors->has('document'))
                                                    <span class="error-text" role="alert">
                                                        <strong
                                                            style="color: red;">{{ $errors->first('document') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        </br>
                                        <div class="col text-center">
                                            <button style="text-align: center;" type="submit"
                                                class="btn btn-primary btn-lg">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end row -->

@endsection
{{-- @section('js')
@endsection --}}
