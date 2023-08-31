@extends('admin.layouts.app')
@section('heading', 'COURSEWORK ALLOTMENT')
@section('sub-heading', 'COURSEWORK ALLOTMENT')
@section('content')
    <style>
        .trbg {
            background-color: #89d4f02e;
        }

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
                                                <h5>Student Information</h5>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>NAME OF THE STUDENT:</th>
                                            <td>{{ $details->get_application_details->name ?? '-' }}</td>
                                            <th style="width: 25%">ENROLLMENT No.:</th>
                                            <td style="width: 25%">
                                                {{ $details->get_application_details->enrollment_no ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th style="width: 25%">DATE OF ENROLLMENT:</th>
                                            <td style="width: 25%">
                                                {{ $details->get_application_details->enrollment_date ? Helper::date_format($details->get_application_details->enrollment_date, '-') : '-' }}
                                            </td>
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
                                            <td>
                                                {{ $details->get_application_details->get_department_details->departments_title ?? '-' }}
                                            </td>
                                            <th>CASTE STATUS:</th>
                                            <td>{{ $details->get_application_details->category ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>CATEGORY OF STUDENTSHIP:</th>
                                            <td>{{ $details->get_application_details->student_category ?? '-' }}</td>
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
                                                    <input type="date" class="form-control" id="sup_doc" name="sup_doc"
                                                        required></textarea>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                    <form action="{{ route('cosup.coursework-application-update') }}" method="post"
                                        id="coursework_form" name="coursework_form">
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
                                        
                                        <br>
                                        <div class="text-center">
                                            <a class="btn btn-primary" href="{{ url()->previous() }}">Back</a>
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
   
@endsection
@section('js')

@endsection
