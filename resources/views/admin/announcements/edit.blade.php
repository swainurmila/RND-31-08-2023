@extends('admin.layouts.app')
@section('heading', 'Announcement')
@section('sub-heading', 'Announcement Edit')
@section('content')

    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form action="{{ route('announcements.update', $announcements->id) }}" class="form"
                                    method="POST" novalidate enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="title">Title:</label>
                                        <div class="col-md-10">
                                            <input type="text" id="title"
                                                value="{{ $announcements->announcements_title }}" name="title"
                                                class="form-control">
                                        </div>
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

@endsection
