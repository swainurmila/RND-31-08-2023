@extends('admin.layouts.app')
@section('heading', 'Create Portal')
@section('sub-heading', 'Create Portal')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form action="{{ route('portal.store') }}" class="form" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="title">Title <span
                                                class="text-danger">*</span>:</label>
                                        <div class="col-md-10">
                                            <input type="text" id="title" name="title" class="form-control"
                                                placeholder="Enter Announcement Title" required />
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="title">Featured Image:</label>
                                        <div class="col-md-10">
                                            <input type="file" name="image2" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="title">Link <span
                                                class="text-danger">*</span>:</label>
                                        <div class="col-md-10">
                                            <input type="text" name="link" class="form-control"
                                                placeholder="Enter a links" required />
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="title">Description <span
                                                class="text-danger">*</span>:</label>
                                        <div class="col-md-10">
                                            <textarea name="description" class="form-control" id="" placeholder="Enter announcement contents" required></textarea>
                                        </div>
                                    </div>
                                    <!-- create and close button -->
                                    <div class="justify-content-start row">
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
@endsection
@section('js')
    <script></script>
@endsection
