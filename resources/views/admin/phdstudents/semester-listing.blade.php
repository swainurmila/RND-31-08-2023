@extends('admin.layouts.app')
@section('heading', 'Semester Listing')
@section('sub-heading', 'Semester Listing')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <div class="panel-container show" role="content">
                                <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                                <div class="panel-content p-4">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive mt-3">
                                                <table id="datatable-buttons"
                                                    class="table w-100 nowrap dataTable no-footer">
                                                    <thead>
                                                        <th class="fw-medium">Sl. No.</th>
                                                        <th class="fw-medium">Enrollment ID</th>
                                                        <th class="fw-medium">Name</th>
                                                        {{-- <th class="fw-medium">Enroll. Date</th> --}}
                                                        <th class="fw-medium">Semester</th>
                                                        {{-- <th class="fw-medium">Student Category</th> --}}
                                                        <th class="fw-medium">Status</th>
                                                        <th class="fw-medium">Action</th>
                                                    </thead>
                                                    @foreach($info as $key=>$val)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $val->enrollment_no}}</td>
                                                        <td>{{ $val->name}}</td>
                                                        <td>{{ $val->semester}}</td>
                                                        <td> @php
                                                            $phdStatus = Helper::phdSemRegistrationStatus($val->app_id)['status'];
                                                            $badgeColor = Helper::phdSemRegistrationStatus($val->app_id)['badge_color'];
                                                        @endphp
                    
                                                        <span class="badge bg-{{ $badgeColor }} float-end text-uppercase p-1">
                                                            {{ $phdStatus }}
                                                        </span></td>
                                                        <td><a href="{{ route('semester-register-view', $val->app_id)}}"  class="btn-bordered rounded-pill waves-effect waves-light btn btn-primary" title="View semester progress details">View
                                                        </a></td>
                                                    </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="upload_image_view" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollableModalTitle">View Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="view_upload_image">
                        {{-- <img src="" alt="Upload_img" class="img-responsive card-img-top" id="view_upload_image">
                                                            <embed src="" frameborder="0" width="100%" id="view_upload_image" height="400px"> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('js')
    <script>
         function upload_image_view(url) {
            // alert(url);
            event.preventDefault();
            $('#view_upload_image').html('<embed src="' + url +
                '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
            $('#upload_image_view').modal('show');
        }
    </script>
@endsection
