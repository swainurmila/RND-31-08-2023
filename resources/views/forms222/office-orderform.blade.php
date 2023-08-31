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
    }

    .office-order h6 {
        text-align: justify;
        margin: 40px 60px 0px 60px;
        font-size: 18px;
        font-family: 'Times New Roman', Times, serif;
        text-align: justify;
    }

    .office-order h4,
    h5 {
        font-weight: bold;

        margin-top: 30px;
    }

    .candidate {
        margin-left: 60px;
    }
    .candidate h6{
        font-size: 18px;
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
                    <br><br>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>
                                No. BPUT/PIC(R&D) / _________ / ___________
                            </h5>
                        </div>
                        <div class="col-md-6">
                            <h5>Date: ________________</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 office-order">
                            <h4> OFFICE ORDER</h4>
                            <h5>Provisional Registration of student for Ph.D. Degree</h5>
                            <h6>Upon recommendation of Doctoral Scrutiny Committee (DSC) held on ________________________________ & approval of the Vice
                                Chancellor on _____________________________, Mr. ____________________________ has been provisionally registered as a Ph.D Research Scholar under
                                Biju Pattnaik University of Technology, Odisha w.e.f. ___________________________________
                                consequent to his/her satisfactory completion of Course work & other qualifying
                                requirements. The particulars of registration are given below:
                            </h6>


                        </div>

                    </div>

                    <div class="row enrollment">
                        <div class="col-md-12">
                            <table class="table table-bordered ">
                                <tr>
                                    <th>1</th>
                                    <th>Name of the Student :</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <th>Father's / Husband's Name :</th>
                                    <td>
                                    </td>
                                </tr>
                                <tr>
                                    <th>3</th>
                                    <th> Address for correspondence :</th>
                                    <td> </td>
                                </tr>
                                <tr>
                                    <th>4</th>
                                    <th>Faculty (Engg./Pharm. Etc.)</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>5</th>
                                    <th>discipline/ Specialization
                                    </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>6</th>
                                    <th>NCR to which admitted </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>7</th>
                                    <th>Date of Birth</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>8</th>
                                    <th>
                                        Category
                                        (SC/ST/GEN/ Differently A bled / any other)

                                    </th>
                                    <td></td>

                                </tr>
                                <tr>
                                    <th>9</th>
                                    <th>Category of studentship
                                        (Full Time / Part Time / Full Time Special)
                                    </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>10</th>
                                    <th>Enrollment No. & Date ot Enrollment</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>11</th>
                                    <th>Regd. No.</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>12</th>
                                    <th>Registration effective from</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>13</th>
                                    <th>Earliest date of thesis Submission
                                        [3 yrs w.e.f. date of enrollment ,for (full time), 3 & 1/2 yrs, for (part time)
                                        candidates]
                                    </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>14</th>
                                    <th>Supervisor(s)</th>
                                    <td>1)<br>2)</td>
                                </tr>
                                <tr>
                                    <th>15</th>
                                    <th>Title of Ph.D Work</th>
                                    <td></td>
                                </tr>
                            </table>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h5> 16. Course Work Completed (YES / NO) :</h5>
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
                    <div class="row candidate">
                        <div class="col-md-12 text-left">
                            <h5>17. For sponsored candidates:</h5>
                            <h6>(1) Whether permitted to work outside the Institute: (Yes / No):
                                ______________________________________</h6>
                            <h6>
                                (2) Place of work: ______________________________________________
                            </h6>
                            <h6>(3) Residential requirement completed in: Year __________ Months: __________</h6>
                            <h5>18. Validity of Registration : _____________________________________</h5>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            {{-- <h6>Date:</h6> --}}
                        </div>
                        <div class="col-md-6 ">
                            <h5>PIC (R&D), BPUT</h5>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Memo No. BPUT/R&D/ ________________________ /20_________________</h6>
                        </div>
                        <div class="col-md-6 ">
                            <h5>Date:</h5>
                        </div>

                    </div>

                    <div class="row candidate">
                        <div class="col-md-12 text-left">
                            <h5>Copy to :</h5>
                            <h6>(1) Student concerned (Through BPUT-NCR) :
                                ______________________________________</h6>
                            <h6>
                                (2) Head of the Institute : ______________________________________________
                            </h6>
                            <h6>(3) Head of the BPUT-NCR  _________________________</h6>
                            <h6>(4)Supervisor(s) :(1) _______________________________ (2) ______________________________</h6>
                            <h6>(5)Employer: ____________________________________________</h6>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 text-center" style="margin-left:50px">
                            
                            <h4 style="text-align:right;margin-right:100px">PIC(R&D),BPUT</h4>
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
