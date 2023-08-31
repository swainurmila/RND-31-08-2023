@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('message'))
                        <br/>
                        {!! session()->get('message') !!}
                        @endif
                            <h3 style="text-align: center;">NOMINATION OF TWO DOMAIN EXPERTS TO THE DSC</h3>
                            <?php if($vc == 0){ ?>
                            <form method="POST" action="{{ route('vc-approved-domain-submit') }}" enctype="multipart/form-data" onsubmit="">
                                @csrf
                                    <div class="form-group col-md-6">
                                        <label for="student_name">Domain Name.</label>
                                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                        <select class="form-control" id="domain_name" name="domain_name[]" multiple>
                                            <option selected="">Open this select menu</option>
                                            <?php foreach($explode as $key){ ?>
                                                <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="form-group  col-md-6">
                                        <div class="col">
                                            <button style="text-align: center;" type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                            </form>
                            <?php }else{ ?>
                                <div>All form show </div>
                                <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection