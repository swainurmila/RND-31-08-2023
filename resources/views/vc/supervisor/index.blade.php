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
                            <th class="fw-medium">Name</th>
                            <th class="fw-medium">Faculty</th>
                            <th class="fw-medium">Marital Status</th>
                            <th class="fw-medium">Age</th>
                            <th class="fw-medium">Application Status</th>
                            <th class="fw-medium">Action</th>
                        </tr>
                    </thead>

                    <tbody class="font-14">
                        @foreach ($applications as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->faculty }}</td>
                                <td>{{ $value->marital_status }}</td>
                                <td>{{ $value->age }}</td>
                                <td><span class="badge bg-warning">{{app\Helpers\Helpers::SupervisorApplicationStatus($value->id)}}</span></td>
                                <td class="table-action">
                                    <a href="{{route('vc.vc.preview-application', ['id' => $value->sup_id])}}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
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
