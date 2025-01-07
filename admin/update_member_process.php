<?php
include "../config.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $id = $_POST['id'];

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

    $updateFields = [];
    foreach ($fields as $field) {
        $updateFields[] = "$field = '" . mysqli_real_escape_string($conn, $_POST[$field]) . "'";
    }

    // Prepare the update query
    $query = "UPDATE members_2 SET " . implode(", ", $updateFields) . " WHERE id = '$id'";

    // Execute the query
    if (mysqli_query($conn, $query)) {
        header("Location: manage_member.php?update=success");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
?>
