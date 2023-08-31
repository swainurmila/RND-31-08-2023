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
                <div class="table-responsive">
                    <table class="table table-responsive" id="users-table">
                        <thead class="">
                            <tr class="data-row">
                                {{-- <th class="fw-medium --text-uppercase">Status</th> --}}
                                <th class="fw-medium --text-uppercase">Sl. No.</th>
                                <th class="fw-medium --text-uppercase">Reference No.</th>
                                <th class="fw-medium --text-uppercase">Name</th>
                                <th class="fw-medium --text-uppercase">Email</th>
                                <th class="fw-medium --text-uppercase">Mobile No.</th>
                                <th class="fw-medium --text-uppercase">DD No.</th>
                                <th class="fw-medium --text-uppercase">DD Date</th>
                                <th class="fw-medium --text-uppercase">Bank Name</th>
                                <th class="fw-medium --text-uppercase">Present Address</th>
                                <th class="fw-medium --text-uppercase">Permanent Address</th>
                                <th class="fw-medium --text-uppercase">Gender</th>
                                <th class="fw-medium --text-uppercase">Marital Status</th>
                                <th class="fw-medium --text-uppercase">Date of Birth</th>
                                <th class="fw-medium --text-uppercase">Category</th>
                                <th class="fw-medium --text-uppercase">Nationality</th>
                                <th class="fw-medium --text-uppercase">Mother Tongue</th>
                                <th class="fw-medium --text-uppercase">Department</th>
                                <th class="fw-medium --text-uppercase">Branch</th>
                                <th class="fw-medium --text-uppercase">Exam Center</th>
                                <th class="fw-medium --text-uppercase">Action</th>
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
            columns: [
                // {
                //     data: 'status',
                //     name: 'status'
                // },
                {
                    data: 'eid',
                    name: 'eid'
                },
                {
                    data: 'registration_no',
                    name: 'registration_no'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'mobile',
                    name: 'mobile'
                },
                {
                    data: 'dd_no',
                    name: 'dd_no'
                },
                {
                    data: 'dd_date',
                    name: 'dd_date'
                },
                {
                    data: 'dd_bank',
                    name: 'dd_bank'
                },
                {
                    data: 'present_address',
                    name: 'present_address'
                },
                {
                    data: 'permanent_address',
                    name: 'permanent_address'
                },
                {
                    data: 'gender',
                    name: 'gender'
                },
                {
                    data: 'marital_status',
                    name: 'marital_status'
                },
                {
                    data: 'dob',
                    name: 'dob'
                },
                {
                    data: 'category',
                    name: 'category'
                },
                {
                    data: 'nationality',
                    name: 'nationality'
                },
                {
                    data: 'mother_tounge',
                    name: 'mother_tounge'
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
                    data: 'exam_center',
                    name: 'exam_center'
                },
                {
                    data: 'action',
                    name: 'action'
                },
            ],
        });
    });
</script>
@endsection
