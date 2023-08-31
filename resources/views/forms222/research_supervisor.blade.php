
@extends('layouts.app-form')
@section('content')


    <section class="sptb portal_background ">
        <div class="container form-border-container">
            <div class="phd-form-section-title form-section-title">
                <h2> <b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b> </h2>
                <p><b>NUMBER OF CANDIDATES PER RESEARCH SUPERVISOR</b></p>
    
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <form action="" class="form" method="POST" id="myForm"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="tab">
                        <div class="mb-2 row">
                           <label class="col-md-4 col-form-label" for="faculty"><b>Category of Supervisor/Co-Supervisor: <span class="error">*</span></b></label>
                           <div class="col-md-8">
                               <select class="custom-select form-control" id="supervisor_field" name="supervisor_field" >
                                   <option value="" >Select Catagory</option>
                                   <option value="professor_level">Professor Level</option>
                                   <option value="ass_professor_level">Associate Professor Level</option>
                                   <option value="asst_professor_level">Assistant Professor Level</option>
                               </select>
                           </div>
                           
                        </div>
                        <div class="mb-2 row">
                            <label class="col-md-4 col-form-label"  for="max_candidate"><b>Maximum no. of candidates at any point of time: <span class="error">*</span></b></label>
                            <div class="col-md-8">
                                <input type="text" id="max_candidate" name="max_candidate" class="form-control" placeholder = "00" >
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-md-4 col-form-label"  for="scst_candidate"><b>SC/ST Candidates: <span class="error">*</span></b></label>
                            <div class="col-md-8">
                                <input type="text" id="scst_candidate" name="scst_candidate" class="form-control" placeholder = "00" >
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-md-4 col-form-label"  for="diff_abled_candidate"><b>Differently-abled or any other reserved category candidates: <span class="error">*</span></b></label>
                            <div class="col-md-8">
                                <input type="text" id="diff_abled_candidate" name="diff_abled_candidate" class="form-control" placeholder = "00" >
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-md-4 col-form-label"  for="national_tests"><b>QIP/FIP/NDF/UGC-NET(including JRF)/UGC-CSIR NET(including JRF)/SLET/GPAT/GATE/CAT or other similar national tests: <span class="error">*</span></b></label>
                            <div class="col-md-8">
                                <input type="text" id="national_tests" name="national_tests" class="form-control" placeholder = "00" >
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-md-4 col-form-label"  for="general_candidate"><b>General Merit Candidates: <span class="error">*</span></b></label>
                            <div class="col-md-8">
                                <input type="text" id="general_candidate" name="general_candidate" class="form-control" placeholder = "00" >
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <button type="button"
                                    class="btn add_supervisor_dtls  btn-outline-success btn-icon waves-effect waves-themed "
                                    style="margin-top: 2.3rem !important;" id="add_supervisor_dtls">
                                    +
                                </button>
                            </div>
                        </div>
                        <table class="table table-sm m-0 table-bordered">
                            <thead class="">
                                <tr class="table-heading">
                                    <th>Category of Supervisor/Co-Supervisor</th>
                                    <th>Maximum no. of candidates at any point of time</th>
                                    <th>Differently-abled or any other reserved category candidates</th>
                                    <th>QIP/FIP/NDF/UGC-NET(including JRF)/UGC-CSIR NET(including JRF)/SLET/GPAT/GATE/CAT or other similar national tests:</th>
                                    <th>General Merit Candidates</th>
                                </tr>
                            </thead>
                            <tbody class="add_candidate">
                            </tbody>
                        </table>
                      <div style="overflow:auto;">
                        <div style="float:right; margin-top: 5px;">
                            <a href="/researchsupervisorform" class="button">Submit</a>
                        </div>
                    </div>
                    </div>
    
                   
            </form>
        </div>
        <div class="item-all-cat center-block text-center education-categories">
    
        </div>
        </div>
    </section>

    @endsection





