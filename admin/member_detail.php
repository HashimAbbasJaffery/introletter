<?php
session_start();
include "../config.php";
if (!isset($_SESSION['name']) || $_SESSION['user_role'] != 'Admin') {
    header("Location: logout.php");
    exit();
}
include "header.php";


// Check if `id` is provided in the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Invalid Member ID.");
}

$memberId = $_GET['id'];

// Fetch all member details based on the ID
$query = "SELECT `id`, `file_no`, `date_of_applying`, `membership_no`, `members_name`, `date_of_birth`, 
          `membership_type`, `gender`, `cnic_passport`, `martial_status`, `city_country`, `phone_number`, 
          `email_address`, `spouse_name`, `second_spouse_name`, `third_spouse_name`, `fourth_spouse_name`, 
          `first_child_name`, `first_child_dob`, `second_child_name`, `second_child_dob`, 
          `third_child_name`, `third_child_dob`, `fourth_child_name`, `fourth_child_dob`, 
          `fifth_child_name`, `fifth_child_dob`, `sixth_child_name`, `sixth_child_dob`, 
          `seventh_child_name`, `seventh_child_dob`, `eight_child_name`, `eight_child_dob`, 
          `nineth_child_name`, `nineth_child_dob`, `tenth_child_name`, `tenth_child_dob` 
          FROM `members_2` WHERE id = $memberId";
$fetchMember = mysqli_query($conn, $query);
$memberData = mysqli_fetch_assoc($fetchMember);

if (!$memberData) {
    die("Member not found.");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Detail</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Member Details</h2>
    <table class="table table-bordered mt-3">
        <tbody>
            <tr>
                <th>File No</th>
                <td><?php echo $memberData['file_no']; ?></td>
            </tr>
            <tr>
                <th>Date of Applying</th>
                <td><?php echo $memberData['date_of_applying']; ?></td>
            </tr>
            <tr>
                <th>Membership Number</th>
                <td><?php echo $memberData['membership_no']; ?></td>
            </tr>
            <tr>
                <th>Member's Name</th>
                <td><?php echo $memberData['members_name']; ?></td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td>
                    <?php
                    if (strtotime($memberData['date_of_birth'])) {
                        $dob = new DateTime($memberData['date_of_birth']);
                        echo $dob->format('d M Y'); // e.g., 05 Nov 2024
                    } else {
                        echo "Invalid Date";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <th>Membership Type</th>
                <td><?php echo $memberData['membership_type']; ?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?php echo $memberData['gender']; ?></td>
            </tr>
            <tr>
                <th>CNIC & Passport No</th>
                <td><?php echo $memberData['cnic_passport']; ?></td>
            </tr>
            <tr>
                <th>Marital Status</th>
                <td><?php echo $memberData['martial_status']; ?></td>
            </tr>
            <tr>
                <th>City & Country</th>
                <td><?php echo $memberData['city_country']; ?></td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td><?php echo $memberData['phone_number']; ?></td>
            </tr>
            <tr>
                <th>Email Address</th>
                <td><?php echo $memberData['email_address']; ?></td>
            </tr>
            <tr>
                <th>Spouse Names</th>
                <td>
                    <?php
                    echo $memberData['spouse_name'];
                    echo !empty($memberData['second_spouse_name']) ? ", " . $memberData['second_spouse_name'] : "";
                    echo !empty($memberData['third_spouse_name']) ? ", " . $memberData['third_spouse_name'] : "";
                    echo !empty($memberData['fourth_spouse_name']) ? ", " . $memberData['fourth_spouse_name'] : "";
                    ?>
                </td>
            </tr>
            <tr>
            <tr>
    <th>Children Names & DOBs</th>
    <td>
        <?php
        // Array of child prefixes
        $childFields = [
            'first', 'second', 'third', 'fourth', 'fifth',
            'sixth', 'seventh', 'eight', 'nineth', 'tenth'
        ];

        // Counter for numbering
        $counter = 1;

        foreach ($childFields as $index) {
            $childName = $memberData["{$index}_child_name"] ?? '';
            $childDOB = $memberData["{$index}_child_dob"] ?? '';

            if (!empty($childName) || !empty($childDOB)) {
                echo "<strong>Children Names & DOBs $counter:</strong> ";
                echo  (!empty($childName) ? $childName : "N/A");
                echo " <strong>| DOB:</strong> " . (!empty($childDOB) ? $childDOB : "N/A");
                echo "<br>";
                $counter++;
            }
        }
        ?>
    </td>
</tr>




        </tbody>
    </table>
    <a href="manage_member.php" class="btn btn-secondary">Back to Members List</a>
</div>
</body>
</html>
