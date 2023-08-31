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
        text-align:left;
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

        margin: 20px 40px 0px 60px;
        font-family:'Times New Roman', Times, serif;
        font-size: 17px;
        text-align: justify;
    }

    .abc {
        font-size: 80px !important;
    }

    .enrollment {
        margin: 40px;
    }
    .student h5{
        margin: 10px 60px;
        font-family:'Times New Roman', Times, serif;
    }
    .flex{
        margin-top: 50px;
    }
    .bput-head{
        margin-top: 10px;
        font-family:'Times New Roman', Times, serif;
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

                    <h3 class="bput-head"><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h3>
                    <h5><u><b>OFFICE ORDER ON FORMATION OF DSC FOR THE RESEARCH SCHOLAR
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
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="notice">The undersigned is pleased to convey the EnroLlment and formation of DSC of the following student in Ph.D Programme of the University as per approval of the competent authority. </h5>
                        </div>

                    </div>
                    <div class="row enrollment">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                
                                <tr>
                                    <th>1</th>
                                    <th> Name of the Candidate </th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <th>Father/Husband's Name</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>3</th>
                                    <th>Address for Correspondence</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>4</th>
                                <th>Enrollment No. & Date</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>5</th>
                                    <th>Department /NCR to which
                                        admitted</th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th>6</th>
                                        <th>Date of Birth</th>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>7</th>
                                            <th>Category (GEN /SC / ST)</th>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <th>8</th>
                                                <th>Category of studentship
                                                    (FulI Time / Part Time / Full Time Special)</th>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <th>9</th>
                                                    <th>Faculty (Engg./Pharm. Etc.)</th>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>10</th>
                                                        <th> Discipline/ Specialization</th>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <th>11</th>
                                                            <th> Broad Area of Research
                                                                Proposed</th>
                                                                <td></td>
                                                            </tr>
                                                            <tr>
                                                                <th>12</th>
                                                                <th>For sponsored student
                                                                    (Place of Employment)</th>
                                                                <td></td>
                                                            </tr>
                                                        <tr>
                                                            <th>13</th>
                                                                <th> Name & Address of the
                                                                    Supervisors </th>
                                                                    <td>(a)	Supervisor ;
<br>
                                                                        (b)	Co-supervisor:
                                                                        </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>14</th>
                                                                        <th> Doctoral Scrutiny
                                                                            Committee of the student
                                                                            
                                                                     </th>
                                                                            <td>l. ________________ Head of the Institute(NCR) Chairperson<br>
                                                                                2. ________________	(Head of the Dept.)Co- Chairperson<br>
                                                                                3. ________________(Expert) Member<br>
                                                                                4. ________________(Expert) Member<br>
                                                                                5. ________________(Principal Supervisor)Member convener<br>
                                                                                6. ________________(Co-Supervisor)Joint Member Convener
                                                                                </td>
                                                                        </tr>
                                
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="notice">The Chairperson, DSC is requested to hold the meeting of the DSC for assigning course work and other actions as per Ph.D regulation 2019.

                            </h5>
                        </div>

                    </div>
                    <div class="flex">
                        <div class="row">
                            <div class="col-md-12">
                                <p>No: BPUT/R&D/ ____________________________________ Dt. 20
                                    ______________________________,

                                </p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="">
                        <div class="row student">
                            <div class="col-md-12 text-left">
                                <h5>Copy fomarded for information & necessary action to the </h5>
                                <h5>(1) Student concerned through NCR/ Snpervison</h5>
                                <h5>(2)	Head of NCR : _________________________ </h5>
                                <h5>(3)	For sponsored students (Employer with address)</h5>
                                <h5>(4)	Register, BPUT, Rourkela</h5>
                                <h5>(5) Finance Officer, BPUT, Rourkela</h5>
                                <h5>(6)	Prof. ldc . Library, BPUT, Rourkela</h5>
                                <h5>(7)	File of Student concerned

                                </h5>
                                
                            
                            </div>
                        </div>
                        
                    </div>
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Date : ____________</h4>
                            </div>
                            <div class="col-md-6">
                                <h4>PIC (R&D),BPUT</h4>
                            </div>
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
