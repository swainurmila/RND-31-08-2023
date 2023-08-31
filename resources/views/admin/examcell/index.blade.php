@extends('admin.layouts.app')
@section('heading', 'PHD Student Listing')
@section('sub-heading', 'PHD Entrance Student Listing')
@section('content')
    
        <!-- end page title --> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <!-- cta -->
                                    {{-- <div class="row">
                                        <div class="col-sm-3">
                                            <a type="button" class="btn btn-primary waves-effect waves-light"
                                                data-bs-toggle="modal" data-bs-target="#con-close-modal"><i
                                                    class='mdi mdi-layers-plus me-1'></i>Add User</a>
                                        </div>

                                    </div> --}}



                                    <div class="custom-accordion">
                                        <div class="mt-4">
                                            {{-- <h5 class="position-relative mb-0"><a href="#taskcollapse1"
                                                    class="text-dark d-block" data-bs-toggle="collapse">Users <span
                                                        class="text-muted">({{ $user_count }})</span> <i
                                                        class="mdi mdi-chevron-down accordion-arrow"></i></a></h5> --}}
                                            <div class="collapse show" id="taskcollapse1">
                                                <div class="table-responsive mt-3">
                                                    <div class="table-responsive">
                                                        <table id="datatable-buttons" class="table mb-0">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Name</th>
                                                                    <th>Registration No</th>
                                                                    <th>Email</th>
                                                                    <th>Gender</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($data as $key => $item)
                                                                    <tr>
                                                                        <th scope="row">{{$loop->iteration}}</th>
                                                                        <td>{{ $item->name }}</td>
                                                                        <td>{{ $item->registration_no }}</td>
                                                                        <td>{{ $item->email }}</td>
                                                                        <td>{{ $item->gender }}</td>
                                                                        <td><a  href="{{route('entrance_test_view',[$item->id])}}"
                                                                                
                                                                                class="btn btn-info btn-bordered rounded-pill waves-effect waves-light">Edit</a>
                                                                            {{-- <button
                                                                                onclick="delete_user({{ $item->id }})"
                                                                                id="role_delete" type="button"
                                                                                class="btn btn-pink btn-bordered rounded-pill waves-effect waves-light"><i
                                                                                    class="glyphicon glyphicon-trash"></i>
                                                                                Delete</button> --}}


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
            </div> 







@endsection


@section('js')
    {{-- <script>
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
    </script> --}}
    <script>
        $(document).ready(function() {
           $('#datatable-buttons').dataTable();
       } );
   
   
       
   </script>
@endsection
