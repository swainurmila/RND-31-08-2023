@extends('admin.layouts.app')
@section('heading', 'PHD Student Semester')
@section('sub-heading', 'PHD Student Semester')
@section('content')

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    /* tr:nth-child(even) {
        background-color: #dddddd;
    } */
  
</style>



    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <div class="panel-container show" role="content">
                                <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                                <div class="panel-content">
                                    <table>
                                        <tr>
                                            <th>
                                                <h4>Semister Details</h4>
                                            </th>
                                             
                                             <th colspan="" style="text-align: right;">
                                    <button class="btn btn-primary">Semester {{$semester}} </span>
                                             </th>
                                        </tr>
                                        <tr>
                                            <th>Name Of The Research Student:</th>
                                            <td>{{ $reg_details->research_student_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Name of the BPUT- NCR :</th>
                                            <td>{{ $reg_details->department_ncr }}</td>
                                        </tr>
                                        <tr>
                                            <th>Name of the of the Department :</th>
                                            <td>{{ $reg_details->departments_title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Enrollment No. & Date of Enrollment :</th>
                                            <td>{{ $reg_details->enrollment_no }} || {{ $reg_details->enrollment_date }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Regd. No with date of Registration :</th>
                                            <td>{{ $reg_details->regd_no }} || {{ $reg_details->regd_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>Name of the Research Supervisor :</th>
                                            <td>{{ $reg_details->supervisor_name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Title of Ph.D. work :</th>
                                            <td>{{ $reg_details->phd_title }}</td>
                                        </tr>
                                        <tr>
                                            <th>Board Area of Research :</th>
                                            <td>{{ $reg_details->board_area_research }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body">
                            <div class="panel-container show" role="content">
                                <div class="panel-content">
                                    <table>
                                        <tr>
                                            <th colspan="4">
                                                <h4>Coursework Assigned</h4>
                                            </th>
                                            
                                        </tr>
                                        <tr>
                                            <th>Sl.No</th>
                                            <th>List Of Coursework</th>
                                            <th>Credits</th>
                                            <th>Status</th>
                                        </tr>
                                        @foreach ($list_of_coursework as $key => $value)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $value['list'] }}</td>
                                                <td>{{ $value['credit'] }}</td>
                                                <td>{{ $value['status'] }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
            
                                   
             
                                </div>
            
            
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
@endsection
