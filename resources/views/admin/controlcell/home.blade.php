@extends('admin.layouts.app')
@section('heading', 'Phd Applications')
@section('sub-heading', 'Phd Applications')
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
                                            <h5 class="position-relative mb-0"><a href="#taskcollapse1" class="text-dark d-block" data-bs-toggle="collapse">Applications <span class="text-muted">({{$student_count}})</span> <i class="mdi mdi-chevron-down accordion-arrow"></i></a></h5>
                                            <div class="collapse show" id="taskcollapse1">
                                                <div class="table-responsive mt-3">
                                                    <div class="table-responsive">
                                                        <table id="datatable-buttons" class="table mb-0 dataTable">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Name</th>
                                                                    <th>Email</th>
                                                                    <th>Phone</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                               
                                                                @foreach ($student as $key => $item)
                                                              
                                                                <tr>
                                                                    <th scope="row">{{++$key}}</th>
                                                                    <td>{{$item->name}}</td>
                                                                    <td>{{$item->email }}</td>
                                                                    <td>{{$item->phone }}</td>
                                                                    <td><a href="@if($item->user_id == 'null') @else  {{route('PhdCell.view_student',[$item->user_id])}} @endif" class="btn btn-info btn-bordered rounded-pill waves-effect waves-light">View</a>
                                                                        @if($item->vc_status == 'approve') <span class="badge bg-success rounded-pill float-end">approve by Vc</span> @endif
                                                                        @if($item->vc_status == 'reject') <span class="badge bg-danger float-end">Reject by VC</span> @endif
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
                </div>
            </div>                   <!-- end row -->    

@endsection      
{{-- @section('js')
@endsection --}}

