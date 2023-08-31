@extends('admin.layouts.app')
@section('heading', 'Portal Section')
@section('sub-heading', 'Portal Section')
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
                                    <a href="{{ route('portal.create') }}" class="btn btn-primary waves-effect waves-light">
                                        <i class='mdi mdi-layers-plus me-1'></i>Add Portal
                                    </a>
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
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Description</th>
                                                        <th scope="col" style="width: 85px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($portal as $key => $item)
                                                        <tr>
                                                            <td>{{ ++$key }}</td>
                                                            <td>{{ $item->title }}</td>
                                                            <td>
                                                                <img style="max-width: 50px;"
                                                                    src="/upload/portal/{{ $item->image }}" alt="">
                                                            </td>
                                                            <td>{{ $item->description }}</td>
                                                            <td class="d-flex">
                                                                <a class="btn btn-info btn-bordered rounded-pill waves-effect waves-light"
                                                                    href="{{ route('portal.edit', $item->id) }}">Edit</a>
                                                                <a class="btn btn-pink btn-bordered rounded-pill waves-effect waves-light"
                                                                    id="delete_portal"
                                                                    onclick="delete_portal({{ $item->id }})"
                                                                    href="javascript:void(0)">Delete</a>

                                                                {{-- <form action="{{ route('portal.destroy', [$item->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-pink btn-bordered rounded-pill waves-effect waves-light"
                                                                        href="{{ route('portal.destroy', $item->id) }}">Delete</button>
                                                                </form> --}}
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
        // Function to DELETE Pages 
        function delete_portal(id) {
            var url = `{{ route('portal.delete') }}`;
            Swal.fire({
                title: "Do you really want to delete this portal?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Confirm",
            }).then(function(result) {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: url, //"/portal/destroy/" + id,
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
                                "Portal deleted successfully!",
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
