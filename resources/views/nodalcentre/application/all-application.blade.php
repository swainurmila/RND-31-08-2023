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
                                <h3>{{ $app_status->applied }}</h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Applied Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-archive font-24"></i>
                                <h3 class="text-warning">{{ $app_status->pending }}</h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Pending Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-shield font-24"></i>
                                <h3 class="text-success">{{ $app_status->approved }}</h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Approved Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-delete font-24"></i>
                                <h3 class="text-danger">{{ $app_status->rejected }}</h3>
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
                            <th class="fw-medium">Enroll. Date</th>
                            <th class="fw-medium">Topic</th>
                            <th class="fw-medium">Student Category</th>
                            <th class="fw-medium">Payment Status</th>
                            <th class="fw-medium">Application Status</th>
                            <th class="fw-medium">Action</th>
                        </tr>
                    </thead>

                    <tbody class="font-14">
                        @foreach ($applications as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->enrollment_no }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ Helper::date_format($value->enrollment_date, '-') }}</td>
                                <td>{{ $value->topic_of_phd_work }}</td>
                                <td>{{ $value->student_category }}</td>
                                <td class="text-center"> <span
                                        class="badge bg-success text-uppercase">{{ $value->stu_payment_status == 1 ? 'Success' : 'Failed' }}</span>
                                </td>
                                <td>
                                    <span
                                        class="badge bg-{{ Helper::appliedApplicationStatusColor($value->application_status) }} text-uppercase">
                                        {{ Helper::appliedApplicationStatus($value->application_status) }}
                                    </span>
                                </td>
                                <td class="table-action">
                                    <a href="{{ route('nodalcentre.single-application', ['id' => $value->id]) }}"
                                        class="btn btn-primary"> <i class="mdi mdi-eye"></i></a>

                                    @if ($value->notified)
                                        <a class="btn btn-pink cust_btn" target="_blank"
                                            href="{{ route('je.notify.view', [$value->id]) }}">
                                            <i class="mdi mdi-book"></i> View Form
                                        </a>
                                    @endif
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
