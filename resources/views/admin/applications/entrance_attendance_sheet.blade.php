@extends('admin.layouts.app')
@section('content')
@section('heading', 'View Applications')
@section('sub-heading', 'View Applications')
<link href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" rel="stylesheet">

<link href="{{ asset('assets/css/button-datatable.css') }}"rel="stylesheet" type="text/css" />

<style>
    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    button.dt-button.buttons-columnVisibility {
        background: rgb(218, 67, 67);
    }

    .dt-buttons .buttons-columnVisibility:hover {
        background: rgb(124, 218, 124) !important;
        color: black;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('export.images') }}" class="btn btn-success">Export Images to Excel</a>

                <div class="table-responsive">
                    <table class="table table-responsive" id="users-table">
                        <thead class="">
                            <tr class="data-row">
                                {{-- <th class="fw-medium --text-uppercase">Status</th> --}}
                                <th class="fw-medium --text-uppercase">Sl. No.</th>
                                <th class="fw-medium --text-uppercase">Roll No.</th>
                                <th class="fw-medium --text-uppercase">Name</th>
                                <th class="fw-medium --text-uppercase">Faculty</th>

                                <th class="fw-medium --text-uppercase ">Specialization</th>
                                <th class="fw-medium --text-uppercase">Photo</th>
                                <th class="fw-medium --text-uppercase">Signature</th>
                                <th class="fw-medium --text-uppercase">Signature of the Applicant</th>
                                <th class="fw-medium --text-uppercase">Signature of the Invigilator</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.1.0/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.colVis.min.js"></script>
<script>
    $(document).ready(function() {
        $('#users-table').DataTable({
            processing: true,
            //serverSide: true,
            ajax: "{{ route('stu.entrance-application') }}",
            dom: 'Bfrtip',
            buttons: [{
                    extend: "excel",
                    text: "Excel",
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                // {
                //     extend: "pdf",
                //     text: "PDF",
                //     exportOptions: {
                //         columns: ':visible'
                //     }
                // },
                {
                    extend: "colvis",
                    text: "Column Visibility"
                },


            ],
            columns: [{
                    data: 'eid',
                    name: 'eid'
                },
                {
                    data: 'entrance_roll_no',
                    name: 'entrance_roll_no'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'program',
                    name: 'program'
                },
                {
                    data: 'departments_title',
                    name: 'departments_title'
                },
                {
                    data: 'photo',
                    name: 'photo',
                    "render": function(data) {
                        var imageUrl = "{{ URL::asset('upload/phd_entrance') }}/" + data;
                        return '<img src="' + imageUrl +
                            '" width="50px"/></a>';
                    }
                },
                {
                    data: 'signature',
                    name: 'signature',
                    "render": function(data) {
                        var imageUrl = "{{ URL::asset('upload/phd_entrance') }}/" + data;
                        return '<img src="' + imageUrl +
                            '" width="50px"/></a>';
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<input type="text" id="dd-no-' + row.id +
                            '" class="form-control dd-no" name="dd_no" value="">';
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return '<input type="text" id="dd-no-' + row.id +
                            '" class="form-control dd-no" name="dd_no" value="">';
                    }
                },

            ],
        });
        $(document).on('click', '.submit-button', function(event) {
            event.preventDefault();
            var id = $(this).data('id');
            //alert(id);
            var entrance_dd_no = $('#dd-no-' + id).val();
            var entrance_dd_date = $('#dd-date-' + id).val();
            var entrance_bank_name = $('#bank-name-' + id).val();
            var entrance_is_document = $(".is_document:checked").val();

            console.log(entrance_bank_name);
            $.ajax({
                type: 'post',
                url: "{{ route('stu.entrance-application-submit') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id,
                    "dd_no": entrance_dd_no,
                    "dd_date": entrance_dd_date,
                    "dd_bank": entrance_bank_name,
                    "entrance_is_document": entrance_is_document,
                },
                dataType: 'json',
                beforeSend: function() {},
                success: function(responsedata) {
                    console.log(responsedata.success);
                    setInterval('location.reload()', 3000);
                    // $('.submit-button').prop('disabled', true);
                }

            });

            // }
        });

    });
</script>
@endsection
