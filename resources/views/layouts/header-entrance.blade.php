<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content=" Biju Patnaik University of Technology - Best Engineering University in ODISHA" name="description">
    <meta content="Oasys Tech Solution Pvt Ltd" name="author">
    <meta name="keywords" content="" />
    <title> Research & Development | {{ $page_title ?? 'BPUT Rourkela' }}</title>

    <link rel="icon" href="{{ asset('image/favicon.jpg') }}" type="image/x-icon" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('image/favicon.jpg') }}" />
    <!-- Favicons
    ================================================== -->
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <!-- LOAD CSS FILES -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- color scheme -->
    <link rel="stylesheet" href="{{ asset('assets/switcher/demo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/switcher/colors/blue.css') }}" type="text/css" id="colors">
</head>

<body>
    <style>
        .header-main i {
            color: #fff;
        }

        ul.custom .dropdown-menu.dropdown-menu-right.dropdown-menu-arrow {
            padding: 10px;
        }
		#logo {
    
    text-align: center;
    padding-top: 25px;
}
    </style>
    <div class="images-preloader" id="images-preloader">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

    <div id="wrapper">

        <!-- header begin -->
        <header class="site-header-2 site-header">

            <div id="sticked-menu" class="sticky-header">
                <!-- Main bar start -->
                <div class="main-bar">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">

                                <!-- logo begin -->
                                <div id="logo" >
                                    <a href="/">
                                        <img src="{{ asset('assets/images/r&d.png') }}" alt="" class="logo">
                                    </a>
                                </div>
                                <!-- logo close -->

                                <!-- btn-mobile menu begin -->
                                <a id="show-mobile-menu" class="btn-mobile-menu hidden-lg hidden-md"><i
                                        class="fa fa-bars"></i></a>
                                <!-- btn-mobile menu close -->

                                <!-- Header Group Button Right begin -->
                                {{-- <div class="header-buttons pull-right hidden-xs">
                                    <div class="header-contact">
                                        <ul class="clearfix">
                                            <li class="contact"><i class="fa fa-envelope"></i>
                                                <span>contact@r&d.com</span>
                                            </li>
                                            <li class="phone"><i class="fa fa-phone"></i> <span>0744-2473062</span>
                                            </li>
                                            <li class="border-line">|</li>
                                        </ul>
                                    </div>

                                    <div class="cart-button hidden-sm">
                                        <a href="#" class="dropdown-toggle cart-contents" data-toggle="dropdown"
                                            style="font-size: 15px;
    font-weight: 400;
    color: #ffffff;
    background-color: #0c50d1;
    padding: 10px 16px;
    border-radius: 2px;"></i>Apply
									</a>

									<div class="dropdown-menu top_cart_list_product">
                                            <ul class="cart_list product_list_widget clearfix">
                                                <li class="mini_cart_item">
                                                    <a href="{{ url('/register') }}">Registration to Apply for Ph.D.
                                                        Programme</a>

                                                </li>
                                                <li class="mini_cart_item">
                                                    <a href="{{ url('/register') }}">For Supervisor & DSC</a>

                                                </li>
                                                <li class="mini_cart_item">
                                                    <a class="dropdown-item"
                                                        href="{{ route('forms.research_supervisor') }}">
                                                        <i class="dropdown-icon icon icon-picture"></i>For Research
                                                        Supervisor
                                                    </a>
                                                </li>

                                            </ul>
									</div> 
                                    </div>--}}

                                    {{-- <div class="col-xl-12 col-lg-12 col-5">
                                        <div class="top-bar-right">
                                            <ul class="custom">
                                              
                                                <li class="dropdown">
                                                    <a href="#" class="text-dark" data-toggle="dropdown"><i class="fa fa-plus mr-1"></i>
                                                        <span> Apply<i class="fa fa-caret-down text-white ml-1"></i></span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                      
                                                        <a class="dropdown-item" href="{{url('/register')}}" target="_blank">
                                                            Registration to Apply for Ph.D. Programme
                                                        </a>
                                                        <a class="dropdown-item" href="{{url('/register')}}" target="_blank">For Supervisor & DSC</a>
                                                        <a class="dropdown-item" href="{{route('forms.research_supervisor')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Research Supervisor
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.fee_structure')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Fee Structure
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.dsc_domain')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For DSC Domain Experts
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.noc_candidate')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For NOC Candidate
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.part_time')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Part-time Candidate
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.child_care')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Special Leave
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.academic-page')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Academic Year W.E.F
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.nodal_center')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Change of Nodal Research Center
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.bput_entrance')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For BPTU-Entrance
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.enrollment')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Pre-Enrollment Interview
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.phd_program')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Ph.D Programme
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.dsc_research')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For DSC Research Scholar
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.dsc_title')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Change Of Title Of The Research work
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.phd_semester')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Semester Registration
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.supervisor')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For  Change Of Research Supervisor
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.inclusion')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Inclusion of Co-Supervisor
                                                        </a>
                
                                                        <a class="dropdown-item" href="{{route('forms.application-enrollment')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Enrollment to Ph.D Programme
                                                        </a>
                
                                                        <a class="dropdown-item" href="{{route('forms.allotment')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Allotment in Ph.D Programme
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.seekingwork')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Seeking Extension to Complete Course Work
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.bput_semester')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Semester Progress Report
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.discontiue_stud')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Discontinuation as Ph.D Student
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.provisional')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Provisional Registration to Ph.D Degree
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.office-order')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Office Order
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.regd-renewal')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Renewal of Registration
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.thesis-submission')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Thesis Submission From
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.plagiarism-free')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Plagiarism Free Content
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.declaration-free')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Declaration of Research Scholar PFC
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.thesis-certificate')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Thesis Certificate
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.thesis-receipt')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Receipt of Ph.D Thesis 
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.thesis-submit')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Submit of Ph.D Thesis 
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.adjudication-thesis')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Adjudication of Ph.D Thesis 
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.confidential_form')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Confidential Form
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.external-thesis')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Ph.D External Thesis
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.viva-voiceform')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Viva-Voice Questions
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.proposal-form')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Submission Proposal of Ph.D Thesis
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.evaluation-form')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Thesis Evaluation
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.report-form')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Report on Defence Viva-Voice 
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.remuneration-form')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For Remuneration Bill
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.front-page')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For BPUT Front page
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.certificate-page')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For BPUT Certificate
                                                        </a>
                                                        <a class="dropdown-item" href="{{route('forms.thesiscover-page')}}">
                                                            <i class="dropdown-icon icon icon-picture"></i>For BPUT Thesis Cover page
                                                        </a>
                                                       
                                                    </div>
                                                </li>
                                            </ul>
									</div>
                                    </div> --}}

                                    <!-- Button For Menu OffCanvas right begin -->

                                    <!-- Button For Menu OffCanvas right close -->

                                </div>
                                <!-- Header Group Button Right close -->
                                <!-- mobile menu begin -->
                                {{-- <nav id="mobile-menu" class="site-mobile-menu hidden-lg hidden-md">
                                    <ul></ul>
                                </nav> --}}
                                <!-- mobile menu close -->

                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="sub-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- desktop menu begin -->
                                <nav id="desktop-menu"
                                    class="site-desktop-menu site-desktop-menu-2 hidden-xs hidden-sm">
                                    <ul class="clearfix">
                                        @foreach ($menus as $menu)
                                            <li aria-haspopup="true"><a
                                                    href="@if ($menu->cust_slug != '') {{ $menu->cust_slug }}@else /webpages/{{ $menu->slug }} @endif"
                                                    @if ($menu->new_tab == 1) target="_blank" @endif>{{ $menu->title }}
                                                    @if (count($menu->childs) > 0)
                                                        <span class="fa fa-chevron-down"></span>
                                                    @endif
                                                </a>
                                                @if (count($menu->childs) > 0)
                                                    <ul class="sub-menu">
                                                        @if (count($menu->childs))
                                                            @include('admin.menu.menusub', [
                                                                'childs' => $menu->childs,
                                                            ])
                                                        @endif
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>

                                </nav>
                                <ul class="mb-0 log_ul">
                                    <li class="d-none d-lg-block ">

                                        @if (auth()->user())
                                            <a class="btn btn-primary  ad-post" href="{{ route('logout_home') }}"
                                                style="padding:7px 20px;">Logout</a>
                                        @else
                                            <span><a class="btn btn-primary ad-post" href="{{ route('login') }}"
                                                    target="_blank" style="padding:7px 20px;">Login</a></span>
                                        @endif
                                    </li>
                                </ul>

                                <!-- desktop menu close -->

                                <!--  <div class="search-bar pull-right">
                                    <form role="search" method="get" class="search-form" action="search.php">
                                        <span class="search-box">
                                            <input type="search" class="search-field" placeholder="Search..." value="" title="" />
                                            <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                                        </span>
                                    </form>
                                </div> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </header>
        <!-- header close -->
        {{-- <div class="gray-line gray-line-2"></div> --}}
