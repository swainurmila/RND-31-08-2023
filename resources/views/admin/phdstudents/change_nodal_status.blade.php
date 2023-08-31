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
                        @if($value->student_id == Auth::guard('student')->user()->id)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->enrollment_no }}</td>
                            <td>
                                @if($value->rd_approved == '0' && $value->vice_chancellor == '0')
                                <span class="badge bg-success">Pending at controlcell</span>
                                @elseif($value->rd_approved == '1' && $value->vice_chancellor == '0')
                                <span class="badge bg-danger">not recommended by controlcell</span>
                                @elseif($value->rd_approved == '2' && $value->vice_chancellor == '0')
                                <span class="badge bg-success">recommended by controlcell</span>
                                @elseif($value->vice_chancellor == '0')
                                <span class="badge bg-success">Pending at vc</span>
                                @elseif($value->vice_chancellor == '1')
                                <span class="badge bg-danger">Rejected by vc</span>
                                @elseif($value->vice_chancellor == '2')
                                <span class="badge bg-success">Approved by vc</span>
                                @else
                                @endif
                            </td>
                            <td><a href="{{ url('phdstudent/view-change-nodal-status', $value->id)}}" class="action-icon"> <i class="mdi mdi-eye"></i></a></td>
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
