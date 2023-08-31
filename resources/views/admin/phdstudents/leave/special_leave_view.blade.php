@extends('admin.layouts.app')
@section('heading', 'SPECIAL LEAVE')
@section('sub-heading', 'SPECIAL LEAVE')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="panel-container show" role="content">
                            <div class="panel-content" style="padding: 20px 30px; ">
                                <div class="section-title form-section-title mb-3">
                                    <h3 class="text-center"><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA,
                                            ROURKELA</b></h3>
                                    <h5 class="text-center"><b>APPLICATION FOR SPECIAL LEAVE ( MARTERNITY/CHILD CARE )
                                            </b></h5>
                                </div>
                                <form action="{{ route('special.leave.store') }}">
                                    <table class="table  table-bordered">


                                        <tr>
                                            <th style="width: 25%">Name of the student:</th>
                                            <td style="width: 25%">{{ $student->name }}</td>
                                            <th style="width: 25%">Name of the Branch:</th>
                                            <td style="width: 25%">{{ $student->branch }}</td>
                                        </tr>
                                        <tr>
                                            <th>Telephone:</th>
                                            <td >{{ $student->telephone }}</td>
                                            <th>Name of NCR:</th>
                                            <td>{{ $student->nodal_center }}</td>
                                        </tr>
                                        <tr>
                                            <th>Enrollment No:</th>
                                            <td>{{ $student->enrollment_no }}</td>
                                            <th>Enrollment.Date:</th>
                                            <td>{{ $student->enrollment_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>Regd.No:</th>
                                            <td>{{ $student->reg_no }}</td>
                                            <th>Regd.No Date:</th>
                                            <td>{{ $student->reg_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>Period of Leave (FROM):</th>
                                            <td>{{ $student->leave_from }}</td>
                                            <th>Period of Leave (TO):</th>
                                            <td>{{ $student->leave_to }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">Leave already availed during the year (Medical):</th>
                                            <td colspan="2">{{ $student->leave_avail }}</td>
                                        </tr>
                                        
                                    </table>
                                    <table class="table  table-bordered">
                                        <tr>
                                            <th>Present status of Reaserch:</th>
                                            <th>Reasons for seecking leave (Give details):</th>
                                            <th>Address durig the leave:</th>
                                        </tr>
                                        <tr>
                                            <td>{!!  $student->rearch_status  !!}</td>
                                            <td>{!!  $student->reason_seeking_leave  !!}</td>
                                            <td>{!!  $student->address  !!}</td>
                                        </tr>
                                    </table>
                                    {{-- <table class="table  table-bordered">
                                        <tr>
                                            <td >Present status of Reaserch:<br>
                                               <textarea class="form-control" name="rearch_status" id="" cols="30" rows="2"></textarea>
                                            </td>
                                            <td >Reasons for seecking leave (Give details):<br>
                                                <textarea class="form-control" name="reason_seeking_leave" id="" cols="30" rows="2"></textarea>
                                            </td>
                                            <td >Address durig the leave:<br>
                                                <textarea class="form-control" name="address" id="" cols="30" rows="2"></textarea>
                                            </td>
                                        </tr>
                                    </table> --}}
                                    <hr>
                                    {{-- <div class="row mt-4 mb-2">
                                        <div class="sumb_btn text-center">
                                            <input class="btn btn-primary" type="submit" value="submit">
                                        </div>

                                    </div> --}}
                                </form>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
