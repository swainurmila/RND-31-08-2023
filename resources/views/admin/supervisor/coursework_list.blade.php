@extends('admin.layouts.app')
@section('content')
@section('heading', 'Coursework Application')
@section('sub-heading', 'Coursework Applications')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-tag font-24"></i>
                                <h3></h3>{{-- {{ $app_status->applied --}}
                                <p class="text-uppercase mb-1 font-13 fw-medium">Applied Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-archive font-24"></i>
                                <h3 class="text-warning"></h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Pending Application</p>
                                {{-- {{ $app_status->pending }} --}}
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-shield font-24"></i>
                                <h3 class="text-success"></h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Approved Application</p>
                                {{-- {{ $app_status->approved }} --}}
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-delete font-24"></i>
                                <h3 class="text-danger"></h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Rejected Application</p>
                                {{-- {{ $app_status->rejected }} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <pre>{{ print_r($applications) }}</pre> --}}

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover m-0 table-centered  nowrap w-100" cellspacing="0" id="dataTable">
                    <thead class="bg-light">
                        <tr>
                            <th class="fw-medium">Sl. No.</th>
                            <th class="fw-medium">Name</th>
                            <th class="fw-medium">Enrollment No.</th>
                            <th class="fw-medium">Enrollment Date</th>
                            <th class="fw-medium">Student Category</th>
                            <th class="fw-medium">Application Status</th>
                            <th class="fw-medium">Action</th>
                        </tr>
                    </thead>
                    <tbody class="font-14">
                        @foreach ($courseworks as $key => $value)
                            <tr>
                                <td class="text-capitalize">{{ ++$key }}</td>
                                <td class="text-capitalize">{{ $value->get_application_details->name ?? '-' }}</td>
                                <td class="text-capitalize">{{ $value->get_application_details->enrollment_no ?? '-' }}
                                </td>
                                <td class="text-capitalize">
                                    {{ $value->get_application_details->enrollment_date ? Helper::date_format($value->get_application_details->enrollment_date, '-') : '-' }}
                                </td>
                                <td class="text-capitalize">
                                    {{ $value->get_application_details->student_category ?? '-' }}</td>
                                <td class="text-uppercase">
                                    <span
                                        class="badge bg-{{ Helper::CourseworkStatusColor($value->status) }} text-uppercase">
                                        {{ Helper::CourseworkStatus($value->status) }}
                                    </span>
                                </td>
                                <td class="table-action">
                                    <a href="{{ route('applied-coursework-details', ['id' => $value->id]) }}"
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
