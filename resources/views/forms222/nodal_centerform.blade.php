@include('frontend.layouts.header')
<style>
    table,
    tr {
        font-family: arial, sans-serif;
        border: 1px solid black;
        border-collapse: collapse;
        width: 50%;
    }


    th {
        border: 1px solid black;
        text-align: left;
        padding: 10px;
        font-family: 'Times New Roman', Times, serif;
    }

    td {
        padding-right: 280px;
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

    p {
        text-align: justify;
        font-size: 30px;
        margin: 0px 40px 0px 40px;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }

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

    .nodal-para h5{
        margin: 10px 60px 0px 60px;
        text-align: left;
        font-family:'Times New Roman', Times, serif;
        font-size: 17px;
    }
    .leave{
        font-family: 'Times New Roman', Times, serif;
        font-weight: bold;
        font-size:18px;
        text-decoration: underline;
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
                    <h5 class="leave">APPLICATION OF SPECIAL LEAVE (MATERNITY/CHILD CARE)</h5><br>

                    <table class="table table-bordered dsc-table">

                        <tr>
                            <th>Name:</th>
                            <th>Enrollment No & Date:</th>

                        </tr>
                        <tr>
                            <th>Faculty of:</th>
                            <th>regd no. & Date:</th>

                        </tr>
                        <tr>
                            <th> Branch & Specialization:</th>
                            <th>Topic of the research work:</th>

                        </tr>

                        <tr>
                            <th> Present status of research work </th>
                            <td></td>

                        </tr>
                        <tr>
                            <th colspan="2"> Present Nodal Research Center:<br>Name of the Present Supervisor:<br>Name
                                of the Present Co-Supervisor:</th>


                        </tr>
                        <tr>
                            <th colspan="2">Proposed Nodal Research Center:<br>Name of the Proposed Supervisor:<br>Name
                                of the Proposed Co-Supervisor:</th>

                        </tr>
                        <tr>
                            <th colspan="2">Reasons for change of center (attach the copy of relevant document): <p
                                    style="text-align:right">Full Signature of the candidate</p>
                            </th>


                        </tr>
                        <tr>
                            <div>
                                <div>
                                    <th style="text-align:center"><u>Consent of the proposed NCR</u><br><br>
                                        <div>
                                            <div style="float:left">
                                                <p>_________________<br>Supervisor</p>
                                            </div>
                                            <div style="float:right">
                                                <p>_________________<br>Co-Supervisor<br>
                                            </div>

                                        </div>
                                        <hr
                                            style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:50px">
                                        <p>Recommendation of Head of proposed NCR <br>(signature and date)</p>
                                    </th>
                                </div>
                                <div style="float:right">
                                    <th style="text-align:center"><u>Consert of the existing supervisor,
                                            Co-supervisor</u><br><br>
                                        <div>
                                            <div style="float:left">
                                                <p>_________________<br>Supervisor<br>(Signature with date)</p>
                                            </div>
                                            <div style="float:right">
                                                <p>_________________<br>Co-Supervisor<br>(Signature with date)</p>
                                            </div>
                                        </div>
                                    </th>
                                </div>
                            </div>
                        </tr>
                        <!-- </tr>
                        <tr>
                            <th>Leave already availed during the year (Medical)</th>
                            <td></td>
                        </tr>
                        </tr>
                        <tr>
                            <th> Address during the leave with Tel. No.</th>
                            <td></td>
                        </tr>-->
                    </table>

                    <br><br>
                    <div class="note">
                        <h5><u><b>Recommandation of Heag of existing NCR</b></u></h5>

                        <div class="nodal-para">
                            <h5>To<br>
                                The PIC (R&D.), BPUT<br>
                                The concerned Supervisor and Co-supervisor have agreed to transfer of the candidate to
                                the.proposed NCR. The candidate has cleared all the  dues
                                and this NCR has no objection to such transfer.

                            </h5>
                        </div>
                    </div>
                    <div class="main-divi">

                        <div class="right">(Head of existing NCR) <br> (Signature with date)

                        </div>
                    </div>
                    <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:100px">
                    <div>
                       
                        <div class="nodal-para">
                            <h5>To<br>The PIC (RED), BPUT<br>
                                Thcte exists a vecancy in the relevant category under the above proposed Research Supervisor and Co-Supervisor and they have consented to accept the candidate. This NCR has no objection to such transfer to our NCR.
                                
                            </h5>
                        </div>
                        <div class="note-rec">

                            
                            <div class="head-right">(Head of proposed NCR)<br>(Signature with date)</div>
                        </div>
                    </div>
                    <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:100px">
                    <div>
                        <h5><u><b>Remark of the PIC (R&D),BPUT,Rourkela</b></u></h5>
                        <p>The case is found to be genuine and all document have been verified. The application may / may not be considered.</p>
                        <div class="c"></div>
                        <div class="vc-bput">
                            <div class="vc-date">Jr. Executive (R&D Cell)</div>
                            <div class="vc-bputt">PIC (R&D),BPUT</div>

                        </div>
                        <hr
                            style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:100px">
                    </div>
                    <div>
                        <p>Approved / not Approved </p>
                        <div class="c"></div>
                        <div class="vc-bput">
                       
                            <div class="vc-bputt">Vice Chancellor,BPUT</div>

                        </div>
                        <div class="c"></div>
                        <br>
                        
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
