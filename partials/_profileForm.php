
<h2 class="text-center my-4 text-info">Submit form below</h2>
<div class="container my-0">
<div class="jumbotron my-0">

<!-- Know more starts here -->



<div class="collapse" id="collapseExample">
    <div class="card card-body">
        <p><span class="font-weight-bold"><?php echo $catname; ?>, Follow the steps below to apply for
                the fellowship:</span></p>

        <p>Step 1: Fill your valid details below</p>
        <p>Step 2: Submit the required documents mentioned</p>
        <p>Step 3: Click on the Apply Now button</p>
        <span class="font-weight-bold">Your application will be conformed and Notified if eligible via
            Email, Thank you!</span></p>
        </p>
    </div>
</div>

<!-- Know more ends here -->


<!-- Scholarship form Submission starts here -->

<form aciton="/forum/profile.php" method="post">
    <div class="col-md-6 mb-3  my-4">
        <label for="first_name">First name</label>
        <input type="text" class="form-control " id="first_name" name="first_name">
    </div>

    <div class="col-md-6 mb-3  my-4">
        <label for="last_name">Last name</label>
        <input type="text" class="form-control " id="last_name" name="last_name">
    </div>

    <div class="form-group row my-3">
        <label for="dob" class="col-2 col-form-label">DOB</label>
        <div class="col-10">
            <input class="form-control" type="date" value="0000-00-00" id="dob" name="dob">
        </div>
    </div>



    <div class="form-group col-md-6">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email"  name="email">
    </div>

    <div class="form-group col-md-6">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" id="phone" name="phone">
    </div>

    <div class="form-group col-md-6">
        <label for="city">City</label>
        <input type="text" class="form-control" id="city" name="city">
    </div>
    <div class="form-group col-md-6">
        <label for="state">State</label>
        <input type="text" class="form-control" id="state" name="state">
    </div>



    <button class="btn btn-info " type="submit">Apply Now</button>
</form>
<!-- Scholarship form Submission ends here -->
</div>
</div>