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
        .container{
            border: 2px;
        }

    }
    .bput-fee{
        width:90%;
    }
    .fee_structure {
        border: 1px solid #000;
        width: 100%;
        padding: 0px;
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
            <div class="section-title form-section-title">
                <center>
                    
                    <h3><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h3>
                    <h5><b>FEE STRUCTURE*</b>
                        <h5>
                            <form action="" id="research_form">
                                <table class="bput-fee">
                                    <th colspan="5">Programme Fees for Doctor of Philosophy(Ph.D.) programme for indian
                                        students</th>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th colspan="3">Perticulars</th>
                                        <th>Amount in INR</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td colspan="3"><b>Ph.D Enrollment Fee</b></br>(One time payment to be made to
                                            the
                                            University at the time of Enrollment)</td>
                                        <td>10,000/-</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td colspan="3"><b>Ph.D Registration Fee</b></br>(One time payment to be made to
                                            the
                                            University at the time of Registration)</td>
                                        <td>15,000/-</td>
                                    </tr>
                                    <tr>
                                        <td rowspan="3">4</td>
                                        <td colspan="3"><b>Semester Fee</b></br>(To be paid as given below at the
                                            beginning
                                            of each semester upto 6 yrs or till submission of THESIS whichever is
                                            earlier
                                            with effect from the date of enrollment)
                                        </td>
                                        <td rowspan="3">10,000/-</td>
                                    </tr>
                                    <tr>
                                        <td>a</td>
                                        <td>3,000/-</td>
                                        <td>University fee to be deposited to BPUT A/C</td>
                                    </tr>
                                    <tr>
                                        <td>b</td>
                                        <td>7,000/-</td>
                                        <td>Nodal Center fee to be deposited with the center of research</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td colspan="3"><b>Registration Renewal Fee</b></br>(per Semester to be paid to
                                            the
                                            University in case of renewal of registration after six years of enrollment)
                                        </td>
                                        <td>20,000/-</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td colspan="3"><b>Thesis Submission Fee</b></br>(To be paid to the university
                                            at
                                            the time of thesis submission)</td>
                                        <td>15,000/-</td>
                                    </tr>
                                    <tr>
                                        <th colspan="5"><span class="error">*</span>Fees to be collected from
                                            international students would be USD equivalent to INR as mentioned above
                                        </th>
                                    </tr>
                                </table>
                                <h6><b>*The above mentioned rates of fees shall be subject to change by the BPUT from
                                        time
                                        to time</b></h6>
                            </form>
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
