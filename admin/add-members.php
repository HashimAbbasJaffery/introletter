
<?php
session_start();
include "../config.php";
if (!isset($_SESSION['name']) || $_SESSION['user_role'] != 'Admin') {
    header("Location: logout.php");
    exit();
}
include "header.php";

?>
 
 <div class="container-fluid px-4">
<h1 class="mt-4" style="color: #858796; font-family: Nunito;">Add Members</h1><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wizard Step Form with Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .step {
            display: none;
        }
        .step.active {
            display: block;
        }
    </style>
</head>
<body>
    <form id="wizardForm" method="POST" action="insert.php">
        <div class="card p-5">
                    <!-- Step 1 -->
        <div class="step active">
            <h3 class="text-center mb-3">Personal Information</h3>
            <div class="row">
            <div class="col-sm-6 mb-3">
            <label for="members_name">Member's Name</label>
            <input type="text" name="members_name" class="form-control" placeholder="Your Member's Name" required>
                <div class="invalid-feedback">Please Enter Your Member's Name.</div>
            </div>
            <div class="col-sm-6 mb-3">
                 <label for="date_of_birth">Date Of Birth</label>
            <input type="date" name="date_of_birth" class="form-control" placeholder="Your Date Of Birth" required>
                <div class="invalid-feedback">Please Enter a Valid Date Of Birth.</div>
            </div>
            <div class="col-sm-6 mb-3">
            <label for="gender">Gender</label>
            <select name="gender" class="form-control" required>
            <option selected>Select Your Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
                <div class="invalid-feedback">Please Enter Your Gender.</div>
            </div>
            <div class="col-sm-6 mb-3">
            <label for="cnic_passport">Cnic Passport</label>
            <input type="text" name="cnic_passport" class="form-control" placeholder="Your Cnic Passport" required>
                <div class="invalid-feedback">Please Enter Your Cnic Passport.</div>
            </div>
            <div class="col-sm-6 mb-3">
            <label for="martial_status">Martial Status</label>
            <select name="martial_status" class="form-control" required>
            <option selected>Select Your Martial Status</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
            </select>
                <div class="invalid-feedback">Please Enter Your Martial Status.</div>
            </div>
            <div class="col-sm-6 mb-3">
            <label for="city_country">City Country</label>
            <input type="text" name="city_country" class="form-control" placeholder="City Country" required>
                <div class="invalid-feedback">Please Enter Your City Country.</div>
            </div>
            <div class="col-sm-6 mb-3">
            <label for="phone_number">Phone Number</label>
            <input type="number" name="phone_number" class="form-control" placeholder="Your Phone Number" required>
                <div class="invalid-feedback">Please Enter Your Phone Number.</div>
            </div>
            <div class="col-sm-6 mb-3">
            <label for="email_address">Email Address</label>
            <input type="email" name="email_address" class="form-control" placeholder="Your Email Address" required>
                <div class="invalid-feedback">Please Enter Your Email Address.</div>
            </div>
            </div>
        </div>

        <!-- Step 2 -->
        <div class="step">
            <h3>Membership Details</h3>
            <div class="row">
            <div class="col-sm-6 mb-3">
            <label for="file_no">File No</label>
            <input type="text" name="file_no" class="form-control" placeholder="Your File No" required>
                <div class="invalid-feedback">Please Enter Your File No.</div>
            </div>
            <div class="col-sm-6 mb-3">
                <label for="date_of_applying">Date Of Applying</label>
                <input type="date" name="date_of_applying" class="form-control" placeholder="Date Of Applying" required>
                <div class="invalid-feedback">Please Enter Your Date Of Applying.</div>
            </div>
            <div class="col-sm-6 mb-3">
            <label for="membership_no">Membership No</label>
            <input type="text" name="membership_no" class="form-control" placeholder="Your Membership No" required>
                <div class="invalid-feedback">Please Enter Your Date Of Applying.</div>
            </div>
            <div class="col-sm-6 mb-3">
            <label for="membership_type">Membership Type</label>
            <input type="text" name="membership_type" class="form-control" placeholder="Your Membership Type" required>
                <div class="invalid-feedback">Please Enter Your Membership Type.</div>
            </div>
            </div>
        </div>

        <!-- Step 3 -->
        <div class="step">
            <h3>Spouse Details</h3>
            <div class="row">
            <div class="col-sm-6 mb-3">
            <label for="spouse_name">Spouse Name</label>
            <input type="text" name="spouse_name" class="form-control" placeholder="Spouse Name">
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
        </div>
        </div>
        <div class="step">
            <div class="row">
        <div class="col-sm-6 mb-3">
            <label for="first_child_name">First Child Name</label>
            <input type="text" name="first_child_name" class="form-control" placeholder="First Child Name">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="first_child_dob">First Child Date of Birth</label>
            <input type="date" name="first_child_dob" class="form-control">
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
            <label for="eight_child_name">Eighth Child Name</label>
            <input type="text" name="eight_child_name" class="form-control" placeholder="Eighth Child Name">
        </div>
        <div class="col-sm-6 mb-3">
            <label for="eight_child_dob">Eighth Child Date of Birth</label>
            <input type="date" name="eight_child_dob" class="form-control">
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
        </div>
        </div>


        <!-- Navigation Buttons -->
        <div class="mt-4 text-center">
            <button type="button" id="prevBtn" class="btn btn-secondary px-4 py-2 mx-3" onclick="nextPrev(-1)" disabled>Previous</button>
            <button type="button" id="nextBtn" class="btn btn-primary px-4 py-2" onclick="nextPrev(1)">Next</button>
        </div>
    </form>


<script>
    let currentStep = 0; // Current step index
    const steps = document.querySelectorAll(".step");

    function showStep(index) {
        steps.forEach((step, i) => {
            step.classList.toggle("active", i === index);
        });
        document.getElementById("prevBtn").disabled = index === 0;
        document.getElementById("nextBtn").textContent = index === steps.length - 1 ? "Submit" : "Next";
    }

    function validateStep() {
        const currentInputs = steps[currentStep].querySelectorAll("input");
        let valid = true;
        currentInputs.forEach(input => {
            if (!input.checkValidity()) {
                input.classList.add("is-invalid");
                valid = false;
            } else {
                input.classList.remove("is-invalid");
            }
        });
        return valid;
    }

    function nextPrev(n) {
        if (n === 1 && !validateStep()) return;
        currentStep += n;
        if (currentStep >= steps.length) {
            document.getElementById("wizardForm").submit();
            return;
        }
        showStep(currentStep);
    }

    document.getElementById("wizardForm").addEventListener("submit", (e) => {
        e.preventDefault();
        alert("Form submitted successfully!");
    });

    showStep(currentStep);
</script>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php
include "footer.php";
?>
