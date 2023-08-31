@extends('admin.layouts.app')
@section('heading', 'PAYMENT DETAILS OF SEMESTER FEE')
@section('sub-heading', 'PAYMENT DETAILS OF SEMESTER FEE')
@section('content')
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <!-- cta -->
                                    <div class="custom-accordion">
                                        @if(session()->has('message'))
                                            <br/>
                                            {!! session()->get('message') !!}
                                        @endif
                                        <div class="mt-4">
                                            <form method="POST" action="{{ route('semister-payment-fee-submit') }}" enctype="multipart/form-data" onsubmit="">
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" value="<?php echo $id; ?>" name="sem_res_id" />
                                                    <div class="form-group  col-md-6">
                                                        <label for="phd_title">BPUT Fee.</label>
                                                        <input type="text" class="form-control" id="bput_fee" placeholder="BPUT Fee." name="bput_fee">
                                                        @if ($errors->has('bput_fee'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('bput_fee') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label for="college_fee">College Fee.</label>
                                                        <input type="text" class="form-control" id="college_fee" placeholder="College Fee." name="college_fee">
                                                        @if ($errors->has('college_fee'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('college_fee') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="form-group  col-md-12">
                                                        <label for="bank_name">Bank Name.</label>
                                                        <input type="text" class="form-control" id="bank_name" placeholder="BPUT Fee." name="bank_name">
                                                        @if ($errors->has('bank_name'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('bank_name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    {{-- <div class="form-group  col-md-6">
                                                        <label for="paid_date">Paid Date.</label>
                                                        <input type="date" class="form-control" id="paid_date" placeholder="Paid Date." name="paid_date">
                                                        @if ($errors->has('paid_date'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('paid_date') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div> --}}
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <label for="student_name">Semister Due Clear</label>
                                                    <div class="form-group  col-md-6">
                                                        <div class="row">
                                                            <div class="form-check col-md-3">
                                                                <input class="form-check-input" type="radio" name="semester_due" id="semester_due1" value="Yes" checked>
                                                                <label class="form-check-label" for="exampleRadios1">
                                                                YES
                                                                </label>
                                                            </div>
                                                            <div class="form-check col-md-3">
                                                                <input class="form-check-input" type="radio" name="semester_due" id="semester_due2" value="No">
                                                                <label class="form-check-label" for="semester_due2">
                                                                No
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if ($errors->has('semister_due'))
                                                        <span class="error-text" role="alert">
                                                            <strong style="color: red;">{{ $errors->first('semister_due') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="row">
                                                    <div class="form-group  col-md-6">
                                                        <label for="phd_title">Semister Type.</label>
                                                        <select class="form-control" id="semester_type" placeholder="semester Type" name="semester_type">
                                                            <option value="" selected="true" disabled="disabled">Please select</option>
                                                            <option value="Even">Even</option>
                                                            <option value="Odd">Odd</option>
                                                        </select>
                                                        @if ($errors->has('semester_type'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('semester_type') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label for="semester_no">Semester No.</label>
                                                        <select class="form-control" id="semester_no" placeholder="semester No" name="semester_no">
                                                            <option value="" selected="true" disabled="disabled">Please select</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                        </select>
                                                        @if ($errors->has('semister_no'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('semister_no') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </br>
                                            <div class="col text-center">
                                                <button style="text-align: center;" type="submit" class="btn btn-primary btn-lg">Save</button>
                                                @if(session()->has('id'))
                                            <br>
                                                    <div class="col text-center">
                                                        <a href="{{url('phdstudent/payment-page/'.$id) }}" style="text-align: center;" class="btn btn-primary">Payment</a>
                                                    </div>
                                                @endif
                                            </div>
                                            </form>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>                   <!-- end row -->    
@endsection      
@section('js')
<script>
</script>
@endsection

