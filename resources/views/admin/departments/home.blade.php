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
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="{{route('departments.create')}}" class="btn btn-primary waves-effect waves-light"><i class='mdi mdi-layers-plus me-1'></i>Add departments</a>
                                        </div> 
                                    </div>

                                    <div class="custom-accordion">
                                        <div class="mt-4">
                                            <h5 class="position-relative mb-0"><a href="#taskcollapse1" class="text-dark d-block" data-bs-toggle="collapse">departments <span class="text-muted">(08)</span> <i class="mdi mdi-chevron-down accordion-arrow"></i></a></h5>
                                            <div class="collapse show" id="taskcollapse1">
                                                <div class="table-responsive mt-3">
                                                    <table class="table table-centered table-nowrap table-borderless table-sm">
                                                        <thead class="table-light">
                                                            <tr class="">
                                                                <th scope="col">ID</th>
                                                                <th scope="col">Title</th>
                                                                <th scope="col" style="width: 85px;">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($departments as $key => $departmentsObject)
                                                            <tr>
                                                                <td>{{++$key}}</td>
                                                                <td>{{$departmentsObject->departments_title}}</td>
                                                                <td>
                                                                    <ul class="list-inline table-action m-0">
                                                                        <li class="list-inline-item"> 
                                                                            <div class="dropdown">
                                                                                <a class="action-icon px-1 dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                    <i class="mdi mdi-dots-vertical"></i>
                                                                                </a>
                                                                            
                                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                                    <a class="dropdown-item" href="{{route('departments.edit',$departmentsObject->id)}}">Edit</a>
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
            </div>                   <!-- end row -->    
        </div>      
    </div>
</div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->
