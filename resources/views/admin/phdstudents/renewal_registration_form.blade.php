@extends('admin.layouts.app')
@section('heading', 'RENEWAL REGISTRATION FORM')
@section('sub-heading', 'RENEWAL REGISTRATION FORM')
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
                                        <span id="msg"></span>
                                        <div class="mt-4">
                                            <form method="POST" action="{{ route('renewal-registration-form-submit') }}" enctype="multipart/form-data" onsubmit="">
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="student_name">Name:</label>
                                                        <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Name" name="name" value="{{ $info->first_name . ' ' . $info->last_name }}"  >
                                                        @if ($errors->has('name'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label for="ncr">Name Of NCR:</label>
                                                        <select class="form-control" id="ncr" placeholder="Name Of NCR." name="ncr_name" value={{ $info->ncr_department}}>
                                                            <option value="">please select</option>
                                                            <?php foreach($nodal_centre as $key=>$val){ ?>
                                                                <option value="<?php echo $val->college_name ; ?> "><?php echo $val->college_name; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        @if ($errors->has('ncr'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('ncr') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="form-group  col-md-6">
                                                        <label for="faculty">Faculty of:</label>
                                                        <input type="text" class="form-control" id="faculty" placeholder="Faculty of" name="faculty">
                                                        @if ($errors->has('faculty'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('faculty') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label for="discipline">Discipline / Specialisation:</label>
                                                        <input type="text" class="form-control" id="discipline" placeholder="Discipline / Specialisation" name="discipline">
                                                        @if ($errors->has('discipline'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('discipline') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div><br>
                                                   
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="enrollment_no">Enrollment No:</label>
                                                        <input type="text" class="form-control" id="enrollment_no" placeholder="Enrollment No." name="enrollment_no" value={{$info->enrollment_no}} >
                                                        @if ($errors->has('enrollment_no'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('enrollment_no') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                  
                                                    <div class="form-group col-md-6">
                                                        <label for="enrollment_date">Date Of Enrollment:</label>
                                                        <input type="date" class="form-control" id="enrollment_date" placeholder="Date Of Enrollment." name="enrollment_date" value={{$info->enrollment_date}}>
                                                        @if ($errors->has('enrollment_date'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('enrollment_date') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="form-group  col-md-6">
                                                        <label for="regd_no">Regd. No:</label>
                                                        <input type="text" class="form-control" id="regd_no" placeholder="Regd No" name="regd_no" value= {{ $info->registration_no }}>
                                                        @if ($errors->has('regd_no'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('regd_no') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="registration_date">Date Of Registration:</label>
                                                        <input type="date" class="form-control" id="regd_date" placeholder="Date Of Registration" name="registration_date" value={{$info->registration_date}}>
                                                        @if ($errors->has('registration_date'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('registration_date') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="form-group  col-md-6">
                                                        <label for="topic">Topic of the Research work:</label>
                                                        <input type="text" class="form-control" id="topic" placeholder="Topic of the Research work" name="topic">
                                                        @if ($errors->has('topic'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('topic') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                          <label for="progress">Progress in research work till date:</label>
                                                          <textarea id="progress" name="progress" rows="3" cols="75"></textarea>
                                                          {{-- <input type="text" class="form-control" id="progress" placeholder="Progress in research work till date" name="progress"> --}}
                                                              @if ($errors->has('progress'))
                                                                  <span class="error-text" role="alert">
                                                                      <strong style="color: red;">{{ $errors->first('progress') }}</strong>
                                                                  </span>
                                                              @endif
                                                        </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="form-group  col-md-6">
                                                        <label for="schedule_period">Schedule period of completion of the work:</label>
                                                        <input type="date" class="form-control" id="schedule_period" placeholder="Schedule period of completion of the work" name="schedule_period">
                                                        @if ($errors->has('schedule_period'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('schedule_period') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                          <label for="reason_of_non_completion">Reason of non-completion in due time:</label>
                                                          <textarea id="reason_of_non_completion" name="reason_of_non_completion" rows="3" cols="75"></textarea>
                                                          {{-- <input type="text" class="form-control" id="reason_of_non_completion" placeholder="Reason of non-completion in due time" name="reason_of_non_completion"> --}}
                                                              @if ($errors->has('reason_of_non_completion'))
                                                                  <span class="error-text" role="alert">
                                                                      <strong style="color: red;">{{ $errors->first('reason_of_non_completion') }}</strong>
                                                                  </span>
                                                              @endif
                                                        </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="form-group  col-md-6">
                                                        <label for="expected_completion">Expected time of completion of work:</label>
                                                        <input type="date" class="form-control" id="expected_completion" placeholder="Expected time of completion of work" name="expected_completion">
                                                        @if ($errors->has('expected_completion'))
                                                            <span class="error-text" role="alert">
                                                                <strong style="color: red;">{{ $errors->first('expected_completion') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                          <label for="expected_submission">Expected time-frame for submission of thesis and period of extension sought:</label>
                                                          <textarea id="expected_submission" name="expected_submission" rows="3" cols="75"></textarea>
                                                          {{-- <input type="date" class="form-control" id="expected_submission" placeholder="Expected time-frame for submission of thesis and period of extension sought" name="expected_submission"> --}}
                                                              @if ($errors->has('expected_submission'))
                                                                  <span class="error-text" role="alert">
                                                                      <strong style="color: red;">{{ $errors->first('expected_submission') }}</strong>
                                                                  </span>
                                                              @endif
                                                        </div>
                                                </div>
                                                <br>
                                                <div class="col text-center">
                                                    <button style="text-align: center;" type="submit" class="btn btn-primary btn-lg">Save</button>
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


