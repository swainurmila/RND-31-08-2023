<!DOCTYPE html>
<html>
<head>
    <title><h5><b>
        APPLICATION FOR BPUT ENTRANCE TEST FOR ADMISSION TO THE Ph.D PROGRAM(RESEARCH)(BPUT- ETR ): {{ date('Y') . '-' . (date('Y') + 1) }}
        </b></h5></title>
</head>
<body>
    <h4>Dear {{ $details['name'] }}, </h4>
    <p>Congratulations!</p>
    <p>Your application form has been successfully submitted.</p>
    <p>Your reference id is {{ $details['ref_id'] }}.</p>
    <p>Dully filled Application Form and other required documents, along with Demand Draft, should be addressed to the Director Examination, Biju Patnaik University of Technology, Odisha, Chhend, Rourkela - 769015, Sundergarh, and should reach on or before 16/08/2023.</p>
    <p>Thank you</p>
</body>
</html>