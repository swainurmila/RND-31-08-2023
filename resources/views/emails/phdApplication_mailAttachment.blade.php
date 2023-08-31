<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .centered-div {
            display: grid;
            place-items: center;
            margin-left: 100px;
        }

        .sub-heading {
            margin-top: -5px;
        }

        table,
        td,
        th {
            border: 1px solid;
        }

        th,
        td {
            padding: 3px;
        }

        table {
            border-collapse: collapse;
            font-size: 13px;
            margin-left: -20px;
        }

        .Signature-right {
            float: right;
        }

        .formdate-right {
            float: right;
        }

        .form-container {
            /* outline: 1px solid #000000; */
            font-size: 13px;
        }

        body {
            color: #000000d6;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <div class="row">
            <div class="centered-div">
                <h3>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</h3>
                <h4 class="sub-heading"><u>OFFICE ORDER ON FORMATION OF DSC FOR THE RESEARCH SCHOLAR</u>
                </h4>
                <span>No:BPUT/R&D/{{ $student_details['notification_no'] }}</span><span
                    style="margin-left:250px">Date:{{ date('d/m/Y', strtotime($student_details['notification_date'])) }}</span>
                {{-- <div class="col-md-6">
                    <span>No:BPUT/R&D/{{ $student_details['notification_no'] }}</span>
                </div>
                <div class="col-md-6">
                    <span>Date:{{ date('d/m/Y', strtotime($student_details['notification_date'])) }}</span>
                </div> --}}
                <p>The undersigned is pleased to convey the enrolment and formation
                    of DSC of the
                    following student in
                    Ph.D Programme of the University as per approval of the competent authority.</p>
                <table>
                    <tr>
                        <td style="width:15%">1</td>
                        <td style="width:28%">Name of Candidate</td>
                        <td>{{ $student_details['name'] }}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Father's/ Husband's Name</td>
                        <td>{{ $student_details['father_name'] }}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Address for Coresspondence</td>
                        <td>{{ $student_details['address'] }}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Enrollment no. & Date</td>
                        <td>{{ $student_details['enrollment_no'] . ' & ' . $student_details['enrollment_date'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Department/ NCR to which Admitted</td>
                        <td>{{ $student_details['department'] }}</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Date of Birth</td>
                        <td>{{ $student_details['dob'] }}</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Category(SC/ST/GEN)</td>
                        <td>{{ $student_details['category'] }}</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Category of Studentship(Full Time/ Part Time/ Full Time Special)</td>
                        <td>{{ $student_details['category_of_studentship'] }}</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>Faculty(Engg./ Pharm. Etc)</td>
                        <td>{{ $student_details['faculty_name'] }}</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Discipline/ Specialization</td>
                        <td>{{ $student_details['descipline'] }}</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>Board Area of Research Proposed</td>
                        <td>{{ $student_details['broad_area_of_research_proposed'] }}</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>For Sponsored Student(Place of Employeement)</td>
                        <td>{{ $student_details['place_of_employment'] }}</td>
                    </tr>
                    <tr>
                        <td>13</td>
                        <td>Name and Address of the Supervisors</td>
                        <td>
                            <div class="mt-1">
                                <span>a) Supervisor:
                                </span><span>{{ $student_details['supervisor_name'] }},</span><br /><span>{{ $student_details['supervisor_address'] }}</span>
                            </div>
                            <div class="mt-1">
                                <span>b) Co-supervisor:
                                </span><span>{{ $student_details['co_supervisor_name'] }},</span><br /><span>{{ $student_details['co_supervisor_address'] }}</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>14</td>
                        <td>Doctoral Scrutiny Committee of the Student</td>
                        <td>
                            <div class="mt-1">
                                <span>1) <u>{{ $student_details['chairperson'] }}</u> </span><span>Head
                                    of the
                                    Institute(NCR)
                                    Chairperson</span>
                            </div>
                            <div class="mt-1">
                                <span>2) </span> <u>{{ $student_details['co_chairperson'] }}</u>
                                <span>(Head of the
                                    Dept.)Co-Chairperson</span>
                            </div>
                            <div class="mt-1">
                                <span>3) </span> <u>{{ $student_details['dsc_member1'] }}</u>
                                <span>(Expert)Member</span>
                            </div>
                            <div class="mt-1">
                                <span>4) </span> <u>{{ $student_details['dsc_member2'] }}</u>
                                <span>(Expert)Member</span>
                            </div>
                            <div class="mt-1">
                                <span>5) </span>
                                <u>{{ $student_details['principle_supervisor_member1'] }}</u>
                                <span>(Principal
                                    Supervisor)Member
                                    Convener</span>
                            </div>
                            <div class="mt-1">
                                <span>6) </span>
                                <u>{{ $student_details['principle_co_supervisor_member1'] }}</u>
                                <span>(Co-Supervisor)Joint Member Convener </span>
                            </div>
                        </td>
                    </tr>
                </table>
                <p>The Chairperson, DSC is requested to hold the meeting of the DSC
                    for asigning
                    course work and other action as per PHD regulation 2019.</p>
                <span>Date:</span><span
                    style="margin-left:400px">PIC(R&D), BPUT</span>
                {{-- <div class="row">
                    <div class="col-md-6 text-center">
                        <span>Date:</span>
                    </div>
                    <div class="col-md-6">
                        <span>PIC(R&D), BPUT</span>
                    </div>
                    
                </div> --}}
                <input type="hidden" name="student_appl_id" id="student_appl_id" value="{{ $student_details['id'] }}">
                <input type="hidden" name="student_email" id="student_email" value="{{ $student_details['email'] }}">

            </div>
        </div>
    </div>
</body>

</html>
