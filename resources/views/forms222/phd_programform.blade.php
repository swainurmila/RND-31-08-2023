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
    .phd-enrollment th{
        text-transform: capitalize;
    }
    .para{
        text-align:justify;
        font-size:20px;
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
                    <h5><u><b>UNIVERSITY NOTIFICATION OF ENROLLMENT TO Ph.D. PROGRAMME
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
                            <p class="notice text-justify">The following selected candidates are allotted to BPUT Nodal
                                Center of Research as per the application submitted by them.
                            </p>
                        </div>

                    </div>
                    <div class="row enrollment">
                        <div class="col-md-12">
                            <table class="table table-bordered phd_enrollment">
                                <tr>
                                    <th>Sl no.</th>
                                    <th>Name Of Candidate</th>
                                    <th>Provisional
                                        enrollment no.
                                    </th>
                                    <th>Date of Birth</th>
                                    <th>Category</th>
                                    <th>Faculty</th>
                                    <th>Discipline and Spcialization</th>
                                    <th>Name of the NCR</th>
                                    <th> Name of Supervisor/Co-
                                        Supervisor</th>

                                    

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
                    <div class="row">
                        <div class="col-md-12">
                            <p class="notice text-justify">The above candidates are assigned with the provisional Enrollment nos as mentioned against each as  per the BPUT Ph.D regulation 2019.</P>
                            
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <p>No: BPUT/R&D/ ____________________________________ Dt. 20
                                ______________________________,

                            </p>
                        </div>
                    </div>
                    <br>
                    <H5>Copy to:</H5>
                    <div class="row">
                        <div class="col-md-12">
                     
                            <p>1. DoE, BPUT w.r.t, his Letter No. _______________________________________________ 	Dt. _____________________________________ </P>
                                <P>
                            2. University website for information of all candidates. They are required to repott to the concerned NCR through the respective supervisor for last DSP meeting.</P>
                            <P>
                            3. All BPUT-NCRs for information of at I Supervisors concerned.</p>
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
