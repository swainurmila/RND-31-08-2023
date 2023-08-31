@extends('admin.layouts.app')
@section('heading', 'COURSEWORK ALLOTMENT FORM')
@section('sub-heading', 'COURSEWORK ALLOTMENT FORM')
@section('content')
    <style>
        form#coursework_allotment_form {
            font-size: 13PX;
            padding-right: 40px;
            padding-left: 40px;
            /* padding: 4px; */
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
                                    <form action="{{ route('coursework-allotment-form-create') }}" class="form"
                                        method="POST" name="coursework_allotment_form" id="coursework_allotment_form"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="appl_id" id="appl_id"
                                            value="{{ $application->id }}" />
                                        <input type="hidden" name="stud_id" id="stud_id"
                                            value="{{ $application->stud_id }}" />
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class=" col-form-label"><b>NAME OF THE STUDENT<span
                                                            class="error">*</span>: </b></label>
                                            </div>
                                            <div class="col-md-10 mb-3">
                                                <input type="text" id="student_name" name="student_name"
                                                    class="form-control" placeholder="Enter student name"
                                                    value="{{ $application->name ?? '-' }}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-2 row">
                                                    <label class="col-md-4 col-form-label" for="enrollment_no"><b>ENROLLMENT
                                                            No.:
                                                            <span class="error">*</span></b></label>
                                                    <div class="col-md-7">
                                                        <input type="email" id="enrollment_no" name="enrollment_no"
                                                            class="form-control" placeholder="Enter enrollment no"
                                                            value="{{ $application->enrollment_no ?? '-' }}" readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-2 row">
                                                    <label class="col-md-4 col-form-label" for="date_of_enrollment"><b>DATE
                                                            OF
                                                            ENROLLMENT: <span class="error">*</span></b></label>
                                                    <div class="col-md-8">
                                                        <input type="date" id="date_of_enrollment"
                                                            name="date_of_enrollment" class="form-control"
                                                            placeholder="{{ $application->enrollment_date ?? 'Enter date of enrollment' }}"
                                                            value="{{ $application->enrollment_date ?? '-' }}"
                                                            onfocus="{{ $application->enrollment_date ?? '-' }}">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class=" col-form-label"><b>NAME OF THE FACULTY<span
                                                            class="error">*</span>: </b></label>
                                            </div>
                                            <div class="col-md-10 mb-3">
                                                <input type="text" id="name_of_faculty" name="name_of_faculty"
                                                    class="form-control" placeholder="Enter name of faculty"
                                                    value="{{ $application->name_of_faculty ?? '-' }}" readonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-2 row">
                                                    <label class="col-md-4 col-form-label" for="name_of_supervisor"><b>NAME
                                                            OF PRINCIPAL SUPERVISOR:
                                                            <span class="error">*</span></b></label>
                                                    <div class="col-md-7">
                                                        <input type="text" id="name_of_supervisor"
                                                            name="name_of_supervisor" class="form-control"
                                                            placeholder="Enter name of supervisor"
                                                            value="{{ $application->get_supervisor_details->supervisor_name ?? '-' }}"
                                                            readonly />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-2 row">
                                                    <label class="col-md-4 col-form-label"
                                                        for="name_of_cosupervisor"><b>NAME OF CO-SUPERVISOR: <span
                                                                class="error">*</span></b></label>
                                                    <div class="col-md-8">
                                                        <input type="text" id="name_of_cosupervisor"
                                                            name="name_of_cosupervisor" class="form-control"
                                                            placeholder="Enter name of co-supervisor"
                                                            value="{{ $application->get_supervisor_details->co_supervisor_name ?? '-' }}"
                                                            readonly />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class=" col-form-label"><b>BRANCH/ SPECIALIZATION<span
                                                            class="error">*</span>: </b></label>
                                            </div>
                                            <div class="col-md-10 mb-3">
                                                <input type="text" id="branch" name="branch" class="form-control"
                                                    placeholder="Enter name of branch"
                                                    value="{{ $application->get_department_details->departments_title ?? '-' }}"
                                                    readonly />
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-2 row">
                                                    <label class="col-md-4 col-form-label" for="caste_status"><b>CASTE
                                                            STATUS:
                                                            <span class="error">*</span></b></label>
                                                    <div class="col-md-7">
                                                        <input type="text" id="caste_status" name="caste_status"
                                                            class="form-control" placeholder="Enter your caste"
                                                            value="{{ $application->category ?? '-' }}" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-2 row">
                                                    <div class="col-md-4">
                                                        <label class="col-form-label" for="student_category"><b>CATEGORY
                                                                OF STUDENTSHIP: <span class="error">*</span></b></label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" id="student_category"
                                                            name="student_category" class="form-control"
                                                            placeholder="Enter student category"
                                                            value="{{ $application->student_category ?? '-' }}"
                                                            readonly />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class=" col-form-label"><b>NAME OF NCR<span
                                                            class="error">*</span>: </b></label>
                                            </div>
                                            <div class="col-md-10 mb-3">

                                                <input type="text" id="name_of_ncr" name="name_of_ncr"
                                                    class="form-control" placeholder="Enter name of ncr"
                                                    value="{{ $application->get_nodal_center_details->college_name ?? '-' }}"
                                                    readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label class=" col-form-label"><b>PROPOSED TITLE OF PHD THESIS<span
                                                            class="error">*</span>: </b></label>
                                            </div>
                                            <div class="col-md-10 mb-3">

                                                <input type="text" id="thesis_title" name="thesis_title"
                                                    class="form-control" placeholder="Enter thesis title"
                                                    value="{{ $application->topic_of_phd_work ?? '-' }}" readonly />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class=" col-form-label"><b>BRIEF DESCRIPTION OF RESEARCH WORK
                                                        PROPOSED<span class="error">*</span>: </b></label>
                                            </div>
                                            <div class="col-md-8 mb-3">
                                                <textarea class="form-control" id="research_description" rows="3" name="research_description" required>{{ $application->get_coursework_details->work_brief_desc ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="col-form-label"><b>MAJOR EQUIPMENT/ FACILITIES NECESSARY TO
                                                        CARRY OUT PROJECT AND MEANS OF OBTAINING THEM:<span
                                                            class="error">*</span></b></label>
                                            </div>
                                            <div class="col-md-8 mb-3">
                                                <textarea class="form-control" id="equipment_facility" rows="3" name="equipment_facility" required>{{ $application->get_coursework_details->equip_brief_desc ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class=" col-form-label"><b>PLAN OF RESIDENCE ON CAMPUS<span
                                                            class="error">*</span>: </b></label>
                                            </div>
                                            <div class="col-md-8 mb-3">
                                                <textarea class="form-control" id="residence" rows="3" name="residence" required>{{ $application->get_coursework_details->residence_plan_desc ?? '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="mt-2 text-center">
                                            <button type="submit" class="text-uppercase submit">Submit</button>
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
