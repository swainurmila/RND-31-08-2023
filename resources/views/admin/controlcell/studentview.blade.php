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


                                            <form action="{{ route('rndcell.draft_student_store', [$id]) }}"
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
                                                                        @if ($student->control_cell_status == 1)
                                                                        <th>status</th>
                                                                        <th>Remarks</th>
                                                                        @endif
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($student_qualifications as $key => $value)
                                                                    <input type="hidden" name="student_qualifications[]"
                                                                    value="{{ $value->id }}" />
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
                                                                            @if ($student->control_cell_status == 1)
                                                                            <td>
                                                                                <select name="stu_quali_status[]"
                                                                                    class="form-control processed status-width"
                                                                                    required style="width:120px">
                                                                                    <option value="">select
                                                                                    </option>
                                                                                    <option
                                                                                        {{ $value->data_status == 'Processed' ? 'selected' : '' }}
                                                                                        value="Processed">Processed
                                                                                    </option>

                                                                                    <option
                                                                                        {{ $value->data_status == 'Objected' ? 'selected' : '' }}
                                                                                        value="Objected">Objected
                                                                                    </option>

                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <textarea name="stu_quali_remarks[]" class="form-control" required style="width:120px">{{ $value->control_cell_remarks }}</textarea>
                                                                            </td>
                                                                            @endif
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
                                                                        @if ($student->control_cell_status == 1)
                                                                        <th>status</th>
                                                                        <th>Remarks</th>
                                                                        @endif
                                                                        
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($organisation as $key => $value)
                                                                    <input type="hidden" name="organisation[]"
                                                                    value="{{ $value->id }}" />
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
                                                                            @if ($student->control_cell_status == 1)
                                                                            <td>
                                                                                <select name="stu_org_status[]"
                                                                                    class="form-control processed status-width"
                                                                                    required style="width:120px">
                                                                                    <option value="">select
                                                                                    </option>
                                                                                    <option
                                                                                        {{ $value->data_status == 'Processed' ? 'selected' : '' }}
                                                                                        value="Processed">Processed
                                                                                    </option>

                                                                                    <option
                                                                                        {{ $value->data_status == 'Objected' ? 'selected' : '' }}
                                                                                        value="Objected">Objected
                                                                                    </option>

                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <textarea name="stu_org_remarks[]" class="form-control" required style="width:120px">{{ $value->control_cell_remarks }}</textarea>
                                                                            </td>
                                                                            @endif
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
                                                <div class="input_wrap">   
                                                    <div class="row">
                                                    <div class="col-md-4">
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
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                        Remark:
                                                        <textarea name="stu_certi_remarks" class="form-control" required >{{ $student->control_cell_remarks }}
                                                                                </textarea>
                                                    </div>                
                                                </div>  
                                                <div class="input_wrap ">
                                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked" checked required>
                                        <label class="custom-control-label" for="defaultUnchecked" >I agree and review the declaration / terms &amp;conditions</label>
                                    </div>

                                                    {{-- <div class="row">
                                                        <div class="form-group">
                                                            <label
                                                                style="width: 100%;font-weight: 700; margin-bottom: 10px;">
                                                                Remarks:</label>
                                                            <textarea class="rema form-control"
                                                                style="width: 80%; box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; border: none; margin-bottom: 20px;"
                                                                name="super_remark">{{ $student->control_cell_remarks }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                    <label style="width: 100%;font-weight: 700; margin-bottom: 10px;">Chairperson Remarks:</label>
                                    <textarea class="rema" style="width: 80%; box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; border: none; margin-bottom: 20px;" name="chair_remark"  disabled >{{$student->chairperson_remarks}}</textarea>
                                </div>

                                                        <div class="form-group">
                                    <label style="width: 100%;font-weight: 700; margin-bottom: 10px;">Status:</label>
                                    <select class="custom-select" @if ($student->vicechancellor_status != '')disabled @endif id="vice_status" name="vice_status" style="width: 80%;">
                                        <option value="">Select Status</option>
                                        <option value="1" @if ($student->vicechancellor_status = 1) selected @endif>approved</option>
                                        <option value="0"@if ($student->vicechancellor_status = 0) selected @endif >Rejected</option>
                                    </select>
                                    
                                </div>
                                                        <div class="form-group">
                                    <label style="width: 100%;font-weight: 700; margin-bottom: 10px;">Remarks:</label>
                                    <textarea class="rema" style="width: 80%; box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; border: none; margin-bottom: 20px;" name="vice_remark" @if ($student->vicechancellor_remark != '') disabled @endif  required >{{$student->vicechancellor_remark}}</textarea>
                                </div>


                                                    </div> --}}
                                                    <div class="border border-primary"></div>
                                                    <div class="row">

                                                        <div class="cust-print">

                                                            {{-- <button type="submit"
                                                                    class="btn btn-success waves-effect waves-themed">SUBMIT</button> --}}
                                                         @if ($student->control_cell_status == 1)
                                                            <button type="submit"
                                                                class="btn btn-success waves-effect waves-themed">Save
                                                                As Draft</button>
                                                        
                                                                @endif
                                                                {{-- <a href="{{route('vc.preview_supervisor',[$id])}}" class="btn btn-success waves-effect waves-themed">Preview</a> --}}

                                                            {{-- <a href="{{ route('PhdCell.index') }}"
                                                                class="btn btn-success waves-effect waves-themed float-right">Back</a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </form>

                                            @if($student->vc_status == 'approve')
                                            <form action="{{route('rndcell.payment_status',[$id])}}"
                                                method="post" class="prev_wrap">
                                                @csrf

                                            <div class="form-check form-switch">
                                                <label class="form-check-label" for="flexSwitchCheckDefault">Active sudent Payment Link</label>
                                                <input class="form-check-input" @if($student->payment_status == 'approve') checked @endif name="payment_status" type="checkbox" id="flexSwitchCheckDefault">
                                                
                                                <button type="submit"
                                                class="btn btn-success waves-effect waves-themed">Activate Payment Link</button>
                                            </div>
                                        </form>
                                        @endif












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
