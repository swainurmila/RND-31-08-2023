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
        font-family: 'Times New Roman', Times, serif;
    }

    .head-of-ncr {
        margin-top: 60px;
    }

    .approved h5 {
        margin-top: 60px;
    }

    .research h5 {
        font-weight: bold;
        text-decoration: underline;
    }

    .research h6 {
        margin: 20px 140px 40px 60px;
        text-align: justify;
        font-family: 'Times New Roman', Times, serif;
        font-size:16px;
    }

    .bput h5{
        margin: 20px 140px 40px 20px;
        text-align: justify;
        font-family: 'Times New Roman', Times, serif;
        font-size:16px;
    }
    .ncr-use h6 {
        text-align: left;
        margin-left:60px; 
        font-family: 'Times New Roman', Times, serif;
        font-size:16px;
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
                    <h5><u><b>APPLICATION FOR RENEWAL OF REGISTRATION
                            </b></u>
                    </h5>


                    <br><br>

                    <div class="row enrollment">
                        <div class="col-md-12">
                            <table class="table table-bordered ">
                                <tr>
                                    <th>Name of Candidate::</th>
                                    <th>Regd. No. :</th>
                                </tr>
                                <tr>
                                    <th>Name of the Faculty &
                                        NCR
                                        :</th>
                                    <th>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Date of Registration :</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Topic for Ph.D. research :</th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Name of the Research
                                        Supervisor
                                        :
                                    </th>
                                    <th>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6>Name of issuing Bank :</h6>
                                                <h6>Demand Draft Number :</h6>
                                            </div>
                                            <div class="col-md-6">
                                                <h6>Amount:</h6>
                                            </div>
                                        </div>
                                    </th>
                                </tr>

                            </table>
                        </div>


                    </div>

                    <div class="planned">
                        <h6>I hereby submit five hard bound copies of the thesis and 8 CD in the PDF format of the
                            Thesis
                        </h6>

                    </div>

                    <div class="row head-of-ncr">
                        <div class="col-md-6">
                            <h5>Date: ____________________</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>Signature of Research Student</h5>
                        </div>

                    </div>
                    <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:10px">
                    <div class="row">
                        <div class="col-md-12 research">
                            <h5>Recommendation by the Research Supervisor</h5>
                            <h6>The Scholar fulfills Al the requirements as per BPUT Ph.D Regulation-2019 along with UGC
                                prescribed plagiarism limit and has
                                been duly verified by me for submission of Thesis for Adjudication.
                            </h6>
                        </div>
                    </div>
                    <div class="row" style="margin-top:40px">
                        <div class="col-md-6">

                            <h6> Co- Supervisor
                            </h6>
                            <h6>Full signature</h6>
                            <h6>Name:</h6>
                            <h6>Date:</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>Supervisor
                            </h6>
                            <h6>Full signature</h6>
                            <h6>Name:</h6>
                            <h6>Date:</h6>

                        </div>
                    </div>


                    <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:10px">

                    <div class="row">
                        <div class="col-md-12 text-center bput" style="margin-left:50px">
                            <h4><B>For office Use only at NCR:_____________(Name of NCR)</B></h4>
                            <h5>The Thesis shall be submitted to the PIC (R&D), BPUT in the University R&D Cell by the
                                Research Supervisor & Candidate .The
                                Thesis shall only be accepted for adjudication provided all documents SI.1 to 9 are
                                enclosed.
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12  text-left ncr-use">
                            <h6>1.	Is the Course work completed as per DSC (Copy of the Grade sheet attached )</h6>
                            <h6>2.	Requisite fee has been received	& Copy attached</h6>
                            <h6>3.	Half-yearly progress reports are satisfactory & Copy attached</h6>
                            <h6>4.	Is the Thesis organised in BPUT prescribed format</h6>
                            <h6>5.	Recommend of DSC for the submission of Thesis?</h6>
                            <h6>6.	The proof of publication / acceptance of research papers as the first / corresponding author in Scopus / SCI UGC listed Referred journals has been Submitted</h6>
                            <h6>7.	Anti plagiarism computer report duly signed by student & Supervisor attached. [Form No.: Ph.D.- 2019/20(B)]</h6>
                            <h6>8.	DSC Recommendaiion for Thesis Examinations [Form No.: Ph.D. - 2019/24.1]</h6>
                            <h6>9.	DSC Recommendation for list of Experts for Viva Voce (in Sealed cover) (Form No.: Ph.D.- 2019/24.2)</h6>
                        </div>
                    </div>


                    <div class="row" style="margin-top:40px">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">

                            <h5> Signature of the Head of NCR
                            </h5>
                        </div>
                    </div>
                    <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:10px">

                    <div class="row head-of-ncr">
                        <div class="col-md-6">
                            <h6>verified and found correct.</h6>
                            <h5>J,E. (R&D), BPUT</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>PIC (R&D), BPUT</h5>
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
