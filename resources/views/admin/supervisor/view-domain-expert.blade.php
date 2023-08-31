@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <?php if($details->approved_status_ncr == 0){ ?>
                            <h2 style="text-align: center;">RECOMMENDATION OF NCR</h2>
                            <div>Date : <?php echo date('Y-m-d H:i:s a'); ?><div>
                            <div>Research Supervisor : <?php echo $session_data['name']; ?><div>
                            <div>Designation : <?php echo $session_data['designation']; ?><div>
                            <div>Head of NCR : ...</div>
                            <div>Signature : <?php echo 'test'; ?><div>
                                <form method="POST" action="{{ route('domain-expert-view-submit') }}" enctype="multipart/form-data" onsubmit="">
                                    @csrf
                                    <input type="hidden" name="supervisor_name" value="<?php echo  $session_data['name']; ?>" />
                                    <input type="hidden" name="designation" value="<?php echo $session_data['designation']; ?>" />
                                    <input type="hidden" name="desc_id" value="<?php echo $details->id; ?>" />
                                    <div class="col text-center">
                                        <button style="text-align: center;" type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                        <?php }elseif($details->approved_status_ncr == 1){ ?>
                            <div>2</div>
                        <?php }else{ ?>
                            <div>All Html Page</div>
                        <?php } ?>
                    </br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection