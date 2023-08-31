@extends('admin.layouts.app')
@section('heading', 'PHD Student Preview')
@section('sub-heading', 'Student Preview')
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
        #progressbar a{color: lightgray;}
        #progressbar a:hover{color: #55a5db;}
    </style>


    <div class="row">
        
        <div class="card">
            <div class="card-body">
                <div class="panel-container show" role="content">
                    <div class="panel-content">
                        <table>
                            <tr>
                                <th colspan="4">
                                    <h4>Presonal Information</h4>

                                </th>
                                {{-- <th colspan="3" style="text-align: right;">
                                    <a class="btn btn-info waves-effect waves-light"
                                        href="{{ route('draft.info', [$id]) }}">edit</a>
                                </th> --}}
                            </tr>
                            <tr>
                                <td> <b>Candidate Name: </b> </td>
                                <td>{{ $student->name }}</td>
                                <!-- <td>Academic Programme:</td>
                                        <td>2</td> -->
                                <td style="text-align:right;"><img
                                    src="{{ asset('/upload/signature/') }}/{{ $student->signature }}" alt=""
                                    style="max-width: 80px;"></td>                                        
                                <td style="text-align:right;"><img
                                        src="{{ asset('/upload/photo') }}/{{ $student->photo }}" alt=""
                                        style="max-width: 80px;">

                                </td>
                            </tr>
                            <tr>
                                <td><b>Name Of NCR And Department:</b></td>
                                <td>{{ $student->ncr_department }}</td>
                                <td><b>Father's / Husband's Name:</b></td>
                                <td>{{ $student->father_husband }}</td>
                            </tr>
                            <tr>
                                <td><b>Mother's Name:</b></td>
                                <td>{{ $student->mother }}</td>
                                <td><b>Nodal Centre:</b></td>
                                <td>{{ $student->college_name }}</td>
                            </tr>
                            <tr>
                                <td><b>Permanent Address:</b></td>
                                <td>{{ $student->permannt_address }}</td>
                                <td><b>Present Address:</b></td>
                                <td>{{ $student->present_address }}</td>
                            </tr>
                            <tr>
                                <td><b>Email:</b></td>
                                <td>{{ $student->email }}</td>
                                <td><b>Phone No:<b></td>
                                <td>{{ $student->phone }}</td>
                            </tr>
                            <tr>
                                <td><b>Date Of Birth:</b></td>
                                <td>{{ $student->dob }}</td>
                                <td><b>Nationality:</b></td>
                                <td>{{ $student->nationality }}</td>
                            </tr>
                            <tr>
                                <td><b>Student Category:</b></td>
                                <td>{{ $student->student_category }}</td>
                                <td><b>Category:</b></td>
                                <td>{{ $student->category }}</td>
                            </tr>
                            <tr>
                                <td><b>PWD Certificate:</b></td>
                                <td>
                                    @if($student->hadicap_certificate != '')
                                    
                                    <a href="javascript:void(0);"
                                    onclick="view_file('/upload/hadicap_certificate/{{ $student->hadicap_certificate }}')">View</a>
                                    @else
                                    <span class="text-warning">Not Available</span> 
                                    @endif
                                </td>
                                <td><b>Caste Certificate:</b></td>
                                <td>
                                    @if($student->category_certificate != '')
                                    
                                    <a href="javascript:void(0);"
                                    onclick="view_file('/upload/caste_certificate/{{ $student->category_certificate }}')">View</a>
                                    @else
                                    <span class="text-warning">Not Available</span> 
                                    @endif
                                    {{-- <a href="javascript:void(0);"
                                    onclick="view_file('/upload/caste_certificate/{{ $student->category_certificate }}')">View</a> --}}
                                </td>
                            </tr>
                            <tr>
                                <td><b>Aadhar Card Number:</b></td>
                                <td>{{ $student->aadhar_card }}</td>
                                <td><b>Aadhar Card:</b></td>
                                <td><a href="javascript:void(0);"
                                        onclick="view_file('/upload/aadhar/{{ $student->aadhar_certificate }}')">View</a>
                                </td>
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
                                <th>
                                    <h4>Information Respect To Qualification</h4>
                                </th>
                                <th colspan="8" style="text-align: right;">
                                    <a class="btn btn-info waves-effect waves-light"
                                        href="{{ route('draft.education', [$id]) }}">edit</a>
                                </th>
                            </tr>
                            <tr>
                                <th>Sl No.</th>
                                <th>Exam Passed</th>
                                <th>Specialization</th>
                                <th>Board / University</th>
                                <th>Year Of Passing</th>
                                <th>Class / Division</th>
                                <th>% Marks/ CGPA</th>
                                <th>view certificate</th>
                                <th>view Maksheet</th>
                            </tr>
                            @foreach ($student_qualifications as $key => $value)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $value->exam_passed }}</td>
                                    <td>{{ $value->Specialization }}</td>
                                    <td>{{ $value->board_university }}</td>
                                    <td>{{ $value->year_of_passing }}</td>
                                    <td>{{ $value->division }}</td>
                                    <td>{{ $value->percentage }}</td>
                                    <td>
                                        <a href="javascript:void(0)"
                                        onclick="view_file('/upload/phdstudent/{{ $value->certificate }}')">
                                        View File</a>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)"
                                        onclick="view_file('/upload/phdstudent/{{ $value->marksheet }}')">
                                        View File</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        @php
                            // dd(count($organisation));
                            $oraga = count($organisation);
                            $dse = $supervisor->co_supervisor_name;
                            //dd($dse)  ;
                        @endphp
                        @if ($oraga > 0)
                            <table>
                                <tr>
                                    <th colspan="5">
                                        <h4>Organisation where working</h4>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Sl No.</th>
                                    <th>Organisation Name</th>
                                    <th>Designation</th>
                                    <th>Duration</th>
                                    <th>Nature Of Job</th>
                                    <th>Employer Certificate</th>
                                </tr>
                                @foreach ($organisation as $key => $value)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $value->organisation_name }}</td>
                                        <td>{{ $value->designation }}</td>
                                        <td>{{ $value->duration }}</td>
                                        <td>{{ $value->natutre_of_job }}</td>
                                        <td>
                                            <a href="javascript:void(0)"
                                            onclick="view_file('/upload/phdstudent/{{ $value->noc_certificate }}')">
                                            View File</a>
                                        </td>

                                    </tr>
                                @endforeach
                            </table>
                        @endif

                        @php
                        // dd(count($organisation));
                        $other_doc = count($OtherDocuments);
                           // dd($other_doc)
                        //$dse = $supervisor->co_supervisor_name;
                        //dd($dse)  ;
                    @endphp
                        <table>
                            <tr>
                                <th colspan="5">
                                    <h4>Other Documents</h4>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="2">
                                    <h5>PHD Application File</h5>
                                </th>
                                <th>
                                    <a href="javascript:void(0)"
                                                                            onclick="view_file('/upload/phd_app_certi/{{ $student->phd_app_file }}')">
                                                                            View Upload File</a>
                                </th>
                            </tr>
                            @if($other_doc > 0)
                            <tr>
                                <th>Sl No.</th>
                                <th>Name Of Qualified Test</th>
                                <th colspan="3">Certificate</th>
                                {{-- <th>File</th> --}}
                            </tr>
                            @foreach ($OtherDocuments as $key => $value)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $value->doc_title }}</td>
                                    <td><a href="javascript:void(0)"
                                        onclick="view_file('/upload/phd_app_certi/{{ $student->phd_app_file }}')">
                                        View Upload File</a></td>
                                </tr>
                            @endforeach
                            @endif
                        </table>
                        <table>
                            <tr>
                                <th colspan="4">
                                    <h4>Other Details</h4>
                                </th>
                            </tr>
                            <tr>
                                <td><b>Proposed Supervisor Name:</b></td>
                                <td>{{ $supervisor->supervisor_name }}</td>
                                <td><b>Supervisor Address:</b></td>
                                <td>{{ $supervisor->supervisor_address }}</td>
                            </tr>
                            <tr>
                                <td><b>Supervisor E-Mail Id:</b></td>
                                <td>{{ $supervisor->supervisor_email }}</td>
                                <td><b>Supervisor Phone:</b></td>
                                <td>{{ $supervisor->supervisor_phone }}</td>
                            </tr>
                            @if ($dse != '')
                                <tr>
                                    <td><b>Proposed DSE Name:</b></td>
                                    <td>{{ $supervisor->co_supervisor_name }}</td>
                                    <td><b>DSE E-Mail:</b></td>
                                    <td>{{ $supervisor->co_supervisor_email }}</td>
                                </tr>
                                <tr>
                                    <td><b>DSE Address :</b></td>
                                    <td>{{ $supervisor->co_supervisor_address }}</td>
                                    <td><b>DSE Phone :<b></td>
                                    <td>{{ $supervisor->co_supervisor_phone }}</td>
                                </tr>
                            @endif
                        </table>
                        <table>
                            <tr>
                                <th colspan="2">
                                    <h4>Payment Info</h4>
                                </th>
                            </tr>
                            <tr><td>Ph.D Application fee:</td><td>Rs.10,000</td></tr>
                        </table>
                    </div>


                </div>
            </div>
        </div>

        <div class="input_wrap preview_form">


            <div class="border border-primary"></div>
            <div class="row">

                <div class="cust-print  text-center">



                    {{-- <a class="btn btn-primary mt-2 mb-5" href="{{ route('stu.payment') }}">Proceed for Payment</a> --}}
                    <form action="{{ route('final.submit',[$id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary mt-2 mb-5" >Submit</button>
                    </form>
                    


                    {{-- <a href="{{ route('stu_apply') }}"
                            class="btn btn-success waves-effect waves-themed float-right">close</a> --}}

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
