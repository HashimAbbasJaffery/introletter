<?php
// Database connection
include "../config.php";

// Check if user is admin
session_start();
if (!isset($_SESSION['name']) || $_SESSION['user_role'] != 'Admin') {
    header("Location: dashboard.php");
    exit();
}

// Fetch data from database
$query = "SELECT 
    `id`, `file_no`, `date_of_applying`, `membership_no`, `members_name`, `date_of_birth`, 
    `membership_type`, `gender`, `cnic_passport`, `martial_status`, `city_country`, 
    `phone_number`, `email_address`, `spouse_name`, `second_spouse_name`, 
    `third_spouse_name`, `fourth_spouse_name`, `first_child_name`, `first_child_dob`, 
    `second_child_name`, `second_child_dob`, `third_child_name`, `third_child_dob`, 
    `fourth_child_name`, `fourth_child_dob`, `fifth_child_name`, `fifth_child_dob`, 
    `sixth_child_name`, `sixth_child_dob`, `seventh_child_name`, `seventh_child_dob`, 
    `eight_child_name`, `eight_child_dob`, `nineth_child_name`, `nineth_child_dob`, 
    `tenth_child_name`, `tenth_child_dob`
    FROM `members_2`";

$result = mysqli_query($conn, $query);

// Generate a filename with timestamp
$timestamp = date('d M Y'); // Format: YYYY-MM-DD_HH-MM-SS
$filename = "members_data_$timestamp.xls";

// Set headers to indicate file download
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Expires: 0");

// Create table structure for Excel
echo "<table border='1'>";
echo "<tr>
        <th>ID</th>
        <th>File No</th>
        <th>Date of Applying</th>
        <th>Membership Number</th>
        <th>Member Name</th>
        <th>Date of Birth</th>
        <th>Membership Type</th>
        <th>Gender</th>
        <th>CNIC/Passport</th>
        <th>Marital Status</th>
        <th>City/Country</th>
        <th>Phone Number</th>
        <th>Email Address</th>
        <th>Spouse Name</th>
        <th>Second Spouse Name</th>
        <th>Third Spouse Name</th>
        <th>Fourth Spouse Name</th>
        <th>First Child Name</th>
        <th>First Child DOB</th>
        <th>Second Child Name</th>
        <th>Second Child DOB</th>
        <th>Third Child Name</th>
        <th>Third Child DOB</th>
        <th>Fourth Child Name</th>
        <th>Fourth Child DOB</th>
        <th>Fifth Child Name</th>
        <th>Fifth Child DOB</th>
        <th>Sixth Child Name</th>
        <th>Sixth Child DOB</th>
        <th>Seventh Child Name</th>
        <th>Seventh Child DOB</th>
        <th>Eight Child Name</th>
        <th>Eight Child DOB</th>
        <th>Nineth Child Name</th>
        <th>Nineth Child DOB</th>
        <th>Tenth Child Name</th>
        <th>Tenth Child DOB</th>
    </tr>";

// Populate table with database data
while ($data = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    foreach ($data as $value) {
        echo "<td>" . htmlspecialchars($value) . "</td>";
    }
    echo "</tr>";
}

echo "</table>";
exit();
?>
