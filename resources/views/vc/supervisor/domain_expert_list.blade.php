@extends('admin.layouts.app')
@section('heading', 'Domain Expert')
@section('sub-heading', 'Domain Expert')
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
    th{
        color:#504f4f;

    }
    .value{
        font-weight: 600;
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
                                                <th colspan="6">
                                                    <h5>View Information</h5>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td colspan=''><span class="fix">Student Name</span><span class="value">:     {{$nodal->student_name}}</span></td>
                                                <td colspan='5'> <span class="fix">Name of NCR</span><span class="value">:     {{$nodal->college_name}}</span> </td>
                                                
                                            </tr>
                                            <tr>
                                                <td colspan=''><span class="fix">Enrollment No</span><span class="value">:     {{$nodal->enrollment_no}}</span></td>                       
                                                <td colspan='5'><span class="fix">Faculty of Branch</span><span class="value">:     {{$nodal->faculty_of_branch}}</span></td>
                                                
                                            </tr>
                                            <tr>
                                                <td colspan='5'><span class="fix">Title of research work</span><span class="value">:     {{$nodal->title_of_rearch_work}}</span></td>
                                            </tr>
                                        </table>
                                        
                                        <form action="{{ url('vice-chancellor/domain-remark-store', $nodal->dsc_id)}}" method="post">
                                            @csrf
                                        @if($nodal->request_status == 2)
                                        <table class="table table-bordered">
                                            <thead>
                                              <tr>
                                                <th scope="col">Select</th>
                                                <th scope="col">Name Of Domain Expert</th>
                                                <th scope="col">Designation & Affiliation</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Mobile No</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($expert as $val)
                                            @if($val->dsc_id == $nodal->dsc_id)
                                              <tr>
                                                <td>
                                                    <input type="checkbox" class="single-checkbox" name="check[]" value='{{ $val->id}}'>
                                                </td>
                                                <td>{{ $val->expert_name}}</td>
                                                <td>{{ $val->designation_affiliation}}</td>
                                                <td>{{ $val->address}}</td>
                                                <td>{{ $val->email}}</td>
                                                <td>{{ $val->mobile}}</td>
                                              </tr>
                                              @endif
                                          @endforeach    
                                            </tbody>
                                        </table>  
                                        <hr>
                                        <div class="row">
                                            <h5><b>From Nodal Center:</b></h5>
                                            <div class="col-6">
                                                <input type="hidden" name="type" value="" />
                                                <label for="">Application Status</label>
                                                <select name="at_supervisor" id="" class="form-control" readonly>
                                                    <option >
                                                        @if($nodal->request_status == 2 || $nodal->request_status == 4)
                                                        Recommended
                                                        @elseif($nodal->request_status == 1)
                                                        Not Recommended
                                                        @else
                                                        @endif
                                                    </option>
                                                    
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="">Remarks</label>
                                                <textarea name="vc_remark" class="form-control" readonly>{{ $nodal->ncr_remark}}</textarea>
                                            </div>
                                        </div>
                                      
                                            <div class="row">
                                                <div class="col-6">
                                                    <input type="hidden" name="type" value="" />
                                                    <label for="">Application Status</label>
                                                    <select name="request_status" id="" class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="4">Approved</option>
                                                        <option value="3">Rejected
                                                    </option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="">Remarks</label>
                                                    <textarea name="vc_remark" class="form-control" required></textarea>
                                                </div>
                                                <div class="row text-center">
                                                    <div class="col-12">
                                                        <button class="btn btn-primary mt-2 mb-5" type="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                            @elseif($nodal->request_status == 4 || $nodal->request_status == 3)
                                            <table class="table table-bordered">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">Name Of Domain Expert</th>
                                                    <th scope="col">Designation & Affiliation</th>
                                                    <th scope="col">Address</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Mobile No</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($expert as $val)
                                                @if($val->dsc_id == $nodal->dsc_id)
                                                @if($val->status == 1)
                                                  <tr>
                                                    <td>{{ $val->expert_name}}</td>
                                                    <td>{{ $val->designation_affiliation}}</td>
                                                    <td>{{ $val->address}}</td>
                                                    <td>{{ $val->email}}</td>
                                                    <td>{{ $val->mobile}}</td>
                                                  </tr>
                                                  @endif
                                                @endif
                                              @endforeach    
                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <h5><b>From Nodal Center:</b></h5>
                                                <div class="col-6">
                                                    <input type="hidden" name="type" value="" />
                                                    <label for="">Application Status</label>
                                                    <select name="at_supervisor" id="" class="form-control" readonly>
                                                        <option >
                                                            @if($nodal->request_status == 2 || $nodal->request_status == 4)
                                                            Recommended
                                                            @elseif($nodal->request_status == 1)
                                                            Not Recommended
                                                            @else
                                                            @endif
                                                        </option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="">Remarks</label>
                                                    <textarea name="vc_remark" class="form-control" readonly>{{ $nodal->ncr_remark}}</textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <h5><b>From VC:</b></h5>
                                                <div class="col-6">
                                                    <input type="hidden" name="type" value="" />
                                                    <label for="">Application Status</label>
                                                    <select name="at_supervisor" id="" class="form-control" readonly>
                                                        <option >
                                                            @if($nodal->request_status == 4)
                                                            Approved
                                                            @elseif($nodal->request_status == 3)
                                                            Rejected
                                                            @else
                                                            @endif
                                                        </option>
                                                        
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label for="">Remarks</label>
                                                    <textarea name="vc_remark" class="form-control" readonly>{{ $nodal->vc_remark}}</textarea>
                                                </div>
                                            </div>
                                            @endif
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>   
                            <!-- end row -->    

@endsection   
@section('js')
<script type="text/javascript">

var limit = 2;
$('input.single-checkbox').on('change', function(evt) {
  if ($('input.single-checkbox:checked').length > limit) {
    this.checked = false;
    alert('you can choose only two experts');
  }
});
    </script>
@endsection


