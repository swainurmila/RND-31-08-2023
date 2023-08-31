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
    </style>
    <div class="row">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="section-title form-section-title mb-3">
                        <h3 class="text-center"><b>Application and Recommendation of DSC For Provisional Registration to
                                Ph.D
                                Degree</b>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form id="provisionalForm" method="POST" action="{{ route('provisional_reg_update', $provisional->id) }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    <div class="mb-2 row"><label class="form-label col-form-label col-md-4">1. Name of
                                            the Student :</label>
                                        <div class="col-md-8">
                                            <div><input type="text" class="form-control" value="{{ $info->name }}"
                                                    name="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 row"><label class="form-label col-form-label col-md-4">2.
                                            Father/Husband's
                                            Name :</label>
                                        <div class="col-md-8">
                                            <div><input type="text" class="form-control"
                                                    value="{{ $info->father_husband }}" name="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 row"><label class="form-label col-form-label col-md-4">3. Address
                                            for
                                            Correspondence :</label>
                                        <div class="col-md-8">
                                            <div>
                                                <textarea name="textarea" rows="4" type="textarea" id="textarea" class="form-control" readonly>{{ $info->permannt_address }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 row"><label class="form-label col-form-label col-md-4">4. Faculty
                                            (Engg./Pharm. Etc.) :</label>
                                        <div class="col-md-8">
                                            <div>
                                                <input type="text" class="form-control"
                                                    value="{{ $info->name_of_faculty }}" name="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 row"><label class="form-label col-form-label col-md-4">5.
                                            Discipline/
                                            Specialization : </label>
                                        <div class="col-md-8">
                                            <div>
                                                <input type="text" class="form-control"
                                                    value="{{ $info->departments_title }}" name="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 row"><label class="form-label col-form-label col-md-4">6. NCR to
                                            which
                                            admitted :</label>
                                        <div class="col-md-8">
                                            <div>
                                                <input type="text" class="form-control" value="{{ $info->college_name }}"
                                                    name="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 row"><label class="form-label col-form-label col-md-4">7. Date of
                                            Birth
                                            :</label>
                                        <div class="col-md-8">
                                            <div>
                                                <input type="date" class="form-control" value="{{ $info->dob }}"
                                                    name="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 row"><label class="form-label col-form-label col-md-4">8. Category
                                            (GEN
                                            /SC
                                            /
                                            ST):</label>
                                        <div class="col-md-8">
                                            <div>
                                                <input type="text" class="form-control" value="{{ $info->category }}"
                                                    name="" readonly>
                                                {{-- <select class="form-select form-control"
                                                    aria-label="Default select example">
                                                    <option selected>Category</option>
                                                    <option value="1">ST</option>
                                                    <option value="2">SC</option>
                                                    <option value="3">GEN</option>

                                                </select> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 row"><label class="form-label col-form-label col-md-4">9. Title of
                                            Ph.D.
                                            Work :</label>
                                        <div class="col-md-8">
                                            <div>
                                                <input type="text" class="form-control"
                                                    value="{{ $info->topic_of_phd_work }}" name="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 row"><label class="form-label col-form-label col-md-4">10. Category
                                            of
                                            studentship :</label>
                                        <div class="col-md-8">
                                            <div>
                                                <input type="text" class="form-control"
                                                    value="{{ $info->student_category }}" name="" readonly>
                                                {{-- <select class="form-select form-select form-control"
                                                    aria-label=".form-select example">
                                                    <option selected>FulI Time</option>
                                                    <option value="1">Part Time</option>
                                                    <option value="2">Full Time Special</option>
                                                </select> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 row"><label class="form-label col-form-label col-md-4">11.
                                            Enrollment
                                            Number
                                            :</label>
                                        <div class="col-md-8">
                                            <div>
                                                <input type="text" class="form-control"
                                                    value="{{ $info->enrollment_no }}" name="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 row"><label class="form-label col-form-label col-md-4">12.
                                            Enrollment
                                            Date : </label>
                                        <div class="col-md-8">
                                            <div>
                                                <input type="date" class="form-control"
                                                    value="{{ $info->enrollment_date }}" name="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 row"><label class="form-label col-form-label col-md-4">13.
                                            Registration Number :</label>
                                        <div class="col-md-8">
                                            <div>
                                                <input type="text" class="form-control" value="-" name=""
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2 row"><label class="form-label col-form-label col-md-4">14.
                                            Registration Date : </label>
                                        <div class="col-md-8">
                                            <div>
                                                <input type="text" class="form-control" value="-" name=""
                                                    readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 row"><label class="form-label col-form-label col-md-4">15.
                                            Earliest
                                            date of thesis Submission :<br> </label>
                                        <div class="col-md-8">
                                            <div>
                                                <input type="text" class="form-control"
                                                    value="{{ $provisional->thesis_submission_date }}"
                                                    name="thesis_submission_date" readonly>
                                                <small class="form-text text-danger">[ 3 yrs w.e.f. date of enrollment,
                                                    for
                                                    (full time), 3 & 1/2 yrs, for (part time) candidates ] </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-2 row"><label class="form-label col-form-label col-md-4">16. Name
                                            of
                                            Supervisor(s) :
                                        </label>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-2 mt-1">
                                                    <span>(1) :
                                                </div>
                                                <div class="col-md-10">
                                                    </span> <span><input type="text" class="form-control"
                                                            value="{{ $info->supervisor_name }}" name=""
                                                            readonly></span>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <br>
                                                <div class="col-md-2">
                                                    <span>(2) :
                                                </div>
                                                <div class="col-md-10">
                                                    </span> <span><input type="text" class="form-control"
                                                            value="" name="" readonly></span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="mb-2 row"><label class="form-label col-form-label col-md-4">17. Course
                                            Work Completed:<br> </label>
                                        <div class="col-md-8">
                                            <div>
                                                <input class="form-check-input" type="radio" name="course_completed"
                                                    id="course_completed" value="1"
                                                    {{ $provisional->course_completed == 1 ? 'checked' : '' }} required>
                                                <b>Yes</b>&nbsp;&nbsp;
                                                <input class="form-check-input" type="radio" name="course_completed"
                                                    id="course_completed" value="0"
                                                    {{ $provisional->course_completed == 0 ? 'checked' : '' }} required>
                                                <b>No</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h4>COURSE WORK LIST</h4>
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
                                    <td><input type="text" class="form-control" value="{{ $val->grades }}"
                                            name="grades[]" id="grades" required></td>
                                    <td><input type="date" class="form-control" value="{{ $val->passing_date }}"
                                            name="passing_date[]" id="passing_date" required></td>
                                    <td><input type="text" class="form-control" value="{{ $val->passing_remark }}"
                                            name="passing_remark[]" required></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="2"><b>TOTAL CREDIT COMPLETED</b></td>
                                <td colspan="5"><input type="text" class="form-control"
                                        value="{{ $provisional->credit_completed }}" name="credit_completed"
                                        id="credit_completed" required></td>
                            </tr>
                        </table>
                        <h5>GRADE SHEET</h5>
                        <div class="col-md-4">
                            <a href="javascript:void(0);" onclick="upload_image_view('{{ $provisional->grade_sheet }}')"
                                title="View NCR Payment Receipt">
                                View Grade Sheet
                            </a><br>
                            <input type="hidden" class="form-control"
                                    value="{{ $provisional->grade_sheet }}" name="grade_sheet_old" id="grade_sheet" >
                            <span>Upload Grade Sheet:</span><span><input type="file" class="form-control"
                                    value="" name="grade_sheet" id="grade_sheet" ></span>
                        </div>
                        <br>
                        <hr>
                        <div class="row mb-4">
                            <label>
                                <input type="checkbox" name="undertaking" value="1" required>
                                &nbsp;Sir, I have completed all the required for Ph.D provisional registration and
                                request you to allot a registration number.
                            </label>
                        </div>

                        <div class="row mt-4 mb-2">
                            <div class="sumb_btn text-center">
                                <input class="btn btn-primary" type="submit" value="SUBMIT">
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
