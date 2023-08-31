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
                        <table class="table  table-bordered">
                              <tr>
                                  <td><label>Name of Candidate</label>

                                  <input type="text" class="form-control" value="" name="">
                                  </td>
                                   <td><label>Registration No.</label>
                                  <input type="text" class="form-control" value="" name="">
                                  </td>
                                  <td>
                                    <label>Name of the Faculty & NCR</label>
                                  <input type="text" class="form-control" value="" name="">
                                 </td>


                              </tr>

                              <tr>
                                   <td><label>Date of Registration</label>
                                  <input type="date" class="form-control" value="" name="">
                                  </td>
                                  <td><label>Topic for Ph.D Research</label>
                                  <input type="date" class="form-control" value="" name="">
                                  </td>
                                 <td><label>Nmae of the Reserach Supervisor</label>
                                  <input type="date" class="form-control" value="" name="">
                                  </td>
                              </tr>
                              <tr>

                                  <th colspan="3">
                              Demand draft details
                                  </th>

                              </tr>
                              <tr>
                                   <td><label>Name of issuing Bank</label>
                                  <input type="text" class="form-control" value="" name="">
                                  </td>
                                  <td><label>Demand Draft Number</label>
                                  <input type="number" class="form-control" value="" name="">
                                  </td>
                                 <td><label>Amount</label>
                                  <input type="text" class="form-control" value="" name="">
                                  </td>
                              </tr>
                              <tr>
                                   <td><label>Date</label>
                                  <input type="date" class="form-control" value="" name="">
                                  </td>

                                 <td colspan="2">Signature of Research Student

                                  <div class="input-group">
<div class="input-group-prepend">
  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
</div>
<div class="custom-file">
  <input type="file" class="custom-file-input" id="inputGroupFile01"
    aria-describedby="inputGroupFileAddon01">
  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
</div>
</div>
                                  </td>
                              </tr>
                          </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
