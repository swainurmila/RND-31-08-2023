@extends('admin.layouts.app')
@section('content')
@section('heading', 'Co-Supervisor Application')
@section('sub-heading', 'All Applications')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-tag font-24"></i>
                                <h3>{{ $app_status->applied ?? 0 }}</h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Applied Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-archive font-24"></i>
                                <h3 class="text-warning">{{ $app_status->pending ?? 0 }}</h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Pending Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-shield font-24"></i>
                                <h3 class="text-success">{{ $app_status->approved ?? $app_status }}</h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Approved Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-delete font-24"></i>
                                <h3 class="text-danger">{{ $app_status->rejected ?? 0 }}</h3>
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
                            <th class="fw-medium text-capitalize">Sl. No.</th>
                            <th class="fw-medium text-capitalize">Name</th>
                            <th class="fw-medium text-capitalize">Faculty</th>
                            <th class="fw-medium text-capitalize">Marital Status</th>
                            <th class="fw-medium text-capitalize">Age</th>
                            <th class="fw-medium text-capitalize">Application Status</th>
                            <th class="fw-medium text-capitalize">Action</th>
                        </tr>
                    </thead>

                    <tbody class="font-14">
                        @php
                            $status_color = ['bg-dark', 'bg-warning', 'bg-success', 'bg-danger', 'bg-success', 'bg-danger'];
                        @endphp
                        @foreach ($applications as $key => $value)
                            <tr>
                                <td class="">{{ ++$key }}</td>
                                <td class="text-capitalize">{{ $value->name }}</td>
                                <td class="text-capitalize">{{ $value->faculty }}</td>
                                <td class="text-uppercase">{{ $value->marital_status }}</td>
                                <td class="text-uppercase">{{ $value->age }}</td>
                                <td class="text-uppercase text-center"><span
                                        class="badge bg-success">{{ app\Helpers\Helpers::CoSupervisorApplicationStatus($value->sup_id) }}</span>
                                </td>
                                <td class="table-action">
                                    <a href="{{ route('control-cell.cosup.preview-application', ['id' => $value->sup_id]) }}"
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
