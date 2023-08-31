@extends('admin.layouts.app')
@section('heading', 'APPLICATION FOR INCLUSION OF CO-SUPERVISOR')
@section('sub-heading', 'APPLICATION FOR INCLUSION OF CO-SUPERVISOR')
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
    </style>
    <div class="row">
        <div class="col-lg-12">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="">
                            <table class="table table-hover table-striped ">
                                <tr>
                                    <th>1. Name of the Student
                                        <input type="text" class="form-control" value="" name="">
                                    </th>
                                    <th>2. Father/Husband's Name <input type="text" class="form-control" value=""
                                            name=""></th>
                                    <th>3. Address for Correspondence : <input type="text" class="form-control"
                                            value="" name=""></th>
                                </tr>
                                <tr>
                                    <th> 4. Faculty (Engg./Pharm. Etc.) : <input type="text" class="form-control"
                                            value="" name=""></th>
                                    <th>5. Discipline/ Specialization : <input type="text" class="form-control"
                                            value="" name=""></th>
                                    <th>6. NCR to which
                                        admitted : <input type="text" class="form-control" value="" name="">
                                    </th>
                                </tr>
                                <tr>
                                    <th>7. Date of Birth : <input type="date" class="form-control" value=""
                                            name=""></th>

                                    <th>8. Category (GEN /SC / ST): <form action="">
                                            <select class="form-select form-control" aria-label="Default select example">
                                                <option selected>Category</option>
                                                <option value="1">ST</option>
                                                <option value="2">SC</option>
                                                <option value="3">GEN</option>

                                            </select>
                                        </form>
                                    </th>
                                    <th>9. Category of studentship

                                        <form>
                                            <select class="form-select form-select-lg mb-3 form-control"
                                                aria-label=".form-select-lg example">
                                                <option selected>FulI Time</option>
                                                <option value="1">Part Time</option>
                                                <option value="2">Full Time Special</option>
                                            </select>
                                        </form>
                                    </th>

                                </tr>
                                <tr>

                                    <th>10. Enrollment Number : <input type="text" class="form-control" value=""
                                            name=""><br><br>
                                            Enrollment Date : <input type="date" class="form-control" value=""
                                            name=""></th>

                                    <th>11. Registration Number : <input type="text" class="form-control" value=""
                                            name=""></th>
                                    <th></th>
                                </tr>

                                <tr>
                                    <th>12. Registration effective from date : <input type="date" class="form-control"
                                            value="" name=""></th>
                                    <th>13. Earliest date of thesis Submission<br> [3 yrs w.e.f. date of enrollment ,for (full
                                        time), <br>3 & 1/2 yrs, for (part time) candidates] : <input type="date"
                                            class="form-control" value="" name=""></th>
                                    <th>14. Title of Ph.U. Work : <input type="text" class="form-control" value=""
                                            name=""></th>
                                </tr>
                                <tr>
                                    <th>15 .
                                        Supervisors</th>
                                    <th> (1) :
                                        <br><input type="text" class="form-control" value="" name="">
                                    </th>
                                    <td>
                                        (2) :<input type="text" class="form-control" value="" name="">
                                    </td>

                                </tr>
                                {{-- <tr>
                                    <th colspan="3">
                                        <div class="form-example">
                                            <button type="button" class="btn btn-primary">Submit</button></div>
                                    </th>
                                </tr> --}}
                            </table>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>16. Course work Completed :</strong>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio1" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions"
                                                id="inlineRadio2" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">No</label>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                        <label class="form-check-label" for="inlineRadio2">
                                            <table>Total credit assigned : </table>
                                        </label>
                                        <input class="form-control" type="text" name="" value="">
                                </div>
                            </div>
                            <div class="row">&nbsp;</div>
                            <div class="row">
                                <table class="table table-bordered" id="example">
                                    <!-- <form > -->
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
                                        <td><input type="email" class="form-control" placeholder="" name="">
                                        </td>
                                        <td><input type="email" class="form-control" placeholder="" name="">
                                        </td>
                                        <td><input type="email" class="form-control" placeholder="" name="">
                                        </td>
                                        <td><input type="email" class="form-control" placeholder="" name="">

                                        </td>
                                        <td>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td><input type="email" class="form-control" placeholder="" name="">
                                        </td>
                                        <td><input type="email" class="form-control" placeholder="" name="">
                                        </td>
                                        <td><input type="email" class="form-control" placeholder="" name="">
                                        </td>
                                        <td><input type="email" class="form-control" placeholder="" name="">
                                        </td>
                                        <td>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td><input type="email" class="form-control" placeholder="" name="">
                                        </td>
                                        <td><input type="email" class="form-control" placeholder="" name="">
                                        </td>
                                        <td><input type="email" class="form-control" placeholder="" name="">
                                        </td>
                                        <td><input type="email" class="form-control" placeholder="" name="">
                                        </td>
                                        <td>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td><input type="" class="form-control" placeholder="" name="">
                                        </td>
                                        <td><input type="" class="form-control" placeholder="" name="">
                                        </td>
                                        <td><input type="" class="form-control" placeholder="" name="">
                                        </td>
                                        <td><input type="" class="form-control" placeholder="" name="">
                                        </td>
                                        <td>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                        </td>

                                    </tr>
                                    <tr>
                                        <th colspan="6">Total Course Credits Completed</th>

                                    </tr>

                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p>17. Sir.I have completed all the required for Ph.D provisional registration and request to allot a registration number. </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-example" style="text-align:center">
                                    <button type="button" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            <div class="row">&nbsp;</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
