@extends('admin.layouts.app')
@section('content')
@section('heading', 'Office Application')
@section('sub-heading', 'Approved Applications')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                    <form method="POST" action="{{ route('phd-official-document-verified') }}" enctype="multipart/form-data" onsubmit="">
                        @csrf
                        <div class="row">
                            @if(session()->has('message'))
                                <br/>
                                {!! session()->get('message') !!}
                            @endif
                            <div class="row">
                                <div class="form-group  col-md-6">
                                    <label for="student_name">Verified Found Correct</label>
                                    <div class="row">
                                        <input type="hidden" name="registration_id" value="5" />
                                        <div class="form-check col-md-3">
                                            <input class="form-check-input" type="radio" name="document_verified" id="document_verified1" value="Yes" checked>
                                            <label class="form-check-label" for="document_verified1">
                                            YES
                                            </label>
                                        </div>
                                        <div class="form-check col-md-3">
                                            <input class="form-check-input" type="radio" name="document_verified" id="document_verified2" value="No">
                                            <label class="form-check-label" for="document_verified2">
                                            No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  col-md-6">
                                    <label for="bank_name">Approved Document.</label>
                                    <input type="file" class="form-control" id="official_document" placeholder="Official Document." name="official_document">
                                    @if ($errors->has('official_document'))
                                        <span class="error-text" role="alert">
                                            <strong style="color: red;">{{ $errors->first('official_document') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="form-group  col-md-6">
                                    <label for="phd_title">Approved Type.</label>
                                    <select class="form-control" id="approved_status" placeholder="semester Type" name="approved_status">
                                        <option value="" selected="true" disabled="disabled">Please select</option>
                                        <option value="Selected">Selected</option>
                                        <option value="Not Selected">Not Selected</option>
                                    </select>
                                    @if ($errors->has('approved_status'))
                                        <span class="error-text" role="alert">
                                            <strong style="color: red;">{{ $errors->first('approved_status') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group  col-md-6">
                                    <button style="text-align: center;" type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script></script>
@endsection