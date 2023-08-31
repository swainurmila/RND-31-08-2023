@extends('admin.layouts.app')
@section('heading', 'COURSEWORK ALLOTMENT')
@section('sub-heading', 'COURSEWORK ALLOTMENT')
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
                                                    <span
                                                        class="badge bg-{{ Helper::phdcourseworkStatusColor($application->get_coursework_details->id) }} float-end text-uppercase p-1">
                                                        Application Status :
                                                        {{ Helper::phdcourseworkStatus($application->get_coursework_details->id) }}
                                                    </span>
                                                    @if ($application->get_coursework_details && $application->get_coursework_details->status == 14)
                                                        <a href="javascript:void(0);"
                                                            onclick="upload_image_view('{{ $application->get_coursework_details->dsc_letter }}')"
                                                            class="btn-sm btn-success m-1"
                                                            title="View applied coursework details">
                                                            Course Work Letter
                                                        </a>
                                                    @endif
                                                </h5>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>NAME OF THE STUDENT:</th>
                                            <td colspan="3">{{ $application->name ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th style="width: 25%">ENROLLMENT No.:</th>
                                            <td style="width: 25%">{{ $application->enrollment_no ?? '-' }}</td>
                                            <th style="width: 25%">DATE OF ENROLLMENT:</th>
                                            <td style="width: 25%">{{ $application->enrollment_date ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>NAME OF THE FACULTY:</th>
                                            <td colspan="3">{{ $application->name_of_faculty ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>NAME OF PRINCIPAL SUPERVISOR:</th>
                                            <td>{{ $application->get_supervisor_details->supervisor_name ?? '-' }}</td>
                                            <th>NAME OF CO-SUPERVISOR:</th>
                                            <td>{{ $application->get_supervisor_details->co_supervisor_name ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>BRANCH/ SPECIALIZATION:</th>
                                            <td colspan="3">
                                                {{ $application->get_department_details->departments_title ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>CASTE STATUS:</th>
                                            <td>{{ $application->category ?? '-' }}</td>
                                            <th>CATEGORY OF STUDENTSHIP:</th>
                                            <td>{{ $application->student_category ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>NAME OF NCR:</th>
                                            <td colspan="3">
                                                {{ $application->get_nodal_center_details->college_name ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>PROPOSED TITLE OF PHD THESIS:</th>
                                            <td colspan="3">{{ $application->topic_of_phd_work ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">BRIEF DESCRIPTION OF RESEARCH WORK PROPOSED:</th>
                                            <td colspan="2">
                                                {{ $application->get_coursework_details->work_brief_desc ?? '-' }}</td>

                                        </tr>
                                        <tr>
                                            <th colspan="2">MEJOR EQUIPMENT/ FACILITIES NECESSARY TO
                                                CARRY OUT PROJECT AND MEANS OF OBTAINING THEM:</th>
                                            <td colspan="2">
                                                {{ $application->get_coursework_details->equip_brief_desc ?? '-' }}</td>

                                        </tr>
                                        <tr>
                                            <th colspan="2">PLAN OF RESIDENCE ON CAMPUS:</th>
                                            <td colspan="2">
                                                {{ $application->get_coursework_details->residence_plan_desc ?? '-' }}</td>

                                        </tr>

                                    </table>
                                </div>

                                <div class="text-center">
                                    <a class="btn btn-primary" href="{{ route('student.dashboard') }}">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="upload_image_view">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close text-red" data-bs-dismiss="modal" aria-label="Close"></button>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="modal-body">
                    <div id="view_upload_image"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    function upload_image_view(url) {
        event.preventDefault();
        $('#view_upload_image').html('<embed src="' + url +
            '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
        $('#upload_image_view').modal('show');
    }
</script>
@endsection
