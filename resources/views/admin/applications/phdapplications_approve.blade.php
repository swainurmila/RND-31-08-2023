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
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-tag font-24"></i>
                                <h3>{{-- $app_status->applied --}}0</h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Applied Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-archive font-24"></i>
                                <h3 class="text-warning">{{-- $app_status->pending --}}0</h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Pending Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-shield font-24"></i>
                                <h3 class="text-success">{{ $app_status }}</h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Approved Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-delete font-24"></i>
                                <h3 class="text-danger">{{-- $app_status->rejected --}}0</h3>
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
                            <th class="fw-medium text-capitaze">Sl. No.</th>
                            <th class="fw-medium text-capitaze">Name</th>
                            <th class="fw-medium text-capitaze">Topic</th>
                            <th class="fw-medium text-capitaze">Enrollment No.</th>
                            <th class="fw-medium text-capitaze">Enrollment Date</th>
                            <th class="fw-medium text-capitaze">Student Category</th>
                            <th class="fw-medium text-capitaze">Payment Status</th>
                            <th class="fw-medium text-capitaze">Application Status</th>
                            <th class="fw-medium text-capitaze">Action</th>
                        </tr>
                    </thead>

                    <tbody class="font-14">
                        @foreach ($applications as $key => $value)
                            <tr>
                                <td class="">{{ ++$key }}</td>
                                <td class="text-capitalize">{{ $value->name }}</td>
                                <td class="text-capitalize">{{ $value->topic_of_phd_work }}</td>
                                <td class="text-uppercase text-center">{{ $value->enrollment_no }}</td>
                                <td class="text-uppercase text-center">
                                    {{ Helper::date_format($value->enrollment_date, '-') }}</td>
                                <td class="text-uppercase text-center">{{ $value->student_category }}</td>
                                <td class="text-uppercase text-center"> <span class="badge bg-success">Success</span>
                                </td>
                                <td class="text-uppercase text-center"><span
                                        class="badge bg-success">{{ app\Helpers\Helpers::applicationStatus($value->id) }}</span>
                                </td>
                                <td class="table-action text-center">
                                    <a href="{{ route('admin.stu.preview-application', ['id' => $value->id]) }}"
                                        class="action-icon text-center"> <i class="mdi mdi-eye"></i></a>
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
