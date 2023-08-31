@extends('admin.layouts.app')
@section('heading', 'PROVISIONAL REGISTRATION OF STUDENT FOR PHD DEGREE')
@section('sub-heading', 'PROVISIONAL REGISTRATION OF STUDENT FOR PHD DEGREE')
@section('content')
<style>

    .table>:not(caption)>*>* {
        padding: .85rem .85rem;
        background-color: var(--bs-table-bg);
        border-bottom-width: none !important ;
        box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
    }
        tbody, td, tfoot, th, thead, tr {
        border-color: inherit;
        border-width: 0;
    }
    tbody, td, tfoot, th, thead, tr {
        border-color: inherit;
        border-width: 0;
    }
    .title-head {
        font-weight: bold;
        text-decoration: underline;
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
    }
    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 style="text-align: center"><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h4>
                        <div class="row mt-4">
                            <div class="col-md-4">
                              <p class="text-right">No.BPUT/PIC(R&D)/___________/_________</p>
                            </div>
                             <div class="col-md-4">
                            </div>
                             <div class="col-md-4">
                              <p>Date: ___________</p>
                            </div>
                        </div>
                        <h5 class="title-head"><b><u>OFFICE ORDER</u></b></h5>
				        <h5 class="title-head"><b><u>Provisional Registration of student for Ph.D Degree</u></b></h5>
                        <div class="row">
                            <div class="col-md-12 dsc-record-dsc">
                               <p class="mb-0">
                               Upon recommendation of Doctoral Scrutiny Committee (DSC) held on _______________ & approval of the Vice Chancellor
                               on _______________, Mr.___________________________________has been provisionally registered as a Ph.D Research Scholar under Biju Patnaik University of Technology
                               Odisha w.e.f. ____________________________ consequent to his/her satisfactory completion of Course work & other qualifying
                               requirements.The particulars of registration are given below :
                               </p>

                            </div>
                        </div>
                        <table class="table  table-bordered">
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <th>Name of Student</th>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>2</th>
                                    <th>Father's/Husband's Name </th>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <th>3</th>
                                    <th>Address for correspondence</th>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <th>4</th>
                                    <th>Faculty(Engg./Pharm.Etc)</th>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <th>5</th>
                                    <th>Discipline/Specialization</th>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <th>6</th>
                                    <th>NCR to which admitted </th>
                                    <td></td>
                                    </tr>
                                    <th>7</th>
                                    <th> Date of Birth </th>
                                    <td></td>
                                    </tr>
                                    <th>8</th>
                                    <th>Category(ST/SC/GEN)</th>
                                    <td></td>
                                    </tr>
                                    <th>9</th>
                                    <th> Category of studentship(Full time/part time/full time special) </th>
                                    <td></td>
                                    </tr>
                                    <th>10</th>
                                    <th> Enrollment No.& Date Enrollment</th>
                                    <td></td>
                                    </tr>
                                    <th>11</th>
                                    <th>Regd.No.</th>
                                    <td></td>
                                    </tr>
                                    <th>12</th>
                                    <th>Registration effective from date</th>
                                    <td></td>
                                    </tr>
                                    <th>13</th>
                                    <th>Earliest Date of Thesis Submission<br>(Full time: 03yrs,part time:3.5yrs w.e.f from date of Enrollment)</th>
                                    <td></td>
                                    </tr>
                                    <tr>
                                    <th>14</th>
                                    <th>Supervisor</th>
                                    <td>
                                    <div>
                                    <h5>(1)</h5>
                                    </div>
                                    <div>
                                    <h5>(2)</h5>
                                    </div>
                                    </td>
                                    </tr>
                                    <tr>
                                    <th>15</th>
                                    <th>Title of Ph.D Work</th>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-4">
                                <p> 16. Course work Completed (YES/NO):   </p>
                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">
                                <p>Total credits assigned : _______________________</p>
                            </div>
                        </div>
                        <div class="row">
                            <table class="table table-bordered" id="example">
                                <tr>
                                    <th>Sl.No.</th>
                                    <th>Subject Code</th>
                                    <th>Course Title</th>
                                    <th>Grade</th>
                                    <th> Credits </th>
                                    <th>Remarks
                                    </th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                </tr>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>

                                </tr>
                                </tr>
                                <tr>
                                    <th colspan="3" class="text-right">Total Course Credits Completed</th>

                                </tr>
                            </table>
                        </div>
                        <div class="row">
                            <h5>17. For sponsored candidates :</h5>
                                    <p>(1) Wherher permitted to work outside the Institude:(Yes/No):______________________________</p>
                                    <p>(2) Place of work :______________________________________________</p>
                                    <p>(3) Residential requirement completed in :Year ___________________ Months :_____________________</p>

                            <h5>18. Validity of Registration: _____________________________________________________________________</h5>
                        </div>
                        <form action="">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
