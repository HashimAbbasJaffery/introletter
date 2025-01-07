<?php
include "config.php";

if (isset($_POST['membership_no']) && isset($_POST['cnic_passport'])) {
    $membership_no = trim($_POST['membership_no']);
    $cnic_passport = trim($_POST['cnic_passport']);

    // Fetch member name from database
    $query = "SELECT members_name FROM members_2 
              WHERE TRIM(LOWER(membership_no)) = TRIM(LOWER(?)) 
              AND TRIM(LOWER(cnic_passport)) = TRIM(LOWER(?))";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $membership_no, $cnic_passport);
    $stmt->execute();
    $stmt->bind_result($members_name);
    $stmt->fetch();

    // Return member's name or 'Not Found'
    echo $members_name ? $members_name : 'Not Found';

    $stmt->close();
}

$conn->close();
?>
