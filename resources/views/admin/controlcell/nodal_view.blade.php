@extends('admin.layouts.app')
@section('heading', 'Nodal Centre')
@section('sub-heading', 'Nodal Centre')
@section('content')

    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <div class="row">
                                <div class="col-sm-3">
                                    @if (session('userdata')['role'] == 'admin')
                                    @else
                                        <a type="button" class="btn btn-primary waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target="#con-close-modal"><i
                                                class='mdi mdi-layers-plus me-1'></i>Add nodal</a>
                                    @endif
                                </div>
                            </div>

                            <div class="custom-accordion">
                                <div class="mt-4">
                                    {{-- <h5 class="position-relative mb-0"><a href="#taskcollapse1" class="text-dark d-block"
                                            data-bs-toggle="collapse">Nodals <span
                                                class="text-muted">({{ $nodal_count }})</span> <i
                                                class="mdi mdi-chevron-down accordion-arrow"></i></a></h5> --}}
                                    <div class="collapse show" id="taskcollapse1">
                                        <div class="table-responsive mt-3">
                                            <div class="table-responsive">
                                                <table id="datatable-buttons" class="table mb-0">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>College Name</th>
                                                            <th>Phone</th>
                                                            <th>Enroll Student Count</th>
                                                            @if (session('userdata')['role'] != 'admin')
                                                                <th>Action</th>
                                                            @endif
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($nodal as $key => $item)
                                                            <tr>
                                                                <th scope="row">{{ ++$key }}</th>
                                                                <td>{{ $item->college_name }}</td>
                                                                <td>{{ $item->phone }}</td>
                                                                @php
                                                                    $count = \App\Models\PhdApplicationInfo::where('nodal_id', $item->id)->count();
                                                                @endphp
                                                                <td>{{ $count }}</td>
                                                                @if (session('userdata')['role'] != 'admin')
                                                                    <td><button id="edit_user2" type="button"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#edit_user"
                                                                            data-id="{{ $item->id }}"
                                                                            class="btn btn-info btn-bordered rounded-pill waves-effect waves-light">Edit</button>
                                                                        <button onclick="delete_user({{ $item->id }})"
                                                                            id="role_delete" type="button"
                                                                            class="btn btn-pink btn-bordered rounded-pill waves-effect waves-light"><i
                                                                                class="glyphicon glyphicon-trash"></i>
                                                                            Delete</button>
                                                                    </td>
                                                                @endif
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
    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <form action="{{ route('add.nodal') }}" id="regForm" method="POST">
            @csrf
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Nodal Centre</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">College Name</label>
                                    <input type="text" class="form-control" placeholder="name" name="college_name"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="tel" class="form-control" placeholder="Phone" name="phone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="address" id="" cols="5" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        <button id="add_role" type="submit" class="btn btn-info waves-effect waves-light">Add
                            Nodals</button>
                    </div>
                </div>
            </div>
        </form>
    </div><!-- /.modal -->


    <div id="edit_user" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <form action="{{ route('update.nodal') }}" id="regForm" method="POST">
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
                                    <label class="form-label">College Name</label>
                                    <input type="text" class="form-control" placeholder="College Name"
                                        id="college_name" name="college_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" placeholder="Email" id="email"
                                        name="email" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Phone</label>
                                    <input type="tel" class="form-control" placeholder="Phone" id="phone"
                                        name="phone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea class="form-control" name="address" id="address" cols="5" rows="1" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Update Nodal</button>
                        <input type="hidden" name="hid_id" id="hid_id" value="">
                    </div>
                </div>
            </div>
        </form>
    </div><!-- /.modal -->
@endsection

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
                url: "/control-cell/edit-nodal",
                data: {
                    // "_token": "{{ csrf_token() }}",
                    "id": id
                },
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('#college_name').val(data.college_name);
                    $('#email').val(data.email);
                    $('#phone').val(data.phone);
                    $('#address').val(data.address);
                    $('#hid_id').val(data.id);
                }
            });

        });


        function delete_user(id) {
            //alert(id);
            var url = '/control-cell/delete-nodal';
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

    <script>
        $(document).ready(function() {
            $('#datatable-buttons').dataTable();
        });
    </script>
@endsection
