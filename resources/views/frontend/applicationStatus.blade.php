@include('frontend.layouts.header')
<style>
    .tab {
        display: none;
        width: 100%;
        height: 50%;
        margin: 0px auto;
    }

    .current {
        display: block;
    }

    /* input {padding: 10px; width: 100%; font-size: 17px; font-family: Raleway; border: 1px solid #aaaaaa; } */

    button {
        background-color: #4CAF50;
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
        background-color: #69c769;
    }

    .step.finish {
        background-color: #4CAF50;
    }

    .error {
        color: #f00;
    }
</style>
@include('frontend.partials.navigation')

<section class="sptb portal_background ">
    <div class="container form-border-container">
        <div class="phd-form-section-title form-section-title">
            <p><b>Check Your Application Status</b></p>
            <div class="col-md-6">
                <form action="{{ url('find-form') }}" method="get">
                    @csrf
                    <div class="mb-2 row">
                        <label class="col-md-3 col-form-label" for="academic_programme"><b>Resistration No</b></label>
                        <div class="col-md-9">
                            <input type="text" id="reg_no" value="" name="reg_no" class="form-control"
                                placeholder="Enter Your Resistration No">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label class="col-md-3 col-form-label" for="academic_programme"><b>DOB</b></label>
                        <div class="col-md-9">
                            <input type="date" id="dob" value="" name="dob" class="form-control"
                                placeholder="Enter Your Date of Birth">
                        </div>
                    </div>
                    <div class="mb-2 row text-center">
                        <button type="submit" class="btn btn-sm btn-info">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
</body>

</html>
