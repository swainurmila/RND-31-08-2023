@extends('admin.layouts.app')
@section('content')
@section('heading', 'Supervisor Edit')
@section('sub-heading', 'Supervisor Edit')
    
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-2">
                                        <form action="{{ route('supervisor.list.update',['id' => $supervisor->sup_id]) }}" class="form"
                                            method="POST" novalidate enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="page_title">Name:</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="page_title"
                                                        value="{{$supervisor->name}}"
                                                        class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="page_title">Email:</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="page_title"
                                                        value="{{$supervisor->email}}" 
                                                        class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="slug">Age:</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="slug" 
                                                        value="{{$supervisor->age}}" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="slug">Teaching Experiance:</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="slug" 
                                                        value="{{$supervisor->teaching_experience}}" class="form-control" readonly>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="slug">Faculty:</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="slug" 
                                                        value="{{$supervisor->faculty}}" class="form-control" readonly>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="status">status </label>
                                                <div class="col-md-10">
                                                    <div class="form-check form-switch">
                                                        <label class="form-check-label"
                                                            for="flexSwitchCheckChecked"></label>
                                                        <input class="form-check-input" type="checkbox"
                                                            id="flexSwitchCheckChecked" name="status"
                                                            {{ $supervisor->is_active == 1 ? 'checked' : '' }}>
        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label">  </label>
                                                <div class="col-md-10">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" name="head_supervisor" {{ $supervisor->head_supervisor_status == 1 ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            Set As Head Supervisor
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            

                                            <!-- Status -->

                                            {{-- <div class="form-check form-switch">
                                                <label class="form-check-label"
                                                    for="flexSwitchCheckChecked">Status:</label>
                                                <input class="form-check-input" type="checkbox"
                                                    id="flexSwitchCheckChecked" name="status"
                                                    {{ $page->status == 1 ? 'checked' : '' }}>

                                            </div> --}}
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
                       
@endsection
@section('js')

@endsection




