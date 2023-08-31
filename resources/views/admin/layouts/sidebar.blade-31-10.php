<div class="topnav">

    
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse active" id="topnav-menu-content">
                <ul class="navbar-nav active">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-dashboard-line me-1"></i> Dashboard <div class="arrow-down"></div>
                        </a>
                        
                       {{-- @php
                           dd(session('userdata')['role']);
                       @endphp --}}
                        @if(session('userdata')['role'] == 'Nodal Centre')
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{ route('nodalcentre.dashboard') }}" class="dropdown-item">Dashboard</a>
                        </div>
                        @else
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
                        </div>
                        @endif
                    </li>
                    @if (session('userdata')['role'] == 'student')
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-apps-2-line me-1"></i> Registration <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-email">
                            <a href="{{ route('stu_apply') }}" class="dropdown-item">Apply</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-apps-2-line me-1"></i> Semester <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-email">
                            <a href="{{ route('semister-registration-form') }}" class="dropdown-item">Semester Registration</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-apps-2-line me-1"></i> Others <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-email">
                            <a href="{{ route('change-title-researchwork') }}" class="dropdown-item">Researchwork Change Title</a>
                        </div>
                    </li>
                    @endif

                    @if (session('userdata')['role'] == 'supervisor')
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{-- <i class="ri-apps-2-line me-1"></i> Application Form <div class="arrow-down"></div> --}}
                            <i class="ri-apps-2-line me-1"></i> Registration Form <div class="arrow-down"></div> 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-email">
                            <a href="{{ route('sup_apply') }}" class="dropdown-item">Apply</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-apps-2-line me-1"></i> Semister Form <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-email">
                            <a href="{{ route('domain-expert') }}" class="dropdown-item">Domain Expert</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-apps-2-line me-1"></i>Others <div class="arrow-down"></div>
                        </a>
                    </li>
                    @endif

                    @if (session('userdata')['role'] == 'Nodal Centre')
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-apps-2-line me-1"></i> Applications <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-email">
                            <a href="{{ route('nodalcentre.applied-application') }}" class="dropdown-item">Pending Applications</a>
                            <a href="{{ route('nodalcentre.all-application') }}" class="dropdown-item">All Applications</a>
                        </div>
                    </li>
                    @endif

                    @if (session('userdata')['role'] == 'co-supervisor')
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-apps-2-line me-1"></i> Application Form <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-email">
                            <a href="{{ route('cosup_apply') }}" class="dropdown-item">Apply</a>
                        </div>
                    </li>
                    @endif


                    @if (session('userdata')['role_id'] == '1')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-apps-2-line me-1"></i> Masters <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-email">
                            <a href="{{ route('roles') }}" class="dropdown-item">Role</a>
                            <a href="{{ route('users') }}" class="dropdown-item">user</a>
                            {{-- <a href="{{ route('departments') }}" class="dropdown-item">Departments</a> --}}
                            
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-apps-2-line me-1"></i> Settings <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-email">
                            <a href="{{ route('pages') }}" class="dropdown-item">Pages</a>
                            <a href="{{ route('menus') }}" class="dropdown-item">Menus</a>
                            <a href="{{ route('announcements') }}" class="dropdown-item">Announcement</a>
                            <a href="{{ route('departments') }}" class="dropdown-item">Departments</a>
                            
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-apps-2-line me-1"></i> Applications <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-apps">                           
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-ecommerce" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-shopping-cart-2-line align-middle me-1"></i> Student <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                    <a href="{{ route('admin.stu.applied-application') }}" class="dropdown-item">Phd Applications</a>
                                    <a href="{{ route('admin.stu.approve-application') }}" class="dropdown-item">Phd Students</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-ecommerce" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-shopping-cart-2-line align-middle me-1"></i> Supervisor <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                    <a href="{{ route('supervisor-application') }}" class="dropdown-item">Applied
                                        Applications</a>
                                    <a href="{{ route('supervisor.approved-application') }}" class="dropdown-item">Approved Applications</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-mail-line align-middle me-1"></i> Co-Supervisor <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-email">
                                    <a href="{{ route('admin.cosup.applied-application') }}" class="dropdown-item">Applied
                                        Applications</a>
                                    <a href="{{ route('control-cell.cosup-all-application') }}" class="dropdown-item">Approved Applications</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-apps-2-line me-1"></i> Others <div class="arrow-down"></div>
                        </a>
                    </li>
                    @endif

                    @if (session('userdata')['role_id'] == '6')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-apps-2-line me-1"></i> Application <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-apps">

                            {{-- <a href="apps-calendar.html" class="dropdown-item"><i class="ri-calendar-2-line align-middle me-1"></i> Dashboard</a> --}}
                           
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-ecommerce" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-shopping-cart-2-line align-middle me-1"></i> Student <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                    <a href="{{ route('vc.applied-application') }}" class="dropdown-item">Pending
                                        Applications</a>
                                    <a href="{{ route('vc.all-application') }}" class="dropdown-item">All Applications</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-ecommerce" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-shopping-cart-2-line align-middle me-1"></i> Supervisor <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                    <a href="{{ route('vc.vc.applied-application') }}" class="dropdown-item">Pending
                                        Applications</a>
                                    <a href="{{ route('vc.vc-all-application') }}" class="dropdown-item">All Applications</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-mail-line align-middle me-1"></i> Co-Supervisor <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-email">
                                    <a href="{{ route('vc.vc.coapplied-application') }}" class="dropdown-item">Pending
                                        Applications</a>
                                    <a href="{{ route('vc.co-all-application') }}" class="dropdown-item">All Applications</a>
                                </div>
                            </div>
                            

                           
                        </div>
                    </li>
                   @endif

                    @if (session('userdata')['role_id'] == '7')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-apps-2-line me-1"></i> Application <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-apps">

                            {{-- <a href="apps-calendar.html" class="dropdown-item"><i class="ri-calendar-2-line align-middle me-1"></i> Dashboard</a> --}}
                           
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-ecommerce" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-shopping-cart-2-line align-middle me-1"></i> Student <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                    <a href="{{ route('control-cell.applied-application') }}" class="dropdown-item">Pending
                                        Applications</a>
                                    <a href="{{ route('control-cell.all-application') }}" class="dropdown-item">All Applications</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-ecommerce" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-shopping-cart-2-line align-middle me-1"></i> Supervisor <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-ecommerce">
                                    <a href="{{ route('control-cell.supervisor.applied-application') }}" class="dropdown-item">Pending
                                        Applications</a>
                                    <a href="{{ route('control-cell.sup-all-application') }}" class="dropdown-item">All Applications</a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a class="dropdown-item dropdown-toggle arrow-none" href="#" id="topnav-email" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ri-mail-line align-middle me-1"></i> Co-Supervisor <div class="arrow-down"></div>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="topnav-email">
                                    <a href="{{ route('control-cell.cosupervisor.applied-application') }}" class="dropdown-item">Pending
                                        Applications</a>
                                    <a href="{{ route('control-cell.cosup-all-application') }}" class="dropdown-item">All Applications</a>
                                </div>
                            </div>
                            

                           
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-dashboard-line me-1"></i> NodalCenter <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{ route('nodal') }}" class="dropdown-item">Add Nodal Center</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-dashboard-line me-1"></i> Payment <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{ route('PhdCell.feeConfig') }}" class="dropdown-item">Fee Configuration</a>
                            <a href="#" class="dropdown-item">Enrollment Fee</a>
                            <a href="#" class="dropdown-item">Registration Fee</a>
                            <a href="#" class="dropdown-item">Semister Fee</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-apps" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ri-apps-2-line me-1"></i> Others <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-email">
                            <a href="{{ route('control-cell.proposed-dsc-domain-expert') }}" class="dropdown-item">DSC Formation ResearchWork</a>
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

                    

                    
                    
                </ul> <!-- end navbar-->
            </div> <!-- end .collapsed-->
        </nav>
    </div> <!-- end container-fluid -->
</div>