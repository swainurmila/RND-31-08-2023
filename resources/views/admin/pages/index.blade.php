@extends('admin.layouts.app')
@section('heading', 'Pages')
@section('sub-heading', 'Pages')
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
                                    <a href="{{ route('pages.create') }}" class="btn btn-primary waves-effect waves-light">
                                        <i class='mdi mdi-layers-plus me-1'></i>Add Page
                                    </a>
                                </div>
                            </div>

                            <div class="custom-accordion">
                                <div class="mt-4">
                                    <div class="collapse show" id="taskcollapse1">
                                        <div class="table-responsive mt-3">
                                            <table id="datatable-buttons" class="table w-100 nowrap dataTable no-footer">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Page Title</th>
                                                        {{-- <th scope="col">Slug</th> --}}
                                                        {{-- <th scope="col">Assign to</th> --}}
                                                        <th scope="col">Status</th>
                                                        <th scope="col" style="width: 85px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($pages as $pageObject)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $pageObject->page_title }}</td>
                                                            {{-- <td>{{$pageObject->slug}}</td> --}}
                                                            {{-- <td><span class="badge badge-soft-danger p-1">adas</span></td> --}}
                                                            <td>
                                                                <span
                                                                    class="{{ $pageObject->status == 1 ? 'text-success' : 'text-pink' }}">
                                                                    <strong>{{ $pageObject->status == 1 ? 'Active' : 'Inactive' }}</strong>
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-info btn-bordered rounded-pill waves-effect waves-light"
                                                                    href="{{ route('pages.edit', $pageObject->id) }}">Edit</a>
                                                                <a class="btn btn-pink btn-bordered rounded-pill waves-effect waves-light"
                                                                    id="delete_portal"
                                                                    onclick="delete_page({{ $pageObject->id }})"
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
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#datatable-buttons').dataTable();
        });

        // Function to DELETE Pages 
        function delete_page(id) {
            var url = `{{ route('pages.destroy') }}`;
            Swal.fire({
                title: "Do you really want to delete this page?",
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
                                "Page deleted successfully!",
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
