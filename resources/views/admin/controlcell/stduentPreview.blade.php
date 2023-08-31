@include('admin.layouts.header')
@include('admin.partials.navigation')
@include('admin.partials.sidebar')
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            @include('admin.partials.breadcrumb')
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <!-- cta -->
                                    <div class="panel-container show" role="content">
                                        <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                                        <div class="panel-content">


                                            <form action="{{ route('rndcell.prev_student_subm', [$id]) }}"
                                                method="post" class="comm_frm prev_wrap">
                                                @csrf

                                                {{-- <input type="submit"> --}}

                                                <div class="input_wrap preview_form">
                                                    <h3><b>Preview Claim Information</b> </h3>

                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>candidate Name:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">{{ $student->name }}</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Academic Programme:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="form-label">{{ $student->academic_programme }}</label>
                                                        </div>

                                                    </div>



                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>Name of NCR and Department:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="form-label">{{ $student->ncr_department }}</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Father's / Husband's Name:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="form-label">{{ $student->father_husband }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>Mother's Name:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">{{ $student->mother }}</label>
                                                        </div>


                                                    </div>

                                                    <hr>

                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>Permanent Address:</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <label
                                                                class="form-label">{{ $student->permannt_address }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Present address:</label>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <label
                                                                class="form-label">{{ $student->present_address }}</label>
                                                        </div>
                                                    </div>

                                                    <hr>
                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>Email:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">{{ $student->email }}</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Phone No:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">{{ $student->phone }}</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>Date of Birth:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">{{ $student->dob }}</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Nationality:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="form-label">{{ $student->nationality }}</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>Student Category:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="form-label">{{ $student->student_category }}</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Category:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">{{ $student->category }}</label>
                                                        </div>
                                                    </div>





                                                    <hr>






                                                </div>

                                                <div class="input_wrap preview_form">
                                                    <h3><b>Information Respect To Qualification</b></h3>


                                                    <div class="row">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sl No.</th>
                                                                        <th>Exam Passed</th>
                                                                        <th>Specialization</th>
                                                                        <th>Board / University</th>
                                                                        <th>Year Of Passing</th>
                                                                        <th>Class / Division</th>
                                                                        <th>% Marks/ CGPA</th>
                                                                        <th>Certificate</th>
                                                                        <th>status</th>
                                                                        <th>Remarks</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($student_qualifications as $key => $value)
                                                                    
                                                                        <tr>
                                                                            <td>{{ ++$key }}</td>
                                                                            <td>{{ $value->exam_passed }}</td>
                                                                            <td>{{ $value->Specialization }}</td>
                                                                            <td>{{ $value->board_university }}</td>
                                                                            <td>{{ $value->year_of_passing }}</td>
                                                                            <td>{{ $value->division }}</td>
                                                                            <td>{{ $value->percentage }}</td>
                                                                            <td>
                                                                                {{-- <a href="{{ asset('upload/phdstudent') }}/{{$value->certificate}}" target="_blank">View</a> --}}
                                                                                <a href="javascript:void(0)"
                                                                                    onclick="upload_image_view('/upload/phdstudent/{{ $value->certificate }}')">
                                                                                    View Upload File</a>
                                                                            </td>
                                                                            <td>
                                                                                {{ $value->data_status}}
                                                                              
                                                                            </td>
                                                                            <td>
                                                                                {{ $value->control_cell_remarks }}
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="input_wrap preview_form">
                                                    <h3><b>Organisation where working (if employed)</b></h3>


                                                    <div class="row">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Sl No.</th>
                                                                        <th>Organisation Name</th>
                                                                        <th>Designation</th>
                                                                        <th>Duration</th>
                                                                        <th>Nature Of Job</th>
                                                                        <th>N.O.C</th>
                                                                        <th>status</th>
                                                                        <th>Remarks</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($organisation as $key => $value)
                                                                        <tr>
                                                                            <td>{{ ++$key }}</td>
                                                                            <td>{{ $value->organisation_name }}</td>
                                                                            <td>{{ $value->designation }}</td>
                                                                            <td>{{ $value->duration }}</td>
                                                                            <td>{{ $value->natutre_of_job }}</td>
                                                                            <td>
                                                                                {{-- <a href="{{ asset('upload/phdstudent') }}/{{$value->noc_certificate}}" target="_blank">View</a> --}}
                                                                                <a href="javascript:void(0)"
                                                                                    onclick="upload_image_view('/upload/phdstudent/{{ $value->noc_certificate }}')">
                                                                                    View Upload File</a>
                                                                            </td>
                                                                            <td>
                                                                                {{ $value->data_status }}
                                                                            </td>
                                                                            <td>
                                                                                {{ $value->control_cell_remarks }}
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                                <hr>
                                                <div class="input_wrap preview_form">
                                                    <h3><b>Other Details</b></h3>
                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>Title of the Ph.D work:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">111156789</label>
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>Proposed Supervisor Name:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="form-label">{{ $supervisor->supervisor_name }}</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Supervisor Address:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="form-label">{{ $supervisor->supervisor_address }}</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>Supervisor E-Mail Id:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="form-label">{{ $supervisor->supervisor_email }}</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Supervisor Phone:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="form-label">{{ $supervisor->supervisor_phone }}</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>Proposed Co-Supervisor Name:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="form-label">{{ $supervisor->co_supervisor_name }}</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Co-Supervisor E-Mail:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="form-label">{{ $supervisor->co_supervisor_email }}</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-3">
                                                            <label>Co-Supervisor Address :</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="form-label">{{ $supervisor->co_supervisor_address }}</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Co-Supervisor Phone :</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label
                                                                class="form-label">{{ $supervisor->co_supervisor_phone }}</label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="input_wrap preview_form">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Photo:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label"><a href="javascript:void(0)"
                                                                    onclick="upload_image_view('/upload/photo/{{ $student->photo }}')">
                                                                    View File</a></label>

                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Signature:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label"><img src=""
                                                                    alt="">
                                                                <img style="max-width: 150px;"
                                                                    src="{{ URL::asset('upload/signature/' . $student->signature) }}"
                                                                    alt="">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr>
                                                <div class="input_wrap preview_form">   
                                                    <div class="row">
                                                    {{-- <div class="col-md-4">
                                                        Status:
                                                        <select name="stu_certi_status" class="form-control" required>
                                                            <option value="">select</option>
                                                            <option value="Processed"
                                                                {{ $student->data_status == 'Processed' ? 'selected' : '' }}>
                                                                Processed</option>
                                                            <option value="Verified"
                                                                {{ $student->data_status == 'Verified' ? 'selected' : '' }}>
                                                                Verified</option>
                                                            <option
                                                                {{ $student->data_status == 'Objected' ? 'selected' : '' }}
                                                                value="Objected">Objected</option>
                        
                                                        </select>
                                                    </div> --}}
                                                    
                                                    {{-- <div class="col-md-4">
                                                        Remark:
                                                        {{ $student->control_cell_remarks }}
                                                                               
                                                    </div>                 --}}
                                                </div>  
                                                <div class="input_wrap preview_form">


                                                    <div class="row">
                                                        <div class="form-group">
                                                            <label
                                                                style="width: 100%;font-weight: 700; margin-bottom: 10px;">
                                                                Remarks:</label>
                                                            <textarea class="rema form-control"
                                                                style="width: 80%; box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; border: none; margin-bottom: 20px;"
                                                                name="super_remark" readonly>{{ $student->control_cell_remarks }}</textarea>
                                                        </div>
                                                        

                                                       
                                                        


                                                    </div>
                                                    <div class="border border-primary"></div>
                                                    <div class="row">

                                                        <div class="cust-print">

                                                            {{-- <button type="submit"
                                                                    class="btn btn-success waves-effect waves-themed">SUBMIT</button> --}}

                                                            <button type="submit"
                                                                class="btn btn-success waves-effect waves-themed">submit</button>

                                                            <a href="{{ route('rndcell.draft_student', [$id]) }}"
                                                                class="btn btn-success waves-effect waves-themed float-right">Back</a>
                                                        </div>
                                                    </div>
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
        </div>
    </div>
</div>
<div class="modal fade" id="upload_image_view" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="scrollableModalTitle">Modal title</h5>
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
@include('admin.layouts.footer');
<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->


<script>
    function upload_image_view(url) {
        // alert(url);
        event.preventDefault();
        $('#view_upload_image').html('<embed src="' + url +
            '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
        $('#upload_image_view').modal('show');
    }
</script>








{{-- @section('js')
@endsection --}}
