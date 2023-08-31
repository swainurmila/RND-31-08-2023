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
                            <!-- cta -->
                            @if (session()->has('message'))
                                <br />
                                {!! session()->get('message') !!}
                            @endif
                            <span id="msg"></span>
                            <div class="panel-container show" role="content">
                                <h4 style="text-align: center;">Proposed Domain Expert</h4>
                                <form method="POST" action="{{ route('domain-expert-submit') }}"
                                    enctype="multipart/form-data" onsubmit="">
                                    @csrf
                                    <input name="stud_id" type="hidden" id="stud_id">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="student_name">Student Name.</label>
                                            <select class="form-control" name="student_name" id="student_name">
                                                <option selected>Select Student</option>
                                                @foreach ($student as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text" class="form-control" id="student_name" aria-describedby="emailHelp" placeholder="Enter Student Name" name="student_name"> --}}
                                            @if ($errors->has('student_name'))
                                                <span class="error-text" role="alert">
                                                    <strong
                                                        style="color: red;">{{ $errors->first('student_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group  col-md-6">
                                            <label for="exampleInputEnrollmentNo">Enrollment No.</label>
                                            {{-- <select class="form-control" name="enrollment_no" id="enrollment_no">
                                                <option value=''></option>
                                            </select> --}}
                                            <input type="text" class="form-control" id="enrollment_no"
                                                placeholder="Enrollment No." name="enrollment_no">
                                            @if ($errors->has('enrollment_no'))
                                                <span class="error-text" role="alert">
                                                    <strong
                                                        style="color: red;">{{ $errors->first('enrollment_no') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputNameOfNcr">Name Of Ncr.</label>
                                            <input type="hidden" class="form-control" id="ncr_id" name="ncr_id">
                                            <input type="text" class="form-control" id="name_of_ncr"
                                                placeholder="Name Of Ncr." name="name_of_ncr">
                                            @if ($errors->has('name_of_ncr'))
                                                <span class="error-text" role="alert">
                                                    <strong style="color: red;">{{ $errors->first('name_of_ncr') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="exampleInputNameOfNcr">Faculty of Branch.</label>
                                            <input type="text" class="form-control" id="faculty_of_branch"
                                                placeholder="Name of Faculty." name="faculty_of_branch">
                                            @if ($errors->has('faculty_of_branch'))
                                                <span class="error-text" role="alert">
                                                    <strong
                                                        style="color: red;">{{ $errors->first('faculty_of_branch') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group  col-md-6">
                                            <label for="exampleInputNameOfNcr">Title Of Rearch Work.</label>
                                            <input type="text" class="form-control" id="title_of_rearch_work"
                                                placeholder="Title of Research." name="title_of_rearch_work">
                                            @if ($errors->has('title_of_rearch_work'))
                                                <span class="error-text" role="alert">
                                                    <strong
                                                        style="color: red;">{{ $errors->first('title_of_rearch_work') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="exampleInputNameOfNcr">Name Of Domain Expert.</label>
                                            <div class="input-group col-3">
                                                <input type="text" class="form-control  m-input"
                                                    id="title_of_rearch_work" placeholder="Name Of Domain Expert."
                                                    name="name_of_domain_expert[]">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="exampleInputNameOfNcr">Designation & Affiliation.</label>
                                            <div class="input-group col-6">
                                                <input type="text" class="form-control" id="title_of_rearch_work"
                                                    placeholder="Designation&Affiliation." name="designation_affiliation[]">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="exampleInputNameOfNcr">Address.</label>
                                            <div class="input-group col-6">
                                                <textarea class="form-control" id="address" name="address[]" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="exampleInputNameOfNcr">Email.</label>
                                            <div class="input-group col-6">
                                                <input type="email" class="form-control" id="email" name="email[]"
                                                    placeholder="Email." name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="exampleInputNameOfNcr">Mobile No.</label>
                                            <div class="input-group col-6">
                                                <input type="text" class="form-control" id="mobile"
                                                    name="mobile[]" placeholder="Mobile." name="email">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <br>
                                            <button id="rowAdder" type="button" class="btn btn-dark">
                                                <span class="bi bi-plus-square-dotted"></span> ADD MORE</button>
                                        </div>
                                    </div>
                                    <span id="addDiv"></span>
                                    <br />
                                    <div class="col text-center">
                                        <button style="text-align: center;" type="submit"
                                            class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        var i = 1;

        function addField() {
            for (i = 1; i < 4; i++) {
                if (i > 7) {
                    $('#msg').html(
                        '<div class="offset-md-0 col-md-offset-0 col-md-12 animated fadeInDown alert alert-danger" role="alert"><strong>Max 8 filed is Allowed.</strong></div>'
                    );
                    setInterval(function() {
                        $("#msg").fadeOut();
                    }, 1000);
                } else {
                    newRowAdd = '<span id="rowss' + i +
                        '"><div class="row"><div class="col-md-2"><label for="exampleInputNameOfNcr">Name Of Domain Expert.</label><div class="input-group col-3"><input type="text" class="form-control  m-input" id="title_of_rearch_work" placeholder="Name Of Domain Expert." name="name_of_domain_expert[]"></div></div><div class="col-md-2"><label for="exampleInputNameOfNcr">Designation & Affiliation.</label><div class="input-group col-6"><input type="text" class="form-control" id="title_of_rearch_work" placeholder="Designation&Affiliation." name="designation_affiliation[]"></div></div><div class="col-md-2"><label for="exampleInputNameOfNcr">Address.</label><div class="input-group col-6"><textarea class="form-control" id="address" name="address[]" rows="3"></textarea></div></div><div class="col-md-2"><label for="exampleInputNameOfNcr">Email.</label><div class="input-group col-6"><input type="email" class="form-control" id="email" name="email[]" placeholder="Email." name="email"></div></div><div class="col-md-2"><label for="exampleInputNameOfNcr">Mobile No.</label><div class="input-group col-6"><input type="text" class="form-control" id="mobile" name="mobile[]" placeholder="Mobile." name="email"></div></div><div class="col-md-2"><button class="btn btn-danger" onclick="deleteRow(' +
                        i + ')" id="DeleteRow' + i +
                        '" type="button"><i class="bi bi-trash"></i>Delete</button></div></div><span>';
                    $('#addDiv').append(newRowAdd);
                }
            }
        }
        addField();
        $("#rowAdder").click(function() {
            if (i > 7) {
                $('#msg').html(
                    '<div class="offset-md-0 col-md-offset-0 col-md-12 animated fadeInDown alert alert-danger" role="alert"><strong>Max 8 filed is Allowed.</strong></div>'
                );
                setInterval(function() {
                    $("#msg").fadeOut();
                }, 1000);
            } else {
                newRowAdd = '<span id="rowss' + i +
                    '"><div class="row"><div class="col-md-2"><label for="exampleInputNameOfNcr">Name Of Domain Expert.</label><div class="input-group col-3"><input type="text" class="form-control  m-input" id="title_of_rearch_work" placeholder="Name Of Domain Expert." name="name_of_domain_expert[]"></div></div><div class="col-md-2"><label for="exampleInputNameOfNcr">Designation & Affiliation.</label><div class="input-group col-6"><input type="text" class="form-control" id="title_of_rearch_work" placeholder="Designation&Affiliation." name="designation_affiliation[]"></div></div><div class="col-md-2"><label for="exampleInputNameOfNcr">Address.</label><div class="input-group col-6"><textarea class="form-control" id="address" name="address[]" rows="3"></textarea></div></div><div class="col-md-2"><label for="exampleInputNameOfNcr">Email.</label><div class="input-group col-6"><input type="email" class="form-control" id="email" name="email[]" placeholder="Email." name="email"></div></div><div class="col-md-2"><label for="exampleInputNameOfNcr">Mobile No.</label><div class="input-group col-6"><input type="text" class="form-control" id="mobile" name="mobile[]" placeholder="Mobile." name="email"></div></div><div class="col-md-2"><button class="btn btn-danger" onclick="deleteRow(' +
                    i + ')" id="DeleteRow' + i +
                    '" type="button"><i class="bi bi-trash"></i>Delete</button></div></div><span>';
                $('#addDiv').append(newRowAdd);
                i++;
            }
        });

        function deleteRow(last_index) {
            $("#rowss" + last_index).remove();
            i = i - 1;
        }
    </script>


    <script type="text/javascript">
        $(document).ready(function() {
            $("#student_name").change(function(e) {

                //alert('hello2');
                e.preventDefault();
                var id = $(this).val();
                //var url = "/supervisor/fetch-enroll/".id;
                //alert(url);
                //console.log(id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type: 'get',
                    url: "/supervisor/fetch-enroll/",
                    data: {
                        // "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    dataType: 'json',
                    success: function(data) {
                        //console.log(data[0].enrollment_no);
                        $('#enrollment_no').val(data[0].enrollment_no);
                        $('#faculty_of_branch').val(data[0].name_of_faculty);
                        $('#name_of_ncr').val(data[0].college_name);
                        $('#title_of_rearch_work').val(data[0].topic_of_phd_work);
                        $('#ncr_id').val(data[0].id);
                        $('#stud_id').val(data[0].stud_id)
                    }
                });

            });
        });
    </script>
@endsection
