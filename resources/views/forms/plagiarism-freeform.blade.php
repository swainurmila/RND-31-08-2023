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

    .details {
        margin-top: 40px;
    }

    .details h6 {
        font-size: 16px;
        font-family: 'Times New Roman', Times, serif;
    }

    .theis-paragraph h5 {
        text-align: justify;
        line-height: 25px;
        font-size: 16px;
        margin: 20px 50px 10px 50px;
        font-family: 'Times New Roman', Times, serif;
    }

    .forwarded {
        text-align: left;
        margin-left: 100px;
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
                    <h5><u><b>CERTIFICATE OF RESEARCH SUPERVISOR/Co-SUPERVISOR FOR
                                PLAGIARISM FREE CONTENT IN THE DOCTORAL THESIS
                            </b></u>
                    </h5><br><br>

                    <div class="row">
                        <div class="col-md-12 theis-paragraph">
                            <h5>I, Dr. ___________________________________ Certify that the thesis entitled

                                "_____________________________________________________________"
                                submitted by Sri/Smt/Ms. ______________________________________bearing Regd. No.
                                ______________________________________ under my guidance and supervision is free from
                                plagiarism to the best of my knowledge and belief as per the UGC rules.

                            </h5>
                        </div>
                    </div>
                    <div class="row details">
                        <div class="col-md-6">
                            <h6>Signature of the Supervisor with date</h6>
                            <h6>Mob No:</h6>
                            <h6>Email Id:</h6>
                            <h6>Address:</h6>
                        </div>
                        <div class="col-md-6">
                            <h6></h6>
                            <h6>Signature of the Co-Supervisor with date</h6>
                            <h6>Mob No:</h6>
                            <h6>Email Id:</h6>
                            <h6>Address:</h6>

                        </div>
                    </div>
                    <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
                    <div class="row">
                        <div class="col-md-12 forwarded">

                            <h6>To<br>
                                The PIC (R&D),<br>
                                BPUT.<br>
                                Forwarded for kind consideration.

                            </h6>
                        </div>
                    </div>
                    <div class="row" style="margin-top:40px ">
                        <div class="col-md-6">
                            <h5>Date: ____________________</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>Head of NCR </h5>
                        </div>

                    </div>
                    <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">



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
