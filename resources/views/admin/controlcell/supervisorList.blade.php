@include('admin.layouts.header')
@include('admin.partials.navigation') 
@include('admin.partials.sidebar')
<div class="content-page">
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
         @include('admin.partials.breadcrumb')
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <!-- cta -->
                                    <div class="custom-accordion">
                                        <div class="mt-4">
                                            <h5 class="position-relative mb-0"><a href="#taskcollapse1" class="text-dark d-block" data-bs-toggle="collapse">Users <span class="text-muted">({{$supervisor_count}})</span> <i class="mdi mdi-chevron-down accordion-arrow"></i></a></h5>
                                            <div class="collapse show" id="taskcollapse1">
                                                <div class="table-responsive mt-3">
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Name</th>
                                                                    <th>gender</th>
                                                                    <th>PHD Thesis</th>
                                                                    <th>Action</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($supervisor as $key => $item)
                                                                @php
                                                                    if($item->control_cell_status == 1){
                                                                        $status = 'Pending';
                                                                    } elseif($item->control_cell_status == 2){
                                                                        $status = 'Pending at Registrar';
                                                                    }elseif($item->vc_status == 'approve'){
                                                                        $status = 'Approved By VC';
                                                                    }elseif($item->control_cell_status == 3){
                                                                        $status = 'Pending at VC';
                                                                    }
                                                                @endphp
                                                                <tr>
                                                                    <th scope="row">{{++$key}}</th>
                                                                    <td>{{$item->full_name}}</td>
                                                                    <td>{{$item->gender }}</td>
                                                                    <td>{{$item->phd_thesis }}</td>
                                                                    <td><a href="{{route('rndcell.view_supervisor',[$item->user_id])}}" class="btn btn-info btn-bordered rounded-pill waves-effect waves-light">View</a>
                                                                    </td>
                                                                    <td>{{$status}}</td>
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
        </div>      
    </div>
</div>
@include('admin.layouts.footer'); 
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
            


            


            




{{-- @section('js')
@endsection --}}

