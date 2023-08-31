@include('frontend.layouts.header')
<style>
    table,
    tr {
        font-family: arial, sans-serif;
        border: 1px solid black;
        border-collapse: collapse;
        width: 50%;
    }

    td,
    th {
        border: 1px solid black;
        text-align: center;
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

    .stud-form {
        margin-top: 20px;
        width: 100%;
    }

    .stud-form h5{
        width: 90%;
        font-family: 'Times New Roman', Times, serif;
        font-size: 16px;
        
        text-align: justify;
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

    .note h5 {
        text-align: justify;
        font-size: 17px;
        margin: 0px 40px 0px 40px;
        font-family: 'Times New Roman', Times, serif;
    }

    .vc-date {
        float: left;
        margin: 0px 10px 0px 30px;
        font-weight: bold;
    }

    .c {
        clear: both;
    }

    .vc-bputt {
        float: right;
        margin: 0px 10px 0px 30px;
        font-weight: bold;
    }

    .dsc-table {
        width: 90%;
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
                    <h5><u><b>FORMAT FOR PANEL OF PROPOSED DCS DOMAIN EXPERTS*</b></u></h5>

                    <div class="stud-form">

                        <h5>Name of the Student :____________________________________________Enrollment no
                            :________________________________Name of NCR
                            :__________________________________,Faculty of:________________________________
                            Branch/Specialization : ___________________________,Title of research work :
                            ___________________________</h5>

                    </div>


                    <br>

                    <table class="dsc-table">

                        <tr>
                            <th>Sl. No.</th>
                            <th>Name of Domain Experts</th>
                            <th>Designation & Affiliation</th>
                            <th>Telephone no. & Address</th>
                            <th>E-mail, If any</th>
                        </tr>
                        <tr>
                            <td colspan="5" style="font-size:13px;text-align:center"><b>Domain experts from inside
                                    Odisha (At
                                    least one Experts external
                                    to that BPUT-NCR)</b></th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <!--<td colspan="3"><b>Ph.D Enrollment Fee</b></br>(One time payment to be made to
                                            the
                                            University at the time of Enrollment)</td>
                                        <td>10,000/-</td>-->
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                        <tr>
                            <td>3</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>

                        <tr>
                            <td>4</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                        <tr>
                            <td>6</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                        <tr>
                            <td>7</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                        <tr>
                            <td>8</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                    </table>

                    <br><br>
                    <div class="note">
                        <h5><b>Note </b>: It is necessary for supervisors to mention eight names of domain
                            experts with proven research potential not below the rank of Associate
                            Professor/Scientist with Ph.D in the list as per the performa given for the
                            perusal of the Honorable Vice Chancellor, Biju Patnaik University of Technology,
                            Odisha The persons suggested, should be actively engaged in research work in the
                            concerned area/subject.</h5>
                    </div>
                    <div class="main-divi">
                        <div class="left">Date:</div>
                        <div class="right">Signature of research Supervisor<br> with Name & Designation
                            and
                            Affiliation</div>
                    </div>
                    <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:100px">
                    <div>
                        <h5><u><b>RECOMMENDATION OF NCR</b></u></h5>
                        <p>Recommended / not Recommended</p>
                        <div class="note-rec">

                            <div class="date-left">Date:</div>
                            <div class="head-right">(Head of NCR)</div>
                        </div>
                    </div>
                    <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:100px">
                    <div>
                        <h5><u><b>NOMINATION OF TWO DOMAIN EXPERTS TO THE DSC</b></u></h5>

                        <div style="float:left ;margin-left:40px">
                            1 . _______________________________<br><br>

                            2 . _______________________________
                        </div>

                        <br>
                        <div class="c"></div>
                        <div class="vc-bput">
                            <div class="vc-date">Date</div>
                            <div class="vc-bputt">VC,BPUT</div>

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
