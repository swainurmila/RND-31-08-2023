@extends('admin.layouts.app')
@section('heading', 'COURSEWORK ALLOTMENT')
@section('sub-heading', 'COURSEWORK ALLOTMENT')
@section('content')
    <style>
        .trbg {
            background-color: #89d4f02e;
        }

        table.table.table-bordered {
            font-size: 13px;
        }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <div class="custom-accordion">
                                @if (session()->has('message'))
                                    <br />
                                    {!! session()->get('message') !!}
                                @endif
                                <span id="msg"></span>
                                <div class="text-center">
                                    <h3>Application for Coursework Allotment in Ph.D Programme</h3>
                                </div>
                                <div class="mt-4">
                                    <table class="table table-bordered">
                                        <tr class="trbg">
                                            <th colspan="4">
                                                <h5>Student Information</h5>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>NAME OF THE STUDENT:</th>
                                            <td>{{ $details->get_application_details->name ?? '-' }}</td>
                                            <th style="width: 25%">ENROLLMENT No.:</th>
                                            <td style="width: 25%">
                                                {{ $details->get_application_details->enrollment_no ?? '-' }}</td>
                                        </tr>

                                        <tr>
                                            <th style="width: 25%">DATE OF ENROLLMENT:</th>
                                            <td style="width: 25%">
                                                {{ $details->get_application_details->enrollment_date ? Helper::date_format($details->get_application_details->enrollment_date, '-') : '-' }}
                                            </td>
                                            <th>NAME OF THE FACULTY:</th>
                                            <td colspan="3">
                                                {{ $details->get_application_details->name_of_faculty ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>NAME OF PRINCIPAL SUPERVISOR:</th>
                                            <td>{{ $details->get_application_details->get_supervisor_details->supervisor_name ?? '-' }}
                                            </td>
                                            <th>NAME OF CO-SUPERVISOR:</th>
                                            <td>{{ $details->get_application_details->get_supervisor_details->co_supervisor_name ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>BRANCH/ SPECIALIZATION:</th>
                                            <td>
                                                {{ $details->get_application_details->get_department_details->departments_title ?? '-' }}
                                            </td>
                                            <th>CASTE STATUS:</th>
                                            <td>{{ $details->get_application_details->category ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th>CATEGORY OF STUDENTSHIP:</th>
                                            <td>{{ $details->get_application_details->student_category ?? '-' }}</td>
                                            <th>NAME OF NCR:</th>
                                            <td colspan="3">
                                                {{ $details->get_application_details->get_nodal_center_details->college_name ?? '-' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>PROPOSED TITLE OF PHD THESIS:</th>
                                            <td colspan="3">
                                                {{ $details->get_application_details->topic_of_phd_work ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">BRIEF DESCRIPTION OF RESEARCH WORK PROPOSED(FROM
                                                STUDENT):
                                            </th>
                                            <td colspan="2">
                                                {{ $details->work_brief_desc ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">MAJOR EQUIPMENT/ FACILITIES NECESSARY TO
                                                CARRY OUT PROJECT AND MEANS OF OBTAINING THEM(FROM STUDENT):</th>
                                            <td colspan="2">
                                                {{ $details->equip_brief_desc ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">PLAN OF RESIDENCE ON CAMPUS:</th>
                                            <td colspan="2">{{ $details->residence_plan_desc ?? '-' }}</td>
                                        </tr>
                                    </table>

                                    <table class="table table-bordered">
                                        <tr class="trbg">
                                            <th colspan="4">
                                                <h5>Supervisor Information</h5>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="2" style="width: 50%">BRIEF DESCRIPTION OF RESEARCH WORK
                                                PROPOSED:</th>
                                            <td colspan="2">
                                                @if ($details->status !== 1)
                                                    <span>{{ $details->work_brief_desc_sup }}</span>
                                                @else
                                                    <textarea class="form-control" id="sup_research_desc" rows="3" name="sup_research_desc" required></textarea>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">MAJOR EQUIPMENT/ FACILITIES NECESSARY TO
                                                CARRY OUT PROJECT AND MEANS OF OBTAINING THEM:</th>
                                            <td colspan="2">
                                                @if ($details->status !== 1)
                                                    <span>{{ $details->equip_brief_desc_sup }}</span>
                                                @else
                                                    <textarea class="form-control" id="sup_equipment_desc" rows="3" name="sup_equipment_desc" required></textarea>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">DATE OF COMMENCEMENT OF RESEARCH WORK :</th>
                                            <td colspan="2">

                                                @if ($details->status !== 1)
                                                    <span>{{ Helper::date_format($details->date_of_commence, '-') }}</span>
                                                @else
                                                    <input type="date" class="form-control" id="sup_doc" name="sup_doc"
                                                        required></textarea>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>

                                    <div class="mt-4">
                                        <h5 style="font-weight: bold"><span>(NOTE</span><span
                                                style="color: red">*</span>:<span>&nbsp;&nbsp;&nbsp;For Course Details of
                                                Serial
                                                No.5-</span> <a href="{{ asset('assets/images/phd_course5.jpg') }}"
                                                target="_blank"><span class="badge bg-warning">click here</span></a> and For
                                            Course Details of
                                            Serial
                                            No. 2, 3, 4-</span> <a href="https://nptel.ac.in" target="_blank"><span
                                                    class="badge bg-warning">click here</span></a> or <a
                                                href="https://bput.ac.in" target="_blank"><span
                                                    class="badge bg-warning">click here</span></a>
                                            )
                                        </h5>
                                    </div>

                                    <form action="{{ route('nodalcentre.view-coursework-submit') }}" method="post"
                                        id="coursework_form" name="coursework_form">
                                        @csrf

                                        @if ($submitted)
                                            <table class="table table-bordered coursework-form-display-table">
                                                <tr class="trbg">
                                                    <th colspan="5">
                                                        <h5>COURSEWORK INFORMATION</h5>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>SL No.</th>
                                                    <th>SUBJECT CODE</th>
                                                    <th>COURSE TITLE</th>
                                                    <th>CREDITS</th>
                                                    <th>REMARKS</th>
                                                </tr>
                                                @foreach ($coursework_subjects as $key => $value)
                                                    <tr>
                                                        <td>{{ ++$key }}</td>
                                                        <td>{{ $value['subject_code'] }}</td>
                                                        <td>{{ $value['course_title'] }}</td>
                                                        <td>{{ $value['credits'] }}</td>
                                                        <td>{{ $value['remarks'] }}</td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        @else
                                       
                                            <table class="table table-bordered coursework-form-submit-table">
                                                <tr class="trbg">
                                                    <th colspan="5">
                                                        <h5>COURSEWORK INFORMATION</h5>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th>SL No.</th>
                                                    <th>SUBJECT CODE</th>
                                                    <th>COURSE TITLE</th>
                                                    <th>CREDITS</th>
                                                    <th>REMARKS</th>
                                                </tr>
                                                <tr>
                                                    <td>1</td>
                                                    <td><input type="text" class="form-control" id="subject_code[]"
                                                            name="subject_code[]" value="" required>
                                                    </td>
                                                    <td><input type="text" class="form-control" id="course_title[]"
                                                            name="course_title[]" value="Research Methodology" readonly>
                                                    </td>
                                                    <td><input type="number" class="form-control credit" id="credit1"
                                                            name="credit[]" value="4" readonly></td>
                                                    <td><input type="text" class="form-control" id="sub_remark"
                                                            name="sub_remark[]" value="Compulsary" readonly></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td><input type="text" class="form-control" id="subject_code[]"
                                                            name="subject_code[]" value="" required>
                                                    </td>
                                                    <td><input type="text" class="form-control" id="course_title[]"
                                                            name="course_title[]" value="" required>
                                                    </td>
                                                    <td><input type="number" class="form-control credit" id="credit2"
                                                            name="credit[]" value="" required></td>
                                                    <td><input type="text" class="form-control" id="sub_remark"
                                                            name="sub_remark[]" value="" required></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td><input type="text" class="form-control" id="subject_code[]"
                                                            name="subject_code[]" value="" required>
                                                    </td>
                                                    <td><input type="text" class="form-control" id="course_title[]"
                                                            name="course_title[]" value="" required>
                                                    </td>
                                                    <td><input type="number" class="form-control credit" id="credit3"
                                                            name="credit[]" value="" required></td>
                                                    <td><input type="text" class="form-control" id="sub_remark"
                                                            name="sub_remark[]" value="" required></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td><input type="text" class="form-control" id="subject_code[]"
                                                            name="subject_code[]" value="" required>
                                                    </td>
                                                    <td><input type="text" class="form-control" id="course_title[]"
                                                            name="course_title[]" value="" required>
                                                    </td>
                                                    <td><input type="number" class="form-control credit" id="credit4"
                                                            name="credit[]" value="" required></td>
                                                    <td><input type="text" class="form-control" id="sub_remark"
                                                            name="sub_remark[]" value="" required></td>
                                                </tr>
                                                <tr>
                                                    <td>5</td>
                                                    <td><input type="text" class="form-control" id="subject_code[]"
                                                            name="subject_code[]" value="" required>
                                                    </td>
                                                    <td><input type="text" class="form-control" id="course_title[]"
                                                            name="course_title[]" value=""></td>
                                                    <td><input type="number" class="form-control credit" id="credit5"
                                                            name="credit[]" value="2" readonly>
                                                    </td>
                                                    <td><input type="text" class="form-control" id="sub_remark"
                                                            name="sub_remark[]" value="Compulsary" readonly></td>
                                                </tr>
                                                <tr>
                                                    <th colspan="3" class="text-end"><span>TOTAL
                                                            COURSE CREDITS ASSIGNED</span></th>
                                                    <td colspan="2"><input type="number" class="form-control"
                                                            id="total_credit" name="total_credit" value=""
                                                            readonly>
                                                    </td>
                                                </tr>
                                            </table>
                                        @endif
                                        <div class="text-center">
                                            <input type="hidden" name="coursework_id" id="coursework_id"
                                                value="{{ $details->id }}" />
                                            <input type="hidden" name="appl_id" id="appl_id"
                                                value="{{ $details->appl_id }}" />
                                            @if ($submitted == 0)
                                                <input type="submit"
                                                    class="btn btn-primary text-uppercase text-center coursework-save disabled"
                                                    value="Submit" />
                                            @endif
                                        </div>

                                    </form>
                                    @if ($submitted)
                                        <div class="col-md-12">
                                            <span><b>COURSE WORK RECOMMENDED BY THE DSC AT THE NCR LETTER:
                                                </b></span><span><a
                                                    href="{{ route('nodalcentre.coursework-dsc-letter', $details->id) }}"
                                                    class="badge bg-success text-uppercase">DOWNLOAD</a>
                                            </span>
                                        </div>
                                    @endif
                                    <form action="{{ route('nodalcentre.view-coursework-update') }}" method="post"
                                        id="coursework_form" name="coursework_form" enctype="multipart/form-data">
                                        @csrf
                                        @if ($submitted)
                                            <div class="mt-4">
                                                <table class="table table-bordered">
                                                    <tr class="trbg">
                                                        <th colspan="5">
                                                            <h5>DSC MEMBERS REMARK</h5>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th style="width:15%">SL No.</th>
                                                        <th style="width:15%">Approval of DSC</th>
                                                        <th style="width:25%">DSC MEMBER</th>
                                                        <th>REMARKS</th>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td><input type="checkbox" id="verifys_status1"
                                                                name="verifys_status"
                                                                {{ $coursework_remarks[0]->status ? 'checked' : '' }}
                                                                onclick="return false">
                                                        </td>
                                                        <td><label for="verifys_status1">DSC
                                                                Member-1(Chairperson)</label><br>
                                                        </td>
                                                        <td>{{ $coursework_remarks[0]->remarks ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td><input type="checkbox" id="verifys_status2"
                                                                name="verifys_status"
                                                                {{ $coursework_remarks[1]->status ? 'checked' : '' }}
                                                                onclick="return false">
                                                        </td>
                                                        <td><label for="verifys_status2">DSC
                                                                Member-2(CO-chairperson)</label><br>
                                                        </td>
                                                        <td>{{ $coursework_remarks[1]->remarks ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td><input type="checkbox" id="verifys_status3"
                                                                name="verifys_status"
                                                                {{ $coursework_remarks[2]->status ? 'checked' : '' }}
                                                                onclick="return false">
                                                        </td>
                                                        <td><label for="verifys_status3">DSC Member-3(Expert
                                                                Member)</label><br>
                                                        </td>
                                                        <td>{{ $coursework_remarks[2]->remarks ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td><input type="checkbox" id="verifys_status4"
                                                                name="verifys_status"
                                                                {{ $coursework_remarks[3]->status ? 'checked' : '' }}
                                                                onclick="return false">
                                                        </td>
                                                        <td><label for="verifys_status4">DSC Member-4(Expert
                                                                Member)</label><br>
                                                        </td>
                                                        <td>{{ $coursework_remarks[3]->remarks ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td><input type="checkbox" id="verifys_status5"
                                                                name="verifys_status"
                                                                {{ $coursework_remarks[4]->status ? 'checked' : '' }}
                                                                onclick="return false">
                                                        </td>
                                                        <td><label for="verifys_status5">DSC
                                                                Member-5(Supervisor)</label><br>
                                                        </td>
                                                        <td>{{ $coursework_remarks[4]->remarks ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td><input type="checkbox" id="verifys_status6"
                                                                name="verifys_status"
                                                                {{ $coursework_remarks[5]->status ? 'checked' : '' }}
                                                                onclick="return false">
                                                        </td>
                                                        <td><label for="verifys_status6">DSC
                                                                Member-6(Co-Supervisor)</label><br>
                                                        </td>
                                                        <td>{{ $coursework_remarks[5]->remarks ?? '' }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        @endif
                                        @if ($submitted)
                                            @if ($details->status == 2)
                                                <div class="col-md-12">
                                                    <span><b>COURSE WORK RECOMMENDED BY THE DSC AT THE NCR LETTER :
                                                        </b></span><span><input type="file" class="file"
                                                            name="dsc_letter" id="dsc_letter" required>
                                                    </span>
                                                </div>
                                            @else
                                                <div class="col-md-12">
                                                    <span><b>COURSE WORK RECOMMENDED BY THE DSC AT THE NCR LETTER :
                                                        </b></span><span>
                                                        {{-- <a href="javascript:void(0);"
                                                onclick="view_file('/upload/dsc_coursework_letter/{{ $details->dsc_letter}}')">View</a> --}}
                                                        <a href="javascript:void(0);"
                                                            onclick="upload_image_view('{{ $details->dsc_letter }}')"
                                                            class="badge bg-success">View Letter</a>
                                                    </span>
                                                </div>
                                            @endif
                                            <br><br>
                                            @if ($details->status == 2)
                                                <div id="resultDiv" class="row">
                                                    <div class="col-md-2">
                                                        <span>Recommendation of NCR</span>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <select name="ncr_recommendation_status"
                                                            id="ncr_recommendation_status" class="form-control" required>
                                                            <option value="">--------select--------</option>
                                                            <option value="4">Recommend</option>
                                                            <option value="5">Not Recommended</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <span>Comment:</span>
                                                    </div>
                                                    <div class="col-md-5">

                                                        <textarea name="coursework_nodal_remarks" id="coursework_nodal_comment" class="form-control" cols="30"
                                                            rows="2" placeholder="Enter Coursework remarks here..." required></textarea>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="text-center">
                                                    <input type="hidden" name="coursework_id" id="coursework_id"
                                                        value="{{ $details->id }}" />
                                                    <input type="submit" id="submitBtn"
                                                        class="btn btn-primary text-uppercase text-center"
                                                        value="Submit" />
                                                </div>
                                            @else
                                                <div class="col-md-12">
                                                    <b><span>Nodal Center Remark:
                                                        </span><span>{{ $details->nodal_comment }}</span></b>
                                                </div><br>
                                                <div class="text-center">
                                                    <a class="btn btn-block btn-primary"
                                                        href="{{ url()->previous() }}">Back</a>
                                                </div>
                                            @endif
                                        @endif
                                        <div class="text-center">
                                            <input type="hidden" name="coursework_id" id="coursework_id"
                                                value="{{ $details->id }}" />
                                            <input type="hidden" name="appl_id" id="appl_id"
                                                value="{{ $details->appl_id }}" />


                                            {{-- <a class="btn btn-block btn-primary" href="{{ url()->previous() }}">Back</a> --}}
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="upload_image_view">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close text-red" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                <div class="modal-body">
                    <div id="view_upload_image"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        const creditInputs = document.querySelectorAll('.credit');

        // Add event listeners to each input to listen for changes
        creditInputs.forEach(input => {
            input.addEventListener('input', calculateTotalCredits);
        });

        // Function to calculate the total credits
        function calculateTotalCredits() {
            let totalCredits = 0;
            // Loop through each credit input and sum the values
            creditInputs.forEach(input => {
                const creditValue = parseFloat(input.value);
                if (!isNaN(creditValue)) {
                    totalCredits += creditValue;
                }
            });

            // Update the value of the 'total_credit' input
            const totalCreditInput = document.getElementById('total_credit');
            totalCreditInput.value = totalCredits;
            if (totalCredits >= 8 && totalCredits <= 16) {
                $('.coursework-save').removeClass('disabled')
            } else {
                iziToast.warning({
                    title: 'Warning',
                    message: 'Total credit should be between 8 and 16',
                    position: 'topRight'
                });
                $('.coursework-save').addClass("disabled");
            }
        }
    </script>
    <script>
        function upload_image_view(url) {
            event.preventDefault();
            $('#view_upload_image').html('<embed src="' + url +
                '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
            $('#upload_image_view').modal('show');
        }
    </script>
    <script>
        if ($('input:checkbox:checked').length < 6) {
            $('#submitBtn').prop("disabled", true);
        } else {
            $('#submitBtn').prop("disabled", false);
        }
    </script>
@endsection
