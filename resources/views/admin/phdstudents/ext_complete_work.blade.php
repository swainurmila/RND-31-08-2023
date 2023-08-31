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
                                    <h5 class="text-center"><b>APPLICATION FOR SEEKING EXTENSION TO COMPLETE WORK
                                        </b></h5>
                                </div>

                                <form action="{{ route('extention.work.store') }}" method="post">
                                    @csrf
                                <table class="table  table-bordered">
                                    <tr>
                                        <td>
                                            <label class="form-label">Name:</label>
                                            <br>
                                            <input class="form-control" type="text" name="name" value="{{$student->name}}" readonly>
                                        </td>
                                        <td>
                                            <label class="form-label">Name of the faculity with Branch/Specialization:</label>
                                                <br>
                                            <input class="form-control" type="text"  value="{{$student->name_of_faculty}}[{{$student->branch}}]" readonly>
                                            <input class="form-control" type="hidden"  name="faculty" value="{{$student->name_of_faculty}}">
                                            <input class="form-control" type="hidden"  name="branch" value="{{$student->branch}}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="form-label">Name of the NCR:</label>
                                                <br>
                                            <input class="form-control" type="text" value="{{$student->college_name}}" readonly>
                                            <input class="form-control" type="hidden" name="nodal_center" value="{{$student->nodal_id}}" readonly>
                                        </td>
                                        <td>
                                            <label class="form-label">Date of commencement of course work:</label>
                                                <br>
                                            <input class="form-control" type="date" name="date_of_commencement" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="form-label">Enrollment No:</label>
                                                <br>
                                            <input class="form-control" type="text" name="enrollment_no" value="{{$student->enrollment_no}}" readonly>
                                        </td>
                                        <td><label class="form-label">Enrollment.Date:</label>
                                            <br>
                                            <input class="form-control" type="text" name="enrollment_date" value="{{$student->enrollment_date}}" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label">Regd.No:</label>
                                            <br>
                                            <input class="form-control" class="form-control" type="text" name="reg_no" value="">
                                        </td>
                                        <td><label class="form-label">Regd Date:</label>
                                            <br>
                                            <input class="form-control" class="form-control" type="date" name="reg_date" value="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2"> <h5>Please tick the components not completed</h5> 
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label"><label class="form-label">Not Registered for the course work:</label><br>

                                        </td>
                                        <td>
                                            <input class="form-check-input" type="checkbox" name="component_not_completed[]" value="Not Registered for the course work"
                                                id="flexCheckDefault">
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><label class="form-label">Less than 75% Attendance in course Work:</label>
                                            <br>

                                        </td>
                                        <td>
                                            <input class="form-check-input" type="checkbox" name="component_not_completed[]" value="Less than 75% Attendance in course Work"
                                                id="flexCheckDefault">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label">Failed in one or more written course/courses:</label><br>
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="checkbox" name="component_not_completed[]" value="Failed in one or more written course/courses"
                                                id="flexCheckDefault">
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td><label class="form-label">Did not do the assigned work of other components:</label><br>
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="checkbox" name="component_not_completed[]" value="Did not do the assigned work of other components"
                                                id="flexCheckDefault">
                                        </td>
                                    </tr>
                                </table>

                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <input class="btn btn-primary" type="submit" value="Submit">
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
