@extends('admin.layouts.app')
@section('heading', 'Co-Supervisor Form')
@section('sub-heading', 'Co-Supervisor Form Apply')
@section('content')

    <style>
        .form-row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -5px;
            margin-left: -5px;
        }

        .panel-heading {
            padding: 10px 15px;
            border-bottom: 1px solid transparent;
            border-top-right-radius: 3px;
            border-top-left-radius: 3px;
        }

        div#add_qualfication,
        div#add_employment2,
        div#add_employment3,
        div#add_best_three_publications,
        div#add_atleast_one_publications,
        div#add_phd_students {
            justify-content: space-between;
            align-items: center;
        }

        .col-md-3.cust-txt-input {
            width: 22%;
            margin-bottom: 20px;
        }

        .col-md-4.cust-txt-input2 {
            width: 30%;
            margin-bottom: 20px;
        }

        .mytooltip .tooltip-item {
            background: #c81c1c;
            cursor: pointer;
            display: inline-block;
            font-weight: 700;
            padding: 3px 10px;
            color: #fff;
        }

        .mytooltip {
            display: inline;
            position: relative;
            z-index: 999;
        }

        .mytooltip .tooltip-content {
            position: absolute;
            z-index: 9999;
            width: 360px;
            left: 50%;
            margin: 0 0 20px -180px;
            bottom: 100%;
            text-align: left;
            font-size: 14px;
            line-height: 30px;
            -webkit-box-shadow: -5px -5px 15px rgba(48, 54, 61, 0.2);
            box-shadow: -5px -5px 15px rgba(48, 54, 61, 0.2);
            background: #2b2b2b;
            opacity: 0;
            cursor: default;
            pointer-events: none;
        }

        .mytooltip:hover .tooltip-content {
            pointer-events: auto;
            opacity: 1;
            -webkit-transform: translate3d(0, 0, 0) rotate3d(0, 0, 0, 0deg);
            transform: translate3d(0, 0, 0) rotate3d(0, 0, 0, 0deg);
        }

        .mytooltip .tooltip-content img {
            position: relative;
            display: block;
            float: left;
            margin-right: 1em;
            max-width: 100%;
        }

        /* .tab{display: none; width: 100%; height: 50%;margin: 0px auto;}
        .current{display: block;} */

        /* input {padding: 10px; width: 100%; font-size: 17px; font-family: Raleway; border: 1px solid #aaaaaa; } */

        button {
            background-color: #55a5db;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        .previous {
            background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 30px;
            width: 30px;
            cursor: pointer;
            margin: 0 2px;
            color: #fff;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.8;
            padding: 5px
        }

        .step.active {
            opacity: 1;
            background-color: #55a5db !important;
        }

        .step.finish {
            background-color: #55a5db;
        }

        .error {
            color: #f00;
        }

        .biju-odisha {
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
        }

        .form-section-title h2 {
            font-size: 1.6rem !important;
        }
    </style>

    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <!-- cta -->
                            <div class="panel-container show" role="content">
                                <div class="loader"><i class="fal fa-spinner-third fa-spin-4x fs-xxl"></i></div>
                                <div class="panel-content">
                                    <div class="section-title form-section-title">
                                        <h2 class="biju-odisha"><b>BIJU PATNAIK UNIVERSITY OF TECHNOLOGY,
                                                ODISHA, ROURKELA</b></h2>
                                        <p style="text-align: center !important;"><b>APPLICATION FORMAT FOR
                                                RECOGNITION OF PROSPECTIVE SUPERVISOR / CO-SUPERVISOR FOR THE
                                                ACADEMIC YEAR_W.E.F.<br> JULY 2022 TO JUNE 2023</b></p>
                                    </div>

                                    <ul id="progressbar">
                                        <li class="active" id="account">Personal Information</li>
                                        <li id="personal">Education Info</li>
                                        <li id="journal">Journal/Piblication</li>
                                    </ul>

                                    <form action="{{ route('cosupervisors.store') }}" class="form" method="POST"
                                        id="myForm" enctype="multipart/form-data">
                                        @csrf
                                        <div class="tab">
                                            <div class="mb-2 row">
                                                <label class="col-md-4 col-form-label" for="faculty"><b>Faculty: <span
                                                            class="error">*</span></b></label>
                                                <div class="col-md-8">
                                                    <select class="custom-select form-control" id="faculty"
                                                        name="faculty">
                                                        <option value="">Select Faculty</option>
                                                        <option value="Architecture">Architecture</option>
                                                        <option value="Engineering">Engineering</option>
                                                        <option value="Management">Management</option>
                                                        <option value="Pharmacy">Pharmacy</option>
                                                        <option value="Computer Application & Science">Computer
                                                            Application & Science</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-2 row">
                                                <label class="col-md-4 col-form-label" for="full_name"><b>Full
                                                        Name: <span class="error">*</span></b></label>
                                                <div class="col-md-8">
                                                    <input type="text" id="full_name" name="full_name" style="text-transform: uppercase" value="{{ $user_details->first_name}} {{ $user_details->last_name}}"
                                                        class="form-control" placeholder="Enter name in Block Letters">

                                                    <small id="" class="form-text text-muted">(in block
                                                        letters)</small>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-4 col-form-label" for="organisation"><b>Name of the
                                                        Institution / Organisation
                                                        with detailed address: <span class="error">*</span></b></label>
                                                <div class="col-md-8">
                                                    <input type="text" id="organisation" name="organisation"
                                                        class="form-control" placeholder="Enter name of the institution">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-4 col-form-label" for="nature_of_appointment"><b>Nature
                                                        of Present Appointment
                                                        as Teacher/Scientist (Full time Regular / Contractual /
                                                        Part-time / Guest / Resource Person): <span
                                                            class="error">*</span></b></label>
                                                <div class="col-md-8">
                                                    <input type="text" id="nature_of_appointment"
                                                        name="nature_of_appointment" class="form-control"
                                                        placeholder="Enter name of the institution">
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label" for="date_of_birth"><b>Date
                                                                of Birth (DD/MM?YYYY):
                                                                <span class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                            <input type="date" id="date_of_birth" name="date_of_birth"
                                                                class="form-control" placeholder="Enter DOB.">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label" for="age"><b>Age as on
                                                                last date of application
                                                                (in years): <span class="error">*</span></b></label>
                                                        <div class="col-md-8">
                                                            <input type="number" id="age" name="age"
                                                                class="form-control" placeholder="Enter Age" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="marital_status"><b>Marital Status: <span
                                                                    class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                                <select class="custom-select form-control" id="marital_status"
                                                                name="marital_status">
                                                                <option value="">Select status</option>
                                                                <option value="single">Single</option>
                                                                <option value="married">Married</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label" for="gender"><b>Gender:
                                                                <span class="error">*</span></b></label>
                                                        <div class="col-md-8">
                                                            <select class="custom-select form-control" id="gender"
                                                                name="gender">
                                                                <option value="">Select Gender</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="permanent_address"><b>Permanent address: <span
                                                                    class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                            <textarea class="form-control" id="permanent_address" rows="5" name="permanent_address"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="correspondance_address"><b>Correspondence
                                                                address: <span class="error">*</span></b></label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control" id="correspondance_address" rows="5" name="correspondance_address"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="natinality"><b>Nationality: <span
                                                                    class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                            <input type="text" id="natinality" name="natinality"
                                                                class="form-control" placeholder="Enter your Nationality">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="discipline_specialization"><b>Disciline &
                                                                Specialization: <span class="error">*</span></b></label>
                                                        <div class="col-md-8">
                                                            <input type="text" id="discipline_specialization"
                                                                name="discipline_specialization" class="form-control"
                                                                placeholder="Enter your descipline/specialization">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="aadhar_card_number"><b>Aadhar Card No.: <span
                                                                    class="error">*</span></b></label>
                                                        <div class="col-md-7">
                                                            <input type="number" id="aadhar_card_number"
                                                                name="aadhar_card_number" class="form-control"
                                                                placeholder="Enter your aadhar card number">
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <div class="mb-2 row">
                                                        <label class="col-md-4 col-form-label"
                                                            for="aadhar_card_number"><b>Upload Aadhar Card.: <span
                                                                    class="error">*</span></b></label>
                                                        <div class="col-md-8">
                                                            <input type="file" id="aadhar_card_certi"
                                                                name="aadhar_card_certi" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            </br>


                                            <div>
                                                <div class="mt-5 text-center">
                                                    <button type="submit" class="submit">Save & Next</button>
                                                </div>
                                            </div>

                                    </form>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end row -->

    <div class="modal fade" id="upload_image_view" tabindex="-1" role="dialog" aria-labelledby="scrollableModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollableModalTitle">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="view_upload_image">
                        {{-- <img src="" alt="Upload_img" class="img-responsive card-img-top" id="view_upload_image">
                                                            <embed src="" frameborder="0" width="100%" id="view_upload_image" height="400px"> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->



@endsection







@section('js')
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/additional-methods.js"></script>




    <script>

$( "#date_of_birth" ).focusout(function(){

    var dob = $(this).val();
    //alert(dob);
    var dob = new Date(dob);  
    //calculate month difference from current date in time  
    var month_diff = Date.now() - dob.getTime();
    //convert the calculated difference in date format  
    var age_dt = new Date(month_diff); 
    //extract year from date      
    var year = age_dt.getUTCFullYear();
    //now calculate the age of the user  
    var age = Math.abs(year - 1970);

    $('#age').val(age);

  
});

</script>
    <script type="text/javascript">
        $(document).ready(function() {

            //  ===  size in kb ===
            $.validator.addMethod('filesize', function(value, element, param) {

                var size = element.files[0].size;

                size = size / 1024;
                size = Math.round(size);
                return this.optional(element) || size <= param;

            }, 'File size must be less than {0} Kb.');

            jQuery("#myForm").validate({
                // Specify validation rules
                rules: {
                    faculty: "required",
                    full_name: "required",
                    organisation: "required",
                    nature_of_appointment: "required",
                    date_of_birth: "required",
                    //age: "required",
                    marital_status: "required",
                    gender: "required",
                    permanent_address: "required",
                    correspondance_address: "required",
                    natinality: "required",
                    aadhar_card_number: "required",
                    discipline_specialization: "required",
                    aadhar_card_certi: {
                        required: true,
                        extension: "jpg,jpeg,pdf,png",
                        filesize: 500
                    },
                    
                   
                   

                },
                // Specify validation error messages
                messages: {
                    aadhar_card_certi: {
                        extension: "please upload formrt jpg,png,pdf,jpeg ",
                    }
                    // file:{
                    //     filesize:" file size must be less than 200 KB.",
                    // },
                    // faculty: "faculty name is required",
                    // full_name: "Full name is required",
                    // organisation: "Organisation is required",
                    // nature_of_appointment: "required",
                    // date_of_birth: "Date of birth is required",
                    // age: "Age is required",
                    // marital_status: "Marital status required",
                    // gender: "gender is required",
                    // permanent_address: "Address is required",
                    // correspondance_address: "required",
                    // natinality: "Nationality required",
                    // aadhar_card_number: "Aadhar card is required",
                    // discipline_specialization: "disipline required"
                    


                }
            });
            // $("#myForm").multiStepForm(
            // {
            // 	// defaultStep:0,
            // 	beforeSubmit : function(form, submit){
            // 		console.log("called before submiting the form");
            // 		console.log(form);
            // 		console.log(submit);
            // 	},
            // 	//validations:val,
            // }
            // ).navigateTo(0);
        });
    </script>

    <script>
        // view image in a modal ========

        function upload_image_view(url) {
            // alert(url);
            event.preventDefault();
            $('#view_upload_image').html('<embed src="' + url +
                '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
            $('#upload_image_view').modal('show');
        }
    </script>

@endsection
