@extends('admin.layouts.app')
@section('heading', 'Change research supervisor/co-supervisor')
@section('sub-heading', 'Change research supervisor/co-supervisor')
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
                                                <td colspan='2'><span class="fix">Name of Ph.D student:</span><span class="value">:     {{$value->phd_student_name}}</span></td>
                                                <td colspan='2'><span class="fix">Name of NCR:</span><span class="value">:     {{$value->college_name}}</span></td>
                                                
                                            </tr>
                                            <tr>
                                                <td colspan='2'> <span class="fix">Name of the faculty:</span><span class="value">:     {{$std->name_of_faculty}}</span> </td>
                                                <td colspan='2'><span class="fix">Branch/Specialization:</span><span class="value">: {{ $value->branch_name}} </span></td>
                                                
                                            </tr>
                                            <tr>
                                                <td colspan='2'><span class="fix">Enrollment No.</span><span class="value">:     {{$value->enrollment_no}}</span></td>                       
                                                <td colspan='2'><span class="fix">Enrollment Date:</span><span class="value">: {{ $std->enrollment_date}}</span></td>
                                                
                                            </tr>
                                            <tr>
                                                <td colspan='2'><span class="fix">Regd. No:</span><span class="value">:     {{$value->registration_no}}</span></td>                       
                                                <td colspan='2'><span class="fix">Date Of Registration:</span><span class="value">:     {{$std->registration_date}}</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan='2'><span class="fix">Title Of PH.D Work:</span><span class="value">:     {{$value->title_of_phd}}</span></td>
                                                <td colspan='2'><span class="fix">Present Research Supervisor Name:</span><span class="value">:     {{$value->present_research_supervisor}}</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan='2'><span class="fix">Proposed Research Supervisor Name:</span><span class="value">:     {{$value->proposed_research_supervisor}}</span></td>
                                                <td colspan='2'><span class="fix">Present Research Co.Supervisor Name:</span><span class="value">:     {{$value->pres_cosupervisor_name}}</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan='4'><span class="fix">Proposed Research Co.Supervisor:</span><span class="value">:     {{$value->pros_resc_cosupervisor}}</span></td>   
                                            </tr>
                                            <tr>
                                                <td colspan='4'><span class="fix">Reason For Change:</span><span class="value">:     {{$value->reason_for_change}}</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan='2'><span class="fix">Proposed Supervisor/Co.Supervisor Approved Of BPUT:</span><span class="value">:     {{$value->approved_by_bput}}</span></td>

                                                @if($value->approved_by_bput != '')
                                                <td colspan='2'><span class="fix">Recognisation letter:</span><span class="value">:@if($value->recognisation_letter != '') <a class="button" href="{{ $value->recognisation_letter }}" target="blank">View Letter</a>
                                                    @else
                                                    @endif</span></td>
                                            </tr>
                                           
                                            <tr>
                                              
                                            </tr>
                                            @endif
                                        </table>
                                        <hr>          
                                        <div class="row">
                                            <h5><b>From DSC:</b></h5>
                                            <div class="col-6">
                                                <input type="hidden" name="type" value="" />
                                                <label for="">Application Status</label>
                                                <select name="at_supervisor" id="" class="form-control" readonly>
                                                    <option >
                                                        @if($value->status == 2)
                                                        Recommended
                                                        @elseif($value->status == 3)
                                                        Not Recommended
                                                        @else
                                                        @endif
                                                    </option>
                                                </select>
                                            </div> 
                                            @if($value->status == 1)
                                            <div class="col-6">
                                                <label for="">Remarks</label>
                                                <textarea name="dsc_remark" class="form-control" readonly>{{$value->dsc_remark}}</textarea>
                                            </div>
                                            @endif
                                        </div><br>
                                        <div class="row">
                                            <h5><b>From Control Cell:</b></h5>
                                            <div class="col-6">
                                                <input type="hidden" name="type" value="" />
                                                <label for="">Application Status</label>
                                                <select name="at_supervisor" id="" class="form-control" readonly>
                                                    <option >
                                                        @if($value->status == 4)
                                                        Recommended
                                                        @elseif($value->status == 5)
                                                        Not Recommended
                                                        @else
                                                        @endif
                                                    </option>
                                                </select>
                                            </div>
                                            @if($value->status == 3)
                                            <div class="col-6">
                                                <label for="">Remarks</label>
                                                <textarea name="rd_remark" class="form-control" readonly>{{$value->rd_remark}}</textarea>
                                            </div>
                                            @endif
                                        </div><br>
                                        <div class="row">
                                            <h5><b>From Vice chancellor:</b></h5>
                                            <div class="col-6">
                                                <input type="hidden" name="type" value="" />
                                                <label for="">Application Status</label>
                                                <select name="at_supervisor" id="" class="form-control" readonly>
                                                    <option >
                                                        @if($value->status == 6)
                                                        Approved
                                                        @elseif($value->status == 7)
                                                        rejectd
                                                        @else
                                                        @endif
                                                    </option>
                                                </select>
                                            </div>
                                            @if($value->status == 5)
                                            <div class="col-6">
                                                <label for="">Remarks</label>
                                                <textarea name="vc_remarks" class="form-control" readonly>{{$value->vc_remarks}}</textarea>
                                            </div>
                                            @endif
                                        </div>
                                    </form>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>                   <!-- end row -->    
@endsection      