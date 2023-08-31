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
                             
                                <table class="table table-bordered coursework-form-display-table">
                                    <tr class="trbg">
                                        <th>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <h5>Supervisor Remark :</h5>
                                                </div>
                                                <div class="col-md-9">
                                                    <h5> {{ $student_sem_detaills->supervisor_remarks }}</h5>
                                                </div>
                                            </div>
                                        </th>

                                    </tr>
                                </table>
                                @if($student_sem_detaills->status == 2)
                                <div class="col-md-12">
                                    <span><b>PHD STUDENT SEMESTER PROGRESS REPORT:
                                        </b></span><span><a
                                            href="{{ route('nodalcentre.semester-prog-dsc-letter', $student_sem_detaills->id) }}"
                                            class="badge bg-success text-uppercase">DOWNLOAD</a>
                                    </span>
                                </div><br>
                                @endif
                                <form action="{{ route('nodalcentre.nod.semester.store', [$id]) }}" method="post"
                                id="coursework_form" name="coursework_form" enctype="multipart/form-data">
                                @csrf
                                
                                    @if ($student_sem_detaills->status == 2)
                                        <div class="col-md-12">
                                            <span><b>SEMESTER PROGRESS REPORT RECOMMENDED BY THE DSC AT THE NCR LETTER :
                                                </b></span><span><input type="file" class="file"
                                                    name="dsc_letter" id="dsc_letter" required>
                                            </span>
                                            @if ($errors->has('e-dsc_letter'))
                                            <span class="text-danger">{{ $errors->first('dsc_letter') }}</span>
                                        @endif
                                        </div>
                                    @else
                                        <div class="col-md-12">
                                            <span style="color: red;">&#x2605;</span><span><b>SEMESTER PROGRESS REPORT SIGNED BY THE DSC AT THE NCR LETTER :
                                                </b></span><span>
                                             
                                                <a href="javascript:void(0);"
                                                    onclick="upload_image_view('{{ $student_sem_detaills->dsc_file }}')"
                                                    class="badge bg-success">View Letter</a>
                                            </span>
                                        </div>
                                    @endif
                                    <br><br>
                                    @if ($student_sem_detaills->status == 2)
                                        <div id="resultDiv" class="row">
                                            <div class="col-md-2">
                                                <span>Recommendation of NCR</span>
                                            </div>
                                            <div class="col-md-3">
                                                <select name="status"
                                                    class="form-control" required>
                                                    <option value="">--------select--------</option>
                                                    <option value="4">Recommend</option>
                                                    <option value="5">Not Recommended</option>
                                                </select>
                                            </div>
                                            <div class="col-md-1">
                                                <span>Comment:</span>
                                            </div>
                                            <div class="col-md-5">

                                                <textarea name="remark" id="remark" class="form-control" cols="30"
                                                    rows="2" placeholder="Enter Semester Progress remarks here..." required></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="text-center">
                                            <input type="hidden" name="semester_id" id="semester_id"
                                                value="{{ $student_sem_detaills->id }}" />
                                            <input type="submit" id="submitBtn"
                                                class="btn btn-primary text-uppercase text-center"
                                                value="Submit" />
                                        </div>
                                    @else
                                    <table>
                                        <tr>
                                            <th style="width: 20%">
                                                <h5>Nodal Center Remark:</h5>
                                            </th>
                                            <th><h5>{{ $student_sem_detaills->nodal_remark }}</h5></th>
                                        </tr>
                                    </table>
                                        
                                        <div class="text-center">
                                            <a class="btn btn-block btn-primary"
                                                href="{{ url()->previous() }}">Back</a>
                                        </div>
                                    @endif
                         
                                <div class="text-center">
                                    {{-- <input type="hidden" name="coursework_id" id="coursework_id"
                                        value="{{ $details->id }}" />
                                    <input type="hidden" name="appl_id" id="appl_id"
                                        value="{{ $details->appl_id }}" /> --}}


                                    {{-- <a class="btn btn-block btn-primary" href="{{ url()->previous() }}">Back</a> --}}
                                </div>
                            </form>
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
<script>
    $("#dsc_letter").change(function() {
            //alert(1);
            var fileExtension = ['pdf'];
            var ext = $('#dsc_letter').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['pdf']) == -1) {
                var Error = '<font color="#fd3995"> Please upload pdf file. </font><br>';
                $(this).parent().children('.my-error').html(Error);
                $('#dsc_letter').val('');
                return false;

            } else {
                var imgsize = $('#dsc_letter')[0].files[0].size;

                if (imgsize > 500000) {
                    var Error = '<font color="#fd3995"> Please upload with size 500mb. </font><br>';

                    $(this).parent().children('.my-error').html(Error);
                $('#dsc_letter').val('');
                    return false;
                } else {
                    $('.my-error').html('');
                }
            }
        }); 
</script>
@endsection
