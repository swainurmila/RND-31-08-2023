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
                <h4 class="sub-heading">Record has been created.</h4>
                <h5 class="sub-heading">Please, check all the details above.</h5>
                <div class="col-md-12">
                    <h4>Username : {{ $username ?? '' }}</h4>
                    <h4>Password : {{ $password ?? '' }}</h4>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
