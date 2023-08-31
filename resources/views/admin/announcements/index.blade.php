@extends('admin.layouts.app')
@section('heading', 'Announcement')
@section('sub-heading', 'Announcement')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="{{ route('announcements.create') }}"
                                        class="btn btn-primary waves-effect waves-light"><i
                                            class='mdi mdi-layers-plus me-1'></i>Add Announcements</a>
                                </div>
                            </div>

                            <div class="custom-accordion">
                                <div class="mt-4">
                                    <div class="collapse show" id="taskcollapse1">
                                        <div class="table-responsive mt-3">
                                            <table id="datatable-buttons" class="table w-100 nowrap dataTable no-footer">
                                                <thead>
                                                    <tr class="">
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Title</th>
                                                        <th scope="col" style="width: 85px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($announcements as $key => $announcementsObject)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $announcementsObject->announcements_title }}</td>
                                                            <td>
                                                                <a class="btn btn-info btn-bordered rounded-pill waves-effect waves-light"
                                                                    href="{{ route('announcements.edit', $announcementsObject->id) }}">Edit</a>
                                                                <a class="btn btn-pink btn-bordered rounded-pill waves-effect waves-light"
                                                                    id="delete_announcement"
                                                                    onclick="delete_announcement({{ $announcementsObject->id }})"
                                                                    href="javascript:void(0)">Delete</a>
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
    </div> <!-- end row -->
@endsection

@section('js')
    <script>
        // Function to DELETE Announcement 
        function delete_announcement(id) {
            var url = `{{ route('announcements.destroy') }}`;
            Swal.fire({
                title: "Do you really want to delete this announcement?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Confirm",
            }).then(function(result) {
                console.log(result)
                if (result.isConfirmed) {
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                    });
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {
                            id: id,
                        },
                        dataType: "json",
                        beforeSend: function() {
                            Swal.fire(
                                "Alert!",
                                "Announcement deleted successfully!",
                                "success"
                            );
                            setInterval('location.reload()', 1000);
                        },
                        success: function(response) {},
                    });
                } else {
                    swal("Cancelled", "Your data is safe :)", "error");
                }
            });
        }
    </script>
@endsection
