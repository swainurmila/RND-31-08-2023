@extends('admin.layouts.app')
@section('heading', 'CHANGE OF RESEARCH SUPERVISOR LIST')
@section('sub-heading', 'CHANGE OF RESEARCH SUPERVISOR LIST')
@section('content')
<style>
    .row {
    padding-left: 12px;
    padding-right: 12px;
}
</style>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="border border-purple mb-4 card">
                                <div class="card-header mb-2">
                                    <div class="row">
                                        <div class="col-md-8 text-right">
                                            <h4 class="text-purple text-uppercase">Change of Research Supervisor
                                                and Co-supervisor</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b> Name of the Ph.D Student :</b>
                                            </div>
                                            <div class="col-md-8">
                                                {{$info->name}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b>Name of NCR :</b>
                                            </div>
                                            <div class="col-md-8">
                                                {{$info->college_name}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b> Name of the Faculty :</b>
                                            </div>
                                            <div class="col-md-8">
                                                {{$info->name_of_faculty}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b>Branch / Specialisation :</b>
                                            </div>
                                            <div class="col-md-8">
                                                {{$info->departments_title}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b>Enrollment No. :</b>
                                            </div>
                                            <div class="col-md-8">
                                                {{$info->enrollment_no}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b>Enrollment Date :</b>
                                            </div>
                                            <div class="col-md-8">
                                                {{$info->enrollment_date}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b>Registration No. :</b>
                                            </div>
                                            <div class="col-md-8">
                                                {{ $info->registration_no != null ? $info->registration_no : '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b> Registration Date :</b>
                                            </div>
                                            <div class="col-md-8">
                                                {{ $info->registration_date != null ? $info->registration_date : '-' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b>Title of Ph.D work :</b>
                                            </div>
                                            <div class="col-md-8">
                                                {{$info->topic_of_phd_work}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b> Name of the Present Research Supervisor :</b>
                                            </div>
                                            <div class="col-md-8">
                                                {{ $details->first_name . ' ' . $details->last_name }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b>Name of the Proposed Research Supervisor :</b>
                                            </div>
                                            <div class="col-md-8 text-capitalize">
                                                {{$pro_sup->first_name . ' ' . $pro_sup->last_name}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b> Name of the Present Research Co-Supervisor :</b>
                                            </div>
                                            <div class="col-md-8">
                                                {{ $pre_cosup->first_name != null ? $pre_cosup->first_name . ' ' . $pre_cosup->last_name : '-' }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b>Name of the Proposed Research Co-Supervisor :</b>
                                            </div>
                                            <div class="col-md-8">
                                                {{ $pro_cosup->first_name != null ? $pro_cosup->first_name . ' ' . $pro_cosup->last_name : '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b> Is Proposed supervisor/ co-supervisor an approved supervisor of
                                                    BPUT:</b>
                                            </div>
                                            <div class="col-md-8">
                                                @if($details->approved_by_bput == 'on')
                                                Yes
                                                @else
                                                No
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <b>Copy of Recognisation Letter :</b>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="col-md-4 mb-3">
                                                    <span><a href="javascript:void(0);"
                                                            onclick="upload_image_view('{{ $details->recognisation_letter }}')"
                                                            title="View DSC Letter">
                                                            View Recognisation Letter
                                                        </a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="{{ url("/phdstudent/dashboard") }}" class="btn btn-purple waves-effect waves-light me-1">
                                    BACK</a>
                            </div>
                           
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end row -->
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
