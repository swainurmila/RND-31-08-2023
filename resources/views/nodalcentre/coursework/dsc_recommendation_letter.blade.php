<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        .main-content {
            padding-top: 20px;
            padding-bottom: 50px;
            padding-right: 40px;
            padding-left: 40px;
        }

        .centered-div {
            display: flex;
            margin-left: 60px;
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
            border: 1px solid #000000;
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
                <h3><u>RECOMMENDATION OF THE DOCTORAL SCRUTINY COMMITTEE</u></h3>
            </div>
            <div class="main-content">
                <p>The DSC is satisfied that the proposed programme is prima facie, feasible to implement and adequate
                    for
                    the degree intended. The course work should assigned out of the subjects taught at Masters degree
                    and on
                    Research Methodology at the concerned NCR.</p>
                <p>1. Course work recommended by the DSC at the NCR</p>
               
                <table class="coursework-table">
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
                            <td class="credit">{{ $value['credits'] }}</td>
                            <td>{{ $value['remarks'] }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" style="text-align: right;"><b>Total Course Credits Assigned </b> </td>
                        <td colspan="2" id="total-credits" style="font-weight: bold">{{$totalCredits}}</td>
                    </tr>
                </table>
                <p>*Minimum - 08 Credits(Including Research Methodology which is compulsory)</p>
                <p>*Maximum - 16 Credits(Including Research Methodology which is compulsory)</p>
                <p>2. Comments on place of work and facilities: Adequate/ Inadequate</p>
                <hr>
                <br><br>
                <div class="DSC-members-1">
                    <span class="member-1">(DSC Member)</span><span class="member-2" style="margin-left: 140px;">(DSC Member)</span><span class="member-3" style="margin-left: 140px;">(DSC Member)</span>
                </div>
                <div class="DSC-members-2" style="margin-top: 55px;">
                    <span class="member-4">(Supervisor)</span><span class="member-5" style="margin-left: 150px;">(Co-Supervisor)</span><span class="member-4" style="margin-left: 150px;">(Chairperson, DSC)</span>
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