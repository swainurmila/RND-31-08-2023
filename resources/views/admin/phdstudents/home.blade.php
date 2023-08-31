@include('admin.partials.navigation') 

<style>

</style>
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
                                            <h5 class="position-relative mb-0"><a href="#taskcollapse1" class="text-dark d-block" data-bs-toggle="collapse">Users <span class="text-muted">({{$student_count}})</span> <i class="mdi mdi-chevron-down accordion-arrow"></i></a></h5>
                                            <div class="collapse show" id="taskcollapse1">
                                                <div class="table-responsive mt-3">
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
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
                                                                @foreach ($studentdetails as $key => $item)
                                                                <tr>
                                                                    <th scope="row">{{++$key}}</th>
                                                                    <td>{{$item['maindata']['name']}}</td>
                                                                    <td>{{$item['maindata']['email'] }}</td>
                                                                    <td>{{$item['maindata']['phone'] }}</td>
                                                                    <td> 
                                                                        @if ($item['maindata']['sup_status'] == 1 || $item['maindata']['sup_status'] == 11 )
                                                                        <a href="{{url('admin/view-students/'.$item['maindata']['stu_id'])}}" class="btn btn-info btn-bordered rounded-pill waves-effect waves-light">Processed</a>
                                                                        @else 
                                                                        <a href="{{url('admin/view-students/'.$item['maindata']['stu_id'])}}" class="btn btn-danger btn-bordered rounded-pill waves-effect waves-light">Processing</a> 
                                                                        @endif
                                                                        @if ($item['maindata']['sup_status'] == 1 )
                                                                        <span class="badge badge-success">Recommended</span>
                                                                        @endif
                                                                        @if ($item['maindata']['sup_status'] == 11 )
                                                                        <span class="badge badge-danger">Not Recommended</span>
                                                                        @endif
                                                                        @if ($item['maindata']['sup_status'] == 1 )
                                                                        <a href="{{url('admin/view-concent/'.$item['maindata']['stu_id'])}}" class="badge badge-secondary">view consent</a>
                                                                        @endif
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
        </div>      
    </div>
</div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
            


            


            




{{-- @section('js')
@endsection --}}

