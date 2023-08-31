@extends('admin.layouts.app')
@section('content')
@section('heading', strtoupper($page_title))
@section('sub-heading', 'View Applications')
<style>
    span.value {
        font-size: 14px;
        color: #fd3995;
    }

    span.fix {

        color: #000000;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-tag font-24"></i>
                                <h3>{{ $app_status['applied'] }}</h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Applied Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-archive font-24"></i>
                                <h3 class="text-warning">{{ $app_status['pending'] }}</h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Pending Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-shield font-24"></i>
                                <h3 class="text-success">{{ $app_status['approved'] }}</h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Approved Application</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="py-1">
                                <i class="fe-delete font-24"></i>
                                <h3 class="text-danger">{{ $app_status['rejected'] }}</h3>
                                <p class="text-uppercase mb-1 font-13 fw-medium">Rejected Application</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <a type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target="#con-close-modal">
                            <i class='mdi mdi-layers-plus me-1'></i>Add NCR User
                        </a>
                    </div>
                </div>
                <table class="table table-hover m-0 table-centered  nowrap w-100" cellspacing="0" id="dataTable">
                    <thead class="bg-light">
                        <th class="text-uppercase">Sl. No.</th>
                        <th class="text-uppercase">name</th>
                        {{-- <th class="text-uppercase">Nodal Center</th> --}}
                        <th class="text-uppercase">Department</th>
                        <th class="text-uppercase">Designation</th>
                        {{-- <th class="text-uppercase">Address</th>
                        <th class="text-uppercase">Contact No</th>
                        <th class="text-uppercase">email</th> --}}
                        <th class="text-uppercase">Status</th>
                        <th class="text-uppercase">User type</th>
                        <th class="text-uppercase">Expert Status</th>
                        <th class="text-uppercase">Action</th>
                    </thead>

                    <tbody class="font-14">
                        @foreach ($professors as $key => $value)
                            <tr>
                                <td class="text-capitalize">{{ ++$key }}</td>
                                <td class="text-capitalize">{{ $value['professor_name'] }}</td>
                                {{-- <td class="text-capitalize">{{ $value['ncr_name'] }}</td> --}}
                                <td class="text-capitalize">{{ $value['dept_name'] }}</td>
                                <td class="text-capitalize">{{ $value['designation'] }}</td>
                                {{-- <td class="text-capitalize">{{ $value['address'] }}</td>
                                <td class="text-capitalize">{{ $value['contact_no'] }}</td>
                                <td class="text-lowercase">{{ $value['email_id'] }}</td> --}}
                                <td><span
                                        class="badge bg-{{ $value['status_color'] }} text-uppercase">{{ $value['status'] }}</span>
                                </td>
                                <td class="text-uppercase">{{ $value['proffesor_type'] }}</td>
                                <td class="text-uppercase">{{ $value['expert_status'] }}</td>
                                <td class="table-action">
                                    <button id="view_professor" type="button" data-bs-toggle="modal"
                                        data-bs-target="#view_professor_modal_{{ $value['professor_id'] }}"
                                        class="btn btn-success btn-bordered rounded-pill waves-effect waves-light">View</button>
                                    <button id="edit_professor" type="button" data-bs-toggle="modal"
                                        data-bs-target="#edit_professor_modal" data-id="{{ $value['professor_id'] }}"
                                        class="btn btn-info btn-bordered rounded-pill waves-effect waves-light">Edit</button>
                                    <button type="button" id="delete_professor" data-id="{{ $value['professor_id'] }}"
                                        class="btn btn-pink btn-bordered rounded-pill waves-effect waves-light delete_professor"
                                        onclick="deleteProfessor({{ $value['professor_id'] }})><i
                                            class="glyphicon
                                        glyphicon-trash"></i> Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div><!-- end col -->
</div>

{{-- Add Modal started --}}
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <form action="javascript:void(0)" id="professor_add_form" name="professor_add_form" method="POST">
        @csrf
        <div class="modal-dialog" style="max-width:750px">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Professor Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="add_name" class="form-label">Name</label>
                                <input type="text" class="form-control add_name" id="add_name"
                                    placeholder="John dow" name="add_name" pattern="^[A-Za-z ]+$" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="add_dept_id" class="form-label">Department</label>
                                <select name="add_dept_id" id="add_dept_id" class="form-control add_dept_id"
                                    required>
                                    <option value="">Choose department</option>
                                    @foreach ($department as $item)
                                        <option value="{{ $item->id }}">{{ $item->departments_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="add_designation" class="form-label">Designation</label>
                                <select name="add_designation" id="add_designation"
                                    class="form-control add_designation" required>
                                    <option value="">Choose designation</option>
                                    <option value="1">Professor</option>
                                    <option value="2">Associate Professor</option>
                                    @if (!in_array(3, $designation))
                                        <option value="3">Chairperson</option>
                                    @endif
                                    @if (!in_array(4, $designation))
                                        <option value="4">Co Chairperson</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="add_address" class="form-label">Address</label>
                                <textarea name="add_address" id="add_address" class="form-control add_address" cols="30" rows="2"
                                    placeholder="Type address here" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="add_contact_no" class="form-label">Contact No</label>
                                <input type="number" class="form-control add_contact_no" id="add_contact_no"
                                    placeholder="8888888888" name="add_contact_no" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="add_email_id" class="form-label">Email</label>
                                <input type="email" class="form-control add_email_id" id="add_email_id"
                                    placeholder="abc@mail.com" name="add_email_id" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="add_password" class="form-label">Password</label>
                                <input type="password" class="form-control add_password" id="add_password"
                                    placeholder="********" name="add_password" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="add_status" class="form-label">Status: </label>
                                </div>
                                {{-- <select class="form-control add_status" id="add_status" name="add_status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select> --}}
                                <div class="col-md-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input add_status" type="radio" name="add_status"
                                            id="add_status" value="0">
                                        <label class="form-check-label" for="add_status">Inactive</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input add_status" type="radio" name="add_status"
                                            id="add_status" value="1">
                                        <label class="form-check-label" for="add_status">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="add_proffesor_type" class="form-label">Type: </label>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input add_proffesor_type" type="radio"
                                            name="add_employee_type" id="add_proffesor_type" value="0">
                                        <label class="form-check-label" for="add_proffesor_type">Internal</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input add_proffesor_type" type="radio"
                                            name="add_employee_type" id="add_proffesor_type" value="1">
                                        <label class="form-check-label" for="add_proffesor_type">External</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="add_expert_status" class="form-label">Expert Status: </label>
                                </div>

                                {{-- <select class="form-control add_expert_status" id="add_expert_status"
                                    name="add_expert_status" required>
                                    <option value="1">Expert</option>
                                    <option value="0">Inexpert</option>
                                </select> --}}
                                <div class="col-md-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input add_expert_status" type="radio"
                                            name="add_expert_status" id="add_expert_status" value="0">
                                        <label class="form-check-label" for="add_expert_status">Inexpert</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input add_expert_status" type="radio"
                                            name="add_expert_status" id="add_expert_status" value="1">
                                        <label class="form-check-label" for="add_expert_status">Expert</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="add_proffesor" type="submit"
                        class="btn btn-info waves-effect waves-light">Save</button>
                    <button type="button" class="btn btn-secondary waves-effect"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>
{{-- Add Modal Ended --}}

{{-- View Modal Started --}}
@foreach ($professors as $key => $value)
    <div id="view_professor_modal_{{ $value['professor_id'] }}" class="modal fade" tabindex="-1" role="dialog"
        aria-hidden="true" style="display: none;">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View NCR Employee Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-3">
                            <span class="fix">Name:</span>
                        </div>
                        <div class="col-md-6">
                            <span class="value">{{ $value['professor_name'] }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <span class="fix">Nodal Center:</span>
                        </div>
                        <div class="col-md-6">
                            <span class="value">{{ $value['ncr_name'] }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <span class="fix">Department:</span>
                        </div>
                        <div class="col-md-6">
                            <span class="value">{{ $value['dept_name'] }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <span class="fix">Designation:</span>
                        </div>
                        <div class="col-md-6">
                            <span class="value">{{ $value['designation'] }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <span class="fix">Address:</span>
                        </div>
                        <div class="col-md-6">
                            <span class="value">{{ $value['address'] }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <span class="fix">Contact No:</span>
                        </div>
                        <div class="col-md-6">
                            <span class="value">{{ $value['contact_no'] }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <span class="fix">Email:</span>
                        </div>
                        <div class="col-md-6">
                            <span class="value">{{ $value['email_id'] }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <span class="fix">Status :</span>
                        </div>
                        <div class="col-md-6">
                            <span
                                class="badge bg-{{ $value['status_color'] }} text-uppercase">{{ $value['status'] }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <span class="fix">Proffesor Type:</span>
                        </div>
                        <div class="col-md-6">
                            <span class="value">{{ $value['proffesor_type'] }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <span class="fix">Expert Status:</span>
                        </div>
                        <div class="col-md-6" id="view_radio">
                            <span class="value">{{ $value['expert_status'] }}</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-info waves-effect" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
{{-- View Modal Ended --}}

{{-- Edit Modal Ended --}}
<div id="edit_professor_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true"
    style="display: none;">
    <form action="javascript:void(0)" id="professor_edit_form" name="professor_edit_form" method="POST">
        @csrf
        <div class="modal-dialog" style="max-width:750px">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Professor Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_name" class="form-label">Name</label>
                                <input type="text" class="form-control edit_name" id="edit_name" placeholder=""
                                    name="edit_name" required>
                                <input type="hidden" name="edit_professor_id" id="edit_professor_id"
                                    value="" />
                                <input type="hidden" name="edit_ncr_id" id="edit_ncr_id" value="" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_dept_id" class="form-label">Department</label>
                                <select name="edit_dept_id" id="edit_dept_id" class="form-control edit_dept_id">
                                    <option value="">Choose department</option>
                                    @foreach ($department as $item)
                                        <option value="{{ $item->id }}">{{ $item->departments_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_designation" class="form-label">Designation</label>
                                <select name="edit_designation" id="edit_designation"
                                    class="form-control edit_designation">
                                    <option value="">Choose designation</option>
                                    <option value="1">Professor</option>
                                    <option value="2">Associate Professor</option>
                                    <option value="3">Chairperson</option>
                                    <option value="4">Co Chairperson</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_address" class="form-label">Address</label>
                                <textarea name="edit_address" id="edit_address" class="form-control edit_address" cols="30" rows="2"
                                    placeholder="Type address here"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_contact_no" class="form-label">Contact No</label>
                                <input type="text" class="form-control edit_contact_no" id="edit_contact_no"
                                    placeholder="8888888888" name="edit_contact_no" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_email_id" class="form-label">Email</label>
                                <input type="email" class="form-control edit_email_id" id="edit_email_id"
                                    placeholder="abc@mail.com" name="edit_email_id" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="edit_status" class="form-label">Status: </label>
                                </div>
                                {{-- <select class="form-control add_status" id="add_status" name="add_status" required>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select> --}}
                                <div class="col-md-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input edit_status" type="radio" name="edit_status"
                                            id="edit_status" value="0">
                                        <label class="form-check-label" for="edit_status">Inactive</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input edit_status" type="radio" name="edit_status"
                                            id="edit_status" value="1">
                                        <label class="form-check-label" for="edit_status">Active</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="edit_proffesor_type" class="form-label">Type: </label>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input edit_proffesor_type" type="radio"
                                            name="edit_proffesor_type" id="edit_proffesor_type" value="0">
                                        <label class="form-check-label" for="edit_proffesor_type">Internal</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input edit_proffesor_type" type="radio"
                                            name="edit_proffesor_type" id="edit_proffesor_type" value="1">
                                        <label class="form-check-label" for="edit_proffesor_type">External</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="edit_expert_status" class="form-label">Expert Status: </label>
                                </div>

                                {{-- <select class="form-control add_expert_status" id="add_expert_status"
                                    name="add_expert_status" required>
                                    <option value="1">Expert</option>
                                    <option value="0">Inexpert</option>
                                </select> --}}
                                <div class="col-md-3">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input edit_expert_status" type="radio"
                                            name="edit_expert_status" id="edit_expert_status" value="0">
                                        <label class="form-check-label" for="edit_expert_status">Inexpert</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input edit_expert_status" type="radio"
                                            name="edit_expert_status" id="edit_expert_status" value="1">
                                        <label class="form-check-label" for="edit_expert_status">Expert</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="edit_proffesor" type="submit"
                        class="btn btn-info waves-effect waves-light">Update</button>
                    <button type="button" class="btn btn-secondary waves-effect"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
    {{-- Edit Modal Ended --}}
</div>
{{-- Edit Modal Ended --}}
@endsection

@section('js')
<script defer>
    $(document).ready((e) => {

        // Add form ajax
        $('#professor_add_form').on('submit', (e) => {
            let url = "{{ route('nodalcentre.professor.store') }}";
            $.ajax({
                url: url,
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: $("#professor_add_form").serialize(),
                cache: false,
                processData: false,
                beforeSend: function(b) {
                    $('#add_proffesor').addClass('disabled');
                },
                success: function(data) {
                    console.log(data);
                    $('#professor_add_form').hide();
                    window.location.reload();
                },
                error: function(error) {
                    console.log(error)
                }
            });
        });

        $("body").on("click", "#edit_professor", function(e) {
            e.preventDefault();
            var id = $(this).attr("data-id");

            $.ajax({
                type: 'post',
                url: "{{ route('nodalcentre.professor.show') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "id": id
                },
                success: function(data) {
                    console.log(data.data.status);
                    $('#edit_professor_id').val(data.data.id);
                    $('#edit_name').val(data.data.name);
                    $('#edit_ncr_id').val(data.data.ncr_id);
                    $('#edit_dept_id').val(data.data.dept_id);
                    $('#edit_designation').val(data.data.designation);
                    $('#edit_address').val(data.data.address);
                    $('#edit_contact_no').val(data.data.contact_no);
                    $('#edit_email_id').val(data.data.email_id);
                    $('input[name="edit_status"][value="' + data.data.status + '"]').prop(
                        'checked', true);
                    $('input[name="edit_proffesor_type"][value="' + data.data
                        .employee_type + '"]').prop('checked', true);
                    $('input[name="edit_expert_status"][value="' + data.data.expert_status +
                        '"]').prop('checked', true);
                },
                error: function(error) {
                    console.log(error)
                }
            });
        });

        // Update ajax
        $('#professor_edit_form').on('submit', (e) => {
            let url = "{{ route('nodalcentre.professor.update') }}";
            $.ajax({
                url: url,
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: $("#professor_edit_form").serialize(),
                cache: false,
                processData: false,
                beforeSend: function(b) {
                    $('#edit_proffesor').addClass('disabled');
                },
                success: function(data) {
                    console.log(data);
                    $('#professor_edit_form').hide();
                    window.location.reload();
                },
                error: function(error) {
                    console.log(error)
                }
            });
        });

        // Delete form ajax
        $("body").on("click", "#delete_professor", function(e) {
            e.preventDefault();
            var id = $(this).attr("data-id");
            let url = "{{ route('nodalcentre.professor.destroy') }}";
            Swal.fire({
                title: "Do you really want to delete?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Confirm"
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        url: url,
                        method: "POST",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            id: id
                        },
                        success: function(data) {
                            console.log(data);
                        }
                    });
                } else {
                    swal("Cancelled", "Your data is safe :)", "error");
                }
                window.location.reload();
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#add_contact_no').on('input', function() {
            var mobileNumber = $(this).val();

            if (mobileNumber.length > 10) {
                $(this).val(mobileNumber.slice(0, 10)); // Truncate the input to 10 digits
            }
        });
    });
</script>
@endsection
