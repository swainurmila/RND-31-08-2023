@extends('admin.layouts.app')
@section('heading', 'Application for discontinuation as Ph.D student')
@section('sub-heading', 'Application for discontinuation as Ph.D student')
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
                                                <td><span class="fix">Name</span><span class="value">:     {{$value->name}}</span></td>
                                                <td> <span class="fix">Faculty of</span><span class="value">:     {{$value->faculty}}</span> </td>
                                                
                                            </tr>
                                            <tr>
                                                <td><span class="fix">Enrollment No</span><span class="value">:     {{$value->enrollment_no}}</span></td>                       
                                                <td><span class="fix">Date Of Enrollment</span><span class="value">:     {{$value->enrollment_date}}</span></td>
                                                
                                            </tr>
                                            <tr>
                                                <td><span class="fix">Regd. No</span><span class="value">:     {{$value->regd_no}}</span></td>                       
                                                <td><span class="fix">Date Of Registration</span><span class="value">:     {{$value->registration_date}}</span></td>
                                            </tr>
                                            <tr>
                                                <td><span class="fix">Branch / Specialization</span><span class="value">:     {{$value->branch}}</span></td>
                                                <td colspan='2'><span class="fix">Topic of the Research work</span><span class="value">:     {{$value->topic}}</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan='2'><span class="fix">Present Nodal Research Centre</span><span class="value">:     {{$nodal->college_name}}</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan='2'><span class="fix">Details of research paper/s published </span><span class="value">:     {{$value->research_details}}</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan='2'><span class="fix">Published research paper</span><span class="value">: <a class="button" href="{{ $value->file }}" target="blank">View published paper</a></span></td>
                                            </tr>
                                            <tr>
                                                <td colspan='2'><span class="fix">Progress Done so far</span><span class="value">:     {{$value->progress}}</span></td>
                                            </tr>
                                            <tr>
                                                <td colspan='2'><span class="fix">Reason for discontinuation</span><span class="value">:     {{$value->discontinuation_reason}}</span></td>
                                            </tr>
                                        </table>
                                        <hr>
                                        <form action="#" method="post">
                                            @csrf
                                            <div class="row">
                                                <h5><b>From Supervisor:</b></h5>
                                                <div class="col-6">
                                                    <input type="hidden" name="type" value="" />
                                                    <label for="">Application Status</label>
                                                    <select name="at_supervisor" id="" class="form-control" readonly>
                                                        <option >
                                                            @if($value->status == 2)
                                                            Recommended
                                                            @elseif($value->status == 1)
                                                            Not Recommended
                                                            @else

                                                            @endif
                                                        </option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="">Remarks</label>
                                                    <textarea name="remark_supervisor" class="form-control" readonly>{{ $value->remark_supervisor}}</textarea>
                                                </div>
                                            </div>
                                        </form>
                                        <hr>
                                        <form action="#" method="post">
                                            @csrf
                                            <div class="row">
                                                <h5><b>From Nodal Center:</b></h5>
                                                <div class="col-6">
                                                    <input type="hidden" name="type" value="" />
                                                    <label for="">Application Status</label>
                                                    <select name="at_supervisor" id="" class="form-control" readonly>
                                                        <option >
                                                            @if($value->status == 4)
                                                            Recommended
                                                            @elseif($value->status == 3 )
                                                            Not Recommended
                                                            @else
                                                            
                                                            @endif
                                                        </option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="">Remarks</label>
                                                    <textarea name="remark_nodal_center" class="form-control" readonly>{{ $value->remark_nodal_center}}</textarea>
                                                </div>
                                            </div>
                                        </form>
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
                                                            @if($value->status == 6)
                                                            Recommended
                                                            @elseif($value->status == 5)
                                                            Not Recommended
                                                            @else
                                                            
                                                            @endif
                                                        </option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="">Remarks</label>
                                                    <textarea name="remark_controlcell" class="form-control" readonly>{{ $value->remark_controlcell}}</textarea>
                                                </div>
                                            </div>
                                        </form>
                                        <hr>
                                        <form action="#" method="post">
                                            @csrf
                                            <div class="row">
                                                <h5><b>From Vice Chancellor:</b></h5>
                                                <div class="col-6">
                                                    <input type="hidden" name="type" value="" />
                                                    <label for="">Application Status</label>
                                                    <select name="at_supervisor" id="" class="form-control" readonly>
                                                        <option >
                                                            @if($value->status == 8)
                                                            Approved
                                                            @elseif($value->status == 7)
                                                            Rejected
                                                            @else
                                                            
                                                            @endif
                                                        </option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="">Remarks</label>
                                                    <textarea name="remark_controlcell" class="form-control" readonly>{{ $value->remark_vc}}</textarea>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>                   <!-- end row -->    
@endsection      