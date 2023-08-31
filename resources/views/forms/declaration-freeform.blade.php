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

    .details {
        margin: 50px 50px 0px 50px;
        text-align: left;
        padding: 5px;
    }
    .details  h6{
        font-family: 'Times New Roman', Times, serif;
        font-size:15px;
    }

    .theis-paragraph h5{
        text-align: justify;
        margin: 10px 50px 10px 50px;
        font-family: 'Times New Roman', Times, serif;
        font-size:17px;
        line-height: 30px;
    }

    .theis-paragraph H6 {
        text-align: left;
        margin-left: 60px;
    }

    .forwarded {
        text-align: left;
        margin-left: 100px;
    }
    .forwarded h6 {
        font-family: 'Times New Roman', Times, serif;
        font-size:17px;
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
                            <h5>I, Sri/Smt./Ms . _________________________ bearing Regd. No. _________________________
                                Undertake
                                that the thesis entitled“ ________________________________________________

                                under the guidance and supervi5ion of Dr. ___________________ (Supervisor) and Dr.
                                ________________________________ (Co-Supervisor) submitted by me for Ph.D. Examination does not use any
                                source or material without acknowledgement and with any plagiarized content. If any act
                                of Plagiarism is detected in future beyond the UGC rules, the degree awarded consequent
                                to evaluation would be liable to be withdrawn by BPUT for which I shall have no
                                objection to such action of the BPUT, Odisha.

                            </h5>
                            <h5>Encl: Hard copy of the signed plagiarism Test computer generated report


                            </h5>
                        </div>
                    </div>
                    <div class="row details">
                        <div class="col-md-12">
                            <h6>(Full Signature of the Research Scholar)</h6>
                            <h6>Date:</h6>
                            <h6>Address:</h6>
                            <h6>Mobile No:</h6>
                            <h6>Email Id:</h6>
                            <h6>Full Signature of the Research Supervisor (with date)

                            </h6><br>
                            <h6>Full Signature of ltte Research Co- Supervisor (with date) (If any)</h6>
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
