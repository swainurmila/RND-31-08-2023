@extends('admin.layouts.app')
@section('heading', 'NCR Fee')
@section('sub-heading', 'NCR Fee')
@section('content')


    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <div class="panel-container show" role="content">
                                <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                                <div class="panel-content p-4">
                                    <h3 class="text-center mb-4">Upload Fee NCR</h3>
                                   
                                    
                                        <form method="post" action="{{ route('semister.nodal.upload') }}" enctype="multipart/form-data">
                                            @csrf
                                            {{-- <p class="text-center"> 
                                                <input type="file" class="form-control" name="ncr_fee_file" >
                                                <input type="hidden" name="id" value="{{$id}}">
                                                <button type="submit" class="mt-4 btn btn-primary waves-effect waves-light">Submit</button>
                                            </p> --}}

                                            <div class="row mb-3">
                                                <div class="form-group col-md-6">
                                                    <label for="student_name">Draft No:</label>
                                                    <input type="text" class="form-control" id="draft_no"
                                                        aria-describedby="draft_no"
                                                        placeholder="Draft No" name="draft_no"
                                                        value="">
                                                    @if ($errors->has('draft_no'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('draft_no') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label for="student_name">Issuing Bank.</label>
                                                    <input type="text" class="form-control" id="bank_name"
                                                        aria-describedby="bank_name"
                                                        placeholder="Issuing Bank Name" name="bank_name"
                                                        value="">
                                                    @if ($errors->has('bank_name'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('bank_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="student_name">Upload Fee NCR</label>
                                                    <input type="file" class="form-control" name="ncr_fee_file" >
                                                    
                                                    @if ($errors->has('ncr_fee_file'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('ncr_fee_file') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group  col-md-6">
                                                    <label for="student_name">Date</label>
                                                    <input type="date" class="form-control" id="pay_date"
                                                    placeholder="Date Of Enrollment." name="pay_date">
                                                    @if ($errors->has('pay_date'))
                                                        <span class="error-text" role="alert">
                                                            <strong
                                                                style="color: red;">{{ $errors->first('pay_date') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <p class="text-center"> 
                                                {{-- <input type="file" class="form-control" name="ncr_fee_file" > --}}
                                                <input type="hidden" name="id" value="{{$id}}">
                                                <button type="submit" class="mt-4 btn btn-primary waves-effect waves-light">Submit</button>
                                            </p>
                                            
                                        </form>

                                   

                                </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
