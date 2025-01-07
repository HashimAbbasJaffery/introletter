<?php
session_start();

include "../config.php";
if (!isset($_SESSION['name']) || $_SESSION['user_role'] != 'Admin') {
    header("Location: logout.php");
    exit();
}
include "header.php";
// Get ID from query parameters
$id = $_GET['id'];

// Fetch data for the given ID
$query = "SELECT * FROM members_2 WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Check if record exists
if (!$row) {
    die("Record not found.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Update Member Details</h2>
        <form action="update_member_process.php" method="POST">
            <!-- ID (Hidden Field) -->
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <?php
            // List of fields from the query
            $fields = [
                'file_no', 'date_of_applying', 'membership_no', 'members_name', 'date_of_birth', 
                'membership_type', 'gender', 'cnic_passport', 'martial_status', 'city_country', 
                'phone_number', 'email_address', 'spouse_name', 'second_spouse_name', 
                'third_spouse_name', 'fourth_spouse_name', 'first_child_name', 'first_child_dob', 
                'second_child_name', 'second_child_dob', 'third_child_name', 'third_child_dob', 
                'fourth_child_name', 'fourth_child_dob', 'fifth_child_name', 'fifth_child_dob', 
                'sixth_child_name', 'sixth_child_dob', 'seventh_child_name', 'seventh_child_dob', 
                'eight_child_name', 'eight_child_dob', 'nineth_child_name', 'nineth_child_dob', 
                'tenth_child_name', 'tenth_child_dob'
            ];

            // Generate form fields dynamically
            foreach ($fields as $field) {
                echo '
                <div class="mb-3">
                    <label for="' . $field . '" class="form-label">' . ucfirst(str_replace('_', ' ', $field)) . '</label>
                    <input type="text" class="form-control" id="' . $field . '" name="' . $field . '" value="' . htmlspecialchars($row[$field]) . '">
                </div>';
            }
            ?>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
