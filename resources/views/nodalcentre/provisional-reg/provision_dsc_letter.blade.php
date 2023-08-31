<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .main-content {
            padding-top: 10px;
            padding-bottom: 50px;
            padding-right: 40px;
            padding-left: 40px;
        }

        .centered-div {
            display: flex;
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
            font-size: 15px;
            width: 100%;
        }

        .Signature-right {
            float: right;
        }

        .formdate-right {
            float: right;
        }

        .letter-container {
            /* border: 1px solid #000000; */
            font-size: 15px;
        }

        body {
            color: #000000d6;
        }
    </style>
</head>

<body>
    <div class="letter-container">
        <div class="row">
            <div class="centered-div">
                <h4><u>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ROURKELA, ODISHA</u></h4>
                <h4>Application and Recommendation of DSC for Provisional Registration to Ph.D Degree</h4>
            </div>
            <div class="main-content">
                <table class="coursework-table">
                    <tr>
                        <td style="width: 10px">1.</td>
                        <td style="width: 40px">Name of the Student</td>
                        <td>{{ $info->name }}</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Father's/Husband's Name</td>
                        <td>{{ $info->father_husband }}</td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>Address for Correspondence</td>
                        <td>{{ $info->permannt_address }}</td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Faculty(Engg/Pharm Etc.)</td>
                        <td>{{ $info->name_of_faculty }}</td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Discipline/ Specialization</td>
                        <td>{{ $info->departments_title }}</td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>NCR to which admitted</td>
                        <td>{{ $info->college_name }}</td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>Date of Birth</td>
                        <td>{{ $info->dob }}</td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td>Category(SC/ST/Differently Abled/ any other)</td>
                        <td>{{ $info->category }}</td>
                    </tr>
                    <tr>
                        <td>9.</td>
                        <td>Category of stuedentship(Full Time/Part Time/ Full Time Special)</td>
                        <td>{{ $info->student_category }}</td>
                    </tr>
                    <tr>
                        <td>10.</td>
                        <td>Enrollment No. & Date of enrollment</td>
                        <td>{{ $info->enrollment_no }}, {{ $info->enrollment_date }}</td>
                    </tr>
                    <tr>
                        <td>11.</td>
                        <td>Redg. No</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>12.</td>
                        <td>Registration Effective from</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>13.</td>
                        <td>Earliest Date of Thesis Submission[3 yrs w.e.f date of Enrollment, for (full time), 3 & 1/2
                            yrs for (part time) candidates]</td>
                        <td>{{ $provisional->thesis_submission_date }}</td>
                    </tr>
                    <tr>
                        <td>14.</td>
                        <td>Supervisor(s)</td>
                        <td>{{ $info->supervisor_name }}</td>
                    </tr>
                    <tr>
                        <td>15.</td>
                        <td>Title of Ph.D Work</td>
                        <td>{{ $info->topic_of_phd_work }}</td>
                    </tr>
                    <tr>
                        <td>16.</td>
                        <td>Course work completed(YES/NO)</td>
                        <td>@if($provisional->course_completed == 1)
                            YES
                            @else
                            NO
                        @endif</td>
                    </tr>
                </table>
                <br>
                <table class="coursework-table" >
                    <tr>
                        <th>Serial No.</th>
                        <th>Subject Code</th>
                        <th>Credits</th>
                        <th>Courese Title</th>
                        <th>Grades</th>
                        <th>Date of passing</th>
                        <th>Remarks</th>
                    </tr>
                    @foreach ($coursework_sub as $key => $val)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $val->subject_code }}</td>
                            <td>{{ $val->credits }}</td>
                            <td>{{ $val->course_title }}</td>
                            <td>{{ $val->grades }}</td>
                            <td>{{ $val->passing_date }}</td>
                            <td>{{ $val->passing_remark }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="2">Total Credits</td>
                        <td colspan="5" id="total-credits">{{ $provisional->credit_completed }}</td>
                        
                    </tr>
                </table>
                <hr style="margin-top: 100px">
                <div class="dsc-heading" style="text-align: center">
                    <h4><u>Recommendation of DSC</u></h4>
                  </div>
                <div class="DSC-members-1" >
                    <br><br>
                    <span class="member-1">(DSC Member)</span><span class="member-2" style="margin-left: 140px;">(DSC
                        Member)</span><span class="member-3" style="margin-left: 140px;">(DSC Member)</span>
                </div>
                <div class="DSC-members-2" style="margin-top: 55px;">
                    <span class="member-4">(Supervisor)</span><span class="member-5"
                        style="margin-left: 150px;">(Co-Supervisor)</span><span class="member-4"
                        style="margin-left: 150px;">(Chairperson, DSC)</span>
                </div>
                <hr>
                <p>Forwarded to the PIC(R&D), BPUT, Rourkela for information & necessary action</p>
                <br>
                <span>Date:</span><span style="margin-left: 460px;">(Head of the NCR)</span>
                <hr>
            </div>
        </div>
    </div>
</body>

</html>
