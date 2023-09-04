<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse active" id="topnav-menu-content">
                <ul class="navbar-nav active">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?php
                        if (session('userdata')['role'] == 'Nodal Centre') {
                            echo route('nodalcentre.dashboard');
                        } elseif (session('userdata')['role'] == 'supervisor') {
                            echo route('supervisor.dashboard');
                        } else {
                            echo route('dashboard');
                        }
                        ?>" id="topnav-dashboard">
                            <i class="ri-dashboard-line me-1"></i> Dashboard</a>
                        {{-- @php
                           dd(session('userdata')['role']);
                       @endphp --}}
                        {{-- @if (session('userdata')['role'] == 'Nodal Centre')
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{ route('nodalcentre.dashboard') }}" class="dropdown-item">Dashboard</a>
                        </div>
                        @else
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                        </div>
                        @endif --}}
                    </li>
                    @if (session('userdata')['role'] == 'student')
                        @php
                            //dd(session()->all());
                            $student = DB::table('phd_application_info')
                                ->where('stud_id', session('userdata')['userID'])
                                ->orderBy('id', 'DESC')
                                ->first();
                            if (!empty($student)) {
                                $status = $student->application_status;
                                $id = $student->id;
                                $student_id = session('userdata')['userID'];
                            } else {
                                $status = 0;
                            }
                            $provisional = DB::table('provisional_registrations')
                                ->where('stud_id', session('userdata')['userID'])
                                ->first('status');
                        @endphp
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Registrations <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Student <div
                                            class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                        {{-- <a href="{{ route('stu_apply') }}"
                                            class="dropdown-item {{ Helper::CheckStudentApplyPHD('student') }}">Apply
                                            PHD</a> --}}
                                        {{-- <a href="{{ route('stu_apply') }}" class="dropdown-item">View Applications</a> --}}
                                        @if ($status > 0)
                                            <a href="{{ route('enrollment.view', [$id]) }}" class="dropdown-item">View
                                                Applications</a>
                                        @else
                                            <a href="{{ route('stu_apply') }}" class="dropdown-item">Apply PHD</a>
                                        @endif
                                    </div>
                                </div>
                                <a href="{{ route('coursework-allotment-form') }}" class="dropdown-item">
                                    <i class="ri-shopping-cart-2-line align-middle me-1"></i> Coursework
                                    Allotment</a>
                                @if ($provisional && in_array($provisional->status, [1, 2, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]))
                                    <a href="{{ route('provisional_reg_view') }}" class="dropdown-item"><i
                                            class="ri-profile-line align-middle me-1"></i> Provisional Registration</a>
                                @elseif($provisional && $provisional->status == 3)
                                    <a href="{{ route('provisional_registration_edit') }}" class="dropdown-item"><i
                                            class="ri-profile-line align-middle me-1"></i> Provisional Registration</a>
                                @else
                                    <a href="{{ route('provisional_registration') }}" class="dropdown-item"><i
                                            class="ri-profile-line align-middle me-1"></i> Provisional Registration</a>
                                @endif
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Registration <div
                                            class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-form">
                                        <a href="{{ route('renewal-registration-form') }}" class="dropdown-item">Renewal
                                            of Registrations</a>
                                        <a href="{{ url('phdstudent/renewal-request') }}" class="dropdown-item">Renewal
                                            Request Status</a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-form"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Discontinuation as
                                        Ph.D.student <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-form">
                                        <a href="{{ route('discontinue_phd') }}" class="dropdown-item">Discontinuation
                                            Form</a>
                                        <a href="{{ url('phdstudent/discontinue-request') }}"
                                            class="dropdown-item">Discontinuation Request Status</a>
                                    </div>
                                </div>


                            </div>

                            {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Registrations <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <a href="{{ route('stu_apply') }}" class="dropdown-item">Apply PH.D</a>
                            </div>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Semesters <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Semester <div
                                            class="arrow-down"></div>
                                    </a>
                                    @php
                                        $reg = DB::table('semester_payments as p')
                                            ->select('p.draft_status as dstatus', 'p.id as pid', 'p.created_at')
                                            ->leftJoin('phd_application_info as i', 'i.id', '=', 'p.appl_id')
                                            ->where('i.stud_id', Auth::guard('student')->user()->id)
                                            ->orderBy('created_at', 'desc')
                                            ->first();
                                        
                                        if ($reg) {
                                            $ldate = $reg->created_at;
                                            $ldate = $ldate ? \Carbon\Carbon::parse($reg->created_at) : null;
                                            $current_date = \Carbon\Carbon::now();
                                            $diffInDays = $current_date->diffInDays($ldate);
                                        } else {
                                            // Handle the case when $reg is null
                                            $diffInDays = null; // or set a default value, or perform other actions
                                        }
                                        $change_nodal_supervisor = DB::table('change_nodal_centres')->where('stud_id', Auth::guard('student')->user()->id)->first(['status']);
                                    @endphp

                                    <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                        {{-- @if ($reg && $reg->dstatus == 0)
                                            <a href="{{ route('semister-registration-form') }}"
                                                class="dropdown-item">Semesters Registrations Form</a> --}}
                                        @if ($reg && $reg->dstatus == 1)
                                            <a href="{{ route('semister-registration-payment-form', $reg->pid) }}"
                                                class="dropdown-item">Semesters Registrations Form</a>
                                        @elseif ($reg && $reg->dstatus == 2)
                                            <a href="{{ route('semister-registration-preview', $reg->pid) }}"
                                                class="dropdown-item">Semesters Registrations Form</a>
                                        @elseif($reg && $reg->dstatus == 3)
                                            <a href="{{ route('semister-registration-form') }}"
                                                class="dropdown-item">Semesters Registrations Form</a>
                                        @else
                                            <a href="{{ route('semister-registration-form') }}"
                                                class="dropdown-item">Semesters Registrations Form</a>
                                        @endif
                                        <a href="{{ route('semester.list') }}" class="dropdown-item">Semesters
                                            Registration List</a>

                                        {{-- <a href="{{ route('stu_apply') }}" class="dropdown-item">View Registrations</a> --}}
                                    </div>
                                </div>
                                @php
                                    $ldate = DB::table('semester_progress_reports')
                                        ->select('created_at')
                                        ->where('stud_id', Auth::guard('student')->user()->id)
                                        ->orderBy('created_at', 'desc')
                                        ->first();
                                    $ldate = $ldate ? \Carbon\Carbon::parse($ldate->created_at) : null;
                                    $current_date = \Carbon\Carbon::now();
                                    $diffInDays = $current_date->diffInDays($ldate);
                                    $coursework = DB::table('tbl_phd_courseworks as c')
                                        ->select('c.*')
                                        ->leftJoin('phd_application_info as i', 'i.id', '=', 'c.appl_id')
                                        ->where('i.stud_id', Auth::guard('student')->user()->id)
                                        ->first();
                                @endphp
                                @if ($coursework)
                                    <div class="dropdown">
                                        <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                            id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="ri-shopping-cart-2-line align-middle me-1"></i> Semester Progress
                                            Report <div class="arrow-down"></div>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                            <a href="{{ route('sem_progress_report') }}" class="dropdown-item">Add
                                                Semester Progress Report @if ($diffInDays == 180)
                                                    <span class=" text-dark ms-1 badge bg-warning">Pending</span>
                                                @endif
                                            </a>
                                            <a href="{{ route('sem_progress_listing') }}" class="dropdown-item">View
                                                Progress Report</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Others <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <a href="{{ route('change-title-researchwork') }}" class="dropdown-item">Researchwork
                                    Change Title</a>
                                {{-- <a href="{{ route('changeof-nodal-reserach-center') }}" class="dropdown-item">Change Nodal Centre</a> --}}
                                {{-- <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Change Nodal Centre
                                        <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                        <a href="{{ route('changeof-nodal-reserach-center') }}"
                                            class="dropdown-item">Apply for change nodal center</a>
                                        <a href="{{ route('change-nodal-status') }}" class="dropdown-item">View
                                            status</a>
                                    </div>
                                </div> --}}
                                @if ($change_nodal_supervisor && $change_nodal_supervisor->status != 0)
                                <a href="{{ route('change-nodal-supervisor-view') }}"
                                    class="dropdown-item">Apply for change nodal center</a>
                            @else
                                <a href="{{ route('changeof-nodal-reserach-center') }}"
                                    class="dropdown-item">Apply for change nodal center</a>
                            @endif
                                @if ($change_supervisor && $change_supervisor->status != 0)
                                <a href="{{ route('change-supervisor-view') }}" class="dropdown-item">Apply
                                    for change supervisor/co-supervisor</a>
                                    
                                @else
                                <a href="{{ route('changeof-research-supervisor') }}" class="dropdown-item">Apply
                                    for change supervisor/co-supervisor</a>
                                @endif
                                {{-- <a href="{{ route('changeof-research-supervisor') }}" class="dropdown-item">Change Of Research Supervisor</a> --}}
                                {{-- <a href="{{ route('co-supervisor-change-list') }}" class="dropdown-item">Change Of Research Supervisor List</a> --}}
                                <a href="{{ route('changeof-nodal-reserach-centrelist') }}"
                                    class="dropdown-item">Change Of Nodal Centre List</a>

                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Special Leave <div
                                            class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                        <a href="{{ route('special.leave.list') }}" class="dropdown-item">View
                                            Leaves</a>
                                        <a href="{{ route('special_leave') }}" class="dropdown-item">Apply Leaves</a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Extension to complete
                                        work <div class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                        <a href="{{ route('ext_to_complete_work') }}" class="dropdown-item">Extension
                                            work List</a>
                                        <a href="{{ route('extention.work.apply') }}" class="dropdown-item">Apply
                                            Extension work</a>
                                    </div>
                                </div>

                                <a href="{{ route('inclusion_co_supervisor') }}" class="dropdown-item">Inclusion of
                                    Co-Supervisor</a>
                            </div>


                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Thesis <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <a href="{{ route('thesis_submission') }}" class="dropdown-item">THESIS SUBMISSION
                                    FORM</a>
                            </div>
                        </li>
                    @endif

                    @if (session('userdata')['role'] == 'supervisor')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{-- <i class="ri-apps-2-line me-1"></i> Application Form <div class="arrow-down"></div> --}}
                                <i class="ri-apps-2-line me-1"></i> Registrations Form <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <a href="{{ route('sup_apply') }}" class="dropdown-item">Registration</a>
                                <a href="{{ route('applied-students-approval') }}" class="dropdown-item">Applied
                                    Students</a>
                                {{-- <a href="{{ route("applied-coursework")}}" class="dropdown-item">Applied Coursework</a> --}}
                                <a href="{{ route('discontinue-request') }}" class="dropdown-item">Discontinuation as
                                    Ph.D</a>
                                <a href="{{ route('provisional-registration-list') }}"
                                    class="dropdown-item">Provisional Registration</a>
                            </div>
                            {{-- <div class="dropdown-menu" aria-labelledby="topnav-email">
                            <a href="{{ route('applied-students-approval') }}" class="dropdown-item">Applied Students</a>
                        </div> --}}
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps2"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Semister Form <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                {{-- <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-form" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Domain Expert <div
                                            class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-form">
                                        <a href="{{ route('domain-expert') }}" class="dropdown-item">Domain expert
                                            form</a>
                                        <a href="{{ url('supervisor/domain-expert-request') }}"
                                            class="dropdown-item">Domain expert List</a>
                                    </div>
                                </div> --}}
                                {{-- <a href="{{ route('domain-expert') }}" class="dropdown-item">Domain Expert</a> --}}
                                <a href="{{ route('sup.semester-registration') }}" class="dropdown-item">Semester
                                    Registration</a>
                                <a href="{{ route('renewal-request') }}" class="dropdown-item">Renewal
                                    Registration</a>
                                <a href="{{ route('sup.semester.list') }}" class="dropdown-item">View Progress
                                    Report</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i>Others <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                {{-- <a href="{{ route('ext_to_complete_work') }}" class="dropdown-item">Extension to complete work</a> --}}
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Special Leave <div
                                            class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                        <a href="{{ route('sup.leave.list') }}" class="dropdown-item">Pendign
                                            Leaves</a>
                                        {{-- <a href="{{ route('special_leave') }}" class="dropdown-item">Apply Leaves</a> --}}
                                    </div>
                                </div>

                                <a href="{{ route('extention.work.listing') }}" class="dropdown-item"> Extension to
                                    complete work </a>
                            </div>
                        </li>
                    @endif

                    @if (session('userdata')['role'] == 'Nodal Centre')
                        @php $pending_coursework = PhdCourseWorks::where('status', 2)->count(); @endphp
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Applications <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <a href="{{ route('nodalcentre.applied-application') }}"
                                    class="dropdown-item">Pending Applications
                                    @if ($pending_coursework > 0)
                                        <span
                                            class=" text-dark ms-1 badge bg-warning">{{ $pending_coursework }}</span>
                                    @endif
                                </a>
                                <a href="{{ route('nodalcentre.all-application') }}" class="dropdown-item">All
                                    Applications</a>
                                <a href="{{ route('nodalcentre.provisional-registration-list') }}"
                                    class="dropdown-item">Provisional Registration</a>
                                <a href="{{ url('nodalcentre/renewal-request') }}" class="dropdown-item">Renewal
                                    Registration</a>
                                <a href="{{ url('nodalcentre/discontinue-request') }}"
                                    class="dropdown-item">Discontinuation as Ph.D</a>
                                <a href="{{ route('nodalcentre.change_supervisor') }}" class="dropdown-item">Change
                                    research supervisor/ co-supervisor</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Semesters <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Semester <div
                                            class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                        {{-- <a href="{{ route('nodalcentre.semester.list') }}" class="dropdown-item">Semsetre1</a> --}}
                                        <a href="{{ route('nodalcentre.nod.semester.list') }}"
                                            class="dropdown-item">Semseter Progress Report</a>
                                        <a href="{{ route('nodalcentre.semester-register') }}"
                                            class="dropdown-item">Semseter Registration</a>
                                    </div>
                                </div>
                                {{-- <div class="dropdown">
                                    <a href="{{ url('nodalcentre/domain-request') }}" class="dropdown-item">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i>Domain Expert<div
                                            class="arrow-down"></div></a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                        <a href="{{ route('semister-registration-form') }}" class="dropdown-item">Semesters Registrations22</a>
                                        <a href="{{ route('semester.list',[$id]) }}" class="dropdown-item">Semesters Registrations</a>
                                        <a href="{{ route('nodalcentre.semester.list') }}" class="dropdown-item">View
                                            Registrations</a>
                                        <a href="{{ route('nodalcentre.nod.semester.list') }}"
                                            class="dropdown-item">View Progress Report</a>
                                    </div>
                                </div> --}}
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i>Others <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <a href="{{ route('nodalcentre.professor.list') }}" class="dropdown-item">NCR
                                    User</a>
                                {{-- <a href="{{ route('ext_to_complete_work') }}" class="dropdown-item">Extension to complete work</a> --}}
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Special Leave <div
                                            class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                        <a href="{{ route('nodalcentre.leave.list') }}" class="dropdown-item">Pendign
                                            Leaves</a>
                                        {{-- <a href="{{ route('special_leave') }}" class="dropdown-item">Apply Leaves</a> --}}
                                    </div>
                                </div>

                                <a href="{{ route('nodalcentre.extention.work.listing') }}"
                                    class="dropdown-item">Extension to complete work</a>
                            </div>
                        </li>
                    @endif

                    @if (session('userdata')['role'] == 'co-supervisor')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Application Form <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <a href="{{ route('cosup_apply') }}" class="dropdown-item">Apply</a>
                                <a href="{{ route('dsc.coursework-list') }}" class="dropdown-item">Coursework
                                    Application</a>
                                <a href="{{ route('cosup.semester.list') }}" class="dropdown-item">Semester Progress
                                    Report</a>
                                <a href="{{ route('cosup.provisional-registration-list') }}"
                                    class="dropdown-item">Provisional Registration</a>
                            </div>
                        </li>
                    @endif

                    @if (session('userdata')['role_id'] == '1')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Masters <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <a href="{{ route('roles') }}" class="dropdown-item">Role</a>
                                <a href="{{ route('users') }}" class="dropdown-item">user</a>
                                {{-- <a href="{{ route('departments') }}" class="dropdown-item">Departments</a> --}}
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Settings <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <a href="{{ route('pages') }}" class="dropdown-item">Pages</a>
                                <a href="{{ route('menus') }}" class="dropdown-item">Menus</a>
                                <a href="{{ route('announcements') }}" class="dropdown-item">Announcement</a>
                                <a href="{{ route('portal.index') }}" class="dropdown-item">Portal Section</a>
                                <a href="{{ route('departments') }}" class="dropdown-item">Departments</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Applications <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Student <div
                                            class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                        <a href="{{ route('stu.entrance-application') }}" class="dropdown-item">Phd
                                            Entrance Applications</a>
                                        {{-- <a href="{{ route('admin.stu.applied-application') }}"
                                            class="dropdown-item">Phd Applications</a>
                                        <a href="{{ route('admin.stu.approve-application') }}"
                                            class="dropdown-item">Phd Students</a> --}}
                                        {{-- <a href="{{ route('admin.stu.entrance-application') }}"
                                            class="dropdown-item">Phd Entrance Applications</a> --}}
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Supervisor <div
                                            class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                        <a href="{{ route('supervisor-application') }}" class="dropdown-item">Applied
                                            Applications</a>
                                        <a href="{{ route('supervisor.approved-application') }}"
                                            class="dropdown-item">Approved Applications</a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-email" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-mail-line align-middle me-1"></i> Co-Supervisor <div
                                            class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-email">
                                        <a href="{{ route('admin.cosup.applied-application') }}"
                                            class="dropdown-item">Applied
                                            Applications</a>
                                        <a href="{{ route('admin.cosup.approved-application') }}"
                                            class="dropdown-item">Approved Applications</a>
                                        {{-- <a href="{{ route('control-cell.cosup-all-application') }}"
                                            class="dropdown-item">Approved Applications</a> --}}
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Others <div class="arrow-down"></div>
                            </a>


                        </li>
                    @endif

                    @if (session('userdata')['role_id'] == '6')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Application <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-apps">

                                {{-- <a href="apps-calendar.html" class="dropdown-item"><i class="ri-calendar-2-line align-middle me-1"></i> Dashboard</a> --}}
                                @php $pending_coursework = PhdCourseWorks::where('status', 8)->count(); @endphp
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Student <div
                                            class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                        <a href="{{ route('vc.applied-application') }}" class="dropdown-item">Pending
                                            Applications @if ($pending_coursework > 0)
                                                <span
                                                    class=" text-dark ms-1 badge bg-warning">{{ $pending_coursework }}</span>
                                            @endif
                                        </a>
                                        <a href="{{ route('vc.all-application') }}" class="dropdown-item">All
                                            Applications</a>
                                        <a href="{{ route('vc.provisional-registration-list') }}"
                                            class="dropdown-item">Provisional Registration</a>
                                        <a href="{{ url('vice-chancellor/renewal-request') }}"
                                            class="dropdown-item">Renewal Registration</a>
                                        <a href="{{ url('vice-chancellor/discontinue-request') }}"
                                            class="dropdown-item">Discontinuation of Ph.D</a>
                                        <a href="{{ url('vice-chancellor/change-nodal-request') }}"
                                            class="dropdown-item">Change Nodal Center</a>
                                        <a href="{{ url('vice-chancellor/change_supervisor') }}"
                                            class="dropdown-item">Change research supervisor/co-supervisor</a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Supervisor <div
                                            class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                        <a href="{{ route('vc.vc.applied-application') }}"
                                            class="dropdown-item">Pending
                                            Applications</a>
                                        <a href="{{ route('vc.vc-all-application') }}" class="dropdown-item">All
                                            Applications</a>
                                        <a href="{{ url('vice-chancellor/domain-request') }}"
                                            class="dropdown-item">Domain Expert</a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-email" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-mail-line align-middle me-1"></i> Co-Supervisor <div
                                            class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-email">
                                        <a href="{{ route('vc.vc.coapplied-application') }}"
                                            class="dropdown-item">Pending
                                            Applications</a>
                                        <a href="{{ route('vc.co-all-application') }}" class="dropdown-item">All
                                            Applications</a>
                                    </div>
                                </div>



                            </div>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i>Others <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">

                                {{-- <a href="{{ route('ext_to_complete_work') }}" class="dropdown-item">Extension to complete work</a> --}}
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Special Leave <div
                                            class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                        <a href="{{ route('vc.leave.list') }}" class="dropdown-item">Pendign
                                            Leaves</a>
                                        {{-- <a href="{{ route('special_leave') }}" class="dropdown-item">Apply Leaves</a> --}}
                                    </div>
                                </div>

                                {{-- <a href="{{ route('inclusion_co_supervisor') }}" class="dropdown-item">Inclusion of Co-Supervisor</a>   --}}
                            </div>
                        </li>
                        </li>
                    @endif

                    @if (session('userdata')['role_id'] == '7')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Application <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-apps">

                                {{-- <a href="apps-calendar.html" class="dropdown-item"><i class="ri-calendar-2-line align-middle me-1"></i> Dashboard</a> --}}

                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Student <div
                                            class="arrow-down"></div>
                                    </a>
                                    @php $pending_coursework = PhdCourseWorks::whereIn('status', [6,10])->count(); @endphp
                                    <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                        <a href="{{ route('control-cell.applied-application') }}"
                                            class="dropdown-item">Pending
                                            Applications @if ($pending_coursework > 0)
                                                <span
                                                    class=" text-dark ms-1 badge bg-warning">{{ $pending_coursework }}</span>
                                            @endif
                                        </a>
                                        <a href="{{ route('control-cell.all-application') }}"
                                            class="dropdown-item">All Applications</a>
                                        <a href="{{ route('control-cell.provisional-registration-list') }}"
                                            class="dropdown-item">Provisional Registration</a>
                                        <a href="{{ route('control-cell.change-nodal-request') }}"
                                            class="dropdown-item">Change Nodal Center</a>
                                        <a href="{{ url('control-cell/change_supervisor') }}"
                                            class="dropdown-item">Change research supervisor/co-supervisor</a>
                                        <a href="{{ route('control-cell.renewal-request') }}"
                                            class="dropdown-item">Renewal Registration</a>
                                        <a href="{{ url('control-cell/discontinue-request') }}"
                                            class="dropdown-item">Discontinuation of Ph.D</a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Supervisor <div
                                            class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                        <a href="{{ route('control-cell.supervisor.applied-application') }}"
                                            class="dropdown-item">Pending
                                            Applications</a>
                                        <a href="{{ route('control-cell.sup-all-application') }}"
                                            class="dropdown-item">All Applications</a>
                                    </div>
                                </div>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-email" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-mail-line align-middle me-1"></i> Co-Supervisor <div
                                            class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-email">
                                        <a href="{{ route('control-cell.cosupervisor.applied-application') }}"
                                            class="dropdown-item">Pending
                                            Applications</a>
                                        <a href="{{ route('control-cell.cosup-all-application') }}"
                                            class="dropdown-item">All Applications</a>
                                    </div>
                                </div>



                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-dashboard-line me-1"></i> NodalCenter <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                <a href="{{ route('nodal') }}" class="dropdown-item">Add Nodal Center</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-dashboard-line me-1"></i> Payment <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                                <a href="{{ route('PhdCell.feeConfig') }}" class="dropdown-item">Fee
                                    Configuration</a>
                                <a href="#" class="dropdown-item">Enrollment Fee</a>
                                <a href="#" class="dropdown-item">Registrations Fee</a>
                                <a href="#" class="dropdown-item">Semister Fee</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Office Order <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <a href="{{ route('control-cell.provisional_reg_phd') }}"
                                    class="dropdown-item">Provisional Registration Ph.D. Degree</a>
                                <a href="{{ route('control-cell.dsc_formation') }}" class="dropdown-item">Formation
                                    of DSC</a>
                            </div>
                        </li>
                        @php
                            $pending_sem_rep = DB::table('semester_progress_reports')
                                ->where('status', 6)
                                ->count();
                            $pending_sem_reg = DB::table('semester_regisration_statuses')
                                ->where('status', 6)
                                ->count();
                        @endphp
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Semesters <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-apps">
                                {{-- <a href="{{ route('control-cell.semester.list') }}" class="dropdown-item">View
                                    Registrations</a> --}}
                                <a href="{{ route('control-cell.control.semester.list') }}"
                                    class="dropdown-item">View Progress Report @if ($pending_sem_rep > 0)
                                        <span class=" text-dark ms-1 badge bg-warning">{{ $pending_sem_rep }}</span>
                                    @endif
                                </a>
                                <a href="{{ route('control-cell.semester-register') }}"
                                    class="dropdown-item">Semester Register @if ($pending_sem_reg > 0)
                                        <span class=" text-dark ms-1 badge bg-warning">{{ $pending_sem_reg }}</span>
                                    @endif
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Others <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <a href="{{ route('control-cell.proposed-dsc-domain-expert') }}"
                                    class="dropdown-item">DSC Formation ResearchWork</a>
                                <a href="{{ route('control-cell.defence_viva_voice') }}"
                                    class="dropdown-item">Defence VIVA-VOICE</a>
                                <div class="dropdown">
                                    <a class="dropdown-item dropdown-toggle arrow-none" href="#"
                                        id="topnav-ecommerce" role="button" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="ri-shopping-cart-2-line align-middle me-1"></i> Special Leave <div
                                            class="arrow-down"></div>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                        <a href="{{ route('control-cell.leave.list') }}"
                                            class="dropdown-item">Pendign Leaves</a>
                                        {{-- <a href="{{ route('special_leave') }}" class="dropdown-item">Apply Leaves</a> --}}
                                    </div>
                                </div>
                                <a href="{{ route('control-cell.extention.work.listing') }}"
                                    class="dropdown-item">Extension to complete work</a>
                            </div>
                        </li>
                    @endif

                    @if (session('userdata')['role_id'] == '13')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Phd Students <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <a href="{{ route('entrance_index') }}" class="dropdown-item">Applied Students</a>
                                <a href="{{ route('exam-cell.applied-coursework') }}" class="dropdown-item">Course
                                    work Applications</a>
                                <a href="{{ route('stu.entrance-application') }}" class="dropdown-item">Phd Entrance
                                    Applications</a>
                                <a href="{{ route('stu.entrance-exam-selection') }}" class="dropdown-item">Phd
                                    Entrance Selection</a>
                                <a href="{{ route('stu.entrance-attendance-sheet') }}" class="dropdown-item">Phd
                                    Entrance Attendance Sheet</a>
                                {{-- <a href="{{ route('stu.entrance-exam-date') }}" class="dropdown-item">Phd Entrance
                                    Date & Location</a>
                                <a href="{{ route('stu.entrance-exam-center') }}" class="dropdown-item">Phd Entrance
                                    Exam Center</a> --}}

                                {{-- <a href="#" class="dropdown-item">user</a> --}}
                                {{-- <a href="{{ route('departments') }}" class="dropdown-item">Departments</a> --}}
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Others <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <a href="{{ route('official_document_view') }}" class="dropdown-item">Official Use
                                    Forms</a>
                            </div>
                        </li>
                    @endif

                    {{-- role id = 12 for JE (Junior Executive) --}}
                    @if (session('userdata')['role_id'] == '12')
                        @php
                            $pending_coursework = PhdCourseWorks::whereIn('status', [4, 12])->count();
                            $pending_sem_rep = DB::table('semester_progress_reports')
                                ->whereIn('status', [4, 8])
                                ->count();
                            $pending_sem_reg = DB::table('semester_regisration_statuses')
                                ->whereIn('status', [4, 8])
                                ->count();
                        @endphp
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Phd Students <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <a href="{{ route('je.applied-application') }}" class="dropdown-item">Applied
                                    Students @if ($pending_coursework > 0)
                                        <span
                                            class=" text-dark ms-1 badge bg-warning">{{ $pending_coursework }}</span>
                                    @endif
                                </a>
                                <a href="{{ route('je.sem-prog-application') }}" class="dropdown-item">Semester
                                    Progress Report @if ($pending_sem_rep > 0)
                                        <span class=" text-dark ms-1 badge bg-warning">{{ $pending_sem_rep }}</span>
                                    @endif
                                </a>
                                <a href="{{ route('je.semester-register') }}" class="dropdown-item">Semester
                                    Registration @if ($pending_sem_reg > 0)
                                        <span class=" text-dark ms-1 badge bg-warning">{{ $pending_sem_reg }}</span>
                                    @endif
                                </a>
                                <a href="{{ route('je.provisional-registration-list') }}"
                                    class="dropdown-item">Provisional Registration</span>
                                </a>
                            </div>
                        </li>
                    @endif
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-ui" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-pencil-ruler-2-line me-1"></i> UI Elements <div class="arrow-down"></div>
                        </a>

                        <div class="dropdown-menu mega-dropdown-menu dropdown-mega-menu-xl" aria-labelledby="topnav-ui">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div>
                                        <a href="ui-avatars.html" class="dropdown-item">Avatars</a>
                                        <a href="ui-buttons.html" class="dropdown-item">Buttons</a>
                                        <a href="ui-cards.html" class="dropdown-item">Cards</a>
                                        <a href="ui-carousel.html" class="dropdown-item">Carousel</a>
                                        <a href="ui-dropdowns.html" class="dropdown-item">Dropdowns</a>
                                        <a href="ui-video.html" class="dropdown-item">Embed Video</a>
                                        <a href="ui-general.html" class="dropdown-item">General UI</a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <a href="ui-grid.html" class="dropdown-item">Grid</a>
                                        <a href="ui-images.html" class="dropdown-item">Images</a>
                                        <a href="ui-list-group.html" class="dropdown-item">List Group</a>
                                        <a href="ui-modals.html" class="dropdown-item">Modals</a>
                                        <a href="ui-notifications.html" class="dropdown-item">Notifications</a>
                                        <a href="ui-offcanvas.html" class="dropdown-item">Offcanvas</a>
                                        <a href="ui-placeholders.html" class="dropdown-item">Placeholders</a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div>
                                        <a href="ui-portlets.html" class="dropdown-item">Portlets</a>
                                        <a href="ui-progress.html" class="dropdown-item">Progress</a>
                                        <a href="ui-ribbons.html" class="dropdown-item">Ribbons</a>
                                        <a href="ui-spinners.html" class="dropdown-item">Spinners</a>
                                        <a href="ui-tabs-accordions.html" class="dropdown-item">Tabs &amp; Accordions</a>
                                        <a href="ui-tooltips-popovers.html" class="dropdown-item">Tooltips &amp; Popovers</a>
                                        <a href="ui-typography.html" class="dropdown-item">Typography</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </li> --}}

                    {{-- For Chairperson --}}
                    @if (session('userdata')['role_id'] == '14')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Applications Form <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <a href="{{ route('dsc.coursework-list') }}" class="dropdown-item">Coursework
                                    Application</a>
                                <a href="{{ route('chairperson.semester.list') }}" class="dropdown-item">Semester
                                    Progress Report</a>
                                <a href="{{ route('chairperson.provisional-registration-list') }}"
                                    class="dropdown-item">Provisional Registration</a>
                            </div>
                        </li>
                    @endif

                    {{-- For Co-Chairperson --}}
                    @if (session('userdata')['role_id'] == '5')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Applications Form <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <a href="{{ route('dsc.coursework-list') }}" class="dropdown-item">Coursework
                                    Application</a>
                                <a href="{{ route('chairperson.semester.list') }}" class="dropdown-item">Semester
                                    Progress Report</a>
                                <a href="{{ route('chairperson.provisional-registration-list') }}"
                                    class="dropdown-item">Provisional Registration</a>
                            </div>
                        </li>
                    @endif

                    {{-- For DSC --}}
                    @if (session('userdata')['role_id'] == '3')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps"
                                role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-apps-2-line me-1"></i> Applications Form <div class="arrow-down"></div>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="topnav-email">
                                <a href="{{ route('dsc.coursework-list') }}" class="dropdown-item">Coursework
                                    Application</a>
                                <a href="{{ route('dsc.semester.list') }}" class="dropdown-item">Semester Progress
                                    Report</a>
                                <a href="{{ route('dsc.provisional-registration-list') }}"
                                    class="dropdown-item">Provisional Registration</a>
                            </div>
                        </li>
                    @endif

                </ul> <!-- end navbar-->
            </div> <!-- end .collapsed-->
        </nav>
    </div> <!-- end container-fluid -->
</div>
