@extends('admin.layouts.app')
@section('heading', 'Create Department')
@section('sub-heading', 'Department')
@section('content')

    <style>
        .col-md-1.color input {
            width: 100%;
            height: 40px;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form action="{{ route('departments.store') }}" class="form" method="POST" novalidate
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="title">Title:</label>
                                        <div class="col-md-10">
                                            <input type="text" id="title" name="title" class="form-control"
                                                value="{{ old('title') }}" placeholder="Enter Departments Title">
                                            @if ($errors->has('title'))
                                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-2 row">
                                        <label class="col-md-2 col-form-label" for="title">Color:</label>
                                        <div class="col-md-1 color">
                                            <input type="color" id="colorpicker"
                                                pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#bada55">
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" name="color"
                                                pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="{{ old('color') }}""
                                                id="hexcolor">
                                            @if ($errors->has('color'))
                                                <span class="text-danger">{{ $errors->first('color') }}</span>
                                            @endif
                                        </div>


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

@endsection

@section('js')
    <script>
        $('#colorpicker').on('input', function() {
            $('#hexcolor').val(this.value);
        });
        $('#hexcolor').on('input', function() {
            $('#colorpicker').val(this.value);
        });
    </script>
@endsection
