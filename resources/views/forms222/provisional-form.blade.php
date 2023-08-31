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

    .inner-info {
        text-align: center;
        margin-top: 30px;
    }

    .disc {
        text-align: center;
        padding: 10px;
    }

    .planned h6 {
        font-weight: bold;
        text-align: left;
        margin-left: 60px;
    }

    .course-work {
        margin: 20px 50px 0px 50px
    }

    .approved {
        margin-top: 40px;
    }

    .member h5 {
        padding: 18px;
    }

    .rnd h5 {
        text-align: left;
        margin-left: 70px;
        font-family: 'Times New Roman', Times, serif;
    }

    .sign-bar h5 {
        font-family: 'Times New Roman', Times, serif;
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
                    <h5><u><b>Application and recommendation of DSC for provisional registration to Ph.D degree
                            </b></u>
                    </h5>


                    <br><br>

                    <div class="row enrollment">
                        <div class="col-md-12">
                            <table class="table table-bordered ">
                                <tr>
                                    <th>Name of the Student :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Father's / Husband's Name :</th>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th> Address for correspondence :</th>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <th>Faculty (Engg./Pharm. Etc.)</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>discipline/ Specialization
                                    </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>NCR to which admitted </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Date of Birth</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>
                                        Category
                                        (SC/ST/GEN/ Differently A bled / any other)

                                    </th>
                                    <td></td>

                                </tr>
                                <tr>
                                    <th>Category of studentship
                                        (Full Time / Part Time / Full Time Special)
                                    </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Enrollment No. & Date ot Enrollment</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Regd. No.</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Registration effective from</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Earliest date of thesis Submission
                                        [3 yrs w.e.f. date of enrollment ,for (full time), 3 & 1/2 yrs, for (part time)
                                        candidates]
                                    </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Supervisor(s)</th>
                                    <td>1)<br>2)</td>
                                </tr>
                                <tr>
                                    <th>Title of Ph.D Work</th>
                                    <td></td>
                                </tr>
                            </table>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Course Work Completed (YES / NO) :</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>Total credit assigned :</h5>
                        </div>
                    </div>
                    <div class="row course-work">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Sl.No.</th>
                                    <th>Subject Code</th>
                                    <th>Credit</th>
                                    <th>Course Title</th>
                                    <th>Grades</th>
                                    <th>Remarks/
                                        Date of passing
                                    </th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                </tr>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                </tr>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                </tr>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                </tr>
                                </tr>
                                <tr>
                                    <td colspan="6">Total Course Credits Completed</td>

                                </tr>
                            </table>
                        </div>
                    </div>

                    <div>
                        <H5 class="rnd"> Sir, I have completed all the required for Ph,D provisional registration and request you to
                            allot a
                            registration number.
                        </H5>
                    </div>
                    <div class="row" style="margin-top:40px">
                        <div class="col-md-6">

                            <h5> Date:
                            </h5>
                        </div>
                        <div class="col-md-6">

                            <h5> Full signature of Candidate
                            </h5>
                        </div>
                    </div>
                    <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:10px">


                    <div class="row">
                        <div class="col-md-12 text-center" style="margin-left:50px">
                            <h5><b><u>Recommendation of Supervisor for provisional Registration to Ph.D. Programme of
                                        BPUT</u></b></h5>
                        </div>
                    </div>
                    <div class="row approved">
                        <div class="col-md-6">

                            <h5>Supervisor</h5>
                            <h6> Date:
                            </h6>
                        </div>
                        <div class="col-md-6">

                            <h5>Co-Supervisor</h5>
                            <h6> Date:
                            </h6>
                        </div>
                    </div>
                    <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:10px">

                    <div class="row">
                        <div class="col-md-12 text-center" style="margin-left:50px">
                            <h5><b>Recommendation of DSC</b></h5>
                        </div>
                    </div>
                    <div class="row sign-bar" style="margin-top:20px">
                        <div class="col-md-4 member">

                            <h5> Signature of Member
                            </h5>
                            <h5>Signature of Point Member Convener</h5>
                        </div>
                        <div class="col-md-4 member">

                            <h5>Signature of Member
                            </h5>
                            <h5>Signature of Co-Chairperson</h5>
                        </div>
                        <div class="col-md-4 member">

                            <h5> Signature of Member convener
                            </h5>
                            <h5>Signature of Chairpersons</h5>
                        </div>
                    </div>
                    <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:10px">
                    <div class="row" style="margin-top:40px">
                        <div class="col-md-12 rnd">
                            <h5>Recommended & forwarded to the PIC (R&D), BPUT</h5>
                            <h5>Encl: 1.Copy of self attested Course work completion Grafie sheets .</h5>
                            <h5>2. Copy of all the deposit receipts of all semesters</h5>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Date:</h6>
                        </div>
                        <div class="col-md-6 ">
                            <h6>Head of NCR</h6>
                        </div>

                    </div>
                    <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:10px">
                    <div class="row">
                        <div class="col-md-12 text-left rnd" style="margin-left:50px">
                            <h5>Verified all the requirements and provisional Registration No. _________________ & Date
                                of Registration ______________________
                                may be issued.</h5>
                            <br><br>
                            <h4>J.E.(R&D)/ S.O</h4>
                        </div>
                    </div>
                    <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:10px">
                    <div class="row">
                        <div class="col-md-12 text-center" style="margin-left:50px">
                            <h5><b>Recommendation of PIC(R&D),BPUT</b></h5>
                            <h6>Recommended / Not Recommended</h6>
                            <br><br>
                            <h4 style="text-align:right;margin-right:100px">PIC(R&D),BPUT</h4>
                        </div>
                    </div>
                    <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:10px">
                    <div class="row">
                        <div class="col-md-12" style="margin-left:50px">

                            <h6>Approved / Not Approved</h6>
                            <br><br>
                            <h4 style="text-align:right;margin-right:100px">Vice Chancellor, BPUT</h4>
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
