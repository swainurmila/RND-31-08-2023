@extends('admin.layouts.app')
@section('heading', 'SPECIAL LEAVE')
@section('sub-heading', 'SPECIAL LEAVE')
@section('content')
<style>
    .table,
    tr,
    td,
    th,
    tbody {
        border: none;
    }
</style>
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
                                
                                <table class="table">
                                    <tr>
                                        <td colspan="2">
                                            <label class="form-label">Name:</label>
                                            <br>
                                            <input class="form-control" type="text" name="name"
                                                value="{{ $student->name }}" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="form-label">Name of the faculity:</label>
                                            <br>
                                            <input class="form-control" type="text" name="faculty"
                                                value="{{ $student->faculty }}" readonly>
                                        </td>
                                        <td>
                                            <label class="form-label">Branch/Specialization:</label>
                                            <br>
                                            <input class="form-control" type="text" name="branch"
                                                value="{{ $student->branch }}" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label class="form-label">Name of the NCR:</label>
                                                <br>
                                            <input class="form-control" type="text" value="{{$student->college_name}}" readonly>
                                            
                                        </td>
                                        <td>
                                            <label class="form-label">Date of commencement of course work:</label>
                                                <br>
                                            <input class="form-control" type="date" name="date_of_commencement" value="{{$student->date_of_commencement}}" readonly>
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
                                            <input class="form-control" class="form-control" type="text" name="reg_no" value="{{$student->reg_no}}" readonly>
                                        </td>
                                        <td><label class="form-label">Regd Date:</label>
                                            <br>
                                            <input class="form-control" class="form-control" type="date" name="reg_date" value="{{$student->reg_date}}" readonly>
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
                                                id="flexCheckDefault" {{ in_array( "Not Registered for the course work" ,$comp_not_compl ) ? 'checked disabled' : 'disabled'}}>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><label class="form-label">Less than 75% Attendance in course Work:</label>
                                            <br>

                                        </td>
                                        <td>
                                            <input class="form-check-input" type="checkbox" name="component_not_completed[]" value="Less than 75% Attendance in course Work"
                                                id="flexCheckDefault" {{ in_array( "Less than 75% Attendance in course Work" ,$comp_not_compl ) ? 'checked disabled' : 'disabled'}}>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label class="form-label">Failed in one or more written course/courses:</label><br>
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="checkbox" name="component_not_completed[]" value="Failed in one or more written course/courses"
                                                id="flexCheckDefault" {{ in_array( "Failed in one or more written course/courses" ,$comp_not_compl ) ? 'checked disabled' : 'disabled'}}>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td><label class="form-label">Did not do the assigned work of other components:</label><br>
                                        </td>
                                        <td>
                                            <input class="form-check-input" type="checkbox" name="component_not_completed[]" value="Did not do the assigned work of other components"
                                                id="flexCheckDefault" {{ in_array( "Did not do the assigned work of other components" ,$comp_not_compl ) ? 'checked disabled' : 'disabled'}}>
                                        </td>
                                    </tr>
                                </table>
                                    <hr>
                                    <div class="row">

                                        <div class="col-md-6">


                                            <label>Nodal Status</label>
                                            <input type="text" class="form-control" value="{{$student->application_status == 4 ? 'Recommended' : 'Not Recommended'}}" readonly >
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nodal Remarks</label>
                                            <textarea class="form-control" name="sem_remarks" id="" cols="5" rows="2"  readonly>{{$student->nodal_remark }}</textarea>
                                        </div>


                                    </div>
                                    @if($student->application_status == 4)
                                    <form method="post" action="{{ route('control-cell.extention.work.status',[$student->id]) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="app_div">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    
        
                                                    <label>Status</label>
                                                    <select class="form-control" name="sup_leav_approve" required>
                                                        <option value="">-- select --</option>
                                                        <option value="6">Approved</option>
                                                        <option value="7">Not Approved</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Remarks</label>
                                                    <textarea class="form-control" name="sem_remarks" id="" cols="5" required></textarea>
                                                </div>
                                            </div>
        
                                        </div>
        
                                        <div class="form_sub mt-3 mb-3" style="text-align: center;">
                                            <div class="col-md-12">
                                                <input class="btn btn-primary" type="submit" value="submit">
                                            </div>
                                        </div>
                                    </form>
                                    @endif

                                    @if($student->application_status == 6)
                        <div class="row">
                            <div class="col-md-6">
                                
                                <label>Status</label>
                                <input class="form-control" type="text" value="{{ $student->application_status == 6 ? 'Approved' : 'Not Approved' }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label>Remarks</label>
                                <textarea class="form-control" name="sem_remarks" id="" cols="5" rows="2" readonly>{{ $student->control_remarks }}</textarea>
                            </div>


                        </div>
                        @endif
                                    {{-- <div class="row mt-4 mb-2">
                                        <div class="sumb_btn text-center">
                                            <input class="btn btn-primary" type="submit" value="submit">
                                        </div>

                                    </div> --}}
                                



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
