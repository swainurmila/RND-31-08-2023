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
<section id="subheader" data-speed="8" data-type="background" class="padding-top-bottom subheader" style="background-position: 50% 0px;">
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
</section>
<div class="content-wrapper">
    <div class="sptb">
        <div class="container">
            {!! $page->content !!}
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


