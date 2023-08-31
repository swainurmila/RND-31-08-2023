@extends('admin.layouts.app')
@section('heading', 'Department')
@section('sub-heading', 'Department')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <div class="row">
                                @if (session('userdata')['role_id'] == '1')
                                    <div class="col-sm-3">
                                        <a href="{{ route('departments.create') }}"
                                            class="btn btn-primary waves-effect waves-light"><i
                                                class='mdi mdi-layers-plus me-1'></i>Add departments</a>
                                    </div>
                                @endif
                            </div>

                            <div class="custom-accordion">
                                <div class="mt-4">
                                    <h5 class="position-relative mb-0"><a href="#taskcollapse1" class="text-dark d-block"
                                            data-bs-toggle="collapse">Departments <span class="text-muted">(08)</span> <i
                                                class="mdi mdi-chevron-down accordion-arrow"></i></a></h5>
                                    <div class="collapse show" id="taskcollapse1">
                                        <div class="table-responsive mt-3">
                                            <table class="table table-centered table-nowrap table-borderless table-sm">
                                                <thead class="table-light">
                                                    <tr class="">
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Title</th>
                                                        <th scope="col">color</th>
                                                        @if (session('userdata')['role_id'] == '1')
                                                            <th scope="col" style="width: 85px;">Action</th>
                                                        @endif
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($departments as $key => $departmentsObject)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $departmentsObject->departments_title }}</td>
                                                            <td>
                                                                <div class="color"
                                                                    style="background:{{ $departmentsObject->color }}; height:50px;">
                                                                </div>
                                                            </td>
                                                            @if (session('userdata')['role_id'] == '1')
                                                                <td>
                                                                    <a class="btn btn-info btn-bordered rounded-pill waves-effect waves-light"
                                                                        href="{{ route('departments.edit', $departmentsObject->id) }}">Edit</a>
                                                                    <a class="btn btn-danger btn-bordered rounded-pill waves-effect waves-light"
                                                                        id="delete_portal"
                                                                        onclick="delete_portal({{ $departmentsObject->id }})"
                                                                        href="javascript:void(0)">Delete</a>
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

@endsection

@section('js')
    <script>
        // Function to DELETE Pages 
        function delete_portal(id) {
            var url = `{{ route('departments.destroy') }}`;
            Swal.fire({
                title: "Do you really want to delete this department?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Confirm",
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: url,
                        cache: false,
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        data: {
                            id: id,
                        },
                        dataType: 'json',
                        beforeSend: function() {
                            Swal.fire(
                                "Alert!",
                                "Department deleted successfully!",
                                "success"
                            );
                            setInterval('location.reload()', 1000);
                        },
                        success: function(response) {
                            console.log(response);
                        },
                    });
                } else {
                    swal("Cancelled", "Your data is safe :)", "error");
                }
            });
        }
    </script>
@endsection
