@include('frontend.layouts.header')
<style>
    table,
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
        font-size: 10px;
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
    .present h5{
        margin-left: 60px;
        font-family: 'Times New Roman', Times, serif;
    }
    .permanent {
        float: right;
        margin: 20px 200px 0px 20px
    }
    .permanent h5{
        margin-left: 60px;
        font-family: 'Times New Roman', Times, serif;
    }
    .bio-data h5 {
        margin: 20px 60px;
        font-family: 'Times New Roman', Times, serif;
    }

    .info-data {
        margin: 20px 60px;
    }

    .info-data table {
        width: 100%;
    }

    .stud-info {
        margin: 20px 60px 20px 0px;
        width: 50%;
    }

    .stud-info tr th {
        width: 40%;

    }

    .tbd {
        width: 100%;
        margin: 0px 60px 0px 60px;
    }

    .dec-head {
        font-family: 'Times New Roman', Times, serif;
        text-decoration: underline;
        font-weight: bold;
    }

    .tbd {
        width: 80%;
        margin-right: 40px;
    }

    .declare {
        font-family: 'Times New Roman', Times, serif;
        text-align: justify;
        font-size: 18px;
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
                    <h5><b>
                            APPLICATION FOR BPUT ENTRANCE TEST FOR RESEARCH (BPUT- ETR)
                        </b></h5>
                    <p style="font-style:italic">(To be submitted by the candidate for appearing the Entrance Test /
                        Claiming exemption from Entrance Test)</p><br>
                    <div>
                        <p>(DD No._____________________/Dt.__________________ Bank Name:_________________________
                            Rs._________________)(Non-refundable)</p>
                    </div>
                    <div class="form-table">
                        <div class="form-left">
                            <h5>1. Name of the Candidate : _______________________________________________</h5><br>
                            <h5>2. Father / Husband's Name: _______________________________________________</h5>
                        </div>
                        <div class="table-data">
                            <img src="../images/paper.png">
                            <!-- <table>
                                <tr>
                                    <th></th>
                                    <td></td>
                                </tr>
                            </table>-->
                        </div>
                    </div>
                    <div class="c"></div>
                    <div>
                        <h5 style="text-align:left;margin-left:60px">3. Address for Correspondence</h5>
                        <div class="present"><u>Present Address</u>
                            
                               <h5> ..............................................................................................<br>.............................................................................................<br>
                                Mobile Contact No ........................................................<br> E-mail ID
                                ...........................................................................</h5>
                        </div>

                        <div class="permanent"><u>Permanent Address</u>
                           <h5>
                                ..............................................................................................<br>.............................................................................................<br>
                                Mobile Contact No ........................................................<br> E-mail ID
                                ...........................................................................</div>
                           </h5>
                    </div>
            </div>
            <div class="c"></div>
            <div class="bio-data">
                <h5>4. Sex (Male/Female) :__________________________________ </h5>
                <h5>5. Marital status (Married / Single): _______________________________</h5>
                <h5>6. Date of Birth: ________________________________</h5>
                <h5>7. Whether GEN /SC / ST/ Differently abled: ___________________________________</h5>
                <h5>8. Nationality: ______________________________</h5>
                <h5>9. Mother Tongue: __________________________</h5>
                <h5>10. In case of selection, Choice of BPUT-NCR (in order of preference)</h5>
                <div class="info-data">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>1</th>
                                <td></td>
                                <th>2</th>
                                <td></td>


                            </tr>
                            <tr>
                                <th>3</th>
                                <td></td>
                                <th>4</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>5</th>
                                <td></td>
                                <th>6</th>
                                <td></td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <h5>11. Educational Qualification (HSC onwards) [Enclose self attested copy of documents]</h5>
                <div class="tbd">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Degree</th>
                                <th scope="col">University/
                                    Board
                                </th>
                                <th scope="col">Year of
                                    Passing
                                </th>
                                <th scope="col">Class/
                                    Division
                                </th>
                                <th scope="col">% of marks
                                    / CGPA
                                </th>
                                <th scope="col">Major subject(s)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>

                            </tr>

                        </tbody>
                    </table><br>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 style="text-align:right">Full signature of the candidate with date</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5>12. Mention the Faculty in which : Engineering / Management Studies / Pharmacy /
                            Computer Application & Sciences Architecture<br>Research is to be conducted

                        </h5>
                        <h5>13. Branch ./ Specialization. ____________________________________________________________

                        </h5>
                        <h5>14. Are you claiming for exemption of Entrance Test Yes / No
                            (If yes, justify the same with proper document and mention the exemption category)
                        </h5>
                    </div>

                </div>
                <div class="row text-center">
                    <div class="col-md-12 dec-head">
                        <h3>Declaration</h3>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <h5 class="declare">I do hereby declare that the information furnished in this application
                            is true to the best of my knowledge and belief. If admitted, 1 shall abide by rules and
                            regulations of the University and Nodal Centre of Research allotted to me. If any
                            information furnished in this application is found to be untrue, 1 am liable to forfeit the
                            seat allotted to me any time in future and legal action be taken against me.

                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h5>Date :____________________</h5>
                        <h5>Place :___________________</h5>
                    </div>
                    <div class="col-md-6">
                        <h4 style="margin:30px 150px">Full Signature of the Candidate</h4>
                    </div>
                    <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:20px">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h5>1. High School pass Certificate Examination or other equivalent Examination Pass Certificate
                        </h5>
                        <h5>2. Memorandum of Marks of High School Certificate Examination or equivalent Examinations
                        </h5>
                        <h5>3. Pass Certificates of Intermediate /Diploma (Engg. etc.) Examinations</h5>
                        <h5>4. Memorandum of Marks of Intermediate /Dip1oma (Engg. etc.) Examinations</h5>
                        <h5>5. Pass Certificate of UG or other equivalent Examinations</h5>
                        <h5>6. Memorandum of Marks of UG or other equivalent Examinations</h5>
                        <h5>7. Pass Certificate of PGM M.Phil Examinations</h5>
                        <h5>8. Memorandum of Marks of PG/ M.Phil Examinations</h5>
                        <h5>9. Certificate in support of SC/ST/ Differently abled Category as the case may be (Mention
                            clearly)</h5>
                        <h5>10. Proof of National Eligibility Test qualified if any (GATE / GPAT/ NET etc.)</h5>
                        <h5>11. Two passport size phonographs</h5>
                        <h5>12. Aadhaar card</h5>
                        <h5>13. Demand draft no: __________________ dt: _______________ Bank Name: _______________
                            (Non-refundable)</h5>

                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <h4><u><b>For official use only</b> </u></h4>
                    </div>
                </div>
                <div class="row text-">
                    <div class="col-md-12">
                        <h5>Serial No. of the Application: _____________________________________</h5>
                        <h5>Date of Receipt :________________________________________________</h5>
                    </div>
                </div>
                <div class="row  text-center">
                    <div class="col-md-6">
                        <h6><b>J. E. (R&D Cell), BPUT</b></h6>
                    </div>
                    <div class="col-md-6">
                        <h6><b>PIC (R&D), BPUT</b></h6>
                    </div>
                </div>
                <div class="row  text-center">
                    <div class="col-md-12">
                        <h4><b>Remarks of DRDC (For official use only)</b></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <h5>1. The candidate may be called for Written Test(BPUT-ETR)</h5><br>
                        <h5>2. The candidate may be exempted from appearing the written Test(BPUT-ETR)</h5><br>
                        <h5>3. The candidate does not satisfy short listing criteria So. Recommended to be rejected</h5>
                    </div>
                    <div class="col-md-4  text-center">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                            style="width:60px;height:40px"><br><br><br>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                            style="width:60px;height:40px"><br><br><br><br>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault"
                            style="width:60px;height:40px">
                    </div>
                </div>
                <div class="row" style="margin:50px">
                    <div class="col-md-3">

                        ____________________________
                    </div>
                    <div class="col-md-3">
                        ____________________________
                    </div>
                    <div class="col-md-3">
                        ____________________________
                    </div>
                    <div class="col-md-3">
                        ____________________________
                    </div>
                </div>
                <div class="row" style="margin:50px">
                    <div class="col-md-4">

                        ____________________________
                    </div>
                    <div class="col-md-4">
                        ____________________________
                    </div>
                    <div class="col-md-4">
                        ____________________________
                    </div>

                </div>
                <div class="row  text-center">
                    <div class="col-md-12">
                        <h4>(Signature of members with date)</h4>
                    </div>
                </div>
                <div class="row text-left">
                    <div class="col-md-12" style="margin:50px">
                        <h4>
                            Signature of Chairperson, DRDC, BPUT
                            <BR>(With date)
                        </h4>
                    </div>
                    <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:0px">
                </div>
                <div class="row text-left">
                    <div class="col-md-12" style="margin-left:50px">
                        <h4>
                            Forwarded to:<br>
                            The PIC (R&D), BPUT for taking further necessary action.</h4>


                    </div>
                </div>
                <div class="row"style="margin-top:50px">
                    <div class="col-md-6">
                        <h6 style="margin-left:50px">Date:________________________</h6>
                    </div>
                    <div class="col-md-6">
                        <h6 style="margin:0px 180px">Chairperson, DRDC, BPUT</h6>
                    </div>
                    <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:0px">
                </div>
                <div class="row text-center">
                    <div class="col-md-12">
                        <h4><u><b>Remarks of the PIC (R&D, BPUT)

                                </b> </u></h4>
                    </div>
                </div>
                <div class="row text-">
                    <div class="col-md-12"style="margin-left:50px">
                        <h4>
                            Forwarded to:<br>
                            The PIC (R&D), BPUT for taking further necessary action.</h4>


                    </div>
                </div>
                <div class="row  text-center"style="margin-top:40px">
                    <div class="col-md-6">
                        <h6>Date : ___________________________</h6>
                    </div>
                    <div class="col-md-6">
                        <h6><b>PIC (R&D), BPUT</b></h6>
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
                    <a href="#" class="fs-14 text-primary textfooter"> Biju Patnaik University Of Technology
                    </a> All
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
