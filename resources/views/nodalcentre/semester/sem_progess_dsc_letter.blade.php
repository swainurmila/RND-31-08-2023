<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .dsc-sign{
            margin-left: 25px;
        }
        .dsc-div {
            margin-left: 250px;
        }

        .centered-div {
            display: flex;
            margin-left: 60px;
        }

        .sub-heading {
            margin-left: 120px;
        }

        table,
        td,
        th {
            border: 1px solid;
        }

        th,
        td {
            padding: 6px;
        }

        table {
            border-collapse: collapse;
            font-size: 15px;
            width: 100%;
            padding: 3px;
        }

        .Signature-right {
            float: right;
        }

        .formdate-right {
            float: right;
        }

        .semester-progress {
            border: 1px solid #000000;
            font-size: 15px;
        }

        body {
            color: #000000d6;
        }

        p {
            margin-left: 5px;
        }
    </style>
</head>

<body>
    <div class="letter-container">
        <div class="row">
            <div class="centered-div">
                <h3 class="text-center"><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA,
                        ROURKELA</b></h3>
                <h3 class="sub-heading"><b>SEMESTER PROGRESS REPORT
                        {{ date('Y') }}</b></h3>
            </div>


            <div class="row semester-progress">


                <table>
                    <tr>
                        <th style="width: 33.33%">Semester</th>
                        <th>Year</th>
                        <th>Date</th>
                    </tr>
                    <tr>
                        <td>Semester {{ $student_sem_detaills->sem }}</td>
                        <td>{{ $student_sem_detaills->year }}</td>
                        <td>{{ $student_sem_detaills->date }}</td>
                    </tr>
                </table>
                <br>
                <table>

                    <tr>
                        <td>Name of the Research Student</td>
                        <td>
                            {{ $student_sem_detaills->name }}
                        </td>
                    </tr>
                    <tr>
                        <td>Name of the Faculty</td>
                        <td>
                            {{ $student_sem_detaills->faculty_name }}
                        </td>
                    </tr>

                    <tr>
                        <td>Topic of Ph.D. work</td>
                        <td>
                            {{ $student_sem_detaills->phd_work }}
                        </td>
                    </tr>
                    <tr>
                        <td>Name of the NCR <br> where research is being conducted</td>
                        <td>
                            {{ $student_sem_detaills->college_name }}
                        </td>
                    </tr>

                    <tr>
                        <td>Enrollment No. </td>
                        <td>
                            {{ $student_sem_detaills->enrollment_no }}
                        </td>
                    </tr>
                    <tr>
                        <td>Date of Enrollment</td>
                        <td>
                            {{ $student_sem_detaills->enrollment_date }}
                        </td>
                    </tr>
                    <tr>
                        <td>Registration. No.</td>
                        <td>
                            {{ $student_sem_detaills->reg_no ? $student_sem_detaills->reg_no : '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td>Date of Registration.</td>
                        <td>
                            {{ $student_sem_detaills->reg_date }}
                        </td>
                    </tr>

                    <tr>
                        <td>
                            Research Supervisor name
                        </td>
                        <td colspan="3">
                            1.)<span style="text-transform: capitalize;">
                                {{ $supervisor->sup_name }}</span>
                            <br>
                            <br>
                            2.) @if ($cosupervisor)
                                <span style="text-transform: capitalize;">{{ $cosupervisor->cosupsup_name }}</span>
                            @endif

                        </td>

                    </tr>

                </table>
                <p><b>1. Progress Against Planned Work</b></p>
                <table>
                    <tr>
                        <td rowspan="2">Semester/Half-Year after Registration</td>
                        <td colspan="2">Duration</td>
                        <td rowspan="2">Planned work</td>
                        <td rowspan="2">Actual Work</td>
                    </tr>
                    <tr>
                        <td>From </td>
                        <td>To</td>
                    </tr>
                    <tr>
                        <td>{{ $student_sem_detaills->semester }}</td>
                        <td>{{ $student_sem_detaills->form_date }}</td>
                        <td>{{ $student_sem_detaills->to_date }}</td>
                        <td>
                            {{ $student_sem_detaills->planned_work }}
                        </td>
                        <td>
                            {{ $student_sem_detaills->actual_work }}
                        </td>
                    </tr>
                </table>
                <br>
                <table>
                    <tr>
                        <th>2.Brief Description of work done in the preceding semester(10 lines)</th>
                        {{-- <th>Difficulties Encountered:</th> --}}
                    </tr>
                    <tr>
                        <td>{{ $student_sem_detaills->desc_work }}</td>
                        {{-- <td>{{ $student_sem_detaills->difficulties_encounter }}</td> --}}
                    </tr>
                </table>
                <br>
                <p><b>3. Details of Publication</b></p>
                <table>
                    <tr>
                        <td>Sl.No</td>
                        <td>Authors</td>
                        <td>Title of the paper</td>
                        <td>Journal / conferences</td>
                        <td>Volume & No / Venue & Dates</td>
                        <td>Page No.</td>
                        <td>Copy attached(YES / NO)</td>
                    </tr>

                    @foreach ($sem_publication as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->author }} </td>
                            <td>{{ $item->title_paper }}</td>
                            <td>{{ $item->journal }}</td>
                            <td>{{ $item->vol_no }}</td>
                            <td>{{ $item->page_no }}</td>
                            <td>
                                @if ($item->attach_file)
                                    Yes
                                @else
                                    No
                                @endif
                                {{-- <a href="javascript:void(0);"
                                    onclick="view_file('/upload/semester/publication/{{ $item->attach_file }}')">View</a> --}}
                            </td>
                        </tr>
                    @endforeach

                </table>
                <br>

                <table>
                    <tr>
                        <th>4.Difficulties Encountered:</th>
                    </tr>
                    <tr>
                        <td>{{ $student_sem_detaills->difficulties_encounter }}</td>
                    </tr>
                </table>


                <hr>
                <div class="dsc-div">
                    <h4><u>Recommendation of DSC</u></h4>
                </div>
                <p>The student has delivered six monthly progress seminar in an open seminar at the NCR in our presence
                    on the progress made in the last semester and Recommended for semester registration</p>
                <hr>
                <br><br>
                <div class="dsc-sign">
                    <div class="DSC-members-1">
                        <span class="member-1">(DSC Member)</span><span class="member-2"
                            style="margin-left: 140px;">(DSC
                            Member)</span><span class="member-3" style="margin-left: 140px;">(DSC Member)</span>
                    </div>
                    <div class="DSC-members-2" style="margin-top: 55px;">
                        <span class="member-4">(Supervisor)</span><span class="member-5"
                            style="margin-left: 150px;">(Co-Supervisor)</span><span class="member-4"
                            style="margin-left: 150px;">(Chairperson, DSC)</span>
                    </div>
                </div>
                <hr>
                <p>Forwarded to the PIC(R&D), BPUT, Rourkela for information & necessary action</p>
                <br>
                <span>Date:</span><span style="margin-left: 460px;">(Head of the NCR)</span>
                <hr>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
