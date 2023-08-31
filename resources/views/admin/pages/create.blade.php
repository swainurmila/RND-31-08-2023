@extends('admin.layouts.app')
@section('content')
    <div class="">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid">
                <!-- start page title -->
                {{-- <div class="row">
                    <div class="col-12">
                        <div class="page-title-box" style="">
                            <h4 class="page-title">Pages</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                    <li class="breadcrumb-item active">Add Pages</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- end page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-2">
                                            <form action="{{ route('pages.store') }}" class="form" method="POST"
                                                novalidate enctype="multipart/form-data">
                                                @csrf
                                                <!-- Page Title -->
                                                <div class="mb-2 row">
                                                    <label class="col-md-2 col-form-label" for="page_title">Page
                                                        Title:</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="page_title" value=""
                                                            name="page_title" class="form-control" />
                                                    </div>
                                                </div>
                                                <!-- Parent Page -->
                                                {{-- <div class="mb-2 row">
                                                    <label class="col-md-2 col-form-label" for="parent_id">Parent page:</label>
                                                    <div class="col-md-10">
                                                        <select id="parent_id" name="parent_id" class="form-select">
                                                            <option disabled>Choose Parent</option>
                                                            <option value="0">0</option>
                                                        </select>
                                                    </div>
                                                </div> --}}
                                                <!-- Slug -->
                                                {{-- <div class="mb-2 row">
                                                    <label class="col-md-2 col-form-label" for="slug">Slug:</label>
                                                    <div class="col-md-10">
                                                        <input type="text" id="slug" name="slug"
                                                            class="form-control" placeholder="Enter Slug">
                                                    </div>
                                                </div> --}}
                                                <!-- Details -->
                                                {{-- <div class="mb-2 row">
                                                    <label class="col-md-2 col-form-label" for="details">Detail:</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" name="details" id="details" rows="5"></textarea>
                                                    </div>
                                                </div> --}}

                                                <div class="mb-2 row">
                                                    <label class="col-md-2 col-form-label" for="details">Content:</label>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" value="" name="details" id="content" rows="5"></textarea>
                                                    </div>
                                                </div>

                                                <!-- Section -->
                                                {{-- <div class="mb-2 row">
                                                    <label class="col-md-2 col-form-label" for="section">Assign To:</label>
                                                    <div class="col-md-10">
                                                        <select id="section" name="section" class="form-select">
                                                            <option disabled>Choose Section</option>
                                                            <option value="Header"> Header</option>
                                                            <option value="Header"> Footer</option>
                                                            <option value="Both"> Both</option>
                                                        </select>
                                                    </div>
                                                </div> --}}

                                                <!-- Status -->
                                                <div class="form-check form-switch">
                                                    <label class="form-check-label"
                                                        for="flexSwitchCheckChecked">Status</label>
                                                    <input class="form-check-input" type="checkbox"
                                                        id="flexSwitchCheckChecked" name="status" checked>
                                                </div>

                                                <!-- create and close button -->
                                                <div class="justify-content-end row">
                                                    <div class="col-sm-12 form-group">
                                                        <button type="submit"
                                                            class="btn btn-info waves-effect waves-light">Create</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                            </div>
                        </div> <!-- end card -->
                    </div><!-- end col -->
                </div>
                <!-- end row -->
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src='{{ asset('js/tinymce.min.js') }}'></script>
    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script>
        tinymce.init({
            selector: '#content',

            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",

            file_picker_callback(callback, value, meta) {
                let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName(
                    'body')[0].clientWidth
                let y = window.innerHeight || document.documentElement.clientHeight || document
                    .getElementsByTagName('body')[0].clientHeight

                tinymce.activeEditor.windowManager.openUrl({
                    url: '/file-manager/tinymce5',
                    title: 'File manager',
                    width: x * 0.8,
                    height: y * 0.8,
                    onMessage: (api, message) => {
                        callback(message.content, {
                            text: message.text
                        })
                    }
                })
            }
        });
    </script>
@endsection
