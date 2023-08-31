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
                        @if($value->rd_approved == 2)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->enrollment_no }}</td>
                            <td>
                                @if($value->vice_chancellor == '0')
                                <span class="badge bg-warning">Pending</span>
                                @elseif($value->vice_chancellor == '1')
                                <span class="badge bg-danger">Rejected</span>
                                @elseif($value->vice_chancellor == '2')
                                <span class="badge bg-success">Approved</span>
                                @else
                                @endif
                            </td>
                            <td><a href="{{ url('vice-chancellor/change-nodal-view', $value->id)}}" class="action-icon"> <i class="mdi mdi-eye"></i></a></td>
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
