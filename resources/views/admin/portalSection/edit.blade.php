@extends('admin.layouts.app')
@section('heading', 'Edit Portal')
@section('sub-heading', 'Edit Portal')
@section('content')
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form action="{{ route('portal.update', [$id]) }}" class="form" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="title">Title <span
                                                class="text-danger">*</span> :</label>
                                        <div class="col-md-10">
                                            <input type="text" id="title" value="{{ $portal->title }}" name="title"
                                                class="form-control" placeholder="Enter Announcement Title" required />
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="title">Featured Image <span
                                                class="text-danger d-none">*</span> :</label>
                                        <div class="col-md-10">
                                            <input type="file" name="image2" class="form-control">
                                            <img style="max-width: 50px; margin-top:10px;"
                                                src="/upload/portal/{{ $portal->image }}" alt="">
                                            <input type="hidden" name="image_hid" value="{{ $portal->image }}" required />
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="title">Link <span
                                                class="text-danger">*</span> :</label>
                                        <div class="col-md-10">
                                            <input type="text" name="link" value="{{ $portal->link }}"
                                                class="form-control" placeholder="Enter a links" required />
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="title">Description <span
                                                class="text-danger">*</span> :</label>
                                        <div class="col-md-10">
                                            <textarea name="description" class="form-control" id="" placeholder="Enter announcement contents" required>{{ $portal->description }}</textarea>
                                        </div>
                                    </div>
                                    <!-- create and close button -->
                                    <div class="justify-content-end row">
                                        <div class="col-sm-12 form-group">
                                            <button type="submit"
                                                class="btn btn-info waves-effect waves-light text-uppercase">Update</button>
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
