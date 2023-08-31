@include('frontend.layouts.header')
<style>
    table,
    tr {
        font-family: 'Times New Roman', Times, serif;
        border: 1px solid black;
        border-collapse: collapse;
        width: 50%;
    }

    td,
    th {
        border: 1px solid #252323;
        text-align: left;
        padding: 10px;
    }

    tr:nth-child(even) {}


    @page {
        size: A4;

    }

    @media print {

        .horizontal-main {
            display: none;
        }

        .top-bar {
            display: none;
        }

        .btn-primary {
            display: none;
        }

        .fee-body {
            border: 2px;
        }

        .container {
            border: 2px;
        }


    }

    .fee_structure {
        border: 1px solid #000;
        width: 100%;
        padding: 0px;

    }

    .notice {

        color: #000;
        margin: 20px 40px 0px 60px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        font-size: 80px;
    }

    .abc {
        font-size: 80px !important;
    }

    .allotment {
        margin: 60px;
        padding: 10px;

    }

    .allotment h5 {
        padding: 10px;
    }

    .recommended h4 {
        font-weight: bold;
        text-decoration: underline;

    }

    .recommended p {
        text-align: left;
        margin: 20px 30px 0px 60px;
    }
    .data-table{
        margin: 40px;
        width: 90%;
    }
    .varified{
        text-align: left;
        margin-left: 60px;
        padding:15px;

    }
</style>

<body class="">
    @include('frontend.partials.navigation')

    <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
        </div>
    </div>
    <div class="container">
        <div>
            <h6 style="text-align:right"><b>ANNEXURE.BPUT/ Ph.D-2019</b></h6>
            <h6 style="text-align:right"><b>[video Ph.D.-27]</b></h6>
        </div>
        <section class="fee_structure ">
            <div class="section-title form-section-title dsc-form">
                <center>

                    <h3><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h3>
                    <h5><u><b>APPLICATION FOR COURSEWORK ALLOTMENT IN Ph.D PROGRAMME (FIRST DSC MEETING)
                            </b></u>
                    </h5><br><br>

                    <div class="row data-table">
                        <div class="col-md-12 ">
                            <table class="table  table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Name of the Faculty with branch /specialisation</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Name of the NCR</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Enrollment No. & Date of Enrollment</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Regd. No. & Date of Regd.</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Date of commencement of course work</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th colspan="2"><b>
                                            <h5>Please tick the components not completed</h5>
                                        </b></th>

                                </tr>
                                <tr>
                                    <th>Not Registered for course work</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>LesS than 75% Attendance in course Work</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Failed in one or more written course /courses</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Did not do the assigned work of other components</th>
                                    <td></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">Date:___________________,</div>
                        <div class="col-md-6">Signature of Student</div>
                    </div>
                    <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
                    <div class="row">
                        <div class="col-md-12 text-center ">
                            <div class="col-md-12 text-center recommended ">
                                <h4>Recommendation of the Research Supervisor</h4>
                                <h6>Extension for one additional chance may be / may not be given. </h6>

                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:40px ">
                        <div class="col-md-6">
                            <h5>Date: ____________________</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>Signature of Research Supervisor </h5>
                        </div>

                    </div>
                    <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
                    <div class="row">
                        <div class="col-md-12 text-center ">
                            <div class="col-md-12 text-center recommended ">
                                <h4>Recommendation of the DSC</h4> 
                    
                                <h6>Recommended/ Not Recommended</h6>

                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:40px ">
                        <div class="col-md-6">
                            <h5>Date: ____________________</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>Chairperson, DSC </h5>
                        </div>

                    </div>
                    <hr
                    style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
                    <div class="varified">
                        <h6>Verified and found correct.</h6>
                        <h5>Jr. Excutive (R&D), BPUT</h5>
                    </div>
                    <hr
                    style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
                    <div class="row">
                        <div class="col-md-12 text-center ">
                            <div class="col-md-12 text-center recommended ">
                                <h5>Approved / Not Approved</h5> 
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:40px ">
                        <div class="col-md-6">
                            <h5>Date: ____________________</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>PIC(R&D) , BPUT </h5>
                        </div>

                    </div>

                    
                </center>
            </div>
        </section>
    </div>
    <br><br>
    <div class="bg-dark  text-white p-0">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-12 col-sm-12 mt-3 mb-3 text-center ">Copyright &copy; 2021
                    <a href="#" class="fs-14 text-primary textfooter"> Biju Patnaik University Of Technology </a> All
                    rights reserved.
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script>
        $(document).on('change', '#super_add', function(e) {
            // alert('hello');
            var option = $('option:selected', this).attr('sup-id');
            //alert(optionSelected);
            $('#sup_id').val(option);
        });
    </script>
</body>
