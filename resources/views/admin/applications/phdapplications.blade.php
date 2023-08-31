@extends('admin.layouts.app')
@section('content')
@section('heading', $page_title)
@section('sub-heading', 'View Applications')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="row">
                        {{-- {{ Helper::pr($app_status->toArray()) }} --}}
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

{{-- {{ Helper::pr($applications->toArray()) }} --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover m-0 table-centered  nowrap w-100" cellspacing="0" id="dataTable">
                    <thead class="bg-light">
                        <tr>
                            <th class="fw-medium --text-uppercase">Sl. No.</th>
                            <th class="fw-medium --text-uppercase">Name</th>
                            <th class="fw-medium --text-uppercase">Topic</th>
                            <th class="fw-medium --text-uppercase">Enrollment No.</th>
                            <th class="fw-medium --text-uppercase">Enrollment Date</th>
                            <th class="fw-medium --text-uppercase">Student Category</th>
                            <th class="fw-medium --text-uppercase">Payment Status</th>
                            <th class="fw-medium --text-uppercase">Application Status</th>
                            <th class="fw-medium --text-uppercase">Action</th>
                        </tr>
                    </thead>

                    <tbody class="font-14">
                        @php
                            $status = [];
                            $status_color = ['dark', 'warning', 'success', 'warning', 'success', 'warning', 'success', 'danger'];
                        @endphp
                        @foreach ($applications as $key => $value)
                            <tr>
                                <td class="">{{ ++$key }}</td>
                                <td class="text-capitalize">{{ $value->name ?? '-' }}</td>
                                <td class="text-capitalize">{{ $value->topic_of_phd_work ?? '-' }}</td>
                                <td class="text-uppercase text-center">{{ $value->enrollment_no ?? '-' }}</td>
                                <td class="text-uppercase text-center">
                                    {{ Helper::date_format($value->enrollment_date, '-') }}</td>
                                <td class="text-uppercase text-center">{{ $value->student_category }}</td>
                                <td class="">
                                    <span class="badge bg-success">Success</span>
                                </td>
                                <td class="text-uppercase">
                                    <span
                                        class="badge bg-{{ $status_color[$value->application_status] }}">{{ app\Helpers\Helpers::applicationStatus($value->id) }}</span>
                                </td>
                                <td class="table-action">
                                    <a href="{{ route('admin.stu.preview-application', ['id' => $value->id]) }}"
                                        class="action-icon"> <i class="mdi mdi-eye"></i></a>
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
