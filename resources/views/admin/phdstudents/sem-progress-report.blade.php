@extends('admin.layouts.app')
@section('heading', 'SEMESTER PROGRESS REPORT')
@section('sub-heading', 'SEMESTER PROGRESS REPORT')
@section('content')
    <style>
        .table {
            padding: .85rem .85rem;
            background-color: var(--bs-table-bg);
            border-bottom-width: none !important;
            box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: inherit;
            border-width: 0;
        }

        tbody,
        td,
        tfoot,
        th,
        thead,
        tr {
            border-color: inherit;
            border-width: 0;
        }

        .panel-content {
            padding: 40px 30px;
            border: 2px solid #ccc;
        }

        #textOrganisation2 {
            display: flex;
            flex-flow: row wrap;
        }
    </style>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css">
    <div class="row">
        <div class="col-lg-12">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="panel-container show" role="content">
                            <div class="panel-content" style="padding: 20px 30px; ">
                                <div class="section-title form-section-title mb-3">
                                    <h3 class="text-center"><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA,
                                            ROURKELA</b></h3>
                                    <h5 class="text-center"><b>SEMESTER PROGRESS REPORT
                                            {{ date('Y') }}</b></h5>
                                </div>
                                <form action="{{ route('sem_progress_submit') }}" method="post" id="form">
                                    @csrf
                                    <div class="row semester">
                                        <div class="col-md-4 mb-4">
                                            <label for="inputPassword" class="col-form-label">Select
                                                Semester:</label>

                                            <div class="row-sm-10">
                                                <select class="form-select form-control" aria-label="Default select example"
                                                    name="semester">
                                                    <option value="">Select Semester</option>
                                                    <option value="1">1st</option>
                                                    <option value="2">2nd</option>
                                                    <option value="3">3rd</option>
                                                    <option value="4">4th</option>
                                                    <option value="5">5th</option>
                                                    <option value="6">6th</option>
                                                    <option value="7">7th</option>
                                                    <option value="8">8th</option>
                                                    <option value="9">9th</option>
                                                    <option value="10">10th</option>
                                                    <option value="11">11th</option>
                                                    <option value="12">12th</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-4">
                                            <label for="inputPassword" class="col-form-label">Select Year:</label>
                                            <div class="row-sm-10">
                                                {{-- <select class="form-select form-control" aria-label="Default select example"
                                                    name="year">
                                                    <option selected> select Year</option>
                                                    <option value="1">2020</option>
                                                    <option value="2">2021</option>
                                                    <option value="3">2022</option>
                                                </select> --}}
                                                <select class="yrselect form-control" name="year">
                                                    <option value="">Choose Year</option>
                                                    @for ($i = date('Y'); $i >= date('Y') - 50; $i--)
                                                        <option value="{{ $i }}">
                                                            {{ $i }}</option>
                                                    @endfor
                                                </select>


                                            </div>
                                        </div>
                                        <div class="col mb-4">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Date:</label>
                                            <div class="row-sm-10">
                                                <input type="date" class="form-control" name="date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row data-table">
                                        <div class="col-md-4-md-12 ">
                                            <table class="table  table-bordered">
                                                <tr>
                                                    <th>Name of the Research Student</th>
                                                    <td>
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ $student->name }}" readonly>
                                                    </td>
                                                    <th>Name of the Faculty</th>
                                                    <td>
                                                        <input type="text" class="form-control" name="faculty_name"
                                                            value="{{ $student->name_of_faculty }}" readonly>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>Topic of Ph.D. work</th>
                                                    <td>
                                                        <input type="text" class="form-control" name="phd_work"
                                                            value="{{ $student->topic_of_phd_work }}" readonly>
                                                    </td>
                                                    <th>Name of the NCR <br> where research is being conducted</th>
                                                    <td>
                                                        <input type="text" class="form-control"
                                                            value="{{ $student->college_name }}" readonly>
                                                        <input type="hidden" name="nodal_center"
                                                            value="{{ $student->nodal_id }}">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>Enrollment No. </th>
                                                    <td>
                                                        <input value="{{ $student->enrollment_no }}" type="text"
                                                            class="form-control" name="enrollment_no" readonly>
                                                    </td>
                                                    <th>Date of Enrollment</th>
                                                    <td>
                                                        <input type="text" class="form-control" name="enrollment_date"
                                                            value="{{ $student->enrollment_date }}" readonly>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Registration. No.</th>
                                                    <td>
                                                        <input type="text" class="form-control" name="reg_no"
                                                            placeholder=""
                                                            value="{{ $student->registration_no ? $student->registration_no : '-' }}">
                                                    </td>
                                                    <th>Date of Registration.</th>
                                                    <td>
                                                        <input type="text" class="form-control" name="reg_date"
                                                            value="{{ $student->registration_date }}">
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <th>
                                                        <h5>Research Supervisor name</h5>
                                                    </th>
                                                    <td colspan="3">
                                                        <div class="row mb-3"><label
                                                                class="col-sm-2 col-form-label">1)</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $student->supervisor_name ? $student->supervisor_name : '-' }}"
                                                                    readonly>
                                                                <input type="hidden" name="supervisor_1"
                                                                    value="{{ $student->sup_id }}">
                                                            </div>
                                                        </div><br>
                                                        <div class="row mb-3"><label
                                                                class="col-sm-2 col-form-label">2)</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    value="{{ $student->co_supervisor_name ? $student->co_supervisor_name : '-' }}"
                                                                    readonly>
                                                                <input type="hidden" name="supervisor_2"
                                                                    value="{{ $student->cosup_id }}">
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="planned">
                                        <h5>1. Progress Against Planned Work</h5>
                                    </div>
                                    <div class="row semester_tb">
                                        <div class="col-md-12 ">
                                            <table id="progressTable" class="table table-bordered half-year">
                                                <tr>
                                                    <th rowspan="2">Semester/Half-Year after Registration</th>
                                                    <th colspan="2">Duration</th>
                                                    <th rowspan="2">Planned work</th>
                                                    <th rowspan="2">Actual Work</th>
                                                    @if ($stud_id && $stud_id->status == 10)
                                                        <th rowspan="2">View</th>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td>From</td>
                                                    <td>To</td>
                                                </tr>

                                                <tbody id="dynamicRows">
                                                    @if (!empty($semester_plan_work))
                                                        @foreach ($semester_plan_work as $key => $value)
                                                            <tr>
                                                                <td>
                                                                    <input type="text" name="semester_prog"
                                                                        class="form-control"
                                                                        value="{{ isset($value->semester) ? $value->semester : '' }}"
                                                                        {{ isset($value->semester) ? 'readonly' : '' }}>

                                                                </td>
                                                                <td>
                                                                    <input type="date" name="startDate"
                                                                        class="form-control"
                                                                        value="{{ isset($value->form_date) ? $value->form_date : '' }}"{{ isset($value->form_date) ? 'readonly' : '' }} />
                                                                </td>
                                                                <td>
                                                                    <input type="date" name="endDate"
                                                                        class="form-control"
                                                                        value="{{ isset($value->to_date) ? $value->to_date : '' }}"{{ isset($value->to_date) ? 'readonly' : '' }} />
                                                                </td>
                                                                <td>
                                                                    <textarea name="planned_work" class="form-control" rows="1"
                                                                        {{ isset($value->planned_work) ? 'readonly' : '' }}>{{ isset($value->planned_work) ? $value->planned_work : '' }}</textarea>
                                                                </td>
                                                                <td>
                                                                    <textarea name="actual_work" class="form-control" rows="1"
                                                                        {{ isset($value->planned_work) ? 'readonly' : '' }}>{{ isset($value->actual_work) ? $value->actual_work : '' }}</textarea>
                                                                </td>
                                                                @if ($value->status == 10)
                                                                    <td>
                                                                        <a href="javascript:void(0);"
                                                                            onclick="upload_image_view('{{ $value->dsc_file }}')"
                                                                            class="badge bg-success">View Letter</a>
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                        @else
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="semester_prog"
                                                                    class="form-control" value="">

                                                            </td>
                                                            <td>
                                                                <input type="date" name="startDate"
                                                                    class="form-control" value="" />
                                                            </td>
                                                            <td>
                                                                <input type="date" name="endDate" class="form-control"
                                                                    value="" />
                                                            </td>
                                                            <td>
                                                                <textarea name="planned_work" class="form-control" rows="1"></textarea>
                                                            </td>
                                                            <td>
                                                                <textarea name="actual_work" class="form-control" rows="1"></textarea>
                                                            </td>

                                                            <td>
                                                                <a href="javascript:void(0);"
                                                                    class="badge bg-success"></a>
                                                            </td>

                                                        </tr>
                                                    @endif
                                                    {{-- @for ($i = 1; $i <= $count - 1; $i++) --}}
                                                    @if ($diffInDays == 180)
                                                        <tr>
                                                            <td>
                                                                <input type="text" name="semester_prog"
                                                                    class="form-control" value="">

                                                            </td>
                                                            <td>
                                                                <input type="date" name="startDate"
                                                                    class="form-control" value="" />
                                                            </td>
                                                            <td>
                                                                <input type="date" name="endDate" class="form-control"
                                                                    value="" />
                                                            </td>
                                                            <td>
                                                                <textarea name="planned_work" class="form-control" rows="1"></textarea>
                                                            </td>
                                                            <td>
                                                                <textarea name="actual_work" class="form-control" rows="1"></textarea>
                                                            </td>

                                                            <td>
                                                                <a href="javascript:void(0);"
                                                                    class="badge bg-success"></a>
                                                            </td>

                                                        </tr>
                                                    @endif
                                                    {{-- @endfor --}}

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <div class="planned">
                                        <h5>2. Brief Description of work done in the preceding semester</h5>
                                        <textarea name="desc_work" class="form-control" required></textarea>
                                    </div>
                                    <div class="planned">
                                        <h5>3. Details of publication</h5>
                                    </div>

                                    <div id="textOrganisation2" class="form-row">
                                        <div class="col-md-3 cust-txt-input">
                                            <label class=" col-form-label"
                                                for="phdstudent_organisation_name"><b>Authors:</b></label>
                                            <input type="text" id="authors" value="" name="authors"
                                                class="form-control ip_presdata" placeholder="Authors">
                                            <span class="error-msg prs_name text-danger" id="prs_name"></span>
                                        </div>

                                        <div class="col-md-3 cust-txt-input">
                                            <label class=" col-form-label" for="phdstudent_designation"><b>Title of the
                                                    paper:</b></label>
                                            <input type="text" id="title_of_the_paper" value=""
                                                name="title_of_the_paper" class="form-control"
                                                placeholder="Title of the
                                                paper">
                                        </div>
                                        <div class="col-md-3 cust-txt-input">
                                            <label class=" col-form-label" for="phdstudent_duration"><b>Journal /
                                                    conferences:</b></label>
                                            <input type="text" id="journal" value="" name="journal"
                                                class="form-control"
                                                placeholder="Journal /
                                                conferences">

                                        </div>
                                        <div class="col-md-3 cust-txt-input">
                                            <label class=" col-form-label" for="phdstudent_jobnature"><b>Volume & No /
                                                    Venue & Dates:</b></label>
                                            <input type="text" id="vol_no" value="" name="vol_no"
                                                class="form-control" placeholder="Volume & No">
                                        </div>
                                        <div class="col-md-3 cust-txt-input">
                                            <label class=" col-form-label" for="phdstudent_jobnature"><b>Page
                                                    No.:</b></label>
                                            <input type="text" id="page_no" value="" name="page_no"
                                                class="form-control" placeholder="Page No.">
                                        </div>
                                        <div class="col-md-3 cust-txt-input">
                                            <label class=" col-form-label"><b>Copy attached
                                                    (YES / NO):</b></label>
                                            <input class="form-control" type="file" name="attached_copy"
                                                id="attached_copy">
                                            <input type="hidden" value="" id="attached_copy_hid">
                                        </div>
                                        <div class="col-md-3 cust-txt-input">
                                            <div class="form-group">
                                                <button type="button"
                                                    class="btn add_phdstudent_organisation_dtls  btn-success btn-icon waves-effect waves-themed "
                                                    style="margin-top: 2.3rem !important;"
                                                    id="add_phdstudent_organisation_dtls">
                                                    Add Publication
                                                </button>
                                            </div>
                                        </div>

                                        <div class="col-md-3 cust-txt-input"></div>


                                    </div>
                                    <div class="row semester_tb">
                                        <div class="col-md-12 ">
                                            <table class="table  table-bordered half-year">
                                                <thead>
                                                    <tr>
                                                        <th>Authors</th>
                                                        <th>Title of the paper</th>
                                                        <th>Journal / conferences</th>
                                                        <th>Volume & No / Venue & Dates</th>
                                                        <th>Page No.</th>
                                                        <th>Copy attached(YES / NO)</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="addSemPlanWord">

                                                </tbody>



                                            </table>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h5>4. Difficulties Encountered:</h5>
                                        </div>
                                        <div class="col-md-12">
                                            <textarea name="difficulties_encounter" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row mt-4 mb-2">
                                        <div class="sumb_btn text-center">
                                            <input class="btn btn-primary" type="submit" value="Submit">
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="upload_image_view" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollableModalTitle">View Document</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="view_upload_image">
                        {{-- <img src="" alt="Upload_img" class="img-responsive card-img-top" id="view_upload_image">
                                                            <embed src="" frameborder="0" width="100%" id="view_upload_image" height="400px"> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection

@section('js')

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/additional-methods.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script> --}}


    <script type="text/javascript">
        $(document).ready(function() {
            //  ===  size in kb ===
            $.validator.addMethod('filesize', function(value, element, param) {

                var size = element.files[0].size;

                size = size / 1024;
                size = Math.round(size);
                return this.optional(element) || size <= param;

            }, 'File size must be less than {0} Kb');

            // jQuery("#").validate({
            jQuery("#form").validate({
                // Specify validation rules
                //var val = {
                rules: {

                    semester: "required",
                    year: "required",
                    date: "required",
                    phd_work: "required",
                    // reg_no: "required",
                    supervisor_1: "required",
                    supervisor_2: "required",
                    authors: "required",
                    title_of_the_paper: "required",
                    journal: "required",
                    vol_no: "required",
                    page_no: "required",
                    attached_copy: {
                        required: true,
                        extension: "jpg,jpeg,pdf,png",
                        filesize: 500
                    }



                },
                // Specify validation error messages
                messages: {

                    attached_copy: {
                        extension: "please upload formrt jpg,png,pdf,jpeg ",
                    }
                }
                // }
            });




        });
    </script>

    <script>
        //add phd student organisation details
        var countPublicationRow = 1;
        var counterPublicationRow = 0;
        $(document).ready(function() {
            $('.add_phdstudent_organisation_dtls').click(function(e) {
                e.preventDefault();

                // var pub_authors = $('#authors').valid();
                // var pub_title_of_the_paper = $('#title_of_the_paper').valid();
                // var pub_journal = $('#journal').valid();
                // var pub_vol_no = $('#vol_no').valid();
                // var pub_page_no = $('#page_no').valid();
                // var pub_attached_copy = $('#attached_copy').valid();

                var authors = $('#authors').val();
                var title_of_the_paper = $('#title_of_the_paper').val();
                var journal = $('#journal').val();
                var vol_no = $('#vol_no').val();
                var page_no = $('#page_no').val();
                var attached_copy = $('#attached_copy_hid').val();
                //alert(attached_copy);
                //return false;





                var newRow = '<tr>' +
                    '<td>' + authors +
                    '<input type="hidden" name="pub_author[]" value="' +
                    authors + '"></td>' +
                    '<td>' + title_of_the_paper +
                    '<input type="hidden" name="pub_title_of_the_paper[]" value="' +
                    title_of_the_paper + '"></td>' +
                    '<td>' + journal +
                    '<input type="hidden" name="pub_journal[]" value="' +
                    journal + '"></td>' +
                    '<td>' + vol_no +
                    '<input type="hidden" name="pub_vol_no[]" value="' +
                    vol_no + '"></td>' +
                    '<td>' + page_no +
                    '<input type="hidden" name="pub_page_no[]" value="' +
                    page_no + '"></td>' +
                    '<td> <a href="javascript:void(0);" onclick="upload_image_view(' +
                    "'/upload/semester/publication/" +
                    attached_copy + "'" +
                    ');" >View Upload File</a><input type="hidden" name="pub_attached_copy[]" value="' +
                    attached_copy + '"> </td>' +
                    '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                    counterPublicationRow + '">Remove</button></td></tr>';
                $('.addSemPlanWord').append(newRow);
                countPublicationRow++;
                counterPublicationRow++;

            });

            $(".addSemPlanWord").on("click", ".remove_field", function(e) {
                $(this).parent('td').parent('tr').remove();
                counterPublicationRow--;
                countPublicationRow--;
            });
        });
    </script>

    <script>
        // ======== for noc  certificate

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on('change', '#attached_copy', function() {
            console.log('thumb upload');
            var name = document.getElementById("attached_copy").files[0].name;

            //alert(name);
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("attached_copy").files[0]);
            //var f = document.getElementById("file").files[0];
            form_data.append("file", document.getElementById('attached_copy').files[0]);

            $.ajax({
                url: "{{ route('sem.attached.copy') }}",
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    // $('#uploaded_image').html(data);
                    // $('#prescription_file').prop("href", data.pdf_path);
                    $('#attached_copy_hid').val(data.img_name);
                    // $('.modal-body embed').prop("src", data.pdf_path)

                }
            });

        });


        // view image in a modal ========

        function upload_image_view(url) {
            // alert(url);
            event.preventDefault();
            $('#view_upload_image').html('<embed src="' + url +
                '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
            $('#upload_image_view').modal('show');
        }

        $(document).ready(function() {

            $("#sup1").change(function() {
                var status = this.value;
                //alert(status);

                // $("#icon_class, #background_class").hide(); // hide multiple sections
                $("#sup2 option[value='" + status + "']").attr("disabled", "disabled");
            });

            $("#sup2").change(function() {
                var status = this.value;
                //alert(status);

                // $("#icon_class, #background_class").hide(); // hide multiple sections
                $("#sup1 option[value='" + status + "']").attr("disabled", "disabled");
            });

        });
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js">
    </script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.5.3/js/bootstrapValidator.min.js" integrity="sha512-Vp2UimVVK8kNOjXqqj/B0Fyo96SDPj9OCSm1vmYSrLYF3mwIOBXh/yRZDVKo8NemQn1GUjjK0vFJuCSCkYai/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"
        integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js">
    </script>
    <script src="{{ asset('admin_assets/js/date-validate.js') }}"></script>
@endsection
