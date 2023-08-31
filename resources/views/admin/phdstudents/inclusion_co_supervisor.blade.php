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
                    <form action="">
                        <table class="table">

                            <form>
                                <tr>
                                    <td>Name of Ph.D student:<br>
                                        <input type="text" class="form-control" name="name" value="">

                                    </td>
                                    <td>Name of NCR:<br>
                                        <input type="text" class="form-control" name="name" value="">
                                    </td>

                                </tr>

                                <tr>

                                    <td>Name of the Faculty:<br>
                                        <input type="text" class="form-control" name="name" value="">
                                    </td>
                                    <td>Branch/Specialisation:<br>
                                        <input type="text" class="form-control" name="name" value="">
                                    </td>

                                </tr>

                                <tr>

                                    <td>Enrollment No:<br>
                                        <input type="text" class="form-control" name="name" value="">
                                    </td>
                                    <td>Enrollment.Date:<br>
                                        <input type="text" class="form-control" name="name" value="">
                                    </td>
                                </tr>

                                <tr>

                                    <td>Regd.No:<br>
                                        <input type="text" class="form-control" name="name" value="">
                                    </td>
                                    <td>Regd.No Date:<br>
                                        <input type="text" class="form-control" name="name" value="">
                                    </td>
                                </tr>
                                <tr>

                                    <td>Title of Ph.D. Work:<br>
                                        <!-- <input type="text" class="form-control"  name="name" value=""> -->
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="name" value="">
                                    </td>
                                </tr>
                                <tr>

                                    <td>Name of the Research Supervisor:<br>
                                        <input type="text" class="form-control" name="name" value="">
                                    </td>
                                    <td>Name of the Proposed Co-Supervisor:<br>
                                        <input type="text" class="form-control" name="name" value="">
                                    </td>
                                </tr>
                                <tr>

                                    <td colspan="2"><b>Proposed Co-supervisor Details:</b><br><br>

                                        Detailed CV attached :Yes &nbsp;<input class="form-check-input"
                                            type="checkbox" value="" id="flexCheckDefault">
                                        &nbsp; &nbsp;No &nbsp;<input class="form-check-input" type="checkbox"
                                            value="" id="flexCheckDefault">
                                    </td>



                                </tr>
                                <tr>

                                    <td> Name:<br>
                                        <input type="text" class="form-control" name="name" value="">
                                    </td>
                                    <td>Designation:<br>
                                        <input type="text" class="form-control" name="name" value="">
                                    </td>
                                </tr>
                                <tr>

                                    <td>Affiliation:<br>
                                        <input type="text" class="form-control" name="name" value="">
                                    </td>
                                    <td>Contact Address:<br>
                                        <input type="text" class="form-control" name="name" value="">
                                    </td>
                                </tr>
                                <tr>

                                    <td>Contact Mobile No:<br>
                                        <input type="text" class="form-control" name="name" value="">
                                    </td>
                                    <td>E-mail id<br>
                                        <input type="email" class="form-control" name="name" value="">
                                    </td>
                                </tr>
                                <tr>

                                    <td>Is the Proposed Co-supervisor an Approved Super of BPUT:<br>
                                        <input type="text" class="form-control" name="name" value="">
                                    </td>
                                    <td>If Yes,Then enclose evidence:Yes &nbsp;<input class="form-check-input"
                                            type="checkbox" value="" id="flexCheckDefault">
                                        &nbsp; &nbsp;No &nbsp;<input class="form-check-input" type="checkbox"
                                            value="" id="flexCheckDefault">
                                    </td>
                                </tr>
                                <tr>

                                    <td colspan="2">Need for the inclusion of a Co-Supervisor(Justification):<br>
                                        <input type="email" class="form-control" name="name" value=""><br><br>
                                        <div class="row  mt-2">
                                            <div class="col-md-2">

                                                <h5 class="mb-0">Date:</h5>
                                            </div>
                                            <div class="col-md-4">

                                                <input type="date" class="form-control" />
                                            </div>
                                            <div class="col-md-3">

                                                <h5 class="mb-0">Signature of the Student:</h5>
                                            </div>
                                            <div class="col-md-3">

                                                <input type="text" class="form-control" />
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="2" style="text-align: center;"><button type="submit" class="btn btn-primary cust_btn">Submit</button></td>
                                </tr>
                            </form>

                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
