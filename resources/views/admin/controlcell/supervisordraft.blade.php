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
                                    <div class="panel-container show" role="content"><div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                <div class="panel-content">                                 
                

                    <form action="{{ route('rndcell.draft_supervisor',[$id]) }}" method="post" class="comm_frm prev_wrap">
                        @csrf

                        {{-- <input type="submit"> --}}
                        <input type="hidden" value="{{$id}}" name="user_id">
                        <div class="input_wrap preview_form">
                        <h3><b>Preview Supervisor Information</b> </h3>
                   
                                                  <div class="row">
                                                        <div class="col-md-3">
                                                             <label>Full Name:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">{{$supervisors->full_name}}</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                             <label>Faculty:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">{{$supervisors->faculty}}</label>
                                                        </div>    
                                                   </div>
                        
                        
                        
                                                 <div class="row">
        
                                                        <div class="col-md-3">
                                                             <label>Name of the Institution / Organisation with detailed address:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">{{$supervisors->institution_organisation}}</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                             <label>Nature of Present Appointment as Teaacher/Scientist (Full time Regular / Contractual / Part-time / Guest / Resource Person):</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">{{$supervisors->present_appointment}}</label>
                                                        </div>
                                            </div> 
                                                    <div class="row">

                                                        <div class="col-md-3">
                                                             <label>Date of Birth:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">{{$supervisors->dob}}</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Age as on last date of application (in years):</label>
                                                       </div>
                                                       <div class="col-md-3">
                                                           <label class="form-label">{{$supervisors->age}}</label>
                                                       </div>

                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                             <label>Marital Status:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">{{$supervisors->marital_status}}</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Gender:</label>
                                                       </div>
                                                       <div class="col-md-3">
                                                           <label class="form-label">{{$supervisors->gender}}</label>
                                                       </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                             <label>Permanent address:</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <label class="form-label">{{$supervisors->permanent_address}}</label>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Correspondence address:</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <label class="form-label">{{$supervisors->correspondence_address}}</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                             <label>Nationality:</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="form-label">{{$supervisors->nationality}}</label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Aadhar Card No:</label>
                                                       </div>
                                                       <div class="col-md-3">
                                                           <label class="form-label">{{$supervisors->aadhar_no}}</label>
                                                       </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>Disciline & Specialization:</label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <label class="form-label">{{$supervisors->disciline_specialization}}</label>
                                                        </div>
                                                    </div>

                                            <hr>     

                         </div>

                         <div class="input_wrap preview_form">
                            {{-- @if ($beneficiary_details->status == 'Objected')
                                <div class="alert alert-danger" role="alert">
                                    {{ $beneficiary_details->cpa_remarks }}
                                </div>
                            @endif --}}
                            <h3><b>Educational Qualification (from Matriculation onwards):</b></h3>
                                       
                                        
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
                                                   @foreach ($SupervisorQualification as $key => $value)
                                                   <tr>
                                                       <td>{{++$key}}</td>
                                                       <td>{{$value->exam}}</td>
                                                       <td>{{$value->specialization}}</td>
                                                       <td>{{$value->board_university}}</td>
                                                       <td>{{$value->year}}</td>
                                                       <td>{{$value->division}}</td>
                                                       <td>{{$value->percentage}}</td>
                                                       <td><a href="javascript:void(0)"
                                                        onclick="upload_image_view('/upload/supervisor/qualification/{{ $value->certificate }}')">
                                                        View </a></td>
                                                       <td>
                                                        <select name="sup_quali_status[]" class="form-control processed status-width" required style="width:120px">
                                                            <option value="">select</option>
                                                            <option {{ $value->data_status == 'Processed' ? 'selected' : '' }}
                                                                value="Processed">Processed</option>
                                                            
                                                            <option {{ $value->data_status == 'Objected' ? 'selected' : '' }}
                                                                value="Objected">Objected</option>
        
                                                        </select>
                                                       </td>
                                                       <td>
                                                        <textarea name="sup_quali_remarks[]" required style="width:120px">{{ $value->control_cell_remarks }}</textarea>
                                                       </td>
                                                       
                                                   </tr>
                                                   @endforeach
                                                  
                                               </tbody>
                                           </table>
                                        </div>
                                       </div>
                                        
                        </div>

                        <div class="input_wrap preview_form">

                            <div class="row">
                                <div class="col-md-3">
                                    <label>Title of own Ph.D Thesis:</label>
                                </div>
                                <div class="col-md-9">
                                    <label class="form-label">{{$supervisors->phd_thesis}}</label>
                                </div>
                            </div>
                            <h3><b>Details of full time Employment:</b></h3>
                                       
                                        
                                       <div class="row">
                                        <div class="table-responsive">
                                           <table class="table table-bordered">
                                               <thead>
                                                   <tr>
                                                       <th>Sl No.</th>
                                                       <th>Name</th>
                                                       <th>Address</th>
                                                       <th>Designation</th>
                                                       <th>Pay Scale</th>
                                                       <th>From</th>
                                                       <th>To</th>
                                                       <th>Type</th>
                                                       <th>Appointment Date</th>
                                                       <th>Experience Certificate</th>
                                                       <th>status</th>
                                                       <th>Remarks</th>
                                                       
                                                   </tr>
                                               </thead>
                                               <tbody>
                                                   @foreach ($SupervisorEmployment as $key => $value)
                                                   <tr>
                                                       <td>{{++$key}}</td>
                                                       <td>{{$value->name}}</td>
                                                       <td>{{$value->address}}</td>
                                                       <td>{{$value->designation}}</td>
                                                       <td>{{$value->pay_scale}}</td>
                                                       <td>{{$value->from}}</td>
                                                       <td>{{$value->to}}</td>
                                                       <td>{{$value->type}}</td>
                                                       <td>{{$value->appointment_date}}</td>
                                                       <td><a href="javascript:void(0)"
                                                        onclick="upload_image_view('/upload/phdsupervisor/{{ $value->employment_cerificate }}')">
                                                        View File</a></td>
                                                      <td>
                                                        <select name="sup_emp_status[]" class="form-control processed status-width" required style="width:120px">
                                                            <option value="">select</option>
                                                            <option {{ $value->data_status == 'Processed' ? 'selected' : '' }}
                                                                value="Processed">Processed</option>
                                                            <option {{ $value->data_status == 'Objected' ? 'selected' : '' }}
                                                                value="Objected">Objected</option>
        
                                                        </select>
                                                      </td>
                                                      <td>
                                                        <textarea name="sup_emp_remarks[]" required style="width:120px">{{ $value->control_cell_remarks }}</textarea >
                                                      </td>
                                                        
                                                       
                                                   </tr>
                                                   @endforeach
                                                  
                                               </tbody>
                                           </table>
                                        </div>
                                       </div>

                                       <div class="row">
                                        <div class="col-md-8">
                                            <label>Total Full-Time Experience in regular position in AICTE/UGC/Govt. recognised institution only (in years):</label>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">{{$supervisors->recognised_institution}}</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-row" id="add_employment">
                                            <div class="col">
                                                <label class=" col-form-label" for="teaching_exp"><b>Teaching experience (in years):</b></label>      
                                                <label>{{$supervisors->teaching_experience}}</label>
                                            </div>
                                            <div class="col">
                                                <label class=" col-form-label" for="research_exp"><b>Research experience (in years):</b></label>      
                                                <label>{{$supervisors->research_experience}}</label>
                                            </div>
                                            <div class="col">
                                                <label class=" col-form-label" for="phd_exp"><b>Post Ph.D experience (in years):</b></label>      
                                                <label>{{$supervisors->post_phd_experience}}</label>
                                            </div>
                                        </div>
                                       
                                    </div>
                                        
                        </div>
                        <hr>
                        <div class="input_wrap preview_form">
                            <h3><b>Publication in Journals during last five years (SCI/SCOPUS indexed / UGC listed journals):</b></h3>
                            <div class="row">
    
                                <div class="col-md-3">
                                     <label>Total Number of Papers in Journals:</label>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{$supervisors->no_papers_journals}}</label>
                                </div>
                               
                            </div>
                            
                            <div class="row">
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Title</th>
                                            <th>Author(s):</th>
                                            <th>Name of the Journal:</th>
                                            <th>Vol,&Year,Page:</th>
                                            <th>Indexing:</th>
                                            <th>Publication file</th>
                                            <th>status</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($PublicationJournals as $key => $value)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$value->title}}</td>
                                            <td>{{$value->author}}</td>
                                            <td>{{$value->name_of_journal}}</td>
                                            <td>{{$value->vol_year_page}}</td>
                                            <td>{{$value->indexing}}</td>
                                            <td><a href="javascript:void(0)"
                                                onclick="upload_image_view('/upload/supervisor_publish/{{ $value->frontpage_cover }}')" >
                                                View </a>
                                            </td>
                                            <td>
                                                <select name="sup_pub_status[]" class="form-control processed status-width" required style="width:120px">
                                                    <option value="">select</option>
                                                    <option {{ $value->data_status == 'Processed' ? 'selected' : '' }}
                                                        value="Processed">Processed</option>
                                                    
                                                    <option {{ $value->data_status == 'Objected' ? 'selected' : '' }}
                                                        value="Objected">Objected</option>

                                                </select>
                                              </td>
                                              <td>
                                                <textarea name="sup_pub_remarks[]" required style="width:120px">{{ $value->control_cell_remarks }}</textarea >
                                              </td>
                                        </tr>
                                        @endforeach
                                       
                                    </tbody>
                                </table>
                                </div>
                            </div>

                            
                        </div>

                        <div class="input_wrap preview_form">
                            <h3><b>Details of the publication in Journals during last five years (SCI / SCOPUS indexed Journals as First / Corresponding Author)::</b></h3>
                            
                            
                            <div class="row">
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Title</th>
                                            <th>Author(s):</th>
                                            <th>Name of the Journal:</th>
                                            <th>Vol,&Year,Page:</th>
                                            <th>Indexing:</th>
                                            <th>Pulication Details File</th>
                                            <th>status</th>
                                            <th>Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($DetailsPublicationJournals as $key => $value)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->author }}</td>
                                            <td>{{ $value->name_of_journal }}</td>
                                            <td>{{ $value->vol_year_page }}</td>
                                            <td>{{ $value->indexing }}</td>
                                            <td>
                                                <a href="javascript:void(0)"
                                                                        onclick="upload_image_view('/upload/supervisor_publish/{{ $value->book_cover }}')">
                                                                        View</a>
                                            </td>
                                            <td>
                                                <select name="sup_jour_status[]" class="form-control processed status-width" required style="width:120px">
                                                    <option value="">select</option>
                                                    <option {{ $value->data_status == 'Processed' ? 'selected' : '' }}
                                                        value="Processed">Processed</option>
                                                   
                                                    <option {{ $value->data_status == 'Objected' ? 'selected' : '' }}
                                                        value="Objected">Objected</option>

                                                </select>
                                              </td>
                                              <td>
                                                <textarea name="sup_jour_remarks[]" required style="width:120px">{{ $value->control_cell_remarks }}</textarea >
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
                            <h3><b>Details of Ph.D Students presently supervising</b></h3>
                            <div class="row">
                                <div class="col-md-3">
                                     <label>As Supervisor:</label>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{$DetailsOfSupervisor->no_as_supervisor}}</label>
                                </div>
                                <div class="col-md-3">
                                    <label>As Co-Supervisor:</label>
                               </div>
                               <div class="col-md-3">
                                   <label class="form-label">{{$DetailsOfSupervisor->no_as_cosupervisor}}</label>
                               </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                     <label>Unreserved (UR):</label>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{$DetailsOfSupervisor->unreserved}}</label>
                                </div>
                                <div class="col-md-3">
                                    <label>ST/SC:</label>
                               </div>
                               <div class="col-md-3">
                                   <label class="form-label">{{$DetailsOfSupervisor->sc_st}} </label>
                               </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                     <label>Differently Abled:</label>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label">{{$DetailsOfSupervisor->differently_abled}}</label>
                                </div>
                                <div class="col-md-3">
                                    <label>National Test Qualified:</label>
                               </div>
                               <div class="col-md-3">
                                   <label class="form-label">{{$DetailsOfSupervisor->test_qualified}}</label>
                               </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                     <label>Any Other:</label>
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">{{$DetailsOfSupervisor->other}}</label>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl No.</th>
                                            <th>Name of the student</th>
                                            <th>Supervisor/CoSupervisor:</th>
                                            <th>University Regd.No. /Enrolment No. & Present Status (Continuing/Submitted):</th>
                                            <th>Name of the University:</th>
                                            <th>status</th>
                                            <th>Remarks</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($OtherSimilarTest as $key => $value)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{ $value->student_name }}</td>
                                            <td>{{ $value->supervisor_cosupervisor }}</td>
                                            <td>{{ $value->university_regd_no }}</td>
                                            <td>{{ $value->university_name }}</td>
                                            <td>
                                                <select name="sup_det_status[]" class="form-control processed status-width" required style="width:120px">
                                                    <option value="">select</option>
                                                    <option {{ $value->data_status == 'Processed' ? 'selected' : '' }}
                                                        value="Processed">Processed</option>
                                                   
                                                    <option {{ $value->data_status == 'Objected' ? 'selected' : '' }}
                                                        value="Objected">Objected</option>

                                                </select>
                                              </td>
                                              <td>
                                                <textarea name="sup_det_remarks[]" required style="width:120px">{{ $value->control_cell_remarks }}</textarea >
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
                            
                            <div class="row">
                                <div class="col-md-3">
                                     <label>Area of Proposed Research work:</label>
                                </div>
                                <div class="col-md-9">
                                    <label class="form-label">{{$DetailsOfSupervisor->area_of_proposed_research}}</label>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Have you ever been debarred from supervising from any university:</label>
                               </div>
                               <div class="col-md-9">
                                   <label class="form-label">{{$DetailsOfSupervisor->debarred_from_university}}</label>
                               </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label>Any other relevant information (if any):</label>
                               </div>
                               <div class="col-md-9">
                                   <label class="form-label">{{$DetailsOfSupervisor->other_relevant_information}}</label>
                               </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <label>Mail ID of the Head of the Institute:</label>
                               </div>
                               <div class="col-md-9">
                                   <label class="form-label">{{$DetailsOfSupervisor->mail_id_head}}</label>
                               </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                     <label>Upload Employer Certificate:</label>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label"><a href="javascript:void(0)"
                                        onclick="upload_image_view('/upload/employee_certificate/{{ $supervisors->employer_certificate }}')">
                                        View File</a></label>

                                </div>
                                <div class="col-md-3">
                                    <label>Upload your photo:</label>
                               </div>
                               <div class="col-md-3">
                                   <label class="form-label"><img src="" alt="">
                                    <img style="max-width: 150px;" src="{{URL::asset('upload/employee_photo/'.$supervisors->photo)}}" alt="">
                                </label>
                               </div>
                            </div>

                            
                            
                            
                            

                            
                        </div>

                        <hr>
                        <div class="input_wrap preview_form">   
                            <div class="row">
                            <div class="col-md-4">
                                Status:
                                <select name="sup_certi_status" class="form-control" required>
                                    <option value="">select</option>
                                    <option value="Processed"
                                        {{ $supervisors->data_status == 'Processed' ? 'selected' : '' }}>
                                        Processed</option>
                                    {{-- <option value="Verified"
                                        {{ $supervisors->data_status == 'Verified' ? 'selected' : '' }}>
                                        Verified</option> --}}
                                    <option
                                        {{ $supervisors->data_status == 'Objected' ? 'selected' : '' }}
                                        value="Objected">Objected</option>

                                </select>
                            </div>
                            
                            <div class="col-md-4">
                                Remark:
                                <textarea name="sup_certi_remarks" class="form-control" required >{{ $supervisors->control_cell_remarks }}
                                                        </textarea>
                            </div>                
                        </div>                           
                            <div class="row">
                                {{-- <div class="form-group">
                                    <label style="width: 100%;font-weight: 700; margin-bottom: 10px;"> Supervisor Remarks:</label>
                                    <textarea class="rema" style="width: 80%; box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; border: none; margin-bottom: 20px;" name="super_remark" disabled required="required">dsfs</textarea>
                                </div>
                                <div class="form-group">
                                    <label style="width: 100%;font-weight: 700; margin-bottom: 10px;">Remarks:</label>
                                    <textarea class="rema" style="width: 80%; box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; border: none; margin-bottom: 20px;" name="chair_remark" required="required">sad</textarea>
                                </div> --}}
                                {{-- <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked" required>
                                        <label class="custom-control-label" for="defaultUnchecked">I Agree and review the declaration / terms&amp;conditions</label>
                                    </div> --}}
                            </div>
                            <div class="border border-primary"></div>
                            <div class="row">
                                 
                                <div class="cust-print">
                                   
                                    <button type="submit" class="btn btn-success waves-effect waves-themed">Save As Draft</button>
                                    <a href="{{route('rndcell.preview_supervisor',[$id])}}" class="btn btn-success waves-effect waves-themed">Preview</a>
                                    
                                    {{-- <a href="{{route('sup.draft', [$id])}}" class="btn btn-success waves-effect waves-themed float-right">Back</a>
                                    <button type="submit" class="btn btn-success waves-effect waves-themed float-right">Submit</button> --}}
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
            </div>                   <!-- end row -->    
        </div>      
    </div>
</div>
<div class="modal fade" id="upload_image_view" tabindex="-1" role="dialog"
                                            aria-labelledby="scrollableModalTitle" aria-hidden="true">
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

