@extends('admin.layouts.app')
@section('heading', $page_title)
@section('sub-heading', 'Verify Student')
@section('content')
    <style>
        .trbg {
            background-color: #89d4f02e;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #e2dcdc;
            text-align: left;
            padding: 8px;
        }

        .select2-selection {
            background-color: #efefef !important;
            color: #000000;
        }

        .select2-selection__choice__display {
            color: #000000;
        }

        .select2-search--dropdown {
            background-color: #e2fc1a;
        }

        .select2-search__field {
            background-color: #000000;
        }

        .select2-results {
            background-color: #abd2e3;
            color: #000000;
        }

        .print-heading {
            display: none;
        }

        .form-footer {
            display: none;
        }

        @media print {

            .print-button,
            .back-button,
            .submit-button,
            .remark-div {
                display: none;
            }

            .print-heading {
                display: block;
            }

            .form-footer {
                display: block;
            }

            .sup-signature {
                padding-left: 200px;
            }

            .sup-note {
                margin-top: -40px;
            }
        }
    </style>

    <div class="row">
        @if (session()->has('success'))
            <br />
            {!! session()->get('success') !!}
        @endif
        <div class="panel-container show" role="content">
            <div class="panel-content">
                <div class="card">
                    <div class="card-body">
                        <div class="panel-container show" role="content">
                            <div class="panel-content">
                                <table>
                                    <tr class="trbg">
                                        <th colspan="4">
                                            <h5>Presonal Information
                                                <span
                                                    class="badge bg-{{ Helper::appliedApplicationStatusColor($student['application_status']) }} float-end text-uppercase p-1">
                                                    Application Status :
                                                    {{ Helper::appliedApplicationStatus($student['application_status']) }}
                                                </span>
                                            </h5>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Enrollment Number</th>
                                        <th>{{ $student['enrollment_no'] }}</th>
                                        <th>Enrollment Date</th>
                                        <td>{{ Helper::date_format($student['enrollment_date'], '-') }}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Candidate Name: </b> </td>
                                        <td>{{ $student['name'] }}</td>
                                        <td style="text-align:right;">
                                            @php
                                                $img = $student['photo'] != '' ? $student['photo'] : 'student.jpg';
                                            @endphp
                                            <img src="{{ asset('/upload/photo/' . $img) }}" alt="Student Photo"
                                                style="max-width: 80px;">

                                        </td>
                                        <td style="text-align:center;">
                                            <img src="{{ asset('/upload/signature/' . $student['signature']) }}"
                                                alt="Signature" style="max-width: 80px;">

                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Name Of NCR And Department:</b></td>
                                        <td>{{ $student['ncr_department'] }}</td>
                                        <td><b>Father's / Husband's Name:</b></td>
                                        <td>{{ $student['father_husband'] }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Mother's Name:</b></td>
                                        <td>{{ $student['mother'] }}</td>
                                        <td><b>Nodal Centre:</b></td>
                                        <td>{{ $student['college_name'] }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Permanent Address:</b></td>
                                        <td>{{ $student['permannt_address'] }}</td>
                                        <td><b>Present Address:</b></td>
                                        <td>{{ $student['present_address'] }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Email:</b></td>
                                        <td>{{ $student['email'] }}</td>
                                        <td><b>Phone No:<b></td>
                                        <td>{{ $student['phone'] }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Date Of Birth:</b></td>
                                        <td>{{ Helper::date_format($student['dob'], '-') }}</td>
                                        <td><b>Nationality:</b></td>
                                        <td>{{ $student['nationality'] }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Student Category:</b></td>
                                        <td>{{ $student['student_category'] }}</td>
                                        <td><b>Caste:</b></td>
                                        <td>{{ $student['category'] }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>PWD Certificate:</b></td>
                                        <td>
                                            @if ($student['hadicap_certificate'] != '')
                                                <a href="javascript:void(0);"
                                                    onclick="view_file('/upload/hadicap_certificate/{{ $student['hadicap_certificate'] }}')">View</a>
                                            @else
                                                <span class="text-warning">Not Available</span>
                                            @endif
                                        </td>
                                        <td><b>Caste Certificate:</b></td>
                                        <td>
                                            @if ($student['category_certificate'] != '')
                                                <a href="javascript:void(0);"
                                                    onclick="view_file('/upload/caste_certificate/{{ $student['category_certificate'] }}')">View</a>
                                            @else
                                                <span class="text-warning">Not Available</span>
                                            @endif
                                            {{-- <a href="javascript:void(0);"
                                                onclick="view_file('/upload/caste_certificate/{{ $student['category_certificate'] }}')">View</a> --}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Aadhar Card Number:</b></td>
                                        <td>{{ $student['aadhar_card'] }}</td>
                                        <td><b>Aadhar Card:</b></td>
                                        <td>
                                            <a href="javascript:void(0);"
                                                onclick="view_file('/upload/aadhar/{{ $student['aadhar_certificate'] }}')">View</a>
                                        </td>
                                    </tr>
                                </table>
                                <table class="mt-2">
                                    <tr class="trbg">
                                        <th colspan="4">
                                            <h5>Payment Details</h5>

                                        </th>
                                    </tr>
                                    @if (!empty($transaction_history))
                                        <tr>
                                            <th>Transaction ID:</b></th>
                                            <td>{{ $transaction_history->transaction_id }}</td>
                                            <th>Invoice:</th>
                                            <td style="text-align:center;"><a href="javascript:void(0);"
                                                    onclick="viewInvoice('{{ $student['id'] }}');"><i
                                                        class="far fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="panel-container show" role="content">
                            <div class="panel-content">
                                <table>
                                    <tr class="trbg">
                                        <th colspan="10">
                                            <h5>Information Respect To Qualification</h5>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Exam Passed</th>
                                        <th>Specialization</th>
                                        <th>Board / University</th>
                                        <th>Year Of Passing</th>
                                        <th>Class / Division</th>
                                        <th>% Marks/ CGPA</th>
                                        <th>view certificate</th>
                                        <th>view Marksheet</th>
                                        {{-- <th>Remarks</th> --}}
                                    </tr>
                                    @foreach ($student_qualifications as $key => $value)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $value->exam_passed }}</td>
                                            <td>{{ $value->Specialization }}</td>
                                            <td>{{ $value->board_university }}</td>
                                            <td>{{ $value->year_of_passing }}</td>
                                            <td>{{ $value->division }}</td>
                                            <td>{{ $value->percentage }}</td>
                                            <td><a href="javascript:void(0);"
                                                    onclick="view_file('/upload/phdstudent/{{ $value->certificate }}')">View</a>
                                            </td>
                                            <td><a href="javascript:void(0);"
                                                    onclick="view_file('/upload/phdstudent/{{ $value->marksheet }}')">View
                                            </td>
                                            {{-- <td>
                                                <input type="hidden" name="qualification_id[]" value="{{ $value->id }}">
                                                <textarea required name="qualification_remarks[]" class="form-control">{{ $value->nodal_remarks != '' ? $value->nodal_remarks : '' }}</textarea>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="panel-container show" role="content">
                            <div class="panel-content">
                                @php
                                    $oraga = count($organisation);
                                    $dse = $supervisor->co_supervisor_name;
                                @endphp
                                <table>
                                    <tr class="trbg">
                                        <th colspan="6">
                                            <h5>Organisation where working</h5>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Organisation Name</th>
                                        <th>Designation</th>
                                        <th>Duration</th>
                                        <th>Nature Of Job</th>
                                        {{-- <th>Remarks</th> --}}
                                    </tr>
                                    @if ($oraga > 0)
                                        @foreach ($organisation as $key => $value)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $value->organisation_name }}</td>
                                                <td>{{ $value->designation }}</td>
                                                <td>{{ $value->duration }}</td>
                                                <td>{{ $value->natutre_of_job }}</td>
                                                {{-- <td>
                                                    <input type="hidden" name="org_id[]" value="{{ $value->id }}">
                                                    <textarea required name="org_remarks[]" class="form-control">{{ $value->nodal_remarks != '' ? $value->nodal_remarks : '' }}</textarea>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center bg-warning text-white">No organisation
                                                mention
                                            </td>
                                        </tr>
                                    @endif


                                </table>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="panel-container show" role="content">
                            <div class="panel-content">
                                <table>
                                    <tr class="trbg">
                                        <th colspan="6">
                                            <h5>Other Documents</h5>
                                        </th>

                                    </tr>
                                    <tr>
                                        <th>Sl No.</th>
                                        <th>Document Name</th>
                                        <th>Document</th>
                                        {{-- <th>Remarks</th> --}}
                                    </tr>
                                    @if (count($documents) > 0)
                                        @foreach ($documents as $key => $value)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $value->doc_title }}</td>
                                                <td><a href="javascript:void(0);"
                                                        onclick="view_file('/upload/phdstudent/other_doc/{{ $value->doc_path }}')">View</a>
                                                </td>
                                                {{-- <td>
                                                    <input type="hidden" name="oth_doc_id[]" value="{{ $value->id }}">
                                                    <textarea required name="oth_doc_remarks[]" class="form-control">{{ $value->nodal_remark != '' ? $value->nodal_remark : '' }}</textarea>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center bg-warning text-white">No Documents Upload
                                            </td>
                                        </tr>
                                    @endif


                                </table>

                                <table class="mt-2">
                                    <tr class="trbg">
                                        <th>
                                            <h5>PHD Signed Application File</h5>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="javascript:void(0)"
                                                onclick="view_file('/upload/phd_app_certi/{{ $student->phd_app_file }}')">
                                                View Upload File</a>
                                        </td>
                                    </tr>
                                </table>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <table>
                            <tr class="trbg">
                                <th colspan="4">
                                    <h5>Supervisor Details</h5>
                                </th>
                            </tr>
                            <tr>
                                <td><b>Proposed Supervisor Name:</b></td>
                                <td>{{ $supervisor->supervisor_name }}</td>
                                <td><b>Supervisor Address:</b></td>
                                <td>{{ $supervisor->supervisor_address }}</td>
                            </tr>
                            <tr>
                                <td><b>Supervisor E-Mail Id:</b></td>
                                <td>{{ $supervisor->supervisor_email }}</td>
                                <td><b>Supervisor Phone:</b></td>
                                <td>{{ $supervisor->supervisor_phone }}</td>
                            </tr>
                            @if ($dse != '')
                                <tr>
                                    <td><b>Proposed DSE Name:</b></td>
                                    <td>{{ $supervisor->co_supervisor_name }}</td>
                                    <td><b>DSE E-Mail:</b></td>
                                    <td>{{ $supervisor->co_supervisor_email }}</td>
                                </tr>
                                <tr>
                                    <td><b>DSE Address :</b></td>
                                    <td>{{ $supervisor->co_supervisor_address }}</td>
                                    <td><b>DSE Phone :<b></td>
                                    <td>{{ $supervisor->co_supervisor_phone }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <form method="POST" id="dsc_expert_form" action="javscript:void(0)" enctype="multipart/form-data">
                            @csrf
                            <span class="text-center print-heading">
                                <h4>PHD Application Preview</h4>
                            </span>
                            <input name="appl_id" type="hidden" id="appl_id"
                                value="{{ $application['application_id'] }}" />
                            <input name="stud_id" type="hidden" id="stud_id" value="{{ $application['stud_id'] }}" />
                            <input name="dept_id" type="hidden" id="dept_id"
                                value="{{ $application['academic_programme'] }}" />
                            <div class="row {{ $domain_experts_details->isNotEmpty() ? 'd-none' : '' }}">
                                <div class="form-group col-md-12 mt-2">
                                    <label for="exampleInputNameOfNcr">Domain Experts from inside Odisha (Atleast
                                        one Expert
                                        external to that BPUT - NCR)</label>
                                    <div class="row">
                                        <div class="col-md-11">
                                            <input class="prompt" type="text" placeholder="Search professors..." />
                                        </div>
                                        <div class="col-md-1">
                                            <a onclick="btn_handler()" class="btn btn-primary show_dsc_data_btn">Show</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="domain_experts_details_container" class="d-none mt-3">
                                <table class="table table-responsive">
                                    <thead style="background-color: #2d446e; color: #fffffd">
                                        <th>SlNo</td>
                                        <th>Name</td>
                                        <th>Designation</td>
                                        <th>Address</td>
                                        <th>Email</td>
                                        <th>Mobile No</td>
                                    </thead>
                                    <tbody id="domain_experts_details">
                                    </tbody>
                                </table>
                            </div>
                            <div id="domain_experts_details_container_server"
                                class="{{ $domain_experts_details->isNotEmpty() ? '' : 'd-none' }} mt-3">
                                <table class="table table-responsive">
                                    <thead style="background-color: #2d446e; color: #fffffd">
                                        <th>SlNo</td>
                                        <th>Name</td>
                                        <th>Designation</td>
                                        <th>Address</td>
                                        <th>Email</td>
                                        <th>Mobile No</td>
                                    </thead>
                                    <tbody id="domain_experts_details">
                                        @foreach ($domain_experts_details as $key => $dsc)
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $dsc['name'] }}</td>
                                                <td>{{ app\Helpers\Helpers::professorsDesignation($dsc['designation']) }}
                                                </td>
                                                <td>{{ $dsc['address'] }}</td>
                                                <td>{{ $dsc['email_id'] }}</td>
                                                <td>{{ $dsc['contact_no'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <br />

                            <div class="col-md-12 text-center mt-3">
                                {{-- <button type="submit"
                                    class="btn btn-primary text-uppercase text-center dsc-save disabled {{ $domain_experts_details->isNotEmpty() ? 'd-none' : '' }}">Save</button> --}}

                                <button
                                    class="btn btn-primary text-uppercase text-center dsc-save disabled {{ $domain_experts_details->isNotEmpty() ? 'd-none' : '' }}">Next</button>
                            </div>


                            @if ($domain_experts_details->isNotEmpty())
                                <div class="col-md-12 text-left sup-note">
                                    <span>
                                        <b>Note: </b>
                                        <span>It is necessary for supervisors to mention eight names of domain
                                            experts with
                                            proven research potentials not below the rank of Associate
                                            professors/SCientist
                                            with
                                            Ph.D in the list as per the performa given for the persual of the
                                            Honorable Vice
                                            Chancellor, Biju Patnaik University of Technology, Odisha. The persons
                                            suggested
                                            ,
                                            should be actibely engaged in research workin the concerned
                                            area/subject.</span>
                                    </span>
                                </div>
                                <br />

                                <div class="row mb-3 form-footer">
                                    <div class="col-md-6">
                                        <b>Date:</b>
                                    </div>
                                    <div class="col-md-6 text-end sup-signature">
                                        Signature of Research Supervisor with Name & Designation and Affiliation
                                    </div>
                                </div>

                                @if (!empty($tbl_remarks))
                                    <div class="row mt-3 remark-div">
                                        {{-- <div class="col-md-6">
                                            <span>Recommendation of NCR :
                                                <b>{{ $application['application_status'] == 2 ? 'Recommended' : 'Not Recommended' }}</b></span>
                                        </div> --}}
                                        <div class="col-md-12">
                                            <span>Comments : </span><b>{{ $tbl_remarks ?? '' }}</b>
                                        </div>
                                    </div>
                                @else
                                    <div class="row mt-3 remark-div">
                                        <div class="col-md-2">
                                            <span>Recommendation of NCR</span>
                                        </div>
                                        <div class="col-md-3">
                                            <select name="ncr_recommendation_status" id="ncr_recommendation_status"
                                                class="form-control" required>
                                                <option value="">-----select-----</option>
                                                <option value="2">Recommend</option>
                                                <option value="3">Not Recommended</option>
                                            </select>
                                        </div>
                                        <div class="col-md-1">
                                            Comments
                                        </div>
                                        <div class="col-md-6">
                                            <textarea name="domain_expert_remarks" id="domain_expert_remarks" class="form-control" cols="30"
                                                rows="2" placeholder="Enter domain expert remarks here..." required>{{ $tbl_remarks ?? '' }}</textarea>
                                        </div>
                                    </div>
                                @endif
                                {{-- @if (empty($application['application_status'])) --}}
                                <div class="col-md-12 text-center mt-3">
                                    <a href="{{ route('applied-students-approval') }}"
                                        class="btn btn-primary text-uppercase text-center back-button">Back</a>
                                    <button class="btn btn-primary text-uppercase text-center print-button"
                                        id="print-button">Print</button>
                                    @if (empty($tbl_remarks))
                                        <button type="submit"
                                            class="btn btn-primary text-uppercase text-center submit-button">Submit</button>
                                    @endif
                                </div>

                            @endif
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var content = [];
        var domain_expert = [];
        var table_data = [];
        let desg = ['', 'Professor', 'Associate Professor', 'Chairperson', 'Co-Chairperson'];
        $(document).ready((e) => {
            let dept_id = $('#dept_id').val();
            $.ajax({
                type: 'post',
                url: "{{ route('supervisor.respect.to.department') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "appl_id": $('#appl_id').val(),
                    "dept_id": dept_id
                },
                success: function(data) {
                    data.data.map((items) => {
                        content.push({
                            'id': items.id, //items.professor_id,
                            'text': items.name,
                            'address': items.address,
                            'contact_no': items.contact_no,
                            'email_id': items.email_id,
                            'designation': items.designation,
                            'proffesor_type': items
                                .employee_type, //items.proffesor_type,
                        })
                    })
                    $(".prompt").select2({
                        data: content,
                        // minimumInputLength: 2,
                        width: "100%",
                        multiple: true,
                        placeholder: "Enter First Name",
                        // templateResult:formatState
                    });
                },
                error: function(error) {
                    console.log(error)
                }
            });
        });

        var counter = 1;

        function btn_handler() {
            table_data = [];
            // console.log(counter);
            var names = $(".prompt").select2("data");
            if (names.length != 8) {
                // console.log(names)
                domain_expert = [];
                iziToast.warning({
                    title: 'Warning',
                    message: 'Please, select atleast 8 Professors.',
                    position: 'topRight'
                });

                names.map((items) => {
                    table_data.push({
                        id: items.id,
                        name: items.text,
                        email_id: items.email_id,
                        contact_no: items.contact_no,
                        address: items.address,
                        designation: items.designation,
                    })
                })

                let html = '';
                table_data.map((d, k) => {
                    html += `<tr>
                                <td>${++k}</td>
                                <td>${d.name}</td>
                                <td>${desg[d.designation]}</td>
                                <td>${d.address}</td>
                                <td>${d.email_id}</td>
                                <td>${d.contact_no}</td>
                            </tr>`
                });
                $('#domain_experts_details_container').removeClass('d-none');
                $('#domain_experts_details').html(html);
                $('.dsc-save').addClass('disabled');
                counter = 1;
            } else {
                if (counter == 1) {
                    // console.log('k'+counter);
                    names.map((items) => {
                        domain_expert.push(items.id)
                    })
                    counter++;
                } else {
                    counter = 2;
                }

                names.map((items) => {
                    table_data.push({
                        id: items.id,
                        name: items.text,
                        email_id: items.email_id,
                        contact_no: items.contact_no,
                        address: items.address,
                        designation: items.designation,
                    })
                })

                // table formation 
                let html = '';
                table_data.map((d, k) => {
                    html += `<tr>
                                <td>${++k}</td>
                                <td>${d.name}</td>
                                <td>${desg[d.designation]}</td>
                                <td>${d.address}</td>
                                <td>${d.email_id}</td>
                                <td>${d.contact_no}</td>
                            </tr>`
                });

                $('#domain_experts_details_container').removeClass('d-none');
                $('#domain_experts_details').html(html);
                table_data = [];
                $('.dsc-save').removeClass('disabled')
            }
        }

        $('#dsc_expert_form').on('submit', (e) => {
            $('.dsc-save').addClass('disabled');
            let url =
                "{{ $domain_experts_details->isEmpty() ? route('submit.dsc.expert') : route('submit.dsc.recommendation') }}";
            let appl_id = $('#appl_id').val();
            let domain_expert_remarks = $('#domain_expert_remarks').val();
            let ncr_recommendation_status = $('#ncr_recommendation_status').val();
            let datas = {{ $domain_experts_details->isEmpty() ? 1 : 2 }};

            let data = (datas == 1) ? {
                appl_id: appl_id,
                domain_expert: domain_expert
            } : {
                appl_id: appl_id,
                domain_expert: domain_expert_remarks,
                ncr_recommendation_status: ncr_recommendation_status,
            };

            console.log(domain_expert);
            table_data = [];
            $.ajax({
                type: 'post',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: data,
                success: function(data, jqXHR, textStatus, errorThrown) {
                    if (textStatus.status == 206) {
                        setInterval('location.reload()', 1000);
                    } else {
                        location.replace('{{ route('applied-students-approval') }}');
                    }
                },
                error: function(error) {
                    console.log(error)
                }
            });
        })

        // For PRINT button
        document.getElementById('print-button').addEventListener('click', function() {
            window.print();
        });
    </script>
@endsection
