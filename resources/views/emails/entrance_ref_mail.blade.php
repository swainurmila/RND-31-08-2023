<!DOCTYPE html>
<html>
<head>
    <title><h5><b>
        APPLICATION FOR BPUT ENTRANCE TEST FOR ADMISSION TO THE Ph.D PROGRAM(RESEARCH)(BPUT- ETR ): {{ date('Y') . '-' . (date('Y') + 1) }}
        </b></h5></title>
</head>
<body>
    <h4>Dear {{ $details['name'] }}, </h4>
    <p>Congratulations! Your details has been successfully submitted. Your referrence id is {{ $details['ref_no'] }}. Please complete the entrance application process before 72 hours. You can proceed with the following link</p>
    <p><a href="http://115.243.153.202:8060/phd-entrance-test-draft/{{ $details['id'] }}">Click Here to Proceed</a></p>
    <p>Thank you</p>
</body>
</html>