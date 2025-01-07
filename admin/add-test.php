<?php

include "../config.php";
include "header.php";
?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
 <div class="container-fluid px-4">
<h1 class="mt-4" style="color: #858796; font-family: Nunito;">Add Members</h1>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Add Members
        </div>
        <div class="card-body">
        <form method="POST" action="insert.php">
    <div class="row">
        <div class="col-sm-6 mb-3">
            <label for="file_no">File No</label>
            <input type="text" name="file_no" class="form-control" placeholder="Your File No" required>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="date_of_applying">Date Of Applying</label>
            <input type="text" name="date_of_applying" class="form-control" placeholder="Date Of Applying" required>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="membership_no">Membership No</label>
            <input type="text" name="membership_no" class="form-control" placeholder="Your Membership No" required>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="members_name">Member's Name</label>
            <input type="text" name="members_name" class="form-control" placeholder="Your Member's Name" required>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="date_of_birth">Date Of Birth</label>
            <input type="text" name="date_of_birth" class="form-control" placeholder="Your Date Of Birth" required>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="membership_type">Membership Type</label>
            <input type="text" name="membership_type" class="form-control" placeholder="Your Membership Type" required>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="gender">Gender</label>
            <input type="text" name="gender" class="form-control" placeholder="Your Gender" required>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="cnic_passport">Cnic Passport</label>
            <input type="text" name="cnic_passport" class="form-control" placeholder="Your Cnic Passport" required>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="martial_status">Martial Status</label>
            <input type="text" name="martial_status" class="form-control" placeholder="Martial Status" required>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="city_country">City Country</label>
            <input type="text" name="city_country" class="form-control" placeholder="City Country" required>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" placeholder="Your Phone Number" required>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="email_address">Email Address</label>
            <input type="email" name="email_address" class="form-control" placeholder="Your Email Address" required>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="spouse_name">Spouse Name</label>
            <input type="text" name="spouse_name" class="form-control" placeholder="Spouse Name" required>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="second_spouse_name">Second Spouse Name</label>
            <input type="text" name="second_spouse_name" class="form-control" placeholder="Second Spouse Name">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="third_spouse_name">Third Spouse Name</label>
            <input type="text" name="third_spouse_name" class="form-control" placeholder="Third Spouse Name">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="fourth_spouse_name">Fourth Spouse Name</label>
            <input type="text" name="fourth_spouse_name" class="form-control" placeholder="Fourth Spouse Name">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="first_child_name">First Child Name</label>
            <input type="text" name="first_child_name" class="form-control" placeholder="First Child Name" required>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="first_child_dob">First Child Date of Birth</label>
            <input type="date" name="first_child_dob" class="form-control" required>
        </div>
        <div class="col-sm-6 mb-3">
            <label for="second_child_name">Second Child Name</label>
            <input type="text" name="second_child_name" class="form-control" placeholder="Second Child Name">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="second_child_dob">Second Child Date of Birth</label>
            <input type="date" name="second_child_dob" class="form-control">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="third_child_name">Third Child Name</label>
            <input type="text" name="third_child_name" class="form-control" placeholder="Third Child Name">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="third_child_dob">Third Child Date of Birth</label>
            <input type="date" name="third_child_dob" class="form-control">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="fourth_child_name">Fourth Child Name</label>
            <input type="text" name="fourth_child_name" class="form-control" placeholder="Fourth Child Name">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="fourth_child_dob">Fourth Child Date of Birth</label>
            <input type="date" name="fourth_child_dob" class="form-control">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="fifth_child_name">Fifth Child Name</label>
            <input type="text" name="fifth_child_name" class="form-control" placeholder="Fifth Child Name">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="fifth_child_dob">Fifth Child Date of Birth</label>
            <input type="date" name="fifth_child_dob" class="form-control">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="sixth_child_name">Sixth Child Name</label>
            <input type="text" name="sixth_child_name" class="form-control" placeholder="Sixth Child Name">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="sixth_child_dob">Sixth Child Date of Birth</label>
            <input type="date" name="sixth_child_dob" class="form-control">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="seventh_child_name">Seventh Child Name</label>
            <input type="text" name="seventh_child_name" class="form-control" placeholder="Seventh Child Name">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="seventh_child_dob">Seventh Child Date of Birth</label>
            <input type="date" name="seventh_child_dob" class="form-control">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="eighth_child_name">Eighth Child Name</label>
            <input type="text" name="eighth_child_name" class="form-control" placeholder="Eighth Child Name">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="eighth_child_dob">Eighth Child Date of Birth</label>
            <input type="date" name="eighth_child_dob" class="form-control">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="nineth_child_name">Ninth Child Name</label>
            <input type="text" name="nineth_child_name" class="form-control" placeholder="Ninth Child Name">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="nineth_child_dob">Ninth Child Date of Birth</label>
            <input type="date" name="nineth_child_dob" class="form-control">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="tenth_child_name">Tenth Child Name</label>
            <input type="text" name="tenth_child_name" class="form-control" placeholder="Tenth Child Name">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="tenth_child_dob">Tenth Child Date of Birth</label>
            <input type="date" name="tenth_child_dob" class="form-control">
        </div>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>


        </div>
    </div>
</div>




<!-- Product Model -->                       

<style>
    div.dataTables_wrapper div.dataTables_length select {
        width: 80px;
    }
</style>



<!-- <script>
    function editModal(id, name, location, description) {
        document.getElementById('update_id').value = id;
        document.getElementById('update_name').value = name;
        document.getElementById('update_location').value = location;
        document.getElementById('update_description').value = description;
        var updateModal = new bootstrap.Modal(document.getElementById('UpdateProductModel'));
        updateModal.show();
    }
</script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php
include "footer.php";
?>
