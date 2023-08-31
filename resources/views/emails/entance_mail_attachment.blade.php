<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        table {
            font-family: 'Times New Roman', Times, serif;
            border-collapse: collapse;
            width: 100%;
            margin: 0;
            padding: 0;
            font-size: 14px;
        }

        td,
        th {
            
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

         .non_border_tab th {
            text-align: left;
        }
        @page {
                margin: 100px 25px;
            }

            header {
                position: fixed;
                top: -60px;
                left: 0px;
                right: 0px;
                height: 50px;
                font-size: 14px !important;
                text-align: right;
                line-height: 35px;
            }
        
    </style>
</head>
<header>
    <p>Form No.: BPUT/Ph.D.- 2019/7.1<br>(vide Ph.D.-9.1)</p>
</header>
<main>
    {{-- <table>
        <tbody>
            <tr>
                <td style="border: none!important; padding: 0 !important;"> --}}
                    <table class="non_border_tab">
                       
                        <tr>
                            <td>
                                <h3 style="font-size: 18px;margin-left: 80px;margin-top:15px;"><b>BIJU PATNAIK UNIVERSITY
                                        OF TECHNOLOGY, ODISHA, <br><span style="margin-left:200px">ROURKELA</span></b>
                                </h3>
                                <h5 style="margin-left: 80px; font-size:14px;margin-top:-8px"><u><b>
                                            APPLICATION FOR BPUT ENTRANCE TEST FOR ADMISSION TO THE Ph.D
                                            <br><span style="margin-left:100px">PROGRAM(RESEARCH) (BPUT- ETR ):
                                                {{ date('Y') . '-' . (date('Y') + 1) }}</span>
                                        </b></u></h5>
                                <p style="font-style:italic;margin-left: 45px;margin-top:6px;"><b>(To be submitted by
                                        the candidate for appearing the
                                        Entrance
                                        Test /
                                        Claiming exemption from Entrance Test)</b></p>
                            </td>
                        </tr>

                    </table>
                    <table>
                        <tr>
                            <th>
                                <div style="margin-left: -25px">(DD No. {{ $phd_data->dd_no }} || Dt.
                                    {{ $phd_data->dd_date }} || Bank Name:
                                    {{ $phd_data->dd_bank }} &nbsp; Rs.1000/-)(Non-refundable)</div>
                            </th>
                        </tr>
                    </table>
                    <table style="margin-top: 10px;" class="non_border_tab">
                        <tr>
                            <td> <b> Name of the Candidate :</b> </td>
                            <td>{{ $phd_data->name }}</td>
                            <td rowspan="2" class="text-center">
                                <img style="max-width: 80px !important;"
                                    src="{{ public_path('/upload/phd_entrance/' . $phd_data->photo) }}" alt=""
                                    style="max-width: 100px; max-height: 100px; border:2px solid; margin-bottom:10px;margin-left:300px;">
                                {{-- <img style="max-width: 80px !important;"
                                            src="/upload/phd_entrance/{{ $phd_data->photo }}" alt=""
                                            style="max-width: 100px; border:2px solid; margin-bottom:10px;"> --}}

                            </td>
                        </tr>
                        <tr>
                            <td><b>Father / Husband's Name:</b> </td>
                            <td> {{ $phd_data->father_husband_name }}</td>
                        </tr>
                    </table>
                    <table style="margin-top: 10px;" class="non_border_tab">
                        <tr>
                            <td colspan="2">
                                <h4 style="font-size: 15px;"> Address for Correspondence</h4>
                            </td>
                        </tr>
                        <tr>
                            <th class="text-left" style="padding-left: 10px;width: 70%;">Present Address</th>
                            <th class="text-left" style="padding-left: 10px;">Permanent Address</th>
                        </tr>
                        <tr>
                            <td style="padding-left: 10px;">{{ $phd_data->present_address }}</td>
                            <td style="padding-left: 10px;">{{ $phd_data->permanent_address }}</td>
                        </tr>
                    </table>
                    <br>
                    <table class="per_det non_border_tab">
                        <tr>
                            <th style="width: 70%">Mobile Contact No :</th>
                            <td>{{ $phd_data->mobile }}</td>
                        </tr>
                        <tr>
                            <th>E-mail iD :</th>
                            <td>{{ $phd_data->email }}</td>
                        </tr>
                        <tr>
                            <th>Sex (Male/Female) :</th>
                            <td class="text-uppercase" style=" text-transform: capitalize;">{{ $phd_data->gender }}
                            </td>
                        </tr>
                        <tr>
                            <th> Marital status (Married / Single) :</th>
                            <td class="text-uppercase" style=" text-transform: capitalize;">
                                {{ $phd_data->marital_status }}</td>
                        </tr>
                        <tr>
                            <th> Date of Birth :</th>
                            <td>{{ $phd_data->dob }} </td>
                        </tr>
                        <tr>
                            <th> Category GEN/SC/ST/Differently abled :</th>
                            <td class="text-uppercase">
                                @if ($phd_data->category == 'diffirently abled')
                                    <span class="text-capitalize">Differently abled</span>
                                @else
                                    <span class="text-uppercase"
                                        style=" text-transform: uppercase;">{{ $phd_data->category }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th> Nationality :</th>
                            <td class="text-uppercase" style=" text-transform: capitalize;">
                                {{ $phd_data->nationality }} </td>
                        </tr>
                        <tr>
                            <th> Mother Tongue : </th>
                            <td class="text-uppercase" style=" text-transform: capitalize;">
                                {{ $phd_data->mother_tounge }} </td>
                        </tr>
                        <tr>
                            <th>Mention the Faculty in which Research is to be conducted : </th>
                            <td class="text-uppercase" style=" text-transform: capitalize;">{{ $prog->program }} </td>
                        </tr>
                        <tr>
                            <th>Branch/Specialiazation: </th>
                            <td class="text-uppercase" style=" text-transform: capitalize;">
                                {{ $prog->departments_title }} </td>
                        </tr>
                        <tr>
                            <th>Are you claimimg for exemption of Entrance Test : <br><i>(if yes, justify the same with
                                    proper document and mention the exemption category)</i></th>
                            <td class="text-uppercase" style=" text-transform: capitalize;">
                                {{ $phd_data->claim_entrance }} </td>
                        </tr>
                    </table>
                    {{-- <div class="header" style="margin-left: 500px">
                                @php
                                    $prev_year = date('Y') - 1;
                                @endphp
                                <p>Form No.: BPUT/Ph.D.- 2019/7.1</p>
                                <p style="margin-top:15px">(vide Ph.D.-9.1)</p>
                            </div> --}}
                    <table style="border: 1px solid;padding-top:40px;">
                        <tr style="border: 1px solid;">
                            <td colspan="4" style="border: 1px solid;">
                                <h5 style="font-size: 15px;">In case of selection, Choice of BPUT-Nodal Center of
                                    Research (NCR) <br>(in
                                    order of
                                    preference)[to be filled at the time of interview]</h5>
                            </td>
                        </tr>
                        <tr style="border: 1px solid;">
                            <th style="width: 10%;border: 1px solid;">1</th>
                            <td style="border: 1px solid;"></td>
                            <th style="width: 10%">2</th>
                            <td style="border: 1px solid;"></td>
                        </tr>
                        <tr style="border: 1px solid;">
                            <th style="border: 1px solid;">3</th>
                            <td style="border: 1px solid;"></td>
                            <th style="border: 1px solid;">4</th>
                            <td style="border: 1px solid;"></td>
                        </tr>
                        <tr style="border: 1px solid;">
                            <th style="border: 1px solid;">5</th>
                            <td style="border: 1px solid;"></td>
                            <th style="border: 1px solid;">6</th>
                            <td style="border: 1px solid;"></td>
                        </tr>

                    </table>


                    <table style="margin-top: 10px;border: 1px solid;">
                        <tr style="border: 1px solid;">
                            <td style="border: 1px solid;" colspan="6">
                                <h5 style="font-size: 15px;">Educational Qualification (HSC onwards) [Enclose self
                                    attested copy of
                                    documents]
                                </h5>
                            </td>
                        </tr>

                        <tr style="border: 1px solid;">
                            <th scope="col" style="border: 1px solid;">Degree</th>
                            <th scope="col" style="border: 1px solid;">University/Board</th>
                            <th scope="col" style="border: 1px solid;">Year of Passing</th>
                            <th scope="col" style="border: 1px solid;">Class/Division</th>
                            <th scope="col" style="border: 1px solid;">% of marks/ CGPA</th>
                            <th scope="col" style="border: 1px solid;">Major subject(s)</th>
                        </tr>
                        </thead>
                        <tbody class="addPhdQualifyrow2">
                            @foreach ($phd_data_quali as $item)
                                <tr style="border: 1px solid;">
                                    <td style="border: 1px solid;">{{ $item->degree }}</td>
                                    <td style="border: 1px solid;">{{ $item->university_board }}</td>
                                    <td style="border: 1px solid;">{{ $item->year_of_passing }}</td>
                                    <td style="border: 1px solid;">{{ $item->division }}</td>
                                    <td style="border: 1px solid;">{{ $item->precentage }}</td>
                                    <td style="border: 1px solid;">{{ $item->subject }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="non_border_tab" style="margin-top: 40px;">
                        <tr>
                            <td colspan="2">
                                <h3 class="text-center" style="margin-left:300px ">Declaration </h3>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <p> I do here by declare that the information furnished in this application is true to
                                    the
                                    best of my knowledge and belief. If admitted, I shall abide by rules and regulations
                                    of
                                    the University and Nodal centre of research allotted to me. If any information
                                    furnished
                                    in this application is found to be untrue, I am liable to forfeit the seat allotted
                                    to
                                    me any time in future and legal action be taken against me.</p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 50%"><b>Date :</b> {{ $phd_data->date }}<br>
                                <b>Place :</b> {{ $phd_data->place }}
                            </td>
                            <td class="text-right">
                                <img src="{{ public_path('/upload/phd_entrance/' . $phd_data->signature) }}"
                                    alt=""
                                    style="max-width: 50px; max-height: 50px; border:2px solid; margin-bottom:10px;margin-left:200px;">
                                <p style="margin-left:160px;"> <b>Signature Of the candidate</b>
                                <p>
                            </td>
                        </tr>
                    </table>



                {{-- </td>
            </tr>
        </tbody>

    </table> --}}

    <table style="border: 1px solid;page-break-inside: avoid !important;padding-top:40px;">
        <tr>
            <td colspan="3">
                <h3 class="text-center" style="text-align: center;">Enclosures: (Self attested copy of)</h3>
            </td>
        </tr>
        <tr style="border: 1px solid;">
            <th style="border: 1px solid;">1</th>
            <th class="text-left" style="border: 1px solid;text-align: left;">10th Certificate</th>
            <th style="border: 1px solid;">
                {{ in_array('high_school_pass', $enclosures) ? 'Yes' : 'No' }}
            </th>
        </tr>
        <tr style="border: 1px solid;">
            <th style="border: 1px solid;">2</th>
            <th class="text-left" style="border: 1px solid;text-align: left;">10th Marksheet</th>
            <th style="border: 1px solid;">
                {{ in_array('memorandum_high_school', $enclosures) ? 'Yes' : 'No' }}
            </th>
        </tr>
        <tr style="border: 1px solid;">
            <th style="border: 1px solid;">3</th>
            <th class="text-left" style="border: 1px solid;text-align: left;">12th Certificate
            </th>
            <th style="border: 1px solid;">
                {{ in_array('memorandum_high_school', $enclosures) ? 'Yes' : 'No' }}
            </th>
        </tr>
        <tr style="border: 1px solid;">
            <th style="border: 1px solid;">4</th>
            <th class="text-left" style="border: 1px solid;text-align: left;">12th Marksheet
            </th>
            <th style="border: 1px solid;">
                {{ in_array('memorandum_marks_intermediate', $enclosures) ? 'Yes' : 'No' }}
            </th>
        </tr>
        <tr style="border: 1px solid;">
            <th style="border: 1px solid;">5</th>
            <th class="text-left" style="border: 1px solid;text-align: left;">UG Degree Certificate</th>
            <th style="border: 1px solid;">
                {{ in_array('certificate_of_ug', $enclosures) ? 'Yes' : 'No' }}
            </th>
        </tr>
        <tr style="border: 1px solid;">
            <th style="border: 1px solid;">6</th>
            <th class="text-left" style="border: 1px solid;text-align: left;">UG Marksheet</th>
            <th style="border: 1px solid;">
                {{ in_array('memorandum_marks_ug', $enclosures) ? 'Yes' : 'No' }}
            </th>
        </tr>
        <tr style="border: 1px solid;">
            <th style="border: 1px solid;">7</th>
            <th class="text-left" style="border: 1px solid;text-align: left;">PG Degree Certificate</th>
            <th style="border: 1px solid;">
                {{ in_array('certificate_of_pg_mphill', $enclosures) ? 'Yes' : 'No' }}
            </th>
        </tr>
        <tr style="border: 1px solid;">
            <th style="border: 1px solid;">8</th>
            <th class="text-left" style="border: 1px solid;text-align: left;">PG Marksheet</th>
            <th style="border: 1px solid;">
                {{ in_array('certificate_of_pg_mphill', $enclosures) ? 'Yes' : 'No' }}
            </th>
        </tr>
        <tr style="border: 1px solid;">
            <th style="border: 1px solid;">9</th>
            <th class="text-left" style="border: 1px solid;text-align: left;">M.Phil Degree Certificate</th>
            <th style="border: 1px solid;">
                {{ in_array('mphill_certificate', $enclosures) ? 'Yes' : 'No' }}
            </th>
        </tr>
        <tr style="border: 1px solid;">
            <th style="border: 1px solid;">10</th>
            <th class="text-left" style="border: 1px solid;text-align: left;">M.Phil Marksheet</th>
            <th style="border: 1px solid;">
                {{ in_array('mphill_marksheet', $enclosures) ? 'Yes' : 'No' }}
            </th>
        </tr>
        <tr>
            <th style="border: 1px solid;">11</th>
            <th class="text-left" style="border: 1px solid;text-align: left;">Certificate in support of
                SC/ST/Differently abled Catagory as the
                case may be (Mention Clearly)</th>
            <th style="border: 1px solid;">
                {{ in_array('certificate_of_sc_st', $enclosures) ? 'Yes' : 'No' }}
            </th>
        </tr>
        <tr style="border: 1px solid;">
            <th style="border: 1px solid;">12</th>
            <th class="text-left" style="border: 1px solid;text-align: left;">Proof of National Eligibility Test
                qualified if any(GATE/NET
                etc.)</th>
            <th style="border: 1px solid;">
                {{ in_array('national_eligibility', $enclosures) ? 'Yes' : 'No' }}
            </th>
        </tr>
        <tr style="border: 1px solid;">
            <th style="border: 1px solid;">13</th>
            <th class="text-left" style="border: 1px solid;text-align: left;">Passport size photograph</th>
            <th style="border: 1px solid;">
                {{ in_array('passport_photo', $enclosures) ? 'Yes' : '' }}
            </th>
        </tr>
        <tr style="border: 1px solid;">
            <th style="border: 1px solid;">14</th>
            <th class="text-left" style="border: 1px solid;text-align: left;">Aadhaar Card</th>
            <th style="border: 1px solid;">
                {{ in_array('aadhaar_card', $enclosures) ? 'Yes' : 'No' }}
            </th>
        </tr>

    </table>

    <table class="non_border_tab">
        <tbody>
            <tr>
                <td>
                    <table class="off_td">
                        <tr>
                            <th style="text-align: center" colspan="2">
                                <h4>For Official Use Only</h4>
                            </th>
                        </tr>
                        <tr>
                            <td style="width:50%;">Serial No. of the Application</td>
                            <td style="width:50%;">
                                -------------------------------------------------------
                            </td>
                        </tr>
                        <tr>
                            <td style="width:50%;">Date of Receipt</td>
                            <td style="width:50%;">
                                -------------------------------------------------------
                            </td>
                        </tr>
                        <tr>
                            <td style="width:50%;text-align:left;padding:50px 0 0 0">
                                <h5>J.E.(R&D Cell), BPUT</h5>
                            </td>
                            <td style="width:50%;text-align:right;">
                                <h5>PIC(R&D), BPUT</h5>
                            </td>
                        </tr>
                    </table>

                    <table class="off_td" style="padding: 0px">
                        <tr>
                            <th colspan="3">
                                <h4>Remarks of DRDC (<small>for official use only</small>)</h4>
                            </th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>The candidate may be called for Written Test(BPUT-ETR)</td>
                            <td>
                                <div style="width:50px; height:50px; border:1px solid #ccc;"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>The candidate may be exemted from appearing the Written Test(BPUT-ETR)</td>
                            <td>
                                <div style="width:50px; height:50px;border:1px solid #ccc"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>The candidate does not satisfy short listing criteria,So, Recommended to be
                                rejected</td>
                            <td>
                                <div style="width:50px; height:50px;border:1px solid #ccc"></div>
                            </td>
                        </tr>
                    </table>

                    <table style="margin-top: 10px;" class="off_td">
                        <tr>
                            <td>
                                <div style="border-bottom:1px solid #000; margin:50px 0; "></div>
                            </td>
                            <td>
                                <div style="border-bottom:1px solid #000; "></div>
                            </td>
                            <td>
                                <div style="border-bottom:1px solid #000; "></div>
                            </td>
                            <td>
                                <div style="border-bottom:1px solid #000; "></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div style="border-bottom:1px solid #000; "></div>
                            </td>
                            <td>
                                <div style="border-bottom:1px solid #000; "></div>
                            </td>
                            <td>
                                <div style="border-bottom:1px solid #000; "></div>
                            </td>
                            <td>
                                <div style="border-bottom:1px solid #000; "></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="text-align: center">(signature of members with date)</td>
                        </tr>
                    </table>

                    <table class="off_td">
                        <tr>
                            <td style="text-align: right;">signature of Chairperson, DRDC, BPUT<br>(with date)</td>


                        </tr>
                        <tr>
                            <td>
                                <div style="border-bottom:1px solid #000; "></div>
                            </td>
                        </tr>

                    </table>
                    <table class="off_td" style="margin-top: 40px">
                        <tr>
                            <td style="text-align: left;" colspan="2">Forwarded to: <br> The PIC(R&D), BPUT for
                                taking further necessary action</td>
                        </tr>
                        <tr>
                            <td>Date: ----------------</td>
                            <td class="text-right" style="text-align: right"><b>Chairperson, DRDC, BPUT</b></td>
                        </tr>
                    </table>
                    <table style="margin-top: 50px;" class="off_td">
                        <tr>
                            <th colspan="2" style="text-align: center">
                                <h4>Remarks of the PIC (R&D), BPUT</h4>
                            </th>
                        </tr>
                        <tr>
                            <td style="text-align: left;" colspan="2">Forwarded to: <br> The Director of
                                Examination, BPUT for necessary action</td>
                        </tr>
                        <tr>
                            <td>Date: ----------------</td>
                            <td style="text-align: right"><b>PIC(R&D),BPUT</b></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </tbody>

    </table>
</main>
</html>
