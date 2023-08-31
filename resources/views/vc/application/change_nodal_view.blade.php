@extends('admin.layouts.app')
@section('heading', 'Change Nodal Center')
@section('sub-heading', 'Change Nodal Center')
@section('content')
<style>
    .trbg {
        background-color: #89d4f02e;
    }

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
    .value{
        font-weight: bold;
    }
</style>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <!-- cta -->
                                    <div class="custom-accordion">
                                        @if(session()->has('message'))
                                            <br/>
                                            {!! session()->get('message') !!}
                                        @endif
                                        <span id="msg"></span>
                                        <table class="mb-2">
                                            <tr class="trbg">
                                                <th colspan="4">
                                                    <h5>View Information</h5>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td colspan='2'><span class="fix">Name</span><span class="value">:     {{$value->name}}</span></td>
                                                <td colspan='2'><span class="fix">Faculty Of.</span><span class="value">:     {{$value->faculty_of}}</span></td>
                                                
                                            </tr>
                                            <tr>
                                                <td colspan='2'> <span class="fix">Enrollment No.</span><span class="value">:     {{$value->enrollment_no}}</span> </td>
                                                <td colspan='2'><span class="fix">Enrollment Date:</span><span class="value">: {{ $std->enrollment_date}} </span></td>
                                                
                                            </tr>
                                            <tr>
                                                <td colspan='2'><span class="fix">Regd. No</span><span class="value">:     {{$value->registration_no}}</span></td>                       
                                                <td colspan='2'><span class="fix">Date Of Registration</span><span class="value">: {{ $std->registration_date}}</span></td>
                                                
                                            </tr>
                                            <tr>
                                                <td colspan='2'><span class="fix">Branch/Specialization</span><span class="value">:     {{$value->branch_name}}</span></td>                       
                                                <td colspan='2'><span class="fix">Topic Of Research Work.</span><span class="value">:     {{$value->topic_of_research}}</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan='2'><span class="fix">Present status Researchwork</span><span class="value">:     {{$value->present_status_research}}</span></td>
                                                <td colspan='2'><span class="fix">Present Nodal Research Centre</span><span class="value">:     {{$value->present_nodal_centre}}</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan='2'><span class="fix">Present Supervisor Name</span><span class="value">:     {{$value->present_supervisor_name}}</span></td>
                                                <td colspan='2'><span class="fix">Present Co.Supervisor Name</span><span class="value">:     {{$value->co_supervisor_name}}</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan='2'><span class="fix">Proposed Nodal Centre</span><span class="value">:     {{$value->proposed_nodal_centre}}</span></td>
                                                <td colspan='2'><span class="fix">Name of Proposed Supervisor</span><span class="value">:     {{$value->proposed_supervisor}}</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan='4'><span class="fix">Name of Proposed Co.Supervisor</span><span class="value">:     {{$value->proposed_co_supervisor}}</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan='4'><span class="fix">Reason For Change Of Centre (Document)</span><span class="value">:@if($value->document != '') <a class="button" href="{{ $value->document }}" target="blank">View Document</a>
                                                    @else
                                                    @endif</span></td>
                                            </tr>
                                            
                                        </table>
                                        <hr>
                                        <form action="#" method="post">
                                            @csrf
                                            <div class="row">
                                                <h5><b>From Control Cell:</b></h5>
                                                <div class="col-6">
                                                    <input type="hidden" name="type" value="" />
                                                    <label for="">Application Status</label>
                                                    <select name="at_supervisor" id="" class="form-control" readonly>
                                                        <option >
                                                            @if($value->rd_approved == 2)
                                                            Recommended
                                                            @else
                                                            Not Recommended
                                                            @endif
                                                        </option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="">Remarks</label>
                                                    <textarea name="controlcell_remark" class="form-control" readonly>{{ $value->controlcell_remark}}</textarea>
                                                </div>
                                            </div>
                                        </form>
                                        <hr>
                                        @if($value->vice_chancellor == 0)
                                        <form action="{{url('vice-chancellor/change-nodal-remark', $value->id)}}" method="post">
                                            @csrf
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="hidden" name="type" value="" />
                                                    <label for="">Application Status</label>
                                                    <select name="vice_chancellor" id="" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="2">Approve</option>
                                                        <option value="1">Reject
                                                    </option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="">Remarks</label>
                                                    <textarea name="vc_remarks" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                            <div class="row text-center">
                                                <div class="col-12">
                                                    <button class="btn btn-primary mt-2 mb-5" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                        @else
                                        <form action="#" method="post">
                                            @csrf
                                            <div class="row">
                                                <h5><b>From Control Cell:</b></h5>
                                                <div class="col-6">
                                                    <input type="hidden" name="type" value="" />
                                                    <label for="">Application Status</label>
                                                    <select name="vice_chancellor" id="" class="form-control" readonly>
                                                        <option >
                                                            @if($value->vice_chancellor == 2)
                                                            Approved
                                                            @elseif($value->vice_chancellor == 1)
                                                            Rejected
                                                            @else
                                                            @endif
                                                        </option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="">Remarks</label>
                                                    <textarea name="vc_remarks" class="form-control" readonly>{{ $value->vc_remarks}}</textarea>
                                                </div>
                                            </div>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>                   <!-- end row -->    
@endsection      