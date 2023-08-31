@extends('admin.layouts.app')
@section('content')
@section('heading', strtoupper('Supervisor approved application'))
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
                            <th class="fw-medium text-left">Sl. No.</th>
                            <th class="fw-medium text-left">Name</th>
                            <th class="fw-medium text-left">Faculty</th>
                            <th class="fw-medium text-left">Marital Status</th>
                            <th class="fw-medium text-left">Age</th>
                            <th class="fw-medium text-left">Application Status</th>
                            <th class="fw-medium text-left">Action</th>
                        </tr>
                    </thead>

                    <tbody class="font-14">
                        @foreach ($applications as $key => $value)
                            @php
                                // dd($value);
                                $status = ['Not Subbmitted', 'Pending At R&D control cell', 'Approved by R&D control cell', 'Rejected by R&D control cell', 'Approved by VC', 'Rejected by VC'];
                                $status_color = ['bg-dark', 'bg-warning', 'bg-success', 'bg-danger', 'bg-success', 'bg-danger'];
                            @endphp
                            <tr>
                                <td class="text-uppercase">{{ ++$key }}</td>
                                <td class="text-capitalize">{{ $value->name }}</td>
                                <td class="text-uppercase">{{ $value->faculty }}</td>
                                <td class="text-uppercase">{{ $value->marital_status }}</td>
                                <td class="text-uppercase text-center">{{ $value->age }}</td>
                                <td class="text-uppercase text-center">
                                    <span
                                        class="badge {{ $status_color[$value->application_status] }}">{{ app\Helpers\Helpers::SupervisorApplicationStatus($value->id) }}
                                        {{-- $value->application_status --}}</span>
                                </td>
                                <td class="table-action">
                                    <a href="{{ route('admin.sup.preview-application', ['id' => $value->sup_id]) }}"
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
