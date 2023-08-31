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
        text-align:left;
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

    .enrollment {
        margin: 40px;
    }
    .student{
        margin: 60px;
    }
    .flex{
        margin-top: 50px;
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
                    <h5><u><b>OFFICE ORDER ON FORMATION OF DSC FOR THE RESEARCH SCHOLAR
                            </b></u>
                    </h5>


                    <br><br>
                    <div class="">
                        <div class="row">
                            <div class="col-md-12">
                                <p>No: BPUT/R&D/ ____________________________________ Dt. 20
                                    ______________________________,

                                </p>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="row enrollment">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name :</th>
                                    <th>Name of the NCR :</th>
                                </tr>
                            <tr>
                                    <th>Faculty of</th>
                                    <th>Enrollment No.with date:

                                        Regd. No with date:
                                        </th>
                                </tr>
                                <tr>
                                    <th>Discipline / Specialisation:</th>
                                    <th>Topic of the Research work:</th>
                                </tr>
                                <tr>
                                    <th colspan="2">Present Title of the Research Work:-</th>
                                </tr>
                                <tr>
                                    <th colspan="2">Proposed Title of the work:--</th>
                                </tr>
                                <tr>
                                    <th colspan="2">Reasons for change of title:-</th>
                                </tr>
                                <tr>
                                    <th colspan="2">Change in the area:- </th>
                                </tr>
                                <tr>
                                
                                    <th>Signature of the Candidate:-</th>
                                    <th>Signature Research Supervisor/co-Supervisor:-</th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-left" style="margin-left:100px">
                            <h5><b>Recommendation of the DSC</b> </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center" style="margin-top:20px">
                            <h5>Recommended / Not Recommended</h5>
                        </div>
                    </div>
                   
                    <div class="row" style="margin-top:40px ">
                        <div class="col-md-6">
                            <h5>Signature of members of DSC

                            </h5>
                        </div>
                        <div class="col-md-6">
                            <h5>(Chairperson, DSC)</h5>
                        </div>
                    </div>
                    <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:0px">
                    <div class="row">
                        <div class="col-md-12 text-left" style="margin-left:100px">
                            <h5><b>Approval of the VC, BPUT</b> </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center" style="margin-top:20px">
                            <h5>Approved/ Not Approved</h5>
                        </div>
                    </div>
                     
                    <div class="row" style="margin-top:px ">
                      <!--  <div class="col-md-6">
                            <h5>Signature of members of DSC

                            </h5>
                        </div>-->
                        <div class="col-md-12 text-right">
                            <h5 style="margin-right:80px" >Vice chancellor,BPUT</h5>
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
