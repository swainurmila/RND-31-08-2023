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

    .fee_structure {
        border: 1px solid #000;
        width: 100%;
        padding: 0px;

    }

    .notice {

       text-align: justify;
        margin: 20px 40px 0px 60px;
        font-family:'Times New Roman', Times, serif;
        font-size: 17px;
        line-height: 30px;
    }

    .abc {
        font-size: 80px !important;
    }

    .enrollment {
        margin: 40px;
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
                    <h5><u><b>NOTIFICATION OF CONSOLIDATED NIERIT LIST OF CANDIDATES AFTER BPUT-ETR
                                AND PRE -ENROLLMENT INTERVIEW
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
                        <div class="row">
                            <div class="col-md-12">
                                <h4><u>
                                        NOTICE</u>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="notice">The following candidates have qualified in the BPUT-ETR and
                                the pre enrollment interview for entrollment to Ph.D programme in
                                _________________________. They are required to contact the prospective supervisors and
                                Co-Supervisors in their preferred BPUT Nodal Center of research and apply for Enrollment
                                to Ph.D programme through the concerned Nodal Center of research (BPUT-NCR) in the
                                prescribed Format BPUTfPh.D.-2019/ 9 available in the BPUT website, The application for
                                Enrollment through the BPUT-NCR should reach the 8PUT by s'peed post on or before
                                ___________________________,

                            </h5>
                        </div>

                    </div>
                    <div class="row enrollment">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th rowspan="2">Discipline</th>
                                    <th rowspan="2">Name Of Candidate</th>
                                    <th rowspan="2">Date
                                        Birth
                                    </th>
                                    <th colspan="6">Preferred Nodal Research Center as per the application

                                    </th>

                                </tr>
                                <tr>
                                    <td>1st</td>
                                    <td>2nd</td>
                                    <td>3rd</td>
                                    <td>4th</td>
                                    <td>5th</td>
                                    <td>6th</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
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
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
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
