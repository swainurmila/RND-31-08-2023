@extends('admin.layouts.app')
@section('heading', '')
@section('sub-heading', '')
@section('content')
    <style>
        .table>:not(caption)>*>* {
            padding: .85rem .85rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: none !important;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            margin-bottom: 30px;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 10px;
        }

        .row {
            font-size: 14px;
        }
    </style>
    <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="section-title form-section-title mb-3">
                            <h3 class="text-center"><b>Recommendation of Supervisor For Provisional Registration to Ph.D
                                    Programme of BPUT</b>
                            </h3>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    <div class="border border-purple mb-4 card">
                                        <div class="card-header">
                                            <h4 class="text-purple">STUDENT DETAILS</h4>
                                        </div>
                                        <div class="text-secondary card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <b> Name of the Student :</b>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{ $info->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <b> Father/Husband's Name :</b>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{ $info->father_husband }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <b>Address :</b>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{ $info->permannt_address }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <b> Faculty (Engg./Pharm. Etc.) :</b>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{ $info->name_of_faculty }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <b> Discipline/ Specialization :</b>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{ $info->departments_title }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <b> Nodal Center</b>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{ $info->college_name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <b> Date of Birth:</b>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{ $info->dob }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <b> Category:</b>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{ $info->category }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <b> Title of Ph.D. Work :</b>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{ $info->topic_of_phd_work }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <b>Category of Studentship :</b>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{ $info->student_category }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <b>Enrollment No. :</b>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{ $info->enrollment_no }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <b>Enrollment Date :</b>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{ $info->enrollment_date }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <b> Date of Thesis Submission :</b>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{ $provisional->thesis_submission_date }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <b> Name of Supervisor(s)</b>
                                                        </div>
                                                        <div class="col-md-8">
                                                            {{ $info->supervisor_name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <b> Course Work Completed :</b>
                                                        </div>
                                                        <div class="col-md-8">
                                                            @if ($provisional->course_completed == 1)
                                                                YES
                                                            @else
                                                                NO
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    {{-- </div>
                                    <div class="border border-purple mb-4 card"> --}}
                                        <div class="card-header">
                                            <h4 class="text-purple">COURSE WORK</h4>
                                        </div>
                                        <div class="text-secondary card-body">
                                            <table>
                                                <tr>
                                                    <th>Serial No.</th>
                                                    <th>List of Coursework Assigned</th>
                                                    <th>Credits</th>
                                                    <th>Courese Title</th>
                                                    <th>Grades</th>
                                                    <th>Date of passing</th>
                                                    <th>Remarks</th>
                                                </tr>
                                                @foreach ($coursework_sub as $key => $val)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $val->subject_code }}</td>
                                                        <td>{{ $val->credits }}</td>
                                                        <td>{{ $val->course_title }}</td>
                                                        <td>{{ $val->grades }}</td>
                                                        <td>{{ $val->passing_date }}</td>
                                                        <td>{{ $val->passing_remark }}</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="2"><b>TOTAL CREDIT COMPLETED</b></td>
                                                    <td colspan="5">{{ $provisional->credit_completed }}</td>
                                                </tr>
                                            </table>
                                            <h5>GRADE SHEET</h5>
                                            <div class="col-md-4">
                                                <span>Upload Grade Sheet:</span><span><a href="javascript:void(0);"
                                                        onclick="upload_image_view('{{ $provisional->grade_sheet }}')"
                                                        title="View NCR Payment Receipt">
                                                        View Grade Sheet
                                                    </a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <br>
                        <form method="post" action="{{ route('provisional-registration-submit', [$id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @if ($provisional->status == 1)
                                    <div class="col-md-2">
                                        <span>Recommendation of Supervisor:</span>
                                    </div>
                                    <div class="col-md-3">
                                        <select name="status" class="form-control" required>
                                            <option value="">--------select--------</option>
                                            <option value="2">Satisfactory</option>
                                            <option value="3">Not Satisfactory</option>
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <span>Comment:</span>
                                    </div>
                                    <div class="col-md-6">
                                        <textarea name="sup_remark" id="sup_remark" class="form-control" cols="30" rows="2"
                                            placeholder="{{ $provisional->sup_remark }}Enter Provisional registration remarks here..." required></textarea>
                                    </div>
                                @else
                                    <table class="table table-bordered coursework-form-display-table">
                                        <tr class="trbg">
                                            <th>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <h5>Supervisor Remark on Provisional Registration:</h5>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <h5> {{ $provisional->sup_remark }}</h5>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    </table><br>
                                @endif
                            </div>
                            <div class="row mt-4 mb-2">
                                <div class="sumb_btn text-center">
                                    @if ($provisional->status == 1)
                                        <input type="submit"
                                            class="btn btn-primary text-uppercase text-center coursework-save"
                                            value="Submit" />
                                    @else
                                        <a href="{{ url()->previous() }}"
                                            class="btn btn-primary waves-effect waves-light me-1"> Back</a>
                                    @endif
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal" tabindex="-1" id="upload_image_view">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close text-red" data-bs-dismiss="modal"
                        aria-label="Close"></button>
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
