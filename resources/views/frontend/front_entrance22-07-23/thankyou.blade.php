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
/* .table thead {
    
} */
.table thead th {
    font-weight: bold !important;
    height:50px !important;
}
.content-wrapper ul li a span {
    font-size: 15px;
}
.subheader h1 {
   
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

/* ==== */



/* table,
    tr {
        font-family: arial, sans-serif;
        border: 0px solid black;
        border-collapse: collapse;
        width: 50%;
    }


    th {
        border: 2px solid black;
        text-align: left;
        padding: 10px;
        font-family: 'Times New Roman', Times, serif;
    }

    td {
        border: 2px solid black;

    } */




    

    .stud-form {
        margin-top: 20px;
        width: 100%;
    }

    .stud-form p {
        width: 90%;
        font-family: 'Times New Roman', Times, serif;
        font-size: 25px;
        font-weight: bold;
    }

    .fee_structure {
        border: 1px solid #000;
        width: 100%;
        padding: 0px;

    }

    .left {
        float: left;
        margin-left: 40px;
        font-weight: bold;
    }

    .right {
        float: right;
        font-weight: bold;
        margin-right: 40px;

    }

    .main-divi {
        margin-top: 50px;

    }

    .note-rec {
        margin-top: 50px;

    }

    .date-left {
        float: left;
        margin-left: 40px;
        font-weight: bold;
    }

    .head-right {
        float: right;
        font-weight: bold;
        margin-right: 40px;
    }

    /* p {
        text-align: justify;
        font-size: 10px;
        margin: 0px 40px 0px 40px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    } */

    .vc-date {
        float: left;
        margin: 0px 10px 0px 30px;
        font-weight: bold;
    }

    .c {
        clear: both;
    }

    .vc-bput {
        margin-top: 50px;
    }

    .vc-bputt {
        float: right;
        margin: 0px 10px 0px 30px;
        font-weight: bold;
        margin-right: 40px;
    }

    .dsc-table {
        width: 90%;
    }

    .bput-table {
        border: 2px;
        width: 90%;
        height: 100%;
    }



    .form-left {
        float: left;
        padding: 10px;
        margin: 45px;

    }

    .table-data {
        float: right;
        width: 20%;
    }

    .table-data table {
        width: 40%;
        margin: 20px 0px 200px 0px;
        height: 40%;
    }

    .present {
        float: left;
        margin: 20px 60px 60px 100px
        font-family: 'Times New Roman', Times, serif;
    }
    /* .present h5{
        margin-left: 60px;
        font-family: 'Times New Roman', Times, serif;
    } */
    /* .permanent {
        float: right;
        margin: 20px 200px 0px 20px
    }
    .permanent h5{
        margin-left: 60px;
        font-family: 'Times New Roman', Times, serif;
    } */
    /* .bio-data h5 {
        margin: 20px 60px;
        font-family: 'Times New Roman', Times, serif;
    } */

    /* .info-data {
        margin: 20px 60px;
    }

    .info-data table {
        width: 100%;
    } */

    .stud-info {
        margin: 20px 60px 20px 0px;
        width: 50%;
    }

    .stud-info tr th {
        width: 40%;

    }

    

    .dec-head {
        font-family: 'Times New Roman', Times, serif;
        text-decoration: underline;
        font-weight: bold;
    }

    

    .declare {
        font-family: 'Times New Roman', Times, serif;
        text-align: justify;
        font-size: 18px;
    }
    tbody td {
	padding: 17px !important;
}
input[type="text"] {
	
	background: none;
	border: none; 
	border-bottom: 2px dotted #000;
}
.d-flex {
	display: flex;
	align-items: center;
}
textarea{
    width: 100%;
    height: 50px;
    border-bottom: 2px dotted #000;
}
.d-flex {
	display: flex;
	align-items: center;
	margin-bottom: 20px;
}
.comm_div h5 {
	margin-right: 20px;
}

.datepicker-days td {
	padding: 5px 10px !important;
}
.col-form-label {
	width: 100%;
	text-align: left;
}
.cust-txt-input {
	margin-bottom: 30px;
}
.comm_div.d-flex .div_L {
	width: 45%;
	text-align: left;
}
.comm_div.d-flex .div_R {
	width: 60%;
}
#datepicker {
	width: 180px;
}

