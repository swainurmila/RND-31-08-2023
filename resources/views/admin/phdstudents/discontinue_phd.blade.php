@extends('admin.layouts.app')
@section('heading', 'APPLICATION FOR DISCONTINUATION AS Ph.D.STUDENT')
@section('sub-heading', 'APPLICATION FOR DISCONTINUATION AS Ph.D.STUDENT')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form  method="POST" action="{{ route('discontinue_phd_store') }}" enctype="multipart/form-data" onsubmit="">
                            @csrf
                            <table class="table table-bordered ">
                                <tr>
                                    <th>Name :  <input type="text" class="form-control" id="inputPassword"  name="name" value="{{ $info->first_name . ' ' . $info->last_name }}"></th>
                                    <th>Enrollment No.:  <input type="text" class="form-control" id="inputPassword"  name="enrollment_no" value={{$info->enrollment_no}}></th>
                                    <th>Enrollment Date :  <input type="date" class="form-control" id="inputPassword"  name="enrollment_date" value={{$info->enrollment_date}}></th>
                                </tr>
                                <tr>
                                    <th>Faculty of :  <input type="text" class="form-control" id="inputPassword"  name="faculty"></th>
                                    <th>Registration No. : <input type="text" class="form-control" id="inputPassword"  name="regd_no" value= {{ $info->registration_no }}>
                                    </th>
                                    <th>Registration Date : <input type="date" class="form-control" id="inputPassword"  name="registration_date" value={{$info->registration_date}}>
                                    </th>
                                </tr>
                                <tr>
                                    <th> Branch / Specialization : <input type="text" class="form-control" id="inputPassword"  name="branch"></th>
                                    <th>Topic of the Research work :<input type="text" class="form-control" id="inputPassword"  name="topic"></th>
                                    <th colspan="">Present Nodal Research Centre : <select name="present_center" class="form-control" id="present_center" >
                                        <option value="">Select</option>                                   
                                        @foreach ($nodal as $key => $nodal)
                                                <option value="{{$nodal->id}}">{{$nodal->college_name}}</option>
                                        @endforeach
                                    </select>
                                </th>

                                </tr>

                                <tr>
                                    <th colspan="">Details of research paper:
                                        <textarea style="height:70%;width:100%" name="research_details" class="form-control"></textarea>
                                    </th>
                                    <th>Upload published research paper:
                                        <input class="form-control inpu_file" type="file" id="formFile" name="file"></th>
                                    <th colspan=""> Progress Done so far : <textarea style="height: 70%;width:100%" name="progress" class="form-control"></textarea></th>
                                </tr>
                                <tr>
                                    <th colspan="">Reason for discontinuation : <textarea style="height: 70%;width:100%" name="discontinuation_reason" class="form-control"></textarea></th>
                                </tr>
                                <tr>
                                    <th colspan="3" style="text-align: center;"><button type="submit" class="btn btn-primary cust_btn">Submit</button></th>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
