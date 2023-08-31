@extends('admin.layouts.app')
@section('heading', 'Fee Configuration')
@section('sub-heading', 'Fee Configuration')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <!-- cta -->
                        <div class="custom-accordion">
                            <div class="mt-4">
                                <div class="collapse show" id="taskcollapse1">
                                    <div class="table-responsive mt-3">
                                        <div class="table-responsive">
                                            <table id="datatable-buttons" class="table mb-0 dataTable">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>From Date</th>
                                                        <th>To Date</th>
                                                        <th>Application Fee</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{$appl_status['from_date']}}</td>
                                                        <td>{{$appl_status['to_date'] }}</td>
                                                        <td>{{$appl_status['application_fee'] }}</td>
                                                        <td>{{$appl_status['active'] == 1 ? 'Active' : 'Inactive' }}</td>
                                                        <td><button id="edit_user2" type="button"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#edit_user"
                                                            data-id="{{ $appl_status['id'] }}"
                                                            class="btn btn-info btn-bordered rounded-pill waves-effect waves-light">Edit</button>
                                                        </td>
                                                    </tr>
                                                    
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
</div>                   <!-- end row -->    

@endsection     