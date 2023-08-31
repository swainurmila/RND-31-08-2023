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

    .student {
        margin: 60px;
    }

    .flex {
        margin-top: 50px;
    }

    .sidebar h5 {
        margin-top: 30px;
        font-weight: bold;
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
                    <h5><u><b>APPLICATION FOR INCLUSION OF CO-SUPERVISOR
                            </b></u>
                    </h5>


                    <br><br>

                    <div class="row enrollment">
                        <div class="col-md-12">
                            <table class="table table-bordered">

                                <tr>
                                    <th>1</th>
                                    <th> Name of Ph.D Student</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <th>Name of NCR </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>3</th>
                                    <th> Name of the Faculty</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>4</th>
                                    <th> Branch / Specialization</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>5</th>
                                    <th>Enrollment No. & Date</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>6</th>
                                    <th>Regd. No. & Date of Regd.
                                    </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>7</th>
                                    <th>Title of Ph.D. work</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>8</th>
                                    <th>Name of the Research Supervisor</th>
                                    <td></td>
                                </tr>
                               

                                <tr>
                                    <th>9</th>
                                    <th> Name of Proposed Co-Supervisor
                                    </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>10</th>
                                    <th>
                                        Proposed Co-Supervisor Details<br>
                                        Detailed CV attached (Yes / No)
                                        
                                    </th>
                                    <td>
                                        Name :
<br>Designation :<br>Affiliation : <br>Contact Address :<br> Contact Mobile No. :<br> E-mail id :

                                    </td>
                                </tr>
                                <tr>
                                    <th>11</th>
                                    <th>Is the proposed Co-supervisor an approved
                                        Supervisor of BPUT
                                    </th>
                                    <td>Yes / No	       If yes , then enclose evidence</td>
                                </tr>


                            </table>
                        </div>
                    </div>
                    <div class="row" style="margin-left:60px">
                        <div class="col-md-12 text-left">
                            <h5>Need for the inclusion of a Co-supervisor (justification):


                            </h5>
                        </div>
                    </div>

                    <div class="">
                        <div class="row sidebar">
                            <div class="col-md-6">
                                <h5>Date : ________________</h5>
                            </div>
                            <div class="col-md-6">
                                <h5>Signature of the Student
                                </h5>
                            </div>
                        </div>
                        <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
                    </div>
                    <div class="row font-bold">
                        <div class="col-md-12">
                            <h4>Consents of existing and proposed Research Supervisor / Co-Supervisor</h4><br>
                        </div>
                    </div>

                    <div class="">
                        <div class="row sidebar">
                            <div class="col-md-6">
                                <h5>Present Research Supervisor</h5>
                            </div>
                            <div class="col-md-6">
                                <h5>Proposed Co-Supervisor
                                </h5>
                            </div>
                        </div>
                        <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4>Recommendation by the DSC</h4><br>
                        </div>
                    </div>

                    <div class="">
                        <div class="row sidebar">
                            <div class="col-md-6">
                                <h5>Signature of members; DSC
                                    </h5>
                            </div>
                           <div class="col-md-6">
                                <h5>Chairperson , DSC
                                </h5>
                            </div>
                        </div>
                        <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
                    </div>
                    <div class="row font-bold">
                        <div class="col-md-12">
                            <h4>Approval by Vice Chancellor, BPUT </h4><br>

                            <p>Approved / Not Approved</p>
                        </div>
                    </div>
                        <div class="row sidebar">
                            <div class="col-md-6">
                                <h5>Date: ________________</h5>
                            </div>
                            <div class="col-md-6">
                                <h5>Vice Chancellor,BPUT
                                </h5>
                            </div>
                        </div>
                        <hr
                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
                        <p>* In case of inclusion of a Co-Supervisor, the allowable date of Thesis submission shall be shifted
                            forwarded by 02 years from the date of inclusion of Co-Supervisor.
                            </p>
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
