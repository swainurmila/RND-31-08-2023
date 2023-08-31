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
                            <th >Name Of NCR</th>
                            <th >Application Status</th>
                            <th >Action</th>
                        </tr>
                    </thead>

                    <tbody class="font-14">
                        @foreach ($value as $key => $value)
                        @if($value->status == 1 || $value->status ==2 || $value->status == 4 || $value->status == 6)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->ncr_name }}</td>
                            <td>@if($value->status == '1')
                                <span class="badge bg-warning">Recommended by supervisor</span>
                                @elseif($value->status == '2')
                                <span class="badge bg-info">Recommended by nodal center</span>
                                @elseif($value->status == '3')
                                <span class="badge bg-danger">Not Recommended by nodal center</span>
                                @elseif($value->status == '4')
                                <span class="badge bg-primary">Recommended by Control Cell</span>
                                @elseif($value->status == '5')
                                <span class="badge bg-danger">Not Recommended by Control Cell</span>
                                @elseif($value->status == '6')
                                <span class="badge bg-success">Recommended by VC</span>
                                @elseif($value->status == '7')
                                <span class="badge bg-danger">Not Recommended by VC</span>
                                @else
                                <span class="badge bg-danger">Not Recommended by Supervisor</span>
                                @endif
                            </td>
                            <td><a href="{{url('vice-chancellor/renewal-registration',$value->id)}}" class="action-icon"> <i class="mdi mdi-eye"></i></a></td>
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
