@extends('layouts.app')
@section('content')
    <style>
        form {
            width: 100%;
            height: 100%;
            border-radius: 1px solid black;
        }
        section#subheader h1 {
    color: #ffffff;
    font-size: 22px;
    float: left;
    padding-right: 40px;
    text-transform: none;
    display: block;
    margin: 0px;
}
input[type="text"] {
	
	background: no-repeat;
	border: none;
	border-bottom: 2px dotted #000;
}
    </style>
    {{-- <div class="bread_crumbs">
    <div class="container22">
        <div class="sptb-1 bannerimg">
            <div class="header-text mb-0">
                <div class="container">
                    <div class="text-center text-white" style="margin: 0;">
                        <h1 class="" style="color:#fff;">{{ $page->page_title }}</h1>
                        <ol class="breadcrumb text-center">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active text-white"  aria-current="page" style="margin: 0;">{{ $page->page_title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
    <section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom subheader"
        style="background-position: 50% 0px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Entrance Form</h1>
                    <ul class="breadcrumbs">
                        <li><a href="/" style="color: #29b6f6; font-weight: bold;">Home</a></li>
                        <b>/</b>
                        <li class="active">Entrance Form</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="content-wrapper">
        <div class="sptb">
            <div class="container">
                {{-- <div>
                <h6 style="text-align:right"><b>ANNEXURE.BPUT/ Ph.D-2019</b></h6>
                <h6 style="text-align:right"><b>[video Ph.D.-27]</b></h6>
    
            </div> --}}
                <section class="fee_structure" style="margin-top: 80px; padding: 50px 40px;">
                    <div class="section-title form-section-title dsc-form">
                        <center>

                            <form action="#" style="border:1x radius black">
                            <div class="row 12">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6 text-right">
                                    <p> Form No.:BPUT/Ph.D.-2019/7.1 <br>
                                        (vide Ph.D.-9.1)</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5> <U> Remark of DRDC(For official use only)</U></h5>
                            </div>

                            <div class="row-12">
                                <div class="col-md-8 text-left">
                                    <p> 1.The candidate may be called for Written Test(BPUT-ETR)</p>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox">
                                </div>
                            </div>
                            <div class="row-12">
                                <div class="col-md-8 text-left">
                                    <p>2.The candidate may be exemted from appearing the Written Test(BPUT-ETR)</p>
                                </div>
                                <div class="col-md-4">
                                    <input type="checkbox">
                                </div>
                            </div>
                            <div class="row-12">
                                <div class="col-md-8 text-left">
                                    <p>3.The candidate does not satisfy short listing criteria,So, Recommended to be
                                        rejected</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <input type="checkbox">
                            </div>
                    </div><br><br><br>
                    <div>
                        <div class="row-12" style="margin-left: 5%;">

                            <!-- <hr style="width: 80px;">  -->
                            <p style="display: flex; width:100%;justify-content:space-around"><input type="text">&nbsp; <input type="text"> &nbsp;<input type="text">&nbsp; <input type="text"></p>

                            <!-- <hr style="width: 80px;"> -->

                        </div>
                    </div><br><br><br>

                    <div>
                        <div class="row-12" style="margin-left:10% ;">

                            <!-- <hr style="width: 80px;">  -->
                            <p><input type="text"> <input type="text"> <input type="text"> </p>

                            <!-- <hr style="width: 80px;"> -->

                        </div>
                    </div>
                    <div class="row" style="margin-top:50px;">
                        <div class="col-md-6">
                            <p><b>(Signature of members with date)</b>  <input type="file"></p>
                        </div>
                        <div class="col-md-6 text-right">
                            <p><b>Signature of Chairperson,DRDC,BPUT <br>(With date)</b>  <input type="file" style="margin-left:350px"></p>
                        </div>

                        
                    </div>
                    {{-- <div>
                        <div class="row-12">
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-8" style="margin-left: 40%;">
                                <p><b> Signature of Chairperson,DRDC,BPUT <br>(With date)</b></p>
                            </div>

                        </div>
                    </div> --}}
                    <div>
                        <p>
                        </p>
                        <p>Forwaded to:<br>The PIC(R&D),BPUT for taking further necessary action.</p>
                    </div>

                    <div>
                        <p><b> Date:<input type="text"></b>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <b> Chairperson,DRDO,BPUT</b>
                        </p>
                        <p><textarea name="" id="" cols="30" rows="10" style="width: 100%; background: none; height: 50px; border:none; border-bottom:2px dotted #000"></textarea>
                        </p>
                    </div>

                    <div class="col-md-12 text-center">
                        <h6> <U>Remarks of the PIC (R&D),BPUT</U></h6>
                    </div>
                    <div class="col-md-12 text-left">
                        <p>Forwarded <br>&nbsp;&nbsp;The Director ofExamination,BPUT for necessary action.</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <p><b> Date:<input type="text"></b></p>
                        </div>
                        <div class="col-md-6  text-right">
                            <p><b> PIC(R&D),BPUT</b></p>
                        </div>
                    </div>
                    
        
                    <div class="col-md-12 text-center">
                        {{-- {{route('')}} --}}
                        <a href="{{route('entrance_form_two')}}" class="btn btn-primary">Back</a>
                        <a href="#" class="btn btn-primary">Submit</a>
                    </div>
            </div>
        </div>
            
            </center>
        </div>
        </section>
    </div>
    </div>

    </div>

    {{-- <div class="bg-dark  text-white p-0">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-12 col-sm-12 mt-3 mb-3 text-center ">Copyright &copy; 2021
                <a href="#" class="fs-14 text-primary textfooter"> Biju Patnaik University Of Technology </a>
                All
                rights reserved.
            </div>
        </div>
    </div>
</div> --}}

    <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>
@endsection
