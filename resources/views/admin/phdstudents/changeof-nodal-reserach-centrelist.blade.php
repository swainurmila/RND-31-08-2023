@extends('admin.layouts.app')
@section('heading', 'CHANGE OF NODAL CENTRE LIST')
@section('sub-heading', 'CHANGE OF NODAL CENTRE LIST')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <!-- cta -->
                        <div class="custom-accordion">
                            <div class="card-body">
                                <h3 style="text-align: center;">Change of Nodal Centre List</h3>
                                <div class="table-responsive mt-3">
                                    <table id="datatable-buttons" class="table w-100 nowrap dataTable no-footer">
                                        <thead >
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Student Name</th>
                                                <th scope="col">Faculty of Branch</th>
                                                <th scope="col">Enrollment No</th>
                                                <th scope="col">Registration No</th>
                                                <th scope="col">Branch Name</th>
                                                <th scope="col">Topic OF Research.</th>
                                                <th scope="col">Present Status Research.</th>
                                                <th scope="col">Present Nodal Centre</th>
                                                <th scope="col">Present Sup.Name</th>
                                                <th scope="col">Co.Sup.Name</th>
                                                <th scope="col">Proposed NodalCentre</th>
                                                <th scope="col">Proposed Supervisor</th>
                                                <th scope="col">Proposed Co.Supervisor</th>
                                                <th scope="col">Document</th>
                                                <th scope="col">R&D Approved</th>
                                                <th scope="col">Vice Chancellor</th>
                                                <th scope="col" style="width: 85px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;foreach($details as $key=>$val){ ?>
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{$val->name}}</td>
                                                <td>{{$val->faculty_of}}</td>
                                                <td>{{$val->enrollment_no}}</td>
                                                <td>{{$val->registration_no}}</td>
                                                <td>{{$val->branch_name}}</td>
                                                <td>{{$val->topic_of_research}}</td>
                                                <td>{{$val->present_status_research}}</td>
                                                <td>{{$val->present_nodal_centre}}</td>
                                                <td>{{$val->present_supervisor_name}}</td>
                                                <td>{{$val->co_supervisor_name}}</td>
                                                <td>{{ $val->proposed_nodal_centre }}</td>
                                                <td>{{ $val->proposed_supervisor }}</td>
                                                <td>{{ $val->proposed_co_supervisor }}</td>
                                                <td>{{ $val->document }}</td>
                                                <td><span class="@if ($val->rd_approved == 1)text-success @else text-pink @endif"> <strong>@if($val->rd_approved == 1)Approved @else Not Approved @endif</strong></span></td>
                                                <td><span class="@if ($val->vice_chancellor == 1)text-success @else text-pink @endif"> <strong>@if($val->vice_chancellor == 1)Approved @else Not Approved @endif</strong></span></td>
                                                <td><a href="{{url('/phdstudent/changeof-nodal-reserach-centre-view/'.$val->id )}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                            </tr>
                                            <?php $i++;} ?>
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
</div>                   <!-- end row -->    

@endsection      
{{-- @section('js')
@endsection --}}

