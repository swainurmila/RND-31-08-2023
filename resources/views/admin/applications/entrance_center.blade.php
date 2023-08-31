@extends('admin.layouts.app')
@section('heading', 'PHD Entrance Exam Center')
@section('sub-heading', 'PHD Entrance Exam Center')
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('stu.entrance-exam-center-submit') }}" method="post" id="myForm"
                    enctype="multipart/form-data" class="">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label text-uppercase">Department :</label>
                            <select name="department" id="dept-dropdown" class="form-control select2" required>
                                <option value="">Select</option>
                                @foreach ($programmes as $programme)
                                    <option value="{{ $programme->id }}">{{ $programme->program }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-uppercase">Branch :</label>
                            <select class="form-control select2" id="branch-dropdown" name="branch[]" multiple>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label text-uppercase">Location :</label>
                            <div class="div_R">
                                <select class="form-control" name="exam_location" id="exam_location" required>
                                    <option value="">Select</option>
                                    <option value="Bhubaneswar">Bhubaneswar</option>
                                    <option value="Berhampur">Berhampur</option>
                                    <option value="Rourkela">Rourkela</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-8">
                            <label class="form-label text-uppercase">Exam Center :</label>
                            <input type="text" class="form-control" name="exam_center" placeholder="Enter Exam Center" required>
                        </div>
                    </div>
                    <div class="col-sm-12 text-center">
                        <button id="" type="submit"
                            class="btn btn-primary waves-effect waves-light me-1">Submit</button>
                    </div>
            </div>
            </form>

            <table class="table-centered table-nowrap mt-3 table table-sm table-borderless">
                <tr>
                    <th>SL. No.</th>
                    <th class="text-uppercase">Department</th>
                    <th class="text-uppercase">Branch</th>
                    <th class="text-uppercase">Loacation</th>
                    <th class="text-uppercase">Exam Center</th>
                    {{-- <th class="text-uppercase">Action</th> --}}
                </tr>
                @foreach($exam_center as $key=>$value)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$value->program}}</td>
                    <td>{{$value->departments_title}}</td>
                    <td>{{$value->exam_location}}</td>
                    <td>{{$value->exam_center}}</td>
                    {{-- <td><button id="edit_exam" type="button" data-bs-toggle="modal"
                        data-bs-target="#edit_exam_modal" data-id="{{ $value->id }}"
                        class="btn-sm btn-info btn-bordered rounded-pill waves-effect waves-light">Edit</button>
                </td> --}}
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    </div>
    <div id="edit_exam_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <form action="javascript:void(0)" id="exam_date_edit_form" name="exam_date_edit_form" method="POST">
            @csrf
            <div class="modal-dialog" style="max-width:750px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Exam Center</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="edit_name" class="form-label">Department</label>
                                    <input type="hidden" id="edit_exam_id"  name="center_id">
                                    <input type="hidden" id="edit_dept_id" name='dept_id'>
                                    <input type="hidden" id="edit_branch_id" name='branch_id'>
                                    <input type="text" class="form-control edit_name" id="edit_department"
                                        placeholder="" name="edit_department" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="edit_name" class="form-label">Branch</label>
                                    <input type="text" class="form-control edit_name" id="edit_branch" placeholder=""
                                        name="edit_branch" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="edit_name" class="form-label">Location</label>
                                    <input type="text" class="form-control edit_name" id="edit_exam_location"
                                        placeholder="" name="edit_exam_location" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="edit_name" class="form-label">Center</label>
                                    <input type="text" class="form-control edit_name" id="edit_exam_center"
                                        placeholder="" name="edit_exam_center" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="update_exam" type="submit"
                            class="btn btn-info waves-effect waves-light">Update</button>
                        <button type="button" class="btn btn-secondary waves-effect"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            // Initialize Select2 for multi-select
            $('#branch-dropdown').select2({
                placeholder: 'Select Course',
                // You can add more options and customize behavior as needed
            });

            $('#dept-dropdown').on('change', function(e) {
                e.preventDefault();
                $("#branch-dropdown").html('');
                var programmes_id = this.value;

                $.ajax({
                    type: 'post',
                    url: "{{ route('get_branch') }}",
                    data: {
                        programmes_id: programmes_id,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(data) {
                        $("#branch-dropdown").append('<option value="">Select Course</option>');
                        $.each(data, function(key, value) {
                            $("#branch-dropdown").append('<option value=' + value.id +
                                '>' + value.departments_title + '</option>');
                        });
                    }
                });
            });
        });
    </script>
     <script>
        $("body").on("click", "#edit_exam", function(e) {
            e.preventDefault();
            var id = $(this).attr("data-id");

            $.ajax({
                type: 'get',
                url: "{{ route('stu.entrance-exam-center-edit') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "id": id
                },
                success: function(data) {
                    console.log(data);
                    $('#center_id').val(data.id);
                    $('#edit_department').val(data.program);
                    $('#edit_branch').val(data.departments_title);
                    $('#edit_dept_id').val(data.program_id);
                    $('#edit_branch_id').val(data.department_id);
                    $('#edit_exam_location').val(data.exam_location);
                    $('#edit_exam_center').val(data.exam_center);
                },
                error: function(error) {
                    console.log(error)
                }
            });
        });

        //update exam date
        $('#exam_date_edit_form').on('submit', (e) => {
            let url = "{{ route('stu.entrance-exam-center-update') }}";
            $.ajax({
                url: url,
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: $("#exam_date_edit_form").serialize(),
                cache: false,
                processData: false,
                beforeSend: function(b) {
                    $('#update_exam').addClass('disabled');
                },
                success: function(data) {
                    console.log(data);
                    $('#exam_date_edit_form').hide();
                    window.location.reload();
                },
                error: function(error) {
                    console.log(error)
                }
            });
        });
    </script>
@endsection
