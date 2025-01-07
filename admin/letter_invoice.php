<?php
// Include your database connection file
include "../config.php"; 

if (isset($_GET['id'])) {
    // Get the customer ID from the URL and sanitize it
    $customerId = $_GET['id'];

    // Prepare a SQL query to fetch the customer data by ID
    $queryCustomer = "SELECT 
        id AS customer_id, 
        full_name, 
        membership_no, 
        spouse, 
        children, 
        clubs, 
        duration, 
        fee, 
        issue, 
        status 
    FROM 
        customer 
    WHERE 
        id = ?";

    // Prepare the statement for customer
    if ($stmtCustomer = mysqli_prepare($conn, $queryCustomer)) {
        
        // Bind the parameter to the placeholder
        mysqli_stmt_bind_param($stmtCustomer, "i", $customerId);  // 'i' for integer
        
        // Execute the query
        mysqli_stmt_execute($stmtCustomer);
        
        // Get the result for customer
        $resultCustomer = mysqli_stmt_get_result($stmtCustomer);
        
        // Check if customer data is found
        if (mysqli_num_rows($resultCustomer) > 0) {
            // Fetch the customer data
            $customerData = mysqli_fetch_assoc($resultCustomer);
            $membershipNo = $customerData['membership_no'];

// Get the issue date and duration
$issueDate = $customerData['issue'];  // Issue date from the database
$duration = $customerData['duration']; // Duration in months (e.g., "1 Month", "2 Month", etc.)

// Extract the numeric value from the duration (e.g., "1 Month" -> 1)
$durationInMonths = intval($duration);

// Create a DateTime object from the issue date
$issueDateObj = new DateTime($issueDate);

// Add 30 days for each month in the duration
$expiryDateObj = clone $issueDateObj;  // Clone to avoid modifying the original issue date
$expiryDateObj->modify('+' . ($durationInMonths * 30) . ' days');

// Format the expiry date to display it
$formattedExpiryDate = $expiryDateObj->format('d M Y');


            // Prepare a SQL query to fetch members data by membership_no
            $queryMembers = "SELECT 
                id AS member_id,
                `file_no`, `date_of_applying`, `membership_no`, `members_name`, `date_of_birth`, `membership_type`, `gender`, `cnic_passport`, `martial_status`, `city_country`, `phone_number`, `email_address`, `spouse_name`, `second_spouse_name`, `third_spouse_name`, `fourth_spouse_name`, `first_child_name`, `first_child_dob`, `second_child_name`, `second_child_dob`, `third_child_name`, `third_child_dob`, `fourth_child_name`, `fourth_child_dob`, `fifth_child_name`, `fifth_child_dob`, `sixth_child_name`, `sixth_child_dob`, `seventh_child_name`, `seventh_child_dob`, `eight_child_name`, `eight_child_dob`, `nineth_child_name`, `nineth_child_dob`, `tenth_child_name`, `tenth_child_dob` 
            FROM 
                members_2 
            WHERE 
                membership_no = ?";

            // Prepare the statement for members
            if ($stmtMembers = mysqli_prepare($conn, $queryMembers)) {
                
                // Bind the parameter to the placeholder
                mysqli_stmt_bind_param($stmtMembers, "s", $membershipNo);  // 's' for string
                
                // Execute the query
                mysqli_stmt_execute($stmtMembers);
                
                // Get the result for members
                $resultMembers = mysqli_stmt_get_result($stmtMembers);
                
                // Check if member data is found
                if (mysqli_num_rows($resultMembers) > 0) {
                    // Check if the customer has a spouse (spouse field in customer table)
                    $hasSpouse = strtolower($customerData['spouse']) === 'yes';
                
                    $hasChildren = strtolower($customerData['children']) === 'yes';
                    // Fetch the members data
                    while ($memberData = mysqli_fetch_assoc($resultMembers)) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction Letter <?php echo $timestamp = date('d M Y'); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @media print{
                @page{
                    size: A5 !important;
                    size: landscape !important; 
                    margin: 0 10px;
                    margin-left:50px;
                }
                .bc-head-txt-label {
                    left: calc(50% - .5rem);
                    line-height: 1;
                    padding-top: .5rem;
                    position: absolute;
                    left: 0;
                    top:30px;
                    transform: rotate(180deg);
                    white-space: nowrap;
                    writing-mode: vertical-rl;
                    font-size:10px;
                    font-weight:600;
                    color: #a7a7a7 !important;
                }
            .button{
                display:none;
            }
            }
            body {
                font-size: 11px;
            }
        table{ 
            line-height: 5px;
        }
            .header h1 {
                font-size: 20px;
                font-weight: 400;
                text-transform: uppercase;
                
            }
            .header h1 span{
                font-weight: bold;
            }
            
            p{
                font-size: 8px;
                margin-bottom: 2px;
                line-height: 12px;
            }
            .form-section {
                border: 1px solid #000;
                padding: 20px;
            }
            .form-label {
                font-weight: bold;
                font-size:12px;
            }
            .form-check-label {
            font-size: 9px;
            font-weight: bold;
            padding-left: 5px;
            margin-top: 6px;
            }
            .plans-goals {
                font-size: 9px;
                line-height: 12px;
                margin-bottom: 2px;
                text-transform: capitalize;
            }
            .sign-stamp {
                height: 50px;
            }
            tr td{
                font-size: 12px;
                text-transform: capitalize;
                font-weight: 400;
                padding:10px !important;   
            }
            .question{
                border:1px dashed #000;
                border-radius:8px !important; 
                padding: 5px;
            }
            input.form-check-input {
                width: 30px;
                height: 15px;
                border: 2px solid #000;
            }
            .form-box{
                font-weight: bold;
                font-size: 12px;
                text-transform: uppercase;
            }
            .subsidy{
                font-size: 13px;
                font-weight: bold;
                text-transform: uppercase;
            }
            .subsidy span{
                font-weight: 400;
            }
            .date{
                font-weight: bold;
                font-size: 11px;
                text-transform: uppercase;
            }
            .date span{
                font-weight: 400;
            }
    .bc-head-txt-label {
    left: calc(50% - .5rem);
    line-height: 1;
    padding-top: .5rem;
    position: absolute;
    left: 0;
    top:30px;
    transform: rotate(180deg);
    white-space: nowrap;
    writing-mode: vertical-rl;
    font-weight:600;
    color: #a7a7a7;
}
@media only screen and (max-width: 768px) {
.form-label {
    font-size:9px;
    line-height:10px;
}
td span{
    font-size:9px !important;
}
h2{
    font-size:10px !important;
}
.header img{
    width:40%;
}
}
    </style>
</head> 

<body onload="window.print()">
    <div class="container-fluid mt-2">
        <div class="header row">
            <div class="col-9" style="vertical-align: middle;">
                <h2 style="font-size:18px; text-transform: uppercase; font-weight: 400;" class="mt-2">Introduction Letter</h2>
                <p style="font-size:11px; line-height: 1px;">RII30924 | www.gwadargymkhana.com.pk  -  UAN: +9221-111-947-111</p>
            </div>
            <div class="col-3 text-end" >
                <img src="../images/logo.png" alt="" class="img-fluid" width="250">
            </div>
            
        </div>
        <!-- <p class="my-2"><span style="font-weight: bold;">TERMS & CONDITION:</span> The Gwadar Gymkhana Club offers selective memberships for business professionals, including those in industrial and import-export sectors. Perfect for individuals involved in major projects within Gwadar Economic Zone, such as the construction of factories and hotels. It's also suited for those interested in Gwadar's tourism. Complete the eligibility form to apply. Suitable applicants will be contacted for membership details. By applying, you agree to our terms and confirm the accuracy of your information. Your personal data will be securely used for club-related communications only.</p> -->
        
    <table class="table-bordered table mt-3" style="border: 1px solid #000 !important;">
        <tr>
            <td style="width: 20%;">To the reciprocal club</td>
            <td colspan="4"><?php echo $customerData['clubs']; ?></td>
            <td>Issue Date</td>
            <td><?php echo date('d M Y', strtotime($customerData['issue'])); ?></td>
        </tr> 
        <tr>
            <td>Member's name</td>
            <td colspan="2"><?php echo $customerData['full_name']; ?></td>
            <td>Membership No:</td>
            <td><?php echo $customerData['membership_no']; ?></td>
            <td>Expiry Date</td>
            <td><?php echo $formattedExpiryDate; ?></td>
        </tr> 
        
    </table>

<table class="table-bordered table mt-2" style="border: 1px solid #000 !important;">
    <tr>
        <td >Spouse Name</td>
        <td style="width: 30%;"><?php if (!empty($memberData['spouse_name']) && $hasSpouse) { echo $memberData['spouse_name']; } else { echo 'N/A'; }?></td>
        <td>Second Spouse Name</td>
        <td style="width: 30%;"><?php if (!empty($memberData['second_spouse_name']) && $hasSpouse) { echo $memberData['second_spouse_name'];} else {echo 'N/A';} ?></td>
    </tr> 
    <tr>
        <td >Third Spouse Name</td>
        <td style="width: 30%;"><?php if (!empty($memberData['third_spouse_name']) && $hasSpouse) { echo $memberData['third_spouse_name'];} else {echo 'N/A';} ?></td>
        <td>Fourth Spouse Name</td>
        <td style="width: 30%;"><?php if (!empty($memberData['fourth_spouse_name']) && $hasSpouse) { echo $memberData['fourth_spouse_name'];} else {echo 'N/A';} ?></td>
    </tr> 
    
</table>

<table class="table-bordered table mt-2" style="border: 1px solid #000 !important;">
    <tr>
        <td rowspan="5" class="text-center" style="vertical-align: middle;">Children's Name</td>
        <td style="width: 42%;"><?php if (!empty($memberData['first_child_name']) && $hasChildren) { echo $memberData['first_child_name']; } else { echo 'N/A'; }?></td>
        <td style="width: 42%;"><?php if (!empty($memberData['second_child_name']) && $hasChildren) { echo $memberData['second_child_name']; } else { echo 'N/A'; }?></td>
    </tr> 
    <tr>
        <td style="width: 40%;"><?php if (!empty($memberData['third_child_name']) && $hasChildren) { echo $memberData['third_child_name']; } else { echo 'N/A'; }?></td>
        <td style="width: 40%;"><?php if (!empty($memberData['fourth_child_name']) && $hasChildren) { echo $memberData['fourth_child_name']; } else { echo 'N/A'; }?></td>
    </tr>
    <tr>
    <td style="width: 40%;"><?php if (!empty($memberData['fifth_child_name']) && $hasChildren) { echo $memberData['fifth_child_name']; } else { echo 'N/A'; }?></td>
    <td style="width: 40%;"><?php if (!empty($memberData['sixth_child_name']) && $hasChildren) { echo $memberData['sixth_child_name']; } else { echo 'N/A'; }?></td>
    </tr>
    <tr>
    <td style="width: 40%;"><?php if (!empty($memberData['seventh_child_name']) && $hasChildren) { echo $memberData['seventh_child_name']; } else { echo 'N/A'; }?></td>
    <td style="width: 40%;"><?php if (!empty($memberData['eight_child_name']) && $hasChildren) { echo $memberData['eight_child_name']; } else { echo 'N/A'; }?></td>
    </tr>
    <tr>
    <td style="width: 40%;"><?php if (!empty($memberData['nineth_child_name']) && $hasChildren) { echo $memberData['nineth_child_name']; } else { echo 'N/A'; }?></td>
    <td style="width: 40%;"><?php if (!empty($memberData['tenth_child_name']) && $hasChildren) { echo $memberData['tenth_child_name']; } else { echo 'N/A'; }?></td>
    </tr>
</table>
<table class="table-bordered table my-2" style="border: 1px solid #000 !important;">
    <tr>
        <td>CNIC/Passport Number</td>
        <td style="width: 50%;"><?php echo $memberData['cnic_passport']; ?></td>
    </tr> 
</table>
<h6 class="my-1" style="font-size:10px; font-weight:400;">Gwadar Gymkhana Club will not be responsible for credit facilities if any rendered to the members. I shall appreciate extension of facilities of your Club to our member with family holding membership cards. If you have any queries, please contact me at reciprocal@gwadargymkhana.com.pk. Thank you!</h6>
<h6 class="my-1" style="font-size:10px; font-weight:400;">Approved by (with stamp):</h6>
<table class="table-bordered table my-2" style="border: 1px solid #000 !important;">
    <tr>
    <td class="p-4"></td>
    <td class="p-4"></td>
    </tr>
    <tr>
        <td>Reciprocal Department - Ghina Shahmir</td>
        <td>Recovery Department - Khadija Baloch</td>
    </tr>
</table>
<h6 class="my-1" style="font-size:10px; font-weight:400;">A payment of PKR 1000/- per month for the processing fee of this introduction letter has been received. <span style="font-weight:500;">Guest access is not allowed.</span></h6>
                
    </div>
       

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>




</body>
</html>
<?php


}
} else {
    echo "No matching member data found for the membership number.";
}

// Close the members statement
mysqli_stmt_close($stmtMembers);
} else {
echo "Failed to prepare the members SQL statement.";
}
} else {
echo "No matching customer data found for the provided ID.";
}

// Close the customer statement
mysqli_stmt_close($stmtCustomer);
} else {
echo "Failed to prepare the customer SQL statement.";
}
} else {
echo "Customer ID not provided.";
}
?>