@extends('admin.layouts.app')
@section('heading', 'CHANGE OF RESEARCH SUPERVISOR LIST')
@section('sub-heading', 'CHANGE OF RESEARCH SUPERVISOR LIST')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <!-- cta -->
                        <div class="custom-accordion">
                            <div class="card-body">
                                <h3 style="text-align: center;">Change of Supervisor/Co.Supervisor List</h3>
                                <div class="table-responsive mt-3">
                                    <table id="datatable-buttons" class="table w-100 nowrap dataTable no-footer">
                                        <thead >
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">PH.D Student Name</th>
                                                <th scope="col">Enrollment No</th>
                                                <th scope="col">Status</th>
                                                <th scope="col" style="width: 85px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;foreach($value as $key=>$val){ ?>
                                            @if($val->status == 2 || $val->status ==3 || $val->status == 4 || $val->status == 5 || $val->status ==6 || $val->status ==7)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{$val->phd_student_name}}</td>
                                                <td>{{$val->enrollment_no}}</td>
                                                <td>@if($val->status == '2')
                                                    <span class="badge bg-warning">Pending</span>
                                                    @elseif($val->status == '5')
                                                    <span class="badge bg-danger">Not Recommended</span>
                                                    @elseif($val->status == '4')
                                                    <span class="badge bg-success">Recommended</span>
                                                    @elseif($val->status == '7')
                                                    <span class="badge bg-danger">Rejected by VC</span>
                                                    @elseif($val->status == '6')
                                                    <span class="badge bg-success">Approved by VC</span>
                                                    @else
                                                    @endif</td>
                                                <td><a href="{{url('control-cell/view_change_supervisor/'.$val->res_ch_id )}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                            </tr>
                                            @endif
                                            <?php $i++;} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>                   <!-- end row -->    

@endsection      
{{-- @section('js')
@endsection --}}

