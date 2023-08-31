{{-- @php
    dd(session('userdata'));
@endphp --}}
@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h1 style="text-align: center;">Domain Expert List</h1>
                        <div class="table-responsive mt-3">
                            <table id="datatable-buttons" class="table w-100 nowrap dataTable no-footer">
                                <thead >
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Student Name</th>
                                        <th scope="col">Enrollment No</th>
                                        <th scope="col">Name of NCR</th>
                                        <th scope="col">Faculty of Branch</th>
                                        <th scope="col">Domain Expert</th>
                                        <th scope="col">Designation & Affiliation</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Mobile</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">VC Approved Status</th>
                                        <th scope="col" style="width: 85px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($details as $key=>$val)
                                    <tr>
                                        <td>1</td>
                                        <td>{{$val->student_name}}</td>
                                        <td>{{$val->enrollment_no}}</td>
                                        <td>{{$val->name_of_ncr}}</td>
                                        <td>{{$val->faculty_of_branch}}</td>
                                        <td>{{$val->domain_expert_name}}</td>
                                        <td>{{$val->designation_affiliation}}</td>
                                        <td>{{$val->address}}</td>
                                        <td>{{$val->mobile}}</td>
                                        <td>{{$val->email}}</td>
                                        {{-- <td><span class="badge badge-soft-danger p-1">adas</span></td> --}}
                                        <td><span class="@if ($val->approved_status_ncr == 1)text-success @else text-pink @endif"> <strong>@if($val->approved_status_ncr == 1)Active @else Inactive @endif</strong></span></td>
                                        <td><a href="{{url('/supervisor/view-domain-expert/'.$val->dsc_id)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
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
@endsection
@section('js')