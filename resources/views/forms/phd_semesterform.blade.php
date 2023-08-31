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

    .enrollment {
        margin: 40px;
    }

    .student {
        margin: 60px;
    }

    .flex {
        margin-top: 50px;
    }

    .list-head h4 {
        font-weight: bold;
        text-decoration: underline;
    }

    .couse-work {
        border: 1px solid #000;
        margin: 0px 50px 0px 50px;
    }

    .payment h5 {
        text-align: left;
        padding: 5px;
        font-size:17px;
        margin-left: 60px;
        font-family: 'Times New Roman', Times, serif;
    }
    .report h5{
        text-align: left;
        font-size: 17px;
        padding: 5px;
        margin: 20px 60px 0px 60px;
        font-family: 'Times New Roman', Times, serif;
    }
    .office h6{
        margin: 30px 60px 20px 60px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 17px;
        text-align: justify;
    }
    .off-data h5{
        font-weight: bold;
        text-decoration: underline;
        margin-bottom:20px; 

    }
    .seme{
        font-family: 'Times New Roman', Times, serif;
        font-size: 17px;
        text-align: justify;
    }
    .off-data h6{
        margin: 40px; 
        font-weight: bold;
    }
    .off-data p{
text-align: justify;
margin-left: 60px; 
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Name of the BPUT- NCR :</th>
                                    <td>
                                        </th>
                                </tr>
                                <tr>
                                    <th> Name of the of the Department :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Enrollment No. & Date of Enrollment :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Regd. No with date of Registration :
                                    </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th> Name of the Research Supervisor :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Title of Ph.D. work :</th>
                                    <td></td>
                                </tr>
                                <tr>

                                    <th> Board Area of Research :</th>
                                    <td></td>
                                </tr>

                            </table>
                        </div>
                    </div>

                    <div class="couse-work">
                        <div class="row list-head" style="margin:40px ">
                            <div class="col-md-4">
                                <h4>List of coursework Assigned</h4>
                            </div>
                            <div class="col-md-4">
                                <h4>Credits</h4>
                            </div>
                            <div class="col-md-4 text-left">
                                <h4>Status</h4>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">1.</div>
                            <div class="col-md-6">Completed On Going</div>
                            <hr
                                style="height:2px;border-width:0;color:black;background-color:gray; width:70%; margin-top:0px">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">2.</div>
                            <div class="col-md-6">Completed On Going</div>
                            <hr
                                style="height:2px;border-width:0;color:black;background-color:gray; width:70%; margin-top:0px">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">3.</div>
                            <div class="col-md-6">Completed On Going</div>
                            <hr
                                style="height:2px;border-width:0;color:black;background-color:gray; width:70%; margin-top:0px">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 text-left" style="margin-left:100px">
                            <h5>Months elapsed since Enrolment: ______________________ </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6  text-left" style="margin-left:100px">
                            <h5>Registration status upto date : YES / NO</h5>
                        </div>
                    </div>

                    <div class="row" style="margin-top:px ">
                        <!--  <div class="col-md-6">
                            <h5>Signature of members of DSC

                            </h5>
                        </div>-->
                        <div class="col-md-12 text-right">
                            <h5 style="margin-right:80px">Signature of Research Student</h5>
                        </div>
                        <hr
                            style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:0px">
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center" style="margin-left:100px">
                            <h5><b><u>Payment details of Semester Fee</u></b></h5>
                        </div>
                    </div>
                    <div class="row payment">
                        <div class="col-md-12">
                            <h5>1. All the Semester dues till date has been cliared upto date & copies are enclosed: YES/
                                NO</h5>
                            <h5>2. Rs 3000/- (Fee submitted to BPUT)Receipt No / Drafi NO:___________________ ,issuing
                                office/ bank Date: _____________________ (To be enclosed)</h5>
                            <h5>3. Rs 7000J- (Fee submitted to: NCR) Receipt No / Orafl No:___________________ , Issuing
                                Office/ Bank Date:_______________________, </h5>
                        </div>
                        <hr
                            style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
                    </div>

                    <div class="row report">
                        <div class="col-md-12">
                            <h5>The semester progress report is enclosed</h5>
                            <h5>Certified that no dues die pending against the Research Student till date. The student is regular in his work, Registration to this Semester (Odd/ Even-----) is recommended. HP She has delivered the Semester progress seminar satisfactorily.

                            </h5>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Signature of principal Supervisor</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>Signature of tbc Heed of NCR</h5>
                        </div>
                    </div>
                    <hr
                    style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
                    <div class="row office">
                        <div class="col-md-12 text-center">
                            <h5><b><u>Office use only at  BPUT</u></b></h5>
                            <h6>Amount of Feg paid Rs. ____________________ 	& the University Receipt No. / Bank DD No. __________________ 	& Date. ________________________	(Attach photo copy of the University Receipt/Bank DD).</h6>
                        </div>
                    </div>
                    <div class="row off-data">
                        <div class="col-md-6">
                            <h5>Verified & Found correct</h5>
                            <h6>Jr. Executive (RED Section)</h6>
                            <p class="seme"> Copy of : 1. Course completion grade sheet (if any)</p>
                            <p class="seme">2. Progress Report in (Form No.: BPUT/ Ph.D - 2019 /20l7)</p>
                            <p class="seme">3. All Fees paid till date	</p>
                            <p class="seme">4. Semester Registration </p>
                        </div>
                        <div class="col-md-6">
                            <h5>Approved ID / NOT Approved</h5>
                            <h6>PIC(R&D)BPUT</h6>
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
