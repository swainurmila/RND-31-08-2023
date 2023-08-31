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
        font-family: 'Times New Roman', Times, serif;
    }

    .recommended h4 {
        font-weight: bold;
        text-decoration: underline;
       
    }
    .recommended p{
        text-align: left;
        margin:20px 30px 0px 60px; 
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
                        <div class="col-md-12 text-left allotment">
                            <h5>1. Name of the Student:
                                _________________________________________________________________________</h5>
                            <h5>2. Enrolment No. ________________________________3. Date of
                                Enrolment:_____________________________</h5>

                            <h5>4. Name of the Faculty:
                                _________________________________________________________________________
                            </h5>
                            <h5>5. Name of Principal Supervisor: _________________________________,
                                6. Co-Supervisor: _________________________________________</h5>
                            <h5>7. Branch / Specialisation: _______________________________________________________
                            </h5>
                            <h5>8. Caste Status: GEN/SC/ST:
                                ______________________________
                                9. Category of studentship:
                                _________________________________________</h5>
                            <h5>10. Name of the NCR:
                                ______________________________________________________________________________</h5>
                            <h5>11. Proposed title of the Ph.D Thesis:
                                ___________________________________________________________________ </h5>
                            <h5>12. Brief description of research work proposed:
                                __________________________________________________________<br>
                                <p style="text-align:left">(to be filled jointly by the Student and the Supervisor(s) on
                                    a separate sheet)</p>
                            </h5>
                            <h5>
                                13. Major equipment/ facilities necessary to carry out the project and means of
                                obtaining them:_____________________,<br>
                                <p style="text-align:left">(To be filled jointly by the Student and the Supervisor(s) on
                                    separate sheet)</p>
                            </h5>
                            <h5>14. Plan of residence on campus: _______________________________________________________________________,
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">Date:___________________,</div>
                        <div class="col-md-6">Signature of Student</div>
                    </div>
                    <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
                    <div class="row">
                        <div class="col-md-12 text-center recommended">
                            <h4>RECOMMENDATION OF THE SUPERVISOR (S)</h4>
                            <p>1. Date of commencement of Research work:_____________________________________ </p>
                            <p>2. Comments: _______________________________________________ </p>
                        </div>
                    </div>
<div class="row" style="margin-top:40px ">
    <div class="col-md-6"><h5>Signature of Principal Supervisor</h5></div>
    <div class="col-md-6"><h5>Signature of Co-Supervisor (if, any)</h5></div>

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
