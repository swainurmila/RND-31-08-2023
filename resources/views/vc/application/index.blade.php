@extends('admin.layouts.app')
@section('content')
@section('heading', 'Student Application')
@section('sub-heading', 'View Applications')
<style>
    .col-action {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        align-items: center;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-tag font-24"></i>
                                <h3>{{ $app_status['applied'] }}</h3>{{-- {{ $app_status->applied }} --}}
                                <p class="text-uppercase mb-1 font-13 fw-medium">Applied Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-archive font-24"></i>
                                <h3 class="text-warning">{{ $app_status['pending'] }}</h3>{{-- {{ $app_status->pending }} --}}
                                <p class="text-uppercase mb-1 font-13 fw-medium">Pending Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-shield font-24"></i>
                                <h3 class="text-success">{{ $app_status['approved'] }}</h3>{{-- {{ $app_status->approved }} --}}
                                <p class="text-uppercase mb-1 font-13 fw-medium">Approved Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-delete font-24"></i>
                                <h3 class="text-danger">{{ $app_status['rejected'] }}</h3>{{-- {{ $app_status->rejected }} --}}
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
                            <th class="fw-bold">Sl. No.</th>
                            <th class="fw-bold">Name</th>
                            {{-- <th class="fw-bold">Topic</th> --}}
                            <th class="fw-bold">Enrollment No.</th>
                            {{-- <th class="fw-bold">Enrollment Date</th> --}}
                            <th class="fw-bold">Student Category</th>
                            {{-- <th class="fw-bold">Payment Status</th> --}}
                            <th class="fw-bold">Application Status</th>
                            {{-- <th class="fw-bold">Supervisor Action</th>
                            <th class="fw-bold">NCR Action</th>
                            <th class="fw-bold">R&D Action</th>
                            <th class="fw-bold">VC Action</th> --}}
                            <th class="fw-bold">Action</th>
                        </tr>
                    </thead>

                    <tbody class="font-14">
                        @foreach ($applications as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->name }}</td>
                                {{-- <td>{{ $value->topic_of_phd_work }}</td> --}}
                                <td>{{ $value->enrollment_no }}</td>
                                {{-- <td>{{ Helper::date_format($value->enrollment_date, '-') }}</td> --}}
                                <td>{{ $value->student_category }}</td>
                                {{-- <td class="text-uppercase"><span class="badge bg-success">Success</span>
                                </td> --}}
                                <td class="text-center text-uppercase">
                                    @if ($value->application_status === 12)
                                        @if (!is_null($value->get_coursework_details))
                                            <br />
                                            <span
                                                class="badge bg-{{ Helper::phdcourseworkStatusColor($value->get_coursework_details->id) }}">
                                                {{ Helper::phdcourseworkStatus($value->get_coursework_details->id) }}</span>
                                        @else
                                            <span
                                                class="badge bg-{{ Helper::appliedApplicationStatusColor($value->application_status) }}">
                                                {{ Helper::appliedApplicationStatus($value->application_status) }}</span>
                                        @endif
                                    @else
                                        <span
                                            class="badge bg-{{ Helper::appliedApplicationStatusColor($value->application_status) }}">
                                            {{ Helper::appliedApplicationStatus($value->application_status) }}</span>
                                    @endif
                                </td>
                                {{-- <td></td>
                                <td></td>
                                <td></td>
                                <td></td> --}}
                                <td class="table-action col-action">
                                    <a target="__blank__"
                                        href="{{ route('vc.preview-application', ['id' => $value->id, 'type' => 'PHD']) }}"
                                        class="btn-sm btn-primary"> View Details
                                    </a>
                                    @if ($value->notified)
                                        <a class="btn-sm btn-pink m-1" target="_blank"
                                            href="{{ route('vc.notify.view', [$value->id]) }}"> View Expert Details
                                        </a>
                                    @endif
                                    @if ($value->get_coursework_details && in_array($value->get_coursework_details->status, [8, 10, 11, 12, 14]))
                                        <a href="{{ route('vc.view-coursework', ['id' => $value->get_coursework_details->id]) }}"
                                            class="btn-sm btn-warning m-1" title="View applied coursework details">
                                            Course work
                                        </a>
                                    @endif
                                    @if ($value->get_coursework_details && $value->get_coursework_details->status == 14)
                                        <a href="javascript:void(0);"
                                            onclick="upload_image_view('{{ $value->get_coursework_details->dsc_letter }}')"
                                            class="btn-sm btn-success m-1" title="View applied coursework details">
                                            Course Work Letter
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
<div class="modal" tabindex="-1" id="upload_image_view">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close text-red" data-bs-dismiss="modal" aria-label="Close"></button>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <div class="modal-body">
                <div id="view_upload_image"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function upload_image_view(url) {
        event.preventDefault();
            $('#view_upload_image').html('<embed src="' + url +
                '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
            $('#upload_image_view').modal('show');
    }
</script>
@endsection
