@extends('admin.layouts.app')
@section('content')
@section('heading', 'Semester Registration')
@section('sub-heading', 'Semester Registration')



<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover m-0 table-centered  nowrap w-100" cellspacing="0" id="dataTable">
                    <thead class="bg-light">
                        <tr>
                            <th class="fw-medium">Sl. No.</th>
                            <th class="fw-medium">Enrollment ID</th>
                            <th class="fw-medium">Name</th>
                            <th class="fw-medium">Phone</th>
                            <th class="fw-medium">Nodal Center</th>
                            <th class="fw-medium">From</th>
                            <th class="fw-medium">To</th>
                            <th class="fw-medium">Status</th>
                            <th class="fw-medium">Action</th>
                        </tr>
                    </thead>

                    <tbody class="font-14">
                        @foreach ($leave_list as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->enrollment_no }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->telephone }}</td>
                                <td>{{ $value->nodal_center }}</td>
                                <td>{{ $value->leave_from }}</td>
                                <td>{{ $value->leave_to }}</td>
                                <td>
                                    <span class="badge {{ $value->control_status == 1 ? 'bg-success' : 'bg-warning' }} ">
                                        @if($value->nodal_status == 1 && $value->vc_status == 0)
                                        Pending To VC
                                        @elseif($value->vc_status == 1 && $value->control_status == 0) 
                                        Pending To ControlCell
                                        @elseif($value->control_status == 1 && $value->vc_status == 1 && $value->nodal_status == 1 && $value->supervisor_status == 1 )
                                        Approved   
                                        @else
                                        Pending 
                                        @endif 
                                    </span>
                                </td>
                                
                                <td class="table-action">
                                    <a href="{{route('nodalcentre.leave.view',[$value->id])}}"
                                        class="action-icon"><i class="mdi mdi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div><!-- end col -->
</div>
@endsection

@section('js')
<script></script>
@endsection
