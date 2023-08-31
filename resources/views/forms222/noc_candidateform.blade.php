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

        .container {
            border: 2px;
        }


    }



    .fee_structure {
        border: 1px solid #000;
        width: 100%;
        padding: 0px;

    }

    .sing-bar h5 {
        text-align: left;
        margin: 40px 0px 10px 60px;
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
    }



    .note h5 {
        text-align: justify;

        margin: 0px 40px 0px 40px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 17px;
    }

    .abc {
        font-size: 80px !important;
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
                    <h5><u><b>CONSENT LATTER (NOC) FROM THE ORGANISATION OF THE FULL TIME EMPLOYED CANDIDATE</b></u>
                    </h5>


                    <br><br>
                    <div class="note">
                        <h5>This is to certify that Mr/ Ms/ Mrs ______________________________________________(Employee
                            Name & ID) is a bonafide employee of ______________________________________
                            (Organisation Names) and is currently working with us since _________________________.
                            His/her designation is ___________________________________.
                            This certificate is being issued on his/her request to enable him/her to pursue Ph.D
                            in ______________________________
                            (Faculty and Specialization) from Biju Patnaik University of Technology, Odisha and
                            is solely for his/her personal requirement.
                            <br>We do not have any objection on her/his initiative of pursuing Ph.D
                            programme. The study leave is sanctioned for the period of three years with full
                            salary / without salary.
                        </h5>
                    </div>
                    <div class="row sing-bar">
                        <div class="col-md-12">
                            <h5>Name and Singature Head of Organisation (With date and seal)</h5>
                            <h5> Designation</h5>
                            <h5>Organization Name</h5>
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
