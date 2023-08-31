@extends('admin.layouts.app')
@section('content')
@section('heading', 'SEEKING EXTENSION TO COMPLETE WORK')
@section('sub-heading', 'SEEKING EXTENSION TO COMPLETE WORK')



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
                            <th class="fw-medium">Nodal Center</th>
                            <th class="fw-medium">Status</th>
                            <th class="fw-medium">Action</th>
                        </tr>
                    </thead>

                    <tbody class="font-14">
                        @foreach ($student as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->enrollment_no }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->college_name }}</td>
                                <td>
                                   
                                    <span
                                        class="badge {{ $value->application_status == 6 ? 'bg-success' : 'bg-warning' }}">
                                        {{ Helper::ExtensionWorkStatus($value->id) }}</span>

                                    
                                </td>
                                
                                <td class="table-action">
                                    <a href="{{route('extention.work.view',[$value->id])}}"
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
