@extends('admin.layouts.app')
@section('heading', 'DSC Recommendation')
@section('sub-heading', 'DSC Recommendation')
@section('content')
<style>
     table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 30px;
        }
        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 15px;
        }

</style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <!-- Logo & title -->
                    <h4 class="text-center mb-3">Recommendation Of the Research Supervisor</h4>
                    <table>
                        <tr>
                            <th>Name Of Scholar : {{ $student_sem_detaills->name}}</th>
                            <th>Enorollmetn NO {{ $student_sem_detaills->enrollment_no}}</th>
                            <th>Enrollment Date {{ $student_sem_detaills->enrollment_date}}</th>
                        </tr>
                        <tr>
                            <td colspan="3">
                                Certified that the student has fulfilled the residential requirement in the preceding semester and the performance and progress of the Research Student is : Satisfactory / Not Satisfactory
                            </td>
                        </tr>
                        <tr>
                            <th>Signature of Research Supervisor</th>
                            <th>Signature of Head the NCR</th>
                            <th>Signature of Research Co-supervisor</th>
                        </tr>
                        <tr>
                            <td> &nbsp; </td>
                            <td>&nbsp; </td>
                            <td>&nbsp; </td>
                        </tr>
                    </table>

                    <hr>

                    <h4 class="text-center">Recommendation Of DSC</h4>

                    <table>
                        <tr>
                            <td colspan="3">The student has delivered the six monthly progress seminar in an open seminar at the NCR in our presence on the progress made in last semester and Recommendation for semester Registration.</td>
                        </tr>
                        <tr>
                            <th colspan="3" >Signature of Members, DSC</th>
                        </tr>
                        <tr>
                            <td>-------------------</td>
                            <td>-------------------</td>
                            <td>-------------------</td>
                        </tr>
                        <tr>
                            <th colspan="3" >Signature of Members, DSC</th>
                        </tr>
                        <tr>
                            <td>-------------------</td>
                            <td>-------------------</td>
                            <td>-------------------</td>
                        </tr>
                    </table>

                    



                    

                    

                    <div class="mt-4 mb-1">
                        <div class="text-end d-print-none">
                            <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light me-1"><i
                                    class="mdi mdi-printer me-1"></i> Print</a>
                            {{-- <a href="#" class="btn btn-success waves-effect waves-light">Submit</a> --}}
                        </div>
                    </div>
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
    <!-- end row -->

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
