@extends('admin.layouts.app')
@section('heading', 'SEEKING EXTENSION TO COMPLETE WORK')
@section('sub-heading', 'SEEKING EXTENSION TO COMPLETE WORK')
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
                                            <td style="width: 50%">Name of the student:<br>
                                                <input class="form-control" type="text" name="name" value="{{ $student->name }}" readonly>

                                            </td>
                                            <td colspan="2">Name of the faculity :<br>
                                                <input class="form-control"  type="text" name="faculty" value="{{ $student->name_of_faculty }}" readonly>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td>Name of the Branch:<br>
                                                <input class="form-control" type="text" name="branch" value="{{ $student->departments_title }}" readonly>

                                            </td>
                                            <td colspan="2">Telephone:<br>
                                                <input class="form-control"  type="text" name="telephone" value="{{ $student->phone }}">
                                            </td>

                                        </tr>

                                        <tr>

                                            <td>Name of NCR:<br>
                                                <input class="form-control" type="text" name="nodal_center" value="{{ $student->college_name }}" readonly>
                                            </td>
                                            <td colspan="2">Leave already availed during the year (Medical):<br>
                                                <input class="form-control" type="text" name="leave_avail" value="">
                                            </td>

                                        </tr>

                                        <tr>

                                            <td>Enrollment No:<br>
                                                <input class="form-control" type="text" name="enrollment_no" value="{{ $student->enrollment_no }}" readonly>
                                            </td>
                                            <td colspan="2">Enrollment.Date:<br>
                                                <input class="form-control" type="text" name="enrollment_date" value="{{ $student->enrollment_date }}" readonly>
                                            </td>
                                        </tr>

                                        <tr>

                                            <td>Regd.No:<br>
                                                <input class="form-control" type="text" name="reg_no" value="">
                                            </td>
                                            <td colspan="2">Regd.No Date:<br>
                                                <input type="date" class="form-control" type="text" name="reg_date" value="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Period of Leave (FROM):<br>
                                                <input type="date" class="form-control" type="text" name="leave_from" value="">
                                            </td>
                                            <td colspan="2">Period of Leave (TO):<br>
                                                <input type="date" class="form-control" type="text" name="leave_to" value="">
                                            </td>
                                        </tr>
                                        
                                        
                                        {{-- <tr>
                                            <td colspan="2">

                                            </td>
                                        </tr> --}}
                                    </table>
                                    <table class="table  table-bordered">
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
                                    </table>
                                    <hr>
                                    <div class="row mt-4 mb-2">
                                        <div class="sumb_btn text-center">
                                            <input class="btn btn-primary" type="submit" value="submit">
                                        </div>

                                    </div>
                                </form>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
