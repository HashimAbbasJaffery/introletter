<?php
// Database connection
include "../config.php";

// Check if the user is an admin
session_start();
if (!isset($_SESSION['name']) || $_SESSION['user_role'] != 'Admin') {
    header("Location: dashboard.php");
    exit();
}

// Fetch data from the `customer` table
$query = "SELECT `id`, `full_name`, `membership_no`, `cnic_passport`, `spouse`, `children`, `country`, `city`, `clubs`, `duration`, `fee`, `issue`, `status` FROM `customer`";
$result = mysqli_query($conn, $query);

// Set headers to indicate file download
$timestamp = date('d M Y'); // Generate timestamp for the file name
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=customer_data_$timestamp.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Generate Excel file content
echo "<table border='1'>";
echo "<tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Membership Number</th>
        <th>CNIC/Passport</th>
        <th>Spouse</th>
        <th>Children</th>
        <th>Country</th>
        <th>City</th>
        <th>Clubs</th>
        <th>Duration</th>
        <th>Fee</th>
        <th>Issue Date</th>
    </tr>";

// Populate table rows with data
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
            <td>" . htmlspecialchars($row['id']) . "</td>
            <td>" . htmlspecialchars($row['full_name']) . "</td>
            <td>" . htmlspecialchars($row['membership_no']) . "</td>
            <td>" . htmlspecialchars($row['cnic_passport']) . "</td>
            <td>" . htmlspecialchars($row['spouse']) . "</td>
            <td>" . htmlspecialchars($row['children']) . "</td>
            <td>" . htmlspecialchars($row['country']) . "</td>
            <td>" . htmlspecialchars($row['city']) . "</td>
            <td>" . htmlspecialchars($row['clubs']) . "</td>
            <td>" . htmlspecialchars($row['duration']) . "</td>
            <td>" . htmlspecialchars($row['fee']) . "</td>
            <td>" . htmlspecialchars($row['issue']) . "</td>
          </tr>";
}

echo "</table>";
exit();
?>
