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

    .head-of-ncr {
        margin-top: 60px;
    }
    .approved h5{
        margin-top: 60px;
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
                    <h5><u><b>OFFICE ORDER ON FORMATION OF DSC FOR THE RESEARCH SCHOLAR
                            </b></u>
                    </h5>


                    <br><br>

                    <div class="row enrollment">
                        <div class="col-md-12">
                            <table class="table table-bordered ">
                                <tr>
                                    <th>Name :</th>
                                    <th>Enrollment No. & Date :</th>
                                </tr>
                                <tr>
                                    <th>Faculty of :</th>
                                    <th>Regd. No. & Date :
                                    </th>
                                </tr>
                                <tr>
                                    <th> Branch / Specialization :</th>
                                    <th>Topic of the Research work :</th>
                                </tr>
                                <tr>
                                    <th colspan="2">Present Nodal Research Centre :</th>

                                </tr>
                                <tr>
                                    <th colspan="2">Details of research paper/s published :
                                    </th>

                                </tr>
                                <tr>
                                    <th colspan="2"> Progress Done so far :</th>

                                </tr>
                                <tr>
                                    <th colspan="2">Reason for discontinuation :</th>

                                </tr>
                                <tr>
                                    <th>
                                        <div class="inner-info">
                                            ____________________________________
                                            <h5>Name and signature of the Candidate</h5>
                                            <h6>Date :</h6>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="disc">
                                            <h4>Recommendation for Discontinuation</h4>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    _________________
                                                    <h5>Supervisor</h5>
                                                    <h6>Date :</h6>
                                                </div>
                                                <div class="col-md-6">
                                                    _________________
                                                    <h5>Co-Supervisor</h5>
                                                    <h6>Date :</h6>
                                                </div>
                                            </div>
                                            <h4>Signature Research supervisor/co-supervisor</h4>
                                        </div>
                                    </th>
                                </tr>

                            </table>
                        </div>


                    </div>

                    <div class="planned">
                        <h6>To<br>The PIC (R&D), BPUT for further action please.</h6>
                    </div>

                    <div class="row head-of-ncr">
                        <div class="col-md-6">
                            <h5>Date: ____________________</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>(Head of NCR) </h5>
                        </div>

                    </div>
                    <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:10px">


                    <div class="row">
                        <div class="col-md-12 text-center" style="margin-left:100px">
                            <h5><b><u>Remark of PIC(R&D) , BPUT</u></b></h5>
                        </div>
                    </div>
                    <div class="row approved">
                        <div class= "col-md-6">
                            <p>Application may be approved for discontinuation</p>
                            <h5>Jr. Ex. (R&D) / S.O</h5>
                              <h6>  Date:
                                </h6>
                        </div>
                        <div class= "col-md-6">
                            <p>Recommended for Approval </p>
                            <h5>PIC (R&D), BPUT</h5>
                             <h6>   Date:
                                </h6>
                        </div>
                    </div>
                    <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:10px">

                    <div class="row">
                        <div class="col-md-12 text-center" style="margin-left:100px">
                            <h5>Approved/ Not Approved</h5>
                        </div>
                    </div>
                   <div class="row" style="margin-top:40px">
                        <div class= "col-md-6">
                           
                              <h5>  Date:
                                </h5>
                        </div>
                        <div class= "col-md-6">
                            
                             <h5>   Vice Chancellor, BPUT
                                </h5>
                        </div>
                    </div>
                    <hr style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-top:10px">
                    <p>* In the event of discontinuation, the fees paid by the candidate to the ARC and BPUT shall not be refunded to the candidate</p>

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
