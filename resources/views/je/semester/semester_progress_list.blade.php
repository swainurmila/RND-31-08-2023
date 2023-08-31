@extends('admin.layouts.app')
@section('content')
@section('heading', 'Semester Progress Report Listing')
@section('sub-heading', 'Semester Report Listing')



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
                            <th class="fw-medium">Semester</th>
                            {{-- <th class="fw-medium">Student Category</th> --}}
                            <th class="fw-medium">Status</th>
                            <th class="fw-medium">Action</th>
                        </tr>
                    </thead>

                    <tbody class="font-14">
                        @foreach ($stu_sem_repo as $key => $value)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $value->enrollment_no }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ Helper::date_format($value->enrollment_date, '-') }}</td>
                                <td>Semester {{ $value->semester }}</td>
                                <td>
                                    @php
                                        $phdStatus = Helper::phdsemesterStatus($value->id)['status'];
                                        $badgeColor = Helper::phdsemesterStatus($value->id)['badge_color'];
                                    @endphp

                                    <span class="badge bg-{{ $badgeColor }} float-end text-uppercase p-1">
                                        {{ $phdStatus }}
                                    </span>
                                </td>
                                <td class="table-action">
                                    <a href="{{ route('je.view-semester-progress', [$value->id]) }}"
                                        class="btn-sm btn-info">View
                                    </a>
                                    @if($value->status == 10)
                                    <a href="javascript:void(0);" onclick="upload_image_view('{{ $value->dsc_file}}')" 
                                        class="btn-sm btn-pink m-1" title="View applied coursework details">
                                         Letter
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
                <button type="button" class="btn-close text-red" data-bs-dismiss="modal"
                    aria-label="Close"></button>
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
