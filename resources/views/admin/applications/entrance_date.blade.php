@extends('admin.layouts.app')
@section('heading', 'PHD Entrance Date & Time')
@section('sub-heading', 'PHD Entrance Date & Time')
@section('content')

    <div class="row">
        <div class="card">
            <div class="card-body">
                
                @if($exam_date->isEmpty())
                <form action="{{ route('stu.entrance-exam-date-submit') }}" method="post" id="myForm"
                    enctype="multipart/form-data" class="">
                    @csrf
                    <table class="table-centered table-nowrap mt-3 table table-sm table-borderless">
                        <tr>
                            <th>SL. No.</th>
                            <th>Subject Name</th>
                            <th>Exam Date</th>
                            <th>Sitting</th>
                            <th>Time</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td><input class="form-control" type="text" name="subject_name[]" value="Research Methodology"
                                    readonly /></td>
                            <td><input class="form-control" type="date" name="exam_date[]" required/></td>
                            <td><input class="form-control" type="text" name="sitting[]" value="1st" readonly /></td>
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="time" name="from_time[]" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="time" name="to_time[]"required />
                                    </div>
                                </div>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td><input class="form-control" type="text" name="subject_name[]" value="Branch Subject"
                                    readonly /></td>
                            <td><input class="form-control" type="date" name="exam_date[]" required/></td>
                            <td><input class="form-control" type="text" name="sitting[]" value="2nd" readonly /></td>
                            <td style="width: 30%">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="time" name="from_time[]" required/>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="time" name="to_time[]" />
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary sbmt">Submit</button>
                    </div>
                </form>
                @else
                <div class="{{ $exam_date != '' ? 'd-block' : 'd-none' }}">
                    <table class="table-centered table-nowrap mt-3 table table-sm table-borderless">
                        <tr>
                            <th>SL. No.</th>
                            <th>Subject Name</th>
                            <th>Exam Date</th>
                            <th>Sitting</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($exam_date as $key => $val)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $val->subject_name }}</td>
                                <td>{{ $val->exam_date }}</td>
                                <td>{{ $val->sitting }}</td>
                                <td>{{ $val->exam_time }}</td>
                                <td><button id="edit_exam" type="button" data-bs-toggle="modal"
                                        data-bs-target="#edit_exam_modal" data-id="{{ $val->id }}"
                                        class="btn-sm btn-info btn-bordered rounded-pill waves-effect waves-light">Edit</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div id="edit_exam_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <form action="javascript:void(0)" id="exam_date_edit_form" name="exam_date_edit_form" method="POST">
            @csrf
            <div class="modal-dialog" style="max-width:750px">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Exam Date</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="edit_name" class="form-label">Subject Name</label>
                                    <input type="hidden" id="edit_exam_id"  name="exam_id">
                                    <input type="text" class="form-control edit_name" id="edit_subject_name"
                                        placeholder="" name="edit_subject_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="edit_name" class="form-label">Exam Date</label>
                                    <input type="date" class="form-control edit_name" id="edit_exam_date" placeholder=""
                                        name="edit_exam_date" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="edit_name" class="form-label">Sitting</label>
                                    <input type="text" class="form-control edit_name" id="edit_exam_sitting"
                                        placeholder="" name="edit_exam_sitting" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="edit_name" class="form-label">Exam Time(From-To)</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="time" class="form-control edit_name" id="edit_from_time"
                                            placeholder="" name="edit_from_time" required>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="time" class="form-control edit_name" id="edit_to_time"
                                            placeholder="" name="edit_to_time" required>
                                    </div>
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
        $("body").on("click", "#edit_exam", function(e) {
            e.preventDefault();
            var id = $(this).attr("data-id");

            $.ajax({
                type: 'get',
                url: "{{ route('stu.entrance-exam-date-edit') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "id": id
                },
                success: function(data) {
                    console.log(data);
                    $('#edit_exam_id').val(data.id);
                    $('#edit_subject_name').val(data.subject_name);
                    $('#edit_exam_date').val(data.exam_date);
                    $('#edit_exam_sitting').val(data.sitting);
                    $('#edit_from_time').val(data.from_time);
                    $('#edit_to_time').val(data.to_time);
                },
                error: function(error) {
                    console.log(error)
                }
            });
        });

        //update exam date
        $('#exam_date_edit_form').on('submit', (e) => {
            let url = "{{ route('stu.entrance-exam-date-update') }}";
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
