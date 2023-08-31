@extends('admin.layouts.app')
@section('heading', 'Fee Configuartion')
@section('sub-heading', 'Fee Configuartion')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <!-- cta -->
                        <div class="row">
                            {{-- @if(session('userdata')['role_id'] == '1')
                            <div class="col-sm-3">
                                <a href="{{route('departments.create')}}" class="btn btn-primary waves-effect waves-light"><i class='mdi mdi-layers-plus me-1'></i>Add departments</a>
                            </div> 
                            @endif --}}
                        </div>

                        <div class="custom-accordion">
                            <div class="mt-4">
                                {{-- @php
                                    dd(count($appl_status))
                                @endphp --}}
                                <h5 class="position-relative mb-0"><a href="#taskcollapse1" class="text-dark d-block" data-bs-toggle="collapse">Fee Configuartion <span class="text-muted">({{count($appl_status)}})</span> <i class="mdi mdi-chevron-down accordion-arrow"></i></a></h5>
                                <div class="collapse show" id="taskcollapse1">
                                    <div class="table-responsive mt-3">
                                        <table class="table table-centered table-nowrap table-borderless table-sm">
                                            <thead class="table-light">
                                                <tr class="">
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Fee For</th>
                                                    <th scope="col">Amount</th>
                                                    <th scope="col">Start Date</th>
                                                    <th scope="col">End Date</th>
                                                    <th scope="col" style="width: 85px;">Action</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($appl_status as $key => $departmentsObject)
                                                <tr>
                                                    <td>{{++$key}}</td>
                                                    <td>{{$departmentsObject->appl_title}}</td>
                                                    <td>{{$departmentsObject->application_fee}}</td>
                                                    <td>{{$departmentsObject->from_date}}</td>
                                                    <td>{{$departmentsObject->to_date}}</td>
                                                    
                                                    
                                                    <td>
                                                        <ul class="list-inline table-action m-0">
                                                            <li class="list-inline-item"> 
                                                                <div class="dropdown">
                                                                    <a class="action-icon px-1 dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <i class="mdi mdi-dots-vertical"></i>
                                                                    </a>
                                                                
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <a class="dropdown-item" href="{{route('feeConfig.edit',$departmentsObject->id)}}">Edit</a>
                                                                        <a class="dropdown-item" href="{{route('departments.destroy',$departmentsObject->id)}}">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
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

@endsection