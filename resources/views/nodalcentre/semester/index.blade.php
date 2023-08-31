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
                            <th class="fw-medium">Enroll. Date</th>
                            <th class="fw-medium">Semester</th>
                            <th class="fw-medium">Student Category</th>
                            <th class="fw-medium">Status</th>
                            <th class="fw-medium">Action</th>
                        </tr>
                    </thead>

                    <tbody class="font-14">
                        @foreach ($semester_details as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->enrollment_no }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ Helper::date_format($value->enrollment_date, '-') }}</td>
                                <td>{{ $value->semester }}</td>
                                <td>{{ $value->student_category }}</td>
                                <td><span
                                    class="badge @if ($value->nodal_status == '')bg-warning @elseif($value->nodal_status == 1)bg-success @else bg-danger @endif"> @if ($value->nodal_status == '')
                                        pending
                                    @elseif($value->nodal_status == 1)
                                        Verified
                                    @else
                                        Rejected
                                    @endif  </span></td>
                                
                                <td class="table-action">
                                    <a href="{{route('nodalcentre.semester.view',[$value->semister_reg_id])}}"
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
