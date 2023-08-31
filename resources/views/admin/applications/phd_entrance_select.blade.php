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
   
    .modal-body .container{background: red;}
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('stu.entrance-selection-filter') }}" class="comm_frm">
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
                                                    <option value="{{ $programme->id }}">{{ $programme->program }}
                                                    </option>
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
                                    <a href="{{ route('stu.entrance-exam-selection') }}"><button type="button"
                                            id="refresh" class="btn btn-warning btn-sm">Refresh</button></a>
                                </div>
								<div class="col-md-2" style="margin-top: 25px;">
								<h4> <a href= {{route('stu.entrance-remainder-mail')}}>
								<button class="btn-sm btn-success waves-effect">
									PUBLISH
								</button>
								</a></h4></div>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-hover m-0 table-centered  nowrap w-100" cellspacing="0" id="dataTable"
                > 
				{{-- <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">--}}
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Referrence Number</th>
                            <th>Student Name</th>
                            <th>Department</th>
                            <th>Branch</th>
                            <th>Preferred Location</th>
                            <th>Roll No.</th>
                            <th>Action</th>
                            <th>Center code/ Remarks</th>
                            <th>Submit</th>
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
                                <td>{{ $val->exam_center }}</td>
                                <td>{{ $val->entrance_roll_no ? $val->entrance_roll_no : '---' }}</td>
                                <td style="width: 15%">
                                    <span><input type="radio" class="stu_eligible"
                                            name="stu_select_{{ $val->id }}"
                                            value="2"{{ $val->is_selected == '2' ? 'checked ' : '' }}
                                            id="entrance_select{{ $val->id }}"
                                            onchange="action(this.value, {{ $key }});"
                                            data-id="{{ $key }}"></span>
                                    <span><label for="html">Eligible</label></span></span><br>
                                    <span><input type="radio" class="stu_eligible"
                                            name="stu_select_{{ $val->id }}"
                                            value="1"{{ $val->is_selected == '1' ? 'checked ' : '' }}
                                            id="entrance_select{{ $val->id }}"
                                            onchange="action(this.value, {{ $key }});"
                                            data-id="{{ $key }}"></span>
                                    <span><label for="html">Exempted</label></span><br>
                                    <span><input type="radio" class="stu_eligible"
                                            name="stu_select_{{ $val->id }}"
                                            value="3"{{ $val->is_selected == '3' ? 'checked ' : '' }}
                                            id="entrance_select{{ $val->id }}"
                                            onchange="action(this.value, {{ $key }});"
                                            data-id="{{ $key }}"></span>
                                    <span><label for="html">Not Eligible</label></span>
                                </td>
                                <td style="width: 30%">
                                    @if ($val->is_selected == 0)
                                        <div id="eligible-dropdown-{{ $key }}" class="d-none">
                                            <label class="form-label text-uppercase">Exam Center
                                                :</label>
                                            <textarea name="entrance_center" id="entrance_center_select_{{ $val->id }}" class="form-control" cols="30"
                                                rows="2" readonly>{{ $val->center_name }}</textarea>
                                        </div>
                                        <div id="exempted-remark-{{ $key }}" class="d-none">
                                            <label class="form-label text-uppercase">Exam Center
                                                :</label>
                                            <textarea name="entrance_center" id="entrance_center_select_{{ $val->id }}" class="form-control" cols="30"
                                                rows="2" readonly>{{ $val->center_name }}</textarea>
                                        </div>
                                        <div id="not-eligible-remark-{{ $key }}" class="d-none">
                                            <label class="form-label text-uppercase">Admin Remark for
                                                Not-Eligible :</label>
                                            <textarea name="not_eligible_remark" id="not_eligible_remark_{{ $val->id }}" class="form-control" cols="30"
                                                rows="2" placeholder="Enter Remark for Not Eligible Student..." value="" required></textarea>
                                        </div>
                                    @elseif($val->is_selected == 2)
                                        <label class="form-label text-uppercase">Exam Center
                                            :</label><br>
                                        {{ $val->exam_center_code }}
                                    @elseif($val->is_selected == 1)
                                        <label class="form-label text-uppercase">Exam Center
                                            :</label><br>
                                        {{ $val->exam_center_code }}
                                    @elseif($val->is_selected == 3)
                                        <label class="form-label text-uppercase">Admin Remark for
                                            Not-Eligible :</label><br>
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
                                    @if ($val->is_selected == 2 || $val->is_selected == 1)
                                        <a href="javascript:void(0);"
                                            onclick="upload_image_view('{{ route('phdentrance-admit-card', $val->id) }}')"
                                            title="View NCR Payment Receipt" class="btn-sm btn-pink m-1" >
                                            Admit Card
                                        </a>
                                        {{-- <a class="btn-sm btn-purple m-1"
                                            download="{{ $val->registration_no }}.admit-card.{{ date('Y') }}.html"
                                            href="{{ route('phdentrance-admit-card', $val->id) }}"
                                            title="Download admit card"><i class="fa fa-download"></i></a> --}}
                                            <a class="btn-sm btn-purple m-1"
                                            href="{{ route('phdentrance-admit-card', $val->id) }}"
                                            title="Download admit card"><i class="fa fa-download"></i></a>
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
            '" frameborder="0" width="100%" id="view_upload_image" height="800px">');
            //$('.admit-view .card-body .container').addClass('das');
        $('#upload_image_view').modal('show');
        
    }
</script>
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
        //alert(d);entrance_select

        var id = d;
        var entrance_select = $("input[name='stu_select_" + id + "']:checked").val();
        var center = $('#entrance_center_select_' + id).val();
        // var exempted_remark = $('#exempted_remark_' + id).val();

        var not_eligible_remark = $('#not_eligible_remark_' + id).val();

        console.log(entrance_select);
        $.ajax({
            type: 'post',
            url: "{{ route('stu.entrance-exam-selection-submit') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "entrance_select": entrance_select,
                "center": center,
                // "exempted_remark": exempted_remark,
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
    
		$('#datatable-buttons').DataTable({
			lengthChange: false,
			//responsive: true,
			dom: 'Bfrtip',
			buttons: ['copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'],
			buttons: [
			    'copy', 'csv', 'excel', 'pdf', 'print'
			],
			"language": {
				"paginate": {
					"previous": "<i class='mdi mdi-chevron-left'>",
					"next": "<i class='mdi mdi-chevron-right'>"
				}
			},
			"drawCallback": function () {
				$('.dataTables_paginate > .pagination').addClass('pagination-rounded');
			}
		});

	
	});
</script>

@endsection
