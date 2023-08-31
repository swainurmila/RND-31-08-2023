@extends('admin.layouts.app')
@section('heading', 'Edit Department')
@section('sub-heading', 'Department')
@section('content')
<style>
    .col-md-1.color input {
        width: 100%;
        height: 40px;
    }
</style>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-2">
                                        <form action="{{ route('feeConfig.update',[$id]) }}" class="form" method="POST" novalidate enctype="multipart/form-data">
                                            @csrf    
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label"  for="title">Title:</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="title" value="{{$appl_status->appl_title}}" name="title" class="form-control" >
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="title">Amount:</label>
                                                <div class="col-md-10">
                                                   <input type="text" name="amount" value="{{$appl_status->application_fee}}" class="form-control">
                                                </div>
                                                
        
        
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="title">Start Date:</label>
                                                <div class="col-md-10">
                                                    <input id="startDate" name="startDate" type="text" value="{{$appl_status->from_date}}" class="form-control" />
                                                </div>
                                               
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="title">End Date:</label>
                                                <div class="col-md-10 color">
                                                    <input id="endDate" name="endDate" type="text" value="{{$appl_status->to_date}}" class="form-control" />
                                                </div>
                                               
                                            </div>
                                            <div class="form-check form-switch">
                                                <label class="form-check-label" for="flexSwitchCheckChecked">Status:</label>
                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="status" {{ $appl_status->active == '1' ? 'checked' : '' }}>
                                            
                                            </div>
                                            <!-- create and close button -->
                                            <div class="justify-content-end row">
                                                <div class="col-sm-9 form-group" >
                                                    <button type="submit" class="btn btn-info waves-effect waves-light">Update</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                            </div>
                            <!-- end row -->
                        </div>
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end row -->
      
@endsection

@section('js')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>
    <script  src="{{asset('admin_assets/js/date-validate-script.js')}}"></script>
    <script>
        // datepicker validator
        
    </script>
@endsection

