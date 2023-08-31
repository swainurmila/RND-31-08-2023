@extends('admin.layouts.app')
@section('content')
@section('heading', 'Semester Registration Details')
@section('sub-heading', 'Semester Registration Details')
<style>
    table,
    tr {
        font-family: 'Times New Roman', Times, serif;
        /* border: 1px solid black; */
        border-collapse: collapse;
        width: 50%;
    }

    td,
    th {
        /* border: 1px solid #252323; */
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

    .list-head h4 {
        font-weight: bold;
        text-decoration: underline;
    }

    .couse-work {
        /* border: 1px solid #000; */
        margin: 0px 50px 0px 50px;
    }


    .report h5 {
        text-align: left;
        font-size: 17px;
        padding: 5px;
        margin: 20px 60px 0px 60px;
        font-family: 'Times New Roman', Times, serif;
    }

    .office h6 {
        margin: 30px 60px 20px 60px;
        font-family: 'Times New Roman', Times, serif;
        font-size: 17px;
        text-align: justify;
    }

    .off-data h5 {
        font-weight: bold;
        text-decoration: underline;
        margin-bottom: 20px;

    }

    .seme {
        font-family: 'Times New Roman', Times, serif;
        font-size: 17px;
        text-align: justify;
    }

    .off-data h6 {
        margin: 40px;
        font-weight: bold;
    }

    .off-data p {
        text-align: justify;
        margin-left: 60px;
    }

    .payment {
        width: 93%;
        margin: 0 auto;
    }

    .payment h5 {
        text-align: left;
        padding: 5px;
        font-size: 17px;
        /* margin-left: 60px; */
        font-family: 'Times New Roman', Times, serif;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                {{-- <div class="progress">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
        </div>
    </div> --}}
                <div class="container">
                    <div>
                        <h6 style="text-align:right"><b>ANNEXURE.BPUT/ Ph.D-2019</b></h6>
                        <h6 style="text-align:right"><b>[video Ph.D.-27]</b></h6>
                    </div>
                    <section class="fee_structure ">
                        <div class="section-title form-section-title dsc-form">
                            <center>

                                <h3><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h3>
                                <h5><u><b>SEMESTER REGISTRATION DETAILS FOR Ph.D. PROGRAMME
                                        </b></u>
                                </h5>


                                <br><br>
                                <div class="">
                                    {{-- <div class="row">
                            <div class="col-md-12">
                                <p>No: BPUT/R&D/ ____________________________________ Dt. 20
                                    ______________________________,

                                </p>
                            </div>
                        </div> --}}

                                </div>

                                <div class="row enrollment">
                                    <div class="col-md-12">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Name of Research Student :</th>
                                                <td>{{ $reg_details->research_student_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Name of the BPUT- NCR :</th>
                                                <td>
                                                    {{ $reg_details->department_ncr }}
                                                    </th>
                                            </tr>
                                            <tr>
                                                <th> Name of the of the Department :</th>
                                                <td>{{ $reg_details->departments_title }}</td>
                                            </tr>
                                            <tr>
                                                <th>Enrollment No. & Date of Enrollment :</th>
                                                <td>{{ $reg_details->enrollment_no }} ||
                                                    {{ Helper::date_format($reg_details->enrollment_date, '-') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Regd.No. with date of Registration :
                                                </th>
                                                <td>{{ $reg_details->regd_no }} ||
                                                    {{ Helper::date_format($reg_details->regd_date, '-') }} </td>
                                            </tr>
                                            <tr>
                                                <th> Name of the Research Supervisor :</th>
                                                <td>{{ $reg_details->supervisor_name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Title of Ph.D. work :</th>
                                                <td>{{ $reg_details->phd_title }}</td>
                                            </tr>
                                            <tr>

                                                <th> Board Area of Research :</th>
                                                <td>{{ $reg_details->board_area_research }}</td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>

                                <div class="couse-work">
                                    <table class="table table-hover m-0 table-centered">
                                        <thead>
                                            <tr>
                                                <th>List of coursework Assigned</th>
                                                <th>Credits</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list_of_coursework as $key => $item)
                                                <tr>
                                                    <td>{{ $item['list'] }}</td>
                                                    <td>{{ $item['credit'] }}</td>
                                                    <td>{{ $item['status'] }}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                    {{-- <div class="row list-head" style="margin:40px ">
                            <div class="col-md-4">
                                <h4>List of coursework Assigned</h4>
                            </div>
                            <div class="col-md-4">
                                <h4>Credits</h4>
                            </div>
                            <div class="col-md-4 text-left">
                                <h4>Status</h4>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">1.</div>
                            <div class="col-md-6">Completed On Going</div>
                            <hr
                                style="height:2px;border-width:0;color:black;background-color:gray; width:70%; margin-top:0px">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">2.</div>
                            <div class="col-md-6">Completed On Going</div>
                            <hr
                                style="height:2px;border-width:0;color:black;background-color:gray; width:70%; margin-top:0px">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">3.</div>
                            <div class="col-md-6">Completed On Going</div>
                            <hr
                                style="height:2px;border-width:0;color:black;background-color:gray; width:70%; margin-top:0px">
                        </div> --}}
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><b style="font-weight: bold;">Months elapsed since Enrolment:
                                            </b>{{ $reg_details->elapsed_month }} </p>
                                    </div>
                                    <div class="col-md-6  text-right">
                                        <p> <b style="font-weight: bold;">Registration status upto date : </b>
                                            {{ $reg_details->registration_status }}</p>
                                    </div>
                                </div>


                                <div class="row" style="margin-top:px ">
                                    <!--  <div class="col-md-6">
                            <h5>Signature of members of DSC

                            </h5>
                        </div>-->
                                    <div class="col-md-12 text-right">
                                        <p style="font-weight: bold; text-align: left; width: 90%;">Signature of
                                            Research Student</p>
                                    </div>
                                    <hr
                                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin: 10px auto;">
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h5><b><u>Payment details of Semester Fee</u></b></h5>
                                    </div>
                                </div>
                                <div class="row ">
                                    <div class="col-md-12">
                                        <div class="payment">
                                            <h5>1. All the Semester dues till date has been cliered upto date & copies
                                                are enclosed: YES/NO</h5>
                                            <h5>2. Rs 3000/- (Fee submitted to BPUT)Receipt No / Draft No: <b
                                                    style="color: red">{{ $reg_details->transaction_id }}</b> , issuing
                                                Office/ Bank <b style="color: red">{{ $reg_details->bank_name }}</b>,
                                                Date: <b
                                                    style="color: red">{{ Helper::date_format($reg_details->transaction_date, '-') }}</b>
                                                (To be enclosed) </h5>
                                            <h5>3. Rs 7000/- (Fee submitted to: NCR) Receipt No / Draft No: <b
                                                    style="color: red">{{ $reg_details->draft_no }}</b> , Issuing
                                                Office/ Bank <b
                                                    style="color: red">{{ Helper::date_format($reg_details->transaction_date, '-') }}</b>
                                                , Date:
                                                <b
                                                    style="color: red">{{ Helper::date_format($reg_details->date, '-') }}</b>
                                            </h5>
                                        </div>

                                    </div>
                                    <hr
                                        style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin:10px auto">
                                </div>

                                {{-- <div class="row report">
                        <div class="col-md-12">
                            <h5>The semester progress report is enclosed</h5>
                            <h5>Certified that no dues die pending against the Research Student till date. The student is regular in his work, Registration to this Semester (Odd/ Even-----) is recommended. HP She has delivered the Semester progress seminar satisfactorily.

                            </h5>
                        </div>
                    </div> --}}
                                {{-- <br>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Signature of principal Supervisor</h5>
                        </div>
                        <div class="col-md-6">
                            <h5>Signature of tbc Heed of NCR</h5>
                        </div>
                    </div>
                    <hr
                    style="height:2px;border-width:0;color:black;background-color:gray; width:90%; margin-right:60px">
                    <div class="row office">
                        <div class="col-md-12 text-center">
                            <h5><b><u>Office use only at  BPUT</u></b></h5>
                            <h6>Amount of Feg paid Rs. ____________________ 	& the University Receipt No. / Bank DD No. __________________ 	& Date. ________________________	(Attach photo copy of the University Receipt/Bank DD).</h6>
                        </div>
                    </div>
                    <div class="row off-data">
                        <div class="col-md-6">
                            <h5>Verified & Found correct</h5>
                            <h6>Jr. Executive (RED Section)</h6>
                            <p class="seme"> Copy of : 1. Course completion grade sheet (if any)</p>
                            <p class="seme">2. Progress Report in (Form No.: BPUT/ Ph.D - 2019 /20l7)</p>
                            <p class="seme">3. All Fees paid till date	</p>
                            <p class="seme">4. Semester Registration </p>
                        </div>
                        <div class="col-md-6">
                            <h5>Approved ID / NOT Approved</h5>
                            <h6>PIC(R&D)BPUT</h6>
                        </div> --}}
                        </div>
                        @if ($reg_details->nodal_status == '')
                            <form method="POST"
                                action="{{ route('nodalcentre.semester.status', [$reg_details->semister_reg_id]) }}">
                                @csrf
                                <div class="app_div" style="width: 90%;margin:30px auto;">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <label>Status</label>
                                            <select class="form-control" name="nod_sem_approve" id="" required>
                                                <option value="">-- select --</option>
                                                <option value="1">Recommended</option>
                                                <option value="0">Not Recommended</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Remarks</label>
                                            <textarea class="form-control" name="nod_remarks" id="" cols="5" rows="2" required></textarea>
                                        </div>

                                        {{-- <form method="POST" action="{{ route('nodalcentre.semester.status',[]) }}"> --}}



                                    </div>
                                </div>

                                <div class="form_sub mb-3" style="text-align: center;">
                                    <div class="col-md-12">
                                        <input class="btn btn-primary" type="submit" value="submit">
                                    </div>
                                </div>
                            </form>
                        @endif



                        </center>
                </div>
                </section>
            </div>

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
@endsection

@section('js')
<script></script>
@endsection
