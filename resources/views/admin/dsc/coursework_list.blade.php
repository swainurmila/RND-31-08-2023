@extends('admin.layouts.app')
@section('content')
@section('heading', 'Student Application')
@section('sub-heading', 'View Applications')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-tag font-24"></i>
                                <h3></h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Applied Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-archive font-24"></i>
                                <h3 class="text-warning"></h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Pending Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-shield font-24"></i>
                                <h3 class="text-success"></h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Approved Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-delete font-24"></i>
                                <h3 class="text-danger"></h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Rejected Application</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


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
                            {{-- <th class="fw-medium">Enroll. Date</th> --}}
                            <th class="fw-medium">Topic</th>
                            <th class="fw-medium">Student Category</th>
                            <th class="fw-medium">Status</th>
                            <th class="fw-medium">Action</th>
                        </tr>
                    </thead>

                    {{-- {{ dd($application_remarks) }} --}}
                    <tbody class="font-14">
                        @foreach ($application_remarks as $key => $value)
                            <tr>
                                <td class="fw-medium text-uppercase">{{ ++$key }}</td>
                                <td class="fw-medium text-uppercase">
                                    {{ $value->enrollment_no }}</td>
                                <td class="fw-medium text-uppercase">{{ $value->name }}</td>
                                {{-- <td class="fw-medium text-uppercase">
                                    {{ $value->get_application_details->enrollment_date }}</td> --}}
                                <td class="fw-medium text-uppercase">
                                    {{ $value->topic_of_phd_work }}</td>
                                <td class="fw-medium text-uppercase">
                                    {{ $value->student_category }}</td>
                                <td class="fw-medium text-uppercase">
                                    @if($value->status == 2)
                                        <span class="badge bg-success">Recommended</span>
                                    @elseif($value->status == 2)
                                       <span class="badge bg-danger">Not Recommended</span>
                                    @else
                                    <span class="badge bg-warning">Pending</span>
                                    @endif
                                </td>
                                <td class="fw-medium text-uppercase">
                                    <a href="{{ route('dsc.coursework-details', ['id' => $value->id]) }}"
                                        class="btn btn-info btn-bordered rounded-pill waves-effect waves-light">View</a>
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
