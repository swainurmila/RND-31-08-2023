<!DOCTYPE html>
<html>

<head>
</head>
<style>
    .container {
       width: 750px;
       //margin-left: 280px;
        border: 1px solid;
        padding-left: 5px;
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
        
    }
	
	

    .student-info {
        display: flex;
        width: 850px;
        flex-direction: column;
    }

    .details {
        display: flex;
        margin-bottom: 10px;
        /* text-transform: uppercase; */
        font-size: 14px;
    }

    .key {
        min-width: 150px;
        flex-shrink: 0;
    }

    

    .instructions {
        width: 90%;
        font-size: 13px
    }

    .footer {
        display: flex;
    }

    .box-50 {
        flex: 0 0 50%;
    }

    .value {
        text-transform: uppercase;
    }
	table,tr,td { border:none;}
</style>

<body>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="title-row">
						{{-- <div class="box-20">
                                <img style="max-width: 80px !important;"
                                    src="{{ asset('assets/images/New folder/BPUT.jpg') }}" alt="">
                            </div> --}}
                           
                            <div class="box-60" >
							<table style="width:100%">
								<tr>
									<td style="width:10%"><img style="max-width: 80px !important;"
                                    src="{{ asset('assets/images/New folder/BPUT.jpg') }}" alt=""></td>
									<td style="width:80%; text-align:center!important;"><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA <br>ROURKELA</b></td>
									<td style="width:10%"><img style="max-width: 80px !important;"
                                    src="{{ asset('/upload/phd_entrance/' . $photo) }}" alt=""
                                    style="max-width: 100px; max-height: 100px; border:1px solid; margin-bottom:10px;"></td>
								</tr>
								<tr><td colspan=3 style="text-align: center;"><u>Admit Card :Ph.D Entrance Test
									{{ date('Y') . '-' . (date('Y') + 1) }}</u></td></tr>
							</table>
                                
									
									{{-- <h6 style="text-align: center;margin-top: -8px;">ROURKELA</h6>
                                <h6 style="text-align: center;"><u>Admit Card :Ph.D Entrance Test
									{{ date('Y') . '-' . (date('Y') + 1) }}</u></h6> --}}
                            </div>
                            {{-- <div class="box-20" style="margin-left: 35px;"> <img style="max-width: 80px !important;"
                                    src="{{ asset('/upload/phd_entrance/' . $photo) }}" alt=""
                                    style="max-width: 100px; max-height: 100px; border:2px solid; margin-bottom:10px;margin-left:300px;">
                            </div> --}}
                        </div>
						<br>
                        
                        <div class="student-info" style="margin-top:50px;margin-left:10px">
                            <div class="details">
                                <span class="key">Candidate Name</span>:&nbsp;<span
                                    class="value">{{ $name }}</span>
                            </div>
                            <div class="details">
                                <span class="key">Roll No. </span>:&nbsp;<span
                                    class="value">{{ $entrance_roll_no }}</span>
                            </div>
                            <div class="details">
                                <span class="key">Faculty </span>:&nbsp;<span
                                    class="value">{{ $program }}</span>
                            </div>
                            <div class="details">
                                <span class="key">Branch </span>:&nbsp;<span
                                    class="value">{{ $departments_title }}</span>
                            </div>
                            <div class="details">
                                <span class="key">Centre </span>:&nbsp;<span
                                    class="value">{{ $exam_center_code }}</span>
                            </div><br>
                            {{-- <div class="sign">
                                <span class="signature">Full Signature of the Candidate </span>:&nbsp;<span
                                    class="value">-------------------------------------------------------------------------------</span>
                            </div> --}}
                        </div>
                        {{-- <div class="student-info">
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
                                @foreach ($phd_timing as $key => $value)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$value->subject_name}}</td>
                                    <td>{{$value->exam_date}}</td>
                                    <td>{{$value->sitting}}</td>
                                    <td>{{$value->exam_time}}</td>
                                </tr>
                                @endforeach
                                
                            </table>
                        </div> --}}
                        <div class="instructions" style="margin-left:10px">
                            <p>Important Instructions</p>
                            <p>i) Arrive at Test Centre latest by 09:15 AM and occupy your assigned seat latest by 09:30
                                AM.</p>
                            <p>ii) Bring an original of any one of the following as Photo Identity Proof along with your
                                Admit Card to the Test Centre;<br>
                                a) Vote ID Card, b) Passport c) Driving License d) Aadhar Card / Full Page Colour
                                Printout of e-Aadhar Card letter, e) PAN Card</p>
                            {{-- <p>iii) No candidate is allowed to go outside the Examination Hall after first sitting is over.</p> --}}
                            <p>iii) Possession of any book, notes, scribbling papers / pages, programmable calculator,
                                mobile phones or any other Electronics Gadgets are not allowed.</p>
                            <p>iv) Gossiping, making noise or extending or seeking help to or from co-examinee inside /
                                outside the examination hall is not allowed.</p>
                            <p>v) Candidates are instructed not to bring Mobile Phone (s) and Bag / any valuable item to
                                the Examination Centre.</p>
                            {{-- <p>vii) Candidates are instructed to bring two passport size photograph to the Examination Centre.</p>
                            <p>viii) The Centre Superintendent shall strictly adhere to the Covid SOP issued by the Department of Skill Development & Technical Education, Government of Odisha vide letter No SDTE/HTE-HTE-II-0012-2020/690/SDTE, dated 09.02.2021 for conducting Physical Classes during the Examination Sitting / Days</p> --}}
                        </div>
                        <div class="sign" style="margin-left:10px; margin-top:60px">
                            <span class="signature">Full Signature of the Candidate </span>:&nbsp;<span
                                class="value">-------------------------------------------------------------------------------</span><br>
                            <span class="signature">Date & Time </span>:&nbsp;<span
                                class="value">03-09-2023  & 10:00 AM- 11:30 AM</span>
                        </div>
                        {{-- <div class="sign" style="margin-left: 350px;margin-top:60px">
                            <span class="signature">Full Signature of the Candidate </span>:&nbsp;<span
                                class="value">--------------------------------</span><br><br>
                            <span class="signature"  style="margin-left: 120px;">Date & Time </span>:&nbsp;<span
                                class="value">--------------------------------</span>
                        </div> --}}
                        <div class="footer" style="margin-top:20px">
						    <table style="width:100%">
								<tr>
									<td style="float:left; width:40%; padding-top:60px;"><br><h4>Signature of the Center Superintendent</h4></td>
									<td style="float:left; width:35%">&nbsp;</td>
									<td style="float:right; width:25%"><img style="max-width: 210px;"
                                src="{{ asset('/upload/phd_entrance/Sign_Director Exam_BB Mangaraj_transparent.png') }}" alt=""
                                ><br><h4>Director Examination</h4></td>
								</tr>
							</table>
                            
                            <div class="box-50" style="margin-left: 100px;">
                                
                                
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
