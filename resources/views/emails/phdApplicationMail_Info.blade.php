<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{ asset('admin_assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="form-container">
        <div class="row">
            <div class="centered-div col-md-6 offset-md-3">
                <h4 class="sub-heading">Your PHD application has been subbmitted successfully.</h4>
                <h5 class="sub-heading">Please, check the attachment above.</h5>
                <div class="col-md-12">
                    <span>No: <b>BPUT/R&D/{{ $student_details['notification_no'] }}</b></span><br/>
                    <span>Name: <b>{{ $student_details['name'] }}</b></span><br/>
                    <span>Enrollment No.: <b>{{ $student_details['enrollment_no'] }}</b></span><br/>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
