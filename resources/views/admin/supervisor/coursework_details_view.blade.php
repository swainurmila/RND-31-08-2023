@extends('admin.layouts.app')
{{-- @section('heading', 'COURSEWORK ALLOTMENT FORM') --}}
{{-- @section('sub-heading', 'COURSEWORK ALLOTMENT FORM') --}}
@section('content')
    <style>
        table.table.table-bordered {
            font-size: 13px;
        }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <form action="{{ route('applied-coursework-details-save', ['id' => $details->id]) }}"
                                method="post" name="applied_coursework_sup_update_form"
                                id="applied_coursework_sup_update_form" enctype="multipart/form-data">
                                @csrf
                                <div class="custom-accordion">
                                    @if (session()->has('message'))
                                        <br />
                                        {!! session()->get('message') !!}
                                    @endif
                                    <span id="msg"></span>
                                    <div class="text-center">
                                        <h3>Application for Coursework Allotment in Ph.D Programme</h3>
                                    </div>
                                    <div class="mt-4">
                                        <table class="table table-bordered">
                                            <tr class="trbg">
                                                <th colspan="4">
                                                    <h5>Presonal Information
                                                        {{-- <span
                                                        class="badge bg-{{ Helper::CourseworkStatusColor() }} float-end text-uppercase p-1">
                                                        Application Status :
                                                        {{ Helper::CourseworkStatus() }}
                                                    </span> --}}
                                                    </h5>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>NAME OF THE STUDENT:</th>
                                                <td colspan="3">{{ $details->get_application_details->name ?? '-' }}</td>
                                            </tr>

                                            <tr>
                                                <th style="width: 25%">ENROLLMENT No.:</th>
                                                <td style="width: 25%">
                                                    {{ $details->get_application_details->enrollment_no ?? '-' }}</td>
                                                <th style="width: 25%">DATE OF ENROLLMENT:</th>
                                                <td style="width: 25%">
                                                    {{ $details->get_application_details->enrollment_date ? Helper::date_format($details->get_application_details->enrollment_date, '-') : '-' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>NAME OF THE FACULTY:</th>
                                                <td colspan="3">
                                                    {{ $details->get_application_details->name_of_faculty ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>NAME OF PRINCIPAL SUPERVISOR:</th>
                                                <td>{{ $details->get_application_details->get_supervisor_details->supervisor_name ?? '-' }}
                                                </td>
                                                <th>NAME OF CO-SUPERVISOR:</th>
                                                <td>{{ $details->get_application_details->get_supervisor_details->co_supervisor_name ?? '-' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>BRANCH/ SPECIALIZATION:</th>
                                                <td colspan="3">
                                                    {{ $details->get_application_details->get_department_details->departments_title ?? '-' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>CASTE STATUS:</th>
                                                <td>{{ $details->get_application_details->category ?? '-' }}</td>
                                                <th>CATEGORY OF STUDENTSHIP:</th>
                                                <td>{{ $details->get_application_details->student_category ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th>NAME OF NCR:</th>
                                                <td colspan="3">
                                                    {{ $details->get_application_details->get_nodal_center_details->college_name ?? '-' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>PROPOSED TITLE OF PHD THESIS:</th>
                                                <td colspan="3">
                                                    {{ $details->get_application_details->topic_of_phd_work ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th colspan="2">BRIEF DESCRIPTION OF RESEARCH WORK PROPOSED(FROM
                                                    STUDENT):
                                                </th>
                                                <td colspan="2">
                                                    {{ $details->work_brief_desc ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th colspan="2">MAJOR EQUIPMENT/ FACILITIES NECESSARY TO
                                                    CARRY OUT PROJECT AND MEANS OF OBTAINING THEM(FROM STUDENT):</th>
                                                <td colspan="2">
                                                    {{ $details->equip_brief_desc ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <th colspan="2">PLAN OF RESIDENCE ON CAMPUS:</th>
                                                <td colspan="2">{{ $details->residence_plan_desc ?? '-' }}</td>
                                            </tr>

                                        </table>
                                        <table class="table table-bordered">
                                            <tr class="trbg">
                                                <th colspan="4">
                                                    <h5>Supervisor Information</h5>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="2" style="width: 50%">BRIEF DESCRIPTION OF RESEARCH WORK
                                                    PROPOSED:</th>
                                                <td colspan="2">
                                                    @if ($details->status !== 1)
                                                        <span>{{ $details->work_brief_desc_sup }}</span>
                                                    @else
                                                        <textarea class="form-control" id="sup_research_desc" rows="3" name="sup_research_desc" required></textarea>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="2">MAJOR EQUIPMENT/ FACILITIES NECESSARY TO
                                                    CARRY OUT PROJECT AND MEANS OF OBTAINING THEM:</th>
                                                <td colspan="2">
                                                    @if ($details->status !== 1)
                                                        <span>{{ $details->equip_brief_desc_sup }}</span>
                                                    @else
                                                        <textarea class="form-control" id="sup_equipment_desc" rows="3" name="sup_equipment_desc" required></textarea>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th colspan="2">DATE OF COMMENCEMENT OF RESEARCH WORK :</th>
                                                <td colspan="2">

                                                    @if ($details->status !== 1)
                                                        <span>{{ Helper::date_format($details->date_of_commence, '-') }}</span>
                                                    @else
                                                        <input type="date" class="form-control" id="sup_doc"
                                                            name="sup_doc" required></textarea>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="{{ $submitted == null ? 'd-block' : 'd-none' }}">
                                        <div class="row" style="font-size: 13px;">
                                            <div class="col-md-5">
                                                <div class="mb-2 row">
                                                    @if ($details->status == 1)
                                                    <label class="col-md-4 col-form-label"
                                                        for="sup_status"><b>RECOMMENDATION OF
                                                            SUPERVISOR
                                                            <span class="error">*</span></b></label>
                                                    <div class="col-md-7">
                                                            <select class="form-select" id="sup_status" name="sup_status"
                                                                required>
                                                                <option value="">-----select-----</option>
                                                                <option value="2">Recommend</option>
                                                                <option value="3">Not Recommend</option>
                                                            </select>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="mb-2 row">
                                                    <div class="col-md-3">
                                                        <label class="col-form-label" for="sup_comment"><b>COMMENT: <span
                                                                    class="error">*</span></b></label>
                                                    </div>
                                                    <div class="col-md-9">
                                                        @if ($details->status !== 1)
                                                            <span>{{ $details->sup_comment ?? '-' }}</span>
                                                        @else
                                                            <textarea class="form-control" id="sup_comment" rows="3" name="sup_comment" required></textarea>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <input type="hidden" name="coursework_id" id="coursework_id"
                                                value="{{ $details->id }}" />
                                            @if ($details->status === 1)
                                                <input type="submit" value="Save" name="save_btn" id="save_btn"
                                                    class="btn btn-block btn-primary" id="save_btn" />
                                                <a class="btn btn-block btn-primary"
                                                    href="{{ route('applied-students-approval') }}">Back</a>
                                            {{-- @elseif ($details->status === 2 || $details->status === 3)
                                                <a class="btn btn-block btn-primary"
                                                    href="{{ route('applied-students-approval') }}">Back</a> --}}
                                            @else
                                                {{-- <a class="btn btn-block btn-primary"
                                                    href="{{ url()->previous() }}">Back</a> --}}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                           
                            <form action="{{ route('applied-coursework-details-update') }}" method="post"
                                id="coursework_form" name="coursework_form" style="padding: 22px;">
                                @csrf

                                @if ($submitted)
                                    <table class="table table-bordered coursework-form-display-table">
                                        <tr class="trbg">
                                            <th colspan="5">
                                                <h5>COURSEWORK INFORMATION</h5>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>SL No.</th>
                                            <th>SUBJECT CODE</th>
                                            <th>COURSE TITLE</th>
                                            <th>CREDITS</th>
                                            <th>REMARKS</th>
                                        </tr>
                                        @foreach ($coursework_subjects as $key => $value)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $value['subject_code'] }}</td>
                                                <td>{{ $value['course_title'] }}</td>
                                                <td>{{ $value['credits'] }}</td>
                                                <td>{{ $value['remarks'] }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif
                                <br>
                                <div class="row">
                                    @if ($submitted)
                                        @if ($coursework_remarks->status == 0)
                                            <div class="col-md-2">
                                                <span>Recommendation of Supervisor:</span>
                                            </div>
                                            <div class="col-md-3">
                                                <select name="recommendation_status" id="recommendation_status"
                                                    class="form-control" required>
                                                    <option value="">--------select--------</option>
                                                    <option value="2">Recommend</option>
                                                    <option value="1">Not Recommended</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <span>Comment:</span>
                                            </div>
                                            <div class="col-md-5">
                                                <textarea name="remarks" id="remarks" class="form-control" cols="30" rows="2"
                                                    placeholder="{{ $coursework_remarks->remarks }}Enter Coursework remarks here..." value=""
                                                    required></textarea>
                                            </div>
                                        @else
                                        <table class="table table-bordered coursework-form-display-table">
                                            <tr class="trbg">
                                                <th>
                                                    <div class="row">
                                                        <div class="col-md-3"><h5>Supervisor Remark over Course Work :</h5></div>
                                                        <div class="col-md-9"><h5> {{$coursework_remarks->remarks}}</h5></div>
                                                    </div> 
                                                </th>
                                            </tr>
                                        </table><br>
                                        @endif
                                 
                                </div><br>
                                <div class="text-center">
                                    <input type="hidden" name="coursework_id" id="coursework_id"
                                        value="{{ $details->id }}" />
                                    <input type="hidden" name="appl_id" id="appl_id"
                                        value="{{ $details->appl_id }}" />


                                    @if (empty($coursework_remarks->remarks))
                                        <input type="submit"
                                            class="btn btn-primary text-uppercase text-center coursework-save"
                                            value="Submit" />
                                    @endif
                                    <a class="btn btn-block btn-primary" href="{{ url()->previous() }}">Back</a>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
