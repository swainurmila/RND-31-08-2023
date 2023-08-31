@include('admin.layouts.header')
@include('admin.partials.navigation')
@include('admin.partials.sidebar')
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            @include('admin.partials.breadcrumb')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-2">
                                        <form action="{{ route('pages.update', $page->id) }}" class="form"
                                            method="POST" novalidate enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="page_title">Page
                                                    Title:</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="page_title"
                                                        value="{{ $page->page_title }}" name="page_title"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="slug">Slug:</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="slug" name="slug"
                                                        value="{{ $page->slug }}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="details">Detail:</label>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" value="{{ $page->detail }}" name="details" id="details" rows="5"></textarea>
                                                </div>
                                            </div>

                                            <div class="mb-2 col-md-4">
                                                <label for="section" class="form-label">Assign To:</label>
                                                <div class="col-md-10">

                                                    <select id="section" name="section" class="form-select">
                                                        <option disabled>Choose Section</option>
                                                        <option value="Header"
                                                            {{ $page->section == 'Header' ? 'selected' : '' }}> Header
                                                        </option>
                                                        <option value="Footer"
                                                            {{ $page->section == 'Footer' ? 'selected' : '' }}> Footer
                                                        </option>
                                                        <option value="Both"
                                                            {{ $page->section == 'Both' ? 'selected' : '' }}> Both
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Status -->

                                            <div class="form-check form-switch">
                                                <label class="form-check-label"
                                                    for="flexSwitchCheckChecked">Status:</label>
                                                <input class="form-check-input" type="checkbox"
                                                    id="flexSwitchCheckChecked" name="status"
                                                    {{ $page->status == 1 ? 'checked' : '' }}>

                                            </div>
                                            <!-- create and close button -->
                                            <div class="justify-content-end row">
                                                <div class="col-sm-9 form-group">
                                                    <button type="submit"
                                                        class="btn btn-info waves-effect waves-light">Update</button>
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
@include('admin.layouts.footer')
