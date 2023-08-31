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
                            <th class="fw-medium">Topic</th>
                            <th class="fw-medium">Student Category</th>
                            {{-- <th class="fw-medium">Coursework Status</th> --}}
                            <th class="fw-medium">Status</th>
                            <th class="fw-medium">Action</th>
                        </tr>
                    </thead>

                    <tbody class="font-14">
                        @foreach ($application_remarks as $key => $value)
                            <tr>
                                <td class="fw-medium text-uppercase">{{ ++$key }}</td>
                                <td class="fw-medium text-uppercase">
                                    {{ $value->get_application_details->enrollment_no }}</td>
                                <td class="fw-medium text-uppercase">{{ $value->get_application_details->name }}</td>

                                <td class="fw-medium text-uppercase">
                                    {{ $value->get_application_details->topic_of_phd_work }}</td>
                                <td class="fw-medium text-uppercase">
                                    {{ $value->get_application_details->student_category }}</td>
                                {{-- <td class="fw-medium text-uppercase">
                                    {{ $value->get_coursework_subject_details->status }}</td> --}}
                                <td>
                                    @if ($value->status == 14)
                                        <span class="badge bg-success">Notified by JE</span>
                                    @endif
                                </td>
                                <td class="fw-medium text-uppercase">
                                    <a href="{{ route('exam-cell.coursework-application-view', ['id' => $value->id]) }}"
                                        class="btn-sm btn-info">view</a>
                                        @if ($value->status && $value->status == 14)
                                        <a href="javascript:void(0);"
                                            onclick="upload_image_view('{{ $value->dsc_letter }}')"
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
