@extends('layouts.app')
@section('content')

<style>
.sptb-1 {
    /* background: linear-gradient(-225deg,rgb(40 79 117) 17%,rgb(40 79 117) 92%)!important; */
    background: #1e314e !important;
}
.text-center.text-white {
    text-transform: uppercase;
}
.bannerimg {
    padding: 2rem 0 2rem;
    background-size: cover;
}
.content-wrapper{min-height: 600px;}
.text-center.text-white h1 {
    font-size: 28px;
}
/* footer {
	display: none;
} */

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  /* padding: 8px; */
}
th {
    text-align: center;
    font-weight: bold;
    height: 40px;
}

/* tr:nth-child(even) {
  background-color: #dddddd;
} */
thead {
    background: #b9aaaa;
}
.table thead th {
    font-weight: bold !important;
    height:50px !important;
}
.content-wrapper ul li a span {
    font-size: 15px;
}
.subheader h1 {
    color: #ffffff;
    font-size: 22px;
    float: left;
    padding-right: 40px;
    text-transform: none;
    display: block;
    margin: 0px;
}
.subheader .breadcrumbs {
    font-size: 13px;
    color: #ffffff;
    float: right;
    list-style: none;
    margin: 10px 0px 0px 0px;
    padding: 0px;
}
.subheader{
    padding:60px 0 60px 0;  
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
{{-- <section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom subheader" style="background-position: 50% 0px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $page->page_title }}</h1>
                <ul class="breadcrumbs">
                    <li><a href="/" style="color: #29b6f6; font-weight: bold;">Home</a></li> 
                    <b>/</b> 
                    <li class="active">{{ $page->page_title }}</li>
                </ul>            
            </div>
        </div>
    </div>
</section> --}}
<section class="sptb portal_background ">
    <div class="container form-border-container">
        <div class="phd-form-section-title form-section-title">
            <h2><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h2>
            <p><b>NUMBER OF CANDIDATES PER RESEARCH SUPERVISOR</b></p>

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="" class="form" method="POST" id="myForm"
                enctype="multipart/form-data">
                @csrf
                <div class="tab">
                    <div class="mb-2 row">
                       <label class="col-md-4 col-form-label" for="faculty"><b>Category of Supervisor/Co-Supervisor: <span class="error">*</span></b></label>
                       <div class="col-md-8">
                           <select class="custom-select" id="supervisor_field" name="supervisor_field" >
                               <option value="" >Select Catagory</option>
                               <option value="professor_level">Professor Level</option>
                               <option value="ass_professor_level">Associate Professor Level</option>
                               <option value="asst_professor_level">Assistant Professor Level</option>
                           </select>
                       </div>
                       
                    </div>
                    <div class="mb-2 row">
                        <label class="col-md-4 col-form-label"  for="max_candidate"><b>Maximum no. of candidates at any point of time: <span class="error">*</span></b></label>
                        <div class="col-md-8">
                            <input type="text" id="max_candidate" name="max_candidate" class="form-control" placeholder = "00" >
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-md-4 col-form-label"  for="scst_candidate"><b>SC/ST Candidates: <span class="error">*</span></b></label>
                        <div class="col-md-8">
                            <input type="text" id="scst_candidate" name="scst_candidate" class="form-control" placeholder = "00" >
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-md-4 col-form-label"  for="diff_abled_candidate"><b>Differently-abled or any other reserved category candidates: <span class="error">*</span></b></label>
                        <div class="col-md-8">
                            <input type="text" id="diff_abled_candidate" name="diff_abled_candidate" class="form-control" placeholder = "00" >
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-md-4 col-form-label"  for="national_tests"><b>QIP/FIP/NDF/UGC-NET(including JRF)/UGC-CSIR NET(including JRF)/SLET/GPAT/GATE/CAT or other similar national tests: <span class="error">*</span></b></label>
                        <div class="col-md-8">
                            <input type="text" id="national_tests" name="national_tests" class="form-control" placeholder = "00" >
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-md-4 col-form-label"  for="general_candidate"><b>General Merit Candidates: <span class="error">*</span></b></label>
                        <div class="col-md-8">
                            <input type="text" id="general_candidate" name="general_candidate" class="form-control" placeholder = "00" >
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <button type="button"
                                class="btn add_supervisor_dtls  btn-outline-success btn-icon waves-effect waves-themed "
                                style="margin-top: 2.3rem !important;" id="add_supervisor_dtls">
                                +
                            </button>
                        </div>
                    </div>
                    <table class="table table-sm m-0 table-bordered">
                        <thead class="">
                            <tr class="table-heading">
                                <th>Category of Supervisor/Co-Supervisor</th>
                                <th>Maximum no. of candidates at any point of time</th>
                                <th>Differently-abled or any other reserved category candidates</th>
                                <th>QIP/FIP/NDF/UGC-NET(including JRF)/UGC-CSIR NET(including JRF)/SLET/GPAT/GATE/CAT or other similar national tests:</th>
                                <th>General Merit Candidates</th>
                            </tr>
                        </thead>
                        <tbody class="add_candidate">
                        </tbody>
                    </table>
                  <div style="overflow:auto;">
                    <div style="float:right; margin-top: 5px;">
                        <a href="/researchsupervisorform" class="button">Submit</a>
                    </div>
                </div>
                </div>

               
        </form>
    </div>
    <div class="item-all-cat center-block text-center education-categories">

    </div>
    </div>
</section>




<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>

@endsection