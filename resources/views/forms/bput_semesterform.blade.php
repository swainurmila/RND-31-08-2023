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

    .data-table {
        margin: 40px;
        width: 90%;
    }

    .varified {
        text-align: left;
        margin-left: 60px;
        padding: 15px;

    }

    .planned h5 {
        font-weight: bold;
        text-align: left;
        margin-left: 60px;
    }

    .semester_tb {
        margin: 40px;
        width: 90%;
    }

    .half-year th {
        text-align: center;
    }

    .para-stud h6 {
        font-size: 18px;
        margin: 50px;
        text-align: justify;
        font-family: 'Times New Roman', Times, serif;

    }

    .rnd h5 {
        text-align: left;
        margin-left: 40px;
    }

    .verified h4 {
        font-size: 20px;
        text-align: left;
        margin-left: 80px;
    }

    .verified h5 {
        margin-top: 50px;
        text-align: left;
        margin-left: 60px;

    }
    .approved h5{
        margin-top: 50px;
        text-align: right;
        margin-right: 60px;

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
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Semester : 1st / 2nd /3rd / 4th / 5th / 6th </h4>
                            <h4>
                                7th/ 8th/ 9th/ 10th/ 1lth/ 12th
                            </h4>
                        </div>
                        <div class="col-md-6">Year : ____________________ ,Date :_______________________</div>
                    </div>

                    <div class="row data-table">
                        <div class="col-md-12 ">
                            <table class="table  table-bordered">
                                <tr>
                                    <th>Name of the Research Student</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Name of the Faculty</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Topic of Ph.D. work</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Name of the NCR where research is being conducted</th>
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
                                    <th>
                                        <h5>Research Supervisor name</h5>
                                    <td>1)<br>
                                        2)
                                    </td>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="planned">
                        <h5>1. Progress Against Planned Work</h5>
                    </div>


                    <div class="row semester_tb">
                        <div class="col-md-12 ">
                            <table class="table  table-bordered half-year">
                                <tr>
                                    <th>Semester/Half-Year after Registration</th>
                                    <th>Duration</th>
                                    <th>Planned work</th>
                                    <th>Actual Work</th>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>from | To</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
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
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <div class="planned">
                        <h5>2. Brief Description of work done in the preceding semester(10 lines)</h5>
                        <textarea style="height: 50%;width:85%"></textarea>
                    </div>

                    <div class="planned">
                        <h5>3. Details of publication</h5>
                    </div>


                    <div class="row semester_tb">
                        <div class="col-md-12 ">
                            <table class="table  table-bordered half-year">
                                <tr>
                                    <th>SI.No.</th>
                                    <th>Authors</th>
                                    <th>Title of the
                                        paper

                                    </th>
                                    <th>Journal /
                                        conferences
                                    </th>
                                    <th>Volume & No / Venue & Dates</th>
                                    <th>Page No.</th>
                                    <th>Copy attached
                                        (YES / TO)
                                    </th>
                                </tr>
                                <tr>
                                    <td></td>
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
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
                                    <td></td>
                                </tr>

                            </table>
                        </div>
                    </div>

                    <div class="planned">
                        <h5>4. Difficulties Encountered:</h5>
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
                        <div class="col-md-12 text-center recommended ">

                            <h4>Recommendation of the Research Supervisor</h4>



                        </div>
                    </div>
                    <div class="row" style="margin-top:40px ">
                        <div class="col-md-6">
                            <h5>Name of Scholar:</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>Enrollment No with date: </h5>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 para-stud">
                            <h6>Certified that the student has fulfilled the residential requirement in the preceding
                                semester and the performance and progress of the Research Student is: Satisfactory / Not
                                Satisfactory</h6>
                        </div>
                    </div>
                    <div class="row" style="margin-top:40px ">
                        <div class="col-md-4">
                            <h5>Signature of Research Supervisor </h5>
                        </div>
                        <div class="col-md-4">
                            <h5>Signature of Head of the NCR </h5>
                        </div>
                        <div class="col-md-4">
                            <h5>Signature of Research Co-Supervisor </h5>
                        </div>

                    </div>

                    <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
                    <div class="row">

                        <div class="col-md-12 text-center recommended ">
                            <h4>Recommendation of DSC</h4>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12 para-stud">
                            <h6> The strident has delivered the six monthly progress seminar in an open seminar at the
                                NCR in our presence on the
                                progress made in last semester and Recommended for semester Registration.
                            </h6>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">_____________________</div>
                        <div class="col-md-4">______________________ <p>(Signature of Members, DSC)</p>
                        </div>

                        <div class="col-md-4">______________________</div>
                    </div><br>
                    <div class="row">
                        <div class="col-md-4">_____________________</div>
                        <div class="col-md-4">______________________ <p>(Signature of Members, DSC)</p>
                        </div>

                        <div class="col-md-4">______________________</div>
                    </div>
                    <div class="row" style="margin-top:40px ">
                        <div class="col-md-6">
                            <!-- <h5>Date: ____________________</h5>-->
                        </div>
                        <div class="col-md-6">
                            <h5>Chairperson, DSC</h5>
                        </div>

                    </div>
                    <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">

                    <div class="row" style="margin-top:40px">
                        <div class="col-md-6 rnd">
                            <h5>Copy forwarded for information and necessary action to the:</h5>
                            <h5>1. PIC (R&D) , BPUT .</h5>
                            <h5>2. Personal File of concerned student</h5>
                            <h5>3. Supervisor / Co-Supervisor</h5>
                        </div>
                        <div class="col-md-6 text-center">
                            <h6>Head of NCR</h6>
                        </div>

                    </div>
                    <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
                    <div class="verified">
                        <h4>Verified and found correct</h4>
                        <h5>J.E (R&D, BPUT)</h5>
                    </div>

                    <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
                        <div class="approved">
                            <h4>Approved / Not Approved</h4>
                            <h5>PIC(R&D), BPUT</h5>
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
