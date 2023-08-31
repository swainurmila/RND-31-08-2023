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
    .note h5{
        margin: 40px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 17px;
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
                    <p><b>APPLICATION OF SPECIAL LEAVE (MATERNITY/CHILD CARE)</b></p><br>

                    <table class="table table-bordered dsc-table">

                        <tr>
                            <th>Name of the student</th>
                            <td></td>

                        </tr>
                        <tr>
                            <th>Name of the faculty with Branch/Specialization</th>
                            <td></td>

                        </tr>
                        <tr>
                            <th> Name of NCR </th>
                            <td></td>

                        </tr>

                        <tr>
                            <th> Enrollment no </th>
                            <td></td>
                        </tr>
                        <tr>
                            <th> Regd No. & Date</th>
                            <td></td>

                        </tr>
                        <tr>
                            <th>Research for seeking leave (Give details)</th>

                            <td></td>
                        </tr>
                        <tr>
                            <th>Present status of Research</th>

                            <td></td>
                        </tr>
                        <tr>
                            <th>Period of leave</th>
                            <td>From: <div style="float: right;margin-left:50px">to:</div>
                            </td>
                        </tr>
                        </tr>
                        <tr>
                            <th>Leave already availed during the year (Medical)</th>
                            <td></td>
                        </tr>
                        </tr>
                        <tr>
                            <th> Address during the leave with Tel. No.</th>
                            <td></td>
                        </tr>
                    </table>

               
                    <div class="note">
                        <h5>I understand that this leave does not entitle me to extra classes,alternative examination or
                            credit for class tests / home assignments.</h5>
                    </div>
                    <div class="main-divi">
                        <div class="left">Date:</div>
                        <div class="right">Signature of Ph.D Student

                        </div>
                    </div>
                    <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:100px">
                    <div>
                        <h5><u><b>Recommendation of the Research Supervisor</b></u></h5>
                        <p>Medical leave from______________to_____________may be / may not be sanctioned</p>
                        <div class="note-rec">

                            <div class="date-left">Date:</div>
                            <div class="head-right">Signature of Research Supervisor</div>
                        </div>
                    </div>
                    <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:100px">
                    <div>
                        <h5><u><b>Recommendation of the Head, NCR</b></u></h5>
                        <p>Recommended / not Recommended</p>
                        <div class="c"></div>
                        <div class="vc-bput">
                            <div class="vc-date">Date</div>
                            <div class="vc-bputt">(Head of NCR)</div>

                        </div>
                        <hr
                            style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:100px">
                    </div>
                    <div>
                        <h5><u><b>Approval by Vice Chancellor, BPUT</b></u></h5>
                        <p>Approved / not Approved </p>
                        <div class="c"></div>
                        <div class="vc-bput">
                            <div class="vc-date">Date</div>
                            <div class="vc-bputt">Vice Chancellor,BPUT</div>

                        </div>
                        <div class="c"></div>
                        <br>
                        <table class="bput-table">
                            <tr style="margin:20px">
                                <td><br>No:BPUT/R&D/___________________ Dt: __________________<br><b>To</b><br>Head of
                                    the NCR _________________________________________ for records.
                                    <div>
                                        <div style="float:left;margin:40px">Dt:</div>
                                        <div style="float:right;margin:40px">PIC(R/D);BPUT</div>
                                    </div>

                                </td>

                            </tr>


                        </table>
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
                    <a href="#" class="fs-14 text-primary textfooter"> Biju Patnaik University Of Technology </a>
                    All
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
