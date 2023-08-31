@include('admin.partials.navigation')
@include('admin.partials.sidebar')
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            @include('admin.partials.breadcrumb')
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <!-- cta -->
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a type="button" class="btn btn-primary waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target="#con-close-modal"><i
                                                    class='mdi mdi-layers-plus me-1'></i>Add User</a>
                                        </div>

                                    </div>



                                    <div class="custom-accordion">
                                        <div class="mt-4">
                                            <h5 class="position-relative mb-0"><a href="#taskcollapse1"
                                                    class="text-dark d-block" data-bs-toggle="collapse">Users <span
                                                        class="text-muted">({{ $user_count }})</span> <i
                                                        class="mdi mdi-chevron-down accordion-arrow"></i></a></h5>
                                            <div class="collapse show" id="taskcollapse1">
                                                <div class="table-responsive mt-3">
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Role</th>
                                                                    <th>Name</th>
                                                                    <th>Email</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($user_role_data as $key => $item)
                                                                    <tr>
                                                                        <th scope="row">{{ ++$key }}</th>
                                                                        <td>{{ $item->role }}</td>
                                                                        <td>{{ $item->name }}</td>
                                                                        <td>{{ $item->email }}</td>
                                                                        <td><button id="edit_user2" type="button"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#edit_user"
                                                                                data-id="{{ $item->id }}"
                                                                                class="btn btn-info btn-bordered rounded-pill waves-effect waves-light">Edit</button>
                                                                            <button
                                                                                onclick="delete_user({{ $item->id }})"
                                                                                id="role_delete" type="button"
                                                                                class="btn btn-pink btn-bordered rounded-pill waves-effect waves-light"><i
                                                                                    class="glyphicon glyphicon-trash"></i>
                                                                                Delete</button>


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
                    </div>
                </div>
            </div> <!-- end row -->
        </div>
    </div>
</div>

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <form action="{{ url()->route('add.user') }}" id="regForm" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Officials</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">name</label>
                                <input type="text" class="form-control" placeholder="name" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">email</label>
                                <input type="email" class="form-control" placeholder="email" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">role</label>
                                <select name="user_role" class="form-control" required>
                                    <option value="">Select User role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select name="user_status" class="form-control">
                                    <option value="">Please select User status</option>
                                    <option selected="selected" value="0">Not Locked</option>
                                    <option value="1">Locked</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label class="form-label">password</label>
                                <input type="password" class="form-control" placeholder="password" name="password"
                                    required>
                            </div>
                        </div>

                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect"
                        data-bs-dismiss="modal">Close</button>
                    <button id="add_role" type="submit" class="btn btn-info waves-effect waves-light">Create
                        User</button>
                </div>
            </div>
        </div>
    </form>
</div><!-- /.modal -->


<div id="edit_user" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <form action="{{ url()->route('update.user') }}" id="regForm" method="POST">
        @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">User Updation</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">name</label>
                                <input type="text" id="user_name" class="form-control" placeholder="name"
                                    name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">email</label>
                                <input type="email" id="user_email" class="form-control" placeholder="email"
                                    name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">role</label>
                                <select name="user_role" id="user_role" class="form-control" required>
                                    <option value="">Select User role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <select id="user_status" name="user_status" class="form-control">
                                    <option value="">Please select User status</option>
                                    <option selected="selected" value="0">Not Locked</option>
                                    <option value="1">Locked</option>
                                </select>
                            </div>
                        </div>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect"
                        data-bs-dismiss="modal">Close</button>
                    <button id="add_role" type="submit" class="btn btn-info waves-effect waves-light">Edit User</button>
                    <input type="hidden" name="hid_id" id="hid_id" value="">
                </div>
            </div>
        </div>
    </form>
</div><!-- /.modal -->







@section('js')
    <script>
        $("body").on("click", "#edit_user2", function(e) {

            //alert('hello2');
            e.preventDefault();
            var id = $(this).attr("data-id");

            //alert(id);
            //console.log(id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'get',
                url: "/admin/edit-user",
                data: {
                    // "_token": "{{ csrf_token() }}",
                    "id": id
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#user_name').val(data.name);
                    $('#user_email').val(data.email);
                    $('#user_role').val(data.role_id);
                    $('#user_status').val(data.status);
                    $('#hid_id').val(data.id);
                }
            });

        });


        function delete_user(id) {

            var url = 'delete-user';
            Swal.fire({
                title: "Do you really want to delete?",
                // text: "Deleted Successfully!",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Confirm"
            }).then(function(result) {
                if (result.value) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });


                    $.ajax({
                        type: 'post',
                        url: url,
                        data: {
                            "id": id
                        },
                        dataType: 'json',
                        beforeSend: function() {},
                        success: function(response) {
                            Swal.fire(
                                'Remind!',
                                'Company Data successfully!',
                                'success'
                            );
                            setInterval('location.reload()', 1000);
                        }
                    });

                } else {
                    swal("Cancelled", "Your data is safe :)", "error");
                }
            });
        }
    </script>
@endsection
