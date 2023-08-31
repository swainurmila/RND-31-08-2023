@extends('admin.layouts.app')
@section('heading', 'SEMESTER PROGRESS REPORT')
@section('sub-heading', 'SEMESTER PROGRESS REPORT')
@section('content')
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 30px;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 15px;
        }

        .panel-content {
            padding: 40px 30px;
            border: 2px solid #ccc;
        }

        .status {
            justify-content: space-between;
        }
    </style>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
    <div class="row">
        <div class="col-lg-12">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="panel-container show" role="content">
                            <div class="panel-content" style="padding: 20px 30px; ">
                                <div class="section-title form-section-title mb-3">
                                    <h3 class="text-center"><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA,
                                            ROURKELA</b></h3>
                                    <h5 class="text-center"><b>SEMESTER PROGRESS REPORT
                                            {{ date('Y') }}</b></h5>
                                </div>

                                <div class="row semester">


                                    <table>
                                        <tr>
                                            <th style="width:33.33%">Semester</th>
                                            <th>Year</th>
                                            <th>Date</th>
                                        </tr>
                                        <tr>
                                            <td>Semester {{ $student_sem_detaills->sem }}</td>
                                            <td>{{ $student_sem_detaills->year }}</td>
                                            <td>{{ $student_sem_detaills->date }}</td>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr>
                                            <th>Name of the Research Student</th>
                                            <td>
                                                {{ $student_sem_detaills->name }}
                                            </td>
                                            <th>Name of the Faculty</th>
                                            <td>
                                                {{ $student_sem_detaills->faculty_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Topic of Ph.D. work</th>
                                            <td>
                                                {{ $student_sem_detaills->phd_work }}
                                            </td>
                                            <th>Name of the NCR <br> where research is being conducted</th>
                                            <td>
                                                {{ $student_sem_detaills->college_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Enrollment No. </th>
                                            <td>
                                                {{ $student_sem_detaills->enrollment_no }}
                                            </td>
                                            <th>Date of Enrollment</th>
                                            <td>
                                                {{ $student_sem_detaills->enrollment_date }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Registration. No.</th>
                                            <td>
                                                {{ $student_sem_detaills->reg_no ? $student_sem_detaills->reg_no : '-'}}
                                            </td>
                                            <th>Date of Registration.</th>
                                            <td>
                                                {{ $student_sem_detaills->reg_date }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                <h5>Research Supervisor name</h5>
                                            </th>
                                            <td colspan="3">
                                                1.)<span style="text-transform: capitalize;">
                                                    {{ $supervisor->sup_name }}</span>
                                                <br>
                                                <br>
                                                2.) @if ($cosupervisor)
                                                    <span
                                                        style="text-transform: capitalize;">{{ $cosupervisor->cosupsup_name }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                    <p><b>1. PROGRESS AGAINST PLANNED WORK</b></p>
                                    <table>
                                        <tr>
                                            <th rowspan="2">Semester/Half-Year after Registration</th>
                                            <th colspan="2">Duration</th>
                                            <th rowspan="2">Planned work</th>
                                            <th rowspan="2">Actual Work</th>
                                        </tr>
                                        <tr>
                                            <td>From </td>
                                            <td>To</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $student_sem_detaills->semester }}</td>
                                            <td>{{ $student_sem_detaills->form_date }}</td>
                                            <td>{{ $student_sem_detaills->to_date }}</td>
                                            <td>
                                                {{ $student_sem_detaills->planned_work }}
                                            </td>
                                            <td>
                                                {{ $student_sem_detaills->actual_work }}
                                            </td>
                                        </tr>
                                    </table>
                                    <table>
                                        <tr>
                                            <th>2. Brief Description of work done in the preceding semester</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $student_sem_detaills->desc_work }}</td>
                                        </tr>
                                    </table>
                                    <p><b>3. DETAILS OF PUBLICATION</b></p>
                                    <table>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>Authors</th>
                                            <th>Title of the paper</th>
                                            <th>Journal / conferences</th>
                                            <th>Volume & No / Venue & Dates</th>
                                            <th>Page No.</th>
                                            <th>Copy attached(YES / NO)</th>
                                        </tr>

                                        @foreach ($sem_publication as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->author }} </td>
                                                <td>{{ $item->title_paper }}</td>
                                                <td>{{ $item->journal }}</td>
                                                <td>{{ $item->vol_no }}</td>
                                                <td>{{ $item->page_no }}</td>
                                                <td>
                                                    <a href="javascript:void(0);"
                                                        onclick="view_file('/upload/semester/publication/{{ $item->attach_file }}')">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                    <table>
                                        <tr>
                                            <th>4. Difficulties Encountered:</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $student_sem_detaills->difficulties_encounter }}</td>
                                        </tr>
                                    </table>
                                </div>
                               
                                <form method="post" action="{{ route('sup.semester.store', [$id]) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @if ($student_sem_detaills->status == 1)
                                    <div class="row mb-4">
                                        <label>
                                            <input type="checkbox" name="terms" value="1" required>
                                            Certified that the student has fulfilled the residential requiremwnt in the
                                            preceding semester and the performance and progress of the Research Student is:
                                            Satisfactory / Not Satisfactory.
                                        </label>
                                    </div>
                                    @endif

                                    <div class="row">
                                        @if ($student_sem_detaills->status == 1)
                                            <div class="col-md-2">
                                                <span>Recommendation of Supervisor:</span>
                                            </div>
                                            <div class="col-md-3">
                                                <select name="status" 
                                                    class="form-control" required>
                                                    <option value="">--------select--------</option>
                                                    <option value="2">Satisfactory</option>
                                                    <option value="3">Not Satisfactory</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <span>Comment:</span>
                                            </div>
                                            <div class="col-md-5">
                                                <textarea name="remarks" id="remarks" class="form-control" cols="30" rows="2"
                                                    placeholder="{{ $student_sem_detaills->supervisor_remarks }}Enter Semester remarks here..." value=""
                                                    required></textarea>
                                            </div>
                                        @else
                                            <table class="table table-bordered coursework-form-display-table">
                                                <tr class="trbg">
                                                    <th>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <h5>Supervisor Remark on Semester Progress Report:</h5>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <h5> {{ $student_sem_detaills->supervisor_remarks }}</h5>
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </table><br>
                                        @endif

                                    </div><br>

                                    <div class="text-center">
                                        {{-- <input type="hidden" name="coursework_id" id="coursework_id"
                                        value="{{ $details->id }}" />
                                    <input type="hidden" name="appl_id" id="appl_id"
                                        value="{{ $details->appl_id }}" /> --}}


                                        @if ($student_sem_detaills->status == 1)
                                            <input type="submit"
                                                class="btn btn-primary text-uppercase text-center coursework-save"
                                                value="Submit" />
                                        @endif
                                        <a class="btn btn-block btn-primary" href="{{ url()->previous() }}">Back</a>
                                    </div>
                                </form>
                               





                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="upload_image_view" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollableModalTitle">View Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="view_upload_image">
                        {{-- <img src="" alt="Upload_img" class="img-responsive card-img-top" id="view_upload_image">
                                                            <embed src="" frameborder="0" width="100%" id="view_upload_image" height="400px"> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



@endsection

@section('js')
    <script>
        function view_file(url) {
            // alert(url);
            event.preventDefault();
            $('#view_upload_image').html('<embed src="' + url +
                '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
            $('#upload_image_view').modal('show');
        }

        function view_dsc() {
            // alert(url);
            event.preventDefault();
            $('#view_dsc').modal('show');
        }
    </script>

@endsection
