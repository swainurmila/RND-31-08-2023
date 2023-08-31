@extends('admin.layouts.app')
@section('heading', 'Roles')
@section('sub-heading', 'Roles')
@section('content')
 
        <!-- end page title --> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <!-- cta -->
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#con-close-modal"><i class='mdi mdi-layers-plus me-1'></i>Add Roles</a>
                                        </div>
                                        
                                    </div>

                                   

                                    <div class="custom-accordion">
                                        <div class="mt-4">
                                            {{-- <h5 class="position-relative mb-0"><a href="#taskcollapse1" class="text-dark d-block" data-bs-toggle="collapse">Roles <span class="text-muted">({{$role_count}})</span> <i class="mdi mdi-chevron-down accordion-arrow"></i></a></h5> --}}
                                            <div class="collapse show" id="taskcollapse1">
                                                <div class="table-responsive mt-3">
                                                    <div class="table-responsive">
                                                        <table id="datatable-buttons" class="table mb-0">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Role</th>
                                                                    <th>Role Description</th>
                                                                    <th>Action</th>
                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($roles as $key => $item)
                                                                <tr>
                                                                    <th scope="row">{{++$key}}</th>
                                                                    <td>{{$item->role}}</td>
                                                                    <td>{{$item->role_description}}</td>
                                                                    <td><button id="edit_role2" type="button" data-bs-toggle="modal" data-bs-target="#edit_role" data-id="{{ $item->id }}" class="btn btn-info btn-bordered rounded-pill waves-effect waves-light">Edit</button>
                                                                    <button onclick="delete_company({{ $item->id }})" id="role_delete" type="button" class="btn btn-pink btn-bordered rounded-pill waves-effect waves-light"><i class="glyphicon glyphicon-trash"></i> Delete</button> 

                                                                    
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
            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <form action="{{ route('add.role') }}" id="regForm" method="POST" >
                    @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">ADD ROLE</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="field-1" class="form-label">Role</label>
                                        <input type="text" class="form-control" id="field-1" placeholder="Role" name="role" id="role" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="field-2" class="form-label">Role Description</label>
                                        <input type="text" class="form-control" id="field-2" placeholder="Role Description" name="role_desc" required>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                            <button id="add_role" type="submit" class="btn btn-info waves-effect waves-light">Save changes</button>
                        </div>
                    </div>
                </div>
                </form>
            </div><!-- /.modal -->


            <div id="edit_role" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                <form action="{{route('upddate.role')}}" id="regForm" method="POST" >
                    @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Role</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="field-1" class="form-label">Role</label>
                                        <input type="text" class="form-control" id="edit_role4" placeholder="Role" name="edit_role" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="field-2" class="form-label">Role Description</label>
                                        <input type="text" class="form-control" id="edit_role_desc" placeholder="Role Description" name="edit_role_desc" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                            <button id="add_role" type="submit" class="btn btn-info waves-effect waves-light">update</button>
                            <input type="hidden" name="hid_id" id="hid_id" value="">
                        </div>
                    </div>
                </div>
                </form>
            </div><!-- /.modal -->


            

@endsection


@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


@endsection

