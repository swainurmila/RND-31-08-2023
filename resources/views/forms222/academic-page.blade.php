@extends('layouts.app-form')
@section('content')
<section class="sptb portal_background ">
    <div class="container form-border-container">
        <div class="phd-form-section-title form-section-title">
            <h2><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY, ODISHA, ROURKELA</b></h2>
            <h4 class="academy"><>APPLICATION FORMAT FOR RECOGNITION PROSPECTIVE SUPERVISOR / CO-SUPERVISOR<br> FOR THE ACADEMIC YEAR W.E.F JULY ____________________ TO JUNE</h4>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="" class="form" method="POST" id="myForm" enctype="multipart/form-data">
                @csrf
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="enrollment_fee"><b>1. Name in full (in bloch letters) : <span
                                class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="enrollment_fee" name="name" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="registration_fee"><b>2. Department with Designation : <span
                                class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="registration_fee" name="department" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="semester_fee"><b>3.	Name of the Institution / Organisation
                        with detailed address
                         : <span
                                class="error">*</span></b></br>
                        <!--<table>
                            <tr>
                                <td>a</td>
                                <td>3,000/-</td>
                                <td>University fee to be deposited to BPUT A/C</td>
                            </tr>
                            <tr>
                                <td>b</td>
                                <td>7,000/-</td>
                                <td>Nodal Center fee to be deposited with the center of research</td>
                            </tr>
                        </table>-->
                    </label>
                    <div class="col-md-8">
                        <input type="text" id="semester_fee" name="institution" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="registration_fee"><b>4. Nature of Present Appointment as
                        Teacher/ Scientist (Full time Regular / Contractual	Part-time / Guest / Resource Person) :
                        
                            <span class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="registration_fee" name="appoinment" class="form-control"
                            placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>5. Date of Birth (DD/MM/YYYY)

                            : <span class="error">*</span></b><br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="dob" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>6. Marital Status:
                            : <span class="error">*</span></b><br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="marital" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>7. Gender :
                            <span class="error">*</span></b><br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="gender" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>8. Nationality : 
                            : <span class="error">*</span></b><br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="nationality" class="form-control" placeholder="">
                    </div>
                </div>

                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>9. Discipline & Specialization
                        (FulI Time / Part Time / Full Time Special)
                        : <span
                                class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="branch" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>10. E-mail
                        :<span class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name="email" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b>11. Aadhaar Card No.
                         :
                        
                            <span class="error">*</span></b></br></label>
                    <div class="col-md-8">
                        <input type="text" id="thesis_sub_fee" name=" aadhaar" class="form-control" placeholder="">
                    </div>
                </div>



                <!--<div class="mb-2 row">
                    <label class="col-md-4 col-form-label" for="thesis_sub_fee"><b><span
                                class="error">*</span>Fees to be collected from international students would be
                            USD equivalent to INR as mentioned above </label>
                </div>
                <div class="mb-2 row">
                    <span class="error">*</span>The above mentioned rates of fees shall be subject to change by
                    the BPUT from time to time
                </div>-->
                <div>
                    <div class="form_btn">
                        <a href="/noc_candidateform" class="button">Submit</a>
                    </div>
                </div>

            </form>
        </div>
        <div class="item-all-cat center-block text-center education-categories">

        </div>
    </div>
</section>
@endsection
