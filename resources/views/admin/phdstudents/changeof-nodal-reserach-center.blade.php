@extends('admin.layouts.app')
@section('heading', 'APPLICATION FOR CHANGE OF NODAL CENTRE')
@section('sub-heading', 'CHANGE OF NODAL CENTRE')
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
                                    <form method="POST" action="{{ route('changeof-nodal-reserach-center-form') }}"
                                        enctype="multipart/form-data" onsubmit="">
                                        @csrf
                                        <div class="border border-purple mb-4 card">
                                            <div class="card-header mb-2">
                                                <div class="row">
                                                    <div class="col-md-8 text-right">
                                                        <h4 class="text-purple text-uppercase">Change of the Nodal Centre
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="form-group col-md-6">
                                                    <label for="student_name">Name:</label>
                                                    <input type="text" class="form-control" id="name"
                                                        aria-describedby="name" placeholder="Enter Name" name="name"
                                                        value="{{ $info->name }}"readonly>
                                                    @if ($errors->has('name'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label for="faculty_of">Faculty Of:</label>
                                                    <input type="text" class="form-control" id="faculty_of"
                                                        aria-describedby="faculty_of" placeholder="Faculty Of."
                                                        name="faculty_of" value="{{ $info->name_of_faculty }}"readonly>
                                                    @if ($errors->has('faculty_of'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('faculty_of') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="row mb-2">
                                                <div class="form-group col-md-6">
                                                    <label for="enrollment_no">Enrollment No:</label>
                                                    <input type="text" class="form-control" id="enrollment_no"
                                                        aria-describedby="enrollment_no" placeholder="Enter enrollment no"
                                                        name="enrollment_no" value="{{ $info->enrollment_no }}"readonly>
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
                                                        value="{{ $info->enrollment_date }}"readonly>
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
                                                    <label for="registration_no">Regd. No:</label>
                                                    <input type="text" class="form-control" id="registration_no"
                                                        placeholder="Regd No" name="registration_no"
                                                        value="{{ $info->registration_no }}"readonly>
                                                    @if ($errors->has('registration_no'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('registration_no') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="registration_date">Regd. Date:</label>
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
                                            <div class="row mb-2">
                                                <div class="form-group col-md-6">
                                                    <label for="branch_name">Branch/Specialization:</label>
                                                    <input type="text" class="form-control" id="branch_name"
                                                        placeholder="Branch Name." name="branch_name"
                                                        value="{{ $info->departments_title }}" readonly>
                                                    @if ($errors->has('branch_name'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('branch_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="topic_of_research">Topic of the Research Work:</label>
                                                    <input type="text" class="form-control" id="topic_of_research"
                                                        placeholder="Topic Of Research Work." name="topic_of_research"
                                                        value="{{ $info->topic_of_phd_work }}"readonly>
                                                    @if ($errors->has('topic_of_research'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('topic_of_research') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>

                                            <div class="row mb-2">
                                                <div class="form-group col-md-6">
                                                    <label for="present_nodal_centre">Present Nodal
                                                        Research
                                                        Center:</label>
                                                    <input type="text" class="form-control" id="present_nodal_center"
                                                        aria-describedby="phd_student_name" placeholder="Enter Name"
                                                        name="present_nodal_center" value="{{ $info->college_name }}"
                                                        readonly>
                                                    <input type="hidden" name='ncr_id' value="{{$info->ncr_id}}">
                                                    @if ($errors->has('name_of_ncr'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('name_of_ncr') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label for="proposed_nodal_center">Proposed Nodal Research
                                                        Center:</label>
                                                    <select name="proposed_nodal_center" class="form-control"
                                                        id="proposed_nodal_center">
                                                        <option value="">Select</option>
                                                        @foreach ($research as $key => $res)
                                                            <option value="{{ $res->id }}">
                                                                {{ $res->college_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('proposed_nodal_center'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('proposed_nodal_research') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                                                {{-- <div class="form-group  col-md-6">
                                                    <label for="proposed_supervisor">Name of the Proposed
                                                        Supervisor:</label>
                                                    <input type="text" class="form-control" id="proposed_supervisor"
                                                        placeholder="Name of Proposed Supervisor"
                                                        name="proposed_supervisor">
                                                    @if ($errors->has('proposed_supervisor'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('proposed_supervisor') }}</strong>
                                                        </span>
                                                    @endif
                                                </div> --}}
                                            </div>
                                            <div class="row mb-2">

                                                <div class="form-group  col-md-6">
                                                    <label for="present_sup">Name of the Present
                                                        Supervisor:</label>
                                                    <input type="text" class="form-control"
                                                        id="present_sup"
                                                        placeholder="Name of the Present Supervisor"
                                                        name="present_sup"
                                                        value="{{ $info->supervisor_name }}" readonly>
                                                        <input type="hidden" name='sup_id' value="{{$info->sup_id}}">
                                                    @if ($errors->has('present_sup'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('present_sup') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label for="proposed_sup">Name of the Proposed
                                                       Supervisor:</label>
                                                        <select name="proposed_sup" class="form-control"
                                                        id="proposed_sup">
                                                        <option value="">Select</option>
                                                        @foreach ($supervisor as $key => $sup)
                                                            <option value="{{ $sup->id }}">
                                                                {{ $sup->first_name . ' ' . $sup->last_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('proposed_sup'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('proposed_sup') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                {{-- <div class="form-group  col-md-6">
                                                    <label for="proposed_supervisor">Name of the Proposed
                                                        Supervisor:</label>
                                                    <input type="text" class="form-control" id="proposed_supervisor"
                                                        placeholder="Name of Proposed Supervisor"
                                                        name="proposed_supervisor">
                                                    @if ($errors->has('proposed_supervisor'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('proposed_supervisor') }}</strong>
                                                        </span>
                                                    @endif
                                                </div> --}}

                                            </div>

                                            <div class="row mb-2">
                                                <div class="form-group  col-md-6">
                                                    <label for="present_cosup">Name of the Present
                                                        Co-Supervisor:</label>
                                                    <input type="text" class="form-control" id="present_cosup"
                                                        placeholder="Name of the Present Co-Supervisor"
                                                        name="present_cosup">
                                                    @if ($errors->has('present_cosup'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('present_cosup') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                           
                                                <div class="form-group  col-md-6">
                                                    <label for="proposed_cosup">Name of the Proposed
                                                        Co-Supervisor:</label>
                                                        <select name="proposed_cosup" class="form-control"
                                                        id="proposed_cosup">
                                                        <option value="">Select</option>
                                                        @foreach ($supervisor as $key => $sup)
                                                            <option value="{{ $sup->id }}">
                                                                {{ $sup->first_name . ' ' . $sup->last_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('proposed_cosup'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('proposed_cosup') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                {{-- <div class="form-group  col-md-6">
                                                    <label for="proposed_co_supervisor">Name of Proposed
                                                        Co-Supervisor:</label>
                                                    <input type="text" class="form-control"
                                                        id="proposed_co_supervisor"
                                                        placeholder="Name of Proposed Co-Supervisor"
                                                        name="proposed_co_supervisor">
                                                    @if ($errors->has('proposed_co_supervisor'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('proposed_co_supervisor') }}</strong>
                                                        </span>
                                                    @endif
                                                </div> --}}

                                            </div>
                                            <div class="row mb-2">

                                                <div class="form-group  col-md-6">
                                                    <label for="present_status_research">Present
                                                        Status of the research work: </label>
                                                    <textarea class="form-control" id="present_status_research" placeholder="Present Status of the research work"
                                                        name="present_status_research"></textarea>
                                                    @if ($errors->has('present_status_research'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('present_status_research') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label for="proposed_supervisor">Reason for Change Of Centre
                                                        (attach the copy of relevant document):</label>
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
                                            <div class="row mb-2">

                                                <div class="form-group  col-md-12">
                                                    <label for="change_reason">Reason for Change Of
                                                        Center:</label>
                                                    <textarea class="form-control" id="change_reason" placeholder="Reason for Change Of Center"
                                                        name="change_reason"></textarea>
                                                    @if ($errors->has('change_reason_centre'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('	change_reason') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        </br>
                                        <div class="col text-center">
                                            <button style="text-align: center;" type="submit"
                                                class="btn btn-primary btn-lg">Submit</button>
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
