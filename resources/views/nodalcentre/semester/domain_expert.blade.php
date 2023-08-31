@extends('admin.layouts.app')
@section('content')
@section('heading', 'Student Application')
@section('sub-heading', 'View Applications')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover m-0 table-centered  nowrap w-100" cellspacing="0" id="dataTable">
                    <thead class="bg-light">
                        <tr>
                            <th >Sl. No.</th>
                            <th >Name</th>
                            <th >Enrollment No.</th>
                            <th >Application Status</th>
                            <th >Action</th>
                        </tr>
                    </thead>

                    <tbody class="font-14">
                        @foreach ($value as $key => $value)
                        @if($value->name_of_ncr == Auth::guard('nodalcentre')->user()->id)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->student_name }}</td>
                                <td>{{ $value->enrollment_no }}</td>
                                <td>
                                    @if($value->request_status == 2)
                                    <span class="badge bg-success">Recommended</span>
                                    @elseif($value->request_status == 1)
                                    <span class="badge bg-danger">Not Recommended</span>
                                    @elseif($value->request_status == 4)
                                    <span class="badge bg-success">Approved by VC</span>
                                    @elseif($value->request_status == 3)
                                    <span class="badge bg-danger">Rejected by VC</span>
                                    @else
                                    <span class="badge bg-warning">pending</span>
                                    @endif
                                </td>
                                <td><a href="{{ url('nodalcentre/domain-remark', $value->dsc_id )}}" class="action-icon"> <i class="mdi mdi-eye"></i></a></td>
                            </tr>
                            @endif
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
