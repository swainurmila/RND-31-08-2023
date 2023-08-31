<!DOCTYPE html>
<html>

<head>
</head>
<style>
    .container {
        width: 750px;
        margin-left: 280px;
        border: 1px solid;
        padding-left: 25px;
    }

    .title-row {
        display: flex;
        width: 750px;
        /* margin-left: 250px; */

    }
    .box {
        height: 100px;
        border: 1px solid black;
        margin: 5px;
    }

    .box-20 {
        flex: 0 0 18%;
    }

    .box-60 {
        flex: 0 0 70%;
        margin-left: -50px;
    }

    .student-info {
        display: flex;
        width: 850px;
        flex-direction: column;
    }

    .details {
        display: flex;
        margin-bottom: 10px;
        text-transform: uppercase;
        font-size: 14px;
    }

    .key {
        min-width: 150px;
        flex-shrink: 0;
    }

    table {
        font-family: 'Times New Roman', Times, serif;
        border-collapse: collapse;
        width: 80%;
        margin: 0;
        padding: 0;
        font-size: 14px;
    }

    td,
    th {
        border: 1px solid;
        margin: 0;
        padding: 5px;

    }

    th {
        text-align: center;
        font-weight: bold;
    }

    tr {
        padding: 0;
    }
    .instructions{
        width: 90%;
        font-size: 12px
    }
    .footer{
        display: flex;
    }
    .box-50{
        flex: 0 0 50%;
    }
</style>

<body>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="title-row">
                            <div class="box-20">
                                <img style="max-width: 80px !important;"
                                    src="{{ asset('assets/images/New folder/BPUT.jpg') }}" alt="">
                            </div>
                            <div class="box-60" >
                                <h3>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA</h3>
                                <h4 style="text-align: center;margin-top: -8px;">ROURKELA</h4>
                                <h4 style="text-align: center;"><u>Admit Card :Ph.D Entrance Test
                                        {{ date('Y') . '-' . (date('Y') + 1) }}</u></h4>
                            </div>
                            <div class="box-20" style="margin-left: 35px;"> <img style="max-width: 80px !important;"
                                    src="{{ asset('/upload/phd_entrance/' . $phd_data->photo) }}" alt=""
                                    style="max-width: 100px; max-height: 100px; border:2px solid; margin-bottom:10px;margin-left:300px;">
                            </div>
                        </div><br>
                        <div class="student-info">
                            <div class="details">
                                <span class="key">Candidate Name</span>:&nbsp;<span class="value">{{$phd_data->name}}</span>
                            </div>
                            <div class="details">
                                <span class="key">Roll No. </span>:&nbsp;<span
                                    class="value">{{$phd_data->registration_no}}</span>
                            </div>
                            <div class="details">
                                <span class="key">Faculty </span>:&nbsp;<span class="value">Engineering</span>
                            </div>
                            <div class="details">
                                <span class="key">Branch </span>:&nbsp;<span class="value">Information
                                    Technology</span>
                            </div>
                            <div class="details">
                                <span class="key">Centre </span>:&nbsp;<span class="value">Centre for IT &
                                    Management
                                    Education, Mancheswar, Bhubaneswar</span>
                            </div><br>
                            <div class="sign">
                                <span class="signature">Full Signature of the Candidate </span>:&nbsp;<span
                                    class="value">-------------------------------------------------------------------------------</span>
                            </div>
                        </div>
                        <div class="student-info">
                            <h4 style="text-align: center;margin-left: -150px;">Subject(s),Exam Date, Timing & Sitting
                                Detail</h4>
                            <table style="text-align: center">
                                <tr >
                                    <th>S. No.</th>
                                    <th>Subject Name</th>
                                    <th>Exam Date</th>
                                    <th>Sitting</th>
                                    <th>Time</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Research Methodology</td>
                                    <td>05 OCT 2023</td>
                                    <td>1st</td>
                                    <td>10:30 AM - 11:15 AM</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Branch Subject</td>
                                    <td>05 OCT 2023</td>
                                    <td>2nd</td>
                                    <td>11:45 AM - 12:30 AM</td>
                                </tr>
                            </table>
                        </div>
                        <div class="instructions">
                            <p>Important Instructions</p>
                            <p>i)  Arrive at Test Centre latest by 10:00 AM and occupy your assigned seat latest by 10:15 hrs.</p>
                            <p>ii) Bring an original of any one of the following as Photo Identity Proof along with your Admit Card to the Test Centre;<br>
                                a) Vote ID Card, b) Passport c) Driving License d) Aadhar Card / Full Page Colour Printout of e-Aadhar Card letter, e) PAN Card</p>
                            <p>iii) No candidate is allowed to go outside the Examination Hall after first sitting is over.</p>
                            <p>iv) Possession of any book, notes, scribbling papers / pages, programmable calculator, mobile phones or any other Electronics Gadgets are not allowed.</p>
                            <p>v) Gossiping, making noise or extending or seeking help to or from co-examinee inside / outside the examination hall is not allowed.</p>
                            <p>vi) Candidates are instructed not to bring Mobile Phone (s) and Bag / any valuable item to the Examination Centre.</p>
                            <p>vii) Candidates are instructed to bring two passport size photograph to the Examination Centre.</p>
                            <p>viii) The Centre Superintendent shall strictly adhere to the Covid SOP issued by the Department of Skill Development & Technical Education, Government of Odisha vide letter No SDTE/HTE-HTE-II-0012-2020/690/SDTE, dated 09.02.2021 for conducting Physical Classes during the Examination Sitting / Days</p>
                        </div>
                        <div class="footer" style="margin-top:40px">
                            <div class="box-50">
                                <h4>Signature of the Center Superintendent</h4>
                            </div>
                            <div class="box-50" style="margin-left: 100px;">
                                <h4>Director Examination</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
