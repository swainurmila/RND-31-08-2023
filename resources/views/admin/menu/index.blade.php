@extends('admin.layouts.app')
@section('heading', 'Menus')
@section('sub-heading', 'Menus')
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
                                    {{-- <a href="#" class="btn btn-primary waves-effect waves-light"><i
                                            class='mdi mdi-layers-plus me-1'></i>Add Menu</a> --}}
                                </div>
                            </div>

                            <div class="custom-accordion">
                                <div class="mt-4">
                                    <div class="collapse show" id="taskcollapse1">
                                        <div class="table-responsive mt-3">
                                            <table id="datatable-buttons" class="table w-100 nowrap dataTable no-footer">
                                                <thead>
                                                    <tr class="">
                                                        <th scope="col">#</th>
                                                        <th scope="col">Menu Title</th>
                                                        {{-- <th scope="col">Slug</th> --}}
                                                        {{-- <th scope="col">Assign to</th> --}}
                                                        {{-- <th scope="col">Status</th> --}}
                                                        <th scope="col" style="width: 85px;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($menu as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->title }}</td>
                                                            <td>
                                                                <a class="btn btn-info btn-bordered rounded-pill waves-effect waves-light"
                                                                    href="{{ route('pages.edit', $item->id) }}">Edit</a>
                                                                <a class="btn btn-pink btn-bordered rounded-pill waves-effect waves-light"
                                                                    id="delete_portal"
                                                                    onclick="delete_menu({{ $item->id }})"
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

    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('menu.update') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Menu</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="field-1" class="form-label">Menu Title</label>
                                    <input type="text" name="title" class="form-control" id="menu_title"
                                        placeholder="Menu Title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="field-2" class="form-label">Alis Title</label>
                                    <input type="text" name="alis_title" class="form-control" id="alias_title"
                                        placeholder="Alis Title">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-4" class="form-label">Page Url</label>
                                    <input type="text" name="slug" class="form-control" id="slug"
                                        placeholder="Page Url">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="field-4" class="form-label">custom Url</label>
                                    <input type="text" name="cust_slug" class="form-control" id="cust_slug"
                                        placeholder="Custom Page Url">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">open in new
                                            tab:</label>
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked
                                            name="new_tab">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="field-4" class="form-label">Menu Position</label>
                                    <select class="form-select" name="sort_order" id="sort_order">
                                        <option value="0" selected="">Choose...</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="field-3" class="form-label">Select Parent Page</label>
                                    <select class="form-control" id="parent_id" name="parent_id">
                                        <option value="0" selected="">Choose...</option>
                                        @foreach ($page as $item)
                                            <option value="{{ $item->id }}">{{ $item->page_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="hid_id" value="" id="hid_id">
                        <button type="button" class="btn btn-secondary waves-effect"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.modal -->

@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('#datatable-buttons').dataTable();
        });

        $(document).ready(function() {
            $("body").on("click", "#view_menu", function(e) {
                var menuid = $(this).attr('menu-id');
                // alert(menuid);
                $.ajax({
                    type: 'get',
                    url: '{{ route('menudata') }}',
                    data: {
                        "menuid": menuid,
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('#menu_title').val(data.data.title);
                        $('#slug').val(data.data.slug);

                        $('#hid_id').val(data.data.id);
                        $('#alias_title').val(data.data.alis_title);
                        $("#parent_id").val(data.data.parent_id).prop('selected', true);
                        $("#sort_order").val(data.data.sort_order).prop('selected', true);
                        $("#cust_slug").val(data.data.cust_slug);
                        if (data.data.new_tab == 1) {
                            $("#flexSwitchCheckChecked").prop("checked", true);
                        }

                    },
                });
            });
        });

        // Function to DELETE MENU 
        function delete_menu(id) {
            var url = 'delete-menu/' + id;
            Swal.fire({
                title: "Do you really want to delete this menu?",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Confirm",
            }).then(function(result) {
                if (result.isConfirmed) {
                    console.log(id)
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                    });
                    $.ajax({
                        type: "get",
                        url: url,
                        dataType: "json",
                        beforeSend: function() {
                            Swal.fire(
                                "Alert!",
                                "Menu deleted successfully!",
                                "success"
                            );
                            setInterval('location.reload()', 1000);
                        },
                        success: function(response) {
                            console.log(response)
                            iziToast.success({
                                title: 'Success',
                                position: 'topRight',
                                message: 'Menu deleted successfully.',
                            });
                        },
                    });
                } else {
                    swal("Cancelled", "Your data is safe :)", "error");
                }
            });
        }
    </script>
@endsection
