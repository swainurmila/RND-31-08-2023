@extends('admin.layouts.app')
@section('content')
@section('heading', 'PHD Entrance Selection')
@section('sub-heading', 'PHD Entrance Selection')
<style>
    table {
        font-size: 13px;
    }

    .stu_eligible:disabled {
        accent-color: blue;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{route('stu.entrance-selection-filter')}}" class="comm_frm">
                    @csrf
                    <div class="panel-heading mb-3">
                        <div class="row" style="margin-top: 17px;">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label text-uppercase">Department :</label>
                                            <select name="department" id="dept-dropdown" class="form-control select2">
                                                <option value="">Select</option>
                                                @foreach ($programmes as $programme)
                                                    <option value="{{ $programme->id }}">{{ $programme->program }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label class="form-label text-uppercase">Branch :</label>
                                            <select class="form-control select2" id="branch-dropdown" name="branch">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2" style="margin-top: 25px;">
                                    <button type="submit" id="filter" class="btn btn-info btn-sm">Filter</button>
                                    <a href="{{route('stu.entrance-exam-selection')}}"><button type="button" id="refresh"
                                            class="btn btn-warning btn-sm">Refresh</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-hover m-0 table-centered  nowrap w-100" cellspacing="0" id="dataTable">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Referrence Number</th>
                            <th>Student Name</th>
                            <th>Department</th>
                            <th>Branch</th>
                            <th>Preferred Location</th>
                            <th>Action</th>
                            <th>Center code/ Remarks</th>
                            <th>Submit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entrance_data as $key => $val)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td >{{ $val->registration_no }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->program }}</td>
                                <td>{{ $val->departments_title }}</td>
                                <td>{{ $val->exam_center }}</td>
                                <td style="width: 15%">
                                    <span><input type="radio" class="stu_eligible"
                                            name="stu_select_{{ $key }}"
                                            value="2"{{ $val->is_selected == '2' ? 'checked ' : '' }}
                                            id="entrance_select{{ $key }}"
                                            onchange="action(this.value, {{ $key }});"
                                            data-id="{{ $key }}"></span>
                                    <span><label for="html">Eligible</label></span></span><br>
                                    <span><input type="radio" class="stu_eligible"
                                            name="stu_select_{{ $key }}"
                                            value="1"{{ $val->is_selected == '1' ? 'checked ' : '' }}
                                            id="entrance_select{{ $key }}"
                                            onchange="action(this.value, {{ $key }});"
                                            data-id="{{ $key }}"></span>
                                    <span><label for="html">Exempted</label></span><br>
                                    <span><input type="radio" class="stu_eligible"
                                            name="stu_select_{{ $key }}"
                                            value="3"{{ $val->is_selected == '3' ? 'checked ' : '' }}
                                            id="entrance_select" onchange="action(this.value, {{ $key }});"
                                            data-id="{{ $key }}"></span>
                                    <span><label for="html">Not Eligible</label></span>
                                </td>
                                <td style="width: 30%">
                                    @if ($val->is_selected == 0)
                                        <div id="eligible-dropdown-{{ $key }}" class="d-none">
                                            <label class="form-label text-uppercase">Exam Center
                                                :</label>
                                            <select name="entrance_center"
                                                id="entrance_center_select_{{ $val->id }}"
                                                class="form-control select2" required>
                                                <option value="">Select</option>
                                                @foreach ($entrance_center as $value)
                                                    <option value="{{ $value->id }}">
                                                        {{ $value->exam_center }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div id="exempted-remark-{{ $key }}" class="d-none">
                                            <label class="form-label text-uppercase">Admin Remark For
                                                Exempted
                                                :</label>
                                            <textarea name="exempted_remark" id="exempted_remark_{{ $val->id }}" class="form-control" cols="30"
                                                rows="2" placeholder="Enter Exampted Remark Here..." value="" required></textarea>
                                        </div>
                                        <div id="not-eligible-remark-{{ $key }}" class="d-none">
                                            <label class="form-label text-uppercase">Admin Remark for
                                                Not-Eligible :</label>
                                            <textarea name="not_eligible_remark" id="not_eligible_remark_{{ $val->id }}" class="form-control" cols="30"
                                                rows="2" placeholder="Enter Remark for Not Eligible Student..." value="" required></textarea>
                                        </div>
                                    @elseif($val->is_selected == 2)
                                        {{ $val->exam_center_code }}
                                    @elseif($val->is_selected == 1)
                                        {{ $val->admin_remark }}
                                    @elseif($val->is_selected == 3)
                                        {{ $val->admin_remark }}
                                    @else
                                    @endif
                                </td>
                                <td>
                                    @if ($val->is_selected == 0)
                                        <button id="entrance-submit{{ $val->id }}" type="submit"
                                            onclick="submitForm({{ $val->id }})"
                                            class="btn-sm btn-danger waves-effect">Submit</button>
                                    @else
                                        <button id="entrance-submit{{ $val->id }}" type="submit"
                                            class="btn-sm btn-success waves-effect" disabled>Submitted</button>
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
{{-- <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="custom-accordion">
                    <div class="mt-4">
                        <div class="collapse show" id="taskcollapse1">
                            <div class="table-responsive mt-3">
                                <div class="table-responsive">
                                    <table class="table table-hover m-0 table-centered  nowrap w-100" cellspacing="0" id="dataTable">
                                        <thead class="table-light">
                                            <tr>
                                                <th rowspan="2">#</th>
                                                <th rowspan="2">Referrence Number</th>
                                                <th rowspan="2">Student Name</th>
                                                <th rowspan="2">Department</th>
                                                <th rowspan="2">Branch</th>
                                                <th>Action</th>
                                                <th rowspan="2">Center code/ Remarks</th>
                                                <th rowspan="2">Submit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($entrance_data as $key => $val)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $val->registration_no }}</td>
                                                    <td>{{ $val->name }}</td>
                                                    <td>{{ $val->program }}</td>
                                                    <td>{{ $val->departments_title }}</td>
                                                    <td style="width: 15%">
                                                        <span><input type="radio" class="stu_eligible"
                                                                name="stu_select_{{ $key }}" value="2"
                                                                id="entrance_select{{ $key }}"
                                                                onchange="action(this.value, {{ $key }});"
                                                                data-id="{{ $key }}"></span>
                                                        <span><label for="html">Eligible</label></span></span><br>
                                                        <span><input type="radio" class="stu_eligible"
                                                                name="stu_select_{{ $key }}" value="1"
                                                                id="entrance_select{{ $key }}"
                                                                onchange="action(this.value, {{ $key }});"
                                                                data-id="{{ $key }}"></span>
                                                        <span><label for="html">Exempted</label></span><br>
                                                        <span><input type="radio" class="stu_eligible"
                                                                name="stu_select_{{ $key }}" value="3"
                                                                id="entrance_select"
                                                                onchange="action(this.value, {{ $key }});"
                                                                data-id="{{ $key }}"></span>
                                                        <span><label for="html">Not Eligible</label></span>
                                                    </td>
                                                    <td style="width: 30%">
                                                        <div id="eligible-dropdown-{{ $key }}" class="d-none">
                                                            <label class="form-label text-uppercase">Exam Center
                                                                :</label>
                                                            <select name="entrance_center"
                                                                id="entrance_center_select_{{ $val->id }}"
                                                                class="form-control select2">
                                                                <option value="">Select</option>
                                                                @foreach ($entrance_center as $value)
                                                                    <option value="{{ $value->id }}">
                                                                        {{ $value->exam_center }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div id="exempted-remark-{{ $key }}" class="d-none">
                                                            <label class="form-label text-uppercase">Admin Remark For
                                                                Exempted
                                                                :</label>
                                                            <textarea name="exempted_remark" id="exempted_remark_{{ $val->id }}" class="form-control" cols="30"
                                                                rows="2" placeholder="Enter Exampted Remark Here..." value="" required></textarea>
                                                        </div>
                                                        <div id="not-eligible-remark-{{ $key }}"
                                                            class="d-none">
                                                            <label class="form-label text-uppercase">Admin Remark for
                                                                Not-Eligible :</label>
                                                            <textarea name="not_eligible_remark" id="not_eligible_remark_{{ $val->id }}" class="form-control" cols="30"
                                                                rows="2" placeholder="Enter Remark for Not Eligible Student..." value="" required></textarea>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if ($val->is_selected == 0)
                                                            <button id="entrance-submit{{ $val->id }}"
                                                                type="submit"
                                                                onclick="submitForm({{ $val->id }})"
                                                                class="btn-sm btn-danger waves-effect">Submit</button>
                                                        @else
                                                            <button id="entrance-submit{{ $val->id }}"
                                                                type="submit" class="btn-sm btn-success waves-effect"
                                                                disabled>Submitted</button>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection
@section('js')

<script>
    function action(val, key) {

        if (val == 2) {
            $("#eligible-dropdown-" + key).removeClass('d-none');
            $('#exempted-remark-' + key).addClass('d-none');
            $('#not-eligible-remark-' + key).addClass('d-none');
        } else if (val == 1) {
            $("#eligible-dropdown-" + key).addClass('d-none');
            $('#exempted-remark-' + key).removeClass('d-none');
            $('#not-eligible-remark-' + key).addClass('d-none');
        } else {
            $('#not-eligible-remark-' + key).removeClass('d-none');
            $("#eligible-dropdown-" + key).addClass('d-none');
            $('#exempted-remark-' + key).addClass('d-none');
        }
    }

    function submitForm(d) {
        //alert(d);

        var id = d;
        var entrance_select = $(".stu_eligible:checked").val();
        var center = $('#entrance_center_select_' + id).val();
        var exempted_remark = $('#exempted_remark_' + id).val();

        var not_eligible_remark = $('#not_eligible_remark_' + id).val();

        //console.log(exempted_remark);
        $.ajax({
            type: 'post',
            url: "{{ route('stu.entrance-exam-selection-submit') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "entrance_select": entrance_select,
                "center": center,
                "exempted_remark": exempted_remark,
                "not_eligible_remark": not_eligible_remark
            },
            dataType: 'json',
            beforeSend: function() {},
            success: function(responsedata) {
                console.log(responsedata.success);
                setInterval('location.reload()', 1000);
                //$('#submit').prop('disabled', true);
            }

        });
    }
</script>
<script>
    $(document).ready(function() {
        // Initialize Select2 for multi-select
        $('#branch-dropdown').select2({
            placeholder: 'Select',
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
                    $("#branch-dropdown").append('<option value="">Select</option>');
                    $.each(data, function(key, value) {
                        $("#branch-dropdown").append('<option value=' + value.id +
                            '>' + value.departments_title + '</option>');
                    });
                }
            });
        });
    });
</script>
@endsection