.bio-data .div_L {
	
	text-align: left;
}
.bio-data .div_R {
	
	text-align: left;
}
.error {
	font-size: 11px;
	color: red;
	font-family: arial;
	font-weight: normal;
	width: 100%;
	text-align: left;
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
    
                       <h1> You Have Been Registered Successfully..</h1>
                       <h6>Your file is reviewed by ExamCell..</h6>
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
{{-- <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/additional-methods.js"></script> --}}




@endsection

@section('jss')
<script>
        $(document).ready(function() {
  $("#datepicker").datepicker({ 
         //autoclose: true, 
        // todayHighlight: true
        format: 'yyyy-mm-dd'
  });
});
    </script>

<script>
   

    // add qualification 
    
            var count = 1;
            var counter = 0;
            $(document).ready(function() {
                $('#add_phdstudent_qualification_dtls2').click(function(e) {
    
                    //alert('hi');
                    e.preventDefault();
                    // var exam_passed = $('#phdstudent_qualification_field').valid();
                    // var discipline = $('input[name="phdstudent_specialization"]').valid();
                    // var university = $('input[name="phdstudent_board_university"]').valid();
                    // var passing = $('#phdstudent_passing_year').valid();
                    // var division = $('input[name="phdstudent_division"]').valid();
                    // var marks = $('input[name="phdstudent_percentage_cgpa"]').valid();
                    // var Certificate = $('input[name="cerificate"]').valid();
                    // var marksheet = $('#marksheet').valid();
    
    
                    // if (exam_passed && discipline && university && passing && division && marks &&
                    //     Certificate && marksheet) {
                        var phdstudent_qualification_field = $('#phdstudent_qualification_field').val();
                        var phdstudent_board_university = $('#phdstudent_board_university').val();
                        var phdstudent_passing_year = $('#phdstudent_passing_year').val();
                        var phdstudent_division = $('#phdstudent_division').val();
                        var phdstudent_percentage_cgpa = $('#phdstudent_percentage_cgpa').val();
                        var phdstudent_major_sub = $('#phdstudent_major_sub').val();
                       
                        var newRow = '<tr>' +
                            '<td>' + phdstudent_qualification_field +
                            '<input type="hidden" name="stu_quali[]" value="' +
                            phdstudent_qualification_field + '"></td>' +
                           
                            '<td>' + phdstudent_board_university +
                            '<input type="hidden" name="stu_univer[]" value="' +
                            phdstudent_board_university + '"></td>' +
                            '<td>' + phdstudent_passing_year +
                            '<input type="hidden" name="stu_pass_year[]" value="' +
                            phdstudent_passing_year + '"></td>' +
                            '<td>' + phdstudent_division +
                            '<input type="hidden" name="stu_division[]" value="' +
                            phdstudent_division + '"></td>' +
                            '<td>' + phdstudent_percentage_cgpa +
                            '<input type="hidden" name="stu_percentage[]" value="' +
                            phdstudent_percentage_cgpa + '"></td>' +
                            '<td>' + phdstudent_major_sub +
                            '<input type="hidden" name="stu_spec[]" value="' +
                            phdstudent_major_sub + '"></td>' +
                           
                            '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                            counter + '">Remove</button></td></tr>';
                        $('.addPhdQualifyrow2').append(newRow);
                        count++;
                        counter++;
                   // }
    
                });
    
                $(".addPhdQualifyrow2").on("click", ".remove_field", function(e) {
                    $(this).parent('td').parent('tr').remove();
                    counter--;
                    count--;
                });
            });
        </script>

<script type="text/javascript">
    $(document).ready(function() {


        // jQuery("#").validate({
        jQuery("#myForm").validate({
            // Specify validation rules
            //var val = {
            rules: {
                
                // name: "required",
                // father_husband_name: "required",
                // photo2: "required",
                // present_address: "required",
                // permanent_address: "required",
                // mobile: "required",
                // email: "required",
                // gender: "required",
                // marital_status: "required",
                // category: "required",
                // nationality: "required",
                // mother_tounge: "required",
                // phdstudent_qualification_field: "required",
                // phdstudent_board_university: "required",
                // phdstudent_passing_year: "required",
                // phdstudent_division: "required",
                // phdstudent_percentage_cgpa: "required",
                // phdstudent_major_sub: "required",

                // phdstudent_supervisor_email: {
                //     required: true,
                //     email: true
                // }

            },
            // Specify validation error messages
            messages: {
                // candidate_full_name: "Please Enter your fulll name.",
                // phdstudent_email: {
                //     required: "Email is required",
                //     email: "Please enter a valid e-mail",
                // },
                // phdstudent_supervisor_email: {
                //     required: "Email is required",
                //     email: "Please enter a valid e-mail",
                // }
            }
            // }
        });
      
    });
</script>
@endsection


